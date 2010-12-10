<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span-12 logo"><a href="http://www.mydesign.com.ar"><img src="public/img/logo.png" alt="www.mydesign.com.ar" width="331" height="51" border="0" /></a></div>
<div class="menu">
    <div class="contmenu">
        <ul id="lavaLamp">
    <?php
    $page = isset($reference) ? $reference : $this->uri->segment(2);
    ?>
            <li <?php if( $page=="disenio_web" ) echo 'class="current"'?>><h1><a href="<?=site_url('/jpanel/services/index/disenio_web/')?>">Dise&ntilde;o Web</a></h1></li>
            <li <?php if( $page=="disenio_grafico" ) echo 'class="current"'?>><h1><a href="<?=site_url('/jpanel/services/index/disenio_grafico/')?>">Dise&ntilde;o Gr&aacute;fico</a></h1></li>
            <li <?php if( $page=="marketing_online" ) echo 'class="current"'?>><h1><a href="<?=site_url('/jpanel/services/index/marketing_online/')?>">Marketing Online</a></h1></li>
            <li <?php if( $page=="portfolio" ) echo 'class="current"'?>><h1><a href="<?=site_url('/jpanel/portfolio/')?>">Portfolio</a></h1></li>
            <li <?php if( $page=="contents" ) echo 'class="current"'?>><h1 class="outline"><a href="<?=site_url('/jpanel/contents/')?>">Contenidos</a></h1></li>
        </ul>
    </div>
</div>
<div class="iso iso3"></div>
