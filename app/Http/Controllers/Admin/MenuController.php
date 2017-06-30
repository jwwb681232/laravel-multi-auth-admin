<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Repositories\Eloquent\MenuRepositoryEloquent as MenuRepository;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    private $menu;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->middleware('CheckPermission:menus');
        $this->menu = $menuRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field = ['id','name','url','slug','icon','parent_id','updated_at'];
        $menus = $this->menu->getAll($field);
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topMenus = $this->menu->findWhere(['parent_id'=>0]);
        return view('admin.menu.create',compact('topMenus'));
    }

    /**
     * Store a newly created resource in storage.
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MenuRequest $request)
    {
        $this->menu->createMenu($request->all());
        return redirect('admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topMenus = $this->menu->findWhere(['parent_id'=>0]);
        $menu = $this->menu->find($id)->toArray();
        return view('admin.menu.edit',compact('topMenus','menu'));
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MenuRequest $request, $id)
    {
        $res = $this->menu->update($request->all(),$id);
        if ($res){
            flash('菜单保存成功','success');
        }else{
            flash('菜单保存失败','error');
        }
        return redirect('admin/menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->menu->delete($id);
        if ($res){
            flash('菜单删除成功','success');
        }else{
            flash('菜单删除失败','error');
        }
        return redirect('admin/menus');
    }
}
