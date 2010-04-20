<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <?php include("includes/head.php");?>
    <title>Diseño Web - Diseño de Paginas Web</title>
</head>

<body>
<div class="container">
    <div class="span-24 last">
        <?php include("includes/header.php");?>
        <div class="span-22 prepend-1 append-1 last maincontainer">
            <div class="span-22">
                <div class="span-13 prepend-1 append-0 banner">
                    <img src="images/banner.png" alt=""/>
                </div>
                <div class="float-left last form-info">
                    <div class="form-top cursive"><h4>Solicitar Informaci&oacute;n</h4></div>
                    <div class="form-center">
                        <form action="" method="post">
                            <p>Nombre:</p>
                            <div class="form-input">
                                <input class="span-5" type="text" />
                            </div>
                            <p>Tel&eacute;fono:</p>
                            <div class="form-input">
                                <input class="span-5" type="text" />
                            </div>
                            <p>E-mail:</p>
                            <div class="form-input">
                                <input class="span-5" type="text" />
                            </div>
                            <p>Consulta:</p>
                            <div class="form-input2">
                                <textarea class="span-5" rows="5" cols="20"></textarea>
                            </div>
                            <div class="button-content">
                                <input class="button1" type="submit" value="Enviar" />
                            </div>
                        </form>
                    </div>
                    <div class="form-bottom"></div>
                </div>
            </div>
            
            <div class="span-22 last content">
                <div class="span-21 prepend-1-1"><h1>Diseño Web</h1></div>
                <div class="span-10 prepend-1-1 column-content">
                    <div class="span-10 column">
                        <div class="column-img"><img src="images/img_web5.png" alt="Web Institucional"/></div>
                        <div class="span-4-2 float-left"><h3>Web Institucional</h3></div>
                        <p>Para poder insertar su Pyme o simplemente tener su pagina personal. Obteniendo...</p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>

                    <div class="span-10 column">
                        <div class="column-img"><img src="images/img_web2.png" alt="Web Autoadministrable"/></div>
                        <div class="span-4-2 float-left"><h3>Web Autoadministrable</h3></div>
                        <p>Cuenta con una interfaz para poder modificar el contenido sin causar ningún efecto en el diseño... </p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>

                    <div class="span-10 column column-end">
                        <div class="column-img"><img src="images/img_web1.png" alt="Web Imobiliaria"/></div>
                        <div class="span-4-2 float-left"><h3>Web Inmobiliaria</h3></div>
                        <p>A través de nuestro sistema Inmobiliario logre una mayor dinámica en la compra, venta... </p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>
                </div><!--end .column-content-->

                <div class="span-9 last column-content">
                    <div class="span-10 column">
                        <div class="column-img"><img src="images/img_web4.png" alt="Sistema catalogo de productos"/></div>
                        <div class="span-4-2 float-left"><h3>Cat&aacute;logo de Productos</h3></div>
                        <p>A través de nuestro sistema Inmobiliario logre una mayor dinámica en la compra, venta... </p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>

                    <div class="span-10 column">
                        <div class="column-img"><img src="images/img_web3.png" alt="Carrito de Compras"/></div>
                        <div class="span-4-2 float-left"><h3>Carrito de Compras</h3></div>
                        <p>Venda sus productos a todo el mundo. Nuestra solución de comercio electrónico...  </p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>

                    <div class="span-10 column column-end">
                        <div class="column-img"><img src="images/img_web6.png" alt="Web Turismo"/></div>
                        <div class="span-4-2 float-left"><h3>Web Turismo</h3></div>
                        <p>Ofrece una solución absolutamente flexible y escalable. Tanto microempresas o agentes...</p>
                        <p><a class="bold italic" href="#">Más info</a></p>
                    </div>
                </div><!--end .column-content-->

            </div><!--end .content-->
            <div class="menu2">
                <a href="la_empresa.php" onmouseover="this.firstChild.src='images/button_empresa_over.png'" onmouseout="this.firstChild.src='images/button_empresa.png'"><img src="images/button_empresa.png" alt="Empresa"/> </a>
                <a href="blog/" onmouseover="this.firstChild.src='images/button_blog_over.png'" onmouseout="this.firstChild.src='images/button_blog.png'"><img src="images/button_blog.png" alt="Blog"/></a>
            </div>
        </div><!--end .maincontainer-->
        <div class="clear span-22 prepend-1 append-1 last footer">
        <?php include("includes/footer.php");?>
        </div><!--footer-->
    </div>
</div><!--end .container-->
</body>
</html>