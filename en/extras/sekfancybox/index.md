---
title: "sekFancyBox"
_old_id: "703"
_old_uri: "revo/sekfancybox"
---

## What is sekFancyBox?

SekFancyBox is a port of fancyBox 2.0.4 ( it can be found on the [fancyBox](http://fancyapps.com/fancybox/) website). It was made to standardize the modal popups across a website quickly and easily.

### Requirements

- MODX Revolution 2.1.0-RC-2 or later
- PHP5 or later

While I have tested in Modx 2.1, this may work in older versions. SekFancy box is a simple program, it makes no calls to any database and has no manager pages to support.

### History

SekFancyBox was written by Stephen Smith, and first released on Feb 1st, 2012.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](extending-modx/transport-packages "Package Management"), or from the MODX Extras Repository, here: <https://modx.com/extras/package/sekfancybox>.

### Development and Bug Reporting

SekFancyBox is on GitHub: <https://github.com/insomnix/sekFancyBox>, report any issues or feature requests here: <https://github.com/insomnix/sekFancyBox/issues>.

Watch for news about sekFancyBox at <http://www.seknetsolutions.com/modx-extras/sekfancybox>

## Usage

The sekFancyBox is called through a single snippet using the tag:

[[sekfancybox]]

There are several properties that must be set based on the type of modal window that is being called:

## Available Properties

| Name                                                                  | Description                                                                                                                                                    | Type        | Default     | Optional | Version |
| --------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------- | ----------- | -------- | ------- |
| type                                                                  | This defines what kind of window will open.                                                                                                                    |
| Options: inline, iframe, document, media, jcode                       |                                                                                                                                                                | inline      | yes         |          |
| link                                                                  | If calling only one inline modal, this does not need to be set.If calling multiple inline modals on a single page, each call must have a unique one word name. |
| If using in any other type, this must by the url of the item to view. |                                                                                                                                                                | sekfancybox | inline only |          |
| linktext                                                              | Text to display as the link on the page.                                                                                                                       |             |             |          |         |
| text                                                                  | Text to display in the modal window.                                                                                                                           | inline only |             |          |         |
| header                                                                | Heading that will appear in modal window above the text with `<h3></h3>` tag.                                                                                  | inline only |             | yes      |         |
| modalwidth                                                            | Change the width of the modal window displayed on screen. (note, this property does not work well, in version 1.0.0 use the new property width)                | inline only | 400         | yes      |         |
| title                                                                 | Title displays below the modal window, useful for images. Default behavior can be changed using the helpers options.                                           |             |             | yes      |         |
| modalclass                                                            | This changes the class name of the modal box. This must be used if using different options on multiple modals on a single page. (i.e. using thumbnailhelper for a group of images set to one class, and using buttonhelper on a group of images of another class.) It is good practice to assign a class to all modal windows to prevent future problems if another modal is added to the page. |  | fancybox | yes |  |
| group | Used to group images on a page together. This will create a modal slideshow. | media only |  | yes |  |
| mousewheel | Will allow the mousewheel to scroll through the images of a group. Set to 1 to use. | media only | 0 | yes |  |
| buttonhelper | Adds buttons above the modal window to help navigate images in a group. Set to 1 to use. | media only | 0 | yes |  |
| thumbnailhelper | Adds thumbnails below modal window of all the images of a group. Set to 1 to use. | media only | 0 | yes |  |
| customjs | For advanced use, custom javascript can be made, place the url of the js in this property. For more information on how to customize fancyBox, check out their [website](http://fancyapps.com/fancybox/). |  |  | yes |  |
| customcss | To customize the appearance of the modal window, supply the url of the css file to use. |  |  | yes |  |
| custombuttonscss | To customize the appearance of the modal button helper, supply the url of the css file to use. |  |  | yes | 1.0.0 |
| customthumbnailcss | To customize the appearance of the modal thumbnail helper, supply the url of the css file to use. |  |  | yes | 1.0.0 |
| loadjquery | sekFancyBox comes with JQuery 1.7.1 min within the package and loads automatically. If other extras are used on the same page that load JQuery, errors can occur. To turn off the auto-load of JQuery, change this option to `0`. (Depending on the order in which extras are installed on a site, and whether the js loads in the head or the end of the page, will decide the order the js files load. If JQuery loads after the the fancybox js, errors can occur. If other extras permit, do not load JQuery through any extras, instead load it in the template and set the 'sekfancybox.load\_jquery' system setting to false.) If system setting 'sekfancybox.load\_jquery' is set to false, loadjquery can be set to `1` to load JQuery on that page. |  | 1 | yes | 0.0.2 |
| padding | Space inside fancyBox around content. Can be set as array - \[top, right, bottom, left\]. |  | 15 | yes | 1.0.0 |
| margin | Minimum space between viewport and fancyBox. Can be set as array - \[top, right, bottom, left\]. Right and bottom margins are ignored if content dimensions exceeds viewport. |  | 20 | yes | 1.0.0 |
| width | Default width for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'. Can be numeric or 'auto'. |  | 800 | yes | 1.0.0 |
| height | Default height for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'. Can be numeric or 'auto'. |  | 600 | yes | 1.0.0 |
| minWidth | Minimum width fancyBox should be allowed to resize to. |  | 100 | yes | 1.0.0 |
| minHeight | Minimum height fancyBox should be allowed to resize to. |  | 100 | yes | 1.0.0 |
| maxWidth | Maximum width fancyBox should be allowed to resize to. |  | 9999 | yes | 1.0.0 |
| maxHeight | Maximum height fancyBox should be allowed to resize to. |  | 9999 | yes | 1.0.0 |
| autoSize | If true, then sets both autoHeight and autoWidth to true. |  | true | yes | 1.0.0 |
| autoHeight | If set to true, for 'inline', 'ajax' and 'html' type content width is auto determined. If no dimensions set this may give unexpected results. |  | false | yes | 1.0.0 |
| autoWidth | If set to true, for 'inline', 'ajax' and 'html' type content height is auto determined. If no dimensions set this may give unexpected results. |  | false | yes | 1.0.0 |
| autoResize | If set to true, the content will be resized after window resize event. |  | true | yes | 1.0.0 |
| autoCenter | If set to true, the content will always be centered. |  | true | yes | 1.0.0 |
| fitToView | If set to true, fancyBox is resized to fit inside viewport before opening. |  | true | yes | 1.0.0 |
| aspectRatio | If set to true, resizing is constrained by the original aspect ratio (images always keep ratio). |  | false | yes | 1.0.0 |
| topRatio | Top space ratio for vertical centering. If set to 0.5, then vertical and bottom space will be equal. If 0 - fancyBox will be at the viewport top. |  | 0.5 | yes | 1.0.0 |
| leftRatio | Left space ratio for horizontal centering. If set to 0.5, then left and right space will be equal. If 0 - fancyBox will be at the viewport left. |  | 0.5 | yes | 1.0.0 |
| scrolling | Set the overflow CSS property to create or hide scrollbars. Can be set to 'auto', 'yes', 'no' or 'visible'. |  | auto | yes | 1.0.0 |
| wrapCSS | Customizable CSS class for wrapping element (useful for custom styling). |  |  | yes | 1.0.0 |
| arrows | If set to true, navigation arrows will be displayed. |  | true | yes | 1.0.0 |
| closeBtn | If set to true, close button will be displayed. |  | true | yes | 1.0.0 |
| closeClick | If set to true, fancyBox will be closed when user clicks the content. |  | false | yes | 1.0.0 |
| nextClick | If set to true, will navigate to next gallery item when user clicks the content. |  | false | yes | 1.0.0 |
| mouseWheel | If set to true, you will be able to navigate gallery using the mouse wheel. |  | true | yes | 1.0.0 |
| autoPlay | If set to true, slideshow will start after opening the first gallery item. |  | false | yes | 1.0.0 |
| playSpeed | Slideshow speed in milliseconds. |  | 3000 | yes | 1.0.0 |
| preload | Number of gallery images to preload. |  | 3 | yes | 1.0.0 |
| modal | If set to true, will disable navigation and closing. |  | false | yes | 1.0.0 |
| loop | If set to true, enables cyclic navigation. This means, if you click "next" after you reach the last element, first element will be displayed (and vice versa). |  | true | yes | 1.0.0 |
| scrollOutside | If true, the script will try to avoid horizontal scrolling for iframes and html content. |  | true | yes | 1.0.0 |
| openEffect | Animation effect ('elastic', 'fade' or 'none') for each transition type. |  | fade | yes | 1.0.0 |
| closeEffect | Animation effect ('elastic', 'fade' or 'none') for each transition type. |  | fade | yes | 1.0.0 |
| nextEffect | Animation effect ('elastic', 'fade' or 'none') for each transition type. |  | elastic | yes | 1.0.0 |
| prevEffect | Animation effect ('elastic', 'fade' or 'none') for each transition type. |  | elastic | yes | 1.0.0 |
| openSpeed | The time it takes (in ms, or "slow", "normal", "fast") to complete transition. |  | 250 | yes | 1.0.0 |
| closeSpeed | The time it takes (in ms, or "slow", "normal", "fast") to complete transition. |  | 250 | yes | 1.0.0 |
| nextSpeed | The time it takes (in ms, or "slow", "normal", "fast") to complete transition. |  | 250 | yes | 1.0.0 |
| prevSpeed | The time it takes (in ms, or "slow", "normal", "fast") to complete transition. |  | 250 | yes | 1.0.0 |
| openOpacity | If set to true, transparency is changed for elastic transitions. |  | true | yes | 1.0.0 |
| closeOpacity | If set to true, transparency is changed for elastic transitions. |  | true | yes | 1.0.0 |
| openMethod | Method that handles transition. |  | zoomIn | yes | 1.0.0 |
| closeMethod | Method that handles transition. |  | zoomOut | yes | 1.0.0 |
| nextMethod | Method that handles transition. |  | changeIn | yes | 1.0.0 |
| prevMethod | Method that handles transition. |  | changeOut | yes | 1.0.0 |
| helpers | Object containing enabled helpers and options for each of the, this accepts a json string. |  |  | yes | 1.0.0 |

### Helpers Options

There are several options and sub options that can be set in the helpers properties.

``` php
&helpers=`{
"title":{"type":"inside"},
"overlay":{"opacity": 0.8,"css":{"'background-color'": "#000"}},
"thumbs":{"width": 50,"height": 50},
}`
```

``` php
&helpers=`{
"title":"null",
"overlay":"null"
}`
```

| Name                   | Description                                                                   | Default |
| ---------------------- | ----------------------------------------------------------------------------- | ------- |
| title                  | Title group contains an array of values or return 'null'.                     |         |
| title \[type\]         | How the title will be displayed; 'float', 'inside', 'outside' or 'over'.      | float   |
| overlay                | Overlay group contains an array of values or return. 'null'                   |         |
| overlay \[closeClick\] | If true, fancyBox will be closed when user clicks on the overlay.             | true    |
| overlay \[speedOut\]   | Duration of fadeOut animation.                                                | 200     |
| overlay \[showEarly\]  | Indicates if should be opened immediately or wait until the content is ready. | true    |
| overlay \[css\]        | Custom CSS properties.                                                        |         |
| overlay \[locked\]     | If true, the content will be locked into overlay.                             | true    |
| overlay \[opacity\]    | The opacity of the overlay                                                    | 0.8     |
| thumbs                 | Thumbs contains an array of values for the thumbnail helper options.          |         |
| thumbs \[width\]       | Thumbnail width.                                                              | 50      |
| thumbs \[height\]      | Thumbnail height                                                              | 50      |

## Available Settings

| Name                             | Description                                                                                                                                                                                                                                                                                                                | Default  | Version |
| -------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------- | ------- |
| sekfancybox.load\_jquery         | This will enable or disable JQuery from being loaded when sekFancyBox is called on a page. If JQuery is being loaded from another extra used on the same pages as sekFancyBox, or it is loaded in a template, this setting should be set to No/False. The loadjquery option will override whatever this setting is set to. | Yes/True | 0.0.2   |
| sekfancybox.load\_jquery\_head   | If set to YES, the jquery file in the addon will be loaded in the head of the page. If set to NO, jquery will load at the bottom of the page.                                                                                                                                                                              | Yes/True | 1.0.0   |
| sekfancybox.custom\_css          | If blank, use the css file that comes with sekFancyBox. Snippet property &customcss will always override this setting.                                                                                                                                                                                                     |          | 1.0.0   |
| sekfancybox.custom\_buttons\_css | If blank, use the css file that comes with sekFancyBox. Snippet property &custombuttonscss will always override this setting.                                                                                                                                                                                              |          | 1.0.0   |
| sekfancybox.custom\_thumbs\_css  | If blank, use the css file that comes with sekFancyBox. Snippet property &customthumbnailcss will always override this setting.                                                                                                                                                                                            |          | 1.0.0   |

## Loading JQuery Manually In Your Template

Make sure when loading jquery in a template, and setting sekFancyBox's load jquery option to false, that " type="text/javascript" " is defined in your script tag. If this is not done, sekFancyBox will not function correctly.

``` html
<script type="text/javascript" src="assets/js/libs/jquery-1.8.3.min.js"></script>
```

## Examples

Below are some basic examples.
You can also view the [sekFancyBox & Gallery](extras/sekfancybox/sekfancybox-and-gallery "sekFancyBox & Gallery") example.

### Inline Type

Display inline is default behavior, and is easy to call with just two properties:

``` php
[[sekfancybox?
 &linktext=`Text to display as a link`
 &text=`Text that will display in the modal window.`
]]
```

For multiple inline modal windows on a single page, the link property must be set to prevent clashing modal windows (remember that for the inline type this must not have any spaces):

``` php
[[sekfancybox?
 &link=`modal-one`
 &linktext=`Text 1 to display as link`
 &text=`Text 1 that will display in the modal window.`
]]
```

``` php
[[sekfancybox?
 &link=`modal-two`
 &linktext=`Text 2 to display as link`
 &text=`Text 2 that will display in the modal window.`
]]
```

This can become more complex by calling several options:

``` php
[[sekfancybox?
 &link=`modal`
 &linktext=`Text to display as link`
 &title=`displays under modal`
 &text=`Text that will display in the modal window.`
 &modalwidth=`600`
 &header=`Displays at top of modal window`
]]
```

### Iframe Type

Define type as iframe to display another website within your own site, type of iframe must be used:

``` php
[[sekfancybox?
 &type=`iframe`
 &linktext=`SEKNet Solutions`
 &link=`<http://www.seknetsolutions.com>`
]]
```

If linking to an external website, it is recommended one defines a weblink resource, then call that weblink resource by the id ( &link=`[[~22]]` ).

### Document Type

Define type as document to display a file within your own site ( can be htm, or even txt file):

``` php
[[sekfancybox?
 &type=`document`
 &linktext=`link to document`
 &link=`[[~19]]`
]]
```

This is nice to display large amounts of formatted information without placing it inline on the current page. Use this for calling a resource with an empty template, or defining a "BlankTemplate" (defining a "BlankTemplate" would allow one to use tags like [[\*pagetitle]], where empty templates will only display the content itself).

If linking to a .txt file, it is recommended one defines a static resource, then call that static resource by the id.

### Media Type

Define type as media to display images or even flash:

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image.jpg" />`
 &link=`images/image.jpg`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`SWF File`
 &link=`[http://www.adobe.com/jp/events/cs3\_web\_edition\_tour/swfs/perform.swf](http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf)`
]]
```

If linking to an external website, it is recommended one defines a weblink resource, then call that weblink resource by the id ( &link=`[[~122]]` ).

### Media Type Groups

In the below example, the four photos are set up in two groups. Group1 is using the thumbnailhelper option, and group2 is using the buttonhelper option. The modalclass is used here because there are two groups using different options within each group. This will cause conflicts if both groups are using the same class.

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image1.jpg" />`
 &link=`images/image1.jpg`
 &modalclass=`class-thumb`
 &thumbnailhelper=`1`
 &group=`group1`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image2.jpg" />`
 &link=`images/image2.jpg`
 &modalclass=`class-thumb`
 &thumbnailhelper=`1`
 &group=`group1`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image3.jpg" />`
 &link=`images/image3.jpg`
 &modalclass=`class-button`
 &buttonhelper=`1`
 &group=`group2`
]]
```

``` php
[[sekfancybox?
 &type=`media`
 &linktext=`<img src="thumbs/image4.jpg" />`
 &link=`images/image4.jpg`
 &modalclass=`class-button`
 &buttonhelper=`1`
 &group=`group2`
]]
```
