---
title: "sekFancyBox & Gallery"
_old_id: "1679"
_old_uri: "revo/sekfancybox/sekfancybox-and-gallery"
---

## sekFancyBox & Gallery

This is just a simple example of how you might use sekFancyBox with the Gallery addon to create a nice modal window gallery with a slideshow.

### Requirements

- sekFancyBox, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository here: <http://modx.com/extras/package/sekfancybox>.
- Gallery, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/gallery>.
- getPage, which can be downloaded via [Package Management](http://rtfm.modx.com/display/revolution20/Package+Management), or from the MODx Extras Repository, here: <http://modx.com/extras/package/getpage>.

#### The Snippet Call

On the page you wish to display your gallery, place the snippet call using getPage. Don't forget the page.nav.

``` php
<ul class="pagination-nav">
[[!+page.nav]]
</ul>
[[!getPage?
    &elementClass=`modSnippet`
    &element=`Gallery`
    &totalVar=`gallery.total`
    &limit=`20`
    &album=`3`
    &containerTpl=`galContainer.custom`
    &thumbTpl=`galItemThumb.custom`
    &thumbWidth=`145`
    &thumbHeight=`145`
    &imageWidth=`700`
    &imageHeight=`500`
]]
<ul class="pagination-nav">
[[!+page.nav]]
</ul>
```

In order to make pagination work with Gallery, I had to add the below line to the getPage snippet. I placed it on line 41 as suggested by the helpful people in the forums [Revolution Gallery - how to add pagination](http://forums.modx.com/thread/37769/revolution-gallery---how-to-add-pagination).

``` php
$properties['start'] = $properties['offset'];
```

#### Chunk: galContainer.custom

Keeping it simple, the custom chunk is a simple unordered list with a class call to the css.

``` php
<ul class="image-container">
[[+thumbnails]]
</ul>
```

#### Chunk: galItemThumb.custom

The thumbnail chunk has the sekfancybox snippet call. Here I set the buttonhelper to 1, this gives me a little play button at the top of the screen so I can start a slideshow.

``` php
<li>
[[!sekfancybox?
    &type=`media`
    &mousewheel=`1`
    &buttonhelper=`1`
    &modalclass=`[[+cls]]`
    &group=`gal`
    &title=`[[+description]]`
    &linktext=`<img class="[[+imgCls]]" src="[[+thumbnail]]" alt="[[+name]]" [[+image_attributes]] />`
    &link=`[[+image]]`]]
</li>
```

#### The CSS

I am far from being a css master, but the css below is very handy for this gallery method.

``` css
/* gallery images */
ul.image-container{
    margin:0;
    padding:0;
}
ul.image-container li {
    list-style:none;
    display:inline-table;
    padding:10px;
}
ul.image-container li ul{
    margin:0;
    padding: 10px 0;
}
ul.image-container li ul li{
    display:block;
    text-align:center;
    width:180px;
    padding: 0;
}
ul.image-container li ul li h5{
    margin: 0 0 2px;
    font-size: 14px;
    text-decoration:underline;
    color: #063144;
}
ul.pagination-nav li{
    list-style:none;
    display:inline-table;
    padding:10px;
}
ul.pagination-nav li a.active{
    color:#000000;
}
```

There it is. It doesn't look like much here, but it works great.