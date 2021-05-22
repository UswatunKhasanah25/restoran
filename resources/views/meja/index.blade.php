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
                <h2>Data Meja</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('meja.create') }}"> Create New Meja</a>
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
            <th>Nomor Meja</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mejas as $meja)
        <tr>
            <td>{{ $meja->id }}</td>
            <td>{{ $meja->nomor }}</td>
            <td>
                <form action="{{ route('meja.destroy',$meja->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $mejas->links() }}
        </div>
    </div>

@endsection