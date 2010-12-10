<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( count($list)>0 ){?>
<table cellpadding="0" cellspacing="0" class="clear table-portclie" id="tbl-portclients">
    <thead>
        <tr>
            <td class="cell1">&nbsp;</td>
            <td class="cell2">Im&aacute;gen</td>
            <td class="cell3">Nombre</td>
            <td class="cell4">Ordenar</td>
            <td class="cell5">Modificar</td>
            <td class="cell6">Eliminar</td>
        </tr>
    </thead>
    <tbody class="sortable">
<?php
$n=0;
foreach( $list as $row ) {
    $n++;
    $url = site_url('/jpanel/portfolio/clientsform/'.$row['id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <tr id="tr2<?=$row['id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" name="chkItem" value="<?=$row['id']?>" /></td>
            <td class="cell2"><img src="<?=UPLOAD_PATH_PORTFOLIOCLIE.$row['filename']?>" alt="<?=$row['filename']?>" width="120" height="80" /></td>
            <td class="cell3 jq-itemname"><?=$row['name']?></td>
            <td class="cell4"><a href="javascript:void(0)" class="handle"><img src="public/img/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell5"><a href="<?=$url?>">Modificar</a></td>
            <td class="cell6"><a href="javascript:void(Portfolio.del(<?=$row['id']?>))">Eliminar</a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<?php }?>