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

    if(!$mb->countModules('left') && $this->countModules('left') > 0) $leftcolumn_width = 0;
    if(!$mb->countModules('right') && $this->countModules('right') > 0) $rightcolumn_width = 0;
    if($mb->isPage('checkout/*')) $leftcolumn_width = 0 & $rightcolumn_width = 0;
    if($mb->isPage('customer/*')) $leftcolumn_width = 0 & $rightcolumn_width = 0;

    $col_mode = "s-c-s";
    if ($leftcolumn_width==0 and $rightcolumn_width>0) $col_mode = "x-c-s";
    if ($leftcolumn_width>0 and $rightcolumn_width==0) $col_mode = "s-c-x";
    if ($leftcolumn_width==0 and $rightcolumn_width==0) $col_mode = "x-c-x";
    
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

	.block-cart button.button, 
	.category-products button.button, 
	.add-to-cart button.button, 
	#addTagForm button.button { background:transparent url(".$this->baseurl."/templates/".$this->template."/images/mb14/".$pstyle."/add-to-cart.png) no-repeat right -48px;} 

	.block-cart button.button span, 
	.category-products button.button span, 
	.add-to-cart button.button span, 
	#addTagForm button.button span { background:transparent url(".$this->baseurl."/templates/".$this->template."/images/mb14/".$pstyle."/add-to-cart.png) no-repeat left top; }	

	.s-c-s .colmid { left:".$leftcolumn_width."px;}
	.s-c-s .colright { margin-left:-".($leftcolumn_width + $rightcolumn_width)."px;}
	.s-c-s .col1pad { margin-left:".($leftcolumn_width + $rightcolumn_width)."px;}
	.s-c-s .col2 { left:".$rightcolumn_width."px;width:".$leftcolumn_width."px;}
	.s-c-s .col3 { width:".$rightcolumn_width."px;}
	
	.s-c-x .colright { left:".$leftcolumn_width."px;}
	.s-c-x .col1wrap { right:".$leftcolumn_width."px;}
	.s-c-x .col1 { margin-left:".$leftcolumn_width."px;}
	.s-c-x .col2 { right:".$leftcolumn_width."px;width:".$leftcolumn_width."px;}
	
	.x-c-s .colright { margin-left:-".$rightcolumn_width."px;}
	.x-c-s .col1 { margin-left:".$rightcolumn_width."px;}
	.x-c-s .col3 { left:". $rightcolumn_width."px;width:".$rightcolumn_width."px;}
	";

	switch ($pstyle) {
    	case "style1":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#9FB400; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #9FB400; background:#9FB400; }
    	    ";
    	    break;
    	case "style2":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#F0B400; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #F0B400; background:#F0B400; }
    	    ";
    	    break;
    	case "style3":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#CC0000; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #CC0000; background:#CC0000; }
    	    ";
    	    break;
    	case "style4":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#D1B401; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #D1B401; background:#D1B401; }
    	    ";
    	    break;
    	case "style5":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#529AD2; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #529AD2; background:#529AD2; }
    	    ";
    	    break;
    	case "style6":
    	    $inlinestyle .= "
	.one-page-checkout .active h3 { color:#118DB8; }
	.one-page-checkout .active .step-count { color:#fff; border:1px solid #118DB8; background:#118DB8; }
    	    ";
    	    break;
		};
	
	if (rok_isIe(6)) $inlinestyle .= "div.wrapper div.wrapper { width: ".($template_width_only-4)."px; }";
	
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
	var pngClasses = ['.png', '.drop-top', '.menutop ul', '#logo', '.show-tm', '.show-tl', '.show-tr', '.show-l', '.show-r', '.show-bm', '.show-bl', '.show-br', '.main-tm', '.main-tl', '.main-tr', '.main-l', '.main-r', '.main-bm', '.main-bl', '.main-br', '.readon1-l', '.readon1-m', '.readon1-r', '#searchmod-surround', '#footer-bg2', '#footer-bg3', 'span.number-circle'];
	
	window.addEvent('domready', function() {
	pngClasses.each(function(fixMePlease) {
		DD_belatedPNG.fix(fixMePlease);
	});
	});
</script>
<style type="text/css">
.module-tm .module-tr {right: expression((this.offsetParent.offsetWidth % 2) ? '-1px' : '0px');}
, .module-bm .module-br {right: expression((this.offsetParent.offsetWidth % 2) ? '-11px' : '-10px');}
</style>
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
