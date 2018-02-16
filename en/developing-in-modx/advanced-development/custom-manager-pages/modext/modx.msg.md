---
title: "MODx.msg"
_old_id: "1088"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.msg"
---

MODx.msg
--------

**Extends:** Ext.Component   
**Key Features:** AJAX connector features.

![](/download/attachments/18678080/confirm.png?version=1&modificationDate=1302195122000)

The MODx.msg class provides the functionality of the Ext.MessageBox class, with the added benefit of using an AJAX callback function (for confirmation dialogs). Simply provide a URL and optional parameters and a connector request will be sent after the user confirms the prompt. It defaults to a minimum width of 200px.

Methods
-------

### alert

> MODx.msg.alert(title,text,fn,scope)

Used to display an alert dialog box on the page. Example:

```
<pre class="brush: php">
MODx.msg.alert('Warning!','You are out of space! We should clear the cache.',function() {
  MODx.clearCache();
},MODx);

```### confirm

> MODx.msg.confirm(config)

Loads a confirmation dialog that prompts the user for a Yes/No response. If Yes is selected, fires an AJAX request to a specific connector. The properties for the config parameter are:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>title</td><td>The title of the confirmation box.</td></tr><tr><td>text</td><td>The text in the confirmation box.</td></tr><tr><td>url</td><td>The URL to send the AJAX request to.</td></tr><tr><td>params</td><td>The REQUEST params to send with the AJAX request.</td></tr><tr><td>listeners</td><td>Any listeners to look for on the request.</td></tr></tbody></table>An example:

```
<pre class="brush: php">
MODx.msg.confirm({
   title: 'Are you sure?',
   text: 'Do you want to delete the world? This is irreversible.',
   url: 'http://rest.endofdays.com/armageddon/',
   params: {
      deleteWorld: true
   },
   listeners: {
        'success':{fn: function(r) {
             MODx.clearCache(); /* clear cache after world destruction, so we dont have latent data */
        },scope:true}
   }
});

```#### MODx.msg.confirm Custom Events

MODx.msg.confirm adds a few custom events that fire:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>success</td><td>Fires on a successful response from the AJAX submission.</td></tr><tr><td>failure</td><td>Fires on a failed response from the AJAX submission.</td></tr><tr><td>cancel</td><td>Fires when the user cancels the confirmation dialog.</td></tr></tbody></table>### status

```
<pre class="brush: php">
MODx.msg.status(opt)

```Loads a temporary status message in the top-right of the screen, that fades away. The properties for the opt parameter are:

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>title</td><td>Optional. The title of the message.</td><td> </td></tr><tr><td>message</td><td>The text of the status message.</td><td> </td></tr><tr><td>dontHide</td><td>If true, will not automatically hide the status message. Will stay until it is clicked.</td><td>false</td></tr><tr><td>delay</td><td>The number of seconds to show the message.</td><td>1.5</td></tr></tbody></table>You could use this in custom manager pages to provide confirmation your object was saved. You could add something like this to your FormPanel definition:

```
<pre class="brush: php">
        listeners: {
            'success': function (res) {
                MODx.msg.status({
                    title: _('save_successful'),
                    message: res.result['message'],
                    delay: 3
                });
            }
        }

```The 'success' listener is part of modExt and comes with [MODx.FormPanel](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel "MODx.FormPanel").

See Also
--------

1. [MODExt MODx Object](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Tutorials](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials)
  1. [1. Ext JS Tutorial - Message Boxes](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
  2. [2. Ext JS Tutorial - Ajax Include](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
  3. [3. Ext JS Tutorial - Animation](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
  4. [4. Ext JS Tutorial - Manipulating Nodes](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
  5. [5. Ext JS Tutorial - Panels](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
  6. [7. Ext JS Tutoral - Advanced Grid](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
  7. [8. Ext JS Tutorial - Inside a CMP](developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
3. [MODx.combo.ComboBox](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.combo.combobox)
4. [MODx.Console](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.console)
5. [MODx.FormPanel](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel)
6. [MODx.grid.Grid](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.grid)
7. [MODx.grid.LocalGrid](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.localgrid)
8. [MODx.msg](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.msg)
9. [MODx.tree.Tree](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree)
10. [MODx.Window](developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window)