---
title: "New Tab"
_old_id: "209"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/new-tab"
---

 The following is relevant to older versions of MODX. See [Customizing Tabs via Form Customization](administering-your-site/customizing-the-manager/form-customization-sets/customizing-tabs-via-form-customization#CustomizingTabsviaFormCustomization-AddingNewTabs) for instructions for newer versions of MODX. 

## The New Tab Rule

 The New Tab Rule, when set, will create a new tab in the panel.

## Usage

- Specify the ID of this new tab in the "Name" field.
- Specify the tabpanel ID in the "Containing Panel" field
- Set the Rule to "New Tab"
- Set the title of the new tab in the "Value" field

### Available TabPanels

 Here are the IDs for the corresponding tab panels on various manager pages.

 | ID                  | Corresponding Page             |
 | ------------------- | ------------------------------ |
 | modx-resource-tabs  | The Resource edit/create page. |
 | modx-chunk-tabs     | The Chunk page.                |
 | modx-snippet-tabs   | The Snippet page.              |
 | modx-plugin-tabs    | The Plugin page.               |
 | modx-template-tabs  | The Template page.             |
 | modx-tv-tabs        | The Template Variable page.    |
 | modx-user-tabs      | The User page.                 |
 | modx-usergroup-tabs | The User Group page.           |
 | modx-context-tabs   | The Context page.              |



 Tab Panels on non-Resource pages are only available in 2.0.0-pl and up. 

## Examples

 An example rule for creating a new tab in the Resource edit page would look like so:

 ![](download/attachments/18678099/rule-tabNew.png?version=1&modificationDate=1279290789000)

## See Also