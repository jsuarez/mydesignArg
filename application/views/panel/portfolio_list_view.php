<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')!='' ){?>
    <div class="<?=$this->session->flashdata('status')?>">
        La eliminaci&oacute;n se realizado con &eacute;xito.
    </div>
    <div class="clear"></div>
<?php }?>


<div class="trow" style="text-align: right">
    <button type="button" onclick="Portfolio.New()">Nuevo</button>&nbsp;&nbsp;
    <button type="button" onclick="Portfolio.del_sel()">Eliminar</button>
</div>

<div id="tabs">
    <ul>
        <li><a href="<?=site_url('jpanel/portfolio/view/work/portfolio_works')?>">Trabajos</a></li>
        <li><a href="<?=site_url('jpanel/portfolio/view/clients/portfolio_clients')?>">Clientes</a></li>
    </ul>
</div>
