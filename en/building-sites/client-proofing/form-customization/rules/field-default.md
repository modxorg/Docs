---
title: "Field Default"
description: "The Field Default rule of a Form Customization set in MODX: how it puts a value into a field of the form."
_old_id: "122"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules/field-default"
---

## What the Rule Does

Puts a value into a field of the form of the manager. The value appears when the form opens, and it is the value the field gets if the user saves the form without changing it.

The rule is applied on the page the set is bound to: the page that creates a resource, or the page that edits one. To have it only on the page that creates a resource, bind the set to the action **Create Resource** instead of **Create & Edit Resource**.

## Where It Is Set

The **Fields** tab of the set, in the **Default Value** column. A field with a value gets the rule; an empty cell removes it.

## The Template of a New Resource

On the field `template` the rule sets the template that a new resource gets. The field is only offered when the set is bound to the action **Create Resource**.

## See Also

1. [Form Customization Rules](building-sites/client-proofing/form-customization/rules)
2. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
3. [Customizing Tabs](building-sites/client-proofing/form-customization/tabs)
