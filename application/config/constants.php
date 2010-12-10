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
define('TBL_PORTFOLIO_WORKS',             'portfolio_works');
define('TBL_PORTFOLIO_CLIENTS',           'portfolio_clients');
define('TBL_SETUP',                       'setup');
define('TBL_MESSAGES',                    'messages');

/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR PARA UPLOAD
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a {size} MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

define('ERR_VALID_REQUIRED', 'El campo "%s" es obligatorio.');
define('ERR_VALID_EMAIL', 'Por favor, escribe una direcci&oacute;n de correo v&aacute;lida.');

/*
|--------------------------------------------------------------------------
| EMAIL FORM CONTACTO
|--------------------------------------------------------------------------
*/
//define('EMAIL_CONTACT_TO', 'info@mydesign.com.ar, basaezj@mydesign.com.ar');
define('EMAIL_CONTACT_TO', 'ivan@mydesign.com.ar, gustavo@mydesign.com.ar');
define('EMAIL_CONTACT_SUBJECT', 'MyDesign - Formulario de Contacto');
define('EMAIL_CONTACT_MESSAGE', json_encode(array(
    '<b>Nombre:</b> {txtName}<br /><br />',
    '<b>Telefono:</b> {txtPhoneCode}-{txtPhoneNum}<br /><br />',
    '<b>E-mail:</b> {txtEmail}<br /><br />',
    '<b>Consulta:</b><br />{txtConsult}'
)));

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('UPLOAD_PATH_SERVICES_THUMBS', './uploads/thumbs/');
define('UPLOAD_PATH_SERVICES_GALLERY', './uploads/gallery/');
define('UPLOAD_PATH_PORTFOLIOWORKS', './uploads/portfolio_works/');
define('UPLOAD_PATH_PORTFOLIOCLIE', './uploads/portfolio_clients/');

define('IMAGESIZE_WIDTH_THUMBS', 200);
define('IMAGESIZE_HEIGHT_THUMBS', 120);
define('IMAGESIZE_WIDTH_GALLERY', 320);
define('IMAGESIZE_HEIGHT_GALLERY', 260);

define('IMAGESIZE_WIDTH_PORTFOLIOWORK', 213);
define('IMAGESIZE_HEIGHT_PORTFOLIOWORK', 146);
define('IMAGESIZE_WIDTH_PORTFOLIOCLIENTS', 153);
define('IMAGESIZE_HEIGHT_PORTFOLIOCLIENTS', 93);

/*
|--------------------------------------------------------------------------
| TITULOS DE CADA SECCION
|--------------------------------------------------------------------------
*/
define('TITLE_INDEX_PANEL', 'MyDesign Argentina - Panel');


/*
|--------------------------------------------------------------------------
| CONFIGURACION GENERAL
|--------------------------------------------------------------------------
*/
define('CACHE_TIME', 5);
define('LANG', 1);


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */