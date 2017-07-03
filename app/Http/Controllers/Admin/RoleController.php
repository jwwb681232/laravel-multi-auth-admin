<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\RoleRepositoryEloquent as RoleRepository;
use App\Repositories\Eloquent\PermissionRepositoryEloquent as PermissionRepository;

class RoleController extends Controller
{
    public $role;
    public $permission;
    public function __construct(RoleRepository $roleRepository,PermissionRepository $permissionRepository)
    {
        $this->middleware('CheckPermission:role');
        $this->role = $roleRepository;
        $this->permission = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->permission->all(['id','display_name']);
        return view('admin.role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleRequest $request)
    {
        $this->role->createRole($request->all());
        return redirect('admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->role->editViewData($id);
        return view('admin.role.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RoleRequest $request, $id)
    {
        $this->role->updateRole($request->all(),$id);
        return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function ajaxIndex(Request $request)
    {
        $result = $this->role->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
