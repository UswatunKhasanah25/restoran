@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="col-md-16 col-md-offset-2">
            <h2 class="page-header">
                <strong>Menu Makanan</strong>
            </h2>
            <div class="row">
                @foreach ($makanans as $makanan)
                    <div class="col-md-3">
                        <div class="panel panel-default card">
                            <div class="panel-heading">
                                <img src="{{ asset('storage/'.$makanan->photo) }}" class="img-responsive center-block" style="height: 180px">
                            </div>
                            <div class="panel-body">
                                <h4>{{ $makanan->nama }}</h4>
                                <p><strong>Harga : </strong> Rp. {{ number_format($makanan->harga,0,',','.') }},- / Porsi</p>
                                <p><strong>Stok  : </strong> {{ $makanan->stok}} </p>
                                <hr>
                                <div class="text-right">
                                    <form>
                                        <a href="{{ route('getPemesanan', $makanan->id) }}" class="btn btn-primary">Pesan Sekarang <i class="fa fa-fw fa-chevron-circle-right"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center">
                {{ $makanans->links() }}
            </div>
        </div>  
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>
@endsection