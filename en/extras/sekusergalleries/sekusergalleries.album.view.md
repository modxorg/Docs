---
title: "sekUserGalleries.album.view"
_old_id: "988"
_old_uri: "revo/sekusergalleries/sekusergalleries.album.view"
---

## What is album.view?

This snippet displays the selected album information and the album items.

## Usage

Example for album.view:

``` php
[[!album.view]]
```

You can also specify the templates:

``` php
[[!album.view? &tplAlbum=`album.view` &tplAlbumItems=`album.items.list`]]
```

See the snippet properties for more options.

## Properties

| Name            | Description                                                                                                                                                                                                                       | Default                     | Version |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplAlbum        | The container to use to hold the album information and the album items.                                                                                                                                                           | album.view                  | >0.0.1  |
| tplAlbumItems   | The list of album items to display in the tplAlbum template.                                                                                                                                                                      | album.items.list            | >0.0.1  |
| tplAltItems     | A list of alternate image links that are defined by the image sizes in the manager that is not the primary image.                                                                                                                 | album.items.alt             | >0.0.1  |
| tplPasswordForm | The template to display when a password is required to view the album.                                                                                                                                                            | album.password.form         | >0.0.1  |
| loadjquery      | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss       | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |                             | >0.0.3  |