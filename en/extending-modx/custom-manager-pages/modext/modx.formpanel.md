---
title: "MODx.FormPanel"
_old_id: "1058"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.formpanel"
---

## MODx.FormPanel

**Extends:** Ext.FormPanel
**xtype:** modx-formpanel
**Key Features:** Drag-and-drop functionality; changed ("dirty") field checking functionality; connector functionality.

FormPanels appear throughout the MODX Manager and can contain form fields, Grids, Trees — any component.

They pass the modAuth header and a Powered-By header with every submission, which prevents XRSF attacks.

They integrate with the MODX connector structure: pass a `url` parameter in the config and `baseParams` to send with the form submission; the FormPanel handles the rest. With 2.2+ class-based processors and $this->addFieldError(), MODx.FormPanel also processes the errors logged.

## Unique Parameters

MODx.FormPanel adds parameters not found in typical Ext.FormPanel objects:

| Name           | Description                                                                               | Default        |
| -------------- | ----------------------------------------------------------------------------------------- | -------------- |
| saveMsg        | The message to show in the modal wait dialog when saving.                                 | Saving...      |
| allowDrop      | Allow items from a tree to be dropped in this form.                                       | true           |
| useLoadingMask | Set to true to use a loading mask when loading form values.                               | false          |
| onDirtyForm    | A form ID to check against when checking dirty status for the form. Defaults to the form. | this.getForm() |

## Custom Events

Events added by MODx.FormPanel (not in Ext.FormPanel):

| Name           | Description                                                                                          |
| -------------- | ---------------------------------------------------------------------------------------------------- |
| beforeSubmit   | Before a form submission. Parameters: form (the Ext.form.BasicForm), options (submit() options), config (the FormPanel config) |
| failure        | On a form failure or failed processor response. Parameters: result (the processor response), form, options, config |
| fieldChange    | Whenever a field changes. Parameters: field (the Ext.Field), nv (new value), ov (old value), form (the BasicForm) |
| postReady      | After 'ready' event listeners run (which must be fired by extending classes)                         |
| ready          | Not fired; must be fired by objects extending MODx.FormPanel to allow fieldChange/postReady to fire  |
| setup          | At the beginning of a formpanel load, and after a successful submission                              |
| save           | After a successful submission, once the processor response has been handled                          |
| actionNew      | When the processor response indicates the "new" action (create another)                              |
| actionContinue | When the processor response asks to continue editing the same record                                 |
| actionClose    | When the processor response asks to close after saving                                               |
| failureSubmit  | When form validation fails before a submission is sent                                               |
| success        | On a successful processor response. Parameters: result, form, options, config (same as failure)      |

## Other Unique Functions

### Drop Area Fields

Fields in MODx.FormPanel instances accept dropped items, such as nodes from the left-hand trees. Turn this off with the allowDrop parameter.

### Automatic Dirty-Field Handling

Fields fire the fieldChange event when changed. Also available:

- isDirty - check for general form dirty status
- clearDirty - clear dirty status for all of the form
- markDirty - mark the form dirty and fire the fieldChange event

### Field Manipulation

- getField(name) - Gets the Ext.Field object for the field name specified
- hideField(name) - Hides the field with the name passed
- showField(name) - Shows the field with the name passed if it is hidden. Note: the current implementation only accepts an **array** of names — passing a single string throws a TypeError ([#17049](https://github.com/modxcms/revolution/issues/17049)); wrap it: `showField(['name'])`. ([MODx.Window](extending-modx/custom-manager-pages/modext/modx.window)'s showField/hideField take field objects instead.)
- setLabel(name,text) - Set the label of a field to the specified text.
- setMediaSources(name, sources) - Attach media sources to a field (used by TV-style inputs).
- getTabIdsFromKeys(keys) - Map tab keys to their component ids.
- showErroredTab() - Switch to the first tab containing a field with an error, after a failed validation.

## See Also

1. [MODExt MODx Object](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Tutorials](extending-modx/custom-manager-pages/modext/modext-tutorials)
   1. [Ext JS Tutorial - Message Boxes](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
   2. [Ext JS Tutorial - Ajax Include](extending-modx/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
   3. [Ext JS Tutorial - Animation](extending-modx/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
   4. [Ext JS Tutorial - Manipulating Nodes](extending-modx/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
   5. [Ext JS Tutorial - Panels](extending-modx/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
   6. [Ext JS Tutoral - Advanced Grid](extending-modx/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
   7. [Ext JS Tutorial - Inside a CMP](extending-modx/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
3. [MODx.combo.ComboBox](extending-modx/custom-manager-pages/modext/modx.combo.combobox)
4. [MODx.Console](extending-modx/custom-manager-pages/modext/modx.console)
5. [MODx.FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel)
6. [MODx.grid.Grid](extending-modx/custom-manager-pages/modext/modx.grid.grid)
7. [MODx.grid.LocalGrid](extending-modx/custom-manager-pages/modext/modx.grid.localgrid)
8. [MODx.msg](extending-modx/custom-manager-pages/modext/modx.msg)
9. [MODx.tree.Tree](extending-modx/custom-manager-pages/modext/modx.tree.tree)
10. [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window)
