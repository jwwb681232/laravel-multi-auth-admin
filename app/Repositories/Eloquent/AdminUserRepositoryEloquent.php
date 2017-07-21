<?php

namespace App\Repositories\Eloquent;

use DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminUserRepository as AdminUserRepositoryInterface;
use App\Models\AdminUser;
use Hash;

/**
 * Class MenuRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class AdminUserRepositoryEloquent extends BaseRepository implements AdminUserRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminUser::class;
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
        $draw = $request->input('draw', 1);
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order['name'] = $request->input('columns.' . $request->input('order.0.column') . '.name');
        $order['dir'] = $request->input('order.0.dir', 'asc');
        $search['value'] = $request->input('search.value', '');
        $search['regex'] = $request->input('search.regex', false);
        if ($search['value']) {
            if ($search['regex'] == 'true') {//传过来的是字符串不能用bool值比较
                $this->model = $this->model->where('email', 'like', "%{$search['value']}%")->orWhere('name', 'like', "%{$search['value']}%");
            } else {
                $this->model = $this->model->where('email', $search['value'])->orWhere('name', $search['value']);
            }
        }
        $count = $this->model->count();
        $this->model = $this->model->orderBy($order['name'], $order['dir']);
        $this->model = $this->model->offset($start)->limit($length)->get();

        if ($this->model) {
            foreach ($this->model as $item) {
                $item->button = $item->getActionButtons('adminuser');
                $item->role = $item->roles->toArray()[0]['display_name'];//获取关联的角色
            }
        }

        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $this->model
        ];
    }

    public function createAdminUser(array $attr)
    {
        $userModel = new AdminUser();
        $userModel->email = $attr['email'];
        $userModel->name = $attr['name'];
        $userModel->password = bcrypt($attr['password']);
        $userModel->save();
        $userModel->attachRole($attr['role']);
        flash('后台用户新增成功', 'success');
    }

    public function editViewData($id)
    {
        $user = $this->find($id, ['id', 'name', 'email']);
        $userRole = DB::table('role_admin')->where('user_id', $id)->first();
        if ($user) {
            return compact('user', 'userRole');
        }
        abort(404);
    }

    public function updateAdminUser(array $attr, $id)
    {
        $adminUser = $this->find($id);
        if ($attr['old_password'] && !Hash::check($attr['old_password'], $adminUser->password)) {
            abort(500, '原密码不正确！');
        }
        $roleId = $attr['role'];
        if (empty($attr['password'])) {
            unset($attr['password']);
        }
        $attr['password'] = bcrypt($attr['password']);
        $res = $this->update($attr, $id);

        $userRole = DB::table('role_admin')->where('user_id', '=', $id)->first();
        if ($userRole) {
            DB::table('role_admin')->where('user_id', '=', $id)->update(['role_id' => $roleId]);
        } else {
            DB::table('role_admin')->insert(['user_id' => $id, 'role_id' => $roleId]);
        }
        if ($res) {
            flash('修改成功!', 'success');
        } else {
            flash('修改失败!', 'error');
        }
        return $res;
    }


}
