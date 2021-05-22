@extends('layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- PNotify -->
    <link href="{{ asset('assets/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <style type="text/css">
        #modal-detail .row {
            margin-bottom: 5px
        }

        #modal-detail hr {
            margin: 10px 0;
        }
    </style>
@endsection 
  
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Makanan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('makanan.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
    <form action="{{ route('makanan.update',$makanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" value="{{ $makanan->nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
             
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                <select name="id_kategori" class="form-control" id="id_kategori">
                    @foreach ($kategori as $kat)
                        <option value="{{$kat->id}}">{{$kat->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="text" name="harga" value="{{ $makanan->harga }}" class="form-control" placeholder="Harga">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                <input type="text" name="stok" value="{{ $makanan->stok }}" class="form-control" placeholder="Stok">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="cover">Photo</label>
                <input type="file" class="form-control" required="required" name="photo" value="{{ $makanan->photo }}">
                <img width="150px" src="{{asset('storage/'.$makanan->photo)}}">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
            </div>
        </div>
@endsection