---
title: "MODx.FormPanel"
_old_id: "1058"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel"
---

<div>- [MODx.FormPanel](#MODx.FormPanel-MODx.FormPanel)
- [Unique Parameters](#MODx.FormPanel-UniqueParameters)
- [Custom Events](#MODx.FormPanel-CustomEvents)
- [Other Unique Functions](#MODx.FormPanel-OtherUniqueFunctions)
  - [Drop Area Fields](#MODx.FormPanel-DropAreaFields)
  - [Automatic Dirty-Field Handling](#MODx.FormPanel-AutomaticDirtyFieldHandling)
  - [Field Manipulation](#MODx.FormPanel-FieldManipulation)
- [See Also](#MODx.FormPanel-SeeAlso)

</div>MODx.FormPanel
--------------

**Extends:** Ext.FormPanel   
**xtype:** modx-formpanel   
**Key Features:** Drag-and-drop functionality; changed ("dirty") field checking functionality; connector functionality.

FormPanels are found throughout the MODx Manager. They can contain form fields, Grids, Trees - just about any component available.

They automatically pass the modAuth header and a Powered-By header into any submissions, which is used to prevent XRSF attacks.

They also automatically integrate into the MODX connector structure. All you must do is pass in a url parameter into the config of the object, and baseParams to send with the form submission, and the FormPanel will handle the rest. With 2.2+ class-based processors and $this->addFieldError(), the MODx.FormPanel will also properly process the errors logged.

Unique Parameters
-----------------

MODx.FormPanel adds a few unique parameters not found in typical Ext.FormPanel objects:

<table><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>saveMsg</td><td>The message to show in the modal wait dialog when saving.</td><td>Saving...</td></tr><tr><td>allowDrop</td><td>Allow items from a tree to be dropped in this form.</td><td>true</td></tr><tr><td>useLoadingMask</td><td>Set to true to use a loading mask when loading form values.</td><td>false</td></tr><tr><td>onDirtyForm</td><td>A form ID to check against when checking dirty status for the form. Defaults to the form.</td><td>this.getForm()</td></tr></tbody></table>Custom Events
-------------

MODx.FormPanel adds a few extra events not found in Ext.FormPanel objects:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>beforeSubmit</td><td>Fires before a submission of the form, with 3 parameters: - form - The Ext.form.BasicForm object attached to this FormPanel
- options - Any options passed to the submit() call
- config - The FormPanel config object

</td></tr><tr><td>failure</td><td>Fires on a form failure or failure response from a processor, with 4 parameters: - result - The response object sent from the processor
- form - The Ext.form.BasicForm object attached to this FormPanel
- options - Any options passed to the submit() call
- config - The FormPanel config object

</td></tr><tr><td>fieldChange</td><td>Fires whenever a field is changed, with the following parameters: - field - The Ext.Field object that is being changed
- nv - The new value of the field
- ov - The old value of the field
- form - The BasicForm attached to this FormPanel

</td></tr><tr><td>postReady</td><td>Fires after 'ready' event listeners are run (which must be fired by extending classes)</td></tr><tr><td>ready</td><td>Not fired; must be fired by extended objects of MODx.FormPanel to allow fieldChange/postReady events to fire.</td></tr><tr><td>setup</td><td>Fired at the beginning of a formpanel load, and after a successful submission.</td></tr><tr><td>success</td><td>Fires on a form success with a success response from a processor, with 4 parameters: - result - The response object sent from the processor
- form - The Ext.form.BasicForm object
- options - Any options passed to the submit() call
- config - The FormPanel config object

</td></tr></tbody></table>Other Unique Functions
----------------------

#### Drop Area Fields

All fields in MODx.FormPanel instances automatically can have items dropped into them, such as nodes from the left-hand trees. You can turn off this functionality with the allowDrop parameter.

#### Automatic Dirty-Field Handling

All fields will fire the fieldChange event when they are changed. You can also use the following methods:

- isDirty - check for general form dirty status
- clearDirty - clear dirty status for all of the form
- markDirty - mark the form dirty and fire the fieldChange event

#### Field Manipulation

You can easily manipulate fields and labels in MODx.FormPanel objects:

- getField(name) - Gets the Ext.Field object for the field name specified
- hideField(name) - Hides the field with the name passed
- showField(name) - Shows the field with the name passed if it is hidden
- setLabel(name,text) - Set the label of a field to the specified text.

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