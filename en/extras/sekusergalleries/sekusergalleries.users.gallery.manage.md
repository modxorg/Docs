---
title: "sekUserGalleries.users.gallery.manage"
_old_id: "993"
_old_uri: "revo/sekusergalleries/sekusergalleries.users.gallery.manage"
---

## What is users.gallery.manage?

If the user is logged in and has permission to have a gallery, this will display the options the user has for their gallery. A title, description, and cover image.

## Usage

Example for users.gallery.manage:

``` php 
[[!users.gallery.manage]]
```

You can also specify the template:

``` php 
[[!users.gallery.manage? &tplFormGallery=`users.gallery.form`]]
```

See the snippet properties for more options.

## Properties

| Name | Description | Default | Version |
|------|-------------|---------|---------|
| tplFormGallery | The form container to edit the gallery settings. | users.gallery.form | >0.0.1 |
| loadjquery | This option will load the jquery version installed with sekUserGalleries. The value of 1 or 0 will override the sekusergalleries.load\_jquery system setting. | load\_jquery system setting | >0.0.3 |
| customcss | To use a css file other than what comes with sekUserGalleries, enter the path to the css file in relation to the modx assets folder (ie "sitefolder/assets/css/custom.css" should be entered like "&customcss=`css/custom.css`"). |  | >0.0.3 |