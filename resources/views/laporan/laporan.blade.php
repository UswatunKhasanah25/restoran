<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
    </style>
    <center>
        <h5>LAPORAN PEMESANAN</h5>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pemesanans as $order)
            <tr>
                <td>{{ $i++ }}.</td>
                <td>{{ $order->created_at->format('d M, Y') }}</td>
                <td>{{ $order->makanan->nama }}</td>
                <td>{{ $order->qty }} Porsi</td>
                <td>
                    @if ($order->status == 0)
                    <label class="label label-warning">Menunggu verifikasi</label>
                    @elseif ($order->status == 1)
                    <label class="label label-info">Pesanan diterima</label>
                    @endif
                </td>
                <td> Rp. {{ number_format($order->total,0,',','.') }},-</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>