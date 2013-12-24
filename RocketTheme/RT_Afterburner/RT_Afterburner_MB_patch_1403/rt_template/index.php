<?php
/**
 * @copyright	Copyright (C) 2005 - 2009 RocketTheme, LLC - All Rights Reserved.
 * @license		GNU/GPL, see LICENSE.php
**/
defined( '_JEXEC' ) or die( 'Restricted access' );
define( 'YOURBASEPATH', dirname(__FILE__) );

$color_style			= $this->params->get("colorStyle", "dark");
$template_width 		= $this->params->get("templateWidth", "962");
$leftcolumn_width		= $this->params->get("leftcolumnWidth", "210");
$rightcolumn_width		= $this->params->get("rightcolumnWidth", "210");
$leftcolumn_color		= $this->params->get("leftcolumnColor", "color2");
$rightcolumn_color		= $this->params->get("rightcolumnColor", "color1");
$mootools_enabled       = ($this->params->get("mootools_enabled", 1)  == 0)?"false":"true";
$caption_enabled        = ($this->params->get("caption_enabled", 1)  == 0)?"false":"true";
$rockettheme_logo       = ($this->params->get("rocketthemeLogo", 1)  == 0)?"false":"true";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<?php
require(YOURBASEPATH . DS . "rt_utils.php");

$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/".$color_style.".css");

/*
 * Yireo modifications for MageBridge
 */
if(class_exists('MageBridgeTemplateHelper')) {
    $mb = new MageBridgeTemplateHelper();

    if($mb->isLoaded()) {
        $this->addStylesheet($this->baseurl."/templates/".$this->template."/css/magebridge-styles.css");
        // the following is optional for the MageBridge homepage together with JM Product list module 
        if($mb->isHomePage()) { $this->addStylesheet($this->baseurl."/templates/".$this->template."/css/magebridge-frontpage.css");}
    	if (rok_isIe()) { 
    		$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/magebridge-styles-ie.css");
		}
    }

	$inlinestyle = "";
	switch ($color_style) {
    	case "dark":
    	    $inlinestyle .= "
	.login-box .col-1, .login-box .col-2 {border:none;border-bottom:1px solid #363636;background:#515151}
	.login-box .button-set {background-image:none;}
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#AAAAAA}
	.data-table .odd{background:#515151}
	.data-table .even{background:#393939!important}
	.one-page-checkout .active .step-count{border:1px solid #d03100;background:#d03100;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px; }
	.toolbar .pager {border-bottom:1px solid #363636;padding:3px 8px;}
	.sorter {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:3px 8px;}
	.pager {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:4px 8px;text-align:center;}
	.toolbar .sorter {border-bottom:1px solid #363636;}
    	    ";
    	    break;
    	case "dark2":
    	    $inlinestyle .= "
	.login-box .col-1, .login-box .col-2 {border:none;border-bottom:1px solid #363636;background:#515151}
	.login-box .button-set {background-image:none;}
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/dark2.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#AAAAAA}
	.data-table .odd{background:#515151}
	.data-table .even{background:#393939!important}
	.one-page-checkout .active .step-count{border:1px solid #0084DA;background:#0084DA;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/dark2.png) repeat-x scroll 0 -136px; }
	.toolbar .pager {border-bottom:1px solid #363636;padding:3px 8px;}
	.sorter {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:3px 8px;}
	.pager {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:4px 8px;text-align:center;}
	.toolbar .sorter {border-bottom:1px solid #363636;}
    	    ";
    	    break;
    	case "dark3":
    	    $inlinestyle .= "
	.login-box .col-1, .login-box .col-2 {border:none;border-bottom:1px solid #363636;background:#515151}
	.login-box .button-set {background-image:none;}
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/dark3.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#AAAAAA}
	.data-table .odd{background:#515151}
	.data-table .even{background:#393939!important}
	.one-page-checkout .active .step-count{border:1px solid #0084DA;background:#0084DA;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/dark3.png) repeat-x scroll 0 -136px; }
	.toolbar .pager {border-bottom:1px solid #363636;padding:3px 8px;}
	.sorter {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:3px 8px;}
	.pager {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:4px 8px;text-align:center;}
	.toolbar .sorter {border-bottom:1px solid #363636;}
    	    ";
    	    break;
    	case "dark4":
    	    $inlinestyle .= "
	.login-box .col-1, .login-box .col-2 {border:none;border-bottom:1px solid #363636;background:#515151}
	.login-box .button-set {background-image:none;}
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/dark4.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#AAAAAA}
	.data-table .odd{background:#515151}
	.data-table .even{background:#393939!important}
	.one-page-checkout .active .step-count{border:1px solid #66AAC2;background:#66AAC2;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/dark4.png) repeat-x scroll 0 -136px; }
	.toolbar .pager {border-bottom:1px solid #363636;padding:3px 8px;}
	.sorter {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:3px 8px;}
	.pager {background:url(".$this->baseurl."/templates/".$this->template."/images/dark.png) repeat-x scroll 0 -136px #363636;border-top:1px solid #363636;font-size:11px;padding:4px 8px;text-align:center;}
	.toolbar .sorter {border-bottom:1px solid #363636;}
    	    ";
    	    break;
    	case "light":
    	    $inlinestyle .= "
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/light.png) repeat-x scroll 0 -136px;border-bottom:1px solid #c3d9e1;color:#50646D}
	.data-table .odd{background:#EEE}
	.data-table .even{background:#F7F7F7!important}
	.one-page-checkout .active .step-count{border:1px solid #d03100;background:#d03100;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/light.png) repeat-x scroll 0 -136px; }
    	    ";
    	case "light2":
    	    $inlinestyle .= "
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/light2.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#50646D}
	.data-table .odd{background:#EEE}
	.data-table .even{background:#F7F7F7!important}
	.one-page-checkout .active .step-count{border:1px solid #026AB6;background:#026AB6;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/light2.png) repeat-x scroll 0 -136px; }
    	    ";
    	    break;
    	case "light3":
    	    $inlinestyle .= "
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/light3.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#50646D}
	.data-table .odd{background:#EEE}
	.data-table .even{background:#F7F7F7!important}
	.one-page-checkout .active .step-count{border:1px solid #026AB6;background:#026AB6;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/light3.png) repeat-x scroll 0 -136px; }
    	    ";
    	    break;
    	case "light4":
    	    $inlinestyle .= "
	.data-table thead tr th{background:transparent url(".$this->baseurl."/templates/".$this->template."/images/light4.png) repeat-x scroll 0 -136px;border-bottom:1px solid #C3D9E1;color:#50646D}
	.data-table .odd{background:#EEE}
	.data-table .even{background:#F7F7F7!important}
	.one-page-checkout .active .step-count{border:1px solid #7F8C51;background:#7F8C51;color:#FFF}
	.one-page-checkout .active .head { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/light4.png) repeat-x scroll 0 -136px; }
    	    ";
    	    break;
		};
	$this->addStyleDeclaration($inlinestyle);
}
/*
 * End Yireo modifications
 */
 ?>
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/js/ie_suckerfish.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/css/styles.ie.css" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/css/styles.ie7.css" type="text/css" />
<![endif]-->
</head>
<body>
<div class="background"></div>
<div id="main">
	<div id="wrapper" class="foreground">
	    <div id="header">
    		<jdoc:include type="modules" name="top" style="afterburner" />		
    	    <a href="<?php echo $this->baseurl ?>" id="logo"></a>
		</div>
		<div id="nav">
		    <jdoc:include type="modules" name="nav" style="none" />
		</div>
		<div id="message">
		    <jdoc:include type="message" />
		</div>
		<?php if ($this->countModules('showcase')) : ?>
		<div id="showcase" class="dp100">
			<div class="background"></div>
			<div class="foreground">
		    	<jdoc:include type="modules" name="showcase" style="none" />
		    </div>
		</div>
		<?php endif; ?>
		<jdoc:include type="modules" name="advertisement" style="afterburner" />
        <div id="main-content" class="<?php echo $col_mode; ?>">
            <div id="colmask" class="ckl-<?php echo $leftcolumn_color; ?>">
                <div id="colmid" class="cdr-<?php echo $rightcolumn_color; ?>">
                    <div id="colright" class="ctr-<?php echo $rightcolumn_color; ?>">
                        <div id="col1wrap">
							<div id="col1pad">
                            	<div id="col1">
									<?php if ($this->countModules('breadcrumb')) : ?>
                                    <div class="breadcrumbs-pad">
                                        <jdoc:include type="modules" name="breadcrumb" />
                                    </div>
									<?php endif; ?>
									<?php if ($this->countModules('user1 or user2 or user3')) : ?>
									<div id="mainmods" class="spacer<?php echo $mainmod_width; ?>">
										<jdoc:include type="modules" name="user1" style="afterburner" />
										<jdoc:include type="modules" name="user2" style="afterburner" />
										<jdoc:include type="modules" name="user3" style="afterburner" />
									</div>
									<?php endif; ?>
                                    <div class="component-pad">
                                        <jdoc:include type="component" />
                                    </div>
									<?php if ($this->countModules('user4 or user5 or user6')) : ?>
									<div id="mainmods2" class="spacer<?php echo $mainmod2_width; ?>">
										<jdoc:include type="modules" name="user4" style="afterburner" />
										<jdoc:include type="modules" name="user5" style="afterburner" />
										<jdoc:include type="modules" name="user6" style="afterburner" />
									</div>
									<?php endif; ?>
	                            </div>
							</div>
                        </div>
						<?php if ($leftcolumn_width != 0) : ?>
                        <div id="col2" class="<?php echo $leftcolumn_color; ?>">
                        	<jdoc:include type="modules" name="left" style="afterburner" />
                        </div>
						<?php endif; ?>
						<?php if ($rightcolumn_width != 0) : ?>
                        <div id="col3" class="<?php echo $rightcolumn_color; ?>">
                        	<jdoc:include type="modules" name="right" style="afterburner" />
                        </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php if ($this->countModules('user7 or user8 or user9')) : ?>
		<div id="mainmods3" class="spacer<?php echo $mainmod3_width; ?>">
			<jdoc:include type="modules" name="user7" style="afterburner" />
			<jdoc:include type="modules" name="user8" style="afterburner" />
			<jdoc:include type="modules" name="user9" style="afterburner" />
		</div>
		<?php endif; ?>
		<?php if ($this->countModules('bottom')) : ?>
		<div id="footer">
			<div class="footer-pad">
                <jdoc:include type="modules" name="bottom" style="none" />
            </div>
		</div>
		<?php endif; ?>
		<?php if ($rockettheme_logo=="true") : ?>
		<a href="http://www.rockettheme.com"><span id="logo2"></span></a>
		<?php endif; ?>
		<jdoc:include type="modules" name="footer" style="afterburner" />
		<jdoc:include type="modules" name="debug" style="none" />
	</div>
</div>
</body>
</html>
