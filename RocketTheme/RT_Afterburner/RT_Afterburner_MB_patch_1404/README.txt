
=============================================
RocketTheme Afterburner patch for MageBridge
=============================================

This patch contains modifications for the RocketTheme Afterburner template when used in combination with MageBridge and the default Magento 1.4.x theme. MageBridge integrates Magento into Joomla!, but to make this integration look nice this requires either modification of the Magento theme or Joomla! template. This patch fixes things for you.

The folder "rt_template" contains the following files:
- css = Several CSS-files created by Yireo
- images = Images originating from Magento

These files modify the RocketTheme Afterburner template so that the MageBridge shop integrates nicely with it. Note that these files only work in combination with the default Magento theme.

============
INSTALLATION
============

The following steps only require you to modify Joomla!. Nothing needs to be changed within Magento.

1) Make a backup of your current RocketTheme template.

2) Copy all files inside the "rt_template" folder to the RocketTheme template-directory (for instance "templates/rt_Afterburner_j15") or your custom copy of this template.

3) Make sure within MageBridge, you are using the latest build. Install the MageBridge RocketTheme plugin through the MageBridge Update Manager and make sure it is enabled.

4) Login to the Joomla! Administrator and browse to the MageBridge Configuration page. Select the Theming-tab and make the modifications below:

With the option "Disable specific Magento CSS" disable the following stylesheets:
- css/reset.css
- css/boxes.css
- css/menu.css

Leave the options "Disable all Magento CSS" and "Disable MageBridge CSS" to their default value "No".

5) Clean the Joomla! cache through "Tools > Clean Cache".

# End
