@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(Auth::user()->level == 'admin')
                    <a href="beranda" class="btn btn-primary">Lanjut</a>
                    @endif
                    @if(Auth::user()->level == 'user')
                    <a href="berandaUser" class="btn btn-primary">Lanjut</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection