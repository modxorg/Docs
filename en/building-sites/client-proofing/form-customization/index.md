---
title: "Customizing the Manager"
description: "Form Customization in MODX: the profiles, the sets and the rules that change the forms of the manager."
_old_id: "83"
_old_uri: "2.x/administering-your-site/customizing-the-manager"
---

## What is Form Customization?

Form Customization lets you change the forms of the manager: hide a field, rename it, give it another value, move a TV to another tab.

The section is under **Admin → Form Customization**, and it needs the permission `customize_forms`.

## The Three Layers

> Profile → Set → Rules

A **Profile** is a collection of Sets, and it can be bound to User Groups. A **Set** is a collection of Rules, and it is bound to a page of the manager. A **Rule** is one change that the Set applies to the form.

The rules are not edited on their own: they are rebuilt from the three grids of the set every time the set is saved. See [Form Customization Rules](building-sites/client-proofing/form-customization/rules "Form Customization Rules").

## How It Is Stored

A profile holds sets, and a set holds its rules. The list of the fields and of the regions that can be changed is kept in a reference table. It is filled in when MODX is installed.

## Which Forms Can Be Customized

Only the pages of a resource: **Create Resource** and **Edit Resource**. The page of a chunk, a snippet, a user or a user group is not covered.

A set is bound to one of three actions:

| Action | The set applies to |
| --- | --- |
| Create Resource | The page that creates a resource. |
| Edit Resource | The page that edits a resource. |
| Create & Edit Resource | Both pages at once. |

With the last one the set covers both pages. The list of the fields and of the regions it offers comes from the page that edits a resource.

## See Also

1. [Customizing the Manager](building-sites/client-proofing/form-customization)
2. [Form Customization Profiles](building-sites/client-proofing/form-customization/profiles)
3. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
   1. [Form Customization Rules](building-sites/client-proofing/form-customization/rules)
   2. [Customizing Tabs](building-sites/client-proofing/form-customization/tabs)
4. [Custom Manager Themes](building-sites/client-proofing/custom-manager-themes)
