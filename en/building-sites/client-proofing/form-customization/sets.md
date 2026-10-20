---
title: "Sets"
description: "A Form Customization set in MODX: the page it applies to, the template and the condition it is restricted by, and the three grids of rules it holds."
_old_id: "134"
_old_uri: "2.x/administering-your-site/customizing-the-manager/form-customization-sets"
---

## What is a Form Customization Set

A Form Customization Set is a collection of Rules that apply to a specific page (action) in the manager. Think of a set as a way of collecting all your "Whenever the Edit Resource page loads, all these fields change" rules. A set can also be marked 'inactive' so that it does not load.

A set is bound to one of three actions: **Create Resource**, **Edit Resource** or **Create & Edit Resource**. See [Customizing the Manager](building-sites/client-proofing/form-customization "Customizing the Manager").

### Restricting to a Template

You can select a Template that the Set is restricted to. If a Resource has this Template, the Set runs. On Create Resource, the Template of the parent or the `default_template` setting is used. A Set without a Template runs for all Resources.

Setting a Template also restricts the list of Template Variables that are shown to be editable to the Template Variables assigned to that Template.

### Using Constraints

A Constraint restricts a Set to a certain value. For example, a Constraint of field `parent` and value `123` applies the Set to all direct children of the resource 123. A Constraint of field `class_key` and value `MODX\Revolution\modWebLink` applies the Set to all WebLinks on the page of the Set.

Both parts of the constraint have to be filled in. Fill in only one of them and the set does not save.

The value may be a comma-separated list. The rule then applies to any of the values in the list.

The value is compared with the field of the resource as it is. The field `class_key` holds the full name of the class, with its namespace.

## Making Set Rules

Rules are adjusted in a set by using the grids on the Set editing page. The page has three tabs: **Set Information and Fields**, **Regions** and **Template Variables**. When you're done, use the "Save" button on the top right to save the set.

Changing the template of a set reloads the page and rebuilds the list of the TVs for the new template.

### Adjusting Fields

Fields are found on the **Set Information and Fields** tab of the Set editing page. You can change the visibility of a field, the Label given to the field, or its default value. To revert back to the normal label of a field, simply leave the field blank.

The fields you can change are the fields of the form of the resource: `id`, `pagetitle`, `alias`, `longtitle`, `description`, `introtext`, `content`, `published`, `deleted`, `publishedon`, `pub_date`, `unpub_date`, `template`, `hidemenu`, `menutitle`, `link_attributes`, `menuindex`, `class_key`, `content_type`, `parent`, `content_dispo`, `isfolder`, `show_in_tree`, `hide_children_in_tree`, `alias_visible`, `uri_override`, `uri`, `richtext`, `cacheable`, `searchable`, `syncsite`.

### Hiding or Renaming Regions

Regions are found on the **Regions** tab of the Set editing page. You can change their visibility, as well as their title. You can also create a new region to show up on the editing page.

See [Customizing Tabs](building-sites/client-proofing/form-customization/tabs "Customizing Tabs") for more information.

### Adjusting Template Variables

TVs are found on the **Template Variables** tab of the Set editing page. You can adjust their Label, default value, visibility, or what region they reside on.

To change what region a TV resides on, change the Region field to the id of the region you want to move it to. The 'Region Rank' column sets the order of the TV among the other TVs moved into that region.

The rules are applied in a fixed order, and the move of a TV comes last. A TV can be moved into a region that the same set has just created. See [Form Customization Rules](building-sites/client-proofing/form-customization/rules "Form Customization Rules").

## Editing Sets via XML

Sets can be exported to XML files by right-clicking on a Set in the Profile's editing page. MODX will export the Set to an XML file and prompt you to download it. From there, you can edit the XML file directly, and when finished, 'import' it back via the button on the Sets grid. This can be useful if you do not want to use the UI, or want to have common Sets that you use across multiple sites.

Importing a Set from XML will create a **new** Set, not override any existing ones. After you've imported the Set from XML, you may deactivate any older Sets.

**The rules of the TVs do not survive the import**
The importer writes the rules of a TV under the bare id of the variable. Everything that reads them looks for the id with the prefix `tv`. The rules of the TVs of an imported set have to be set again by hand in the grids of the set.

## The API of the Section

A package can work with the section through the actions of the connector. All of them need the permission `customize_forms`:

- `Security/Forms/Profile/Activate`, `ActivateMultiple`, `Create`, `Deactivate`, `DeactivateMultiple`, `Duplicate`, `GetList`, `Remove`, `RemoveMultiple`, `Update`, `UpdateFromGrid`;
- `Security/Forms/Set/Activate`, `ActivateMultiple`, `Create`, `Deactivate`, `DeactivateMultiple`, `Duplicate`, `Export`, `GetList`, `Import`, `Remove`, `RemoveMultiple`, `Update`, `UpdateFromGrid`.

## See Also

1. [Customizing the Manager](building-sites/client-proofing/form-customization)
2. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
3. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
   1. [Form Customization Rules](building-sites/client-proofing/form-customization/rules)
   2. [Customizing Tabs](building-sites/client-proofing/form-customization/tabs)
4. [Custom Manager Themes](building-sites/client-proofing/custom-manager-themes)
