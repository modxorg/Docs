---
title: "MODExt MODx Object"
_old_id: "370"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object"
---

## The MODx JS Object

MODExt adds a global `MODx` JS object to every manager page: custom methods usable from any CMP, plus default settings and customizations.

## Custom Class Variables

### MODx.request

All current GET parameters of the page:

``` javascript
var id = MODx.request.id;
```

### MODx.config

All active System Settings, keyed by setting name:

``` javascript
var tpl = MODx.config.default_template;
```

#### Other Variables

`MODx.config` also holds keys that are not [System Settings](building-sites/settings "System Settings"):

| Key                       | Description                                                                                  |
| ------------------------- | -------------------------------------------------------------------------------------------- |
| base\_url                 | The base URL for the MODX site and/or active context.                                        |
| connectors\_url           | The URL to the connectors directory.                                                         |
| manager\_url              | The URL to the manager.                                                                      |
| http\_host                | The HTTP host variable for the active context.                                               |
| site\_url                 | The full Site URL for the active context.                                                    |
| resource\_classes         | An array of custom Resource class names (class\_key => class) available for Resource create/edit dropdowns. |
| resource\_classes\_drop   | Resource class names to exclude from the dropdowns.                                          |

### MODx.config.version

The full version string (e.g. `"3.1.0-pl"`). Richer version attributes (code name, distro, etc.) exist only on the PHP side, in `$modx->version` — there is no `MODx.version` object in the manager JS.

``` javascript
var fv = MODx.config.version;
```

### MODx.user

Properties of the logged-in manager user:

| MODx.user.id       | The ID of the user.       |
| ------------------ | ------------------------- |
| MODx.user.username | The username of the user. |

``` javascript
var userId = MODx.user.id;
```

### MODx.perm

A map of **every** manager permission name to a boolean for the current user. Config JS loads distinct rows from `modAccessPermission` and sets each key with `hasPermission()`. There is no fixed subset. [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425)

Use the permission key your Extra or CMP checks:

```javascript
if (MODx.perm.file_upload) { /* ...code... */ }
if (MODx.perm.view_document) { /* ... */ }
```

Common keys include `resource_tree`, `element_tree`, `file_tree`, `file_upload`, `file_manager`, `new_chunk`, `new_plugin`, `new_snippet`, `new_template`, `new_tv`, and `directory_create`. A missing key means the user lacks that permission (treat as falsy).

## Custom Methods

### MODx.load

Creates a new object of any registered xtype with the given configuration:

``` javascript
var w = MODx.load({
  xtype: 'modx-window-namespace-create'
  ,blankValues: true
});
w.setValues({ name: 'My Namespace' });
w.show();
```

Any class with a registered xtype loads through this method.

### MODx.add

Adds a component to the manager's main content area (`modx-content`), replacing whatever was there before. Accepts an xtype string or a full component configuration object:

``` javascript
MODx.add({
  xtype: 'box'
  ,html: 'Hello from my CMP'
});
```

### MODx.clearCache

Opens the console that clears the MODX cache. Fires the 'beforeClearCache' and 'afterClearCache' events on the MODx object. If the System Setting [clear\_cache\_refresh\_trees](building-sites/settings/clear_cache_refresh_trees "clear_cache_refresh_trees") is set to 1, it also refreshes the active left-hand trees.

### MODx.releaseLock

Releases the lock on the current active Resource. Do not fire this on non-Resource editing pages. Fires the 'beforeReleaseLocks' and 'afterReleaseLocks' events on the MODx object.

### MODx.sleep

Halts JavaScript for a specified number of **milliseconds**:

``` javascript
MODx.sleep(3000); /* sleep for 3 seconds (argument is milliseconds) */
```

### MODx.logout

Logs out the active manager user. Fires the 'beforeLogout' and 'afterLogout' events; if both succeed, redirects to the login screen.

### MODx.loadHelpPane

Loads the Help screen for the active page. The URL comes from `MODx.config.help_url`; override it to open any URL in the panel:

``` javascript
/* show the modx.com site in the Help modal */
MODx.config.help_url = 'https://modx.com/';
MODx.loadHelpPane();
```

### MODx.preview

Loads the current MODX site for the active Context.

### MODx.isEmpty

Checks whether a variable is "empty" in the PHP sense — one of:

- false, 'false', or 'FALSE'
- 0 or '0'
- '' (blank string)
- null
- undefined

### MODx.debug

Sends a debug message to the console via `console.log`, but only when the [System Setting](building-sites/settings "Settings") [ui\_debug\_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") is Yes/1. Add debugging and assertions without breaking production sites (which have ui_debug_mode off). Available since 2.1.
