---
title: "sekUserGalleries.album.items.manage"
_old_id: "986"
_old_uri: "revo/sekusergalleries/sekusergalleries.album.items.manage"
---

## What is album.items.manage?

If the user is logged in and has permission to have a gallery, this will allow the user to add, edit, and remove items within an album.

## Usage

Example for album.items.manage:

``` php
[[!album.items.manage]]
```

You can also specify the template:

``` php
[[!album.items.manage? &tplItemsForm=`album.items.form`]]
```

See the snippet properties for more options.

## Properties

| Name         | Description                                                                                                                                                                                                                       | Default                     | Version |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplItemsForm | The form container to add, edit, and delete album items.                                                                                                                                                                          | album.items.form            | >0.0.1  |
| tplJsDisplay | Javascript code that displays the uploaded item information.                                                                                                                                                                      | album.items.js.display      | >0.0.1  |
| tplJsUpload  | Javascript code that displays the upload form for the album item.                                                                                                                                                                 | album.items.js.upload       | >0.0.1  |
| loadjquery   | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |                             | >0.0.3  |