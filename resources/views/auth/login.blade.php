@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <center>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-8 control-label">Login User</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <!-- <label for="password" class="col-md-8 col-md-offset-2  control-label">Password</label> -->

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Password" class="form-control"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 offset-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"
                                                {{ old('remember') ? 'checked' : ''}}>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2 ">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection