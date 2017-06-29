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

        //添加自定义列
        /*if ($this->model){
            foreach ($this->model as $item) {
                $item->actionButton = $item->getActionButton();
                //todo 不得已而为之
                $item->cat_name = Article::find($item->id)->blog_category->name;
                $item->user_name = Article::find($item->id)->user->name;
            }
        }*/
        return [
            'draw'=>$draw,
            'recordsTotal' =>$count,
            'recordsFiltered' => $count,
            'data' =>$this->model
        ];
    }


}
