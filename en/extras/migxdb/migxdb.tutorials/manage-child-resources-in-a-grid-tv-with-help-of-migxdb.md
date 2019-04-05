---
title: "MIGXdb.Manage Child-Resources in a grid-TV with help of MIGXdb"
_old_id: "934"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.manage-child-resources-in-a-grid-tv-with-help-of-migxdb"
---

- [Manage Child-Resources in a grid-TV with help of MIGXdb](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-ManageChildResourcesinagridTVwithhelpofMIGXdb)
- [Requirements](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-Requirements)
- [Create the Configuration](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-CreatetheConfiguration)
- [Set the Template for our children.](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-SettheTemplateforourchildren)
- [Create the MIGXdb - TV](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-CreatetheMIGXdbTV)
- [Creating and Editing child-Resources.](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-CreatingandEditingchildResources)
- [Adding some TVs to our form](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-AddingsomeTVstoourform)
  - [The MIGX-TV for some images](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-TheMIGXTVforsomeimages)
  - [Text-TV for a Price-field](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-TextTVforaPricefield)
  - [Multiselect-TV for choosing one or more Categories for our child-resource](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-MultiselectTVforchoosingoneormoreCategoriesforourchildresource)
  - [Adding the TVs to our Form](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-AddingtheTVstoourForm)
  - [Register the TVs for our processors (getlist,fields)](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-RegistertheTVsforourprocessors%28getlist%2Cfields%29)
- [Add a sortable price-column to the grid](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-Addasortablepricecolumntothegrid)
- [Adding Filters](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-AddingFilters)
  - [Textbox Filter for searching in some fields](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-TextboxFilterforsearchinginsomefields)
  - [Dropdown Filter for filtering by categories](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-DropdownFilterforfilteringbycategories)
- [Hiding children from tree](#MIGXdb.ManageChild-Resourcesinagrid-TVwithhelpofMIGXdb-Hidingchildrenfromtree)

##  Manage Child-Resources in a grid-TV with help of MIGXdb 

 Often we have the problem with lots of Resources in the Resource-Tree to be very confused at some point and we wish, we would have a better way to manage them in a paginated grid view.

 In this Tuorial we will learn how to create a TV which shows a grid of child-resources, 
 where you can add, delete, remove, edit, publish, unpublish, filter, bulk-update child-resources of the currently edited Resource (parent-folder)

 First we will create a basic Configuration where we can just add new Child-Resources and edit the pagetitle, longtitle and Content-field of our Children. 
 Later we want to add one or more TVs, which we want to have editable and we want to add some filters, where we can filter our children.

##  Requirements 

 First off we will need to install [MIGX](/extras/revo/migx "MIGX") by package-management, if not already done, and do some [basic configurations](/extras/revo/migxdb/migxdb.configuration "MIGXdb.Configuration"). 
 Minimum Required version: MIGX 2.2.3 (31.07.2012 
 We need also install the latest package of [migxchildresources](https://github.com/Bruno17/migxchildresources/tree/master/packages) from github

##  Import the Configuration 

 Now we want to import the example - configuration for the MIGXdb-TV.

 Go to the main-tab 'MIGX'

 There should be a grid with some buttons above.

 We click 'Import from package'

 In the opening window we type: 'migxchildresources'

 Click 'Ok'

 We should see a new imported record in our grid.

 You can check what it has done by right-clicking the record and choose 'edit' and go through the tabs and their nested grids.

##  Set the Templates for our parent and children 

 We want all our children have a given template. So we need to set the template-value somehow.

 Create the template for the Child resources to use - we'll need the ID of this template for the configuration.

 This can be done by a hidden-field in our form. 
 To do so: 
 1. right-click our childstutorial - record in the MIGX-configurator-grid and click 'Edit' 
 2. open the tab 'formtabs' 
 3. right-click on 'Resource' and click 'Edit' 
 4. right-click on 'template' and click 'Edit' 
 5. open the tab 'Input Options' and change the Default-Value to the template-ID, which our child-resources should have. 
 6. click done, done, done on all three windows to save the changes we made.

 Create another template for the Parent resource. This template will be the one used to hold the grid TV.

##  Create the MIGXdb - TV 

 now we create our MIGXdb - TV. 
 Create a new TV. 
 Name: childstutorial

 Go to the tab: 'Input Options'

 Select Input Type: 'migxdb' 
 Under 'Configurations' add: 'childstutorial'

 This says MIGX to search for configurations with name 'childstutorial' This can be configuration-records as we have done above or php-files as it is done for the MIGX-configs-CMP. The MIGX-config-CMP is itself nothing more than a MIGXdb-CMP.

 Assign this 'childstutorial' TV to our Parent resource's template.

 click 'Save' to save the newly created TV.

##  Creating and Editing child-Resources 

 Create a parent-Resource in the resource-tree using your Parent-resource-template.

 Go to the TV-tab. 
 By clicking 'Load grid' this should load our db-grid where we can add,edit,delete child-resources of our parent-Resource.

 Now we have created a very basic child-Resources-management, which should already work for minimal requirements.

 When using the grid in TV tab don't set the grid to "autoload" (in MIGXdb Settings tab in the MIGX configurator) because the grid will not render to full width, as explained here: <https://github.com/Bruno17/MIGX/issues/75#issuecomment-15505640> 

 Some of the next steps are allready done with the import of the configuration. They are left in this Tutorial to document, how it was done. 

## 

## Adding some TVs to our form 

 In this step we want to add three TVs to our form:

- MIGX-TV to add and manage some images to our child-resource
- Text-TV for a Price-field
- Multiselect-TV for choosing one or more Categories for our child-resource

###  The MIGX-TV for some images 

 Create a new TV: 
 Name: images 
 Type: migx 
 Formtabs:

 ``` php 

[
{"caption":"Image", "fields": [
    {"field":"title","caption":"Title","description":"Title for the image."},
    {"field":"image","caption":"Image","inputTVtype":"image"}
]}
]

```

 Grid Columns:

 ``` php 

[
{"header": "Title", "width": "160", "sortable": "true", "dataIndex": "title"},
{"header": "Image", "width": "50", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"}
]

```

 "Add Item" Replacement: Add Image

###  Text-TV for a Price-field 

 Name: price 
 Type: text

###  Multiselect-TV for choosing one or more Categories for our child-resource 

 Name: categories 
 Type: listbox multiple 
 Input-option-values: 
\---==||categoryA||categoryB||categoryC||categoryD

 Add this TVs to your child-resources-template, but not to your parent-resource-template! 

###  Adding the TVs to our Form 

 Go to the MIGX-Management-Component into the TAB 'MIGX' 
 -> right click to the record 'childstutorial' -> click 'edit' 
 -> go to 'Formtabs' 
 -> click 'Add Item' 
 caption: TVs 
 fields: -> Add three items

 fieldname: price 
 caption: Price

 fieldname: images 
 caption: Images 
 iputTV: images

 fieldname: categories 
 Caption: Categories 
 inputTV: categories

 to save them, click ->Done

###  Register the TVs for our processors (getlist,fields) 

 We need to register TVs to include them in the getlist- and fields-processors. 
 Todo so we need a new config-file under /core/components/migx/configs/

 with the same name as our MIGX-configuration: childstutorial.config.inc.php (should already be installed with the MIGX-package) 
 and this content:

 **/core/components/migx/configs/childstutorial.config.inc.php** ``` php 

<?php
$this->customconfigs['includeTVs'] = 1;
$this->customconfigs['includeTVList'] = 'price,images,categories';

```

 All TVs you want to edit or you want to show in the grid needs to be in the includeTVList - customconfig 

 Pay attention on how you name the TVs and fields, they should not contain any dots "." inside their names because that is used for extended fields and results in unexpected behavior with MIGXdb as explained here: <http://forums.modx.com/thread/83428/strange-issue-migxdb-childresources-tutorial-tvs-not-saved#dis-post-460312> Fieldnames and TV names should be the same.

 

##  Add a sortable price-column to the grid 

 Go to the TAB 'Columns' 
 -> click 'Add Item' 
 Header: Price 
 Field: price 
 width: 20 
 sortable: yes

 Now we should be able to update this TVs in our grids-editor-window.

##  Adding Filters 

 In this step we add some filters to our grid.

- Textbox-filter to search in pagetitle,longtitle and content
- dropdown-filter to filter by category

 Go to MIGX-Management and open our configuration (childstutorial) 
 Open the TAB 'DB-Filters' 
 Click 'Add Item' to add a new filter.

###  Textbox Filter for searching in some fields 

 filter Name: search 
 label: search 
 empty text: search... 
 getlist-where:

 ``` php 

{"pagetitle:LIKE":"%[[+search]]%","OR:longtitle:LIKE":"%[[+search]]%","OR:content:LIKE":"%[[+search]]%"}

```

###  Dropdown Filter for filtering by categories 

 filter Name: category 
 label: category 
 empty text: - category filter - 
 filter type: combobox 
 getlist-where:

 ``` php 

tvFilter::categories=inArray=[[+category]]

```

 getcombo processor: getTVcombo 
 getcombo textfield: categories (this is used in our getTVcombo-processor to get the input-options of the TV 'categories' for our filter-dropdown)

 Save them all with clicking 'Done' on all windows

 Now you should be able to filter the child-resources by searching and/or choosing a category

##  Hiding children from tree 

 Hiding our child-resources from resource-tree is very easy.

 go to the MIGX-Configurator and add a new field to one of the formtabs:

 Fieldname: show\_in\_tree 
 Caption: Show in Tree 
 inputTVtype: listbox

 inputOptionValues: no==0||yes==1

 You can also show the status of this field in the grid by adding a new column:

 Header: Show in Tree 
 Field: show\_in\_tree 
 width: 20 
 Renderer: this.RenderCrossTick