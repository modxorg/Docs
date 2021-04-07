---
title: "Cliche"
_old_id: "618"
_old_uri: "revo/cliche"
---

Cliche is an Image Gallery Component for MODX Revolution 2.2.

## Installation

-   Install the component via the Package Manager.
-   Reload the page
-   Select Cliche under Components main menu
-   Create an Album and upload some images
-   Use the Cliche snippet to display your Albums

## Features

-   Simple Image Management : The cmp focuses on simplicity
-   Multiple File Upload : Batch upload of images and/or zip upload are available for your convenience
-   Easy to template: You can use the html markup that you want (either in a tpl file or in a chunk via the manager) along with any CSS style that you need
-   Javascript Effect : Use any popular image effect with the library of your choice

### Before Public release

-   Cliche Thumbnail Template variable : An easy way to manage Post thumbnail for your resource
-   Gallerific Plugin
-   More complete documentation

## Usage

Use the Cliche Snippet to show your galleries as you want

Simply drop the following line in your document :

```php
[[Cliche]]
```

To show all albums list:

```php
[[Cliche?
    &view=`albums`
]]
```

To show a specific album:

```php
[[Cliche?
    &id=`your_album_id`
    &view=`album`
]]
```

To show a single image:

```php
[[Cliche?
    &id=`your_image_id`
    &view=`image`
]]
```

### Available Parameters

| Parameter                                                                      | Description                                                        | Default Value               |
| ------------------------------------------------------------------------------ | ------------------------------------------------------------------ | --------------------------- |
| thumbWidth                                                                     | Thumbnail width in pixels                                          | 120                         |
| thumbHeight                                                                    | Thumbnail height in pixels                                         | 120                         |
| wrapperTpl                                                                     | The wrapper html chunk, shared for all view                        | Albums : albumwrapper       |
| itemTpl                                                                        | Each item html chunk, shared for all view                          | Albums : albumcover         |
| plugin                                                                         | The plugin controller, a PHP file which handle the display options | default                     |
| columns                                                                        | The number of columns to show                                      | 3                           |
| columnBreak                                                                    | The HTML markup used to break columns with the default viewer      | `<br style="clear: both;">` |
| browse                                                                         | Used for Album list and album view.                                |
| Tell the script whether the thumbnail should link a page or directly the image | 1                                                                  |
| loadJquery                                                                     | Set 0 to avoid loading Jquery by Cliche.                           | 1                           |
| loadCss                                                                        | Set 1 to load custom css.                                          | 0                           |
| css                                                                            | Path and name to CSS file excluding .css extension.                |                             |

### Templates

By default, all chunks are filebased and are located in : "_core/components/cliche/controllers/web/plugins/**\[plugin\]**/\_\_\[chunkName\].tpl_"

However, you still can use any normal chunk if you want.
Cliche will search first for the chunk in the db and if it does not exist, the file in the plugin directory (as a \*.tpl file).
You can bypass the search in db to use only filebased chunks by using the parameter "_use_filebased_chunks_"

#### Default plugin

##### default/albumcover.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a title="[[+albumname]]" href="[[+url]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+albumname]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/albumcoverzoom.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+albumname]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+albumname]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/albumswrapper.tpl

```php
<div class="cliche" id="albums_list">
    [[+items]]
</div><!-- End #albums_list -->
```

##### default/albumwrapper.tpl

```php
<div class="cliche galleryid-[[+id]]" id="album-[[+id]]">
 [[+items]]
</div><!-- End #album-[[+id]] -->
```

##### default/image.tpl

```php
<div class="cliche">
    <div class="item">
        <a title="[[+name]]" class="zoom" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </div>
</div>
```

##### default/item.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+name]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/itemzoom.tpl

```php
<dl class="item">
    <dt class="album-icon">
        <a class="zoom" title="[[+name]]" href="[[+image]]">
            <img width="[[+width]]" height="[[+height]]" title="[[+name]]" alt="[[+description]]" class="attachment-thumbnail" src="[[+thumbnail]]"/>
        </a>
    </dt>
</dl><!-- End .item -->
```

##### default/script.tpl

```php
$("a.zoom").fancybox();
```

#### Gallerific plugin

##### galleriffic/item.tpl

```php
<li>
    <a class="thumb" name="leaf" href="[[+image]]" title="[[+name]]">
        <img src="[[+thumbnail]]" alt="Title #[[+id]]" />
    </a>
    <div class="caption">
        <div class="download">
            <a href="[[+image]]">Download Original</a>
        </div>
        <div class="image-title">[[+name]]</div>
        <div class="image-desc">[[+description]]</div>
    </div>
</li>
```

##### galleriffic/script.tpl

```javascript
jQuery(document).ready(function ($) {
    $("div.navigation").css({ width: "220px", float: "left" });
    $("div.content").css("display", "block");

    // Initially set opacity on thumbs and add
    // additional styling for hover effect on thumbs
    var onMouseOutOpacity = 0.67;
    $("#thumbs ul.thumbs li").opacityrollover({
        mouseOutOpacity: onMouseOutOpacity,
        mouseOverOpacity: 1.0,
        fadeSpeed: "fast",
        exemptionSelector: ".selected",
    });

    // Initialize Advanced Galleriffic Gallery
    var gallery = $("#thumbs").galleriffic({
        delay: 2500,
        numThumbs: 15,
        preloadAhead: 10,
        enableTopPager: true,
        enableBottomPager: true,
        maxPagesToShow: 7,
        imageContainerSel: "#slideshow",
        controlsContainerSel: "#controls",
        captionContainerSel: "#caption",
        loadingContainerSel: "#loading",
        renderSSControls: true,
        renderNavControls: true,
        playLinkText: "Play Slideshow",
        pauseLinkText: "Pause Slideshow",
        prevLinkText: "&lsaquo; Previous Photo",
        nextLinkText: "Next Photo &rsaquo;",
        nextPageLinkText: "Next &rsaquo;",
        prevPageLinkText: "&lsaquo; Prev",
        enableHistory: false,
        autoStart: false,
        syncTransitions: true,
        defaultTransitionDuration: 900,
        onSlideChange: function (prevIndex, nextIndex) {
            // 'this' refers to the gallery, which is an extension of $('#thumbs')
            this.find("ul.thumbs")
                .children()
                .eq(prevIndex)
                .fadeTo("fast", onMouseOutOpacity)
                .end()
                .eq(nextIndex)
                .fadeTo("fast", 1.0);
        },
        onPageTransitionOut: function (callback) {
            this.fadeTo("fast", 0.0, callback);
        },
        onPageTransitionIn: function () {
            this.fadeTo("fast", 1.0);
        },
    });
});
```

##### galleriffic/wrapper.tpl

```php
 <div id="gallery" class="content">
    <div id="controls" class="controls"></div>
    <div class="slideshow-container">
        <div id="loading" class="loader"></div>
        <div id="slideshow" class="slideshow"></div>
    </div>
    <div id="caption" class="caption-container"></div>
</div>
<div id="thumbs" class="navigation">
    <ul class="thumbs noscript">
        [[+items]]
    </ul>
</div>
<div style="clear: both;"></div>
```

### Bugs and Issues

Cliche is developed on GitHub at this address: <https://github.com/argnist/Cliche>
The creator's old version: <https://github.com/lossendae/Cliche>
