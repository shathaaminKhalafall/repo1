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

    <title>Title page</title>

    <link href="{{url(assets('website'))}}/main.3f6952e4.css" rel="stylesheet"></head>

<body class="">
<div id="site-border-left"></div>
<div id="site-border-right"></div>
<div id="site-border-top"></div>
<div id="site-border-bottom"></div>
<!-- Add your content of header -->
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
                <div class="section-container-spacer text-center">
                    <h1 class="h2">03 : About us</h1>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h3>Artistoria site idea </h3>
                                <p>In Gaza there are many artists, not famous, so we thought of creating a website that provides artistic services in one place.
                                    Its goal is to facilitate access to various services and provide the user with more options. At the same time providing job opportunities for people who have technical services such as painter. And the opportunity for unknown people to become known in the community. .</p>
                                <h3>Join us </h3>
                                <p>It is a page where artists can display their talents, present their work, and see the talents of other artists on our site.
                                    About and contact  </p>
                                <h3>How to contact us</h3>
                                <p>The contact page contains sites to contact us and send your beautiful paintings or request a painting from us
                                </p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <img src="https://image.freepik.com/free-vector/art-workshop-studio_74855-5217.jpg?fbclid=IwAR0qKj-n7rEiENzVrFSl5kIq6B_mkGkOTHYOnToA2ykqBkA4k1jcieGbIGg" class="img-responsive" alt="">
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
                <p>© UNTITLED | Website created with Artistoria </p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        navActivePage();
    });
</script>

<script type="text/javascript" src="{{url(assets('website'))}}/main.70a66962.js"></script></body>

</html>
