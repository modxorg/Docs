---
title: "AjaxUpload"
description: "Dynamic files form upload via Ajax"
---

## What is AjaxUpload?

With this snippet an upload button for uploading multiple files with progress-bar is generated. Works well in FF3.6+, Safari4+, Chrome and falls back to hidden iframe based upload in other browsers, providing good user experience everywhere.

All uploaded images and generated thumbnails are given random filenames to avoid hotlinking uploaded not published fullsize images. Automatic thumbnail generation for uploaded jpeg, png and gif files. Other uploaded files will get a generic icon.

With two Formit hooks the upload queue could be pre filled from Formit field value and saved into Formit field value.

## Requirements

- MODX Revolution 2.8 or later
- PHP 7.2 or later

## History & Info

AjaxUpload was initially written in 2012 for MODX Evolution and is maintained and developed since then by [Thomas Jakobi](https://github.com/jako).

### Download

AjaxUpload can be downloaded from within the MODX Revolution manager via [Package Management](extending-modx/transport-packages "Package Management"), or from the MODX Extras Repository, available on <https://modx.com/extras/package/ajaxupload2>

### Documentation

The package documentation can be found at <https://jako.github.io/AjaxUpload/>

### Development & Bug Reporting

AjaxUpload is on GitHub to file bugs and get support at <https://github.com/Jako/AjaxUpload>
