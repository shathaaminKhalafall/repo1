<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="description" name="description">
    <meta name="google" content="notranslate" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{url(assets('website'))}}/apple-icon-180x180.png">
    <link href="{{url(assets('website'))}}/favicon.ico" rel="icon">

    <title>View ArtWork</title>

    <link href="{{url(assets('website'))}}/main.3f6952e4.css" rel="stylesheet"></head>

<body class="">
<div id="site-border-left"></div>
<div id="site-border-right"></div>
<div id="site-border-top"></div>
<div id="site-border-bottom"></div>

<header>
    <nav class="navbar  navbar-fixed-top navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav ">
                    <li><a href="{{ url('/') }}" title="">01 : Home</a></li>
                    <li><a href="{{ route('works') }}" title="">02 : View ArtWork</a></li>
                    <li><a href="{{ route('about-us') }}" title="">03 : About us</a></li>
                    <li><a href="{{ route('contact') }}" title="">04 : Contact</a></li>

                </ul>


            </div>
        </div>
    </nav>
</header>

<div class="section-container">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2 section-container-spacer">
                <div class="text-center">
                    <h1 class="h2">Arts Work</h1>
                    <p>A great director gives life to a work of art- gives it a heartbeat… a pulse… opens its eyes to the world.</p>
                </div>
            </div>

            <div class="col-md-12">

                <div id="myCarousel" class="carousel slide projects-carousel">

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                @foreach($works as $work)
                                    <div class="col-sm-4">

                                        <a href="{{ url('/') }}" title="" class="black-image-project-hover">
                                            <img src="{{$work->main_image}}" alt="" class="img-responsive">
                                        </a>
                                        <div class="card-container card-container-lg" style="height: 200px;">
                                            <h3>{{ $work->name }}</h3>
                                            {!! $work->small_description !!}
                                        </div>
                                        <a href="{{ route('showWork' , ['id' => $work->id]) }}" title="" class="btn btn-default" style="margin-left: 110px;">My paintings</a>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<footer class="footer-container text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>© UNTITLED | Website created with Artistoria</p>
            </div>
        </div>
    </div>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        navActivePage();
    });
</script>

<script type="text/javascript" src="{{url(assets('website'))}}/main.70a66962.js"></script>
</body>

</html>
