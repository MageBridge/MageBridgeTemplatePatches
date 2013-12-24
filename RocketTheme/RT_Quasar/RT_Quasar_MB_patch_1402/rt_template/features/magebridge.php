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
			$gantry->addStyle('magebridge-styles.css');
			if($mb->isHomePage()) {
                $gantry->addStyle('magebridge-frontpage.css');
            }
			
	        //inline css for dynamic stuff
	        //$css = 'waterfiets {color:'.$gantry->get('linkcolor').';}';
	        $gantry->addInlineStyle($css);
	
	        //style stuff
	        $gantry->addStyle($gantry->get('cssstyle').".css");
		}  
	}
} 