<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="description" content="<?=META_DESCRIPTION_GLOBAL . @$tlp_meta_description;?>" />
    <meta name="keywords" content="<?=META_KEYWORDS_GLOBAL . @$tlp_meta_keywords;?>" />
    <?php require('includes/head_inc.php');?>
    <?php if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach( $tlp_script as $file ){
            require('js/includes/'.$file.'_inc.php');
        }
    }?>
</head>

<body>
<noscript>
    <p>Bienvenido a MyDesign</p>
    <p>
        La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
        Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.
    </p>
</noscript>

<div class="container">

    <div class="span-24 last">
        <!-- ================  HEADER  ================ -->
        <div class="span-22 prepend-1 append-1 last header">
            <?php require('includes/header_inc.php');?>
        </div>
        <!-- ================  FIN HEADER  ================ -->

        <!-- =============== CONTAINER CENTRAL =============== -->
        <div class="clear span-22 prepend-1 append-1 last">
<?php
$seg = $this->uri->segment(1);
$condition = $seg=="faq" || $seg=="sitemap";
?>

            <div class="span-22 container-head <?php if( $condition ) echo "height-inherit";?>">
                <!-- ============= BANNER ============= -->
                <?php
                    if( !$condition ){
                        switch( $seg ){
                            case "portfolio":
                                require('includes/banner_portfolio_inc.php');
                            break;
                            case "empresa":
                                require('includes/banner_empresa_inc.php');
                            break;
                            case "disenio_web": default:
                                require('includes/banner_disenioweb_inc.php');
                            break;
                            case "disenio_grafico":
                                require('includes/banner_diseniografico_inc.php');
                            break;
                            case "marketing_online":
                                require('includes/banner_markonline_inc.php');
                            break;
                            case "servicios_extra":
                                require('includes/banner_servextra_inc.php');
                            break;
                        }

                    }else{
                        echo '<div class="content-special">';
                        echo '<h1>'. $tlp_title_section .'</h1>';
                        require($tlp_section);
                        echo '</div>';
                    }
                ?>
                <!-- ============= FIN BANNER ============= -->

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

                <div class="solapas">
                    <a href="<?=site_url('empresa');?>" onmouseover="this.firstChild.src='images/button_empresa_over.png'" onmouseout="this.firstChild.src='images/button_empresa.png'"><img src="images/button_empresa.png" alt="Empresa"/></a>
                    <a href="blog/" onmouseover="this.firstChild.src='images/button_blog_over.png'" onmouseout="this.firstChild.src='images/button_blog.png'"><img src="images/button_blog.png" alt="Blog"/></a>
                </div>
            </div>

        <?php if( !$condition ){?>
            <div class="clear span-22 last content">
                <h1><?=$tlp_title_section;?></h1>
                <?php require($tlp_section);?>
                <div class="bg-bottom"></div>
            </div>
        <?php }?>
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