<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<p><button type="button" onclick="location.href='<?=site_url('/jpanel/services/form/'.$reference)?>'">Nuevo</button></p>

<?php
$n=0;
foreach( $list_services as $row ){
    $n++;
    $s="";
    if( $n==3 ){
        $s = 'last';
        $n=0;
    }
?>
<div class="cont-pack <?=$s?>">
    <div class="pack">
        <h2><?=$row['title']?></h2>
        <div class="cont-thumb">
            <div class="mask"></div>
            <img class="image" src="<?=UPLOAD_PATH_SERVICES_THUMBS . $row['reference'] .'/'. $row['thumb']?>" alt="<?=$row['thumb']?>" width="200" height="120" />
            <a href="" class="handler">&nbsp;</a>
        </div>
        <p class="clear"><?=$row['content_intro']?></p>
        <div class="cont-icons">
            <a href="<?=site_url('/jpanel/services/form/'.$reference.'/'.$row['content_id'])?>"><img src="img/icon_edit.png" alt="" width="16" height="16" class="link-img" /> Editar</a>
            <a href=""><img src="img/icon_delete.png" alt="" width="16" height="16" class="link-img" /> Eliminar</a>
        </div>
    </div>
</div>
<?php }?>