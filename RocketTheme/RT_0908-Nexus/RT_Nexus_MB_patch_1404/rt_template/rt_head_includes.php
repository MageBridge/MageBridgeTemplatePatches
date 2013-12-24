<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template
// 
// 

$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/template.css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/header-".$header_style.".css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/body-".$body_style.".css");
if ($this->countModules('showcase') or $this->countModules('showcase2') or $this->countModules('showcase3')) :
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/showcase.css");
endif;
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/primary-".$primary_style.".css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/footer.css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/typography.css");
$this->addStylesheet($this->baseurl."/templates/system/css/system.css");
$this->addStylesheet($this->baseurl."/templates/system/css/general.css");
$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/menu-".$mtype.".css");
if (JRequest::getVar('option') == 'com_k2') :
	$this->addStylesheet($this->baseurl."/templates/".$this->template."/css/k2.css");
endif;

/*
 * Yireo modifications for MageBridge
 */
if(class_exists('MageBridgeTemplateHelper')) {
    $mb = new MageBridgeTemplateHelper();
    $path = $this->baseurl.'/templates/'.$this->template;

    if($mb->isLoaded()) {
    	$this->addStylesheet($path."/css/com_magebridge/default.css");
		$this->addStylesheet($path."/css/com_magebridge/custom.css");
		$this->addStylesheet($path."/css/com_magebridge/style/primary-".$primary_style.".css");
		if (rok_isIe()) { $this->addStylesheet($path."/css/com_magebridge/default-ie.css");}
    }

	switch ($primary_style) {
    	case "blue":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "brown":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "darkblue":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "darkblue":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "darkyellow":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "green":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "grey":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "lightblue":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "orange":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "red":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
    	case "yellow":
    	    $inlinestyle = "
    	    
    	    ";
    	    break;
		};
		
	$inlinestyle .='
		button.button {background: url('.$path.'/images/primary/'.$primary_style.'/readon-l.png) no-repeat scroll 0 0;}
		button.button span {background: url('.$path.'/images/primary/'.$primary_style.'/readon-m.png) repeat-x 0 0;}
		button.button span span {background: url('.$path.'/images/primary/'.$primary_style.'/readon-r.png) no-repeat 100% 0;}
	';
	$this->addStyleDeclaration($inlinestyle);
}
/*
 * End Yireo modifications
 */

$inlinestyle = "
	div.wrapper { ".$template_width."padding:0;}
	#inset-block-left { width:".$leftinset_width."px;padding:0;}
	#inset-block-right { width:".$rightinset_width."px;padding:0;}
	#maincontent-block { margin-right:".$rightinset_width."px;margin-left:".$leftinset_width."px;}
	
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
	.x-c-s .col3 { left:".((rok_isIe(6)) ? $rightcolumn_width + 20 : $rightcolumn_width)."px;width:".$rightcolumn_width."px;}";
$this->addStyleDeclaration($inlinestyle);
?>

<?php if (rok_isIe()) :?>
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe(6)) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/DD_belatedPNG.js"></script>
<script type="text/javascript">
	var pngClasses = ['.png', '#logo', '#showcase-section2', '.readon1-l', '.readon1-m', '.readon1-r', '#rocket', '.rokstories-tip', '.feature-block-title2', '.feature-block-title3', '.ext-img', '.feature-arrow-l', '.feature-arrow-r'];
	
	pngClasses.each(function(fixMePlease) {
		DD_belatedPNG.fix(fixMePlease);
	});
	
</script>
<![endif]-->
<?php endif; ?>
<?php
/* Javascript Hooks for base uri */
	$tmpl_folder = "
		window.templatePath = '$template_path';
		window.uri = '{$this->baseurl}';
		window.currentStyle = '$tstyle';
	";
	$this->addScriptDeclaration($tmpl_folder);
?>
<?php 
if($enable_fontspans=="true") :
    $this->addScript($this->baseurl."/templates/".$this->template."/js/rokfonts.js");
    $rokfonts = 
    "window.addEvent('domready', function() {
		var modules = ['side-mod', 'showcase-panel', 'moduletable'];
		var header = ['h3','h1'];
		RokBuildSpans(modules, header);
	});";
    $this->addScriptDeclaration($rokfonts);
endif;
if($clientside_date == "true" and $js_compatibility=="false") :
    $this->addScript($this->baseurl."/templates/".$this->template."/js/rokdate.js");
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
