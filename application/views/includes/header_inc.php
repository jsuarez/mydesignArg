<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

    <div class="span-22 last">
        <div class="span-7 push-1"><a href="<?=$this->config->item('base_url');?>"><img src="images/logo.png" alt="Diseño Web www.mydesign.com.ar"/></a></div>

        <div class="support"><a href="javascript:void(Chat.open())"><b>Soporte en l&iacute;nea</b></a></div>
        <div class="span-7 float-right">
            <div class="icon-phone"><img src="images/icon_phone.png" alt="" /></div>
            <div class="float-left">
                <div class="separator"><span class="text-detach">Mendoza </span><b>(0261) </b>4237658</div>
                <div class="clear"><span class="text-detach">Bah&iacute;a Blanca </span><b>(0291) </b>154-195047</div>
            </div>
        </div>
    </div>
    <div class="clear span-22 last menu">
        <ul id="lavaLampMenu">
            <?php $menu = $this->uri->segment(1);?>
            <li <?php if( $menu=="disenio_web" || $menu=="index" || $menu=="" ) echo 'class="current"';?>><h2><a href="<?=site_url('disenio_web');?>">Dise&ntilde;o Web</a></h2></li>
            <li <?php if( $menu=="disenio_grafico" ) echo 'class="current"';?>><h2><a href="<?=site_url('disenio_grafico');?>">Dise&ntilde;o Gr&aacute;fico</a></h2></li>
            <li <?php if( $menu=="marketing_online" ) echo 'class="current"';?>><h2><a href="<?=site_url('marketing_online');?>">Marketing Online</a></h2></li>
            <li <?php if( $menu=="servicios_extra" ) echo 'class="current"';?>><h2><a href="<?=site_url('servicios_extra');?>">Servicios Extras</a></h2></li>
            <li <?php if( $menu=="portfolio" ) echo 'class="current"';?>><h2><a href="<?=site_url('portfolio');?>">Portfolio</a></h2></li>
        </ul>
    </div>

<script type="text/javascript">
<!--
init_menus();
-->
</script>