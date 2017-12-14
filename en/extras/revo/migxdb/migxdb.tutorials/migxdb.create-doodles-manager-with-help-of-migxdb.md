---
title: "MIGXdb.Create doodles manager with help of MIGXdb"
_old_id: "933"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-doodles-manager-with-help-of-migxdb"
---

- [Creating a doodles-manager with help of MIGXdb](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CreatingadoodlesmanagerwithhelpofMIGXdb)
- [Requirements](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Requirements)
- [Create a new Package and schema-file](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CreateanewPackageandschemafile)
  - [The Schema](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-TheSchema)
  - [Parse Schema](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-ParseSchema)
  - [Create Table(s)](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CreateTable%28s%29)
- [Create the Configuration](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CreatetheConfiguration)
  - [Settings](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Settings)
  - [CMP-Settings](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CMPSettings)
  - [Columns](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Columns)
  - [Formtabs](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Formtabs)
  - [MIGXdb-Settings](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-MIGXdbSettings)
  - [db-filters](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-dbfilters)
  - [Contextmenues](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Contextmenues)
  - [Actionbuttons](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Actionbuttons)
- [Create a menu to your CMP](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-CreateamenutoyourCMP)
- [Done](#MIGXdb.CreatedoodlesmanagerwithhelpofMIGXdb-Done)

 Creating a doodles-manager with help of MIGXdb 
------------------------------------------------

 In this Tutorial we will learn how to create a doodles-manager with help of MIGXdb.

 The result at the end will be the same as its done here, but without doing one line of coding: [Developing an Extra in MODX Revolution](/revolution/2.x/case-studies-and-tutorials/developing-an-extra-in-modx-revolution "Developing an Extra in MODX Revolution")

 First we will create a db-schema and its table(s), if not already done. Then we will create and configure a MIGXdb-CMP to manage our doodles (db-records).

 Requirements 
--------------

 To begin with we will need to install [MIGX](/extras/revo/migx "MIGX") using the Package Manager and do some [basic configuration](/extras/revo/migxdb/migxdb.configuration "MIGXdb.Configuration").

 Create a new Package and schema-file 
--------------------------------------

 Go to Components->MIGX-> Tab 'Package Manager'

 add a name for your new package into the field 'packageName:'. For our example we use 'doodles'.

 Click 'Create Package'

 This should create a directory under your core-path with an empty schema-file in its correct place.

###  The Schema 

 Still having 'doodles' in the field packageName we want to fill the textarea-field 'schema'.

 Go to the tab 'xml schema' and add this code:

```
<pre class="brush: xml"><?xml version="1.0" encoding="UTF-8"?>
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

``` by clicking 'Save Schema' we should have our schema-file created. You can test it by clicking 'Load Schema'

 I've added two fields to the original doodles-schema: published, deleted   
 These fields are required by the default getlist-processor of MIGXdb.   
 If you had already created the doodles-table you can add these fields to your existing schema and go to the tab 'add fields' to add the new fields to your map and table.

 Of course you can create your own processors under your own processor-path.

 [Read more about creating schemas](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema "Defining a Schema")

###  Parse Schema 

 Create xpdo-classes and maps from schema by clicking 'Parse Schema' on the tab 'Parse Schema'.

###  Create Table(s) 

 Create tables from the schema by clicking 'Create Tables' on the tab 'Create Tables'. This schould create our table.

 Create the Configuration 
--------------------------

 Now we want to create our configuration for the MIGXdb-CMP.

 Go to the main-tab 'MIGX'

 There should be a grid with some buttons.

 We click the 'Add item' button

 In the opening window we add:

###  Settings 

 Name: doodles - this is the name of our configuration. Make sure to use unique configuration-names.   
 "Add Item" Replacement: Add Doodle - this is the text on our 'Add Item' - Button   
 unique MIGX ID: doodles - Its a good idea to have a unique MIGX - id for all your MIGX-configs.

###  CMP-Settings 

 Tab Caption: Doodles   
 Tab Description: Manage your doodles here. You can edit them by either double-clicking on the grid or right-clicking on the respective row.

###  Columns 

 click 'add item' for four columns:

 Header: ID   
 field: id

 Header: Name   
 field: name

 Header: Description   
 field: description

 field: deleted   
 show in grid: no

###  Formtabs 

 click 'add item' to add a new formtab

 Caption: Doodle

 We add two fields to our tab:   
 click 'add item'

 fieldname: name   
 Caption: Name

 fieldname: description   
 Caption: Desription   
 inputTVtype: textarea

### 

###  MIGXdb-Settings 

 package: doodles   
 classname: Doodle

###  db-filters 

 click 'add item'   
 filter name: search   
 filter type: textbox   
 getlist where:

```
<pre class="brush: php">{"name:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}

```###  Contextmenues 

 check: update , recall\_remove\_delete

###  Actionbuttons 

 check: add item , toggletrash

 Create a menu to your CMP 
---------------------------

 System -> Actions

 menu-tree:   
 Components->MIGX->right-click->Place Action here

 Lexicon-key: doodles   
 Action: migx-index   
 parameters: &configs=doodles

 click 'save'

**Revolution 2.3**

Tools (gear icon) -> Menus -> Create Menu button  
Lexicon-key: doodles  
Parent: choose where you want the menu item to appear  
Action: index  
Parameters: &configs=doodles  
Namespace: migx

 Done 
------

 refresh the manager   
 go to Components->MIGX->doodles

 There is it, your new doodles-manager!

  