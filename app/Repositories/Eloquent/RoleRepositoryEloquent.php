<?php

namespace App\Repositories\Eloquent;

use DB;
use App\Models\Permission;
use App\Models\Role;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\RoleRepository as RoleRepositoryInterface;

/**
 * Class MenuRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function ajaxIndex($request)
    {
        $draw            = $request->input('draw',1);
        $start           = $request->input('start',0);
        $length          = $request->input('length',10);
        $order['name']   = $request->input('columns.' .$request->input('order.0.column') . '.name');
        $order['dir']    = $request->input('order.0.dir','asc');
        $search['value'] = $request->input('search.value','');
        $search['regex'] = $request->input('search.regex',false);

        if ($search['value']){
            if ($search['regex'] == 'true'){
                $this->model = $this->model->where('display_name','like',"%{$search['value']}%")->orWhere('name','like',"%{$search['value']}%");
            }else{
                $this->model = $this->model->where('display_name',$search['value'])->orWhere('name',$search['value']);
            }
        }

        $count = $this->model->count();
        $this->model = $this->model->orderBy($order['name'],$order['dir']);
        $this->model = $this->model->offset($start)->limit($length)->get();

        if ($this->model) {
            foreach ($this->model as $item) {
                $item->button = $item->getActionButtons('role');
            }
        }

        return [
            'draw'              =>$draw,
            'recordsTotal'      =>$count,
            'recordsFiltered'   => $count,
            'data'              =>$this->model
        ];
    }

    /**
     * 添加权限
     * @param array $attr
     * @return mixed
     */
    public function createRole(array $attr)
    {
        $role = new Role();
        $role->name = $attr['name'];
        $role->display_name = $attr['display_name'];
        $role->description = $attr['description'];
        $role->save();
        $res = $role->attachPermissions($attr['permission']);
        //if ($res) {
        flash('角色新增成功', 'success');
        //} else {
        //    flash('角色新增失败', 'error');
        //}
        return $res;
    }

    /**
     * 编辑页面所需要的数据
     * @param   int     $id
     * @return  array
     */
    public function editViewData($id)
    {
        //$rolePermission = $role->permissions->toArray();
        
        $role = $this->model->find($id,['id','name','display_name','description'])->toArray();
        
        $rolePermissionList = DB::table('permission_role')->where('role_id',$id)->get(['permission_id']);
        $getRolePermissionClosure = function($permissionList){
            $res = array();
            foreach ($permissionList as $key=>$value) {
                $res[] = $value->permission_id;
            }
            return $res;
        };

        $rolePermission = $getRolePermissionClosure($rolePermissionList);
        
        $permissions = Permission::all(['id','display_name'])->toArray();

        return compact('role','rolePermission','permissions');
    }

    public function updateRole(array $attr, $id)
    {
        $permissions = $attr['permission'];
        unset($attr['permission']);
        $res = $this->find($id)->perms()->sync($permissions);
        if ($res) {
            flash('修改成功!', 'success');
        } else {
            flash('修改失败!', 'error');
        }
        return $res;
    }


}
