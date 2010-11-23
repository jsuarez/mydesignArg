<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="slider1" class="portfolio-clientes">
    <a href="" class="prev fleft"><img src="img/arrow-client-prev.png" alt="Prev" width="13" height="103" /></a>
    <div class="cont">
        <ul class="resetlist">
        <?php
        $n=0;
        foreach( $listClients as $row ){$n++?>
            <li><img src="<?=UPLOAD_PATH_PORTFOLIOCLIE.$row['filename']?>" alt="<?=$row['filename']?>" width="153" height="93" class="fleft" /><?php if( $n<count($listClients) ) {?><div class="line"></div><?php }?></li>
        <?php }?>
        </ul>
    </div>
    <a href="" class="next fright"><img src="img/arrow-client-next.png" alt="Next" width="13" height="103" /></a>
</div>

<h3 class="clear title2">Trabajos realizados</h3>
<ul id="portfolio-filter">
    <li><a href="#all" class="all current">Todos</a></li>
    <li><a rel="web" href="#web">Web</a></li>
    <li class="outline"><a rel="grafica" href="#grafica">Gr&aacute;fica</a></li>
</ul>

<ul id="portfolio-list">
<?php foreach( $listWorks as $row ){?>
    <li class="<?=$row['type']?>">
        <img alt="<?=$row['filename']?>" src="<?=UPLOAD_PATH_PORTFOLIOWORKS.$row['filename']?>" width="213" height="146" title="<?=$row['name'].'. '.($row['url']!="" ? $row['url'] : '')?>" />        
        <div class="info"><div class="message"><b><?=$row['name']?></b><?php if( $row['url']!='' ) echo '<br /><a href="'.$row['url'].'" target="_blank">'.$row['url'].'</a>'?></div></div>
    </li>
<?php }?>
</ul>