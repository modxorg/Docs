---
title: "MODx.tree.Tree"
_old_id: "1111"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.tree.tree"
---

- [MODx.tree.Tree](#MODx.tree.Tree-MODx.tree.Tree)
- [Unique Parameters](#MODx.tree.Tree-UniqueParameters)
- [Custom Events](#MODx.tree.Tree-CustomEvents)
- [Other Unique Features](#MODx.tree.Tree-OtherUniqueFeatures)
  - [Sorting](#MODx.tree.Tree-Sorting)
  - [Remote Toolbar Loading](#MODx.tree.Tree-RemoteToolbarLoading)
  - [Drag/Drop to MODx.FormPanel Fields](#MODx.tree.Tree-Drag%2FDroptoMODx.FormPanelFields)
- [See Also](#MODx.tree.Tree-SeeAlso)



## MODx.tree.Tree

**Extends:** Ext.tree.TreePanel 
**Key Features:** Remotely-loaded toolbars; drag-and-drop to form fields functionality; connector functionality for removing and dragging/sorting.

![](/download/attachments/18678081/modext_tree.png?version=1&modificationDate=1250518279000)

Trees provide a quick and easy way to display multiple levels of objects which have a parent-child relationship, such as users or resources.

## Unique Parameters

MODx.tree.Tree has a few extra parameters not found in Ext.tree.TreePanel objects:

NameDescriptionDefaulturlThe URL to point the tree loader at. Optional if you pass in the data parameter. rootNameThe text of the root node, if rootVisible is set to true. rootIdThe ID of the root node.rootdataOptional; if url is not set, data must be loaded in through here.\[\]remoteToolbarIf true, will load the tree's toolbar via data loaded remotely.falseremoteToolbarUrl\*The connector URL to load the toolbar from. Defaults to the tree's URL. remoteToolbarAction\*The processor action to load the toolbar from.getToolbaruseDefaultToolbarIf remoteToolbar is false, this will load the default toolbar, which contains expand all, contract all, and refresh. Items passed to tbar property will be added after.falsemenuConfigThe config object to pass to the context menu loaded for this tree. expandFirstIf true, will expand the first level nodes on render.trueremoveAction\*The processor action to take when removing a node.removeremoveTitle\*The title for the remove dialog when removing a node.Warning!primaryKeyThe primary key for the node. Usually is id.idsortActionThe processor action to take when sorting nodes via drag/drop.sorttoolbarItemCls\*The CSS class to add to remoteToolbar loaded items.x-btn-icon- = MODX Revolution 2.1+ Only

## Custom Events

The custom events fired by MODx.tree.Tree are:

NameDescriptionbeforeSortFired before the tree sends off the sorted nodes to the sort processor. Passed the sorted nodes, encoded.afterSortFired after the tree node sorting happens. Passes: - event - The drop event
- result - The response object from the sort processor.

## Other Unique Features

#### Sorting

Sorting is automatically enabled by default in MODx.tree.Tree objects. To disable, set enableDD to false in your config. After a drag/drop, the tree will fire off the encoded nodes to a sort processor, with the same connector as the tree URL.

#### Remote Toolbar Loading

Toolbars can be loaded remotely, using the remoteToolbar config parameter. This will load the data from a processor loaded by the remoteToolbarAction config var, which defaults to "getToolbar".

#### Drag/Drop to MODx.FormPanel Fields

Nodes can be dragged into MODx.FormPanel fields, assuming that the following is passed into the config var:

```
<pre class="brush: php">
,enableDD: true
,ddGroup: 'modx-treedrop-dd'

```and that the node has an attribute of 'type', which is one of the following values: modResource,snippet,chunk,tv,file.

## See Also

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