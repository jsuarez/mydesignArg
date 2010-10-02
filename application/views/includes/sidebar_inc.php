<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<a href="" class="soporte"><img src="img/icon-chat.png" alt="" width="19" height="19" /> Soporte en l&iacute;nea</a>
<div class="form-contact">
    <form id="form1" action="<?=site_url('/contact/send/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <h3 class="title">Solicitar Informaci&oacute;n</h3>
        <p class="clear">
            <label for="txtName">Nombre:</label><br />
            <input type="text" name="txtName" id="txtName" />
        </p>
        <p>
            <label for="txtPhoneCode">Telefono:</label><br />
            <input type="text" name="txtPhone" id="txtPhoneCode" class="w1" />
            <input type="text" name="txtPhone" id="txtPhoneNum" class="w2" />
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
</div>
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