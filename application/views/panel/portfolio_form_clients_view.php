<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">Los datos han sido guardados con &eacute;xito.</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error"><?=$this->session->flashdata('error')?></div>
<?php }?>

<form id="form-portfolioclie" method="post" action="<?=site_url('/jpanel/portfolio/'.(isset($info) ? 'clieedit' : 'cliecreate'))?>" enctype="application/x-www-form-urlencoded" class="form-portfolio">
    <div class="trow">
        <label class="label" for="txtName">* Nombre</label>
        <div class="span-13 last"><input type="text" name="txtName" id="txtName" value="<?=@$info['name']?>" /></div>
    </div>
    <div class="trow">
        <label class="label" for="txtThumb">* Im&aacute;gen</label>
<?php
$src = @$info['filename']!='' ? UPLOAD_PATH_PORTFOLIOCLIE . @$info['filename'] : '';
?>
        <div id="cont-image-1" class="span-13 last">
            <img src="<?=$src?>" alt="<?=@$info['filename']?>" width="<?=IMAGESIZE_WIDTH_PORTFOLIOCLIENTS?>" height="<?=IMAGESIZE_HEIGHT_PORTFOLIOCLIENTS?>" class="ajaxupload-thumb fleft framethumb <?php if( $src=='' ) echo 'hide'?>" />
            <div class="clear span-13 last">
                <input type="file" id="txtThumb" name="txtThumb" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Portfolio.upload('#cont-image-1');">Subir</button>
                <img src="public/img/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide ajaxupload-load" />
                <div class="ajaxupload-error clear span-7 hide" style="margin-top:10px"></div>
            </div>
        </div>
        <input type="hidden" name="image_thumb_old" value="<?=$src?>" />
    </div>
    <div class="trow align-center"><button type="submit" id="btnSubmit">Guardar</button></div>
    <input type="hidden" name="json" id="json" />
    <input type="hidden" name="id" id="id" value="<?=@$info['id']?>" />
</form>
<form id="ajaxupload-form" action="<?=site_url('/jpanel/portfolio/ajax_upload_products')?>" method="post" enctype="multipart/form-data" target="ifr" class="hide">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
    <input type="hidden" name="path" value="<?=UPLOAD_PATH_PORTFOLIOCLIE?>" />
    <input type="hidden" name="width" value="<?=IMAGESIZE_WIDTH_PORTFOLIOCLIENTS?>" />
    <input type="hidden" name="height" value="<?=IMAGESIZE_HEIGHT_PORTFOLIOCLIENTS?>" />
</form>