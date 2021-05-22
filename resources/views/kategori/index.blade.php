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
                <h2>Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Create New Kategori</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
<table class="table table-bordered table-hover">
        <tr>
            <th>Id</th>
            <th>Nama Kategori</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $kategori->id }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <form action="{{ route('kategori.destroy',$kategori->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('kategori.show',$kategori->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('kategori.edit',$kategori->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $kategoris->links() }}
        </div>
    </div>

@endsection