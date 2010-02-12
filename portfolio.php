<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include("includes/head.php");?>
    <title>My Design</title>
</head>

<body>
<div class="container">
    <div class="span-24 last">
        <?php include("includes/header.php");?>
        <div class="clear span-22 prepend-1 append-1 last maincontainer">
            <div class="span-22">
                <div class="span-13 push-1-1 banner"> </div>
                <div class="float-left last form-info">
                    <div class="form-top cursive"><h3>Solicitar Informaci&oacute;n</h3></div>
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
            
            <div class="span-22 last content clear">
                <div class="span-10 prepend-1-1 column-content">
                    <h1>Portfolio</h1>
                    <div class="span-10 column">
                        
                    </div>

                </div><!--end .column-content-->

                <div class="span-9 last column-content">
                    <h1>&emsp;</h1>
                    <div class="span-10 column">
                        
                    </div>

                    
                </div><!--end .column-content-->

            </div><!--end .content-->
            <div class="menu2">
                <a href="#" onmouseover="this.firstChild.src='images/button_empresa_over.png'" onmouseout="this.firstChild.src='images/button_empresa.png'"><img src="images/button_empresa.png" alt="Empresa"/> </a>
                <a href="#" onmouseover="this.firstChild.src='images/button_blog_over.png'" onmouseout="this.firstChild.src='images/button_blog.png'"><img src="images/button_blog.png" alt="Blog"/></a>
            </div>
        </div><!--end .maincontainer-->
        
        <?php include("includes/footer.php");?>

    </div>
</div><!--end .container-->
</body>
</html>