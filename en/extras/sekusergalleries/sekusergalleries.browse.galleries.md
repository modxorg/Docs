---
title: "sekUserGalleries.browse.galleries"
_old_id: "989"
_old_uri: "revo/sekusergalleries/sekusergalleries.browse.galleries"
---

## What is browse.galleries?

List of the galleries on the site.

## Usage

Example for browse.galleries:

``` php 
[[!browse.galleries]]
```

You can also specify the templates:

``` php 
[[!users.gallery.view? &tplContainer=`browse.galleries.container` &tplRow=`browse.galleries.row`]]
```

See the snippet properties for more options.

## Properties

| Name | Description | Default | Version |
|------|-------------|---------|---------|
| tplContainer | The container to use to hold the gallery list. | browse.galleries.container | >0.0.1 |
| tplRow | The list of galleries displayed in the tplContainer. | browse.galleries.row | >0.0.1 |
| loadjquery | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting. | load\_jquery system setting | >0.0.3 |
| customcss | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |  | >0.0.3 |