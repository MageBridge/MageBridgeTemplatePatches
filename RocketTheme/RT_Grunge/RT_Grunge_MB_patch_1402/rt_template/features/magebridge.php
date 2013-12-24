<?php
/**
 * @package   MageBridge Template Patch
 * @version   1.5.0 August, 2010
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
			/* If at Components >> MageBridge >> Configuration >> Theming 
			 * the option "Disable MageBridge CSS" is set to "No"
			 * then default css files are taken from css/com_magebridge */
			$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/default.css");
			$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/custom.css");
			
	        //inline css for dynamic stuff
			$path = $gantry->templateUrl.'/images';
			$css = '';
	        $gantry->addInlineStyle($css);
	
	        //style stuff
	        $gantry->addStyle($gantry->get('cssstyle').".css");
	        
	        if ($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '6') {
				$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/default-ie.css");
			}
	        if ($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '7') {
				$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/default-ie.css");
			}
	        if ($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '8') {
				$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/default-ie.css");
			}
		}
	}
} 