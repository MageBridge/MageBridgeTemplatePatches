<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template
// 
// 

$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/template.css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/".$pstyle.".css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/typography.css");
$this->addStylesheet($this->baseurl."/templates/system/css/system.css");
$this->addStylesheet($this->baseurl."/templates/system/css/general.css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/menu-".$mtype.".css");
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
}
/*
 * End Yireo modifications
 */
$inlinestyle = "
	div.wrapper { ".$template_width."padding:0;}
	body { min-width:".$template_real_width."px;}
	#inset-block-left { width:".$leftinset_width."px;padding:0;}
	#inset-block-right { width:".$rightinset_width."px;padding:0;}
	#maincontent-block { margin-right:".$rightinset_width."px;margin-left:".$leftinset_width."px;}

	.s-c-s .colmid { left:".$leftcolumn_width."px;}
	.s-c-s .colright { margin-left:-".($leftcolumn_width + $rightcolumn_width)."px;}
	.s-c-s .col1pad { margin-left:".($leftcolumn_width + $rightcolumn_width)."px;}
	.s-c-s .col2 { left:".$rightcolumn_width."px;width:".$leftcolumn_width."px;}
	.s-c-s .col3 { width:".($rightcolumn_width)."px;}
	

	.s-c-x .colright { left:".$leftcolumn_width."px;}
	.s-c-x .col1wrap { right:".$leftcolumn_width."px;}
	.s-c-x .col1 { margin-left:".$leftcolumn_width."px;}
	.s-c-x .col2 { right:".$leftcolumn_width."px;width:".$leftcolumn_width."px;}
	

	.x-c-s .colright { margin-left:-".$rightcolumn_width."px;}
	.x-c-s .col1 { margin-left:".$rightcolumn_width."px;}
	.x-c-s .col3 { left:". $rightcolumn_width."px;width:".$rightcolumn_width."px;}
	
	a, #top-right ul li a:hover, .abstract-menu li a:hover, #main-content .cart_totals div, #roksearch_results .roksearch_odd-hover h3, #roksearch_results .roksearch_even-hover h3, #horiz-menu.splitmenu li:hover .item span, #horiz-menu.splitmenu li.active .item span, #horiz-menu.splitmenu li.active:hover .item span {color:".$link_color.";}
	#main-body ul.menu li > a, #main-body ul.menu li > .separator, #main-body ul.menu li > .item, #main-body ul.menu li li > a, #main-body ul.menu li li > .separator, #main-body ul.menu li li > .item, #horiz-menu li > .item, body #horiz-menu li.root:hover > .item span, body #horiz-menu li.root.active > .item span, body #horiz-menu li.root.active:hover > .item span, .feature-block a .readon1-r {color:".$link_color.";}	
	.pagination .page-active, .pagination .page-inactive:hover, .rokstories-layout4 .feature-block .feature-number-sub.active {background:".$link_color.";}
	
	.form-button, .form-button-alt { background: transparent url(".$this->baseurl."/templates/".$this->template."/images/mb14/".$pstyle."/add-to-cart.png) no-repeat right -44px;}
	.form-button span, .form-button-alt span { color:#000; background: transparent url(".$this->baseurl."/templates/".$this->template."/images/mb14/".$pstyle."/add-to-cart.png) no-repeat left top;}
	.one-page-checkout .active h3 { color:".$link_color."; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid ".$link_color."; background:".$link_color."; }
	
	";
	
	if (rok_isIe(6)) $inlinestyle .= "
	div.wrapper { width: ".($template_width_only+4)."px; }
    #horiz-menu .level1 li.active .item span, body .fusion-js-subs .item, #horiz-menu.splitmenu li.sfHover .item span {color:".$link_color.";}
	#horiz-menu li.root-sfHover .item {color:".$link_color." !important;}
	";
	
	if (rok_isIe()) $inlinestyle .= "
	.module-inner {zoom:1;position: relative;overflow:hidden;}
	";
	
$this->addStyleDeclaration($inlinestyle);
?>

<?php if (rok_isIe()) :?>
<!--[if IE 8]>
<style type="text/css">
#horizmenu-surround {width: auto !important;}
</style>
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe(6)) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $pstyle; ?>_ie6.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/DD_belatedPNG.js"></script>
<script type="text/javascript">
	var pngClasses = ['.png', '#main-trans', '#main-trans2', '#main-trans-top', '.feature-module', '.readon1-l', '.feature-block .description', '.readon1-m', '.readon1-r', 'span.number-circle', '.drop-top', '.fusion-js-subs ul', '#horiz-menu li li', '.style2 #header', '.style2 #header .wrapper', '.style2 #horiz-menu', '.style3 #header', '.style3 #horiz-menu', '.style4 #header', '.style4 #horiz-menu', '.style5 #header', '.style5 #horiz-menu', '.style5 .abstract-menu li a.am1', '.style5 .abstract-menu li a.am2', '.style5 .abstract-menu li a.am3', '#horiz-menu li.root a', '.style3 #header .wrapper', '.style4 #header .wrapper', '.style5 #logo', '.style5 #header .wrapper', '#main-trans-bottom'];

	window.addEvent('domready', function() {
	pngClasses.each(function(fixMePlease) {
		DD_belatedPNG.fix(fixMePlease);
	});
	});
</script>
<![endif]-->
<?php endif; ?>
<?php
/* Javascript Hooks for base uri */
	$tmpl_folder = "
		window.templatePath = '$template_path';
		window.uri = '{$this->baseurl}';
		window.currentStyle = '$pstyle';
	";
	$this->addScriptDeclaration($tmpl_folder);
?>
<?php 
if($enable_fontspans=="true") :
    $this->addScript($this->baseurl."/templates/".$this->template."/js/rokfonts.js");
    $rokfonts = 
    "window.addEvent('domready', function() {
		var modules = ['side-mod', 'showcase-panel', 'moduletable', 'article-rel-wrapper'];
		var header = ['h3','h2','h1'];
		RokBuildSpans(modules, header);
	});";
    $this->addScriptDeclaration($rokfonts);
endif;
if(rok_isIe(6) and $enable_ie6warn=="true" and $js_compatibility=="false") : 
    $this->addScript($this->baseurl."/templates/".$this->template."/js/rokie6warn.js");
endif;
$this->addScript($this->baseurl."/templates/".$this->template."/js/rokutils.js");
if($enable_inputstyle == "true" and $js_compatibility=="false" and !rok_isIe(6)) :
    $this->addScript($this->baseurl."/templates/".$this->template."/js/rokutils.inputs.js");
	$exclusionList = "InputsExclusion.push($inputs_exclusion)";
	$this->addScriptDeclaration($exclusionList);
endif;
