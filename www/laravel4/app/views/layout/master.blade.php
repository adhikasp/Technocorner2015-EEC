<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Website Tes Online EEC Technocorner 2015">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="/img/favicon.ico">

        <!-- Library CSS -->
        <!-- Normalize + html5 boilerplate -->
        <link rel="stylesheet" href="/style/reset.min.css">
        <!-- Temporary commented
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- One styles to rule them ALL! -->
        <link rel="stylesheet" href="/style/styles.min.css">

        <!-- Costum content per page -->
        @yield('head', '<title>Technocorner 2015</title>')
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse">
                        <span class="sr-only">Buka navigasi</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a href="#" class="navbar-brand"><img src="/img/logo-cathead.png" class="img-responsive"></a>
                <a href="#" class="navbar-brand">TECHNOCORNER 2015</a>
                </div>

                <div class="collapse navbar-collapse" id="menu-collapse">
                  <ul class="nav navbar-nav navbar-left">
                    @unless(Auth::check())
                      <li><a href="/home">Home</a></li>
                    @endunless
                    <li><a href="//technocornerugm.com" target="_blank">Web Official</a></li>
                  </ul>

                  @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                      @if(Auth::user()->userable_type == 'Participant')
                        <li class="navbar-text">Hai Tim <strong>{{ Auth::user()->userable->team_name }}</strong></li>
                        <li>{{ link_to_route('participant.dashboard', 'Dashboard') }}</li>
                        <li>{{ link_to_route('participant.logout', 'Logout') }}</li>
                      @elseif(Auth::user()->userable_type == 'Admin')
                        <li class="navbar-text">Hai Admin <strong>{{ Auth::user()->userable->name }}</strong></li>
                        <li>{{ link_to_route('admin.dashboard', 'Dashboard') }}</li>
                        <li>{{ link_to_route('admin.logout', 'Logout') }}</li>
                      @endif
                    </ul>
					<div class="timer col-sm-1"></div>
                  @endif
                </div>
            </div>
        </nav>

        <!-- Add your site or application content here -->
        @yield('body', "Generic content")

        <footer>
            <div class="col-sm-4">
                <h2>Dipersembahkan oleh</h2>
                <a target="_blank" href="//ugm.ac.id">
                    <img class="logo img-responsive"src="//technocornerugm.com/img/logo-ugm.png" alt="">
                </a>
                <a target="_blank" href="//kmteti.ugm.ac.id">
                    <img class="logo img-responsive"src="//technocornerugm.com/img/logo-kmteti.png" alt="">
                </a>
            </div>
            <div class="col-sm-8">
                <h2>Kontak</h2>
                <img src="//technocornerugm.com/img/icon-cp.png" class="icon"> </span> 085640700720 (Andika) <br>
                <img src="//technocornerugm.com/img/icon-alamat.png" class="icon"> technocornerugm@gmail.com <br>
                <img src="//technocornerugm.com/img/icon-sosmedf.png" class="icon"> TechnocornerUGM <br>
                <img src="//technocornerugm.com/img/icon-sosmedt.png" class="icon"> @TechnocornerUGM <br>
                <img src="//technocornerugm.com/img/icon-sosmedaskfm16.png" class="icon"> Ask TechnocornerUGM
             </div>

        </footer>

        <div id="copyright" class="col-sm-12">
            <div class="col-sm-8">
                <p>
                    Hak cipta © 2015 <br>
                    Tim Technocorner
                </p>
            </div>
            <div class="col-sm-4 cc">
                <p>Common Creative License <br>
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Lisensi Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png"></a></p>
            </div>
        </div>


        <!-- Footer of base template -->
        <!-- Temporary commented
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="/lib/jquery/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Library JS -->
        <script src="/lib/modernizr/modernizr-2.6.2.min.js"></script>
        <!-- Temporary commented
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
		<script src="//cdn.mathjax.org/mathjax/latest/MathJax.js?config=AM_HTMLorMML-full"></script>
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="/script/main.min.js"></script>

        @yield('script')

        <script>
        /*  Google Analytics gak usah dipakai dulu
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        */
        </script>
        @if( App::environment() == 'local')
            {{--
            * window.location.href will return full current url
            * then split it at '/', and get the third elemet (always the domain/ip of url)
            --}}
            <script>
                document.write('<script src="http://' + window.location.href.split('/')[2].split(':')[0] + ':9000/livereload.js?snipver=1"><\/script>');
            </script>
        @endif
    </body>
</html>
