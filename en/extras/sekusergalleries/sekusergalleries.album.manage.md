---
title: "sekUserGalleries.album.manage"
_old_id: "987"
_old_uri: "revo/sekusergalleries/sekusergalleries.album.manage"
---

## What is album.manage?

If the user is logged in and has permission to have a gallery, this will allow the user to add, edit, and remove an album.

## Usage

Example for album.manage:

``` php 
[[!album.manage]]
```

You can also specify the template:

``` php 
[[!album.manage? &tplFormAlbum=`album.form` &tplDeleteConfirmation=`album.delete`]]
```

See the snippet properties for more options.

## Properties

| Name | Description | Default | Version |
|------|-------------|---------|---------|
| tplFormAlbum | The form container to add, edit, and delete an album. | album.form | >0.0.1 |
| tplDeleteConfirmation | Delete confirmation form template. | album.delete | >0.0.1 |
| loadjquery | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting. | load\_jquery system setting | >0.0.3 |
| customcss | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |  | >0.0.3 |