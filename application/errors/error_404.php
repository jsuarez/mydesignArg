<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Error 404</title>
    <base href="http://localhost/mydesign_ar.git" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

    <!-- Framework CSS (BLUE PRINT) -->
    <link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection"/>
    <link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"/>
    <!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
    <!-- END FRAMEWORK -->

    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
    <link href="css/styleIE7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if IE 6]>
    <link href="css/styleIE6.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

    <script type="text/javascript">
    <!--
        if( $.browser.opera ) $('head').append($('<link href="css/styleOpera.css" rel="stylesheet" type="text/css" />'));
        if( $.browser.safari ) $('head').append($('<link href="css/styleSafari.css" rel="stylesheet" type="text/css" />'));
    -->
    </script>

    <!--[if IE 6]>
    <script type="text/javascript">
        var IE6UPDATE_OPTIONS = {
            icons_path: "js/ie6update/ie6update/images/"
        }
    </script>
    <script type="text/javascript" src="js/ie6update/ie6update/ie6update.js"></script>
    <![endif]-->

    <!--[if IE 6]>
    <script type="text/javascript" src="js/DD_belatedPNG.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

<div class="span-24 last">
    <!-- ================  HEADER  ================ -->
    <div class="span-22 prepend-1 append-1 last header">
        <?php require('includes/header_inc.php');?>
    </div>
    <!-- ================  FIN HEADER  ================ -->

    <!-- =============== CONTAINER CENTRAL =============== -->
    <div class="clear span-22 prepend-1 append-1 last">
        <div class="span-22 container-head ">


            <!-- ============= SOLICITAR INFO ============= -->
            <div class="form-info">
                <div class="form-top"><h4>Solicitar Informaci&oacute;n</h4></div>
                <div class="form-center">
                    <div id="si-mask" class="mask"></div>
                    <div id="si-ajaxloader" class="ajaxloader"></div>
                    <?php require('includes/solicitarinfo_inc.php');?>
                </div>
                <div class="form-bottom"></div>
            </div>
            <!-- ============= FIN SOLICITAR INFO ============= -->
        </div>
    </div>



</body>
</html>
