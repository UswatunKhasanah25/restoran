@extends('layouts.tampilan')
@section('content')
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
   
    <table class="table table-bordered">
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

@endsection