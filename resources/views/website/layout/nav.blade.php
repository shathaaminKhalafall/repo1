<nav class="navbar  navbar-fixed-top navbar-inverse">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav ">
                <li><a href="./index.html" title="">01 : Home</a></li>
                <li><a href="{{ route('works') }}" title="">02 : View Artworks</a></li>
                <li><a href="{{ route('about-us') }}" title="">03 : About us</a></li>
                <li><a href="{{ route('contact') }}" title="">04 : Contact</a></li>
            </ul>


        </div>
    </div>
</nav>
