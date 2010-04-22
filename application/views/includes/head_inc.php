<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

<!-- Framework CSS (BLUE PRINT) -->
<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection"/>
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"/>
<!--[if lt IE 8]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"/><![endif]-->
<!-- END FRAMEWORK -->

<link href="css/style<?=$this->config->item('sufix_pack_css');?>.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link href="css/styleIE7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/styleIE6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!-- ========== LIBRARIES ============ -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/helpers.min.js"></script>
<!-- ========== END LIBRARIES ======= -->

<!-- ========== SCRIPT LAVALAMP (Efecto Menu) ============-->
<script type="text/javascript" src="js/jquery.lavalamp/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp/execute.js"></script>
<!-- ========== END SCRIPT ======= -->

<!-- ========== SCRIPT VALIDATOR ============-->
<link type="text/css" href="js/jquery.validator/css/style.css" rel="stylesheet"  />
<!--[if IE 6]>
<link rel="stylesheet" href="js/jquery.validator/css/styleIE6.css" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery.validator/js/script.min.js"></script>
<!-- ========== END SCRIPT ======= -->

<script type="text/javascript" src="js/class.contact<?//=$this->config->item('sufix_pack_js');?>.js"></script>


<script type="text/javascript">
<!--
<?php $indexphp = index_page();if( !empty($indexphp) ) $indexphp.="/";?>
    var baseURI = $("base").attr("href")+"<?=$indexphp;?>";
    
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