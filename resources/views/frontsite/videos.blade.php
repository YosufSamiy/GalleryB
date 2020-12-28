@section('page-title')
    Videos
@endsection

@include('frontsite.layouts.header')

<div class="container">

<body>
<!-- Page Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
@include('frontsite.layouts.menu')

<div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
    <video autoplay muted loop id="tm-video">
        <source src="video/hero.mp4" type="video/mp4">
    </video>
    <i id="tm-video-control-button" class="fas fa-pause"></i>
    <form class="d-flex position-absolute tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Videos
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 180
            </form>
        </div>
    </div>
    <div class="row tm-mb-90 tm-gallery">

            @foreach($video as $as)

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">

                    <iframe width="420" height="315" src="https://www.youtube.com/embed" frameborder="0" allowfullscreen></iframe>

                    </iframe>
            <h3 style="color: #ffffff">{{$as->name}}</h3>
                </figure>
            <div class="d-flex justify-content-between tm-text-gray">
                <span>14 Aug 2020</span>
            </div>
        </div>
        @endforeach

    </div> <!-- row -->
    <div class="row tm-mb-90">
        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
            <div class="tm-paging d-flex">
                <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                <a href="javascript:void(0);" class="tm-paging-link">2</a>
                <a href="javascript:void(0);" class="tm-paging-link">3</a>
                <a href="javascript:void(0);" class="tm-paging-link">4</a>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
        </div>
    </div>
</div> <!-- container-fluid, tm-container-content -->

<div class="tm-bg-gray pt-5 pb-3 tm-text-gray">
    <div class="container-fluid tm-container-small">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4">About Catalog-Z</h3>
                <p>Catalog-Z is free Bootstrap 5 Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4">Our Links</h3>
                <ul class="tm-footer-links pl-0">
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Our Company</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                    <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                    <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                </ul>
                <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                Copyright 2020 Catalog-Z Company. All rights reserved.
            </div>
            <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
            </div>
        </div>
    </div>
</div>

<script src="js/plugins.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });

    $(function(){
        /************** Video background *********/

        function setVideoSize() {
            const vidWidth = 1280;
            const vidHeight = 720;
            const maxVidHeight = 400;
            let windowWidth = window.innerWidth;
            let newVidWidth = windowWidth;
            let newVidHeight = windowWidth * vidHeight / vidWidth;
            let marginLeft = 0;
            let marginTop = 0;

            if (newVidHeight < maxVidHeight) {
                newVidHeight = maxVidHeight;
                newVidWidth = newVidHeight * vidWidth / vidHeight;
            }

            if(newVidWidth > windowWidth) {
                marginLeft = -((newVidWidth - windowWidth) / 2);
            }

            if(newVidHeight > maxVidHeight) {
                marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
            }

            const tmVideo = $('#tm-video');

            tmVideo.css('width', newVidWidth);
            tmVideo.css('height', newVidHeight);
            tmVideo.css('margin-left', marginLeft);
            tmVideo.css('margin-top', marginTop);
        }

        setVideoSize();

        // Set video background size based on window size
        let timeout;
        window.onresize = function () {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background
        const btn = $("#tm-video-control-button");

        btn.on("click", function (e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    });
</script>
</body>
</div>

</html>
