<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="description" content="<?=META_DESCRIPTION;?>" />
    <meta name="keywords" content="<?=META_KEYWORDS;?>" />
    <?php require('includes/head_inc.php');?>
    <?php if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach( $tlp_script as $file ){
            require('js/includes/'.$file.'_inc.php');
        }
    }?>
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
        <div class="span-22 prepend-1 append-1 last">
            <div class="span-22 container-head">
                <!-- ============= BANNER ============= -->
                <div class="banner">
                    <?php 
                        if( strpos($tlp_section, "portfolio") ){
                            require('includes/banner_portfolio_inc.php');
                        }else{
                            require('includes/banner_inc.php');
                        }
                     ?>
                </div>
                <!-- ============= FIN BANNER ============= -->

                <!-- ============= SOLICITAR INFO ============= -->
                <div class="form-info">
                    <div class="form-top"><h4>Solicitar Informaci&oacute;n</h4></div>
                    <div class="form-center">
                        <?php require('includes/solicitarinfo_inc.php');?>
                    </div>
                    <div class="form-bottom"></div>
                </div>
                <!-- ============= FIN SOLICITAR INFO ============= -->

                <div class="solapas">
                    <a href="la_empresa.php" class="solapa-1" onmouseover="this.firstChild.src='images/button_empresa_over.png'" onmouseout="this.firstChild.src='images/button_empresa.png'"><img src="images/button_empresa.png" alt="Empresa"/></a>
                    <a href="blog/" class="solapa-2" onmouseover="this.firstChild.src='images/button_blog_over.png'" onmouseout="this.firstChild.src='images/button_blog.png'"><img src="images/button_blog.png" alt="Blog"/></a>
                </div>
            </div>

            <div class="span-22 last content">
                <h1 class="title-section"><?=$tlp_title_section;?></h1>
                <?php require($tlp_section);?>
                <div class="bg-bottom"></div>
            </div>
        </div>
        <!-- ================  FIN MAIN CONTAINER  ================ -->

        <!-- =============== FOOTER =============== -->
        <div class="clear span-22 prepend-1 append-1 last footer">
            <?php require('includes/footer_inc.php');?>
        </div>
        <!-- =============== FIN FOOTER =============== -->
    </div>

</div>
</body>
</html>