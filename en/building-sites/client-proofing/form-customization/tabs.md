---
title: "Customizing Tabs"
_old_id: "82"
_old_uri: "2.x/administering-your-site/customizing-the-manager/form-customization-sets/customizing-tabs-via-form-customization"
---

 When you use Form Customization to customize the forms in the MODX manager, you can either allow/disallow access to specific fields, or you can allow/disallow access to entire tabs or _parts_ of tabs.

 **When a Tab is not a Tab**
 When setting up Form Customization rules under **Security --> Form Customization**, then editing a behavior set, there is a list of "Tabs", but the list doesn't correspond directly to the familiar "Document", "Settings", "Template Variables", and "Resource Groups". Rather, the tab ids listed here refer to entire tabs or _parts_ of tabs.

## Tab Regions

 These are the various tab regions whose visibility can be toggled.

| ID                                 | Default Tab Title  | Description   |
| ---------------------------------- | ------------------ | ------------- |
| modx-resource-settings             | Document           | A primary tab |
| modx-resource-main-left            |                    |               |
| modx-resource-main-right           |                    |               |
| modx-page-settings                 | Settings           | A primary tab |
| modx-page-settings-left            |                    |               |
| modx-page-settings-right           |                    |               |
| modx-page-settings-right-box-left  |                    |               |
| modx-page-settings-right-box-right |                    |               |
| modx-panel-resource-tv             | Template Variables | A primary tab |
| modx-resource-access-permissions   | Resource Groups    | A primary tab |

## Adding New Tabs

 Adding a new tab is quite simple. Edit your Set, and open the Regions tab. Click the Create New Tab button, give it an ID like "my-new-tab" and a description.

![](/download/attachments/a173647e0c2b1aeb7f1021e4f14784bc/fc_new_tab.jpg)

Any time you need to refer to the tab region, for example if moving Template Variables into the new tab, use the ID you gave it.

## See Also

1. [Customizing the Manager via Plugins](_legacy/administering-your-site/customizing-the-manager-via-plugins)
2. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
3. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
   1. [Customizing Tabs via Form Customization](building-sites/client-proofing/form-customization/tabs)
4. [Manager Templates and Themes](building-sites/client-proofing/custom-manager-themes)
