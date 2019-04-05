---
title: "MIGXdb.Manage Events-Resources in a CMP with help of MIGXdb"
_old_id: "935"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.manage-events-resources-in-a-cmp-with-help-of-migxdb"
---

- [Manage Events-Resources in a CMP with help of MIGXdb](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-ManageEventsResourcesinaCMPwithhelpofMIGXdb)
- [Requirements](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-Requirements)
- [Create the Configuration](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-CreatetheConfiguration)
- [Create a parent-resource for our events.](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-Createaparentresourceforourevents.)
- [Create some event-TVs](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-CreatesomeeventTVs)
- [Create a Template for our events.](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-CreateaTemplateforourevents.)
- [Set the Template for our events.](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-SettheTemplateforourevents.)
- [Register the TVs for our processors (getlist,fields)](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-RegistertheTVsforourprocessors%28getlist%2Cfields%29)
- [dropdown-TV for our events-filter](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-dropdownTVforoureventsfilter)
- [snippet for our events-filter](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-snippetforoureventsfilter)
- [Filters](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-Filters)
  - [Dropdown Filter for filtering current,upcoming,expired events](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-DropdownFilterforfilteringcurrent%2Cupcoming%2Cexpiredevents)
  - [Textbox Filter for searching in some fields](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-TextboxFilterforsearchinginsomefields)
- [Hiding childs from tree](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-Hidingchildsfromtree)
- [Create a menu to your CMP](#MIGXdb.ManageEvents-ResourcesinaCMPwithhelpofMIGXdb-CreateamenutoyourCMP)



##  Manage Events-Resources in a CMP with help of MIGXdb 

 Often we have the problem with lots of Resources, in the Resource-Tree to be very confused at some point and we wish, we would have a better way to manage them in a paginated grid view.

 In this Tuorial we will learn how to create a CMP (custom manager page), 
 where you can manage events, which are child-resources of a resource-folder.

##  Requirements 

 First off we will need to install [MIGX](/extras/migx "MIGX") by package-management, if not allready done, and do some [basic configurations](/extras/migxdb/migxdb.configuration "MIGXdb.Configuration"). 
 Minimum Required version: MIGX 2.3.2 (10.09.2012)

 Download and install this package:

 [https://github.com/Bruno17/migxchildresources/tree...](https://github.com/Bruno17/migxchildresources/tree/master/packages)

 rename the folder core/components/migxchildresources/ to core/components/migxresourceevents/ 
[](https://github.com/Bruno17/migxchildresources/tree/master/packages)

## 

##  Create the Configuration 

 Now we want to create our configuration for the MIGXdb-TV.

 Go to the main-tab 'MIGX'

 There should be an grid with some buttons.

 We click 'Add item'

 In the opening window we add:

 Name: events - this is the name of our configuration. Make sure to use unique configuration-names. 
 "Add Item" Replacement: Add Event - this is the text on our 'Add Item' - Button 
 unique MIGX ID: events - Its a good idea to have a unique MIGX - id for all your MIGX-configs.

 Click 'Done'

 We should see a new created record in our grid. 
 We could edit this record and add grid-columns and tabs and other stuff by right-clicking and choose 'edit', but we want to go the faster way by just importing our example-configuration.

 Right-Click our record and choose 'Export/Import'

 Add this code into the one field 'Json' :

 ``` php 
{"formtabs":"[{\"MIGX_id\":\"1\",\"caption\":\"Event\",\"fields\":\"[{\\\"MIGX_id\\\":\\\"1\\\",\\\"field\\\":\\\"pagetitle\\\",\\\"caption\\\":\\\"Pagetitle\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"7\\\",\\\"field\\\":\\\"location\\\",\\\"caption\\\":\\\"Location\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"3\\\",\\\"field\\\":\\\"eventstart\\\",\\\"caption\\\":\\\"Start\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"date\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"4\\\",\\\"field\\\":\\\"eventend\\\",\\\"caption\\\":\\\"End\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"date\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"},{\\\"MIGX_id\\\":\\\"5\\\",\\\"field\\\":\\\"template\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"6\\\"},{\\\"MIGX_id\\\":\\\"2\\\",\\\"field\\\":\\\"parent\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"25\\\"},{\\\"MIGX_id\\\":\\\"6\\\",\\\"field\\\":\\\"context_key\\\",\\\"caption\\\":\\\"\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"hidden\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"web\\\"}]\"},{\"MIGX_id\":\"2\",\"caption\":\"Content\",\"fields\":\"[{\\\"MIGX_id\\\":\\\"1\\\",\\\"field\\\":\\\"content\\\",\\\"caption\\\":\\\"Content\\\",\\\"inputTV\\\":\\\"\\\",\\\"inputTVtype\\\":\\\"richtext\\\",\\\"configs\\\":\\\"\\\",\\\"sourceFrom\\\":\\\"config\\\",\\\"sources\\\":\\\"\\\",\\\"inputOptionValues\\\":\\\"\\\",\\\"default\\\":\\\"\\\"}]\"}]","contextmenus":"","actionbuttons":"addItem||toggletrash","columnbuttons":"update||publish||unpublish||recall_remove_delete","filters":"[{\"MIGX_id\":\"1\",\"name\":\"eventsfilter\",\"label\":\"eventsfilter\",\"emptytext\":\"-- Filter Events --\",\"type\":\"combobox\",\"getlistwhere\":\"[[migxFilterevents]]\",\"getcomboprocessor\":\"getTVcombo\",\"combotextfield\":\"eventsfiltercombo\",\"comboidfield\":\"\",\"comboparent\":\"\"}]","extended":{"migx_add":"Create Event","formcaption":"Event","win_id":"events","multiple_formtabs":"","packageName":"migxresourceevents","classname":"modResource","task":"","getlistsort":"","getlistsortdir":"","use_custom_prefix":"0","prefix":"","grid":"","gridload_mode":"1","check_resid":"1","check_resid_TV":"","join_alias":"","getlistwhere":"{\"parent\":\"25\"}","joins":"","cmpmaincaption":"Events","cmptabcaption":"Events","cmptabdescription":"Manage your events here","cmptabcontroller":""},"columns":"[{\"MIGX_id\":\"1\",\"header\":\"ID\",\"dataIndex\":\"id\",\"width\":\"10\",\"renderer\":\"\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"2\",\"header\":\"Pagetitle\",\"dataIndex\":\"pagetitle\",\"width\":\"30\",\"renderer\":\"this.renderRowActions\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"7\",\"header\":\"Location\",\"dataIndex\":\"location\",\"width\":\"20\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"5\",\"header\":\"Start\",\"dataIndex\":\"eventstart\",\"width\":\"20\",\"renderer\":\"this.renderDate\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"6\",\"header\":\"End\",\"dataIndex\":\"eventend\",\"width\":\"20\",\"renderer\":\"this.renderDate\",\"sortable\":\"true\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"4\",\"header\":\"Published\",\"dataIndex\":\"published\",\"width\":\"10\",\"renderer\":\"this.renderCrossTick\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"3\",\"header\":\"\",\"dataIndex\":\"deleted\",\"width\":\"\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"0\"}]"}

```

 click 'done'

 you can check what it has done by right-clicking the record and choose 'edit' and go thrue the tabs and its nested grids.

##  Create a parent-resource for our events. 

 Just create a new Resource, which will be the parent for all our event-resources.

 Don't forget to set the resource-id into the getlist-where in the MIGX-manager 
 tab: MIGXdb-settings 
 field where: ``` php 
{"parent":"XX"}
	
```



##  Create some event-TVs 

 Create two date-TVs with names: 'eventstart' and 'eventend' 
 Create a text-TV with name: 'location'

##  Create a Template for our events. 

 Create a template with some basic content and place at least this placeholders somewhere in this template:

 ``` php 
[[*eventstart]],[[*eventend]],[[*location]],[[*pagetitle]],[[*content]]

```

 don't forget to assign all this TVs to this template.

##  Set the Template for our events. 

 We want all our events have the template created above. So we need to set the template-value somehow. 
 This can be done by a hidden-field in our form. 
 To do so: 
 1. right-click our events - record in the MIGX-configurator-grid and click 'Edit' 
 2. open the tab 'formtabs' 
 3. right-click on 'Event' and click 'Edit' 
 4. right-click on 'template' and click 'Edit' 
 5. open the tab 'Input Options' and change the Default-Value to the template-ID, which our events-resources should have. 
 6. click done to save the values

 Do the same for parent (add the ID of the parent-resource created above into as default-value) and context\_key, if you need another one, than 'web'

 Close all windows with 'Done'

##  Register the TVs for our processors (getlist,fields) 

 We need to register TVs to include them in the getlist- and fields-processors. 
 Todo so we need a new config-file under /core/components/migx/configs/

 with the same name as our MIGX-configuration: events.config.inc.php (should allready be installed with the MIGX-package) 
 and this content:

**core/components/migxresourceevents/migxconfigs/events.config.inc.php** ``` php 
<?php
$this->customconfigs['includeTVs'] = 1;
$this->customconfigs['includeTVList'] = 'eventstart,eventend,location';

```

 All TVs you want to edit or you want to show in the grid needs to be in the includeTVList - customconfig 

##  dropdown-TV for our events-filter 

 Create a new TV:

 Name: eventsfiltercombo 
 Type: listbox 
 Input-option-values: 
 current||upcoming||expired

##  snippet for our events-filter 

 Create a snippet:

 Name: migxFilterevents 
 content:

 ``` php 
$now = strftime('%Y-%m-%d %H:%M:%S');
switch ($_REQUEST['eventsfilter']){
    case 'current':
        return 'tvFilter::eventstart<='.$now.',eventend>='.$now;
    break;    
    case 'upcoming':
        return 'tvFilter::eventstart>>'.$now;
    break;
    case 'expired':
        return 'tvFilter::eventend<<'.$now;
    break;
}
return '';

```

##  Filters 

 Go to MIGX-Management and open our configuration (events) 
 Open the TAB 'DB-Filters'

###  Dropdown Filter for filtering current,upcoming,expired events 

 with the configuration above we have allready created this filter

 filter Name: eventsfilter 
 label: eventsfilter 
 empty text: - filter events - 
 filter type: combobox 
 getlist-where:

 ``` php 
[[migxFilterevents]]

```

 getcombo processor: getTVcombo 
 getcombo textfield: eventsfiltercombo (this is used in our getTVcombo-processor to get the input-options of the TV 'eventsfiltercombo' for our filter-dropdown)

###  Textbox Filter for searching in some fields 

 you can add additional filters, for example this one:

 filter Name: search 
 label: search 
 empty text: search... 
 getlist-where:

 ``` php 
{"pagetitle:LIKE":"%[[+search]]%","OR:longtitle:LIKE":"%[[+search]]%","OR:content:LIKE":"%[[+search]]%"}

```

 Save them all with clicking 'Done' on all windows

 Now you should be able to filter the child-resources by searching and/or choosing current,upcoming,expired from dropdown

##  Hiding childs from tree 

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

##  Create a menu to your CMP 

 System -> Actions

 menu-tree: 
 Components->MIGX->right-click->Place Action here

 Lexicon-key: Events Manager 
 Action: migx-index 
 parameters &configs=events

 click 'save'

 Now we have created a very basic event-resources-management, which should allready work for basic requirements. 
 This can easy be extended to your needs.