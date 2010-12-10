<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=@$tlp_title;?></title>
    <base href="<?=base_url();?>" id="base_url" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="none" />
    <link href="public/img/favicon.ico" rel="stylesheet icon" type="image/ico" />
    <!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
    <!--[if IE 6]><link href="css/style_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!--[if IE 7]><link href="css/style_ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
    <?php echo $this->assets->css(); ?>
    <?php echo $this->assets->js(); ?>
</head>
<body>
    <div class="container">
        <div class="span-24 last header">
        <?php require(APPPATH . 'views/includes/header_panel_inc.php')?>
        </div>
        <div class="clear span-24 last main-container">
            <div id="flipbox" class="column-container">
                <div class="top"></div>
                <div class="middle">
                    <h1 class="title"><?=@$tlp_title_section?></h1>
                    <div class="clear">
                    <?php echo $this->template->yield(); ?>
                    </div>
                </div>
                <div class="bottom"></div>
                <div class="cont-iso">
                    <div class="iso iso1"></div>
                </div>
            </div>
            <div class="column-sidebar">
            <?php require(APPPATH . 'views/includes/sidebar_panel_inc.php')?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="iso iso2"></div>         
        <?php require(APPPATH . 'views/includes/footer_inc.php')?>
    </div>
    <input type="hidden" id="ci_url_suffix" value="<?=$this->config->item('url_suffix')?>" />
</body>
</html>