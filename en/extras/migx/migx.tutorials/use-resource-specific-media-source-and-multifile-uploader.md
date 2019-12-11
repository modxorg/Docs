---
title: "Using resource-specific mediasource and multifile-uploader with MIGX (Old Version)"
_old_id: "1367"
_old_uri: "revo/migx/migx.tutorials/migx.use-resource-specific-media-source-and-multifile-uploader"
---

## Use resource-specific media source and multifile-uploader

In this Tutorial we will learn how we can have a dynamic media source, with its own auto-created file-folder for each resource.
For uploading multiple files at once, we will use MIGX's multiupload - feature.
We will also be able to synchronize all migx items with files in that media source directory.

## Requirements

First off we will need to install [MIGX](extras/migx "MIGX") by Package Management and do some [basic configurations](extras/migxdb/migxdb.configuration "MIGXdb.Configuration").

## Create the dynamic resource-specific media source

- Go to: Tools->Media Sources
- Create new media sourc
    - name: ResourceMediaPath
    - source type: Filesystem
- Update this media source
    - basepath and baseurl: `[[migxResourceMediaPath? &pathTpl=`assets/resourceimages/{id}/`]]`
    - if you add the &createFolder=`1` property it will automatically create the {id} folder if it doesn't already exist.
- Add three new settings to the media source:
    - thumbX: 200
    - thumbY: 200
    - maxFiles: 20

You may need to create a directory with write-permissions for php: assets/resourceimages/

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
  "formtabs": "[{\"MIGX_id\":\"1\",\"caption\":\"Image\",\"fields\":[{\"field\":\"title\",\"caption\":\"Title\",\"MIGX_id\":1},{\"MIGX_id\":\"2\",\"field\":\"image\",\"caption\":\"Image\",\"inputTV\":\"\",\"inputTVtype\":\"image\",\"configs\":\"\",\"sourceFrom\":\"migx\",\"sources\":\"\",\"inputOptionValues\":\"\",\"default\":\"\"},{\"MIGX_id\":\"3\",\"field\":\"description\",\"caption\":\"Description\",\"inputTV\":\"\",\"inputTVtype\":\"\",\"configs\":\"\",\"sourceFrom\":\"config\",\"sources\":\"\",\"inputOptionValues\":\"\",\"default\":\"\"}]}]",
  "contextmenus": "",
  "actionbuttons": "upload||loadfromsource",
  "columnbuttons": "",
  "filters": "",
  "extended": {
    "migx_add": "Add Image",
    "formcaption": "Image",
    "win_id": "resourcegallery",
    "multiple_formtabs": "",
    "packageName": "",
    "classname": "",
    "task": "",
    "getlistsort": "",
    "getlistsortdir": "",
    "use_custom_prefix": "0",
    "prefix": "",
    "grid": "",
    "gridload_mode": "1",
    "check_resid": "1",
    "check_resid_TV": "",
    "join_alias": "",
    "getlistwhere": "",
    "joins": "",
    "cmpmaincaption": "",
    "cmptabcaption": "",
    "cmptabdescription": "",
    "cmptabcontroller": ""
  },
  "columns": "[{\"MIGX_id\":\"1\",\"header\":\"ID\",\"dataIndex\":\"MIGX_id\",\"width\":\"10\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"2\",\"header\":\"Title\",\"dataIndex\":\"title\",\"width\":\"20\",\"renderer\":\"\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"3\",\"header\":\"Image\",\"dataIndex\":\"image\",\"width\":\"20\",\"renderer\":\"this.renderImage\",\"sortable\":\"false\",\"show_in_grid\":\"1\"},{\"MIGX_id\":\"4\",\"header\":\"Deleted\",\"dataIndex\":\"deleted\",\"width\":\"10\",\"renderer\":\"this.renderCrossTick\",\"sortable\":\"false\",\"show_in_grid\":\"1\"}]"
}
```

## Have Fun

Now you should be able to create Album-Resources, upload images with multifile-uploader and synchronize the MIGX-items with your files.
For listing them on Front-end use the getImageList - snippet.
