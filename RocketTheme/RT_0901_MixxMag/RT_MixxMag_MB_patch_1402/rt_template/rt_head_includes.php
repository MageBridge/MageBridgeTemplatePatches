<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template

?>

<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $tstyle; ?>.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmininews.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/typography.css" rel="stylesheet" type="text/css" />
<?php
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
?>
<link href="<?php echo $this->baseurl ?>/templates/system/css/system.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl ?>/templates/system/css/general.css" rel="stylesheet" type="text/css" />
<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<style type="text/css">
	div.wrapper,#main-body-bg { <?php echo $template_width; ?>padding:0;}
	#leftcol { width:<?php echo $leftcolumn_width; ?>px;padding:0;}
	#rightcol { width:<?php echo $rightcolumn_width; ?>px;padding:0;}
	#inset-block-left { width:<?php echo $leftinset_width; ?>px;padding:0;}
	#inset-block-right { width:<?php echo $rightinset_width; ?>px;padding:0;}
	#maincontent-block { margin-right:<?php echo $rightinset_width; ?>px;margin-left:<?php echo $leftinset_width; ?>px;padding:0;}
</style>	
<?php if (rok_isIe()) :?>
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe(6)) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/DD_belatedPNG.js"></script>
<script>
    DD_belatedPNG.fix('.png');
</script>
<![endif]-->
<?php endif; ?>
<?php if(rok_isIe(6) and $enable_ie6warn=="true" and $js_compatibility=="false") : ?> 
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokie6warn.js"></script> 
<?php endif; ?>
<?php if($clientside_date == "true" and $js_compatibility=="false") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokutils.js"></script>
<?php endif; ?>
<?php if($show_tools != "hidetools" || $show_collapse != "hidecollapse") : ?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmodtools.js"></script>
<?php endif; ?>
<?php if($mtype=="moomenu" and $js_compatibility=="false") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmoomenu.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/mootools.bgiframe.js"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
	new Rokmoomenu($E('ul.menutop '), {
		bgiframe: <?php echo $moo_bgiframe; ?>,
		delay: <?php echo $moo_delay; ?>,
		animate: {
			props: ['height'],
			opts: {
				duration: <?php echo $moo_duration; ?>,
				fps: <?php echo $moo_fps; ?>,
				transition: Fx.Transitions.<?php echo $moo_transition; ?>
			}
		},
		bg: {
			enabled: <?php echo $moo_bg_enabled; ?>,
			overEffect: {
				duration: <?php echo $moo_bg_over_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_bg_over_transition; ?>
			},
			outEffect: {
				duration: <?php echo $moo_bg_out_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_bg_out_transition; ?>
			}
		},
		submenus: {
			enabled: <?php echo $moo_sub_enabled; ?>,
			overEffect: {
				duration: <?php echo $moo_sub_over_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_sub_over_transition; ?>
			},
			outEffect: {
				duration: <?php echo $moo_sub_out_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_sub_out_transition; ?>
			},
			offsets: {
				top: <?php echo $moo_sub_offsets_top; ?>,
				right: <?php echo $moo_sub_offsets_right; ?>,
				bottom: <?php echo $moo_sub_offsets_bottom; ?>,
				left: <?php echo $moo_sub_offsets_left; ?>
			}
		}
	});
});
</script>
<?php endif; ?>
<?php if((rok_isIe(6) or rok_isIe(7)) and ($mtype=="suckerfish" or $mtype=="splitmenu")) :
  echo "<script type=\"text/javascript\" src=\"" . $this->baseurl . "/templates/" . $this->template . "/js/ie_suckerfish.js\"></script>\n";
endif; ?>