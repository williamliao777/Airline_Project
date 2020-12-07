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
                            <label>Airport:</label>
                            <select class="form-control mx-sm-3" name="origin" id="origin" required>
                                <option value="">Choose Airport</option>
                            </select>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary mt-2">Search</button>
                </form>
                <!-- /.row -->

                <!-- Main row -->
                <script src="https://d3js.org/d3.v6.min.js"></script>
                <script src="https://unpkg.com/topojson@3"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Map</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <div id="map" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <!-- LINE CHART -->
                        <div class="card card-info" style="height: 95%">
                            <div class="card-header">
                                <h3 class="card-title">Market Performance</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="BarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>

                                </div>
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

    <body>
        <svg>

        </svg>
    </body>

    <style>
    .states path {
    stroke: white;
    stroke-width: 0.25px;
    fill: lightgrey;
    }
    </style>

    <!-- draw selected routes on the us map-->
    <script>
        var map = $("#map");

        var svg = d3.select("#map").append("svg")
            .attr("width", map.width())
            .attr("height", map.height())
            .style("font", "9px sans-serif");

        var projection = d3.geoAlbersUsa()
                            .scale(map.height()*2)
                            .translate([map.width()/2, map.height()/2]);

        var path = d3.geoPath(projection);

        // load and display the US map
        d3.json("{{asset('json/states-10m.json')}}").then(function(topology) {
            svg.append("g")
                .attr("class", "states")
                .selectAll("path")
                .data(topojson.feature(topology, topology.objects.states).features)
                .enter()
                .append("path")
                .attr("class", "state")
                .attr("d", path);


            var airports_json = JSON.parse('{!!$airports_json!!}')
            var airport_map = new Map();
            for (var i=0; i<airports_json.length; i++){
                airport_map.set(airports_json[i].airport, {"LAT":airports_json[i].LAT, "LON":airports_json[i].LON});
            }
            //draw routes
            var routes_json = JSON.parse('{!!$routes_json!!}')
            var route_ids = Array.from(new Set(routes_json.map(d => d.route_id)))
            var color = d3.scaleOrdinal(d3.schemeTableau10)
            for (var i=0; i<routes_json.length; i++){
                var source = routes_json[i].source;
                var target = routes_json[i].target;
                routes_json[i].source = {"LON":airport_map.get(source).LON, "LAT":airport_map.get(source).LAT};
                routes_json[i].target = {"LON":airport_map.get(target).LON, "LAT":airport_map.get(target).LAT};
            }

            // Per-type markers, as they don't inherit styles.
            svg.append("defs").selectAll("marker")
                .data(route_ids)
                .join("marker")
                    .attr("id", d => `arrow-${d}`)
                    .attr("viewBox", "0 -5 10 10")
                    .attr("refX", 12)
                    .attr("refY", -0.5)
                    .attr("markerWidth", 4)
                    .attr("markerHeight", 4)
                    .attr("orient", "auto-start-reverse")
                .append("path")
                    .attr("fill", color)
                    .attr("d", "M0,-5L10,0L0,5");

            const links = svg.append("g")
                            .attr("fill", "none")
                            .attr("stroke-width", 2)
                            .attr("class", "route")
                            .selectAll("path")
                            .data(routes_json)
                            .join("path")
                            .attr("stroke", d=>color(d.route_id))
                            .attr("marker-end", d => `url(${new URL(`#arrow-${d.route_id}`, location)})`)
                            .attr("d", d=>lngLat_to_arc(d, 2));

            // draw airports
            const node = svg.append("g")
            .attr("fill", "currentColor")
            .attr("stroke-linecap", "round")
            .attr("stroke-linejoin", "round")
            .selectAll("g")
            .data(airports_json)
            .join("g")
            node.append("circle")
                .attr("fill", function(d){
                    if(d.is_origin){
                    return "Red"
                    }else{
                    return "Black"
                    }
                })
                .attr("r", 2.5)
                .attr("cx", d => lngLat_proj(d)[0])
                .attr("cy", d => lngLat_proj(d)[1])
            node.append("text")
                .attr("x", d => lngLat_proj(d)[0])
                .attr("y", d => lngLat_proj(d)[1])
                .attr("dx", -10)
                .attr("dy", -10)
                .text(d => d.airport)
                .attr("fill", function(d){
                    if(d.is_origin){
                    return "Red"
                    }else{
                    return "Black"
                    }
                })
                .clone(true).lower()
                .attr("stroke", "White")
                .attr("stroke-width", 3);

            });

        function lngLat_to_arc(d, bend){
            bend = bend || 1;
            var  sourceXY = lngLat_proj(d["source"]),
                targetXY = lngLat_proj(d["target"]);

            var sourceX = sourceXY[0],
                sourceY = sourceXY[1];

            var targetX = targetXY[0],
                targetY = targetXY[1];


            var dx = targetX - sourceX,
                dy = targetY - sourceY,
                dr = Math.sqrt(dx*dx + dy*dy);


            return "M" + sourceX + "," + sourceY + "A" + dr + "," + dr + " 0 0,1 " + targetX + "," + targetY;

        }

        function lngLat_proj(lng_lat){
            return projection([lng_lat["LON"], lng_lat["LAT"]]);
        }


    </script>

    <!-- draw market performance chart -->

    <script>
        var total_json = JSON.parse('{!!$total_json!!}')

        var label = new Array();
        var data = new Array();
        for(i in total_json){
            label.push(total_json[i].origin+'_'+total_json[i].dest)
            data.push(total_json[i].fare)
        }

        console.log(data)

        var chart = new Chart('BarChart', {
                    type: "horizontalBar",
                    options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    }
                    },
                    data: {
                    labels: label,
                    datasets: [
                        {
                        data: data
                        }
                    ]
                    }
                });

    </script>

    <script>
        $( document ).ready(function() {

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
                    url: "{{route('getAllAirportApi')}}", //Relative or absolute path to response.php file
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


        });
    </script>

@endsection
