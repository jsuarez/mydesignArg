<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets {

	private $ci;
	private $host;
        private $combine;

	// Javascript variables
	private $inline_scripts		= array();
	private $external_scripts 	= array();
	public $external_scripts_default 	= array();
	
	// Styles
	private $styles = array();
	public $styles_default = array();

	private $assets_css_group = array();
	private $assets_js_group = array();

	private $tmp_js = array();
	private $tmp_css = array();

	//---------------------------------------------------------------

	/**
	 * Constructor.
	 * 
	 * Load the assets config file, and inserts the base
	 * css and js into our array for later use. This ensures
	 * that these files will be processed first, in the order
	 * the user is expecting, prior to and later-added files.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		$this->ci =& get_instance();
		
		$this->ci->config->load('assets');
		$this->ci->config->load('assets_js');
		$this->ci->config->load('assets_css');

                $this->styles_default = $this->ci->config->item('assets_css_default');
                $this->external_scripts_default = $this->ci->config->item('assets_js_default');

                $this->assets_css_group = $this->ci->config->item('assets_css_group');
                $this->assets_js_group = $this->ci->config->item('assets_js_group');

		// Setup our host
		$this->host = $this->ci->config->item('asset_host');
		$this->host = empty($this->host) ? base_url() : $this->host;
                $this->combine = $this->ci->config->item('combine_on_'.devmode());
	}

	//---------------------------------------------------------------
	
	//---------------------------------------------------------------
	// !STYLESHEET FUNCTIONS
	//---------------------------------------------------------------

	/**
	 * add_css function.
	 *
	 * accepts either an array or a string with a single css file name
	 * and appends them to the base styles in $this->styles;
	 *
	 * The file names should NOT have the .css added on to them.
	 * 
	 * @access public
	 * @param mixed $styles. (default: null)
	 * @return void
	 */
	public function add_css($styles=null, $combine=null){
            $combine = is_null($combine) ? $this->combine : $combine;

            if (is_string($styles) && !empty($styles)){
                    $this->styles[] = array($combine, $styles);
            }else if (is_array($styles) && count($styles) != 0){
                foreach ($styles as $style){
                    $this->styles[] = array($combine, $style);
                }
            }
	}

	public function add_css_group($styles=null, $combine=null, $get=false){
            $combine = is_null($combine) ? $this->combine : $combine;
            $arr = $this->assets_css_group;
            
            if (is_string($styles) && !empty($styles)) $styles = array($styles);

            foreach( $styles as $style ){
                if( isset($arr[$style]) ){
                    if( is_array($arr[$style]) ){
                        foreach( $arr[$style] as $val ){
                            if(!$get) $this->styles[] = array($combine, $val);
                            else $this->tmp_css[] = array($combine, $val);
                        }
                    }elseif( is_string($arr[$style]) && !empty($arr[$style]) ){
                        if(!$get) $this->styles[] = array($combine, $arr[$style]);
                        else $this->tmp_css[] = array($combine, $arr[$style]);
                    }
                }
            }
	}
	
	//---------------------------------------------------------------
	
	/**
	 * css function.
	 *
	 * Creates the proper links for inserting into the HTML head, 
	 * depending on whether devmode is 'dev' or other (test/production).
	 *
	 * Accepts an array of styles to be used in place of the base files
	 * set in the config file. This allows you to completely replace
	 * the styles being used in one area of your site, like the admin section.
	 *
	 * If you need additional styles than the base, you should make a call
	 * to add_css(), above.
	 *
	 * The file names should NOT have the .css extension. They will be added.
	 * 
	 * @access public
	 * @param mixed $new_styles. (default: null)
	 * @return void
	 */
	public function css($new_styles=null) {
            $styles = array();

            if (is_array($new_styles)){
                $styles = $new_styles;
            } else {
                $styles = $this->styles;
            }

            $folder = $this->ci->config->item('css_folder') . '/';
            $path = $this->ci->config->item('asset_folder');

            $this->_show_tag($this->styles_default, 'css', $path, $folder, true);
	}
	
	//---------------------------------------------------------------
	
	//---------------------------------------------------------------
	// !JAVASCRIPT FUNCTIONS
	//---------------------------------------------------------------
	
	/**
	 * add_js function.
	 *
	 * accepts either an array or a string with a single js file name
	 * and appends them to the base scripts in $this->js;
	 *
	 * The file names should NOT have the .js added on to them.
	 * 
	 * @access public
	 * @param mixed $scripts. (default: null)
	 * @return void
	 */
	public function add_js($scripts=null, $combine=null){
            $combine = is_null($combine) ? $this->combine : $combine;

            if (is_string($scripts) && !empty($scripts)){
                    $this->external_scripts[] = array($combine, $scripts);
            }else if (is_array($scripts) && count($scripts) != 0){
                foreach ($scripts as $script){
                    $this->external_scripts[] = array($combine, $script);
                }
            }
	}

	public function add_js_group($scripts=null, $combine=null, $get=false){
            $combine = is_null($combine) ? $this->combine : $combine;
            $arr = $this->assets_js_group;

            if (is_string($scripts) && !empty($scripts)) $scripts = array($scripts);

            $this->add_css_group($scripts);

            foreach( $scripts as $script ){
                if( isset($arr[$script]) ){
                    if( is_array($arr[$script]) ){
                        foreach( $arr[$script] as $val ){
                            if( !$get ) $this->external_scripts[] = array($combine, $val);
                            else $this->tmp_js[] = array($combine, $val);
                        }
                    }elseif( is_string($arr[$script]) && !empty($arr[$script]) ){
                        if( !$get ) $this->external_scripts[] = array($combine, $arr[$script]);
                        else $this->tmp_js[] = array($combine, $arr[$script]);
                    }
                }
            }
	}	
	//---------------------------------------------------------------

        public function add_js_default($data){
            $this->external_scripts_default = array_merge($this->external_scripts_default, $data);
        }

        public function add_css_default($data){
            $this->styles = array_merge($this->styles, $data);
        }



	/**
	 * add_inline_js function.
	 *
	 * Adds scripts to be rendered on just that page, inline.
	 * 
	 * @access public
	 * @param mixed $scripts. (default: null)
	 * @return void
	 */
	public function add_inline_js($scripts=null) 
	{
		if (is_array($scripts) && count($scripts) != 0)
		{
			foreach ($scripts as $js)
			{
				$this->inline_scripts[] = $js;
			}
		} else if (!empty($scripts))
		{
			$this->inline_scripts[] = $scripts;
		}
	}
	
	//---------------------------------------------------------------
	
	/**
	 * js function.
	 *
	 * Creates the proper links for inserting into the HTML head, 
	 * depending on whether devmode is 'dev' or other (test/production).
	 *
	 * Accepts an array of scripts to be used in place of the base files
	 * set in the config file. This allows you to completely replace
	 * the javascript being used in one area of your site, like the admin section.
	 *
	 * If you need additional scripts than the base, you should make a call
	 * to add_js(), above.
	 *
	 * The file names should NOT have the .js extension. They will be added.
	 * 
	 * @access public
	 * @param mixed $new_js. (default: null)
	 * @return void
	 */
	public function js($new_js=null) 
	{
		$js = array();
	
		if (is_array($new_js))
		{
                    $js = $new_js;
		} else 
		{
                    $js = $this->external_scripts;
		}


                $folder = $this->ci->config->item('js_folder') . '/';
                $path = $this->ci->config->item('asset_folder');

                $this->_show_tag($this->external_scripts_default, 'js', $path, $folder, true);

		//$this->_inline_js();
	}
	
	//---------------------------------------------------------------
	
	/**
	 * _show_tag function.
	 *
	 */

        private function _show_tag($arrLinks, $type, $path, $folder, $def){
            $files = $files_combine = array();
            eval('$this->tmp_'.$type.'=array();');
            foreach( $arrLinks as $val ){
                if( is_array($val) ){
                    if( $def && count($val)==2 ){
                        $arr = explode("/", $val[0]);
                        $val[0] = !is_numeric(array_search("combine", $arr)) ? $this->combine : false;
                        if( array_search("group", $arr)!==FALSE ) {
                            eval('$this->add_'.$type.'_group($val[1], $val[0], true);');
                        }
                    }
                    $combine = $val[0];
                    $name = $val[1];
                }else{
                    $combine = $this->combine;
                    $name = $val;
                }

                if( is_string($name) ){
                    if( !$combine ) {
                        if( $type=="js" ){
                            echo '<script type="text/javascript" src="'. $this->host . $path . $folder . $name .'.js" ></script>' . "\n";
                        }else{
                            echo '<link rel="stylesheet" type="text/css" href="' . $this->host . $path . $folder . $name . '.css" media="screen, projection" />' . "\n";
                        }
                    }
                    else $files_combine[] = $folder . $name;
                }
            }

            if( count($files_combine)>0 ){
                $files_combine = implode('.'.$type.',', $files_combine) . '.'.$type;
                if( $type=="js" ){
                    echo '<script type="text/javascript" src="' . $this->host . $path . $files_combine.'" ></script>' . "\n";
                }else{
                    echo '<link rel="stylesheet" type="text/css" href="' . $this->host . $path . $files_combine . '" />' . "\n";
                }
            }
            if( $def ) {
                if( $type=="js" ){
                    $this->external_scripts = array_merge($this->tmp_js, $this->external_scripts);
                    $this->_show_tag($this->external_scripts, $type, $path, $folder, false);
                }else{
                    $this->styles = array_merge($this->tmp_css, $this->styles);
                    $this->_show_tag($this->styles, $type, $path, $folder, false);
                }
            }
        }
	
	//---------------------------------------------------------------
	
	/**
	 * _inline_js function.
	 *
	 * This private method does the actual work of generating the
	 * inline js code. All code is wrapped by open and close tags
	 * specified in the config file, so that you can modify it to
	 * use your favorite js library.
	 * 
	 * It is called by the js() method.
	 * 
	 * @access private
	 * @return void
	 */
	private function _inline_js() 
	{	
		// Are there any scripts to include? 
		if (count($this->inline_scripts) == 0)
		{
			return false;
		}
		
		// Create our shell opening
		echo '<script type="text/javascript">' . "\n";
		echo $this->ci->config->item('inline_js_opener') ."\n\n";
		
		// Loop through all available scripts
		// inserting them inside the shell.
		foreach($this->inline_scripts as $script)
		{
			echo $script . "\n";
		}
		
		// Close the shell.
		echo "\n" . $this->ci->config->item('inline_js_closer') . "\n";
		echo '</script>' . "\n";
		
	}
	
	//---------------------------------------------------------------
	
	//---------------------------------------------------------------
	// !IMAGE FUNCTIONS
	//---------------------------------------------------------------
	
	public function image($path='', $extras=array()) 
	{
		if (empty($path)) return;
		
		// Build our extra attributes string
		$attributes = '';
		
		foreach ($extras as $key => $value)
		{
			$attributes .= " $key='$value'";
		}
		
		echo '<img src="'. $this->host . $path .'"'. $attributes .' />';
	}
	
	//---------------------------------------------------------------
}

/*
| -------------------------------------------------------------------
|  ABout devMode
| -------------------------------------------------------------------
| This helper provides a simple, efficient, and site-wide way of
| knowing whether your app is running on the development, test, or
| production server.
|
| For many smaller sites, this helper will not be necessary, though
| it can still prove useful, even if it's only used to set the active
| database group.
|
| When building your $servers array, do not include the http:// or
| https://. Also, make sure that your production server is listed last 
| within the array, so that any subdomain searches will be caught
| prior to finding the main site.
|
*/

function devmode($test_mode=null)
{
	$ci =& get_instance();
    $servers = $ci->config->item('servers');

    // To make testing more accurate, get rid of the http://, etc.
    $current_server = strtolower(trim(base_url(), ' /'));
    $current_server = str_replace('http://', '', $current_server);
    $current_server = str_replace('https://', '', $current_server);


    //$current_mode = array_search($current_server, $servers);
    
    $current_mode = '';
    
    // Because the server name could contain www. or subdomains,
    // we need to search each item to see if it contains the string.
    foreach ($servers as $name => $domain)
    {
        if (!empty($domain))
        { 
            if (strpos($current_server, $domain) !== FALSE)    {
                $current_mode = $name;
                break;
            }
        }
    }
    

    // Time to figure out what to return.
    if (empty($test_mode))
    {
        // Not performing a check, so just return the current value
        return $current_mode;
    } else
    {
        return $current_mode == $test_mode;
    }
    
}

//---------------------------------------------------------------

// END Assets class

/* End of file Assets.php */
/* Location: ./application/libraries/Assets.php */