<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<table cellpadding="0" cellspacing="0" class="clear table-contents">
    <tbody>
<?php
$n=0;
foreach( $listPages as $row ) {
    $n++;
    $class = $n%2 ? 'row-even' : '';
?>
        <tr class="<?=$class?>">
            <td class="cell1"><a href="#cont<?=$n?>" class="fleft link-title2" target="_blank" style="position: relative;" onclick="Contents.slideCont(this); return false;"><?=$row['title']?></a>
                <div id="cont<?=$n?>" class="clear hide">
                    <div class="success hide" style="margin-bottom:10px;">Los datos han sido guardado con &eacute;xito</div>
                    <div class="error hide" style="margin-bottom:10px;">Los datos no han podido ser guardados con &eacute;xito</div>

                    <!--T&iacute;tulo:&nbsp;<input type="text" class="jq-title input-form" value="<?//=$row['title']?>" /><br /><br />-->
                    <textarea id="txtCont<?=$n?>" rows="5" cols="20"><?=$row['content']?></textarea>

                    <p class="prepend-top">
                        <button type="button" class="fleft" onclick="Contents.save(this, '<?=$row['reference']?>', 'txtCont<?=$n?>');">Guardar</button>
                        <img src="public/img/ajax-loader3.gif" alt="Loading" width="32" height="32" class="jq-ajaxloader hide" />
                    </p>
                </div>
            </td>
            <td class="cell2"><a href="#cont<?=$n?>" onclick="Contents.slideCont(this); return false;"><img src="public/img/icon_arrow_down.png" alt="Abrir" width="16" height="16" class="jq-icon" /></a></td>
        </tr>
<?php }?>
    </tbody>
</table>