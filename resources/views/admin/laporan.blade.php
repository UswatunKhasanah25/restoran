@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet"
    href="{{ asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
    {{-- Page Header --}}
    <section class="content-header">
        <h1> Orders </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-cog"></i> Orders</a></li>
            <li class="active">Complete Order</li>
        </ol>
    </section>

    {{-- Page Content --}}
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Cetak Laporan Pemesanan</h3> <br> <br>
                <a href="/Laporan/print" class=" fa fa-file-pdf-o btn btn-primary" target="_blank"> CETAK
                    PDF</a>
            </div>
        </div>
    </section>
    </script>
    @endsection