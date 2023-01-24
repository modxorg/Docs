---
title: "Using resource-specific mediasource and multifile-uploader with MIGX"
_old_id: "928"
_old_uri: "revo/migx/migx.tutorials/migx.use-resource-specific-mediasource-and-multifile-uploader"
---

## Use resource-specific media source and multifile-uploader

In this Tutorial we will learn how we can have a dynamic media source, with its own auto-created file-folder for each resource.
For uploading multiple files at once, we will use MODX's multiupload - dialog.
All uploaded files will be auto-added as items to the MIGX - grid.
Removing Items will remove the image-file.

## Requirements

First off we will need to install [MIGX](extras/migx "MIGX") by Package Management.

## Create the dynamic resource-specific media source

- Go to: Tools->Media Sources
- Create new media source
    - name: ResourceMediaPath
    - source type: Filesystem
- Update this media source
    - basepath and baseurl:
  
``` php
[[migxResourceMediaPath?
    &pathTpl=`assets/resourceimages/{id}/`
    &createFolder=`1`
]]
```

You may also need to create a directory with write-permissions for php: assets/resourceimages/

## Create the MIGX - TV

Create a new TV

- Tab: General Information
    - name: resourcealbum
- Tab: Input Options
    - Input Type: migx
    - Configurations: resourcealbum
- Tab: Template Access
    - select your Template for your album-resources
- Tab: Media Sources
    - select the ResourceMediaPath - media source for your context (web by default)

## Create the Configuration for the MIGX-TV

- Go to: Components->MIGX->Tab: MIGX
- Create a new Configuration with 'add item'
    - name: resourcealbum
- Click 'Done' to save the new Configuration
- right-click on the new configuration and select 'import/export'
- copy/paste this code into the textarea:

``` json
{
  "formtabs": [{
    "MIGX_id": 71,
    "caption": "Image",
    "print_before_tabs": "0",
    "fields": [{
        "field": "title",
        "caption": "Title",
        "MIGX_id": 327,
        "pos": 1
      },
      {
        "MIGX_id": 329,
        "field": "description",
        "caption": "Description",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "",
        "validation": "",
        "configs": "",
        "restrictive_condition": "",
        "display": "",
        "sourceFrom": "config",
        "sources": "",
        "inputOptionValues": "",
        "default": "test",
        "useDefaultIfEmpty": "0",
        "pos": 2
      },
      {
        "MIGX_id": 425,
        "field": "image",
        "caption": "Image",
        "description": "",
        "description_is_code": "0",
        "inputTV": "",
        "inputTVtype": "image",
        "validation": "",
        "configs": "",
        "restrictive_condition": "",
        "display": "none",
        "sourceFrom": "migx",
        "sources": "",
        "inputOptionValues": "",
        "default": "",
        "useDefaultIfEmpty": "0",
        "pos": 4
      }
    ],
    "pos": 1
  }],
  "contextmenus": "edit_migx||duplicate_migx||remove_migx_and_image||movetotop_migx||movetotop_bottom",
  "actionbuttons": "loadfromsource||uploadfiles",
  "columnbuttons": "",
  "filters": "",
  "extended": {
    "migx_add": "Add Image",
    "disable_add_item": 1,
    "add_items_directly": "",
    "formcaption": "Image",
    "update_win_title": "",
    "win_id": "resourcegallery",
    "maxRecords": "",
    "addNewItemAt": "bottom",
    "multiple_formtabs": "",
    "multiple_formtabs_label": "",
    "multiple_formtabs_field": "",
    "multiple_formtabs_optionstext": "",
    "multiple_formtabs_optionsvalue": "",
    "actionbuttonsperrow": 4,
    "winbuttonslist": "",
    "extrahandlers": "this.handleColumnSwitch",
    "filtersperrow": 4,
    "packageName": "",
    "classname": "",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "sortconfig": "",
    "gridpagesize": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": 1,
    "check_resid": 1,
    "check_resid_TV": "",
    "join_alias": "",
    "has_jointable": "yes",
    "getlistwhere": "",
    "joins": "",
    "hooksnippets": "",
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
      "header": "ID",
      "dataIndex": "MIGX_id",
      "width": 10,
      "renderer": "",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 2,
      "header": "Title",
      "dataIndex": "title",
      "width": 20,
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "",
      "clickaction": "",
      "selectorconfig": "",
      "renderchunktpl": "",
      "renderoptions": "",
      "editor": "this.textEditor"
    },
    {
      "MIGX_id": 3,
      "header": "Image",
      "dataIndex": "image",
      "width": 20,
      "renderer": "this.renderImage",
      "sortable": "false",
      "show_in_grid": 1
    },
    {
      "MIGX_id": 4,
      "header": "Published",
      "dataIndex": "published",
      "width": "",
      "sortable": "false",
      "show_in_grid": 1,
      "renderer": "this.renderSwitchStatusOptions",
      "clickaction": "switchOption",
      "selectorconfig": "",
      "renderchunktpl": "",
      "renderoptions": [{
          "MIGX_id": 1,
          "name": "published",
          "use_as_fallback": 1,
          "value": 1,
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_ticked.png"
        },
        {
          "MIGX_id": 2,
          "name": "published",
          "use_as_fallback": "",
          "value": 1,
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_ticked.png"
        },
        {
          "MIGX_id": 3,
          "name": "unpublished",
          "use_as_fallback": "",
          "value": "0",
          "clickaction": "switchOption",
          "handler": "",
          "image": "assets\/components\/migx\/style\/images\/cb_empty.png"
        }
      ],
      "editor": ""
    }
  ]
}
```

## Have Fun

Now you should be able to create Album-Resources, upload images with multifile-uploader and synchronize the MIGX-items with your files.
For listing them on Front-end use the getImageList - snippet like that:

``` php
[[getImageList?
  &tvname=`resourcealbum`
  &tpl=`@CODE:<h3>[[+title]]</h3><img src="[[+image]]" />`
  &where=`{"published":"1"}`
]]<br></br>
```

or if you have more complicated tpl or you are using phpthumbof at the image with a tpl-chunk

``` php
[[getImageList?
  &tvname=`resourcealbum`
  &tpl=`imageTpl`
  &where=`{"published":"1"}`
]]<br></br>
```
