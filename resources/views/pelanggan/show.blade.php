@extends('layouts.tampilan')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detail Pelanggan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pelanggan.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pelanggan:</strong>
                {{ $pelanggan->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ $pelanggan->email }}
            </div>
        </div>
    </div>
@endsection