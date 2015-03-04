# MageBridgeTemplatePatches
This repository contains template-patches that have been developed for
MageBridge. They allow the Magento Default Theme (`default/default`) to 
be integrated easily with a specific Joomla template.

Note that these template-patches are no longer maintained and/or sold.
They can be downloaded at your own risk.

## Notices
* Since January 2015, we don't create any new template patches. Based on the free
patches here, you can create your own though. It's just a bunch of CSS rules.
* Because RocketTheme templates require MooTools, and MooTools conflicts with
the Magento's usage of ProtoType, we no longer recommend to integrate Magento visually
into Joomla when it comes to RocketTheme templates. Instead, opt for a non-visual
integration, where the separate Magento frontend is styled with a RocketTheme Magento 
theme, the Joomla frontend is styled with a RocketTheme Joomla template, and MageBridge
is used for user syncing, SSI & SSO, search integration, etcetera.

## FAQ
### Can I use these patches with a custom Magento theme?
Yes, you can, but most likely you will have less benefit from this. The
CSS of these patches is optimized for the HTML-code delivered by the 
Magento Default Theme. Different HTML-code in your Magento theme means
that different is used.

### Does this repository contain proprietary files?
No. The CSS files of each patch contain modified CSS rules of the original
Magento theme. The images are also originating from Magento. There are
few code segments (mostly PHP-based) from the template providers
(RocketTheme, YOOtheme).

### Can I get support for these patches?
Unfortunately, no. Building a site means customizing the webdesign, and
these patches are used as a quickstart for this. However, we do not
implement sites and we can not assist with your CSS modifications. If you
need help modifying these patches further, it is best to hire a 
frontend developer with CSS and Joomla knowledge.
