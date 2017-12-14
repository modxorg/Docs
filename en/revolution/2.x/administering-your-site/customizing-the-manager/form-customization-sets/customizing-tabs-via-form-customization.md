---
title: "Customizing Tabs via Form Customization"
_old_id: "82"
_old_uri: "2.x/administering-your-site/customizing-the-manager/form-customization-sets/customizing-tabs-via-form-customization"
---

 When you use Form Customization to customize the forms in the MODX manager, you can either allow/disallow access to specific fields, or you can allow/disallow access to entire tabs or _parts_ of tabs.

<div class="note"> **When a Tab is not a Tab**   
 When setting up Form Customization rules under **Security --> Form Customization**, then editing a behavior set, there is a list of "Tabs", but the list doesn't correspond directly to the familiar "Document", "Settings", "Template Variables", and "Resource Groups". Rather, the tab ids listed here refer to entire tabs or _parts_ of tabs. </div><div>- [Tab Regions](#CustomizingTabsviaFormCustomization-TabRegions)
- [Adding New Tabs](#CustomizingTabsviaFormCustomization-AddingNewTabs)
- [See Also](#CustomizingTabsviaFormCustomization-SeeAlso)

</div>Tab Regions
-----------

 These are the various tab regions whose visibility can be toggled.

 <table><tbody><tr><th> ID </th> <th> Default Tab Title </th> <th> Description </th> </tr><tr><td> modx-resource-settings </td> <td> Document </td> <td> A primary tab </td> </tr><tr><td> modx-resource-main-left </td> <td> </td> <td> </td> </tr><tr><td> modx-resource-main-right </td> <td> </td> <td> </td> </tr><tr><td> modx-page-settings </td> <td> Settings </td> <td> A primary tab </td> </tr><tr><td> modx-page-settings-left </td> <td> </td> <td> </td> </tr><tr><td> modx-page-settings-right </td> <td> </td> <td> </td> </tr><tr><td> modx-page-settings-right-box-left </td> <td> </td> <td> </td> </tr><tr><td> modx-page-settings-right-box-right </td> <td> </td> <td> </td> </tr><tr><td> modx-panel-resource-tv </td> <td> Template Variables </td> <td> A primary tab </td> </tr><tr><td> modx-resource-access-permissions </td> <td> Resource Groups </td> <td> A primary tab </td></tr></tbody></table>Adding New Tabs
---------------

 Adding a new tab is quite simple. Edit your Set, and open the Regions tab. Click the Create New Tab button, give it an ID like "my-new-tab" and a description.

![](/download/attachments/a173647e0c2b1aeb7f1021e4f14784bc/fc_new_tab.jpg)

Any time you need to refer to the tab region, for example if moving Template Variables into the new tab, use the ID you gave it.

See Also
--------

1. [Customizing the Manager via Plugins](/revolution/2.x/administering-your-site/customizing-the-manager/customizing-the-manager-via-plugins)
2. [Form Customization Profiles](/revolution/2.x/administering-your-site/customizing-the-manager/form-customization-profiles)
3. [Form Customization Sets](/revolution/2.x/administering-your-site/customizing-the-manager/form-customization-sets)
  1. [Customizing Tabs via Form Customization](/revolution/2.x/administering-your-site/customizing-the-manager/form-customization-sets/customizing-tabs-via-form-customization)
4. [Manager Templates and Themes](/revolution/2.x/administering-your-site/customizing-the-manager/manager-templates-and-themes)