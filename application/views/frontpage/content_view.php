<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
$n=0;
foreach( $info_content->result_array() as $row ) {$n++?>

<div id="cont<?=$n?>" class="row <?php if( $n<$info_content->num_rows ) echo 'separator';?>">
    <div class="col-1"><img src="<?=$row['thumb'];?>" alt="<?=$row['name'];?>" width="158" height="98" /></div>
    <h3><?=$row['name'];?></h3>
    <div class="jq-intro"><?=substr($row['content_intro'], 0, -4)." ...</p>";?></div>
    <div class="jq-complete hide">
        <?=$row['content_full'];?>
    </div>
    <a href="javascript:void(Info.show('cont<?=$n?>'));" class="link-moreinfo">M&aacute;s info</a>
</div>

<?php }?>
