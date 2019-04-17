---
title: "sekUserGalleries.users.gallery.view"
_old_id: "994"
_old_uri: "revo/sekusergalleries/sekusergalleries.users.gallery.view"
---

## What is users.gallery.view?

This snippet displays the albums for the selected user's gallery. Each user that has the correct permissions can create a single gallery. The gallery itself holds the albums, there is no limit on the number of albums that can be created. If no gallery is specified in the url when accessing this page, and a user is logged in and has permission to have a gallery, this will default to that user's gallery page.

## Usage

Example for users.gallery.view:

``` php
[[!users.gallery.view]]
```

You can also specify the templates:

``` php
[[!users.gallery.view? &tplGallery=`users.gallery.view` &tplAlbumList=`users.gallery.albumlist`]]
```

See the snippet properties for more options.

## Properties

| Name         | Description                                                                                                                                                                                                                       | Default                     | Version |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplGallery   | The container to use to hold the gallery information and the albums.                                                                                                                                                              | users.gallery.view          | >0.0.1  |
| tplAlbumList | The list of albums.                                                                                                                                                                                                               | users.gallery.albumlist     | >0.0.1  |
| loadjquery   | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |                             | >0.0.3  |