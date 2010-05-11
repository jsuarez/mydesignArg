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