---
title: "Sets"
_old_id: "134"
_old_uri: "2.x/administering-your-site/customizing-the-manager/form-customization-sets"
---

## What is a Form Customization Set?

A Form Customization Set is a collection of Rules that occur for a specific page (action) in the Manager. Currently, Sets can apply to either the Resource Create or Update pages. Think of them like a way of collecting all your "Whenever the Create Resource page loads, all these fields change." rules. Sets can also be marked 'inactive' to not load.

### Restricting to a Template

You can select a Template that the Set is restricted to load to. If a Resource (or on Create Resource, the parent's template or "default\_template" setting) has this as its Template, this Set will run. Not setting a Template will assume that the Set should run for all Resources.

Also, setting a Template restricts the list of Template Variables that are shown to be editable to the Template Variables assigned to that Template.

### Using Constraints

A Constraint can be set on the Set to restrict to a certain value. For example, setting a Constraint to a field of 'parent' and value of '123' will apply this Set to all direct children of parent 123. A Constraint for field 'class\_key' and value 'modWebLink' will apply this Set to all WebLinks for the Set's page.

## Making Set Rules

Rules can be adjusted in a set by using the grids and tabs in the Set editing page. When you're done editing the fields, use the "Save" button on the top right to save the set.

### Adjusting Fields

Fields are found on the first tab in the Set editing page. You can change the visibility of a field, the Label given to the field, or its default value. (Note: default value changes only apply to 'Create' pages.) To revert back to the normal label or default value for a field, simply leave the field blank.

### Hiding or Renaming Tabs

Tabs are found in the 2nd tab in the Set editing page. You can change their visibility, as well as their title. You can also create new tabs to show up on the editing page.

When creating a new tab, you'll be presented with both ID and Title fields. The Title field is what will show as the text of the new tab; whereas the ID is what is used when moving TVs into the tab.

See [Customizing Tabs via Form Customization](building-sites/client-proofing/form-customization/tabs "Customizing Tabs via Form Customization") for more information.

### Adjusting Template Variables

TVs are found in the 3rd tab in the Set editing page. You can adjust their Label, default value, visibility, or what tab they reside on.

If you want to change what Tab a TV resides on, simply change the tab field to the ID of the tab you want to move it to. The 'Tab Rank' column allows you to adjust the order in which the TV is put into the Tab with regard to other TVs being moved into that Tab.

## Editing Sets via XML

Sets can be exported to XML files by right-clicking on a Set in the Profile's editing page. MODX will export the Set to an XML file and prompt you to download it. From there, you can edit the XML file directly, and when finished, 'import' it back via the button on the Sets grid. This can be useful if you do not want to use the UI, or want to have common Sets that you use across multiple sites.

Importing a Set from XML will create a **new** Set, not override any existing ones. After you've imported the Set from XML, you may deactivate any older Sets.

## See Also

1. [Customizing the Manager via Plugins](_legacy/administering-your-site/customizing-the-manager-via-plugins)
2. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
3. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
  1. [Customizing Tabs via Form Customization](building-sites/client-proofing/form-customization/tabs)
4. [Manager Templates and Themes](building-sites/client-proofing/custom-manager-themes)
