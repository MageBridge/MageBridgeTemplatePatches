<?php
/**
 * @package   MageBridge Template Patch
 * @version   1.5.0 January, 2010
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
			$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/default.css");
			$gantry->addStyle($gantry->templateUrl."/css/com_magebridge/custom.css");
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/style/'.$gantry->get('cssstyle').'.css');
			
	        // inline css for dynamic stuff
            $css = null;
			if($gantry->get('cssstyle') == 'style1' or $gantry->get('cssstyle') == 'style3' or $gantry->get('cssstyle') == 'style5' ) {
				$css .= ".magebridge-content .cart {color:#ffffff;}\n";
			}

			$path = $gantry->templateUrl.'/images';
			$css .= 'button.button {background: url('.$path.'/body/'.$gantry->get('cssstyle').'/readon-l.png) 0 0 no-repeat;}
					button.button span {background: url('.$path.'/body/'.$gantry->get('cssstyle').'/readon-r.png) 100% 0 no-repeat;}
					#magebridge-content .account-login .buttons-set,
					#magebridge-content .data-table thead,
					#magebridge-content .opc .step-title,
					#magebridge-content .cart-table thead,
					#magebridge-content .cart-table tfoot {background:'.$gantry->get('linkcolor').';}
					#magebridge-content .opc .step-title .number,
					#magebridge-content h2 {color:'.$gantry->get('linkcolor').';}
					#magebridge-content .product-options-bottom { background:'.$gantry->get('linkcolor').'; border:none;  }
					#magebridge-content .fieldset .legend {border-color:'.$gantry->get('linkcolor').';}					
					';

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
