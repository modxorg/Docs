---
title: "directory"
_old_id: "990"
_old_uri: "revo/sekusergalleries/sekusergalleries.directory"
---

## What is directory?

This snippet displays the the amount of space is used and how much space is available for the user to use.

## Usage

Example for directory:

``` php
[[!directory]]
```

You can also specify the templates:

``` php
[[!directory? &tplDirContainer=`directory.container` &tplDirGraph=`directory.bargraph`]]
```

See the snippet properties for more options.

## Properties

| Name            | Description                                                                                                                                                                                                                       | Default                     | Version |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplDirContainer | The container to use to hold the bar graph.                                                                                                                                                                                       | directory.container         | >0.0.1  |
| tplDirGraph     | The bar graph showing stats.                                                                                                                                                                                                      | directory.bargraph          | >0.0.1  |
| loadjquery      | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss       | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |                             | >0.0.3  |
| graphcss        | Like customcss, this will load the css file that defines the bar graph appearance.                                                                                                                                                |                             | >0.0.3  |