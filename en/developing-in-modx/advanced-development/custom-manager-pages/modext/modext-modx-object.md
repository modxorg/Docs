---
title: "MODExt MODx Object"
_old_id: "370"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object"
---

- [The MODx JS Object](#MODExtMODxObject-TheMODxJSObject)
- [Custom Class Variables](#MODExtMODxObject-CustomClassVariables)
  - [MODx.request](#MODExtMODxObject-MODx.request)
  - [MODx.config](#MODExtMODxObject-MODx.config)
      - [Other Variables](#MODExtMODxObject-OtherVariables)
  - [MODx.action](#MODExtMODxObject-MODx.action)
  - [MODx.version](#MODExtMODxObject-MODx.version)
  - [MODx.user](#MODExtMODxObject-MODx.user)
  - [MODx.perm](#MODExtMODxObject-MODx.perm)
- [Custom Methods](#MODExtMODxObject-CustomMethods)
  - [MODx.load](#MODExtMODxObject-MODx.load)
  - [MODx.clearCache](#MODExtMODxObject-MODx.clearCache)
  - [MODx.releaseLock](#MODExtMODxObject-MODx.releaseLock)
  - [MODx.sleep](#MODExtMODxObject-MODx.sleep)
  - [MODx.logout](#MODExtMODxObject-MODx.logout)
  - [MODx.loadHelpPane](#MODExtMODxObject-MODx.loadHelpPane)
  - [MODx.preview](#MODExtMODxObject-MODx.preview)
  - [MODx.isEmpty](#MODExtMODxObject-MODx.isEmpty)
  - [MODx.debug](#MODExtMODxObject-MODx.debug)



## The MODx JS Object

MODExt comes with a global MODx JS object on each manager page. This object has a few custom methods that can be executed from any custom manager page using MODExt, and also sets up some default settings and customizations.

## Custom Class Variables

The following variables are accessible from the MODx JS object:

### MODx.request

This is a JS object that contains all the current GET parameters for the page. Example:

```
<pre class="brush: php">
var id = MODx.request.id;

```### MODx.config

This object contains all the active System Settings in MODX by key:

```
<pre class="brush: php">
var tpl = MODx.config.default_template;

```#### Other Variables

There are a few other variables available on the MODx.config object that are not [System Settings](administering-your-site/settings/system-settings "System Settings"):

KeyDescriptionbase\_urlThe base URL for the MODX site and/or active context.connectors\_urlThe URL to the connectors directory.manager\_urlThe URL to the manager.http\_hostThe HTTP host variable for the active context.site\_urlThe full Site URL for the active context.custom\_resource\_classesAn array of custom Resource classes pulled from the System Setting custom\_resource\_classes### MODx.action

This object contains a map of all the modAction objects (or MODX manager controllers), mapped by their controller to their ID:

```
<pre class="brush: php">
var actionId = MODx.action['resource/create'];

```As of MODX 2.2, the non-core Actions are prefixed with their namespace. Prior to 2.2 it would just be the action controller. For example a "controllers/index" action in a "mycomponent" namespace would be retrievable using the following in 2.2 and up:

```
<pre class="brush: php">
var actionId = MODx.action['mycomponent:controllers/index'];

```### MODx.version

Contains MODX version information, with the following attributes:

KeyExampleversion2major\_version1minor\_version0patch\_levelplcode\_nameRevolutiondistro (traditional)full\_version2.1.0-plfull\_appnameMODX Revolution 2.1.0-pl (traditional)Example:

```
<pre class="brush: php">
var fv = MODx.version.full_version;

```### MODx.user

This object will contain the two following properties for the currently logged-in manager user:

MODx.user.idThe ID of the user.MODx.user.usernameThe username of the user.```
<pre class="brush: php">
var userId = MODx.user.id;

```### MODx.perm

This will contain the following permissions should they be granted to the user (they will not exist if the user does not have the permission):

NameDescriptionMODx.perm.resource\_treeTo view the Resources tree.MODx.perm.element\_treeTo view the Elements tree.MODx.perm.file\_treeTo view the Files tree.MODx.perm.file\_uploadTo be able to upload files.MODx.perm.file\_managerTo use the MODX file browser.MODx.perm.new\_chunkTo create a new Chunk.MODx.perm.new\_pluginTo create a new Plugin.MODx.perm.new\_snippetTo create a new Snippet.MODx.perm.new\_templateTo create a new Template.MODx.perm.new\_tvTo create a new Template Variable.MODx.perm.directory\_createTo be able to create a directory on the filesystem.```
<pre class="brush: php">
if (MODx.perm.file_upload) { /* ...code... */ }

```## Custom Methods

The MODx object also has quite a few custom methods available to it:

### MODx.load

This method will create a new object of any specified xtype and passed in configuration parameters. Example:

```
<pre class="brush: php">
var w = MODx.load({
  xtype: 'modx-window-namespace-create'
  ,blankValues: true
});
w.setValues({ name: 'My Namespace' });
w.show();

```Any defined class that has a registered xtype can be loaded from this method.

### MODx.clearCache

This fires up the console that clears the MODX cache. It will also fire the 'beforeClearCache' and 'afterClearCache' events on the MODx object. If the System Setting [clear\_cache\_refresh\_trees](administering-your-site/settings/system-settings/clear_cache_refresh_trees "clear_cache_refresh_trees") is set to 1, it will also refresh all the active left-hand trees.

### MODx.releaseLock

This will release the lock on the current active Resource. This method should not be fired on non-Resource editing pages. It will fire the 'beforeReleaseLocks' and 'afterReleaseLocks' events on the MODx object.

### MODx.sleep

This method will cause JavaScript to sleep (or halt) for a specified number of seconds:

```
<pre class="brush: php">
MODx.sleep(3); /* sleep for 3 seconds */

```### MODx.logout

This method will automatically logout the active manager user. It fires the 'beforeLogout' and 'afterLogout' events on the MODx object. If both events are successful, it will then redirect the user to the login screen.

### MODx.loadHelpPane

This will load the current Help screen for the active page. Normally this is set by default on the modAction record for the page, and its URL can be found by the MODx.config.help\_url property. You can, however, override this to fire up any URL into the panel:

```
<pre class="brush: php">
/* show the modx.com site in the Help modal */
MODx.config.help_url = 'http://modx.com/';
MODx.loadHelpPane();

```### MODx.preview

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

This will send off a debug message if and only if the MODX [System Setting](administering-your-site/settings "Settings") [ui\_debug\_mode](administering-your-site/settings/system-settings/ui_debug_mode "ui_debug_mode") is set to Yes/1. The debug message will use console.log to output to the console. This can be useful to add debugging and assertions to your code without breaking it in production sites (which would presumably have [ui\_debug\_mode](administering-your-site/settings/system-settings/ui_debug_mode "ui_debug_mode") off).