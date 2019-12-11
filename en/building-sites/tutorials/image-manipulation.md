---
title: "Image Manipulation"
_old_id: "347"
_old_uri: "2.x/case-studies-and-tutorials/quick-and-easy-modx-tutorials/automated-server-side-image-editing"
---

## Introduction

Don't want to wait ten seconds for Photoshop to load? Me neither. This tutorial will introduce you to the wonderful PHP script [phpthumbof](http://phpthumb.sourceforge.net/) ported to [MODX](/extras/phpthumbof "phpThumbOf") by Shaun McCormick.
[phpthumbof](/extras/phpthumbof "phpThumbOf") allows MODX to automatically generate thumbnails of a chosen width and height for us. Additionally, there are a billion other neat features to do basic image work that are at our disposal. Let's talk about a few of the most useful ones.

This tutorial assumes that you know how to create and call [template variables](building-sites/elements/template-variables "Template Variables"). Knowing about [output filters](building-sites/tag-syntax/output-filters "Input and Output Filters") is handy too, but we'll still get things working even if you don't know about them (they're good stuff, though).

Each of these examples will assume that you've created an image Template Variable called `big_image`, that it's applied to the current document, that you've filled in a valid image, and that you're ready to impress the pants off of your clients, friends, and families. Let's get started.

**Performance Hit**
If you are on a shared server, remember excessive image processing can affect other users. Your host may contact you and/or suspend your account if it causes problems. Reducing the picture size, even if not to the exact dimensions, will reduce the resource usage and processing time.

## Basic Usage (Resizing and Cropping)

The most obvious usage of phpthumbof is to generate thumbnails from larger images. No longer do you have to worry about your clients providing images that are too large -- bring on those 5MB 4800x3000 photos! Let's say you want to resize your 5MB photo into something that is 960 pixels wide and 300 tall. We call the phpthumbof snippet as an [output filter](building-sites/tag-syntax/output-filters "Input and Output Filters") and pass a width (w) of 960, and a height (h) of 300:

``` php
[[*big_image:phpthumbof=`w=960&h=300`]]
```

Awesome, our image is now the right size. Unfortunately, unless the image is the right aspect ratio, we might have some padding in one direction. If you'd prefer to crop off the longer dimension and make the image fit to the box, you can use the zoom crop (zc) parameter:

``` php
[[*big_image:phpthumbof=`w=960&h=300&zc=1`]]
```

Looking good!

## Remove backgrounds

Have a bunch of images with a white (or any colour) background that you want to make into a transparent png? Let's do it. We need to use one of phpthumb's filters, "stc". STC stands for "source transparent colour".

For our example, we will keep it at 960x300 and take out a white (#FFFFFF) background. We'll also convert it to a png to get in on that transparency action:

``` php
[[*big_image:phpthumbof=`w=960&h=300&fltr[]=stc|ffffff&f=png`]]
```

Nice work!

## Desaturating

We can do a bunch of other things using phpthumb's filters as well. Let's desaturate the image by 90%.

``` php
[[*big_image:phpthumbof=`w=960&h=300&fltr[]=sat|-90`]]
```

Cool!

## Colouring

Want to tint the image? We can do it! Let's tint it 30% with #ff00ff:

``` php
[[*big_image:phpthumbof=`w=960&h=300&fltr[]=clr|30|ff00ff`]]
```

You're great!

## Chaining

These are all cool and all, but we can do better. The cool thing about these effects is that they can be chained.

Let's completely desaturate the image, brighten it by 20%, and then tint it by 6% with #00ab86:

``` php
[[*big_image:phpthumbof=`w=960&h=300&fltr[]=gray&fltr[]=brit|20&fltr[]=clr|6|00ab86`]]
```

Them's some mighty fine chaining.

## More Reading

We've only really covered the tip of the iceberg. phpthumb has many other uses, [documented on phpthumb's website](http://phpthumb.sourceforge.net/). Go make cool things! Once you're feeling comfortable with the above, check the [phpthumb readme](http://phpthumb.sourceforge.net/demo/docs/phpthumb.readme.txt) and prepare to have your mind blown again. [Here](http://www.belafontecode.com/image-manipulation-with-phpthumbof-in-modx-revolution/) is another phpthumb tutorial written by
