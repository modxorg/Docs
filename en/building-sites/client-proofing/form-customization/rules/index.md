---
title: "Form Customization Rules"
description: "The ten rules of a Form Customization set in MODX: what each of them does and in which grid of the set it is set."
_old_id: "133"
_old_uri: "2.x/administering-your-site/form-customization/form-customization-rules"
---

## What the Rules Are

The rules are the changes a set applies to the form of the manager. There are ten of them, and each of them is set in one of the three grids of the set.

| Rule | What it does | Where it is set |
| --- | --- | --- |
| [Field Visible](building-sites/client-proofing/form-customization/rules/field-visible "Field Visible") | Hides a field of the form. | Fields, **Visible** |
| [Field Label](building-sites/client-proofing/form-customization/rules/field-label "Field Label") | Renames a field of the form. | Fields, **Label** |
| [Field Default](building-sites/client-proofing/form-customization/rules/field-default "Field Default") | Puts a value into a field of the form. | Fields, **Default Value** |
| [Tab Visible](building-sites/client-proofing/form-customization/rules/tab-visible "Tab Visible") | Hides a region of the form. | Regions, **Visible** |
| [Tab Title](building-sites/client-proofing/form-customization/rules/tab-title "Tab Title") | Renames a region of the form. | Regions, **Title** |
| [New Tab](building-sites/client-proofing/form-customization/rules/new-tab "New Tab") | Adds a region of its own to the form. | Regions, **Create** |
| [TV Visible](building-sites/client-proofing/form-customization/rules/tv-visible "TV Visible") | Hides a TV of the form. | Template Variables, **Visible** |
| [TV Title](building-sites/client-proofing/form-customization/rules/tv-title "TV Title") | Renames a TV of the form. | Template Variables, **Label** |
| [TV Default](building-sites/client-proofing/form-customization/rules/tv-default "TV Default") | Sets the default value of a TV. | Template Variables, **Default Value** |
| [Move TV to Tab](building-sites/client-proofing/form-customization/rules/move-tv-to-tab "Move TV to Tab") | Moves a TV into another region. | Template Variables, **Region** |

## The Rules Are Not Edited Directly

There is no grid of rules in MODX 3. The rules are rebuilt from the three grids of the set every time the set is saved. What you change is the grid, not the rule.

The three grids live on the tabs of the set:

- **Set Information and Fields** — the set itself and the fields of the form;
- **Regions** — the regions of the form;
- **Template Variables** — the TVs of the template of the set.

## The Order of the Rules

The rules are applied in a fixed order, so that one rule never undoes another:

1. the default value of a field;
2. the new region, then the visibility and the title of the regions;
3. the label and the visibility of the fields;
4. the default value, the label and the visibility of the TVs;
5. the move of a TV into another region.

The move comes last on purpose: a TV can be moved into a region that the same set has just created.

## See Also

1. [Form Customization Rules](building-sites/client-proofing/form-customization/rules)
2. [Form Customization Sets](building-sites/client-proofing/form-customization/sets)
3. [Customizing Tabs](building-sites/client-proofing/form-customization/tabs)
