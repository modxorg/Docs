---
title: "MIGXdb.Create doodles manager with help of MIGXdb"
_old_id: "933"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-doodles-manager-with-help-of-migxdb"
---

In this Tutorial we will learn how to create a doodles-manager with help of MIGXdb.

First we will create a db-schema and its table(s). Then we will create and configure a MIGXdb Custom Manager Page (CMP) to manage our doodles (database records).

## Requirements

To begin with we will need to install [MIGX](extras/migx "MIGX") using the Package Manager.

## Create a new Package and schema-file

### The Package

- In the main MODX menu, click **Extras**
- Click **MIGX**
- Click the **Package Manager** tab
- Add 'doodles' to the **Package Name** field. 
- Click **Create Package**

This should create a `/doodles` directory under your `/core/components` directory containing new `/schema` and `/src` folders, as well as a new file, `bootstrap.php`.

### The Schema

- Stay on the **Package Manager** tab
- Keep 'doodles' in the **Package Name** field
- Click the **Xml Schema** tab
- Add the following code:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="Doodles\Model\" baseClass="xPDO\Om\xPDOObject" platform="mysql" defaultEngine="InnoDB" version="3.0">
    <object class="Doodle" table="doodles" extends="xPDO\Om\xPDOSimpleObject">
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

- Click **Save Schema**

Your new schema file `doodles.mysql.schema.xml` should now be created in `/core/components/doodles/schema`. You can test it by clicking **Load Schema** in the **Xml Schema** tab.

Note that the fields 'published' and 'deleted' are required by the default getlist-processor of MIGXdb.

Of course you can create your own processors under your own processor-path.

[Read more about creating schemas](extending-modx/xpdo/custom-models/defining-a-schema "Defining a Schema")

### Parse Schema

- Click the **Parse Schema** tab
- Click **Parse Schema**

This will create xpdo-classes and maps from your new schema.

### Create Table(s)

- Click the **Create Tables** tab
- Click **Create Tables**

This will create your new table(s) in your database from your new schema.

## Create the Configuration

Now we want to create our configuration for the MIGXdb Custom Manager Page (CMP).

- Go to the main-tab **MIGX**
- There should be a grid with some buttons
- Click the **Add Item** button
- In the window that opens, we add the following:

### Settings

- **Name**: 'doodles'
    - this is the name of our configuration. Make sure to use unique configuration-names
- **"Add Item" Replacement**: 'Add new Doodle'
    - this is the text for our **Add Item** button
- **unique MIGX ID**: 'doodles'
    - Its a good idea to have a unique MIGX - id for all your MIGX-configs.

### CMP-Settings

- **Tab Caption**: 'Doodles'
- **Tab Description**: 'Manage your doodles here. You can edit them by either double-clicking on the grid or right-clicking on the respective row.'

### Columns

- Click the **Select db-fields** button
- Select the following fields:
    - id
    - name
    - description
    - published
- Click **Save and Close**
- Right-click and Edit each field as follows:
    - id
        - **Header**: 'ID'
    - name
        - **Header**: 'Name'
    - description
        - **Header**: 'Description'
    - published
        - **Header**: 'Published'
        - **Renderer**: 'this.renderClickCrossTick'
        - **on Click**: 'switchOption'
          
### Formtabs

- Click **Add Item** to add a new formtab
- **Caption**: 'Doodle'
- Click **Select db-fields**
- Select the following fields:
    - name
    - description
- Click **Save and Close**
- Right-click and Edit each field as follows:
    - name
        - **Caption**: 'Name'
    - description
        - **Caption**: 'Description'
        - **Input TV type**: 'textarea'

### MIGXdb-Settings

- **Classname**: 'Doodles\Model\Doodle'

### Db-Filters

- Click **Add item**
- **filter Name**: 'search'
- **Filter Type**: 'textbox'
- **getlist-where**:

``` json
{"name:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}
```

### Contextmenues

- check: **update** and **recall_remove_delete**

### Actionbuttons

- check: **addItem**

## Create a menu item for your CMP

- In the MODX menu, click the **Tools (gear icon)**
- Click **Menus**
- Click **Create**
- Enter values:
    - **Parent**: choose where you want the menu item to appear
    - **Lexicon-key**: 'Doodles' (or what you'd like the menu item to be named if you're not using a Lexicon)
    - **Action**: 'index'
    - **Parameters**: `&configs=doodles` (note: 'doodles' here refers to the 'name' field of your MIGXdb config as opposed to the 'unique MIGX ID')
    - **Namespace**: 'migx'
- Click **Save** button
  
## Done

Refresh the manager page

Go to the area of the menu where you created your 'doodles' menu item and click it

There it is, your new 'doodles' manager!
