@extends('layouts.tampilan')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <p class="card-text">Tambah Pesanan</p>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/pecel.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">Pecel</h2>
                <p class="card-text">Harga : Rp 5.000</p>
                <a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/iga.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">Iga Bakar</h2>
                <p class="card-text">Harga : Rp 15.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/bebek.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">bebek goreng</h2>
                <p class="card-text">Harga : Rp 17.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/gado.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">gado gado</h2>
                <p class="card-text">Harga : Rp 10.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/geprek.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">ayam geprek</h2>
                <p class="card-text">Harga : Rp 9.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/ayam2.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">ayam krispi</h2>
                <p class="card-text">Harga : Rp 6.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/sop.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">Sop</h2>
                <p class="card-text">Harga : Rp 5.000</p><a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ URL::to('/img/ayam.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">ayam goreng</h2>
                <p class="card-text">Harga : Rp 6.000</p>
                <a href="#" class="btn btn-success">Pesan</a>
            </div>
        </div>
    </div>
</div>


@endsection