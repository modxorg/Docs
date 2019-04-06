---
title: "RezImgCrop"
_old_id: "701"
_old_uri: "revo/rezimgcrop"
---

## What is RezImgCrop?

 RezImgCrop is a custom [Output Filter](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") for MODx Revolution that can reduce images, cut off and grayscale them.
 It is often while articles or news are being added on a site that images turn out different, in design accurate images very well look. This filter does not break a proportion of the image and creates a folder "rezcrop" in a image folder and saves images with a unique name, so that the system at repeated reversal could give already processed result even if a storage cache was cleared.

### Requirements

- MODx Revolution 2.2.x or later
- TV output Type: the Text

### History

 RezImgCrop was written by [valikras](http://modx.com/extras/author/valikras) and released on Jun 09, 2011.

### Download

 It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/rezimgcrop2>

### Attributes

- r - does decreases of the image,
- c - does cropping of the image,
- g - Color image conversion in a shade of gray,
   WxH - w = width, H = height (in pixels)

## UsageExamples

 Resize on width and cropping:

 ``` php
[[*tv.images:rezimgcrop=`r-150x,c-150x75`]]
```

 We do resize images, then cropping and a shade of gray:

 ``` php
[[*tv.images:rezimgcrop=`r-150x,c-150x75,g-`]]
```

 Resize min 150px:

 ``` php
[[*tv.images:rezimgcrop=`min-150`]]
```

 Resize min 150px, then cropping:

 ``` php
[[*tv.images:rezimgcrop=`min-150,c-150x150`]]
```

 Resize on width:

 ``` php
[[*tv.images:rezimgcrop=`r-150x`]]
```

 Resize on width:

 ``` php
[[*tv.images:rezimgcrop=`r-150x0`]]
```

 Resize on height:

 ``` php

[[*tv.images:rezimgcrop=`r-0x75`]]

```

 Resize on height:

 ``` php
[[*tv.images:rezimgcrop=`r-x75`]]
```

 If we specify two parameters of reduction of the image the image to decrease not proportionally, it is necessary to specify better width, then to apply crop.

 ``` php
[[*tv.images:rezimgcrop=`r-150x75`]]
```
