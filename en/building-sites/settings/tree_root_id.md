---
title: "tree_root_id"
_old_id: "310"
_old_uri: "2.x/administering-your-site/settings/system-settings/tree_root_id"
---

## tree\_root\_id

**Name**: Tree Root ID
**Type**: Number
**Default**: 0

Set this to the ID of a single Resource that should act as the root of the left-hand Resource tree. The user will only see Resources that are children of that Resource. Use `0` for the site root.

The value is cast to an integer when it is read (`(int)$this->modx->getOption('tree_root_id')`); a comma-separated list is **not** supported.
