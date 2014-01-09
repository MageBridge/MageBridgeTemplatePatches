
=============================================
RocketTheme MixxMag patch for MageBridge
=============================================

This patch contains modifications for the RocketTheme MixxMag template when used in combination with MageBridge and the default Magento 1.4.x theme. MageBridge integrates Magento into Joomla!, but to make this integration look nice this requires either modification of the Magento theme or Joomla! template. This patch fixes things for you.

The folder "rt_template" contains the following files:
- rt_head_includes.php = A modified version of the original RocketTheme.
- css = Several CSS-files created by Yireo
- images = Images originating from Magento

These files modify the RocketTheme MixxMag template so that the MageBridge shop integrates nicely with it. Note that these files only work in combination with the default Magento theme.

============
INSTALLATION
============

The following steps only require you to modify Joomla!. Nothing needs to be changed within Magento.

1) Make a backup of your current RocketTheme template.

2) Copy all files inside the "rt_template" folder to the RocketTheme template-directory (for instance "templates/rt_MixxMag_j15") or your custom copy of this template.

3) Login to the Joomla! Administrator and browse to the MageBridge Configuration page. Select the Theming-tab and make the modifications below:

Leave the options "Disable all Magento CSS" and "Disable MageBridge CSS" to their default value "Yes".

4) Clean the Joomla! cache through "Tools > Clean Cache".

# End
