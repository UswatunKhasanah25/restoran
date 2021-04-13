@extends('layouts.tampilan')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Makanan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('makanan.create') }}"> Tambah Makanan</a>
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
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Photo</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($makanans as $makanan)
        <tr>
            <td>{{ $makanan->id }}</td>
            <td>{{ $makanan->nama }}</td>
            <td>{{ $makanan->kategori->nama }}</td>
            <td>{{ $makanan->harga }}</td>
            <td>{{ $makanan->stok }}</td>
            <td><img width="150px" src="{{asset('storage/'.$makanan->photo)}}"></td>
            <td>
                <form action="{{ route('makanan.destroy',$makanan->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('makanan.show',$makanan->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('makanan.edit',$makanan->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $makanans->links() }}

@endsection