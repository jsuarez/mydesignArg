<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<a href="javascript:Chat.open()" class="soporte"><img src="img/icon-chat.png" alt="" width="19" height="19" /> Soporte en l&iacute;nea</a>
<div id="flipbox-fcontact" class="form-contact">
    <h3 class="title">Solicitar Informaci&oacute;n</h3>
    <form id="form-contact" action="<?=site_url('/contact/send/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <p class="clear">
            <label for="txtName">Nombre:</label><br />
            <input type="text" name="txtName" id="txtName" />
        </p>
        <p>
            <label for="txtPhoneCode">Telefono:</label><br />
            <input type="text" name="txtPhoneCode" id="txtPhoneCode" class="w1" />
            <input type="text" name="txtPhoneNum" id="txtPhoneNum" class="w2" />
        </p>
        <p>
            <label for="txtEmail">E-mail:</label><br />
            <input type="text" name="txtEmail" id="txtEmail" />
        </p>
        <p>
            <label for="txtConsult">Consulta:</label><br />
            <textarea cols="5" rows="22" name="txtConsult" id="txtConsult"></textarea>
        </p>
        <p class="align-right"><button type="submit" name="btnSubmit">Enviar</button></p>
    </form>
    <div id="fc-send" class="fc-message">
        <p>Enviando formulario</p>
        <img src="img/ajax-loader2.gif" alt="" width="43" height="11" />
    </div>
</div>
<?php if( isset($list_banners) ){?>
<div id="slider" class="cont-banner">
    <div class="mask"></div>
    <div class="cont-images">
<?php foreach( $list_banners as $row ){?>
        <img src="img/banners/<?=$row['image']?>" alt="" width="250" height="197" />
<?php }?>
    </div>
</div>
<?php }?>
<div class="cont-testimonial">
    "Qsdasd sdasda asdas dadsasd asdasd asdas asdasd asdads asdasd dsasd"

    <div class="info">
        <div class="col1">
            <h4 class="title">Katherine Bother</h4>
            <p>Directora<br />The Mossberg Solution</p>
        </div>
        <img src="img/icon-user.png" alt="" width="67" height="73" class="fright" />
    </div>
</div>