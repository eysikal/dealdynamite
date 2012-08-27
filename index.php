<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-30578203-1']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<?php
// Instantiator for dependency injection
require_once 'class/Instantiator.php';

// Grab the request portion of the URI (if any)
$deal_request = ltrim($_SERVER['REQUEST_URI'], '/');
$ref_url = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER']  : null ;
$user_ip = (!empty($_SERVER["REMOTE_ADDR"])) ? $_SERVER["REMOTE_ADDR"] : null;

if (!empty($deal_request)) {
    $router = Instantiator::makeRouter();
    $router->route($deal_request, $ref_url, $user_ip);    
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Deal Dynamite! Our Deals Are Explosive! murr</title>
    <meta charset="utf-8">
    <style type="text/css">
        body {
            background-color: dodgerblue;
            font-family: Arial, sans-serif;
        }
        #wrapper {
            font-family: Arial, sans-serif;
            margin: 0px auto;
            width: 800px;
        }
        #header {
            background-color: #dde;
            border: 2px solid dodgerblue;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            border-top-left-radius: 25px;
            margin: 20px auto;
            text-align: center;
            width: 600px;
        }
        #content {
            background-color: hotpink;
            color: dodgerblue;
            border: 2px solid dodgerblue;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-bottom-left-radius: 25px;
            border-top-left-radius: 25px;
            font-size: 24px;
            font-weight: bold;
            margin: 20px auto;
            text-align: center;
            width: 600px;            
        }
        #first-deal-span {
            font-size: 16 px;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-30578203-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>DealDynamite.com</h1>
            <h2>deals so good, they're explosive!</h2>
        </div>
        <div id="content">
            <br><br><br>
            <a href="http://www.dealdynamite.com/mog-free-music">FREE STREAMING MUSIC</a>
            <br>
            <a href="http://www.dealdynamite.com/hans-dampf-free-shipping">Schwalbe Hans Dampf - Set of 2 for $133.90 shipped</a>
            <br><br><br><br><br><br><br><br>
        </div>
    </div>
</body>
</html>
