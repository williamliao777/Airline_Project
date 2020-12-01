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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form class="form-inline" method="POST" action="{{route('airlineMetrics')}}">
                    @csrf
                    <div class="form-group">
                        <label for="inputPassword6">Market:</label>
                        <select class="form-control mx-sm-3" name="market" id="validationDefault04" required>
                            <option selected disabled value="">Choose Origin</option>
                            @foreach($airports as $airport)
                            <option value="{{$airport->AIRPORT}}" @if($market == $airport->AIRPORT) selected @endif>{{$airport->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Year:</label>
                        <select class="form-control mx-sm-3" name="year" id="validationDefault04" required>
                            <option selected disabled value="">Choose Year</option>
                            <option value="2016" selected>2016</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Quarter:</label>
                        <select class="form-control mx-sm-3" name="quarter" id="validationDefault04" required>
                            <option selected disabled value="">Choose Quarter</option>
                            <option value="1" >1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <button class="btn btn-primary my-1" type="submit">Search</button>
                </form>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Available  Seat  Mile  (ASM)</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="asm" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Revenue  per  Available  Seat  Mile  (RASM)</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="rasmChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Load  Factor</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="lfChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Seat  capacity  share</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="cpsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- LINE CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cost per Available Seat Mile (CASM)</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="casmChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Revenue Passenger Mile (RPM)</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="rpmChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Passenger Yield</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="pyChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Market share</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="msChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <script>
        var asm = JSON.parse('{!! $asm !!}');
        var asm_ctx = document.getElementById('asm').getContext('2d');
        var asmChart = new Chart(asm_ctx, asm);

        var casm = JSON.parse('{!! $casm !!}');
        var casm_ctx = document.getElementById('casmChart').getContext('2d');
        var casmChart = new Chart(casm_ctx, casm);

        var rasm = JSON.parse('{!! $rasm !!}');
        var rasm_ctx = document.getElementById('rasmChart').getContext('2d');
        var rasmChart = new Chart(rasm_ctx, rasm);

        var rpm = JSON.parse('{!! $rpm !!}');
        var rpm_ctx = document.getElementById('rpmChart').getContext('2d');
        var rpmChart = new Chart(rpm_ctx, rpm);

        var lf = JSON.parse('{!! $lf !!}');
        var lf_ctx = document.getElementById('lfChart').getContext('2d');
        var lfChart = new Chart(lf_ctx, lf);

        var py = JSON.parse('{!! $py !!}');
        var py_ctx = document.getElementById('pyChart').getContext('2d');
        var pyChart = new Chart(py_ctx, py);

        var cps = JSON.parse('{!! $cps !!}');
        var cps_ctx = document.getElementById('cpsChart').getContext('2d');
        var cpsChart = new Chart(cps_ctx, cps);

        var ms = JSON.parse('{!! $ms !!}');
        var ms_ctx = document.getElementById('msChart').getContext('2d');
        var msChart = new Chart(ms_ctx, ms);
    </script>
@endsection
