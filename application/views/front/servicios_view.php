<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
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
            <img class="image" src="<?=UPLOAD_PATH_SERVICES_THUMBS . $reference .'/'. $row['thumb']?>" alt="<?=$row['thumb']?>" width="200" height="120" />
        </div>
        <p class="clear"><?=str_replace('<p>', '',str_replace('</p>', '', $row['content_intro']))?></p>
        <a href="<?=site_url($row['reference'].'/'.$row['reference2'])?>" class="link-moreinfo" onclick="Services.show(<?=$row['content_id']?>, 'lr'); return false">M&aacute;s info</a>
    </div>
</div>
<?php }?>