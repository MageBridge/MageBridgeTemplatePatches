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
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/'.$gantry->get('cssstyle').".css");
			$gantry->addStyle($gantry->templateUrl.'/css/com_magebridge/bodystyle-'.$gantry->get('body-style').".css");

			$css .= '#magebridge-content .step-title h2, #magebridge-content .opc .step-title .number, #magebridge-content h2, #magebridge-content .cart {color:'.$gantry->get('body-link').';}'."\n";
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
        			
            if($mb->hasPrototypeJs()) {
                $mb->load('jquery');
                $script = "jQuery(document).ready(function(){\n"
                    . "var height = jQuery('#rt-header').height();\n"
			    	. "jQuery('#rt-top-surround').before('<div style=\"height: ' + height + 'px;\">&nbsp;</div>');\n"
			        . "});\n";
    			$gantry->addInlineScript($script);
            }
		}
	}
} 
