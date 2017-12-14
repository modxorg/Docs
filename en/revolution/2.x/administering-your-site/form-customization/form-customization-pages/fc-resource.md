---
title: "FC-Resource"
_old_id: "114"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-pages/fc-resource"
---

<div>- [Resource Create/Update](revolution/2.x/administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-ResourceCreate%2FUpdate)
- [Available Fields](revolution/2.x/administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-AvailableFields)
- [Available Tabs](revolution/2.x/administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-AvailableTabs)
- [Hiding the Content Field](revolution/2.x/administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-HidingtheContentField)
- [TVs](revolution/2.x/administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-TVs)

</div><a name="FC-Resource-ResourceCreate%2FUpdate"></a>Resource Create/Update
------------------------------------------------------------------------

These pages encompass the following Actions:

- resource/update
- resource/create

<div class="note">When using the _resource/create_ Action, constraints will apply to the **parent** resource. So, a constraint of: - modResource
- id
- 2  
  ...would apply the rule for all new Resources under the Resource with ID 2.

</div><a name="FC-Resource-AvailableFields"></a>Available Fields
----------------------------------------------------------

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Field </th><th class="confluenceTh"> Name </th><th class="confluenceTh"> Containing Panel </th></tr><tr><td class="confluenceTd"> Page Title </td><td class="confluenceTd"> pagetitle </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Template </td><td class="confluenceTd"> template </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Published </td><td class="confluenceTd"> published </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Long Title </td><td class="confluenceTd"> longtitle </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Description </td><td class="confluenceTd"> description </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Introtext </td><td class="confluenceTd"> introtext </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Link Attributes </td><td class="confluenceTd"> link\_attributes </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Alias </td><td class="confluenceTd"> alias </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Menu Title </td><td class="confluenceTd"> menutitle </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Menu Index </td><td class="confluenceTd"> menuindex </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Hide from Menus </td><td class="confluenceTd"> hidemenu </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Container </td><td class="confluenceTd"> isfolder </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Rich Text </td><td class="confluenceTd"> richtext </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Published On </td><td class="confluenceTd"> publishedon </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Publish Date </td><td class="confluenceTd"> pub\_date </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Un-Publish Date </td><td class="confluenceTd"> unpub\_date </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Searchable </td><td class="confluenceTd"> searchable </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Cacheable </td><td class="confluenceTd"> cacheable </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Deleted </td><td class="confluenceTd"> deleted </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Empty Cache </td><td class="confluenceTd"> syncsite </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Content Type </td><td class="confluenceTd"> content\_type </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Content Disposition </td><td class="confluenceTd"> content\_dispo </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Class Key </td><td class="confluenceTd"> class\_key </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Parent </td><td class="confluenceTd"> modx-resource-parent </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> ID </td><td class="confluenceTd"> id </td><td class="confluenceTd"> modx-panel-resource </td></tr><tr><td class="confluenceTd"> Template </td><td class="confluenceTd"> template </td><td class="confluenceTd"> modx-panel-resource </td></tr></tbody></table></div><a name="FC-Resource-AvailableTabs"></a>Available Tabs
------------------------------------------------------

These tabs are available for renaming/hiding:

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Tab </th><th class="confluenceTh"> Name (ID) </th><th class="confluenceTh"> Containing TabPanel </th></tr><tr><td class="confluenceTd"> Create/edit Resource </td><td class="confluenceTd"> modx-resource-settings </td><td class="confluenceTd"> modx-resource-tabs </td></tr><tr><td class="confluenceTd"> Page Settings </td><td class="confluenceTd"> modx-page-settings </td><td class="confluenceTd"> modx-resource-tabs </td></tr><tr><td class="confluenceTd"> Template Variables </td><td class="confluenceTd"> modx-panel-resource-tv </td><td class="confluenceTd"> modx-resource-tabs </td></tr><tr><td class="confluenceTd"> Access Permissions </td><td class="confluenceTd"> modx-resource-access-permissions </td><td class="confluenceTd"> modx-resource-tabs </td></tr></tbody></table></div><a name="FC-Resource-HidingtheContentField"></a>Hiding the Content Field
------------------------------------------------------------------------

Use these settings:

**Field**: modx-resource-content  
**Containing Panel**: modx-panel-resource  
**Rule**: Field Visible  
**Value**: 0

<a name="FC-Resource-TVs"></a>TVs
---------------------------------

Affecting TVs for a Resource is fairly straightforward - just set the "Name" attribute of the Rule to "tv#", and replace # with the ID of the TV you'd like to affect. You can leave the Containing Panel blank.

<div class="note">TV rules on the Resource panel apply to both create **and** update Actions. You'll only need one rule.</div>