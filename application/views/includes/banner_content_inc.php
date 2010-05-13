<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="slider" class="banner">
<?php foreach( $info_banner->result_array() as $row ) {?>
    <img src="<?=$row['image'];?>" alt="" width="551" height="263" />
<?php }?>
</div>

