<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="contlogin">
    <div class="form">
        <form action="<?=site_url('/jpanel/index/login/')?>" method="post" enctype="application/x-www-form-urlencoded">
            <div class="trow">
                <label for="txtUser" class="label">Usuario</label>
                <input type="text" name="txtUser" id="txtUser" />
            </div>
            <div class="trow">
                <label for="txtPass" class="label">Contrase&ntilde;a</label>
                <input type="password" name="txtPass" id="txtPass" />
            </div>
            <div class="trow align-center"><button type="submit">Entrar</button></div>
            <?php if( $this->session->flashdata('message_login')!='' ){?>
            <div class="clear error align-center"><?=$this->session->flashdata('message_login')?></div>
            <?php }?>
        </form>
    </div>
</div>
