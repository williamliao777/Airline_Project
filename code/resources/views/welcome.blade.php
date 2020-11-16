@extends('layouts.app')

@section('content')
<div class="welcome_content">
    <section>
        <img src="{{ asset('img/welcome/sky.jpg') }}" id="sky">
        <img src="{{ asset('img/welcome/cloud1.png') }}" id="cloud1">
        <img src="{{ asset('img/welcome/cloud2.png') }}" id="cloud2">
        <img src="{{ asset('img/welcome/cloud3.png') }}" id="cloud3">
        <img src="{{ asset('img/welcome/cloud4.png') }}" id="cloud4">
        <img src="{{ asset('img/welcome/cloud5.png') }}" id="cloud5">
        <img src="{{ asset('img/welcome/airplane.png') }}" id="airplane">
    </section>
    <div>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
        <h1>test</h1>
    </div>
</div>
<script src="{{ asset('js/gsap.js') }}"></script>
<script src="{{ asset('js/ScrollTrigger.js') }}"></script>
<script>
    $(function() {
        gsap.to("#sky",{
            scrollTrigger : {
                scrub: true
            },
            y: 200,
            scale: 1.5
        });


        gsap.to("#cloud1",{
            scrollTrigger : {
                scrub: true
            },
            x: -400,
        });
        gsap.to("#cloud2",{
            scrollTrigger : {
                scrub: true
            },
            x: 300,
        });

        gsap.to("#airplane",{
            scrollTrigger : {
                scrub: true
            },
            x: 1000,
            y: 200,
            scale: 1
        });
    });

</script>
@endsection
