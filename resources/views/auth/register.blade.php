@extends('layouts.app')

@section('content')
<!-- <div class="text-center"> -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <center>
                    <!-- <div class="panel-heading">Register</div> -->
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="name" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email"
                                        value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

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

                            <div class="form-group">
                                <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm
                                    Password</label> -->

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="Confirm password"
                                        class="form-control" name="password_confirmation" required>
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
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <center>
                            <p>Kedai Assalamualaikum 2021</p>
                        </center>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
</div>
@endsection