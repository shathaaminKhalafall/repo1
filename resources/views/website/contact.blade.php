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
                    <h1 class="h2">04 : Contact us</h1>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form action="" class="reveal-content">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" placeholder="Enter your message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-lg">Send</button>
                                </div>
                                <div class="col-md-5 address-container">
                                    <ul class="list-unstyled">
                                        <li>
                          <span class="fa-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                          </span>
                                            + 972 599454442
                                        </li>
                                        <li>
                          <span class="fa-icon">
                            <i class="fa fa-at" aria-hidden="true"></i>
                          </span>
                                            Artistorial@gmail.com
                                        </li>
                                        <li>
                          <span class="fa-icon">
                            <i class="fa fa fa-map-marker" aria-hidden="true"></i>
                          </span>
                                            Khan Yunis ,Palestine
                                        </li>
                                    </ul>
                                    <h3>Follow me on social networks</h3>
                                    <a href="http://www.facebook.com" title="" class="fa-icon">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="http://www.twitter.com" title="" class="fa-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="http://www.linkedin.com" title="" class="fa-icon">
                                        <i class="fa fa-linkedin"></i>
                                    </a>

                                </div>
                            </div>
                        </form>
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
