<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="nav-prev" class="portfolio-nav portfolio-nav-prev"><a href="#"><img src="images/arrow_previous.png" alt="Anterior" width="47" height="81" /></a></div>
<div class="portfolio-thumb">
    <div id="gallery-portfolio" class="container-slide">
<?php
    $n=1;
    for( $i=0; $i<=count($info_portfolio)-1; $i++ ) {
        if( $n==1 ) echo '<div class="slide">';
?>
            <div class="thumb">
                <div class="frame"></div>
                <a href="<?=$info_portfolio[$i]['link'];?>" class="link-1" target="_blank"><?=$info_portfolio[$i]['name_link'];?></a>
            </div>

<?php   
        if( $n==2 || $i==count($info_portfolio)-1 ) {
            echo '</div>';
            $n=1;
        }else{
            $n++;
        }
    }?>
    </div>
</div>
<div id="nav-next" class="portfolio-nav portfolio-nav-next"><a href="#"><img src="images/arrow_next.png" alt="Siguiente" width="47" height="81" /></a></div>

<script type="text/javascript">
<!--
Portfolio.initializer('<?=json_encode($info_portfolio);?>');
-->
</script>
