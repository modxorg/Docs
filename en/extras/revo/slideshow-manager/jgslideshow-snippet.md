---
title: "jgSlideshow Snippet"
_old_id: "666"
_old_uri: "revo/slideshow-manager/jgslideshow-snippet"
---

<div>- [Available Properties](#jgSlideshowSnippet-AvailableProperties)
  - [Basics](#jgSlideshowSnippet-Basics)
  - [The Chunk properties](#jgSlideshowSnippet-TheChunkproperties)
  - [Placeholders available for Chunks](#jgSlideshowSnippet-PlaceholdersavailableforChunks)
- [Examples](#jgSlideshowSnippet-Examples)

</div>Snippet Usage - display the slideshow on your page

Basic use this code:

```
<pre class="brush: html"><div id="slideShow">
[[!jgSlideshow?
  &album_id=`1`
]]
</div>

```The album\_id is the id you see in the manager like this   
![](/download/attachments/37683278/album_id.png?version=1&modificationDate=1325708634000)

Available Properties
--------------------

Version 1.1

### Basics

<table id="TBL1376497247029"><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>loadJQuery   
</td> <td>On true it will load jQuery, if you already have jQuery loaded then set this to false (available from 1.1+)   
</td> <td>true   
</td> </tr><tr><td>toPlaceholder   
</td> <td>If set this will be the placeholder that the generated HTML will go to.   
</td> <td> </td> </tr><tr><td>skin</td> <td>The concept is that you can copy and rename all tpls with the prefix nivo and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property.</td> <td>nivo</td> </tr><tr><td>album\_id   
</td> <td>The id of the album you wish to show   
</td> <td>1</td> </tr><tr><td>slide\_div\_id</td> <td>The HTML id of the element that JS slideshow is attached to. It can be used the headTpl, see nivo\_headTpl for how it is used.   
</td> <td>slider   
</td></tr></tbody></table>### The Chunk properties

<div class="note">It is recommended to Duplicate the Chunk that you wish to change and rename it. Then you will not lose your changes when a new update is out. For organization it would be also recommend that you create a new folder to put your custom Chunks into.</div> <table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>headTpl</td> <td>This is the JS/CSS for the slideshow it goes in the and can use the results from looping</td> <td>nivo\_headTpl</td> </tr><tr><td>slideHolderTpl</td> <td>The holder for the slide panes</td> <td>nivo\_slideHolder</td> </tr><tr><td>htmlCaptionTpl   
</td> <td>HTML Caption Option</td> <td>nivo\_htmlCaptionTpl</td> </tr><tr><td>slideLinkTpl   
</td> <td>A slide pane wrapped in an anchor   
</td> <td>nivo\_slideLinkTpl</td> </tr><tr><td>slidePaneTpl   
</td> <td>The actual pane or image</td> <td>nivo\_slidePaneTpl</td></tr></tbody></table>### Placeholders available for Chunks

<table><tbody><tr><th>Tpls that use them</th> <th>Name</th> <th>Description</th> </tr><tr><td>all Chunks   
</td> <td>  
</td> <td> </td> </tr><tr><td> </td> <td>slide\_div\_id   
</td> <td>The HTML id of the element that JS slideshow is attached to.</td> </tr><tr><td> </td> <td>count   
</td> <td>the total number of slides   
</td> </tr><tr><td>only headTpl</td> <td> </td> <td> </td> </tr><tr><td> </td> <td>id</td> <td>the album id</td> </tr><tr><td> </td> <td>title</td> <td>the album title</td> </tr><tr><td> </td> <td>description</td> <td>the album description</td> </tr><tr><td> </td> <td>file\_allowed</td> <td>the allowed file types for the album</td> </tr><tr><td> </td> <td>file\_size\_limit</td> <td>the max allowed file size limit for the album</td> </tr><tr><td> </td> <td>file\_width</td> <td>the width of the slide show images</td> </tr><tr><td> </td> <td>file\_height</td> <td>the height of the slide show images</td> </tr><tr><td>slideHolderTpl,   
 htmlCaptionTpl,   
 slideLinkTpl,   
 slidePaneTpl   
</td> <td> </td> <td> </td> </tr><tr><td> </td> <td>src</td> <td>the full image URL</td> </tr><tr><td> </td> <td>id</td> <td>the slide id</td> </tr><tr><td> </td> <td>slideshow\_album\_id</td> <td>the album id</td> </tr><tr><td> </td> <td>url</td> <td>the url that can be assigned to a slide via the manager</td> </tr><tr><td> </td> <td>title</td> <td>the title of the slide assigned to a slide via the manager</td> </tr><tr><td> </td> <td>description</td> <td>assigned to a slide via the manager</td> </tr><tr><td> </td> <td>notes</td> <td>assigned to a slide via the manager</td> </tr><tr><td> </td> <td>html</td> <td>assigned to a slide via the manager</td> </tr><tr><td> </td> <td>options   
</td> <td>assigned to a slide via the manager</td> </tr><tr><td> </td> <td>upload\_time</td> <td>the time the image was uploaded</td> </tr><tr><td> </td> <td>file\_path</td> <td>just the image name, like image.jpg</td> </tr><tr><td> </td> <td>file\_type</td> <td>like jpg or png</td> </tr><tr><td> </td> <td>web\_user\_id</td> <td>the user the last updated this slide</td> </tr><tr><td> </td> <td>start\_date</td> <td>the date the slide went live</td> </tr><tr><td> </td> <td>end\_date</td> <td>the last date the slide will be shown</td> </tr><tr><td> </td> <td>edit\_time</td> <td>the last time the slide was edited</td> </tr><tr><td> </td> <td>sequence</td> <td>the order/sequence/rank of the slide</td> </tr><tr><td> </td> <td>slide\_status</td> <td>the status</td> </tr><tr><td> </td> <td>version</td> <td>how many times it has been edited</td></tr></tbody></table>Examples
--------

Multiple slideshows:

```
<pre class="brush: html"><div id="slider-wrapper">
 [[!jgSlideShow?
   &album_id=`1`
 ]]
</div>
<!-- Make sure you use a different ID for each instance: -->
<div id="slider-wrapper2">
 [[!jgSlideShow?
   &album_id=`8`
   &slide_div_id=`slider2`
 ]]
</div> 

```