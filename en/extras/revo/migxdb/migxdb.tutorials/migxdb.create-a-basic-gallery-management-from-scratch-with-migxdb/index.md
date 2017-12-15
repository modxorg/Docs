---
title: "MIGXdb.Create a basic gallery-management from scratch with MIGXdb"
_old_id: "932"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-a-basic-gallery-management-from-scratch-with-migxdb/"
---

<div>- [Creating a basic gallery-management from scratch with MIGXdb](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-CreatingabasicgallerymanagementfromscratchwithMIGXdb)
- [Requirements](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-Requirements)
- [Create a new Package and schema-file](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-CreateanewPackageandschemafile)
  - [The Schema](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-TheSchema)
  - [Parse Schema](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-ParseSchema)
  - [Create Table(s)](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-CreateTable%28s%29)
- [Create the Configuration](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-CreatetheConfiguration)
- [Create the MIGXdb - TV](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-CreatetheMIGXdbTV)
- [Adding extended fields](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-Addingextendedfields)
- [Making some galleries.](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-Makingsomegalleries.)
- [Adding a search-field to our grid](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-Addingasearchfieldtoourgrid)
- [Listing the Images on Frontend.](#MIGXdb.Createabasicgallery-managementfromscratchwithMIGXdb-ListingtheImagesonFrontend.)

</div> Creating a basic gallery-management from scratch with MIGXdb 
--------------------------------------------------------------

 In this Tutorial we will learn how to create your own gallery-management with help of MIGXdb.   
 First we will create a db-schema and its table(s).   
 Then we will create and configure a MIGXdb-TV to manage our images (db-records).   
 In the next step we will create some Resources (galleries) and add some images with our MIGXdb - TV.   
 At last we will show our images at frontend with a snippet.

 Requirements 
--------------

 First off we will need to install [MIGX](/extras/revo/migx "MIGX") by package-management and do some [basic configurations](/extras/revo/migxdb/migxdb.configuration "MIGXdb.Configuration").

 Create a new Package and schema-file 
--------------------------------------

 Go to Components->MIGX->Tab 'Package Manager'.

 Add a name for your new package into the field 'packageName:'. For our example we use 'mygallery'.

 Click 'Create Package' This should create a directory under your core-path with an empty schema-file in its correct place.

 Still having 'mygallery' in the field packageName, we want to fill the textarea-field 'schema'.

 Go to the tab 'xml scheme' and add this code:

###  The Schema 

 ```
<pre class="brush: xml"><?xml version="1.0" encoding="UTF-8"?>
<model package="mygallery" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" version="1.1">
        <object class="myGallery" table="migx_gallery" extends="xPDOSimpleObject" >
        <field key="title" dbtype="varchar" precision="255" phptype="string" null="false" default="" index="index" />
        <field key="description" dbtype="text" phptype="string" index="fulltext" />
        <field key="resource_id" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
        <field key="resource_ids" dbtype="text" phptype="string" null="false" default="" />
        <field key="image" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
        <field key="extended" dbtype="text" phptype="json" null="false" default="" />
        <field key="pos" dbtype="int" precision="10" phptype="integer" null="false" default="0" />        
        <field key="published" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="createdby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="createdon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="editedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="editedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="deleted" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="deletedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="deletedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
        <field key="publishedon" dbtype="datetime" phptype="datetime" null="true" />
        <field key="publishedby" dbtype="int" precision="10" phptype="integer" null="false" default="0" />
       
        <aggregate alias="Resource" class="modResource" local="resource_id" foreign="id" cardinality="one" owner="foreign" />
        <aggregate alias="Creator" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign" />
        </object>
</model>

``` by clicking 'Save Schema' we should have our schema-file created. You can test it by clicking 'Load Schema'.

 [Read more about creating schemas](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema "Defining a Schema")

###  Parse Schema 

 Create xpdo-classes and maps from schema by clicking 'Parse Schema' on the tab 'Parse Schema'.

###  Create Table(s) 

 Create tables from schema by clicking 'Create Tables' on the tab 'Create Tables'. This should create our table.

 At this time we have only one table in our schema defined.

 Create the Configuration 
--------------------------

 Now we want to create our configuration for the MIGXdb-TV.

 Go to the main-tab 'MIGX'

 There should be an empty grid with some buttons.

 We click 'Add item'

 In the opening window we add:

 Name: mygallery - this is the name of our configuration. Make sure to use unique configuration-names.   
 "Add Item" Replacement: Add Image - this is the text on our 'Add Item' - Button   
 unique MIGX ID: mygallery - Its a good idea to have a unique MIGX - id for all your MIGX-configs.

 Click 'Done'

 We should see a new created record in our grid.   
 We could edit this record and add grid-columns and tabs and other stuff by right-clicking and choose 'edit', but we want to go the quick way by just importing our example-configuration.

 Right-Click our record and choose 'Export/Import'

 Add this code into the one field 'Json' :

 <table border="0" cellpadding="5" cellspacing="0" class="sectionMacro" width="100%"><tbody><tr><td> </td> </tr></tbody></table>```
<pre class="brush: php">{
  "formtabs":[
    {
      "MIGX_id":6,
      "caption":"Image",
      "print_before_tabs":"0",
      "fields":[
        {
          "MIGX_id":14,
          "field":"title",
          "caption":"Title",
          "inputTV":"",
          "inputTVtype":"",
          "configs":"",
          "pos":1
        },
        {
          "MIGX_id":15,
          "field":"image",
          "caption":"Image",
          "description":"",
          "description_is_code":"0",
          "inputTV":"",
          "inputTVtype":"image",
          "validation":"",
          "configs":"",
          "restrictive_condition":"",
          "display":"",
          "sourceFrom":"config",
          "sources":"",
          "inputOptionValues":"",
          "default":"",
          "useDefaultIfEmpty":"0",
          "pos":2
        },
        {
          "MIGX_id":16,
          "field":"pos",
          "caption":"Position",
          "inputTV":"",
          "inputTVtype":"",
          "configs":"",
          "pos":3
        }
      ],
      "pos":1
    },
    {
      "MIGX_id":7,
      "caption":"Description",
      "fields":[
        {
          "MIGX_id":17,
          "field":"description",
          "caption":"Description",
          "inputTV":"",
          "inputTVtype":"textarea",
          "configs":"",
          "pos":1
        }
      ],
      "pos":2
    }
  ],
  "contextmenus":"update||publish||unpublish||recall_remove_delete",
  "actionbuttons":"addItem||toggletrash",
  "columnbuttons":"",
  "filters":"",
  "extended":{
    "migx_add":"Add Image",
    "disable_add_item":"",
    "add_items_directly":"",
    "formcaption":"",
    "update_win_title":"",
    "win_id":"",
    "maxRecords":"",
    "addNewItemAt":"bottom",
    "media_source_id":"",
    "multiple_formtabs":"",
    "multiple_formtabs_label":"",
    "multiple_formtabs_field":"",
    "multiple_formtabs_optionstext":"",
    "multiple_formtabs_optionsvalue":"",
    "actionbuttonsperrow":1,
    "winbuttonslist":"",
    "extrahandlers":"",
    "filtersperrow":1,
    "packageName":"mygallery",
    "classname":"myGallery",
    "task":"",
    "getlistsort":"",
    "getlistsortdir":"",
    "sortconfig":"",
    "gridpagesize":"",
    "use_custom_prefix":"0",
    "prefix":"",
    "grid":"",
    "gridload_mode":1,
    "check_resid":1,
    "check_resid_TV":"",
    "join_alias":"Resource",
    "has_jointable":"no",
    "getlistwhere":"",
    "joins":"",
    "hooksnippets":"",
    "cmpmaincaption":"",
    "cmptabcaption":"",
    "cmptabdescription":"",
    "cmptabcontroller":"",
    "winbuttons":"",
    "onsubmitsuccess":"",
    "submitparams":""
  },
  "columns":[
    {
      "MIGX_id":1,
      "header":"ID",
      "dataIndex":"id",
      "renderer":"",
      "sortable":"false",
      "show_in_grid":1
    },
    {
      "MIGX_id":2,
      "header":"Title",
      "dataIndex":"title",
      "renderer":"",
      "sortable":true,
      "show_in_grid":1
    },
    {
      "MIGX_id":3,
      "header":"image",
      "dataIndex":"image",
      "renderer":"this.renderImage",
      "sortable":"false",
      "show_in_grid":1
    },
    {
      "MIGX_id":4,
      "header":"Published",
      "dataIndex":"published",
      "renderer":"this.renderCrossTick",
      "sortable":true,
      "show_in_grid":1
    },
    {
      "MIGX_id":5,
      "header":"Position",
      "dataIndex":"pos",
      "renderer":"",
      "sortable":true,
      "show_in_grid":1
    },
    {
      "MIGX_id":6,
      "header":"",
      "dataIndex":"deleted",
      "renderer":"",
      "sortable":"false",
      "show_in_grid":"0"
    }
  ],
  "category":""
}


``` Click 'done'.

 You can check what it has done by right-clicking the record and choosing 'edit' and go through the tabs and their nested grids.

 Create the MIGXdb - TV 
------------------------

 Create a new Template for our gallery-pages.

 Now we create our MIGXdb - TV.

 Create a new TV.

 Name: mygallery

 Go to the tab: 'Input Options'.

 Select the Input Type: migxdb

 Under 'Configurations' add: 'mygallery'.

 This tells MIGX to search for configurations with the name 'mygallery' This can be configuration-records as we have done above or php-files as it is done for the MIGX-configs-CMP. The MIGX-config-CMP is nothing else as a MIGXdb-CMP itself.

 Add this TV to our gallery-template.

 click 'Save' to save the new created TV.

 Adding extended fields 
------------------------

 We want to add a URL to each image. This is very easy, because we can use extended-fields to store additional fields in. We just need to create a new Input-field to our Form.

 Go to Components->MIGX. Right-click on our mygallery-config, choose 'Edit'.

 Go to the Tab 'Formtabs', and click 'Add Item'.

 caption: 'Extended Fields'

 on Fields click 'Add Item'.

 fieldname: extended.url   
 Caption: URL   
 inputTVtype: url

 Click done -> done -> done to close all windows and save the additions.

 Now we have created a new tab in our gallery-management-window with a new field to add a URL to our image.

 Making some galleries. 
------------------------

 Create a container resource in the resource-tree, 'Galleries', using your gallery-template.

 Create Resources under this folder using the same gallery-template.

 By clicking 'Load grid' this should load our db-grid where we can add,edit,delete records with images.

 The created records should be automatically connected to our resources by the db-field 'resource\_id' and we will see only the records connected to our resource in the grid.

 Adding a search-field to our grid 
-----------------------------------

 Go to Components->MIGX   
 right-click on our mygallery-config, choose 'Edit'.

 Tab 'db-filters'

 Click 'Add Item'

 filter name: search   
 filter type: textbox   
 getlist where:

 ```
<pre class="brush: php">{"title:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}

``` Click 'done' -> 'done'.

 Now we have added a nice search-field to our grid for filtering grid-items.

 Listing the Images on Frontend 
--------------------------------

 For listing your images on the Frontend you can use the included snippet 'migxLoopCollection'

 Some examples:

 ```
<pre class="brush: php">[[!migxLoopCollection?
&packageName=`mygallery`
&classname=`myGallery`
&sortConfig=`[{"sortby":"pos","sortdir":"ASC"}]`
&where=`{"resource_id":"[[*id]]","published":"1"}`
]]

``` creates a printed array of all published images which belong to the active resource.

 ```
<pre class="brush: php">[[!migxLoopCollection?
  &packageName=`mygallery`
  &classname=`myGallery`
  &sortConfig=`[{"sortby":"RAND()"}]`
  &where=`{"resource_id":"[[*id]]","published":"1"}`
  &tpl=`@CODE:<img src="[[+image]]" />`
]]

``` lists all images in random order.