---
title: "MODx.Window"
_old_id: "1114"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.window"
---

## MODx.Window

**Extends:** Ext.Window 
**Key Features:** Drag-and-drop functionality; connector functionality for saving.

![](/download/attachments/18678082/modx-window.png?version=1&modificationDate=1303411582000)

MODExt Windows are a convenient way to display record data from a Grid or AJAX request for editing. Windows automatically include a FormPanel which you can add form fields (and other components) to. Submitting/saving a Window actually submits the FormPanel, and initiates an AJAX request to your connector.

## Unique Parameters

| Name          | Description                                                                                               | Default |
| ------------- | --------------------------------------------------------------------------------------------------------- | ------- |
| action        | If baseParams is not set, will use this as the action to the controller.                                  |         |
| allowDrop     | Whether or not to allow dropping of tree items onto the form fields.                                      | 1       |
| baseParams    | An object of parameters to send along with the window form on save.                                       | {}      |
| blankValues   | If true, will reset the values of the form each time it is shown.                                         | 0       |
| cancelBtnText | The text of the cancel button for the window.                                                             | Cancel  |
| fields        | An array of fields for the form, similar to Ext.form.FormPanel's fields definition.                       | \[\]    |
| fileUpload    | If true, the form will be built to accept files.                                                          | 0       |
| formFrame     | Whether or not to add a ext-style frame to the window.                                                    | 1       |
| labelAlign    | The alignment of the labels on the form.                                                                  | right   |
| labelWidth    | The width, in pixels, of the labels on the form.                                                          | 100     |
| record        | A JSON object of default values (in name: value format) to set to the form when first loading the window. | {}      |
| saveBtnText   | The text of the save button for the window.                                                               | Save    |
| url           | The URL of the connector to submit the window form to.                                                    |         |

## Custom Events

| Name         | Description                                                                       |
| ------------ | --------------------------------------------------------------------------------- |
| success      | If the form submission returns a success response.                                |
| failure      | If the form submission returns a failure response.                                |
| beforeSubmit | Before the form submits its values to the connector, but after validation passes. |

## Unique Functionality

#### Firing the submit method

You can manually fire the submission of the Window's form by running the submit() method, which has an optional "close" parameter (1/0) that, if 1, will close the window on success. Example:

``` javascript 
var w = Ext.getCmp('my-window-id');
w.submit(true); /* submit and then close window */
```

#### setValues

The MODx.Window class comes with a setValues method, that will set the form values of the window:

``` javascript 
var w = Ext.getCmp('my-window-id');
w.setValues({ 
  name: 'John'
  ,email: 'my@email.com'
});
```

#### reset

You can run the reset method to empty (reset) all the fields on the form:

``` javascript 
var w = Ext.getCmp('my-window-id');
w.reset();
```

#### Hiding and Showing Fields

MODx.Window comes with a few assistance methods for making fields in its forms visible or hidden:

``` javascript 
var w = Ext.getCmp('my-window-id');
w.hideField('email');
w.showField('comments');
```

## See Also

1. [MODExt MODx Object](extending-modx/custom-manager-pages/modext/modext-modx-object)
2. [MODExt Tutorials](extending-modx/custom-manager-pages/modext/modext-tutorials)
  1. [1. Ext JS Tutorial - Message Boxes](extending-modx/custom-manager-pages/modext/modext-tutorials/1.-ext-js-tutorial-message-boxes)
  2. [2. Ext JS Tutorial - Ajax Include](extending-modx/custom-manager-pages/modext/modext-tutorials/2.-ext-js-tutorial-ajax-include)
  3. [3. Ext JS Tutorial - Animation](extending-modx/custom-manager-pages/modext/modext-tutorials/3.-ext-js-tutorial-animation)
  4. [4. Ext JS Tutorial - Manipulating Nodes](extending-modx/custom-manager-pages/modext/modext-tutorials/4.-ext-js-tutorial-manipulating-nodes)
  5. [5. Ext JS Tutorial - Panels](extending-modx/custom-manager-pages/modext/modext-tutorials/5.-ext-js-tutorial-panels)
  6. [7. Ext JS Tutoral - Advanced Grid](extending-modx/custom-manager-pages/modext/modext-tutorials/7.-ext-js-tutoral-advanced-grid)
  7. [8. Ext JS Tutorial - Inside a CMP](extending-modx/custom-manager-pages/modext/modext-tutorials/8.-ext-js-tutorial-inside-a-cmp)
3. [MODx.combo.ComboBox](extending-modx/custom-manager-pages/modext/modx.combo.combobox)
4. [MODx.Console](extending-modx/custom-manager-pages/modext/modx.console)
5. [MODx.FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel)
6. [MODx.grid.Grid](extending-modx/custom-manager-pages/modext/modx.grid.grid)
7. [MODx.grid.LocalGrid](extending-modx/custom-manager-pages/modext/modx.grid.localgrid)
8. [MODx.msg](extending-modx/custom-manager-pages/modext/modx.msg)
9. [MODx.tree.Tree](extending-modx/custom-manager-pages/modext/modx.tree.tree)
10. [MODx.Window](extending-modx/custom-manager-pages/modext/modx.window)