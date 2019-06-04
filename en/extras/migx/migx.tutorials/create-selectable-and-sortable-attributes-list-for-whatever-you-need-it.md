---
title: "Creating Selectable and Sortable lists for MIGX"
_old_id: "1365"
_old_uri: "revo/migx/migx.tutorials/migx.create-selectable-and-sortable-attributes-list-for-whatever-you-need-it"
---

## Create selectable and sortable Attributes List for whatever you need it

 Lets say we have Resources, which are Products and each product can have different attributes and each attribut should have a title and a nice icon
 We want also have a place where we can add as many attributes as we like to our attributes-list and we want select from this attributes-list in our product-resources.
 Additional we want to be able to add some individual extra infos for each selected attribute and we want to have this list to be sortable by drag/drop.

 In this Tutorial we will learn how we can use MIGX to create an attributes-list-builder where we can select from on each resource.

## Requirements

 First off we will need to install [MIGX](extras/migx "MIGX") by Package Management and do some [basic configurations](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").
 Version required: 2.5.2 +

## Create the Attributes Builder

1. Create a new TV

- name: migx\_attributes\_builder
  - Input Type: migx
  - formtabs:
  
``` json
      [{
              "caption":"Attribute",
              "fields":[
                      {"field":"attribute",   "caption":"Attribute"},
                      {"field":"title", "caption":"Title"},
                      {"field":"icon", "caption":"Icon", "inputTVtype":"image"}
              ]
      }]
```

    - grid columns:

  ``` json
      [
              {"header": "Attribute", "width": "50", "sortable": "true", "dataIndex": "attribute"},
              {"header": "Title", "width": "50", "sortable": "true", "dataIndex": "title"},
              {"header": "Image", "width": "50", "sortable": "false", "dataIndex": "icon","renderer": "this.renderImage"}
      ]
  ```

- Create a new Template with this TV assigned to it
- Create a new Resource with this template
  - This Resource is used to Create all the Attributes for our TV

## Create the Attributes Selector - TV

- Create a new chunk
  - name: getAttributeOptions
  - content:

``` php
[getImageList?
  &tvname=`migx_attributes_builder`
  &docid=`90`
  &toJsonPlaceholder=`json`
]]
[[+json]]
```

- Change the Docid to our resource created above.
  
- Create a new TV
  - name: migx\_attributes
  - Input Type: migx
  - input option values: @CHUNK getAttributeOptions
  - configs: migx\_attributes
- Add this TV to template(s) where you want select from our attributes-list.
- Create a new MIGX Configuration (Components->MIGX->Tab: MIGX -> 'add item')
  - name: migx\_attributes
- Click 'Done' to save the new Configuration
- right-click on the new configuration and select 'import/export'
- copy/paste this code into the textarea:

  ``` json
  {
    "formtabs":[
      {
        "MIGX_id":1,
        "caption":"Attribute",
        "print_before_tabs":"0",
        "fields":[
          {
            "MIGX_id":4,
            "field":"active",
            "caption":"Active",
            "description":"",
            "description_is_code":"0",
            "inputTV":"",
            "inputTVtype":"listbox",
            "configs":"",
            "sourceFrom":"config",
            "sources":"[]",
            "inputOptionValues":"yes==1||no==0",
            "default":""
          },
          {
            "field":"attribute",
            "caption":"Attribute",
            "inputTVtype":"hidden",
            "MIGX_id":1
          },
          {
            "field":"title",
            "caption":"Title",
            "inputTVtype":"hidden",
            "MIGX_id":2
          },
          {
            "field":"icon",
            "caption":"Icon",
            "inputTVtype":"hidden",
            "MIGX_id":3
          },
          {
            "MIGX_id":5,
            "field":"comment",
            "caption":"Comment",
            "description":"",
            "description_is_code":"0",
            "inputTV":"",
            "inputTVtype":"textarea",
            "configs":"",
            "sourceFrom":"config",
            "sources":"[]",
            "inputOptionValues":"",
            "default":""
          }
        ]
      }
    ],
    "contextmenus":"",
    "actionbuttons":"",
    "columnbuttons":"",
    "filters":"[]",
    "extended":{
      "migx_add":"",
      "formcaption":"",
      "update_win_title":"",
      "win_id":"",
      "maxRecords":"",
      "multiple_formtabs":"",
      "extrahandlers":"this.handleColumnSwitch",
      "packageName":"",
      "classname":"",
      "task":"",
      "getlistsort":"",
      "getlistsortdir":"",
      "use_custom_prefix":"0",
      "prefix":"",
      "grid":"",
      "gridload_mode":1,
      "check_resid":1,
      "check_resid_TV":"",
      "join_alias":"",
      "has_jointable":"yes",
      "getlistwhere":"",
      "joins":"",
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
        "header":"Attribute",
        "dataIndex":"attribute",
        "MIGX_id":1
      },
      {
        "header":"Title",
        "dataIndex":"title",
        "MIGX_id":2
      },
      {
        "header":"Icon",
        "dataIndex":"icon",
        "renderer":"this.renderImage",
        "MIGX_id":3
      },
      {
        "MIGX_id":2,
        "header":"Active",
        "dataIndex":"active",
        "width":"",
        "sortable":"false",
        "show_in_grid":1,
        "renderer":"this.renderSwitchStatusOptions",
        "clickaction":"switchOption",
        "selectorconfig":"",
        "renderoptions":[
          {
            "MIGX_id":1,
            "name":"published",
            "value":1,
            "clickaction":"",
            "handler":"",
            "image":"assets\/components\/migx\/style\/images\/tick.png"
          },
          {
            "MIGX_id":2,
            "name":"unpublished",
            "value":"0",
            "clickaction":"",
            "handler":"",
            "image":"assets\/components\/migx\/style\/images\/cross.png"
          }
        ]
      }
    ]
  }
  ```

## Create some Attributes

 Go to edit the Attributes-Builder-Resource and add some Attributes

## Select Attributes on Resources

 Now you should be able to select Attributes and sort them by drag/drop to a new position. You can also add additional infos, like a individual comment.

## Get the selected attributes-list at frontend

 Add this snippet-tag to your template/resource-content:

``` php
<ul>
[[getImageList?
    &tvname=`migx_attributes`
    &where=`{"active":"1"}`
    &tpl=`@CODE:
      <li>
      <img src="[[+icon]]" alt="[[+title]]" title="[[+title]]" />
      <span>[[+title]]</span>
      [[+comment:nl2br]]
      </li> `
]]
</ul>
```
