---
title: "MODx.tree.Tree"
_old_id: "1111"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree"
---

## MODx.tree.Tree

**Extends:** Ext.tree.TreePanel 
**Key Features:** Remotely-loaded toolbars; drag-and-drop to form fields functionality; connector functionality for removing and dragging/sorting.

![](/download/attachments/18678081/modext_tree.png?version=1&modificationDate=1250518279000)

Trees provide a quick and easy way to display multiple levels of objects which have a parent-child relationship, such as users or resources.

## Unique Parameters

MODx.tree.Tree has a few extra parameters not found in Ext.tree.TreePanel objects:

| Name                  | Description                                                                                                                                                             | Default    |
| --------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------- |
| url                   | The URL to point the tree loader at. Optional if you pass in the data parameter.                                                                                        |            |
| rootName              | The text of the root node, if rootVisible is set to true.                                                                                                               |            |
| rootId                | The ID of the root node.                                                                                                                                                | root       |
| data                  | Optional; if url is not set, data must be loaded in through here.                                                                                                       | \[\]       |
| remoteToolbar         | If true, will load the tree's toolbar via data loaded remotely.                                                                                                         | false      |
| remoteToolbarUrl\*    | The connector URL to load the toolbar from. Defaults to the tree's URL.                                                                                                 |            |
| remoteToolbarAction\* | The processor action to load the toolbar from.                                                                                                                          | getToolbar |
| useDefaultToolbar     | If remoteToolbar is false, this will load the default toolbar, which contains expand all, contract all, and refresh. Items passed to tbar property will be added after. | false      |
| menuConfig            | The config object to pass to the context menu loaded for this tree.                                                                                                     |            |
| expandFirst           | If true, will expand the first level nodes on render.                                                                                                                   | true       |
| removeAction\*        | The processor action to take when removing a node.                                                                                                                      | remove     |
| removeTitle\*         | The title for the remove dialog when removing a node.                                                                                                                   | Warning!   |
| primaryKey            | The primary key for the node. Usually is id.                                                                                                                            | id         |
| sortAction            | The processor action to take when sorting nodes via drag/drop.                                                                                                          | sort       |
| toolbarItemCls\*      | The CSS class to add to remoteToolbar loaded items.                                                                                                                     | x-btn-icon |

- = MODX Revolution 2.1+ Only

## Custom Events

The custom events fired by MODx.tree.Tree are:

| Name                                                    | Description                                                                                               |
| ------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- |
| beforeSort                                              | Fired before the tree sends off the sorted nodes to the sort processor. Passed the sorted nodes, encoded. |
| afterSort                                               | Fired after the tree node sorting happens. Passes: - event - The drop event                               |
| - result - The response object from the sort processor. |

## Other Unique Features

#### Sorting

Sorting is automatically enabled by default in MODx.tree.Tree objects. To disable, set enableDD to false in your config. After a drag/drop, the tree will fire off the encoded nodes to a sort processor, with the same connector as the tree URL.

#### Remote Toolbar Loading

Toolbars can be loaded remotely, using the remoteToolbar config parameter. This will load the data from a processor loaded by the remoteToolbarAction config var, which defaults to "getToolbar".

#### Drag/Drop to MODx.FormPanel Fields

Nodes can be dragged into MODx.FormPanel fields, assuming that the following is passed into the config var:

``` javascript
,enableDD: true
,ddGroup: 'modx-treedrop-dd'
```

and that the node has an attribute of 'type', which is one of the following values: modResource,snippet,chunk,tv,file.

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