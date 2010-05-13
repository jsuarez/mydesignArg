<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_PORTFOLIO', 'portfolio');
define('TBL_CLIENTS', 'clients');
define('TBL_DISWEB', 'content_disenioweb');
define('TBL_DISGRAF', 'content_diseniografico');
define('TBL_MARKONL', 'content_markonline');
define('TBL_SERVEXTRA', 'content_servextra');
define('TBL_BANNER_DISWEB', 'banner_disenioweb');
define('TBL_BANNER_DISGRAF', 'banner_diseniografico');
define('TBL_BANNER_MARKONL', 'banner_markonline');
define('TBL_BANNER_SERVEXTRA', 'banner_servextra');


/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR
|--------------------------------------------------------------------------
*/
/*define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a %s MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

define('ERR_DB_UPDATE', 'Ha ocurrido un error al tratar de actualizar la tabla "%s".');
define('ERR_DB_INSERT', 'Ha ocurrido un error al tratar de insertar datos en la tabla "%s".');
define('ERR_DB_DELETE', 'Ha ocurrido un error al tratar de eliminar datos en la tabla "%s".');

define('ERR_PROP_CREATE', 'La propiedad no pudo ser guardada. Si el error coninua por favor, comuniquelo al administrador del sitio.');
define('ERR_PROP_EDIT',   'La propiedad no pudo ser modificada. Si el error coninua por favor, comuniquelo al administrador del sitio.');
define('ERR_PROP_DELETE', 'La propiedad no pudo ser eliminada. Si el error coninua por favor, comuniquelo al administrador del sitio.');*/


/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/

$msg = '
    <b>Fecha/Hora:</b>   %s<br /><br />
    <b>Nombre:</b>   %s<br /><br />
    <b>Email:</b>   %s<br /><br />
    <b>Telefono:</b>   %s<br /><br />
    <b>Consulta:</b><hr color="#000000" />%s
';
//define('EMAIL_CONTACT_TO', 'info@mydesign.com.ar');
define('EMAIL_CONTACT_TO', 'ivan@mydesign.com.ar');
define('EMAIL_CONTACT_SUBJECT', 'Formulario Consulta');
define('EMAIL_CONTACT_MESSAGE', $msg);


/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
/*define('UPLOAD_DIR', './uploads/');
define('UPLOAD_DIR_TMP', './uploads/tmp/');
define('UPLOAD_DIR_WATERMARK', './images/logo_watermark.png');
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 1024); //Expresado en Kylobytes

define('IMAGE_THUMB_WIDTH', 115);
define('IMAGE_THUMB_HEIGHT', 90);
define('IMAGE_ORIGINAL_WIDTH', 800);
define('IMAGE_ORIGINAL_HEIGHT', 600);*/


/*
|--------------------------------------------------------------------------
| CONFIG
|--------------------------------------------------------------------------
*/
//define('CFG_xxxx', 1);


/*
|--------------------------------------------------------------------------
| TITULOS DE CADA SECCION
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'MyDesign Argentina'); // Titulo para todas las secciones
define('TITLE_DISENIOWEB', '');
define('TITLE_DISENIOGRAFICO', '');
define('TITLE_MARKETINGONLINE', '');
define('TITLE_SERVICIOSEXTRA', '');
define('TITLE_PORTFOLIO', '');
define('TITLE_EMPRESA', '');
define('TITLE_FAQ', '');
define('TITLE_SITEMAP', '');



/*
|--------------------------------------------------------------------------
| META - Palabras Claves y Descripcion de la web
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_DISENIOWEB', 'Dise&ntilde;o Web, Dise&ntilde;o Web Mendoza, Dise&ntilde;o de Paginas Web, Diseño de Paginas Web en Mendoza, Paginas web, Empresa de Dise&ntilde;o Web, Empresa de Dise&ntilde;o Web en Mendoza, Paginas Web');
define('META_KEYWORDS_DISENIOGRAFICO', 'Diseño Grafico, Diseño Grafico Mendoza, Diseño de Logo, Diseño de Logo Mendoza, Paginas web, Empresa de Diseño Grafico, Empresa de Diseño Grafico en Mendoza');
define('META_KEYWORDS_MARKETINGONLINE', 'Posicionamiento Web, Posicionamiento Web Mendoza, Marketing Online Paginas Web, Marketing Online en Mendoza, Diseño de newsletters, Diseño de Banners');
define('META_KEYWORDS_SERVICIOSEXTRA', '');
define('META_KEYWORDS_PORTFOLIO', '');
define('META_KEYWORDS_EMPRESA', '');
define('META_KEYWORDS_FAQ', '');
define('META_KEYWORDS_SITEMAP', '');

define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_DISENIOWEB', 'Diseño Web. Realizamos Dise&ntilde;o de Paginas Web optimizado para empresas y particulares, generando nuevas oportunidades de negocio.');
define('META_DESCRIPTION_DISENIOGRAFICO', '');
define('META_DESCRIPTION_MARKETINGONLINE', '');
define('META_DESCRIPTION_SERVICIOSEXTRA', '');
define('META_DESCRIPTION_PORTFOLIO', '');
define('META_DESCRIPTION_EMPRESA', '');
define('META_DESCRIPTION_FAQ', '');
define('META_DESCRIPTION_SITEMAP', '');


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */