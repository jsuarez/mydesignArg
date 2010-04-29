<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

    <form id="formContact" action="" method="post">
        <div class="span-5">
            <label class="label-form" for="txtName">*Nombre:</label><br />
            <input type="text" class="input-formcontact validate" name="txtName" />
        </div>
        <div class="clear span-5">
            <label class="label-form" for="txtName">Tel&eacute;fono:</label><br />
            <input type="text" class="input-formcontact" name="txtPhone" />
        </div>
        <div class="clear span-5">
            <label class="label-form" for="txtName">*E-mail:</label><br />
            <input type="text" class="input-formcontact validate" name="txtEmail" />
        </div>
        <div class="clear span-5">
            <label class="label-form" for="txtName">*Consulta:</label><br />
            <textarea class="textarea-formcontact validate" rows="5" cols="20" name="txtConsult"></textarea>
        </div>
        <div class="clear span-5"><label class="label-form" for="txtName">*Ingrese este c&oacute;digo:</label></div>
        <div class="clear span-6">
            <img id="imgCaptcha" class="captcha" src="<?=site_url('/captcha/index/'.md5(time()));?>" align="left" width="165" height="60" alt="" />
            <div class="float-left">
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
                    <param name="allowScriptAccess" value="sameDomain" />
                    <param name="allowFullScreen" value="false" />
                    <param name="movie" value="images/securimage_play.swf?audio=<?=site_url('/index.php/captcha/play/');?>&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
                    <param name="quality" value="high" />
                    <param name="bgcolor" value="#ffffff" />
                    <param name="wmode" value="transparent" />
                    <embed src="images/securimage_play.swf?audio=<?=site_url('/index.php/captcha/play/');?>&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" />
                </object><br />
                <a href="javascript:void($('#imgCaptcha').attr('src', '<?=substr(site_url('/index.php/captcha/index/'), 0, -4);?>/'+Math.random()));" tabindex="-1" title="Mostrar otro"><img src="images/icon_refresh.gif" alt="Mostrar otro" onclick="this.blur()" align="bottom" /></a>
            </div>
        </div>
        <div class="clear span-5">
            <input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="6" class="input-captcha validate" />
        </div>
        <div class="clear span-5 text-center">
            <button type="button" class="button-small" onclick="Contact.send();">Enviar</button>
        </div>

    </form>

    <div id="si-msg" class="msg">
        <p class="si-success hide">
            Muchas gracias por comunicarse,<br />
            En breve estaremos en contacto.
        </p>
        <p class="si-error hide">
            Ha ocurrido un error durante el env&iacute;o.<br />
            Por favor, intentelo m&aacute;s tarde.
        </p>
    </div>


<script type="text/javascript">
<!--
Contact.initializer();
-->
</script>