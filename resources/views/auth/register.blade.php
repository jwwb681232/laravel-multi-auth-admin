@extends('layouts.frontend.master')

@section('body')
    <div class="col-md-4 col-md-offset-4 text-center">
        <h1>@yield('title')</h1>
        <form action="@yield('form-action')" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-group">
                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="btn btn-default pull-left">
                <a href="@yield('login')" class="btn btn-default pull-right">Already have a login?</a>
            </div>
        </form>
    </div>
@endsection
