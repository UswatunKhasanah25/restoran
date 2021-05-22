@extends('layouts.tampilan')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <p class="card-text">Tambah Pesanan</p>
    </div>
    @foreach ($makanans as $makanan)
    <div class="col-md-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{asset('storage/'.$makanan->photo)}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$makanan->nama}}</h2>
                <p class="card-text">Harga: {{$makanan->harga}}</p>
                <p class="card-text">Stok : {{$makanan->stok}}</p>
                <a href="/order/id" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $makanans->links() }}

@endsection