---
title: "Add resource-specific mediasource and multifile-uploader to the gallery"
_old_id: "1804"
_old_uri: "revo/migxdb/migxdb.tutorials/migxdb.create-a-basic-gallery-management-from-scratch-with-migxdb/add-resource-specific-mediasource-and-multifile-uploader-to-the-gallery"
---

## Create the dynamic resource-specific media source

- Go to: Media->Media Sources
- Create new media source
    - name: ResourceMediaPath
    - source type: Filesystem
- Update this media source
    - basepath and baseurl: `[[migxResourceMediaPath? &pathTpl=`assets/mygallery/{id}/` &createFolder=`1`]]`

You may also need to create a directory with write-permissions for php: assets/mygallery/

## Assign the media source to the image-field

1. Go to: Extras->MIGX
2. Edit your Config (right-click the config-item in the grid)
3. Go to the Tab 'Formtabs' -> Edit the Formtab 'Image' -> Edit the field 'Image'
    3.1. At the Tab 'Mediasources' add two new Items for the contexts 'web' and 'mgr' with the newly created mediasource-id

## Modify your tpl

Create a snippet with name 'addmediasourcepath' with this code:

``` php
$output = str_replace('./','',$input);
if ($mediasource = $modx->getObject('sources.modMediaSource',$options)){
    $output = $mediasource->prepareOutputUrl($output);
}
return '/' . $output;
```

In your tpl change the image-placeholder to something like that:

``` php
[[+image:addmediasourcepath=`3`]]
```

In case, you are using pthumb for image-resizing, to something like that:

``` php
[[+image:addmediasourcepath=`3`:pthumb=`w=500`]]
```

Change the mediasource - id, in the example above '3' to yours!

## Add Upload-Button

1. Go to: Extras->MIGX
2. Edit your Config (right-click the config-item in the grid)
3. At 'Mediasource ID' put the id of your mediasource
4. At Tab 'Actionbuttons' select 'uploadfiles\_db' and remove the selection 'addItem'
5. Save everything
