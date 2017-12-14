---
title: "MODx.Window"
_old_id: "1114"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window"
---

<div>- [MODx.Window](#MODx.Window-MODx.Window)
- [Unique Parameters](#MODx.Window-UniqueParameters)
- [Custom Events](#MODx.Window-CustomEvents)
- [Unique Functionality](#MODx.Window-UniqueFunctionality)
  - [Firing the submit method](#MODx.Window-Firingthesubmitmethod)
  - [setValues](#MODx.Window-setValues)
  - [reset](#MODx.Window-reset)
  - [Hiding and Showing Fields](#MODx.Window-HidingandShowingFields)
- [See Also](#MODx.Window-SeeAlso)

</div>MODx.Window
-----------

**Extends:** Ext.Window   
**Key Features:** Drag-and-drop functionality; connector functionality for saving.

![](/download/attachments/18678082/modx-window.png?version=1&modificationDate=1303411582000)

MODExt Windows are a convenient way to display record data from a Grid or AJAX request for editing. Windows automatically include a FormPanel which you can add form fields (and other components) to. Submitting/saving a Window actually submits the FormPanel, and initiates an AJAX request to your connector.

Unique Parameters
-----------------

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>action</td><td>If baseParams is not set, will use this as the action to the controller.</td><td> </td></tr><tr><td>allowDrop</td><td>Whether or not to allow dropping of tree items onto the form fields.</td><td>1</td></tr><tr><td>baseParams</td><td>An object of parameters to send along with the window form on save.</td><td>{}</td></tr><tr><td>blankValues</td><td>If true, will reset the values of the form each time it is shown.</td><td>0</td></tr><tr><td>cancelBtnText</td><td>The text of the cancel button for the window.</td><td>Cancel</td></tr><tr><td>fields</td><td>An array of fields for the form, similar to Ext.form.FormPanel's fields definition.</td><td>\[\]</td></tr><tr><td>fileUpload</td><td>If true, the form will be built to accept files.</td><td>0</td></tr><tr><td>formFrame</td><td>Whether or not to add a ext-style frame to the window.</td><td>1</td></tr><tr><td>labelAlign</td><td>The alignment of the labels on the form.</td><td>right</td></tr><tr><td>labelWidth</td><td>The width, in pixels, of the labels on the form.</td><td>100</td></tr><tr><td>record</td><td>A JSON object of default values (in name: value format) to set to the form when first loading the window.</td><td>{}</td></tr><tr><td>saveBtnText</td><td>The text of the save button for the window.</td><td>Save</td></tr><tr><td>url</td><td>The URL of the connector to submit the window form to.</td><td> </td></tr></tbody></table>Custom Events
-------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>success</td><td>If the form submission returns a success response.</td></tr><tr><td>failure</td><td>If the form submission returns a failure response.</td></tr><tr><td>beforeSubmit</td><td>Before the form submits its values to the connector, but after validation passes.</td></tr></tbody></table>Unique Functionality
--------------------

#### Firing the submit method

You can manually fire the submission of the Window's form by running the submit() method, which has an optional "close" parameter (1/0) that, if 1, will close the window on success. Example:

```
<pre class="brush: php">
var w = Ext.getCmp('my-window-id');
w.submit(true); /* submit and then close window */

```#### setValues

The MODx.Window class comes with a setValues method, that will set the form values of the window:

```
<pre class="brush: php">
var w = Ext.getCmp('my-window-id');
w.setValues({ 
  name: 'John'
  ,email: 'my@email.com'
});

```#### reset

You can run the reset method to empty (reset) all the fields on the form:

```
<pre class="brush: php">
var w = Ext.getCmp('my-window-id');
w.reset();

```#### Hiding and Showing Fields

MODx.Window comes with a few assistance methods for making fields in its forms visible or hidden:

```
<pre class="brush: php">
var w = Ext.getCmp('my-window-id');
w.hideField('email');
w.showField('comments');

```See Also
--------

1. [MODExt MODx Object](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Tutorials](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials)
  1. [1. Ext JS Tutorial - Message Boxes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
  2. [2. Ext JS Tutorial - Ajax Include](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
  3. [3. Ext JS Tutorial - Animation](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
  4. [4. Ext JS Tutorial - Manipulating Nodes](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
  5. [5. Ext JS Tutorial - Panels](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
  6. [7. Ext JS Tutoral - Advanced Grid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
  7. [8. Ext JS Tutorial - Inside a CMP](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
3. [MODx.combo.ComboBox](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.combo.combobox)
4. [MODx.Console](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.console)
5. [MODx.FormPanel](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel)
6. [MODx.grid.Grid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.grid)
7. [MODx.grid.LocalGrid](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.grid.localgrid)
8. [MODx.msg](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.msg)
9. [MODx.tree.Tree](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree)
10. [MODx.Window](/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window)