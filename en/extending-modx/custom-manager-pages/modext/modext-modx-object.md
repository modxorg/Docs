---
title: "MODExt MODx Object"
_old_id: "370"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object"
---

## The MODx JS Object

MODExt comes with a global MODx JS object on each manager page. This object has a few custom methods that can be executed from any custom manager page using MODExt, and also sets up some default settings and customizations.

## Custom Class Variables

The following variables are accessible from the MODx JS object:

### MODx.request

This is a JS object that contains all the current GET parameters for the page. Example:

``` javascript
var id = MODx.request.id;
```

### MODx.config

This object contains all the active System Settings in MODX by key:

``` javascript
var tpl = MODx.config.default_template;
```

#### Other Variables

There are a few other variables available on the MODx.config object that are not [System Settings](building-sites/settings "System Settings"):

| Key                       | Description                                                                                  |
| ------------------------- | -------------------------------------------------------------------------------------------- |
| base\_url                 | The base URL for the MODX site and/or active context.                                        |
| connectors\_url           | The URL to the connectors directory.                                                         |
| manager\_url              | The URL to the manager.                                                                      |
| http\_host                | The HTTP host variable for the active context.                                               |
| site\_url                 | The full Site URL for the active context.                                                    |
| custom\_resource\_classes | An array of custom Resource classes pulled from the System Setting custom\_resource\_classes |

### MODx.version

Contains MODX version information, with the following attributes:

| Key            | Example                                |
| -------------- | -------------------------------------- |
| version        | 2                                      |
| major\_version | 1                                      |
| minor\_version | 0                                      |
| patch\_level   | pl                                     |
| code\_name     | Revolution                             |
| distro         | (traditional)                          |
| full\_version  | 2.1.0-pl                               |
| full\_appname  | MODX Revolution 2.1.0-pl (traditional) |

Example:

``` javascript
var fv = MODx.version.full_version;
```

### MODx.user

This object will contain the two following properties for the currently logged-in manager user:

| MODx.user.id       | The ID of the user.       |
| ------------------ | ------------------------- |
| MODx.user.username | The username of the user. |

``` javascript
var userId = MODx.user.id;
```

### MODx.perm

`MODx.perm` is a map of **every** manager permission name to a boolean for the current user. Config JS loads distinct rows from `modAccessPermission` and sets each key with `hasPermission()`. There is no fixed subset. [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425)

Use any permission key your Extra or CMP checks, for example:

```javascript
if (MODx.perm.file_upload) { /* ...code... */ }
if (MODx.perm.view_document) { /* ... */ }
```

Common keys still include `resource_tree`, `element_tree`, `file_tree`, `file_upload`, `file_manager`, `new_chunk`, `new_plugin`, `new_snippet`, `new_template`, `new_tv`, and `directory_create`. Missing keys mean the user does not have that permission (treat as falsy).

## Custom Methods

The MODx object also has quite a few custom methods available to it:

### MODx.load

This method will create a new object of any specified xtype and passed in configuration parameters. Example:

``` javascript
var w = MODx.load({
  xtype: 'modx-window-namespace-create'
  ,blankValues: true
});
w.setValues({ name: 'My Namespace' });
w.show();
```

Any defined class that has a registered xtype can be loaded from this method.

### MODx.clearCache

This fires up the console that clears the MODX cache. It will also fire the 'beforeClearCache' and 'afterClearCache' events on the MODx object. If the System Setting [clear\_cache\_refresh\_trees](building-sites/settings/clear_cache_refresh_trees "clear_cache_refresh_trees") is set to 1, it will also refresh all the active left-hand trees.

### MODx.releaseLock

This will release the lock on the current active Resource. This method should not be fired on non-Resource editing pages. It will fire the 'beforeReleaseLocks' and 'afterReleaseLocks' events on the MODx object.

### MODx.sleep

This method will cause JavaScript to sleep (or halt) for a specified number of seconds:

``` javascript
MODx.sleep(3); /* sleep for 3 seconds */
```

### MODx.logout

This method will automatically logout the active manager user. It fires the 'beforeLogout' and 'afterLogout' events on the MODx object. If both events are successful, it will then redirect the user to the login screen.

### MODx.loadHelpPane

This will load the current Help screen for the active page. Its URL is set from the `MODx.config.help_url` property; you can override this to fire up any URL into the panel:

``` javascript
/* show the modx.com site in the Help modal */
MODx.config.help_url = 'https://modx.com/';
MODx.loadHelpPane();
```

### MODx.preview

Loads the current MODX site for the active Context.

### MODx.isEmpty

Checks to see if the specified variable is "empty" (in the PHP sense). This means it is either:

- false, 'false', or 'FALSE'
- 0 or '0'
- '' (blank string)
- null
- undefined

### MODx.debug

(2.1+ only)

This will send off a debug message if and only if the MODX [System Setting](_legacy/administering-your-site/settings "Settings") [ui\_debug\_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") is set to Yes/1. The debug message will use console.log to output to the console. This can be useful to add debugging and assertions to your code without breaking it in production sites (which would presumably have [ui\_debug\_mode](building-sites/settings/ui_debug_mode "ui_debug_mode") off).
