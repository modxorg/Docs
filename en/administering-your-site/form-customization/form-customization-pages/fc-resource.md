---
title: "FC-Resource"
_old_id: "114"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-pages/fc-resource"
---

- [Resource Create/Update](administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-ResourceCreate%2FUpdate)
- [Available Fields](administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-AvailableFields)
- [Available Tabs](administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-AvailableTabs)
- [Hiding the Content Field](administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-HidingtheContentField)
- [TVs](administering-your-site/form-customization/form-customization-pages/fc-resource#FC-Resource-TVs)



## <a name="FC-Resource-ResourceCreate%2FUpdate"></a>Resource Create/Update

These pages encompass the following Actions:

- resource/update
- resource/create

When using the _resource/create_ Action, constraints will apply to the **parent** resource. So, a constraint of: - modResource
- id
- 2
  ...would apply the rule for all new Resources under the Resource with ID 2.



## <a name="FC-Resource-AvailableFields"></a>Available Fields

 Field  Name  Containing Panel  Page Title  pagetitle  modx-panel-resource  Template  template  modx-panel-resource  Published  published  modx-panel-resource  Long Title  longtitle  modx-panel-resource  Description  description  modx-panel-resource  Introtext  introtext  modx-panel-resource  Link Attributes  link\_attributes  modx-panel-resource  Alias  alias  modx-panel-resource  Menu Title  menutitle  modx-panel-resource  Menu Index  menuindex  modx-panel-resource  Hide from Menus  hidemenu  modx-panel-resource  Container  isfolder  modx-panel-resource  Rich Text  richtext  modx-panel-resource  Published On  publishedon  modx-panel-resource  Publish Date  pub\_date  modx-panel-resource  Un-Publish Date  unpub\_date  modx-panel-resource  Searchable  searchable  modx-panel-resource  Cacheable  cacheable  modx-panel-resource  Deleted  deleted  modx-panel-resource  Empty Cache  syncsite  modx-panel-resource  Content Type  content\_type  modx-panel-resource  Content Disposition  content\_dispo  modx-panel-resource  Class Key  class\_key  modx-panel-resource  Parent  modx-resource-parent  modx-panel-resource  ID  id  modx-panel-resource  Template  template  modx-panel-resource 

## <a name="FC-Resource-AvailableTabs"></a>Available Tabs

These tabs are available for renaming/hiding:

 Tab  Name (ID)  Containing TabPanel  Create/edit Resource  modx-resource-settings  modx-resource-tabs  Page Settings  modx-page-settings  modx-resource-tabs  Template Variables  modx-panel-resource-tv  modx-resource-tabs  Access Permissions  modx-resource-access-permissions  modx-resource-tabs 

## <a name="FC-Resource-HidingtheContentField"></a>Hiding the Content Field

Use these settings:

**Field**: modx-resource-content
**Containing Panel**: modx-panel-resource
**Rule**: Field Visible
**Value**: 0

## <a name="FC-Resource-TVs"></a>TVs

Affecting TVs for a Resource is fairly straightforward - just set the "Name" attribute of the Rule to "tv#", and replace # with the ID of the TV you'd like to affect. You can leave the Containing Panel blank.

TV rules on the Resource panel apply to both create **and** update Actions. You'll only need one rule.