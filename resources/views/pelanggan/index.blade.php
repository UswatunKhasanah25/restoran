@extends('layouts.tampilan')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pelanggan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pelanggan.create') }}"> Tambah Pelanggan</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nama Pelanggan</th>
            <th>E-mail</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pelanggans as $pelanggan)
        <tr>
            <td>{{ $pelanggan->id }}</td>
            <td>{{ $pelanggan->nama }}</td>
            <td>{{ $pelanggan->email }}</td>
            <td>
                <form action="{{ route('pelanggan.destroy',$pelanggan->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pelanggan.show',$pelanggan->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pelanggan.edit',$pelanggan->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $pelanggans->links() }}

@endsection