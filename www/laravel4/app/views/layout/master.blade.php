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
                            <li class="navbar-text">Login sebagai tim {{ Auth::user()->userable->team_name }}</li>
                            <li>{{ link_to_route('participant.dashboard', 'Dashboard') }}</li>
                            <li>{{ link_to_route('participant.logout', 'Logout') }}</li>
                        @elseif(Auth::user()->userable_type == 'Admin')
                            <li class="navbar-text">Login sebagai ADMIN {{ Auth::user()->userable->name }}</li>
                            <li>{{ link_to_route('admin.dashboard', 'Dashboard') }}</li>
                            <li>{{ link_to_route('admin.logout', 'Logout') }}</li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Add your site or application content here -->
        @yield('body', "Generic content")

        <footer>
            Tes ini adalah bagian footer.
        </footer>


        <!-- Footer of base template -->
        <!-- Temporary commented
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script>window.jQuery || document.write('<script src="/lib/jquery/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Library JS -->
        <script src="/lib/modernizr/modernizr-2.6.2.min.js"></script>
        <!-- Temporary commented
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="/script/main.min.js"></script>

        @yield('script')

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
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
            <script src="http://localhost:9000/livereload.js?snipver=1"></script>
        @endif
    </body>
</html>
