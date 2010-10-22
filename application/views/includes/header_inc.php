<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span-12 logo"><a href="http://www.mydesign.com.ar"><img src="img/logo.png" alt="www.mydesign.com.ar" width="331" height="51" /></a></div>
<div class="cont-phone">
    <img src="img/icon-phone.png" alt="" width="33" height="33" />
    <div class="fleft">
        <p><span>Mendoza</span> <b>(0261)</b> 4237658</p>
        <p class="line"><span>Bahia Blanca</span> <b>(0291)</b> 154-195047</p>
    </div>
</div>
<div class="menu">
    <ul id="lavaLamp">
<?php $page = $this->uri->segment(1)?>
        <li <?php if( $page=="disenio_web" ) echo 'class="current"'?>><a href="<?=site_url('/disenio_web/')?>"><h1>Dise&ntilde;o Web</h1></a><div class="line"></div></li>
        <li <?php if( $page=="disenio_grafico" ) echo 'class="current"'?>><a href="<?=site_url('/disenio_grafico/')?>"><h1>Dise&ntilde;o Gr&aacute;fico</h1></a><div class="line"></div></li>
        <li <?php if( $page=="marketing_online" ) echo 'class="current"'?>><a href="<?=site_url('/marketing_online/')?>"><h1>Marketing Online</h1></a><div class="line"></div></li>
        <li <?php if( $page=="portfolio" ) echo 'class="current"'?>><a href="<?=site_url('/portfolio/')?>"><h1>Portfolio</h1></a><div class="line"></div></li>
        <li <?php if( $page=="empresa" ) echo 'class="current"'?>><a href="<?=site_url('/empresa/')?>"><h1>Empresa</h1></a><div class="line"></div></li>
        <li><a href="/blog"><h1>Blog</h1></a></li>
    </ul>
</div>
<div class="iso iso3"></div>
