---
title: "New Tab"
_old_id: "209"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/new-tab"
---

<div class="note"> The following is relevant to older versions of MODX. See [Customizing Tabs via Form Customization](revolution/2.x/administering-your-site/customizing-the-manager/form-customization-sets/customizing-tabs-via-form-customization#CustomizingTabsviaFormCustomization-AddingNewTabs) for instructions for newer versions of MODX. </div><a name="NewTab-TheNewTabRule"></a>The New Tab Rule
---------------------------------------------------

 The New Tab Rule, when set, will create a new tab in the panel.

<a name="NewTab-Usage"></a>Usage
--------------------------------

- Specify the ID of this new tab in the "Name" field.
- Specify the tabpanel ID in the "Containing Panel" field
- Set the Rule to "New Tab"
- Set the title of the new tab in the "Value" field

### <a name="NewTab-AvailableTabPanels"></a>Available TabPanels

 Here are the IDs for the corresponding tab panels on various manager pages.

<div class="table-wrap"> <table class="confluenceTable"><tbody><tr><th class="confluenceTh"> ID </th> <th class="confluenceTh"> Corresponding Page </th> </tr><tr><td class="confluenceTd"> modx-resource-tabs </td> <td class="confluenceTd"> The Resource edit/create page. </td> </tr><tr><td class="confluenceTd"> modx-chunk-tabs </td> <td class="confluenceTd"> The Chunk page. </td> </tr><tr><td class="confluenceTd"> modx-snippet-tabs </td> <td class="confluenceTd"> The Snippet page. </td> </tr><tr><td class="confluenceTd"> modx-plugin-tabs </td> <td class="confluenceTd"> The Plugin page. </td> </tr><tr><td class="confluenceTd"> modx-template-tabs </td> <td class="confluenceTd"> The Template page. </td> </tr><tr><td class="confluenceTd"> modx-tv-tabs </td> <td class="confluenceTd"> The Template Variable page. </td> </tr><tr><td class="confluenceTd"> modx-user-tabs </td> <td class="confluenceTd"> The User page. </td> </tr><tr><td class="confluenceTd"> modx-usergroup-tabs </td> <td class="confluenceTd"> The User Group page. </td> </tr><tr><td class="confluenceTd"> modx-context-tabs </td> <td class="confluenceTd"> The Context page. </td> </tr></tbody></table></div><div class="note"> Tab Panels on non-Resource pages are only available in 2.0.0-pl and up. </div><a name="NewTab-Examples"></a>Examples
--------------------------------------

 An example rule for creating a new tab in the Resource edit page would look like so:

 <span class="image-wrap" style="">![](download/attachments/18678099/rule-tabNew.png?version=1&modificationDate=1279290789000)</span>

<a name="NewTab-SeeAlso"></a>See Also
-------------------------------------