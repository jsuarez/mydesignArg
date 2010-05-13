<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index,follow" />
<meta name="cache-control" content="public, max-age=3600, must-revalidate" />
<meta name="expires" content="Mon, 22 Jul 2010 12:00:01 GMT" />
<meta name="last-modified" content="Mon, 22 Jul 2010 12:00:01 GMT" />

<link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

<!-- Framework CSS (BLUE PRINT) -->
<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection" />
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
<script type="text/javascript" src="js/helpers/helpers<?=$this->config->item('sufix_pack_js');?>.js"></script>
<script type="text/javascript" src="js/comun.php?a=<?=index_page();?>"></script>
<!-- ========== END LIBRARIES ======= -->

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

<script type="text/javascript" src="js/class/class.contact<?=$this->config->item('sufix_pack_js');?>.js"></script>



<!--[if IE 6]>
<script type="text/javascript">
    var IE6UPDATE_OPTIONS = {
        icons_path: "js/plugins/ie6update/ie6update/images/"
    }
</script>
<script type="text/javascript" src="js/plugins/ie6update/ie6update/ie6update.js"></script>
<![endif]-->

<!--[if IE 6]>
<script type="text/javascript" src="js/helpers/DD_belatedPNG.js"></script>
<![endif]-->