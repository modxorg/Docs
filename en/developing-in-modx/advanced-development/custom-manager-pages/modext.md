---
title: "MODExt"
_old_id: "198"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext"
---

- [What is MODExt?](#what-is-modext)
- [Commonly-Used Components](#commonly-used-components)
  - [More MODExt Components](#more-modext-components)
    - [xcheckbox](#xcheckbox)
- [Extending a MODExt Class](#extending-a-modext-class)
- [See Also](#see-also)



## What is MODExt?

MODExt is an extension of the [ExtJS3 JavaScript Framework](http://www.sencha.com/products/extjs) that provides extra, customized-to-MODx functionality. It drives MODx Revolution's manager interface, and it is also available to developers wanting to use it in their CMP development. A developer simply needs to use Ext.extend on the MODx.\* class to instantly get the benefit of custom MODExt components.

Why Ext JS? There are lots of Javascript libraries and frameworks out there, and all of them let you manipulate the DOM, but only a couple of them offer a mature UI library (the Yahoo User Interface and Ext JS are the biggest players in the field). Ext JS is well suited to creating a rich internet application such as the MODX manager.

## Commonly-Used Components

There are a few components that are used throughout the MODx Manager, and will likely be used in CMPs

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

### More MODExt Components

Of course, there are more MODExt components at your disposal. For a full list (and source code to examine), browse to the **manager/assets/modext/widgets/core/** directory of your MODx installation.

#### xcheckbox

The xcheckbox xtype is an extension to the regular ExtJS checkbox added in MODX 2.1 that, when the checkbox is not checked, will send the value "0" instead of an empty string compared to the original checkbox form input.

## Extending a MODExt Class

Extending a MODExt component is actually quite simple. Let's extend the MODx.grid.Grid class to create our own custom grid, complete with a custom toolbar.

First, create a new JavaScript file and place the following code:

``` php 
MyComponent.grid.MyGrid = function( config ) {
    /* Class parent constructor */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};
Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Class members will go here */
} );
/* Register "mycomponent-grid-mygrid" as an xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Here, we've created our own class (MyComponent.grid.MyGrid) which extends MODx.grid.Grid. We have also registered "mycomponent-grid-mygrid" as an Ext xtype, which can be used to display this grid in a FormPanel or other component. It has no additional functionality -- yet!

Now, let's add some configuration options:

``` js 
MyComponent.grid.MyGrid = function( config ) {
    config = config || {};

    /* Grid configuration options */
    Ext.applyIf( config, {
        id : "mycomponent-grid-mygrid",
        title : _( "my_grid" ),
        url : MyComponent.config.connectors_url + "list.php",
        baseParams : {
            action : "getlist"
        },
        paging : true,
        autosave : true,
        remoteSort : true,
        /* Store field list */
        fields : [ {
            name : "id",
            type : "int"
        }, {
            name : "name",
            type : "string"
        }, {
            name : "menu"
        } ],
        /* Grid ColumnModel */
        columns : [ {
            header : _( "id" ),
            dataIndex : "id",
            sortable : true
        }, {
            header : _( "name" ),
            dataIndex : "name",
            sortable : true
        } ],
        /* Top toolbar */
        tbar : [ {
            xtype : "button",
            text : _( "create" ),
            handler : {
                xtype : "mycomponent-window-create",
                blankValues : true
            },
            scope : this
        } ]
    } );

    /* Class parent constructor */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};

Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Class members will go here */
} );

/* Register "mycomponent-grid-mygrid" as an xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Our basic configuration sets the grid up to work with a "list" connector, using the "getlist" action parameter. It also sets up paging, sorting, and enables "autosave" functionality so that whenever a record is changed, it's automatically updated in the database.

We then set up our fields (id, name, and menu), and our ColumnModel which references the fields in our store.

Lastly, we create the top toolbar, consisting of a button. The handler creates a window used for creating a record to add to our database.

## See Also

- [ExtJS 3.4 API Documentation](http://docs.sencha.com/ext-js/3-4/#!/api)
- [ExtJS 3.4 Examples](http://dev.sencha.com/deploy/ext-3.4.0/examples/)