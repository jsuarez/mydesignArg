<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function print_array($arr, $die=FALSE){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    if( $die ) die();
}

function is_localhost(){
    $hostname = $_SERVER['SERVER_NAME'];
    return $hostname=="localhost" || preg_match("/192.168/", $hostname);
}

function file_search_special($dir, $filename_search){
    if( substr($dir,-1)=="/" ) $dir = substr($dir, 0, strlen($dir)-1);
    if( is_dir($dir) ){
        $d=opendir($dir);
        while( $file = readdir($d) ){
            if( $file!="." AND $file!=".." ){
                if( is_file($dir.'/'.$file) ){
                    // Es Archivo
                    if( strpos($file, $filename_search) ){
                        return ($dir.'/'.$file);
                    }
                }

                if( is_dir($dir.'/'.$file) ){
                     // Es Directorio
                     // Volvemos a llamar
                     $r = file_search($dir.'/'.$file, $filename_search);
                     if( basename($r) == $filename_search ){
                        return $r;
                     }
                }
            }
        }
    }
    return false;
}

 function part_filename($name){
    return array(
        'ext'=>substr($name, (strripos($name, ".")-strlen($name))+1),
        'basename'=>substr($name, 0, strripos($name, "."))
    );
 }

function delete_images_temp(){
    $d = opendir(UPLOAD_DIR_OBRAS.".tmp/");
    $CI =& get_instance();
    while( $file = readdir($d) ){
        if( $file!="." AND $file!=".." ){
            if( preg_match("/^".$CI->session->userdata('user_id')."\_.*$/", $file) ){
                @unlink(UPLOAD_DIR_TMP.$file);
            }
        }
    }
}

function order_dates($str_date, $order='asc', $format='d-m-Y'){
    if( !is_array($str_date) ) (array)$str_date;

    $str_date_new = array();
    foreach( $str_date as $key=>$val ){
        $str_date_new[$key] = strtotime($val);
    }

    if( $order=="asc" || ($order!='asc'&&$order!='desc') ) arsort($str_date_new);
    elseif( $order=="desc" ) asort($str_date_new);

    $str_date = array();
    foreach( $str_date_new as $key=>$val ){
        $d = date($format, $val);
        $str_date[$key] = $d;
    }
    return $str_date;
}

function display_error($file, $function, $err, $param=array()){
    if( count($param)>0 ) {
        $err = vsprintf($err, $param);
    }
    log_message("error", $file." | ".$function." | ".$err);
    show_error($err);
}

function add_date($givendate, $format='d-m-Y h:i:s', $params=array('d'=>0, 'm'=>0, 'y'=>0, 'h'=>0, 'i'=>0, 's'=>0)) {
    $p = array(
        'd' => !isset($params['d']) ? 0 : $params['d'],
        'm' => !isset($params['m']) ? 0 : $params['m'],
        'y' => !isset($params['y']) ? 0 : $params['y'],
        'h' => !isset($params['h']) ? 0 : $params['h'],
        'i' => !isset($params['i']) ? 0 : $params['i'],
        's' => !isset($params['s']) ? 0 : $params['s']
    );

    $cd = strtotime($givendate);
    $newdate = date($format, mktime(date('h',$cd)+$p['h'],
    date('i',$cd)+$p['i'], date('s',$cd)+$p['s'], date('m',$cd)+$p['m'],
    date('d',$cd)+$p['d'], date('Y',$cd)+$p['y']));
    return $newdate;
}

function is_date($strdate){
    $timestamp = strtotime($strdate);
    if( $timestamp === false ) return false;

    $time = strtotime($strdate);
    return checkdate(date('m', $time), date('d', $time), date('Y', $time));
}

/*
 * @example : arr_search($myarray, 'keyname==4)
 */
function arr_search ( $array, $expression ) {
    $result = array();
    $expression = preg_replace ( "/([^\s]+?)(=|<|>|!)/", "\$a['$1']$2", $expression );
    foreach ( $array as $a ) if ( eval ( "return $expression;" ) ) $result[] = $a;
    return $result;
}

function array_insert(&$array, $elemento, $pos) {

    if($pos < 0) {
        return;
    }

    ## si la posicion es mayor que el tamaño de la lista
    ## el nodo se inserta al final
    if($pos>=count($array) ) {
        array_push($array,$elemento);
        return;
    }

    $listaaux=array(); # array auxiliar
        ## buscamos la posicion en el array, para ello las posiciones anteriores
        ## las guardamos en el array auxiliar
    for($cont=0;$cont<$pos;$cont++) {
        $listaaux[] = array_shift($array);
    }

        ## ahora se inserta el elemento al principio del array original
    array_unshift($array,$elemento);

        ## ahora recorremos el array auxiliar desde el final y vamos insertando
        ## sus elementos al principio del array original
    if(count($listaaux)>0) {
        for($i=count($listaaux)-1;$i>=0;$i--) {
            array_unshift($array,$listaaux[$i]);
        }
    }
}

function array_implode($parent, $arr){
    $ret="";
    foreach( $arr as $key=>$val ){
        if( !empty($val) ) $ret.= $key . $parent . $val . $parent;
        else $ret.= $key . $parent;
    }
    return $ret;
}

function EmailMessageConstructor($data, $arr){
    $ret = array();
    foreach( $arr as $key=>$val ){
        if( isset($data[$key]) ){
            if( is_array($data[$key]) ){
                foreach( $data[$key] as $v ) $val = sprintf($val, $v);
                $ret[] = $val;
            }else{
                if( !empty($data[$key]) && $data[$key]!='null' )
                    $ret[] = sprintf($val, $data[$key]);
            }
        }
    }
    return implode("", $ret);
}

function normalize($text, $separator = "-"){
    $isUTF8 = (mb_detect_encoding($text." ",'UTF-8,ISO-8859-1') == 'UTF-8');

    $text = ($isUTF8) ? utf8_decode($text) : $text;
    $text = trim($text);

    $_a = utf8_decode("ÁÀãâàá");
    $_e = utf8_decode("ÉÈéè");
    $_i = utf8_decode("ÍÌíì");
    $_o = utf8_decode("ÓÒóò");
    $_u = utf8_decode("ÚÙúù");
    $_n = utf8_decode("Ññ");
    $_c = utf8_decode("Çç");
    $_b = utf8_decode("ß");
    $_dash = "\.,_ ";

    $text = preg_replace("/[$_a]/", "a", $text );
    $text = preg_replace("/[$_e]/", "e", $text );
    $text = preg_replace("/[$_i]/", "i", $text );
    $text = preg_replace("/[$_o]/", "o", $text );
    $text = preg_replace("/[$_u]/", "u", $text );
    $text = preg_replace("/[$_n]/", "n", $text );
    $text = preg_replace("/[$_c]/", "c", $text );
    $text = preg_replace("/[$_b]/", "ss", $text );

    $text = preg_replace("/[$_dash]/", $separator, $text );
    $text = preg_replace("/[^a-zA-Z0-9\-]/", "", $text );

    $text = strtolower($text);

    return ($isUTF8) ? utf8_encode($text) : $text;
}

function get_def_post($val, $def){
    $val = trim($_POST[$val]);
    if( empty($val) ){
        return trim($def);
    }else{
        return $val;
    }
}

function getval($val, $def, $t=''){
    return $val==$t ? $def : '';
}

function calc_age($date){
    if( empty($date) || is_null($date) ) return '';

    $day = date('d', $date);
    $month = date('m', $date);
    $year = date('Y', $date);

    $year_dif = date("Y") - (int)$year;
    $month_dif = date("m") - (int)$month;
    $day_dif = date("d") - (int)$day;

    if ($day_dif < 0 || $month_dif < 0) $year_dif--;

    return $year_dif;
}

?>
