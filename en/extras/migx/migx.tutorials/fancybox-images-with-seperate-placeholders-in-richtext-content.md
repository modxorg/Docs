---
title: "MIGX.Fancybox-images with seperate placeholders in Richtext-Content"
_old_id: "924"
_old_uri: "revo/migx/migx.tutorials/migx.fancybox-images-with-seperate-placeholders-in-richtext-content"
---

##  Howto add Fancybox-images with seperate placeholders into Richtext-Content 

###  Requirements 

 First off, you'll want to go ahead and download and install some Extras that we'll be using for this Setup. The following is a list of used Extras:

- [MIGX](/extras/migx "MIGX") - For creating and fill the boxes in MODX-backend and for listing them on the frontend.
- [TinyMCE](/extras/evo/tinymce "TinyMCE") - Richtext-Editor to edit the content-texts.
- [phpThumbOf](/extras/phpthumbof "phpThumbOf") - For resizing the images to fit in our columns.

 You'll also download [fancybox](http://fancybox.net/home) and upload the subfolder '/fancybox/' of this package to your modx-installation to /assets/fancybox/

###  The Template 

 For this Tutorial we want to create a new Template. We name it 'fancybox'

``` html 

<html>
    <head>
        <title>[[++site_name]] - [[*pagetitle]]</title>
        <base href="[[++site_url]]" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="[[++base_url]]assets/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="[[++base_url]]assets/js/fancybox/jquery.easing-1.4.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("a.fancyimg").fancybox({
             'transitionIn' : 'elastic',
             'transitionOut' : 'elastic',
             'speedIn' : 600, 
                    'speedOut' : 200, 
                    'overlayShow' : false
                });

            });
        </script>
        <link rel="stylesheet" href="[[++base_url]]assets/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />        
    </head>
    <body>
        <div>
            [[getImageList? &tpl=`fancybox`&tvname=`fancyboxTv`&toSeparatePlaceholders=`img`]]
            <div id="content">[[*content]]</div>
            <div id="footer">[^q^] queries, querytime [^qt^], phptime [^p^], totaltime [^t^], source [^s^]</div>
        </div>
    </body>
</html>

```

###  The Input-Tvs 

 We need some Input-Tvs, which we want to use in our Backend-Forms later.

| name          | input-type | default-value | purpose                                                                                  |
| ------------- | ---------- | ------------- | ---------------------------------------------------------------------------------------- |
| imageTV       | image      |               | to choose our images by filemanager                                                      |
| placeholderTV | hidden     | img           | this is the placeholder-prefix, needed for rendering the correct placeholder in the grid |

 Give these TVs no Template Access. We need them only as input-types for our Forms. 

###  The MIGX-Tv 

 Now we are ready to create our MIGX-TV. Create a new TV.

####  General Information 

#####  Name 

 fancyboxTv

####  Input Options 

#####  Input-type 

 migx

#####  Form Tabs 

``` javascript 
[
{"caption":"Image", "fields": [
    {"field":"placeholder","caption":"Placeholder","inputTV":"placeholderTV"},
    {"field":"title","caption":"Title","description":"Title for the image."}, 
    {"field":"image","caption":"Image","inputTV":"imageTV"}

]}
]

```

#####  Grid Columns 

``` javascript 
[
{"header": "Placeholder", "width": "10", "sortable": "true", "dataIndex": "placeholder", "renderer": "this.renderPlaceholder"},
{"header": "Title", "width": "160", "sortable": "true", "dataIndex": "title"}, 
{"header": "Image", "width": "50", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"}
]

```

#####  Template Access 

 our fancybox - Template

###  The Chunk 

 Our last step is to create the chunk for our fancybox-images.

#####  Name 

 fancybox

#####  Chunk Code 

``` html 
<a href="[[+image]]" class="fancyimg">
<img src="[[+image:phpthumbof=`w=100&h=75&zc=1`]]" alt=""/>
</a>

```

##  **Add Fancybox-images with seperate placeholders into Richtext-Content**

 Now we are ready to create a resource and upload/choose images and add them to our Richtext-Content-Field.

 Create new Resource. Choose the fancybox - Template. Go to the tab 'Template Variables'.

 In your fancyboxTV, click 'Add Item'. Fill the fields for Image and Title.

 Add as many images as you want to add to your Content.

 Now write your content to your Richtext-Field and add placeholders like \[\[+img.0\]\] , \[\[+img.1\]\], \[\[+img.2\]\] to your Text.

 When you view the result on your frontpage you will see small image-thumbnails in your text, where you did add these placeholders.

 Click them and you will see nice fancyboxes with big images.

 Don't forget to save your Resource, when you are ready with adding/editing images with MIGX