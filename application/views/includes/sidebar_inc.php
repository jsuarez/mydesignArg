<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<a href="./chat.html" target="_blank" onclick="Chat.open(); return false" class="soporte"><img src="public/img/icon-chat.png" alt="" width="19" height="19" /> Soporte en l&iacute;nea</a>
<div id="flipbox-fcontact" class="form-contact textformat">
    <h3 class="title">Solicitar Informaci&oacute;n</h3>
    <form id="form-contact" action="<?=site_url('/contact/send/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow-contact">
            <label for="txtName">Nombre:</label><br />
            <input type="text" name="txtName" id="txtName" />
            <div class="cont-msgerror"><?php if( $this->session->flashdata('error_name')!='' ) echo '<div class="fright"><div class="valid-msgleft"></div><div class="valid-msgmiddle"><label for="txtName" generated="true" class="valid-error2">'.$this->session->flashdata('error_name').'</label></div><div class="valid-msgright"></div></div>';?></div>
        </div>
        <div class="trow-contact">
            <label for="txtPhoneCode">Telefono:</label><br />
            <input type="text" name="txtPhoneCode" id="txtPhoneCode" class="w1" />
            <input type="text" name="txtPhoneNum" id="txtPhoneNum" class="w2" />            
            <div class="cont-msgerror"><?php if( $this->session->flashdata('error_phone')!='' ) echo '<div class="fright"><div class="valid-msgleft"></div><div class="valid-msgmiddle"><label for="txtPhoneNum" generated="true" class="valid-error2">'.$this->session->flashdata('error_phone').'</label></div><div class="valid-msgright"></div></div>';?></div>
        </div>
        <div class="trow-contact">
            <label for="txtEmail">E-mail:</label><br />
            <input type="text" name="txtEmail" id="txtEmail" />
            <div class="cont-msgerror"><?php if( $this->session->flashdata('error_email')!='' ) echo '<div class="fright"><div class="valid-msgleft"></div><div class="valid-msgmiddle"><label for="txtEmail" generated="true" class="valid-error2">'.$this->session->flashdata('error_email').'</label></div><div class="valid-msgright"></div></div>';?></div>
        </div>
        <div class="trow-contact">
            <label for="txtConsult">Consulta:</label><br />
            <textarea cols="5" rows="22" name="txtConsult" id="txtConsult"></textarea>            
            <div class="cont-msgerror"><?php if( $this->session->flashdata('error_consult')!='' ) echo '<div class="fright"><div class="valid-msgleft"></div><div class="valid-msgmiddle"><label for="txtConsult" generated="true" class="valid-error2">'.$this->session->flashdata('error_consult').'</label></div><div class="valid-msgright"></div></div>';?></div>
        </div>
        <p class="align-right"><button type="submit" name="btnSubmit">Enviar</button></p>
    </form>
    <div id="fc-send" class="fc-message">
        <p>Enviando formulario</p>
        <img src="public/img/ajax-loader2.gif" alt="" width="43" height="11" />
    </div>
</div>
<?php if( isset($list_banners) ){?>
<div id="slider" class="cont-banner">
    <div class="mask"></div>
    <div class="cont-images">
<?php foreach( $list_banners as $row ){?>
        <img src="public/img/banners/<?=$row['image']?>" alt="" width="250" height="197" />
<?php }?>
    </div>
</div>
<?php }?>
<!--<div class="cont-testimonial">
    "Qsdasd sdasda asdas dadsasd asdasd asdas asdasd asdads asdasd dsasd"

    <div class="info">
        <div class="col1">
            <h4 class="title">Katherine Bother</h4>
            <p>Directora<br />The Mossberg Solution</p>
        </div>
        <img src="public/img/icon-user.png" alt="" width="67" height="73" class="fright" />
    </div>
</div>-->