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
        <link rel="stylesheet" href="/lib/normalize/normalize.css">
        <link rel="stylesheet" href="/style/boilerplate.css">
        <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
        <!-- CSS tema milik kita sendiri -->
        <link rel="stylesheet" href="/style/main.min.css">

        <!-- Library JS -->
        <script src="/lib/modernizr/modernizr-2.6.2.min.js"></script>
        <script src="/lib/bootstrap/script/bootstrap.min.js"></script>


        <!-- Costum content per page -->
        @yield('head')
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!-- Add your site or application content here -->
        @yield('body', "Generic content")


        <!-- Footer of base template -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/lib/jquery/jquery-1.10.2.min.js"><\/script>')</script>

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
        <script src="http://192.168.1.1:9000/livereload.js?snipver=1"></script>
        @endif
    </body>
</html>
