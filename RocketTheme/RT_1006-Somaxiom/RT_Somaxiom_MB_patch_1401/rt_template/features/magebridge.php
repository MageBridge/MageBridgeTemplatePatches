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
			$path = $gantry->templateUrl.'/images';
			$css = '
				.category-products button.button, 
				.block-cart button.button,
				.block-subscribe .actions button.button,
				.add-to-cart button.button,
				#addTagForm button.button	{ padding:0 6px 0 54px; margin-right:5px; text-align:center; background:transparent url('.$path.'/body/'.$gantry->get('cssstyle').'/readon-bg.png) 0 0 no-repeat; }
				.category-products button.button:hover, 
				.block-cart button.button:hover,
				.block-subscribe .actions button.button:hover,
				.add-to-cart button.button:hover,
				#addTagForm button.button:hover { padding:0 6px 0 54px; margin-right:5px; text-align:center; background:transparent url('.$path.'/body/'.$gantry->get('cssstyle').'/readon-bg.png) 0 -28px no-repeat; }
				.category-products button.button span,
				.block-cart button.button span,
				.block-subscribe .actions button.button span,
				.add-to-cart button.button span,
				#addTagForm button.button span { background:none; }
				';
	        $gantry->addInlineStyle($css);
	
	        //style stuff
	        $gantry->addStyle($gantry->get('cssstyle').".css");
		}
	}
} 