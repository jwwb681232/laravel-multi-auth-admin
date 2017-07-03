<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Eloquent\RoleRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\AdminUserRepositoryEloquent as AdminUserRepository;

class AdminUserController extends Controller
{
    public $adminUser;
    public $role;
    public function __construct(AdminUserRepository $adminUserRepository,RoleRepositoryEloquent $roleRepository)
    {
        $this->middleware('CheckPermission:adminuser');
        $this->adminUser = $adminUserRepository;
        $this->role = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth('admin')->user()->roles->toArray()[0]['display_name'];
        return view('admin.adminuser.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all(['id','display_name']);
        return view('admin.adminuser.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminUserRequest $request)
    {
        $this->adminUser->createAdminUser($request->all());
        return redirect('admin/adminuser');
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
        $userData = $this->adminUser->editViewData($id);
        $roles = $this->role->all(['id','display_name']);
        return view('admin.adminuser.edit',compact('roles','userData'));
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AdminUserRequest $request, $id)
    {
        $this->adminUser->updateAdminUser($request->all(),$id);
        return redirect('admin/adminuser');
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
        $result = $this->adminUser->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
