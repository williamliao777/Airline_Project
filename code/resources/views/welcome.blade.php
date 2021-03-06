@extends('layouts.app')

@section('content')
<div class="welcome_content">
    <section class="first-section">
        <div class="main-text">
            <h1>Airline Dashboard</h1>
            <div class="text_box">
                <p>Financial and operating monitoring for airline companies.</p>
            </div>
            <a class="btn btn-lg btn-success" href="{{route('airlineMetrics')}}" role="button">View Demo</a>
        </div>
        <img src="{{ asset('img/welcome/sky.jpg') }}" id="sky">
        <img src="{{ asset('img/welcome/airplane.png') }}" id="airplane">
        <div class="clouds">
            <img src="{{ asset('img/welcome/cloud1.png') }}" style="--i:1">
            <img src="{{ asset('img/welcome/cloud2.png') }}" style="--i:2">
            <img src="{{ asset('img/welcome/cloud3.png') }}" style="--i:3">
            <img src="{{ asset('img/welcome/cloud4.png') }}" style="--i:4">
            <img src="{{ asset('img/welcome/cloud5.png') }}" style="--i:5">
            <img src="{{ asset('img/welcome/cloud1.png') }}" style="--i:10">
            <img src="{{ asset('img/welcome/cloud2.png') }}" style="--i:9">
        </div>
        <div class="scroll-down"></div>
    </section>
    <section class="second-section container mb-5">
        <h1 class="text-center m-5">Developer</h1>
        <div class="row developer">
            <div class="col-lg-3 developer-1">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect>
                    <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    <image href="{{asset("img/welcome/chi.png")}}" height="140" width="140"/>
                </svg>
                <h2>Chi Zhang</h2>
                <p>chiz@vt.edu</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect>
                    <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    <image href="{{asset("img/welcome/william.png")}}" height="140" width="140"/>
                </svg>
                <h2>Che-Hsien Liao</h2>
                <p>chehsien@vt.edu</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-3">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect>
                    <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    <image href="{{asset("img/welcome/kevin.jpg")}}" height="140" width="140"/>
                </svg>
                <h2>Kai-Hsiang Cheng</h2>
                <p>khc@vt.edu</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect>
                    <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    <image href="{{asset("img/welcome/gary.png")}}" height="140" width="140"/>
                </svg>
                <h2>Gengrui Wei</h2>
                <p>gwei1@vt.edu</p>
            </div><!-- /.col-lg-4 -->
        </div>
    </section>
    <section class="third-section">
        <h1 class="text-center mb-5">Main Features</h1>
        <div class="container-feature">
            <div class="row feature">
                <div class="col-md-7 order-md-2 feature-content">
                    <h2 class="featurette-heading">Airline Metrics</h2>
                    <p class="lead">The first module visualizes the airline metrics in airline-level, showing the ranking and volume of selected airlines.</p>
                    <p><a class="btn btn-primary" href="{{route('airlineMetrics')}}" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic">
                    <img src="{{asset("img/welcome/market_performance.png")}}" alt="" style="width: 100%; height: 100%">
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Market Performance</h2>
                    <p class="lead">The second module visualizes the performance of airlines in market-level (non-stop route).</p>
                    <p><a class="btn btn-primary" href="{{route('MarketPerformance')}}" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic">
                    <img src="{{asset("img/welcome/market_performance.png")}}" alt="" style="width: 100%; height: 100%">
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Market potential</h2>
                    <p class="lead">The third module visualizes the potential market metric, indicating prospective bussiness value, in airport-level. A potential market means a market with high passenger yield and low loading factor (non-saturated market)</p>
                    <p><a class="btn btn-primary" href="{{route('supplyDemand')}}" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic">
                    <img src="{{asset("img/welcome/supply_demand.png")}}" alt="" style="width: 100%; height: 100%">
                </div>
            </div>
        </div>
        <div class="footer-img">
            <div class="cover-mask"></div>
            <img src="{{asset("img/welcome/airport.png")}}" style="box-shadow:3px 3px 12px gray;" alt="">
        </div>
    </section>
    <!-- Footer -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Virginia Tech 2020 Fall Database Management Group 4.</small>
        </div>
    </footer>
    <!-- Footer -->
</div>
<script>
    $(function() {

        gsap.registerPlugin(ScrollTrigger);
        gsap.from(".main-text",{
            duration:1.5,
            opacity:0,
            y: 100
        });

        gsap.to("#airplane",{
            scrollTrigger : {
                scrub: true
            },
            x: 1500,
            y: 500,
            scale: 1
        });

        //section two title
        gsap.from(".second-section h1",{
            scrollTrigger: {
                trigger: ".second-section h1",
                start: "20% 76%",
                toggleActions: "restart reverse reverse reverse",
                scrub: true
            },
            duration:1,
            opacity:0,
            y: -50
        });

        //section two developer
        gsap.from(".developer-1",{
            scrollTrigger: {
                trigger: ".second-section h1",
                toggleActions: "restart none none none",
                start: "top 65%",
                end: "top 50%",
                scrub: true
            },
            ease: Power1.easeOut,
            duration:2,
            opacity:0,
            x: -200
        });

        gsap.from(".developer-2",{
            scrollTrigger: {
                trigger: ".second-section h1",
                toggleActions: "restart none none none",
                start: "top 65%",
                end: "top 50%",
                scrub: true
            },
            ease: Power1.easeOut,
            duration:2,
            opacity:0,
            x: -200
        });

        gsap.from(".developer-3",{
            scrollTrigger: {
                trigger: ".second-section h1",
                toggleActions: "restart none none none",
                start: "top 65%",
                end: "top 50%",
                scrub: true
            },
            ease: Power1.easeOut,
            duration:2,
            opacity:0,
            x: 200
        });

        gsap.from(".developer-4",{
            scrollTrigger: {
                trigger: ".second-section h1",
                toggleActions: "restart none none none",
                start: "top 65%",
                end: "top 50%",
                scrub: true
            },
            ease: Power1.easeOut,
            duration:2,
            opacity:0,
            x: 200
        });

        //develop fade out
        gsap.to(".developer",{
            scrollTrigger: {
                trigger: ".developer",
                toggleActions: "restart none none none",
                start: "bottom 30%",
                end: "bottom 20%",
                scrub: true
            },
            ease: Power1.easeOut,
            duration:2,
            opacity:0,
            y: -200
        });


        let scroll_tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.third-section',
                start: "top center",
                // pin: true,
                scrub: true,
                // end: "+=300",
                // markers: true,
            }
        });
        let features = [...document.querySelectorAll('.feature')];

        scroll_tl.to(features, {
            xPercent: -100 * (features.length - 1),
            scrollTrigger: {
                trigger: ".third-section",
                start: "top 0%",
                pin: true,
                // horizontal: true,
                pinSpacing:false,
                anticipatePin: 1,
                scrub: 1,
                // base vertical scrolling on how wide the container is so it feels more natural.
                // end: () => `+=${smallFactsContainer.offsetWidth}`
                end: "80% 60%"
            }
        });
    });
</script>
@endsection
