<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="banner-portfolio">
    <h1>Clientes</h1>
    <div class="bg bg-top"></div>
    <div id="gallery-clientes" class="bg-center">
        <div class="gallery">
            <div class="container-slide">
<?php
    $n=0;
    for( $i=0; $i<=count($info_clients)-1; $i++ ){
        $n++;
        $info = $info_clients[$i];

        if( $n==1 ) echo '<div class="slide">';

        $img_over = substr($info['src'], 0, -4)."_over.png";

        echo '<div class="thumb"><a href="javascript:void(0);" onmouseover="this.firstChild.src=\''. $img_over .'\'" onmouseout="this.firstChild.src=\''. $info['src'] .'\'" class="reset-cursor"><img src="'. $info['src'] .'" alt="'. $info['name'] .'" width="119" height="85" /></a></div>';

        if( $n==2 || $i==count($info_clients)-1 ) {
            echo '</div>';
            $n=0;
        }
    }
?>
            </div>
        </div>

        <div class="arrows">
            <div class="float-left jq-prev"><a href="javascript:void(0);"><img src="images/arrow_left.png" alt="Anterior" width="17" height="20" /></a></div>
            <div class="float-right jq-next"><a href="javascript:void(0);"><img src="images/arrow_right.png" alt="Siguiente" width="17" height="20" /></a></div>
        </div>
    </div>
    <div class="bg bg-bottom"></div>
</div>

