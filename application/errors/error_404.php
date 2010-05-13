<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title>Error 404</title>
    <base href="http://192.168.0.2/trabajos/mydesign_ar.git/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="cache-control" content="public" />
    <meta name="robots" content="none" />

    <link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

    <!-- Framework CSS (BLUE PRINT) -->
    <link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection"/>
    <link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"/>
    <!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
    <!-- END FRAMEWORK -->

    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
    <link href="css/styleIE7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if IE 6]>
    <link href="css/styleIE6.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/class/class.contact.min.js"></script>
    <!-- ========== SCRIPT LAVALAMP (Efecto Menu) ============-->
    <script type="text/javascript" src="js/plugins/jquery.lavalamp/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.lavalamp/jquery.lavalamp.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.lavalamp/execute.js"></script>
    <!-- ========== END SCRIPT ======= -->
    <!-- ========== SCRIPT VALIDATOR ============-->
    <link type="text/css" href="js/plugins/jquery.validator/css/style.css" rel="stylesheet"  />
    <!--[if IE 6]>
    <link rel="stylesheet" href="js/plugins/jquery.validator/css/styleIE6.css" type="text/css" />
    <![endif]-->
    <script type="text/javascript" src="js/plugins/jquery.validator/js/script.min.js"></script>
    <!-- ========== END SCRIPT ======= -->

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
            <div class="span-22 last">
                <div class="span-7 push-1"><a href="http://www.mydesign.com.ar/"><img src="images/logo.png" alt="Diseño Web www.mydesign.com.ar"/></a></div>

                <div class="support"><a href="javascript:void(openWindow(baseURI+'chat', {width:280, height:320, center:true, name: 'Chat Online'}))"><b>Soporte en l&iacute;nea</b></a></div>
                <div class="span-7 float-right">
                    <div class="icon-phone"><img src="images/icon_phone.png" alt="" /></div>
                    <div class="float-left">
                        <div class="separator"><span class="text-detach">Mendoza </span><b>(0261) </b>4237658</div>
                        <div class="clear"><span class="text-detach">Bah&iacute;a Blanca </span><b>(0291) </b>154-195047</div>
                    </div>
                </div>
            </div>
            <div class="clear span-22 last menu">
                <ul id="lavaLampMenu">
                    <li class="current"><h2><a href="http://www.mydesign.com.ar/disenio_web.php">Dise&ntilde;o Web</a></h2></li>
                    <li><h2><a href="http://www.mydesign.com.ar/disenio_grafico.php">Dise&ntilde;o Gr&aacute;fico</a></h2></li>
                    <li><h2><a href="http://www.mydesign.com.ar/marketing_online.php">Marketing Online</a></h2></li>
                    <li><h2><a href="http://www.mydesign.com.ar/servicios_extra.php">Servicios Extras</a></h2></li>
                    <li><h2><a href="http://www.mydesign.com.ar/portfolio.php">Portfolio</a></h2></li>
                </ul>
            </div>

            <script type="text/javascript">
            <!--
            init_menus();
            -->
            </script>
        </div>
        <!-- ================  FIN HEADER  ================ -->

        <!-- =============== CONTAINER CENTRAL =============== -->
        <div class="clear span-22 prepend-1 append-1 last">

            <div class="span-22 container-head height-inherit">
                <div class="content-special content-err404 ">
                    <p class="text-medium"><b>El contenido que usted busca<br />pudo haber sido movido o eliminado</b></p>
                    <p>Para ver el contenido de nuestra web<br />puede hacerlo tambien a trav&eacute;s de nuestro <a href="http://www.mydesign.com.ar/sitemap.php" class="link-2">Sitemap</a></p>
                </div>
                <!-- ============= SOLICITAR INFO ============= -->
                <div class="sidebar">
                    <div class="form-top"><h4>Solicitar Informaci&oacute;n</h4></div>
                    <div class="form-center">
                        <div id="si-mask" class="mask"></div>
                        <div id="si-ajaxloader" class="ajaxloader"></div>
                        <?php require(APPPATH . 'views/includes/solicitarinfo_inc.php');?>
                    </div>
                    <div class="form-bottom"></div>
                </div>
                <!-- ============= FIN SOLICITAR INFO ============= -->

                <div class="solapas">
                    <a href="http://www.mydesign.com.ar/empresa.php" onmouseover="this.firstChild.src='images/button_empresa_over.png'" onmouseout="this.firstChild.src='images/button_empresa.png'"><img src="images/button_empresa.png" alt="Empresa"/></a>
                    <a href="http://www.mydesign.com.ar/blog/" onmouseover="this.firstChild.src='images/button_blog_over.png'" onmouseout="this.firstChild.src='images/button_blog.png'"><img src="images/button_blog.png" alt="Blog"/></a>
                </div>
            </div>

        </div>
        <!-- ================  FIN MAIN CONTAINER  ================ -->

        <!-- =============== FOOTER =============== -->
        <div class="clear span-22 prepend-1 append-1 last footer">
            <br />
            <p class="text-center">www.mydesign.com.ar &copy; Copyright 2003 - 2010 - Todos los derechos reservados - <img src="images/mydesign_logo.png" alt="MyDesign" /></p>
            <div class="cont-links">
                <div class="col">
                    <b>MyDesign</b>
                    <ul>
                        <li><a href="http://www.mydesign.com.ar/empresa.php">La Empresa</a></li>
                        <li><a href="http://www.mydesign.com.ar/blog">Blog</a></li>
                        <li><a href="http://www.mydesign.com.ar/faq.php');?>">F.A.Q.</a></li>
                        <li><a href="http://www.mydesign.com.ar/portfolio.php>">Portfolio</a></li>
                    </ul>
                </div>
                <div class="col">
                    <b>Servicios</b>
                    <ul>
                        <li><a href="http://www.mydesign.com.ar/disenio_web.php>">Dise&ntilde;o Web</a></li>
                        <li><a href="http://www.mydesign.com.ar/disenio_grafico.php">Dise&ntilde;o Gr&aacute;fico</a></li>
                        <li><a href="http://www.mydesign.com.ar/marketing_online.php">Marketing Online</a></li>
                        <li><a href="http://www.mydesign.com.ar/servicios_extra.php">Servicios Extra</a></li>
                    </ul>
                </div>
                <div class="col">
                    <b>Proyectos Destacados</b>
                    <ul>
                        <li><a href="http://www.getsouth.com">www.getsouth.com</a></li>
                        <li><a href="http://www.azerconsultores.com">www.azerconsultores.com</a></li>
                        <li><a href="http://www.respat.com.ar">www.respat.com.ar</a></li>
                        <li><a href="http://www.aikidoargentina.com">www.aikidoargentina.com</a></li>
                    </ul>
                </div>
                <div class="col">
                    <img src="images/icon_msn.png" alt="msn" class="icon" /> info@mydesign.com.ar<br />
                    <img src="images/icon_skype.png" alt="skype" class="icon" /> infomydesign<br />
                    <img src="images/twitter.gif" alt="twitter" width="25px" class="icon" /> mydesignes<br />
                </div>
            </div>
            <div class="clear span-22 last text-center">
                <a href="http://validator.w3.org/check?uri=referer"><img src="images/valid_xhtml.jpg" alt="Valid XHTML 1.0 Strict" /></a>&nbsp;&nbsp;
                <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/valid_css.jpg" alt="¡CSS Válido!" /></a>
            </div>
            <div class="clear span-20 append-1 last text-center">
                Webs Amigas:
                <a href="#">Alquileres Vacacionales</a>,
                <a href="#">Turismo Mendoza</a>,
                <a href="#">Aikido Argentina</a>,
                <a href="#">Spanish Courses</a>,
            </div>

        </div>
        <!-- =============== FIN FOOTER =============== -->
    </div>
</div>

</body>
</html>