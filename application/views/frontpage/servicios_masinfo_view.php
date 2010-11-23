<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( !isset($reference) ){?>
<h1 class="title"><?=$info['title']?></h1>
<div class="clear">
<?php }?>
    <a href="<?=site_url($info['reference'])?>" class="link-back" onclick="Services.revert(); return false">Volver</a>
    <div class="content-moreinfo">
        <?=$info['content_full']?>
    </div>
<?php if( isset($info['gallery']) ) {?>    
    <div class="container-gallery">
        <ul id="carousel" class="carousel">
        <?php
        $n=0;
        foreach($info['gallery'] as $row){$n++;?>
            <li><img src="<?=UPLOAD_PATH_SERVICES_GALLERY . $info['reference'] .'/'. $row['filename']?>" alt="" width="<?=$row['width']?>" height="<?=$row['height']?>" /><?php if( $n==2 ) echo '<div class="carousel-prev"></div><div class="carousel-next"></div>';?></li>
        <?php }?>
        </ul>
        <div class="carousel-loader"></div>
    </div>
    <script type="text/javascript">
    <!--
        $('div.carousel-loader').show();
    -->
    </script>
<?php }?>
    <div class="clear"></div>
    <?php if( !is_null($info['prev']) ){?><a href="<?=$info['prev']['href']?>" class="link-arrow-left" onclick="Services.show(<?=$info['prev']['id']?>, 'rl'); return false"><?=$info['prev']['title']?></a><?php }?>
    <?php if( !is_null($info['next']) ){?><a href="<?=$info['next']['href']?>" class="link-arrow-right" onclick="Services.show(<?=$info['next']['id']?>, 'lr'); return false"><?=$info['next']['title']?></a><?php }?>
<?php if( !isset($reference) ){?>
</div>
<?php }?>