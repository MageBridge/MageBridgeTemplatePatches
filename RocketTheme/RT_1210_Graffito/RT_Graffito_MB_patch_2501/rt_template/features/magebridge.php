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
			
			
			$accentColor = new Color($gantry->get('main-accent'));
			$path = $gantry->templateUrl.'/images';
	        $css = null;
	        $css .= "\n";
	        $css .= '.magebridge-module button.button,#magebridge-content button.button {'."\n";
	        $css .= '	background-color:'.$accentColor->lighten('5%').';'."\n";
	        $css .= '	background-color:'.$gantry->get('main-accent').';'."\n";
	        $css .= '	background-image: -webkit-gradient(linear,0 0,0 100%,from('.$accentColor->lighten('5%').'),color-stop(45%,'.$gantry->get('main-accent').'),to('.$gantry->get('main-accent').'));'."\n";
	        $css .= '	background-image: -webkit-linear-gradient('.$accentColor->lighten('5%').','.$gantry->get('main-accent').' 45%,'.$gantry->get('main-accent').');'."\n";
	        $css .= '	background-image: -moz-linear-gradient(top,'.$accentColor->lighten('5%').','.$gantry->get('main-accent').' 45%,'.$gantry->get('main-accent').');'."\n";
	        $css .= '	background-image: -ms-linear-gradient('.$accentColor->lighten('5%').','.$gantry->get('main-accent').' 45%,'.$gantry->get('main-accent').');'."\n";
	        $css .= '	background-image: -o-linear-gradient('.$accentColor->lighten('5%').','.$gantry->get('main-accent').' 45%,'.$gantry->get('main-accent').');'."\n";
	        $css .= '	background-image: linear-gradient('.$accentColor->lighten('5%').','.$gantry->get('main-accent').' 45%,'.$gantry->get('main-accent').');'."\n";
	        $css .= '	background-repeat: no-repeat;'."\n";
	        $css .= '	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\''.$accentColor->lighten('5%').'\',endColorstr=\''.$gantry->get('main-accent').'\',GradientType=0);'."\n";
	        $css .= '	border: 1px solid '.$accentColor->darken('5%').';'."\n";
	        $css .= '}'."\n";

			// Static file
	        if ($gantry->get('static-enabled')) {
	            // do file stuff
	            jimport('joomla.filesystem.file');
	            $filename = $gantry->templatePath.DS.'css'.DS.'com_magebridge'.DS.'static-styles.css';
	
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
	            $gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/static-styles.css',99);
	
	        } else {
	            // add inline style
	            $gantry->addInlineStyle($css);
	        }


			
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
