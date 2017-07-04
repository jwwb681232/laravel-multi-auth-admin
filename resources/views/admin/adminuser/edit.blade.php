@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
@endsection

@section('admin-content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Form Validation</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">修改后台用户 <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Basic Form Validation</h4>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" action="{{ url('admin/adminuser/'.$userData['user']['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="email">邮箱 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="email" placeholder="邮箱（将会作为登录名）" data-parsley-required="true" data-parsley-required-message="请输入邮箱" value="{{ $userData['user']['email'] }}" readonly="readonly"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="name">姓名 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="name" placeholder="姓名" data-parsley-length="[2,20]" data-parsley-length-message="姓名长度2~20字符" data-parsley-required="true" data-parsley-required-message="请输入姓名" value="{{ $userData['user']['name'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="old_password">原密码 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="old_password" placeholder="密码" data-parsley-length="[6,12]" data-parsley-length-message="密码长度6~12字符" value="{{ old('old_password') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="password">新密码 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="password" type="text" name="password" placeholder="密码" data-parsley-length="[6,12]" data-parsley-length-message="密码长度6~12字符" value="{{ old('password') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="password">确认密码 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="password_confirmation" placeholder="确认密码" data-parsley-length="[6,12]" data-parsley-length-message="密码长度6~12字符" data-parsley-equalto="#password" data-parsley-equalto-message="两次密码输入不一致" value="{{ old('password_confirmation') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="role">选择角色 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control selectpicker"
                                            data-live-search="true"
                                            data-style="btn-white"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#role_error"
                                            data-parsley-required-message="请选择角色"
                                            name="role">
                                        <option value="">-- 请选择 --</option>
                                        @foreach($roles as $key=>$value)
                                            <option value="{{ $value['id'] }}" @if($value['id'] == $userData['userRole']->role_id) selected="selected" @endif>{{ $value['display_name'] }}</option>
                                        @endforeach
                                    </select>
                                    <p id="role_error"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
@endsection

@section('admin-js')
    <script src="{{ asset('asset_admin/assets/plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script>
        $('.selectpicker').selectpicker('render');
    </script>
@endsection