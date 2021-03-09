---
title: "MIGXdb.Create doodles manager with help of MIGXdb"
_old_id: "933"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-doodles-manager-with-help-of-migxdb"
---

In this Tutorial we will learn how to create a doodles-manager with help of MIGXdb.

The result at the end will be the same as its done here, but without doing one line of coding: [Developing an Extra in MODX Revolution](case-studies-and-tutorials/developing-an-extra-in-modx-revolution "Developing an Extra in MODX Revolution")

First we will create a db-schema and its table(s), if not already done. Then we will create and configure a MIGXdb-CMP to manage our doodles (db-records).

## Requirements

To begin with we will need to install [MIGX](extras/migx "MIGX") using the Package Manager and do some [basic configuration](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").

## Create a new Package and schema-file

Go to Components->MIGX-> Tab 'Package Manager' add a name for your new package into the field 'packageName:'. For our example we use 'doodles'.

Click 'Create Package'

This should create a directory under your core-path with an empty schema-file in its correct place.

### The Schema

Still having 'doodles' in the field packageName we want to fill the textarea-field 'schema'.

Go to the tab 'xml schema' and add this code:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="doodles" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" version="1.1">
    <object class="Doodle" table="doodles" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" default=""/>
        <field key="description" dbtype="text" phptype="string" null="false" default=""/>
        <field key="createdon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="createdby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="editedon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="editedby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="deleted" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="published" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <aggregate alias="CreatedBy" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign"/>
        <aggregate alias="EditedBy" class="modUser" local="editedby" foreign="id" cardinality="one" owner="foreign"/>
    </object>
</model>
```

by clicking 'Save Schema' we should have our schema-file created. You can test it by clicking 'Load Schema'

I've added two fields to the original doodles-schema: published, deleted
These fields are required by the default getlist-processor of MIGXdb.
If you had already created the doodles-table you can add these fields to your existing schema and go to the tab 'add fields' to add the new fields to your map and table.

Of course you can create your own processors under your own processor-path.

[Read more about creating schemas](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema "Defining a Schema")

### Parse Schema

Create xpdo-classes and maps from schema by clicking 'Parse Schema' on the tab 'Parse Schema'.

### Create Table(s)

Create tables from the schema by clicking 'Create Tables' on the tab 'Create Tables'. This schould create our table.

## Create the Configuration

Now we want to create our configuration for the MIGXdb-CMP.

Go to the main-tab 'MIGX'

There should be a grid with some buttons.

We click the 'Add item' button

In the opening window we add:

### Settings

Name: doodles - this is the name of our configuration. Make sure to use unique configuration-names.
"Add Item" Replacement: Add Doodle - this is the text on our 'Add Item' - Button unique MIGX ID: doodles - Its a good idea to have a unique MIGX - id for all your MIGX-configs.

### CMP-Settings

Tab Caption: Doodles
Tab Description: Manage your doodles here. You can edit them by either double-clicking on the grid or right-clicking on the respective row.

### Columns

click 'add item' for four columns:

- Header: **ID**
- field: **id**

- Header: **Name**
- field: **name**

- Header: **Description**
- field: **description**

- field: **deleted**
- show in grid: **no**

### Formtabs

click 'add item' to add a new formtab

- Caption: **Doodle**

We add two fields to our tab: click 'add item'

- fieldname: **name**
- Caption: **Name**

- fieldname: **description**
- Caption: **Desription**
- inputTVtype: **textarea**

### MIGXdb-Settings

- package: **doodles**
- classname: **Doodle**

### db-filters

click 'add item'

- filter name: **search**
- filter type: **textbox**
- getlist where:

``` json
{"name:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}
```

### Contextmenues

check: update , `recall_remove_delete`

### Actionbuttons

check: add item , toggletrash

## Create a menu item for your CMP

### Revolution 2.3+

Tools (gear icon) -> Menus

'Create Menu' button

Enter values:

- Parent: choose where you want the menu item to appear
- Lexicon-key: doodles (or what you'd like the menu item to be named if you're not using a Lexicon)
- Action: **index**
- Parameters: `&configs=doodles` (note: 'doodles' should be the value of the 'name' field of your config as opposed to the 'unique MIGX ID')
- Namespace: **migx**

Click 'Save' button

### Revolution before version 2.3

System -> Actions

In the menu-tree select: Components->MIGX->right-click->Place Action here

Enter values:

- Lexicon-key: **doodles**
- Action: **migx-index**
- Parameters: `&configs=doodles` (note: 'doodles' should be the value of the 'name' field of your config as opposed to the 'unique MIGX ID')

Click 'Save' button

## Done

Refresh the manager page

Go to the area of the menu where you created your 'doodles' menu item and click it

There it is, your new 'doodles' manager!
