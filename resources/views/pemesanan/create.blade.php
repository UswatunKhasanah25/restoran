@extends('layouts.user')

@section('styles')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Pemesanan</h3></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('storage/'.$makanan->photo) }}" class="img-responsive center-block">
                        </div>
                        <div class="col-md-7">
                            <h3 class="page-header">{{ $makanan->nama }}</h3>
                            <p><strong>Harga : </strong> Rp. {{ number_format($makanan->harga,0,',','.') }},- / Porsi </p>
                            <p><strong>Jumlah : </strong> </p>
                            <div class="input-group col-md-4">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-delQty" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="qty" class="form-control" value="{{ $makanan->min_order }}" min="{{ $makanan->min_order }}" style="text-align: center; background-color: white;" >
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-addQty" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <p></p>
                            <div class="input-group col-md-4">
                            <p><strong>No Meja : </strong> </p>
                            <p></p>
                                    <select name="no_meja" class="form-control" id="no_meja">
                                    @foreach ($meja as $m)
                                        <option value="{{$m->id}}">{{$m->nomor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                            <form id="trx" method="POST" action="{{ route('postPemesanan') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="makanan_id" value="{{ $makanan->id }}">
                                <input type="hidden" name="qty" value="{{$makanan->min_order}}">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Pilih Opsi Pembayaran ?</a>
                                                    </h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="radio-inline"><input type="radio" name="transaksi" checked="checked" value="1"><i>Transfer </i></label>
                                                    <label class="radio-inline"><input type="radio" name="transaksi" value="0"><i>Bayar ke Kasir</i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal :</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" name="for_date" class="form-control" id="datepicker" required="required" value="{{ $date->format('m/d/Y') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 transaksi">
                                                        <div class="form-group">
                                                            <label for="cover">Bukti Transfer</label>
                                                            <div class="input-group date">
                                                                <input type="file" name="transfer">
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-5 hidden-xs">
                            <a href="{{ url('/home') }}" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group pull-right">
                                    <span class="input-group-addon">Total - Rp. </span>
                                    <input type="text" name="total" class="form-control" placeholder="total..." readonly="readonly" style="background-color: white">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary pull-right" type="button" onclick="document.getElementById('trx').submit()">Lanjut pemesanan <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('scripts')
    <!-- InputMask -->
    <script src="{{ asset('assets/jquery-mask/dist/jquery.mask.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('assets/dashboard/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('assets/dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            total();

            function total() {
                var total = parseInt({{ $makanan->harga }}) * parseInt($('input[name=qty]').val());
                $('input[name=total]').unmask();
                $('input[name=total]').val(total).mask('999.999.999', {reverse: true});
            }

            $('.btn-addQty').click(function(event) {
                var addQty = parseInt($('input[name=qty]').val()) + 1;
                $('input[name=qty]').val(addQty);
                total();
            });

            $('.btn-delQty').click(function(event) {
                if (parseInt($('input[name=qty]').val()) == parseInt($('input[name=qty]').attr('min'))) {
                    return false;
                }
                var addQty = parseInt($('input[name=qty]').val()) - 1;
                $('input[name=qty]').val(addQty);
                total();
            });

            $('input[name=qty]').change(function(event) {
                $(this).val($(this).val());
            });

            $('.timepicker').timepicker({
                showInputs: false,
                minuteStep: 1,
                showMeridian: false,
            });

            $('#datepicker').datepicker({
                autoclose: true,
                todayBtn: "linked",
                todayHighlight: true,
            });

            $('input[name=transaksi]').change(function(event) {
                if ($(this).val() == 1) {
                    $('.transaksi').show();
                } else {
                    $('.transaksi').hide();
                }
            });
        });
    </script>
@endsection
