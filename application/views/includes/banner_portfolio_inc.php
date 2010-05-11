<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="banner-portfolio">
    <h1>Clientes</h1>
    <div class="bg bg-top"></div>
    <div id="gallery-clientes" class="bg-center">
        <div class="gallery">
            <div class="container-slide">
<?php
    $n=0;
    foreach( $info_clients as $info ){
        $n++;
        if( $n==1 ) echo '<div class="slide">';

        $img_over = substr($info['src'], 0, -5)."_over.png";

        echo '<div class="thumb"><a href="#" onmouseover="this.firstChild.src=\''. $img_over .'\'" onmouseout="this.firstChild.src=\''. $info['src'] .'\'"><img src="'. $info['src'] .'" alt="'. $info['name'] .'" width="119" height="85" /></a></div>';

        if( $n==8 || $n==count($info_clients) ) {
            echo '</div>';
            $n=0;
        }
    }
?>
            </div>
        </div>

        <div class="arrows">
            <div class="float-left jq-prev"><a href="#"><img src="images/arrow_left.png" alt="Anterior"/></a></div>
            <div class="float-right jq-next"><a href="#"><img src="images/arrow_right.png" alt="Siguiente"/></a></div>
        </div>
    </div>
    <div class="bg bg-bottom"></div>
</div>

