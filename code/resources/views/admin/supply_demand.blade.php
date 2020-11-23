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
                <form class="form-inline">
                    <div class="form-group">
                        <label for="inputPassword6">Origin:</label>
                        <select class="form-control mx-sm-3" id="validationDefault04" required>
                            <option selected disabled value="">Choose Origin</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Destination:</label>
                        <select class="form-control mx-sm-3" id="validationDefault04" required>
                            <option selected disabled value="">Choose Destination</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Year:</label>
                        <select class="form-control mx-sm-3" id="validationDefault04" required>
                            <option selected disabled value="">Choose Year</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Quarter:</label>
                        <select class="form-control mx-sm-3" id="validationDefault04" required>
                            <option selected disabled value="">Choose Quarter</option>
                            <option>...</option>
                        </select>
                    </div>
                    <button class="btn btn-primary my-1" type="submit">Search</button>
                </form>
                <!-- /.row -->

                <!-- Main row -->
                <script src="https://d3js.org/d3.v6.min.js"></script>
                <script src="https://unpkg.com/topojson@3"></script>
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
                                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 772px;" width="1544" height="500" class="chartjs-render-monitor"></canvas>
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

    <script>
        var map = $("#map");

        var svg = d3.select("#map").append("svg")
            .attr("width", map.width())
            .attr("height", map.height())
            .style("font", "15px sans-serif");

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
        });

        // draw airport and route
        // d3.json("sample_route.json").then(function(data){
        //     // draw routes
        //     //sort links by source, then target
        //     // data.route.sort(function(a,b) {
        //     //    if (a.source > b.source) {return 1;}
        //     //    else if (a.source < b.source) {return -1;}
        //     //    else {
        //     //       if (a.target > b.target) {return 1;}
        //     //       if (a.target < b.target) {return -1;}
        //     //       else {return 0;}
        //     //    }
        //     // });
        //     //any links with duplicate source and target get an incremented 'linknum'
        //     // for (var i=0; i<data.route.length; i++) {
        //     //    if (i != 0 &&
        //     //    data.route[i].source == data.route[i-1].source &&
        //     //    data.route[i].target == data.route[i-1].target) {
        //     //       data.route[i].linknum = data.route[i-1].linknum + 1;
        //     //       }
        //     //    else {data.route[i].linknum = 1;};
        //     // };

        //     for (var i=0; i<data.route.length; i++){
        //         var source = data.route[i]["source"];
        //         var target = data.route[i]["target"];
        //         data.route[i]["source"] = data.airport[source]
        //         data.route[i]["target"] = data.airport[target]
        //     }

        //     var route_ids = Array.from(new Set(data.route.map(d => d.route_id)))

        //     var color = d3.scaleOrdinal(d3.schemeTableau10)

        //     // Per-type markers, as they don't inherit styles.
        //     svg.append("defs").selectAll("marker")
        //         .data(route_ids)
        //         .join("marker")
        //             .attr("id", d => `arrow-${d}`)
        //             .attr("viewBox", "0 -5 10 10")
        //             .attr("refX", 15)
        //             .attr("refY", -0.5)
        //             .attr("markerWidth", 4)
        //             .attr("markerHeight", 4)
        //             .attr("orient", "auto-start-reverse")
        //         .append("path")
        //             .attr("fill", color)
        //             .attr("d", "M0,-5L10,0L0,5");

        //     const links = svg.append("g")
        //                     .attr("fill", "none")
        //                     .attr("stroke-width", 2)
        //                     .attr("class", "route")
        //                     .selectAll("path")
        //                     .data(data.route)
        //                     .join("path")
        //                     .attr("stroke", d=>color(d.route_id))
        //                     .attr("marker-end", d => `url(${new URL(`#arrow-${d.route_id}`, location)})`)
        //                     .attr("d", d=>lngLat_to_arc(d, 2));

        //     //draw airports
        //     const airport = new Array();
        //     for (var name in data.airport){
        //             airport.push([name, data.airport[name]]);
        //     }

        //     const node = svg.append("g")
        //                     .attr("fill", "currentColor")
        //                     .attr("stroke-linecap", "round")
        //                     .attr("stroke-linejoin", "round")
        //                     .selectAll("g")
        //                     .data(airport)
        //                     .join("g")
        //     node.append("circle")
        //         .attr("fill", function(d){
        //             if(d[1].is_origin){
        //             return "Red"
        //             }else{
        //             return "Black"
        //             }
        //         })
        //         .attr("r", 4)
        //         .attr("cx", d => lngLat_proj(d[1])[0])
        //         .attr("cy", d => lngLat_proj(d[1])[1])
        //     node.append("text")
        //         .attr("x", d => lngLat_proj(d[1])[0])
        //         .attr("y", d => lngLat_proj(d[1])[1])
        //         .attr("dx", -10)
        //         .attr("dy", -10)
        //         .text(d => d[0])
        //         .attr("fill", function(d){
        //             if(d[1].is_origin){
        //             return "Red"
        //             }else{
        //             return "Black"
        //             }
        //         })
        //         .clone(true).lower()
        //         .attr("stroke", "White")
        //         .attr("stroke-width", 3);

        // });


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
                dr = Math.sqrt(dx*dx + dy*dy)/d.linknum*3;

            return "M" + sourceX + "," + sourceY + "A" + dr + "," + dr + " 0 0,1 " + targetX + "," + targetY;

        }

        function lngLat_proj(lng_lat){
            return projection([lng_lat["LONG"], lng_lat["LAT"]]);
        }

    </script>

@endsection
