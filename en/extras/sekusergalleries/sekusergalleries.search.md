---
title: "search"
_old_id: "992"
_old_uri: "revo/sekusergalleries/sekusergalleries.search"
---

## What is search?

This snippet displays the selected album information and the album items.

## Usage

Example for search:

``` php
[[!search]]
```

You can also specify the templates:

``` php
[[!search? &tplContainer=`search.container` &tplAlbumList=`users.gallery.albumlist`]]
```

See the snippet properties for more options.

## Properties

| Name         | Description                                                                                                                                                                                                                       | Default                     | Version |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplContainer | The container to use to hold the search results.                                                                                                                                                                                  | search.container            | >0.0.1  |
| tplAlbumList | The list of albums to display in the tplContainer template.                                                                                                                                                                       | users.gallery.albumlist     | >0.0.1  |
| loadjquery   | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |                             | >0.0.3  |