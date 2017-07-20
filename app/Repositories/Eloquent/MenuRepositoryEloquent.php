<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\MenuRepository as MenuRepositoryInterface;
use App\Models\Menu;

/**
 * Class MenuRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function createMenu(array $attributes)
    {
        $res = $this->create($attributes);
        if ($res){
            flash('菜单新增成功','success');
        }else{
            flash('菜单新增失败','error');
        }
        return $res;
    }

    public function getAll($columns = ['*'])
    {
        $res = $this->all($columns)->toArray();
        $list = $this->sortList($res);
        foreach ($list as $key => $value) {
            $list[$key]['button'] = $this->model->getActionButtons('menus',$value['id']);
        }
        return $list;

    }

    public function getMenuComposerData()
    {
        return $this->sortTreeList($this->sortList($this->getAll(['id','name','url','slug','parent_id'])));
    }

    /**
     * 排序
     * @param array     $data   需要循环的数组
     * @param int       $id     获取id为$id下的子分类，0为所有分类
     * @param array     $arr    将获取到的数据暂时存储的数组中，方便数据返回
     * @return array            二维数组
     */
    protected function sortList(array $data, $id = 0, &$arr = [])
    {
        foreach ($data as $v) {
            if ($id == $v['parent_id']) {
                $arr[] = $v;
                $this->sortList($data, $v['id'], $arr);
            }
        }
        return $arr;
    }

    /**
     * 树形排序
     * @param array $data   需要排序的分类数据
     * @return array        多维数组
     */
    public function sortTreeList($data = [])
    {
        $tree = array();
        $tmpMap = array();
        foreach ($data as $k => $v) {
            $tmpMap[$v['id']] = $v;
        }

        foreach ($data as $value) {
            if (isset($tmpMap[$value['parent_id']])) {
                $tmpMap[$value['parent_id']]['child'][] = &$tmpMap[$value['id']];
            } else {
                $tree[] = &$tmpMap[$value['id']];
            }
        }

        unset($tmpMap);
        return $tree;
    }
}
