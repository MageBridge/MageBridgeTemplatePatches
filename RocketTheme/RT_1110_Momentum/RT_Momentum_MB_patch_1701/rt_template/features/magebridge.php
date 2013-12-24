<?php
/**
 * @package   MageBridge Template Patch
 * @version   1.5.0 March, 2010
 * @author    Yireo http://www.yireo.com
 * @copyright Copyright (C) 2007 - 2010 Yireo
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * MageBridge Template patch uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

class GantryFeatureMageBridge extends GantryFeature {
    var $_feature_name = 'magebridge';

    function isEnabled() {
		if(class_exists('MageBridgeTemplateHelper')) {
            return true;
        }
        return true;
    }

    function isInPosition($position) {
        return false;
    }

	function init() {
        global $gantry;

		if(!class_exists('MageBridgeTemplateHelper')) {
            return;
        }
		
		$mb = new MageBridgeTemplateHelper();
		if($mb->isLoaded()) {		
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/default.css');
			
			// IE styling
			jimport('joomla.environment.browser');
			$browser = JBrowser::getInstance();
			$msie = ($browser->getBrowser() == 'msie') ? true : false;
	        if ($msie) { 
    			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/default-ie.css');
			}

			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/custom.css');

			$path = $gantry->templateUrl.'/images';
			$cssstyle = $gantry->get('cssstyle');
			$bodystyle = $gantry->get('body-background');
	        $css = null;
			$css .= '.magebridge-module button.button ,#magebridge-content button.button {background-color:'.$gantry->get('primary-color').';}'."\n";
			$css .= '.magebridge-module button.button span,#magebridge-content button.button span{color:'.$gantry->get('main-text').';}'."\n";

	        if ($gantry->get('static-enabled')) {
	            // do file stuff
	            jimport('joomla.filesystem.file');
	            $filename = $gantry->templatePath.DS.'css'.DS.'static-styles.css';
	
	            if (file_exists($filename)) {
	                if ($gantry->get('static-check')) {
	                    //check to see if it's outdated
	
	                    $md5_static = md5_file($filename);
	                    $md5_inline = md5($css);
	
	                    if ($md5_static != $md5_inline) {
	                        JFile::write($filename, $css);
	                    }
	                }
	            } else {
	                // file missing, save it
	                JFile::write($filename, $css);
	            }
	            // add reference to static file
	            $gantry->addStyle('static-styles.css',99);
	
        	} else {
        	    // add inline style
        	    $gantry->addInlineStyle($css);
        	}

			/*$cssstyle = $gantry->get('cssstyle');
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/'.$cssstyle.'.css');*/
        			
            if($mb->hasPrototypeJs()) {
                $mb->load('jquery');
                $script = "jQuery(document).ready(function(){\n"
                	. "jQuery('#rt-transition').addClass('rt-visible').removeClass('rt-hidden');"
                	. "jQuery('#rt-transition').css('opacity','1');"
                	. "jQuery('#rt-container-bg').addClass('rt-visible').removeClass('rt-hidden');"
                	. "jQuery('#rt-container-bg').css('opacity','1');"
			        . "});\n";
    			$gantry->addInlineScript($script);
    			
            }
		}
	}
} 
