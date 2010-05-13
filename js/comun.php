<?php
$indexphp = $_GET['a'];
if( !empty($indexphp) ) $indexphp.="/";
header('Content-type: text/javascript');
?>

var baseURI = $("base").attr("href")+"<?=$indexphp;?>";
var panelName = "";
if( location.pathname.indexOf('/paneluser/')!=-1 ) panelName='/paneluser/';
else if( location.pathname.indexOf('/paneladmin/')!=-1 ) panelName='/paneladmin/';

if( $.browser.opera ) $('head').append($('<link href="css/styleOpera.css" rel="stylesheet" type="text/css" />'));
if( $.browser.safari ) $('head').append($('<link href="css/styleSafari.css" rel="stylesheet" type="text/css" />'));
