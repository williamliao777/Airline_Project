@extends('layouts.app')

@section('content')
<div class="welcome_content">
    <section class="first-section">
        <div class="main-text">
            <h1>Airline Dashboard</h1>
            <div class="text_box">
                <p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
            <a class="btn btn-lg btn-success" href="#" role="button">View Demo</a>
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
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                <h2>Heading</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                <h2>Heading</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-3">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-3 developer-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
        </div>
    </section>
    <section class="third-section">
        <h1 class="text-center mb-5">Main Features</h1>
        <div class="container-feature">
            <div class="row feature">
                <div class="col-md-7 order-md-2 feature-content">
                    <h2 class="featurette-heading">Airline Metrics</h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic" style="border: 2px solid black">
                    <img src="" alt="">
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Market Performance</h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic" style="border: 2px solid black">
                    <img src="" alt="">
                </div>
            </div>
            <div class="row feature">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Aviation Supply and Demand</h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                </div>
                <div class="col-md-5 order-md-1 pic" style="border: 2px solid black">
                    <img src="" alt="">
                </div>
            </div>
        </div>
        <div class="footer-img">
            <div class="cover-mask"></div>
            <img src="{{asset("img/welcome/airport.jpg")}}" alt="">
        </div>
    </section>
    <!-- Footer -->
    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Copyright &copy; Your Website</small>
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
                markers: true,
                scrub: 1,
                // base vertical scrolling on how wide the container is so it feels more natural.
                // end: () => `+=${smallFactsContainer.offsetWidth}`
                end: "80% 60%"
            }
        });
    });
</script>
@endsection
