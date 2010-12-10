<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( count($list)>0 ){?>
<table cellpadding="0" cellspacing="0" class="clear table-portwork" id="tbl-portwork">
    <thead>
        <tr>
            <td class="cell1">&nbsp;</td>
            <td class="cell2">Im&aacute;gen</td>
            <td class="cell3">Tipo</td>
            <td class="cell4">Nombre</td>
            <td class="cell5">Ordenar</td>
            <td class="cell6">Modificar</td>
            <td class="cell7">Eliminar</td>
        </tr>
    </thead>
    <tbody class="sortable">
<?php
$n=0;
foreach( $list as $row ) {
    $n++;
    $url = site_url('/jpanel/portfolio/workform/'.$row['id']);
    $class = $n%2 ? 'row-even' : '';
?>
        <tr id="tr1<?=$row['id']?>" class="<?=$class?>">
            <td class="cell1"><input type="checkbox" name="chkItem" value="<?=$row['id']?>" /></td>
            <td class="cell2"><img src="<?=UPLOAD_PATH_PORTFOLIOWORKS.$row['filename']?>" alt="<?=$row['filename']?>" width="120" height="80" /></td>
            <td class="cell3"><?=$row['type']?></td>
            <td class="cell4 jq-itemname"><?=$row['name']?></td>
            <td class="cell5"><a href="javascript:void(0)" class="handle"><img src="public/img/icon_arrow_move.png" alt="" width="16" alt="16" /></a></td>
            <td class="cell6"><a href="<?=$url?>">Modificar</a></td>
            <td class="cell7"><a href="javascript:void(Portfolio.del(<?=$row['id']?>))">Eliminar</a></td>
        </tr>
<?php }?>
    </tbody>
</table>
<input type="hidden" id="type" value="work" />
<?php }?>