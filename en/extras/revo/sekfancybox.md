---
title: "sekFancyBox"
_old_id: "703"
_old_uri: "revo/sekfancybox"
---

What is sekFancyBox?
--------------------

SekFancyBox is a port of fancyBox 2.0.4 ( it can be found on the [fancyBox](http://fancyapps.com/fancybox/) website). It was made to standardize the modal popups across a website quickly and easily.

### Requirements

- MODx Revolution 2.1.0-RC-2 or later
- PHP5 or later

While I have tested in Modx 2.1, this may work in older versions. SekFancy box is a simple program, it makes no calls to any database and has no manager pages to support.

### History

SekFancyBox was written by Stephen Smith, and first released on Feb 1st, 2012.

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/sekfancybox>.

### Development and Bug Reporting

SekFancyBox is on GitHub: <https://github.com/insomnix/sekFancyBox>, report any issues or feature requests here: <https://github.com/insomnix/sekFancyBox/issues>.

Watch for news about sekFancyBox at <http://www.seknetsolutions.com/modx-extras/sekfancybox>

Usage
-----

The sekFancyBox is called through a single snippet using the tag:

\[\[sekfancybox\]\]

There are several properties that must be set based on the type of modal window that is being called:

Available Properties
--------------------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Type   
</th><th>Default   
</th><th>Optional   
</th><th>Version   
</th></tr><tr><td>type</td><td>This defines what kind of window will open.   
Options: inline, iframe, document, media, jcode   
</td><td> </td><td>inline   
</td><td>yes   
</td><td> </td></tr><tr><td>link</td><td>If calling only one inline modal, this does not need to be set.   
If calling multiple inline modals on a single page, each call must have a unique one word name.   
If using in any other type, this must by the url of the item to view.   
</td><td> </td><td>sekfancybox</td><td>inline only   
</td><td> </td></tr><tr><td>linktext</td><td>Text to display as the link on the page.   
</td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>text</td><td>Text to display in the modal window.   
</td><td>inline only</td><td> </td><td> </td><td> </td></tr><tr><td>header</td><td>Heading that will appear in modal window above the text with <h3></h3> tag.   
</td><td>inline only</td><td> </td><td>yes   
</td><td> </td></tr><tr><td>modalwidth</td><td>Change the width of the modal window displayed on screen. (note, this property does not work well, in version 1.0.0 use the new property width)   
</td><td>inline only</td><td>400   
</td><td>yes</td><td> </td></tr><tr><td>title</td><td>Title displays below the modal window, useful for images. Default behavior can be changed using the helpers options.   
</td><td> </td><td> </td><td>yes   
</td><td> </td></tr><tr><td>modalclass</td><td>This changes the class name of the modal box. This must be used if using different options on multiple modals on a single page.   
(i.e. using thumbnailhelper for a group of images set to one class, and using buttonhelper on a group of images of another class.)   
It is good practice to assign a class to all modal windows to prevent future problems if another modal is added to the page.   
</td><td> </td><td>fancybox</td><td>yes   
</td><td> </td></tr><tr><td>group</td><td>Used to group images on a page together. This will create a modal slideshow.   
</td><td>media only   
</td><td> </td><td>yes   
</td><td> </td></tr><tr><td>mousewheel</td><td>Will allow the mousewheel to scroll through the images of a group. Set to 1 to use.   
</td><td>media only</td><td>0   
</td><td>yes</td><td> </td></tr><tr><td>buttonhelper</td><td>Adds buttons above the modal window to help navigate images in a group. Set to 1 to use.</td><td>media only</td><td>0   
</td><td>yes</td><td> </td></tr><tr><td>thumbnailhelper</td><td>Adds thumbnails below modal window of all the images of a group. Set to 1 to use.</td><td>media only</td><td>0   
</td><td>yes</td><td> </td></tr><tr><td>customjs</td><td>For advanced use, custom javascript can be made, place the url of the js in this property.   
For more information on how to customize fancyBox, check out their [website](http://fancyapps.com/fancybox/).   
</td><td> </td><td> </td><td>yes</td><td> </td></tr><tr><td>customcss</td><td>To customize the appearance of the modal window, supply the url of the css file to use.   
</td><td> </td><td> </td><td>yes</td><td> </td></tr><tr><td>custombuttonscss</td><td>To customize the appearance of the modal button helper, supply the url of the css file to use.</td><td> </td><td> </td><td>yes</td><td>1.0.0   
</td></tr><tr><td>customthumbnailcss</td><td>To customize the appearance of the modal thumbnail helper, supply the url of the css file to use.</td><td> </td><td> </td><td>yes</td><td>1.0.0   
</td></tr><tr><td>loadjquery</td><td>sekFancyBox comes with JQuery 1.7.1 min within the package and loads automatically. If other extras are used on the same page that load JQuery, errors can occur. To turn off the auto-load of JQuery, change this option to `0`. (Depending on the order in which extras are installed on a site, and whether the js loads in the head or the end of the page, will decide the order the js files load. If JQuery loads after the the fancybox js, errors can occur. If other extras permit, do not load JQuery through any extras, instead load it in the template and set the 'sekfancybox.load\_jquery' system setting to false.) If system setting 'sekfancybox.load\_jquery' is set to false, loadjquery can be set to `1` to load JQuery on that page.   
</td><td> </td><td>1   
</td><td>yes   
</td><td>0.0.2   
</td></tr><tr><td>padding</td><td>Space inside fancyBox around content. Can be set as array - \[top, right, bottom, left\].</td><td> </td><td>15   
</td><td>yes</td><td>1.0.0</td></tr><tr><td>margin</td><td>Minimum space between viewport and fancyBox. Can be set as array - \[top, right, bottom, left\]. Right and bottom margins are ignored if content dimensions exceeds viewport.</td><td> </td><td>20   
</td><td>yes</td><td>1.0.0</td></tr><tr><td>width</td><td>Default width for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'. Can be numeric or 'auto'.</td><td> </td><td>800</td><td>yes</td><td>1.0.0</td></tr><tr><td>height</td><td>Default height for 'iframe' and 'swf' content. Also for 'inline', 'ajax' and 'html' if 'autoSize' is set to 'false'. Can be numeric or 'auto'.</td><td> </td><td>600</td><td>yes</td><td>1.0.0</td></tr><tr><td>minWidth</td><td>Minimum width fancyBox should be allowed to resize to.</td><td> </td><td>100</td><td>yes</td><td>1.0.0</td></tr><tr><td>minHeight</td><td>Minimum height fancyBox should be allowed to resize to.</td><td> </td><td>100</td><td>yes</td><td>1.0.0</td></tr><tr><td>maxWidth</td><td>Maximum width fancyBox should be allowed to resize to.</td><td> </td><td>9999</td><td>yes</td><td>1.0.0</td></tr><tr><td>maxHeight</td><td>Maximum height fancyBox should be allowed to resize to.</td><td> </td><td>9999</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoSize</td><td>If true, then sets both autoHeight and autoWidth to true.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoHeight</td><td>If set to true, for 'inline', 'ajax' and 'html' type content width is auto determined. If no dimensions set this may give unexpected results.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoWidth</td><td>If set to true, for 'inline', 'ajax' and 'html' type content height is auto determined. If no dimensions set this may give unexpected results.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoResize</td><td>If set to true, the content will be resized after window resize event.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoCenter</td><td>If set to true, the content will always be centered.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>fitToView</td><td>If set to true, fancyBox is resized to fit inside viewport before opening.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>aspectRatio</td><td>If set to true, resizing is constrained by the original aspect ratio (images always keep ratio).</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>topRatio</td><td>Top space ratio for vertical centering. If set to 0.5, then vertical and bottom space will be equal. If 0 - fancyBox will be at the viewport top.</td><td> </td><td>0.5</td><td>yes</td><td>1.0.0</td></tr><tr><td>leftRatio</td><td>Left space ratio for horizontal centering. If set to 0.5, then left and right space will be equal. If 0 - fancyBox will be at the viewport left.</td><td> </td><td>0.5</td><td>yes</td><td>1.0.0</td></tr><tr><td>scrolling</td><td>Set the overflow CSS property to create or hide scrollbars. Can be set to 'auto', 'yes', 'no' or 'visible'.</td><td> </td><td>auto</td><td>yes</td><td>1.0.0</td></tr><tr><td>wrapCSS</td><td>Customizable CSS class for wrapping element (useful for custom styling).</td><td> </td><td> </td><td>yes</td><td>1.0.0</td></tr><tr><td>arrows</td><td>If set to true, navigation arrows will be displayed.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeBtn</td><td>If set to true, close button will be displayed.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeClick</td><td>If set to true, fancyBox will be closed when user clicks the content.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>nextClick</td><td>If set to true, will navigate to next gallery item when user clicks the content.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>mouseWheel</td><td>If set to true, you will be able to navigate gallery using the mouse wheel.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>autoPlay</td><td>If set to true, slideshow will start after opening the first gallery item.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>playSpeed</td><td>Slideshow speed in milliseconds.</td><td> </td><td>3000</td><td>yes</td><td>1.0.0</td></tr><tr><td>preload</td><td>Number of gallery images to preload.</td><td> </td><td>3</td><td>yes</td><td>1.0.0</td></tr><tr><td>modal</td><td>If set to true, will disable navigation and closing.</td><td> </td><td>false</td><td>yes</td><td>1.0.0</td></tr><tr><td>loop</td><td>If set to true, enables cyclic navigation. This means, if you click "next" after you reach the last element, first element will be displayed (and vice versa).</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>scrollOutside</td><td>If true, the script will try to avoid horizontal scrolling for iframes and html content.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>openEffect</td><td>Animation effect ('elastic', 'fade' or 'none') for each transition type.</td><td> </td><td>fade</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeEffect</td><td>Animation effect ('elastic', 'fade' or 'none') for each transition type.</td><td> </td><td>fade</td><td>yes</td><td>1.0.0</td></tr><tr><td>nextEffect</td><td>Animation effect ('elastic', 'fade' or 'none') for each transition type.</td><td> </td><td>elastic</td><td>yes</td><td>1.0.0</td></tr><tr><td>prevEffect</td><td>Animation effect ('elastic', 'fade' or 'none') for each transition type.</td><td> </td><td>elastic</td><td>yes</td><td>1.0.0</td></tr><tr><td>openSpeed</td><td>The time it takes (in ms, or "slow", "normal", "fast") to complete transition.</td><td> </td><td>250</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeSpeed</td><td>The time it takes (in ms, or "slow", "normal", "fast") to complete transition.</td><td> </td><td>250</td><td>yes</td><td>1.0.0</td></tr><tr><td>nextSpeed</td><td>The time it takes (in ms, or "slow", "normal", "fast") to complete transition.</td><td> </td><td>250</td><td>yes</td><td>1.0.0</td></tr><tr><td>prevSpeed</td><td>The time it takes (in ms, or "slow", "normal", "fast") to complete transition.</td><td> </td><td>250</td><td>yes</td><td>1.0.0</td></tr><tr><td>openOpacity</td><td>If set to true, transparency is changed for elastic transitions.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeOpacity</td><td>If set to true, transparency is changed for elastic transitions.</td><td> </td><td>true</td><td>yes</td><td>1.0.0</td></tr><tr><td>openMethod</td><td>Method that handles transition.   
</td><td> </td><td>zoomIn</td><td>yes</td><td>1.0.0</td></tr><tr><td>closeMethod</td><td>Method that handles transition.</td><td> </td><td>zoomOut</td><td>yes</td><td>1.0.0</td></tr><tr><td>nextMethod</td><td>Method that handles transition.</td><td> </td><td>changeIn</td><td>yes</td><td>1.0.0</td></tr><tr><td>prevMethod</td><td>Method that handles transition.</td><td> </td><td>changeOut</td><td>yes</td><td>1.0.0</td></tr><tr><td>helpers</td><td>Object containing enabled helpers and options for each of the, this accepts a json string.</td><td> </td><td> </td><td>yes</td><td>1.0.0</td></tr></tbody></table>#### Helpers Options

There are several options and sub options that can be set in the helpers properties.

```
<pre class="brush: php">
&helpers=`{
"title":{"type":"inside"},
"overlay":{"opacity": 0.8,"css":{"'background-color'": "#000"}},
"thumbs":{"width": 50,"height": 50},
}`

``````
<pre class="brush: php">
&helpers=`{
"title":"null",
"overlay":"null"
}`

```<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>title</td><td>Title group contains an array of values or return 'null'.</td><td> </td></tr><tr><td>title \[type\]</td><td>How the title will be displayed; 'float', 'inside', 'outside' or 'over'.</td><td>float</td></tr><tr><td>overlay</td><td>Overlay group contains an array of values or return. 'null'</td><td> </td></tr><tr><td>overlay \[closeClick\]</td><td>If true, fancyBox will be closed when user clicks on the overlay.</td><td>true</td></tr><tr><td>overlay \[speedOut\]</td><td>Duration of fadeOut animation.</td><td>200</td></tr><tr><td>overlay \[showEarly\]</td><td>Indicates if should be opened immediately or wait until the content is ready.</td><td>true</td></tr><tr><td>overlay \[css\]</td><td>Custom CSS properties.</td><td> </td></tr><tr><td>overlay \[locked\]</td><td>If true, the content will be locked into overlay.</td><td>true</td></tr><tr><td>overlay \[opacity\]</td><td>The opacity of the overlay   
</td><td>0.8</td></tr><tr><td>thumbs</td><td>Thumbs contains an array of values for the thumbnail helper options.</td><td> </td></tr><tr><td>thumbs \[width\]</td><td>Thumbnail width.   
</td><td>50</td></tr><tr><td>thumbs \[height\]</td><td>Thumbnail height   
</td><td>50</td></tr></tbody></table>Available Settings
------------------

<table><tbody><tr><th>Name   
</th><th>Description   
</th><th>Default   
</th><th>Version   
</th></tr><tr><td>sekfancybox.load\_jquery</td><td>This will enable or disable JQuery from being loaded when sekFancyBox is called on a page. If JQuery is being loaded from another extra used on the same pages as sekFancyBox, or it is loaded in a template, this setting should be set to No/False. The loadjquery option will override whatever this setting is set to.   
</td><td>Yes/True   
</td><td>0.0.2   
</td></tr><tr><td>sekfancybox.load\_jquery\_head</td><td>If set to YES, the jquery file in the addon will be loaded in the head of the page. If set to NO, jquery will load at the bottom of the page.</td><td>Yes/True</td><td>1.0.0   
</td></tr><tr><td>sekfancybox.custom\_css</td><td>If blank, use the css file that comes with sekFancyBox. Snippet property &customcss will always override this setting.</td><td> </td><td>1.0.0</td></tr><tr><td>sekfancybox.custom\_buttons\_css</td><td>If blank, use the css file that comes with sekFancyBox. Snippet property &custombuttonscss will always override this setting.</td><td> </td><td>1.0.0</td></tr><tr><td>sekfancybox.custom\_thumbs\_css</td><td>If blank, use the css file that comes with sekFancyBox. Snippet property &customthumbnailcss will always override this setting.</td><td> </td><td>1.0.0</td></tr></tbody></table>Loading JQuery Manually In Your Template
----------------------------------------

Make sure when loading jquery in a template, and setting sekFancyBox's load jquery option to false, that " type="text/javascript" " is defined in your script tag. If this is not done, sekFancyBox will not function correctly.

```
<pre class="brush: php">
<script type="text/javascript" src="assets/js/libs/jquery-1.8.3.min.js"></script>

```Examples
--------

Below are some basic examples.   
You can also view the [sekFancyBox & Gallery](/extras/revo/sekfancybox/sekfancybox-and-gallery "sekFancyBox & Gallery") example.

### Inline Type

Display inline is default behavior, and is easy to call with just two properties:

\[\[sekfancybox?   
 &linktext=`Text to display as a link`   
 &text=`Text that will display in the modal window.`   
\]\]

For multiple inline modal windows on a single page, the link property must be set to prevent clashing modal windows (remember that for the inline type this must not have any spaces):

\[\[sekfancybox?   
 &link=`modal-one`   
 &linktext=`Text 1 to display as link`   
 &text=`Text 1 that will display in the modal window.`   
\]\]

\[\[sekfancybox?   
 &link=`modal-two`   
 &linktext=`Text 2 to display as link`   
 &text=`Text 2 that will display in the modal window.`   
\]\]

This can become more complex by calling several options:

\[\[sekfancybox?   
 &link=`modal`   
 &linktext=`Text to display as link`   
 &title=`displays under modal`   
 &text=`Text that will display in the modal window.`   
 &modalwidth=`600`   
 &header=`Displays at top of modal window`   
\]\]

### Iframe Type

Define type as iframe to display another website within your own site, type of iframe must be used:

\[\[sekfancybox?   
 &type=`iframe`   
 &linktext=`SEKNet Solutions`   
 &link=`<http://www.seknetsolutions.com>`   
\]\]

If linking to an external website, it is recommended one defines a weblink resource, then call that weblink resource by the id ( &link=`\[\[~22\]\]` ).

### Document Type

Define type as document to display a file within your own site ( can be htm, or even txt file):

\[\[sekfancybox?   
 &type=`document`   
 &linktext=`link to document`   
 &link=`\[\[~19\]\]`   
\]\]

This is nice to display large amounts of formatted information without placing it inline on the current page. Use this for calling a resource with an empty template, or defining a "BlankTemplate" (defining a "BlankTemplate" would allow one to use tags like \[\[\*pagetitle\]\], where empty templates will only display the content itself).

If linking to a .txt file, it is recommended one defines a static resource, then call that static resource by the id.

### Media Type

Define type as media to display images or even flash:

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`<img src="thumbs/image.jpg" />`   
 &link=`images/image.jpg`   
\]\]

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`SWF File`   
 &link=`[http://www.adobe.com/jp/events/cs3\_web\_edition\_tour/swfs/perform.swf](http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf)`   
\]\]

If linking to an external website, it is recommended one defines a weblink resource, then call that weblink resource by the id ( &link=`\[\[~122\]\]` ).

### Media Type Groups

In the below example, the four photos are set up in two groups. Group1 is using the thumbnailhelper option, and group2 is using the buttonhelper option. The modalclass is used here because there are two groups using different options within each group. This will cause conflicts if both groups are using the same class.

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`<img src="thumbs/image1.jpg" />`   
 &link=`images/image1.jpg`   
 &modalclass=`class-thumb`   
 &thumbnailhelper=`1`   
 &group=`group1`   
\]\]

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`<img src="thumbs/image2.jpg" />`   
 &link=`images/image2.jpg`   
 &modalclass=`class-thumb`   
 &thumbnailhelper=`1`   
 &group=`group1`   
\]\]

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`<img src="thumbs/image3.jpg" />`   
 &link=`images/image3.jpg`   
 &modalclass=`class-button`   
 &buttonhelper=`1`   
 &group=`group2`   
\]\]

\[\[sekfancybox?   
 &type=`media`   
 &linktext=`<img src="thumbs/image4.jpg" />`   
 &link=`images/image4.jpg`   
 &modalclass=`class-button`   
 &buttonhelper=`1`   
 &group=`group2`   
\]\]