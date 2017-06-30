<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AdminUserRepository as AdminUserRepositoryInterface;
use App\models\AdminUser;

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
        $draw = $request->input('draw',1);
        $start = $request->input('start',0);
        $length = $request->input('length',10);
        $order['name'] = $request->input('columns.' .$request->input('order.0.column') . '.name');
        $order['dir'] = $request->input('order.0.dir','asc');
        $search['value'] = $request->input('search.value','');
        $search['regex'] = $request->input('search.regex',false);
        if ($search['value']){
            if ($search['regex'] == 'true'){//传过来的是字符串不能用bool值比较
                $this->model = $this->model->where('email','like',"%{$search['value']}%");
            }else{
                $this->model = $this->model->where('email',$search['value']);
            }
        }
        $count = $this->model->count();
        $this->model = $this->model->orderBy($order['name'],$order['dir']);
        $this->model = $this->model->offset($start)->limit($length)->get();

        if ($this->model){
            foreach ($this->model as $item) {
                $item->button = $item->getActionButtons('adminuser',$item->id);
            }
        }

        return [
            'draw'=>$draw,
            'recordsTotal' =>$count,
            'recordsFiltered' => $count,
            'data' =>$this->model
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


}
