<div class="row">
    <div class="col-md-5">
        <img class="img-responsive" src="{{ asset('storage/'.$order->makanan->photo) }}" >
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-5">
                <strong>Menu</strong>
            </div>
            <div class="col-md-7">
                : {{ $order->makanan->nama }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Jumlah pesanan</strong>
            </div>
            <div class="col-md-7">
                : {{ $order->qty }} Porsi
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Total bayar</strong>
            </div>
            <div class="col-md-7">
                : Rp. {{ number_format($order->total,0,',','.') }},-
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <strong>Tanggal Pemesanan</strong>
            </div>
            <div class="col-md-7">
                : {{ date('d M Y', strtotime(date("Y-m-d"))) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Metode Pembayaran</strong>
            </div>
            <div class="col-md-7">
                : 
                @if ($order->delivery == 1)
                <label class="label label-success"> Transfer </label>
                @else 
                <label class="label label-danger"> Bayar ke Kasir </label>
                @endif
            </div>
        </div>
        @if ($order->delivery == 1)
        @endif
    </div>
</div>