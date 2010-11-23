<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span-12 logo"><a href="http://www.mydesign.com.ar"><img src="img/logo.png" alt="www.mydesign.com.ar" width="331" height="51" /></a></div>
<div class="cont-phone">
    <img src="img/icon-phone.png" alt="" width="33" height="33" />
    <div class="fleft textformat">
        <p><span>Mendoza</span> <b>(0261)</b> 4237658</p>
        <p class="line"><span>Bahia Blanca</span> <b>(0291)</b> 154-195047</p>
    </div>
</div>
<div class="menu">
    <div class="contmenu">
        <ul id="lavaLamp">
    <?php $page = $this->uri->segment(1)?>
            <li <?php if( $page=="disenio_web" ) echo 'class="current"'?>><h1><a href="<?=site_url('/disenio_web/')?>">Dise&ntilde;o Web</a></h1></li>
            <li <?php if( $page=="disenio_grafico" ) echo 'class="current"'?>><h1><a href="<?=site_url('/disenio_grafico/')?>">Dise&ntilde;o Gr&aacute;fico</a></h1></li>
            <li <?php if( $page=="marketing_online" ) echo 'class="current"'?>><h1><a href="<?=site_url('/marketing_online/')?>">Marketing Online</a></h1></li>
            <li <?php if( $page=="portfolio" ) echo 'class="current"'?>><h1><a href="<?=site_url('/portfolio/')?>">Portfolio</a></h1></li>
            <li <?php if( $page=="empresa" ) echo 'class="current"'?>><h1><a href="<?=site_url('/empresa/')?>">Empresa</a></h1></li>
            <li><h1 class="outline"><a href="/blog">Blog</a></h1></li>
        </ul>
    </div>
</div>
<div class="iso iso3"></div>
