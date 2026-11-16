---
title: "Field Visible"
description: "The Field Visible rule of a Form Customization set in MODX: how it hides a field of the form."
_old_id: "124"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/field-visible"
---

## What the Rule Does

Hides a field of the form of the manager. The field is not drawn at all, and the value of the resource in it is left alone.

## Where It Is Set

The **Fields** tab of the set, in the **Visible** column. Clearing the checkbox of a field creates the rule; ticking it back removes the rule.

## What It Applies To

The fields of the form of the resource:

`id`, `pagetitle`, `alias`, `longtitle`, `description`, `introtext`, `content`, `published`, `deleted`, `publishedon`, `pub_date`, `unpub_date`, `template`, `hidemenu`, `menutitle`, `link_attributes`, `menuindex`, `class_key`, `content_type`, `parent`, `content_dispo`, `isfolder`, `show_in_tree`, `hide_children_in_tree`, `alias_visible`, `uri_override`, `uri`, `richtext`, `cacheable`, `searchable`, `syncsite`.

The list of the fields is stored in the reference table of the form, and it is filled in when MODX is installed. A database that was upgraded from 2.x may have a shorter list.

## See Also

1. [Form Customization Rules](building-sites/client-proofing/form-customization/rules)
2. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
3. [Customizing Tabs](building-sites/client-proofing/form-customization/tabs)
