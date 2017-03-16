<?php
    session_start();
    error_reporting("E_ALL ^ E_NOTICE");
    require_once('core/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="product" content="Metro UI CSS Framework">
    <meta name="description" content="Simple responsive css framework">
    <meta name="author" content="Sergey S. Pimenov, Ukraine, Kiev">

    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/legend.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>

    <title>MIC-ITB Absen</title>

    <style type="text/css">
        img {
            width: 160px;
            height: 120px;
        }
        .footer-logo {
            width: 180px;
            height: 61px;
            background: url(images/logo_micitb.png);
            float: right;
        }
        #fork {
            position: absolute;
            top: 0;
            right: 0;
            border: 0;
        }

        .legend {
            width: 10em;
            float: right;
            /*border: 1px solid black;*/
        }

        .legend .title {
            display: block;
            margin-bottom: 0.5em;
            line-height: 1.2em;
            padding: 0 0.3em;
        }

        .legend .color-sample {
            display: block;
            float: left;
            width: 1em;
            height: 1em;
            border: 2px solid; /* Comment out if you don't want to show the fillColor */
            /*border-radius: 0.5em;*/ /* Comment out if you prefer squarish samples */
            margin-right: 0.5em;
        }
        .cover-img {
            position: relative;
            background: url(images/1.jpg) no-repeat center center;
            background-size: cover;
            height: 450px;
        }
    </style>
</head>
<body class="metro">
    <?php 
        if(!$_SESSION['login']) {
            getlogin();
            getfooter();
        }
        else {
            echo '<header class="bg-dark" data-load="view/header.php"></header>';
            getcontent();
            getfooter();
        }
    ?>
    <script src="js/hitua.js"></script>
</body>
</html>