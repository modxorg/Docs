---
title: "Setting Up the GalleryItem TV"
_old_id: "884"
_old_uri: "revo/gallery/gallery.setting-up-the-galleryitem-tv"
---

## The GalleryItem Custom TV

Gallery comes packaged with custom input and output types for TVs in Revolution. This allows you to get some cool image placement in your Resources. You can crop, resize, rotate and do other functions on images with the TV:

![](/download/attachments/18677869/gallery-crop-ss.png?version=1&modificationDate=1279902856000)

## Setting up the TV

First off, you'll want to setup the TV itself. Go ahead and create a TV,

- Load the Create TV page, and give the TV a name
- Select the Input Type of 'galleryitem'
- Select the Output Type of 'galleryitem'
- Assign your TV to your template
- Save!

Then you should be able to see your custom TV on your Resources with the Templates you assigned the TV to!

## Using the TV

From there, just click 'Choose an Image' and select a Gallery Album from the left tree. Then select the photo you want to use. This will load the photo in full size in the photo editor. You can then resize the photo (and crop it), rotate it, and more.

Once you're done editing it, just place the TV's tags in your content. For example, if your TV was named 'photo', you would place this in your content:

``` php 
[[*photo]]
```

And Gallery will automatically render the image and place it!