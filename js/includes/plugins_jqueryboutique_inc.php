<?php
if( $LOAD=="js" ){
    $arr[] = "plugins/jquery.boutique/jquery.boutique.min";
    $arr[] = "plugins/jquery.boutique/jquery.easing.1.3.min";
}
if( $LOAD=="css" ){
    $arr[] = "js/plugins/jquery.boutique/boutique".$this->config->item('sufix_pack_css');
}
?>