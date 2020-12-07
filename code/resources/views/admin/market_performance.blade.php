@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 966px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$current_menu}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-1">
                            <label for="inputPassword6">Year:</label>
                            <select class="form-control mx-sm-3" name="year" id="year" required>
                                <option value="2016" selected>2016</option>
                            </select>
                        </div>
                        <div class="form-group col-1">
                            <label for="inputPassword6">Quarter:</label>
                            <select class="form-control mx-sm-3" name="quarter" id="quarter" required>
                                <option value="" >Choose Quarter</option>
                                <option value="3" >3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-1">
                            <label>Origin:</label>
                            <select class="form-control mx-sm-3" name="origin" id="origin" required>
                                <option value="">Choose Origin</option>
                            </select>
                        </div>
                        <div class="form-group col-1">
                            <label for="inputPassword6">Destination:</label>
                            <select class="form-control mx-sm-3" name="destination" id="destination" required>
                                <option value="">Choose Destination</option>
                            </select>
                        </div>
                    </div>
                    <p>
                        <button class="btn-lg btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Select Airline
                        </button>
                    </p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-row collapse" id="collapseExample">
                        <label for="inputPassword6">Airline:</label>
                        <div class="form-group col-12 airline_group_div">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Search</button>
                </form>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Total Flights</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="total_flights" style="min-height: 250px; " class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Available Seat Mile</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="asm" style="min-height: 250px; " class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">PSL</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="psl" style="min-height: 250px; " class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Revenue per Available Seat Mile</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="rasm" style="min-height: 250px;" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Average Fare</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="af" style="min-height: 250px; " class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Total Share</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="mscs" style="min-height: 250px; " class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>

<script>
$( document ).ready(function() {

    var limit = 10;
    $('.airline_checkbox').on('change', function(evt) {
        if($('.airline_checkbox').filter(':checked').length > limit) {
            alert("Max 10 Airlines");
            this.checked = false;
        }
    });

    $('#quarter').on('change', function(evt) {

        var year = 2016;
        var quarter = $(this).val();
        $('#origin').find('option').remove();
        $('#origin').append('<option value="">Choose Origin</option>');

        var data = {
            "year": year,
            "quarter" : quarter
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('getAllOriginApi')}}", //Relative or absolute path to response.php file
            data: data,
            success: function(data) {
                var i;
                for ( i = 0; i < data.length; i++) {
                    $('#origin').append($('<option>',{
                        value: data[i].code,
                        text: '('+ data[i].code + ') '+ data[i].name
                    }));
                }
            }
        });
    });

    $('#origin').on('change', function(evt) {

        var year = 2016;
        var quarter = $('#quarter').val();
        var origin = $(this).val();
        $('#destination').find('option').remove();
        $('#destination').append('<option value="">Choose Destination</option>');

        var data = {
            "year": year,
            "quarter" : quarter,
            "origin" : origin
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('getAllDestApi')}}", //Relative or absolute path to response.php file
            data: data,
            success: function(data) {
                var i;
                for ( i = 0; i < data.length; i++) {
                    $('#destination').append($('<option>',{
                        value: data[i].code,
                        text: '('+ data[i].code + ') '+ data[i].name
                    }));
                }

            }
        });
    });

    $('#destination').on('change', function(evt) {

        var year = 2016;
        var quarter = $('#quarter').val();
        var origin = $('#origin').val();
        var destination = $(this).val();
        $('#destination').find('.airline_group').remove();

        var data = {
            "year": year,
            "quarter" : quarter,
            "origin" : origin,
            "destination" : destination
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('getAllAirline')}}", //Relative or absolute path to response.php file
            data: data,
            success: function(data) {
                console.log(data);
                var i;
                for ( i = 0; i < data.length; i++) {
                    var append_str = '<div class="form-check form-check-inline col-4 airline_group"><input class="form-check-input airline_checkbox" name="airline[]" type="checkbox" id="'+ data[i].code +'" value="'+ data[i].code +'"><label class="form-check-label" for="'+ data[i].code +'">'+ data[i].name +'</label></div>';
                    $('#collapseExample').append(append_str);

                }

            }
        });
    });

    var total_flights = JSON.parse('{!! $total_flights !!}');
    var total_flights_ctx = document.getElementById('total_flights').getContext('2d');
    var total_flightsChart = new Chart(total_flights_ctx, total_flights);

    var psl = JSON.parse('{!! $psl !!}');
    var psl_ctx = document.getElementById('psl').getContext('2d');
    var pslChart = new Chart(psl_ctx, psl);

    var af = JSON.parse('{!! $af !!}');
    var af_ctx = document.getElementById('af').getContext('2d');
    var afChart = new Chart(af_ctx, af);

    var asm = JSON.parse('{!! $asm !!}');
    var asm_ctx = document.getElementById('asm').getContext('2d');
    var asmChart = new Chart(asm_ctx, asm);

    var rasm = JSON.parse('{!! $rasm !!}');
    var rasm_ctx = document.getElementById('rasm').getContext('2d');
    var rasmChart = new Chart(rasm_ctx, rasm);

    var mscs = JSON.parse('{!! $mscs !!}');
    var mscs_ctx = document.getElementById('mscs').getContext('2d');
    var mscsChart = new Chart(mscs_ctx, mscs);

});
</script>
@endsection
