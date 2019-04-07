---
title: "jgSlideshow Snippet"
_old_id: "666"
_old_uri: "revo/slideshow-manager/jgslideshow-snippet"
---

Snippet Usage - display the slideshow on your page

Basic use this code:

``` html
<div id="slideShow">
[[!jgSlideshow?
  &album_id=`1`
]]
</div>
```

The album\_id is the id you see in the manager like this 
![](/download/attachments/37683278/album_id.png?version=1&modificationDate=1325708634000)

## Available Properties

Version 1.1

### Basics

| Name           | Description                                                                                                                                                                                                                                                                                                                              | Default Value |
| -------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| loadJQuery     | On true it will load jQuery, if you already have jQuery loaded then set this to false (available from 1.1+)                                                                                                                                                                                                                              | true          |
| toPlaceholder  | If set this will be the placeholder that the generated HTML will go to.                                                                                                                                                                                                                                                                  |               |
| skin           | The concept is that you can copy and rename all tpls with the prefix nivo and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property. | nivo          |
| album\_id      | The id of the album you wish to show                                                                                                                                                                                                                                                                                                     | 1             |
| slide\_div\_id | The HTML id of the element that JS slideshow is attached to. It can be used the headTpl, see nivo\_headTpl for how it is used.                                                                                                                                                                                                           | slider        |

### The Chunk properties

It is recommended to Duplicate the Chunk that you wish to change and rename it. Then you will not lose your changes when a new update is out. For organization it would be also recommend that you create a new folder to put your custom Chunks into.

 | Name           | Description                                                                              | Default Value        |
 | -------------- | ---------------------------------------------------------------------------------------- | -------------------- |
 | headTpl        | This is the JS/CSS for the slideshow it goes in the and can use the results from looping | nivo\_headTpl        |
 | slideHolderTpl | The holder for the slide panes                                                           | nivo\_slideHolder    |
 | htmlCaptionTpl | HTML Caption Option                                                                      | nivo\_htmlCaptionTpl |
 | slideLinkTpl   | A slide pane wrapped in an anchor                                                        | nivo\_slideLinkTpl   |
 | slidePaneTpl   | The actual pane or image                                                                 | nivo\_slidePaneTpl   |

### Placeholders available for Chunks

| Tpls that use them | Name              | Description                                                  |
| ------------------ | ----------------- | ------------------------------------------------------------ |
| all Chunks         |                   |                                                              |
|                    | slide\_div\_id    | The HTML id of the element that JS slideshow is attached to. |
|                    | count             | the total number of slides                                   |
| only headTpl       |                   |                                                              |
|                    | id                | the album id                                                 |
|                    | title             | the album title                                              |
|                    | description       | the album description                                        |
|                    | file\_allowed     | the allowed file types for the album                         |
|                    | file\_size\_limit | the max allowed file size limit for the album                |
|                    | file\_width       | the width of the slide show images                           |
|                    | file\_height      | the height of the slide show images                          |
| slideHolderTpl,    |
 htmlCaptionTpl, 
 slideLinkTpl, 
 slidePaneTpl |  |  |
|  | src | the full image URL |
|  | id | the slide id |
|  | slideshow\_album\_id | the album id |
|  | url | the url that can be assigned to a slide via the manager |
|  | title | the title of the slide assigned to a slide via the manager |
|  | description | assigned to a slide via the manager |
|  | notes | assigned to a slide via the manager |
|  | html | assigned to a slide via the manager |
|  | options | assigned to a slide via the manager |
|  | upload\_time | the time the image was uploaded |
|  | file\_path | just the image name, like image.jpg |
|  | file\_type | like jpg or png |
|  | web\_user\_id | the user the last updated this slide |
|  | start\_date | the date the slide went live |
|  | end\_date | the last date the slide will be shown |
|  | edit\_time | the last time the slide was edited |
|  | sequence | the order/sequence/rank of the slide |
|  | slide\_status | the status |
|  | version | how many times it has been edited |

## Examples

Multiple slideshows:

``` html
<div id="slider-wrapper">
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