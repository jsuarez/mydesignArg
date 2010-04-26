<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="portfolio-thumb">
    <div id="gallery-portfolio" class="container-slide">
<?php
    $n=1;
    for( $i=0; $i<=count($info)-1; $i++ ) {
        if( $n==1 ) echo '<div class="slide">';
?>
            <div class="thumb">
                <div class="frame"></div>
                <a href="<?=$info[$i]['link'];?>" class="link-1" target="_blank"><?=$info[$i]['name_link'];?></a>
            </div>

<?php   
        if( $n==4 || ($i+1)==count($info) ) {
            echo '</div>';
            $n=1;
        }else{
            $n++;
        }
    }?>

    </div>
</div>

<div id="nav-prev" class="portfolio-nav portfolio-nav-prev"></div>
<div id="nav-next" class="portfolio-nav portfolio-nav-next"></div>

<script type="text/javascript">
<!--
var Gallery1 = new ClassGallery({
    selSlide      : '#gallery-clientes .slide',
    selArrowPrev  : '#gallery-clientes .jq-prev',
    selArrowNext  : '#gallery-clientes .jq-next'
});
var Gallery2 = new ClassGallery({
    selSlide      : '#gallery-portfolio .slide',
    selArrowPrev  : '#nav-prev',
    selArrowNext  : '#nav-next',
    controlNavHover : true,
    thumbs          : '<?=json_encode($info);?>',
    thumbsContainer : '.frame',
    thumbsClassName : 'image',
    thumbsBySlide   : 4,
    cssAjaxLoader   : 'portfolio-ajaxloader'
});
-->
</script>
