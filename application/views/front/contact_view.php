<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<h1 class="title">Contacto</h1>
<?=$content?>
<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
<br />
<div class="success">
    Muchas gracias por comunicarse, en breve estaremos en contacto.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
<br />
<div class="error">
    El formuarlio no ha podido ser enviado, porfavor, intentelo nuevamente.
</div>
<?php }?>

<form id="form1" class="form-contact" action="<?=site_url('/contacto/send');?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label for="txtName" class="label"><span class="required">* </span>Nombre</label><div class="fleft"><input type="text" name="txtName" id="txtName" /></div>
    </div>
    <div class="trow">
        <label for="txtCalle" class="label">Calle/Avenida</label><div class="fleft"><input type="text" name="txtCalle" id="txtCalle" /></div>
    </div>
    <div class="trow">
        <label for="txtCity" class="label">Ciudad</label><div class="fleft"><input type="text" name="txtCity" id="txtCity" /></div>
    </div>
    <div class="trow">
        <label for="txtState" class="label">Estado</label><div class="fleft"><input type="text" name="txtState" id="txtState" /></div>
    </div>
    <div class="trow">
        <label for="txtPostCode" class="label">C&oacute;digo Postal</label><div class="fleft"><input type="text" name="txtPostCode" id="txtPostCode" /></div>
    </div>
    <div class="trow">
        <label for="cboCountry" class="label">Pa&iacute;s</label>
        <div class="fleft"><?php echo form_dropdown('cboCountry', $listCountry, '', 'id="cboCountry"');?></div>
    </div>
    <div class="trow">
        <label for="txtPhoneCode" class="label"><span class="required">* </span>Tel&eacute;fono</label>
        <div class="fleft">
            <input type="text" name="txtPhoneCode" id="txtPhoneCode" class="input-code" />
            <input type="text" name="txtPhoneNum" id="txtPhoneNum" class="input-num" />
        </div>
    </div>
    <div class="trow">
        <label for="txtCelCode" class="label">Celular</label>
        <div class="fleft">
            <input type="text" name="txtCelCode" id="txtCelCode" class="input-code" />
            <input type="text" name="txtCelNum" id="txtCelNum" class="input-num" />
        </div>
    </div>
    <div class="trow">
        <label for="txtEmail" class="label"><span class="required">* </span>Email</label><div class="fleft"><input type="text" name="txtEmail" id="txtEmail" /></div>
    </div>
    <div class="trow">
        <label for="txtComment" class="label">Comentario</label><div class="fleft"><textarea rows="10" cols="20" name="txtComment" id="txtComment"></textarea></div>
    </div>
    <div class="trow">
        <span class="label-leyend fleft">(*) Campos obligatorios</span><button type="submit" class="fright">Enviar</button>
    </div>
</form>