<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Email extends CI_Email {

    public function My_Email(){
            parent::CI_Email();
    }

    // --------------------------------------------------------------------

    /**
     * Set Body
     *
     * @access	public
     * @param	string
     * @return	void
     */
    function message($body, $nl2br=null, $txt_empty=false){
        if( is_array($body) ){
            $out = '';
            $ci =& get_instance();

            foreach( $body as $line ){
                if( preg_match("/\{.*\}/", $line)!==FALSE ){
                    $arrFields = $this->_extract_var($line, '{', '}');
                    $j=0;
                    foreach( $arrFields as $var ){
                        //echo $var['val'].'<br>';
                        if( ($val = $ci->input->post($var['val']))!=false ){
                            $j++;
                            if( $nl2br!=null ){
                                if( is_string($nl2br) ) $nl2br = array($nl2br);
                                if( array_search($var['val'], $nl2br)!==FALSE ) $val = nl2br($val);
                            }
                            $line = str_replace($var['tag'], $val, $line);
                        }else{
                            if( $txt_empty ) {
                                $j=1;
                                $line = str_replace($var['tag'], $txt_empty, $line);
                            }
                        }
                    }
                    if( $j!=0 ) $out.=$line;
                }
            }
            $body = $out;
        }

        $this->_body = stripslashes(rtrim(str_replace("\r", "", $body)));
    }

    // --------------------------------------------------------------------

    private function _extract_var(&$str, $left, $right, $del=false){
        $out = array();
        $pos2=0;
        $tmpstr=$str;

        while( ($pos1=strpos($str, $left, $pos2))!== false ){
            if( ($pos2=strpos($str, $right, $pos1))!== false ){
                $val = trim(substr($str,  $pos1+strlen($left), $pos2-$pos1-strlen($left)));
                $tag = $left . $val . $right;
                $out[] = array(
                    'val' => $val,
                    'tag' => $tag
                );
                if( $del ) $tmpstr = str_replace($tag, '', $tmpstr);
            }
        }
        $str = $tmpstr;
        return $out;
    }

}
