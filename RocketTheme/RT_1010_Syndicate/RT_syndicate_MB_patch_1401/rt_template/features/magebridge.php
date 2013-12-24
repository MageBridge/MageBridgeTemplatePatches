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
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/custom.css');
			 
	        //inline css for dynamic stuff
			$path = $gantry->templateUrl.'/images';
			$css = '
				#rt-body-surround {z-index: 0}
				button.button {background-color:'.$gantry->get('header-background').';}
				button.button span {background-color:'.$gantry->get('header-background').';}
			
	
				.magebridge-content .cart {border:none; color:'.$gantry->get('body-text').';}
				.opc .active .step-title .number {background:'.$gantry->get('page-link').';border-color:'.$gantry->get('page-link').';}
				.opc .active .step-title h2 {color:'.$gantry->get('page-link').';}
				
				.dashboard .box .box-title {border-bottom:1px dashed '.$gantry->get('body-text').';}
				
				/* MageBridge: replace by h1 colors*/
				#magebridge-content .opc .step-title .number,
				#magebridge-content h2,
				#magebridge-content .cart {color:'.$gantry->get('body-text').';}
				#magebridge-content .fieldset .legend {color:'.$gantry->get('body-text').';}
	
				';
	        $gantry->addInlineStyle($css);
	
	        //style stuff
	        $gantry->addStyle($gantry->get('cssstyle').".css");
		}
	}
} 