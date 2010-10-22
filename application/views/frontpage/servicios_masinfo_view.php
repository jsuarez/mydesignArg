<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( !isset($reference) ){?>
<h1 class="title"><?=$info['title']?></h1>
<div class="clear">
<?php }?>
    <a href="<?=site_url($info['reference'])?>" class="link-back" onclick="Content.revert(); return false">Volver</a>
    <div class="content-moreinfo">
        <?=$info['content_full']?>
    </div>
    <ul id="gallery">
    <?php for( $n=1; $n<=3; $n++ ){
        if( !empty($info['thumb_gallery'.$n]) ){?>
        <li><img src="<?=UPLOAD_PATH_SERVICES_GALLERY . $info['reference'] .'/'. $info['thumb_gallery'.$n]?>" alt="" width="<?=$info['thumb_gallery'.$n.'_w']?>" height="<?=$info['thumb_gallery'.$n.'_h']?>" /></li>
    <?php }}?>
    </ul>
    <div class="clear"></div>
    <?php if( !is_null($info['prev']) ){?><a href="<?=$info['prev']['href']?>" class="link-arrow-left" onclick="Content.show(<?=$info['prev']['id']?>, 'rl'); return false"><?=$info['prev']['title']?></a><?php }?>
    <?php if( !is_null($info['next']) ){?><a href="<?=$info['next']['href']?>" class="link-arrow-right" onclick="Content.show(<?=$info['next']['id']?>, 'lr'); return false"><?=$info['next']['title']?></a><?php }?>
<?php if( !isset($reference) ){?>
</div>
<?php }?>