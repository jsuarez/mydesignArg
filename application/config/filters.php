<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Filters configuration
| -------------------------------------------------------------------
|
| Note: The filters will be applied in the order that they are defined
|
| Example configuration:
|
| $filter['auth'] = array('exclude', array('login/*', 'about/*'));
| $filter['cache'] = array('include', array('login/index', 'about/*', 'register/form,rules,privacy'));
|
*/

/*
$filter['perfmon'] = array(
	'include', array('*'), array('warning_time' => 0.001)
);
$filter['test'] = array(
	'include', array('*'), array()
);
*/


$filter['auth'] = array(
    'exclude',
     array(
         'auth/login','auth/logout','auth/forgot_password','auth/reset_password','auth/activacion','auth/registro',
         'admin/registration', 'terminos/index',
         'mailer/notificar', 'mailer/procesar', 'mailer/limpiar'
     ),
);

?>