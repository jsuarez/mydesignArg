<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">
    Los datos han sido guardados con &eacute;xito.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error"><?=$this->session->flashdata('error')?></div>
<?php }?>
<form id="form1" method="post" action="<?=site_url('/jpanel/services/'.(isset($info) ? 'edit' : 'create'))?>" enctype="application/x-www-form-urlencoded" class="form-services">
    <div class="trow">
        <label class="label" for="txtTitle">* T&iacute;tulo</label>
        <input type="text" name="txtTitle" id="txtTitle" value="<?=@$info['title']?>" />
    </div>
    <div class="trow">
        <label class="label" for="txtThumb">* Im&aacute;gen</label>
<?php
$src = isset($info) ? UPLOAD_PATH_SERVICES_THUMBS .$reference.'/'. @$info['thumb'] : '';
?>
        <div id="cont-image-1" class="span-13 last">
            <img src="<?=$src?>" alt="<?=@$info['thumb']?>" width="200" height="120" class="ajaxupload-thumb fleft thumbframe1 <?php if( $src=='' ) echo 'hide'?>" />
            <div class="clear span-13 last">
                <input type="file" id="txtThumb" name="txtThumb" class="ajaxupload-input" size="20" />&nbsp;
                <button type="button" onclick="Services.upload('#cont-image-1');">Subir</button>
                <img src="img/ajax-loader2.gif" alt="Loading..." width="43" height="11" class="hide ajaxupload-load" />
                <div class="ajaxupload-error clear error span-7 hide" style="margin-top:10px"></div>
            </div>
        </div>
        <input type="hidden" name="image_thumb_old" value="<?=$src?>" />
    </div>
    <div class="trow">
        <label class="label" for="txtDescription">* Descripci&oacute;n</label>
        <div class="span-13 last"><textarea rows="10" cols="10" id="txtDescription" name="txtDescription"><?=@$info['content_intro']?></textarea></div>
    </div>
    <div class="trow">
        <label class="label" for="txtContent">* Contenido</label>
        <div class="span-13 last"><textarea rows="10" cols="10" id="txtContent" name="txtContent"><?=@$info['content_full']?></textarea></div>
    </div>
    <div class="trow">
        <label class="label">Fotos Galer&iacute;a</label>
        <div class="span-13 last">
            <fieldset class="gallery-panel">
            <?php $path = UPLOAD_PATH_SERVICES_GALLERY.$reference.'/';?>
                
                <div class="cont">
                    <ul id="gallery-image" <?php if( !isset($info) || count(@$info['gallery'])==0 ){?>class="hide"<?php }?>>
            <?php if( isset($info) && count(@$info['gallery'])>0 ){?>
                <?php foreach( $info['gallery'] as $row ){?>
                        <li>
                            <img src="<?=$path.$row['filename']?>" alt="<?=$row['filename']?>" width="108" height="70" />
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link-img fleft jq-removeimg"><img src="img/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="link-img fright handle"><img src="img/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
                <?php }?>

            <?php }else{?>
                        <li>
                            <img src="" alt="" width="" height="" />
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link-img fleft jq-removeimg"><img src="img/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="link-img fright handle"><img src="img/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
            <?php }?>
                    </ul>
                </div>
            </fieldset>

            <div class="fleft clear">
                <div class="span-14 last">
                    <input type="file" size="20" name="txtUploadFile" id="txtUploadFile" />&nbsp;
                    <button id="btnUpload" type="button" onclick="PictureGallery.upluad()">Subir</button>
                    <img id="ajax-loader1" src="img/ajax-loader2.gif" alt="Loading..." width="43" height="11" class="hide" />
                </div>
                <div id="pg-msgerror" class="clear error span-7 hide"></div>
            </div>
        </div>
    </div>

    <div class="trow align-center"><button type="submit" id="btnSubmit">Guardar</button></div>
    <input type="hidden" name="json" id="json" />
    <input type="hidden" name="content_id" id="content_id" value="<?=@$info['content_id']?>" />
    <input type="hidden" name="reference" id="reference" value="<?=$reference?>" />
</form>

<form id="ajaxupload-form" action="<?=site_url('/jpanel/services/ajax_upload_products')?>" method="post" enctype="multipart/form-data" target="ifr" class="hide">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
    <input type="hidden" name="reference" value="<?=$reference?>" />
</form>

<script type="text/javascript">
<!--
    Services.modedit = <?=isset($info) ? "true" : "false"?>;
-->
</script>