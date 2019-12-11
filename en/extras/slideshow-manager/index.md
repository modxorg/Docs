---
title: "Slideshow Manager"
_old_id: "714"
_old_uri: "revo/slideshow-manager"
---

## What is Slideshow Manager?

Slideshow manager is a CMP (custom manager page) and snippet. The manager allows you to easily upload new slides and schedule them based on start date and end date. You can also just put slides in a TBD (to be determined). Slideshow Manager allows you to have as many slides shows, called albums, as you want on your site.

## History

Slideshow Manager was written by Josh Gulledge to be a robust slideshow manager for MODX, first release was in spring 2011.

### Demo

This is an example of the default created slideshow: [Joshua19Media.com](http://www.joshua19media.com/)

### Download

It can be downloaded from within the MODX Revolution manager via Package Management, or from the [MODX Extras Repository](http://modx.com/extras/package/slideshowmanager).

### Development and Bug Reporting

Slideshow Manager is on GitHub: <https://github.com/jgulledge19/Slideshowmanager>, report any issues or feature requests here: <https://github.com/jgulledge19/Slideshowmanager/issues>.

## Update

Update through the Package Manager in MODX. If the package manager does not see the update you can download the latest version as you would for a new package. If you went from a version previous to 1.1.0pl you may also need to run the `[[updateSlideshow]]` Snippet one time before you can manage the slides and albums.

## Install

Install via the package manager

### How to use

Basic, this will show the first album:

``` php
<div id="slider-wrapper">

 [[!jgSlideShow?
   &album_id=`1`
 ]]
</div>

```

## See Also

1. [jgSlideshow Snippet](extras/slideshow-manager/jgslideshow-snippet)
2. [Slideshow Manager CMP](extras/slideshow-manager/slideshow-manager-cmp)
