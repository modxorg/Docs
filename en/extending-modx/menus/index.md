---
title: "Menus"
description: "Manage the Manager menu: the modMenu object and its fields"
---

Menus are managed in the user menu (top right) → **Admin → Menus** (`?a=system/action`; the page requires the `actions` permission).

Before 2.3, a menu item pointed at an [Action](extending-modx/menus/actions) with its own ID and `modAction` object. Since 2.3 actions are deprecated, and in 3.x removed: a menu item points straight at a controller by name. See [Custom Manager Pages](extending-modx/custom-manager-pages) for adding your own pages.

## The modMenu object

A menu item is a row of the `menus` table (`MODX\Revolution\modMenu`):

| Field | Meaning |
| --- | --- |
| `text` | Label, lexicon key like `mycomponent_menu_desc` or plain text |
| `parent` | Parent menu key (`main`, `components`, `admin`, …) or empty for top level |
| `action` | Controller name path, e.g. `resource/update` or `home` (a string, not an ID) |
| `namespace` | Which component the action belongs to; default `core` |
| `handler` | Optional JavaScript; if set (and no `action`), the item runs it instead of opening a page |
| `params` | Extra URL parameters appended to `?a=…` |
| `permissions` | Comma-separated permission keys; without them the item is hidden and its page returns access denied |
| `description`, `icon`, `menuindex` | Label helper, icon class, sort order |
