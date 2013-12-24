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
			// Style Inclusion
			$cssstyle = $gantry->get('cssstyle');
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/'.$cssstyle.'.css');

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
