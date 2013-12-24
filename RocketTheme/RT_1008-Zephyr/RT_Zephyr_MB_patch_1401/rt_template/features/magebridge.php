<?php
/**
 * @package   Reaction Template - RocketTheme
 * @version   1.5.0 December 1, 2009
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2009 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Reaction Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
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
			 
	        //inline css for dynamic stuff
			$path = $gantry->templateUrl.'/images';
			$css = '
				button.button span {color:'.$gantry->get('page-link').';}
				button.button:hover span {color:'.$gantry->get('feature-text').';}
				
				.magebridge-content .cart {border:none; color:'.$gantry->get('body-text').';}
				.opc .active .step-title .number {background:'.$gantry->get('page-link').';border-color:'.$gantry->get('page-link').';}
				.opc .active .step-title h2 {color:'.$gantry->get('page-link').';}
				
				.dashboard .box .box-title {border-bottom:1px dashed '.$gantry->get('body-text').';}
				';
	        $gantry->addInlineStyle($css);
	
	        //style stuff
	        $gantry->addStyle($gantry->get('cssstyle').".css");
		}
	}
} 