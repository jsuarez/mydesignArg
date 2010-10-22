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
define('TBL_USERS',                       'users');
define('TBL_CONTENTS',                    'contents');
define('TBL_CONTENTS_SERVICES',           'contents_services');
define('TBL_CONTENTS_SERVICES_GALLERY',   'contents_services_gallery');
define('TBL_BANNERS',                     'banners');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
$msg = '<b>Nombre:</b> {name}<br />
<b>Telefono:</b> {phone}<br />
<b>E-mail:</b> {email}<br />
<b>IP:</b> {ip}<br />
<b>Sistema Operativo:</b> {so}<br />
<b>Navegador:</b> {browser}<br />
<b>Consulta:</b><hr color="#000000" />{message}';
//define('EMAIL_CONTACT_TO', 'info@mydesign.com.ar, basaezj@mydesign.com.ar');
define('EMAIL_CONTACT_TO', 'ivan@mydesign.com.ar');
define('EMAIL_CONTACT_SUBJECT', 'MyDesign - Formulario de Contacto');
define('EMAIL_CONTACT_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_SERVICES_THUMBS', './uploads/thumbs/');
define('UPLOAD_PATH_SERVICES_GALLERY', './uploads/gallery/');
define('IMAGESIZE_WIDTH_THUMBS', 200);
define('IMAGESIZE_HEIGHT_THUMBS', 120);
define('IMAGESIZE_WIDTH_GALLERY', 320);
define('IMAGESIZE_HEIGHT_GALLERY', 260);


/*
|--------------------------------------------------------------------------
| TITULOS DE CADA SECCION
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'MyDesign Argentina - '); // Titulo para todas las secciones
define('TITLE_INDEX_PANEL', 'MyDesign Argentina - Panel');
define('TITLE_DISENIOWEB', 'Dise&ntilde;o Web');
define('TITLE_DISENIOGRAFICO', 'Dise&ntilde;o Gr&aacute;fico');
define('TITLE_MARKETINGONLINE', 'Marketing Online');
define('TITLE_PORTFOLIO', 'Portfolio');
define('TITLE_EMPRESA', 'Empresa');
define('TITLE_FAQ', 'Preguntas frecuentes');
define('TITLE_SITEMAP', 'Mapa del sitio');
define('TITLE_TESTIMONIALES', 'Testimoniales');
define('TITLE_POLITICAS', 'Pol&iacute;ticas de Privacidad');
define('TITLE_TERMINOS', 'T&eacute;rminos y Condiciones');



/*
|--------------------------------------------------------------------------
| META - Palabras Claves y Descripcion de la web
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBAL', '');
define('META_KEYWORDS_DISENIOWEB', 'Dise&ntilde;o Web, Dise&ntilde;o Web Mendoza, Dise&ntilde;o de Paginas Web, Diseño de Paginas Web en Mendoza, Paginas web, Empresa de Dise&ntilde;o Web, Empresa de Dise&ntilde;o Web en Mendoza, Paginas Web');
define('META_KEYWORDS_DISENIOGRAFICO', 'Diseño Grafico, Diseño Grafico Mendoza, Diseño de Logo, Diseño de Logo Mendoza, Paginas web, Empresa de Diseño Grafico, Empresa de Diseño Grafico en Mendoza');
define('META_KEYWORDS_MARKETINGONLINE', 'Posicionamiento Web, Posicionamiento Web Mendoza, Marketing Online Paginas Web, Marketing Online en Mendoza, Diseño de newsletters, Diseño de Banners');
define('META_KEYWORDS_PORTFOLIO', '');
define('META_KEYWORDS_EMPRESA', '');
define('META_KEYWORDS_FAQ', '');
define('META_KEYWORDS_SITEMAP', '');
define('META_KEYWORDS_TESTIMONIALES', '');
define('META_KEYWORDS_POLITICAS', '');
define('META_KEYWORDS_TERMINOS', '');

define('META_DESCRIPTION_GLOBAL', '');
define('META_DESCRIPTION_DISENIOWEB', 'Diseño Web. Realizamos Dise&ntilde;o de Paginas Web optimizado para empresas y particulares, generando nuevas oportunidades de negocio.');
define('META_DESCRIPTION_DISENIOGRAFICO', '');
define('META_DESCRIPTION_MARKETINGONLINE', '');
define('META_DESCRIPTION_PORTFOLIO', '');
define('META_DESCRIPTION_EMPRESA', '');
define('META_DESCRIPTION_FAQ', '');
define('META_DESCRIPTION_SITEMAP', '');
define('META_DESCRIPTION_TESTIMONIALES', '');
define('META_DESCRIPTION_POLITICAS', '');
define('META_DESCRIPTION_TERMINOS', '');

/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);
define('LANG', 1);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */