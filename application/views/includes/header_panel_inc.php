<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span-12 logo"><a href="http://www.mydesign.com.ar"><img src="img/logo.png" alt="www.mydesign.com.ar" width="331" height="51" /></a></div>
<div class="menu">
    <ul id="lavaLamp">
<?php
$page = isset($reference) ? $reference : $this->uri->segment(1);
?>
        <li <?php if( $page=="disenio_web" ) echo 'class="current"'?>><a href="<?=site_url('/jpanel/services/index/disenio_web/')?>"><h1>Dise&ntilde;o Web</h1></a><div class="line"></div></li>
        <li <?php if( $page=="disenio_grafico" ) echo 'class="current"'?>><a href="<?=site_url('/jpanel/services/index/disenio_grafico/')?>"><h1>Dise&ntilde;o Gr&aacute;fico</h1></a><div class="line"></div></li>
        <li <?php if( $page=="marketing_online" ) echo 'class="current"'?>><a href="<?=site_url('/jpanel/services/index/marketing_online/')?>"><h1>Marketing Online</h1></a><div class="line"></div></li>
        <li <?php if( $page=="portfolio" ) echo 'class="current"'?>><a href="<?=site_url('/portfolio/')?>"><h1>Portfolio</h1></a><div class="line"></div></li>
        <li <?php if( $page=="contents" ) echo 'class="current"'?>><a href="<?=site_url('/contents/')?>"><h1>Contenidos</h1></a><div class="line"></div></li>
    </ul>
</div>
<div class="iso iso3"></div>
