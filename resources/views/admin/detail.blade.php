<div class="row">
    <div class="col-md-5">
        <img src="{{ asset('storage/'.$order->makanan->photo) }}" class="img-responsive" style="margin-bottom: 20px">
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <strong>Customer</strong>
            </div>
            <div class="col-md-8">
                : {{ $order->user->name }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Menu</strong>
            </div>
            <div class="col-md-8">
                : {{ $order->makanan->nama }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Jumlah</strong>
            </div>
            <div class="col-md-8">
                : {{ $order->qty }} Porsi
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <strong>Tanggal</strong>
            </div>
            <div class="col-md-8">
                : {{ date('d M Y - H:i', strtotime($order->order_for)) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Transaksi</strong>
            </div>
            <div class="col-md-8">
                : 
                @if ($order->transaksi == 1)
                    <label class="label label-success"> Transfer </label>
                @else 
                    <label class="label label-danger"> Bayar ke Kasir </label>
                @endif
            </div>
        </div>
        @if ($order->transaksi == 1)
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ asset('storage/'.$order->transfer) }}" class="img-responsive" style="margin-bottom: 20px">
                </div>
            </div>
        @endif
        <hr>
        <div class="row">
            <div class="col-md-4">
                <strong>Total</strong>
            </div>
            <div class="col-md-8">
                : Rp. {{ number_format($order->total,0,',','.') }},-
            </div>
        </div>
    </div>
</div>