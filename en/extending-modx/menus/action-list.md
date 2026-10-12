---
title: "Action List"
_old_id: "342"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/actions-and-menus/action-list"
description: "Where manager actions come from in MODX 3 and how to navigate with MODx.loadPage"
---

The manager reads the controller name from the **a** URL parameter (`$_REQUEST`). Before 2.3 each action was a separate ID behind a `modAction` object; since 2.3 the action name (controller path) goes into **a** directly, and in 3.x `modAction` and `?a=<id>` URLs are gone.

## Is there a list of actions?

In 3.x there is no fixed, generated list of manager actions. The set of actions is:

- controllers under `manager/controllers/default/**` (plus PSR-4 classes in `core/src/Revolution/Controllers/`) — one file per manager page;
- menu entries in `_build/data/transport.core.menus.php`, whose `action` fields name those controllers.

The Menus page (`?a=system/action`) edits the menu tree; its Action field is a plain text field — there is no dropdown of known actions.

In 2.x such a list did exist and was hardcoded: `_build/data/transport.core.actions.php` shipped 52 `modAction` records with fixed IDs. That file is gone in 3.x.

If `a` is empty, the manager loads the welcome page — controlled by the `welcome_action` and `welcome_namespace` system settings (defaults `welcome` / `core`).

## Actions in JavaScript

The 2.x `MODx.action` JS object (a map of action IDs, later controller names) no longer exists in 3.x — do not use it. Navigate with `MODx.loadPage()` instead:

``` javascript
// core controller with parameters
MODx.loadPage('resource/update', 'id=5');

// custom manager page controller in a namespace
MODx.loadPage('update', 'namespace=mycomponent&foo=bar&bar=foo');
```

`MODx.loadPage` builds `?a=…` under the hood and exists since 2.0, so these calls work in 2.3+ and 3.x alike.

### Historical: before Revolution 2.3

In 2.1/2.2 navigation went through the `MODx.action` map of IDs:

``` javascript
// 2.2 only — MODx.action maps to controller names prefixed with the namespace
MODx.loadPage(MODx.action['resource/update'], 'id=5');
MODx.loadPage(MODx.action['mycomponent:update'], 'foo=bar&bar=foo');
// Prior to Revo 2.2 you would need to use this, but risked collisions with core or other packages
MODx.loadPage(MODx.action['update'], 'foo=bar&bar=foo');
```

These snippets are kept for reading old code; they do not run in 3.x.
