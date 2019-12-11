---
title: "MIGX.sortable resourcelist"
_old_id: "1366"
_old_uri: "revo/migx/migx.tutorials/migx.sortable-resourcelist"
---

In this Tutorial we will learn how we can use MIGX to select a set of Resources from a given parent and sort the ouput-order.

## Requirements

First off we will need to install [MIGX](extras/migx "MIGX") by Package Management and do some [basic configurations](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").
Version required: 2.5.2 +

## Create the Resourceoptions - chunk

1. Create a new chunk

- name: `migx_resourceoptions`
- content:
  
``` php
[[migxLoopCollection?
    &classname=`modResource`
    &selectfields=`id,pagetitle`
    &where=`{"parent":"3"}`
    &toJsonPlaceholder=`json`
]]
[[+json]]
```

Change the parent to the ID where you want to get the resourcelist from

## Create the Configuration for the MIGX-TV

- Go to: Components->MIGX->Tab: MIGX
- Create a new Configuration with 'add item'
    - name: `migx_resourcelist`
- Click 'Done' to save the new Configuration
- right-click on the new configuration and select 'import/export'
- copy/paste this code into the textarea:

``` json
{
  "formtabs": [{
    "MIGX_id": 1,
    "caption": "main",
    "print_before_tabs": "0",
    "fields": [{
        "MIGX_id": 1,
        "field": "active",
        "caption": "Active",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "listbox",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "yes==1||no==0",
        "default": "0"
      },
      {
        "MIGX_id": 2,
        "field": "comment",
        "caption": "Comment",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "textarea",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "",
        "default": ""
      },
      {
        "MIGX_id": 3,
        "field": "pagetitle",
        "caption": "",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "hidden",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "",
        "default": ""
      },
      {
        "MIGX_id": 4,
        "field": "id",
        "caption": "",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "hidden",
        "configs": "",
        "sourceFrom": "config",
        "sources": "[]",
        "inputOptionValues": "",
        "default": ""
      }
    ]
  }],
  "contextmenus": "",
  "actionbuttons": "",
  "columnbuttons": "",
  "filters": "[]",
  "extended": {
    "migx_add": "",
    "formcaption": "",
    "update_win_title": "",
    "win_id": "migx_input_options",
    "maxRecords": "",
    "multiple_formtabs": "",
    "extrahandlers": "this.handleColumnSwitch",
    "packageName": "",
    "classname": "",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": 1,
    "check_resid": 1,
    "check_resid_TV": "",
    "join_alias": "",
    "getlistwhere": "",
    "joins": "",
    "cmpmaincaption": "",
    "cmptabcaption": "",
    "cmptabdescription": "",
    "cmptabcontroller": "",
    "winbuttons": "",
    "onsubmitsuccess": "",
    "submitparams": ""
  },
  "columns": [{
      "MIGX_id": 1,
      "header": "Pagetitle",
      "dataIndex": "pagetitle",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    },
    {
      "MIGX_id": 2,
      "header": "Active",
      "dataIndex": "active",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "this.renderSwitchStatusOptions",
      "clickaction": "switchOption",
      "selectorconfig": "",
      "renderoptions": [{
          "MIGX_id": 1,
          "name": "published",
          "value": 1,
          "clickaction": "",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/tick.png"
        },
        {
          "MIGX_id": 2,
          "name": "unpublished",
          "value": "0",
          "clickaction": "",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cross.png"
        }
      ]
    },
    {
      "MIGX_id": 3,
      "header": "Comment",
      "dataIndex": "comment",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    },
    {
      "MIGX_id": 4,
      "header": "",
      "dataIndex": "x",
      "width": "",
      "sortable": "false",
      "show_in_grid": "0",
      "renderer": "this.renderChunk",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    },
    {
      "MIGX_id": 5,
      "header": "ID",
      "dataIndex": "id",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderoptions": "[]"
    }
  ]
}
```

## Create the MIGX - TV

Create a new TV

- Tab: General Information
    - name: `migx_resourcelist`
- Tab: Input Options
    - Input Type: migx
    - Input Option Values: `@CHUNK migx_resourceoptions`
    - Configurations: `migx_resourcelist`
- Tab: Template Access
    - select the Template where you want to add this TV

## Select and sort Resources

Now you should be able to select Resources and sort them by drag/drop them to a new position. You can also add additional infos, like a comment.

## Get the Sorted and filtered Resourcelist at frontend

Add this snippet-tag to your template/resource-content:

``` php
[[getImageList?
  &tvname=`migx_input_options`
  &outputSeparator=`,`
  &tpl=`@CODE:[[+id]]`
  &where=`{"active:=":"1"}`
]]
```
