<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function print_array($arr, $die=FALSE){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    if( $die ) die();
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

//Función de obtención de IP (basado en la web de webhosting.info)
function get_country($ip_address){
    //By Marc Palau (http://www.nbsp.es)
    $url = "http://ip-to-country.webhosting.info/node/view/36";

    $inici = "src=/flag/?type=2&cc2=";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST,"POST");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "ip_address=$ip_address");

    ob_start();

    curl_exec($ch);
    curl_close($ch);
    $cache = ob_get_contents();
    ob_end_clean();

    $resto = strstr($cache,$inici);
    $pais = substr($resto,strlen($inici),2);

    return $pais;
}

function setup($var){
    $CI =& get_instance();
    $CI->db->select($var);
    $arr = $CI->db->get(TBL_SETUP)->row_array();
    return $arr[$var];
}


?>
