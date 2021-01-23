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
            <div class="col-xs-12">
                <img src="{{$work->image1}}" class="img-responsive" alt="">
                <div class="card-container">
                    <div class="text-center">
                        <h1 class="h2">{{$work->name}}</h1>
                    </div>
                    <p> {!! $work->job_description !!}</p>

                    <blockquote>
                        <div class="col-6">
                            {!! $work->description !!}
                        </div>


                    </blockquote>
                </div>
            </div>



            <div class="col-md-8 col-md-offset-2 section-container-spacer">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <img src="{{$work->image2}}" class="img-responsive" alt="">
                        <h2>{{$work->price2}}$</h2>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <img src="{{$work->image3}}" class="img-responsive" alt="">
                        <h2>{{$work->price3}}$</h2>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <img src="{{$work->image4}}" class="img-responsive" alt="">
                <h2>{{$work->price4}}$</h2>
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
