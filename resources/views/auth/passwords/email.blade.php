@extends('layouts.frontend.master')

<!-- Main Content -->
@section('body')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="panel panel-default">
    <div class="panel-heading">Reset Password</div>
    <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url(Request::segment(1) . '/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
