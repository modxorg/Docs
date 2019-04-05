---
title: "fieldSetDefaults"
_old_id: "1712"
_old_uri: "revo/formitfastpack/fieldsetdefaults"
---

##  Usage

 Call before any field snippets with any parameters used by field snippets. This will update the default values of the subsequent field snippets to those passed to fieldSetDefaults for the duration of the request.

 The fieldSetDefaults can be called an unlimited number of times to update the defaults.

 **To reset defaults**, use the resetDefaults parameters: `[[!fieldSetDefaults? &resetDefaults=`1`]]`

## Potential Issues

 The fieldSetDefaults is **unable to override parameters stored in property sets**. Thus, if you add a property set to a field snippet, the defaults in the property set will override all other defaults.

 The fieldSetDefaults snippet **must be processed by MODX before the field snippets it is intended for**. To avoid this issue:

- Call fieldSetDefaults above the field snippets, preferably in the same chunk or template as the field snippets.
- If field snippets must be called inside chunks or templates separate from the fieldSetDefaults snippet, make sure fieldSetDefaults is in the "outer" elements.

## Examples

 Change the &outer\_type parameter for two groups of field snippets:

``` plain 
[[!fieldSetDefaults? &outer_type=`personal`]]
[[!field? &name=`first_name`]]
[[!field? &name=`last_name`]]
[[!fieldSetDefaults? &outer_type=`company`]]
[[!field? &name=`company_name`]]
[[!field? &name=`company_address`]]

```