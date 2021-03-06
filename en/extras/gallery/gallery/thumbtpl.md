---
title: "thumbTpl"
_old_id: "872"
_old_uri: "revo/gallery/gallery.gallery/gallery.gallery.thumbtpl"
---

## Gallery's thumbTpl Chunk

This is the Chunk displayed with the &thumbTpl property on the [Gallery](extras/gallery "Gallery") snippet.

## Default Value

``` php
<div class="[[+cls]]">
    <a href="[[+linkToImage:if=`[[+linkToImage]]`:is=`1`:then=`[[+image_absolute]]`:else=`[[~[[*id]]?
            &[[+imageGetParam]]=`[[+id]]`
            &[[+albumRequestVar]]=`[[+album]]`
            &[[+tagRequestVar]]=`[[+tag]]` ]]`]]">
        <img class="[[+imgCls]]" src="[[+thumbnail]]" alt="[[+name]]" />
    </a>
</div>
```

## Available Placeholders

| Name            | Description                                                                                                                                             |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- |
| name            | The name of the Item.                                                                                                                                   |
| filename        | The base filename of the Item.                                                                                                                          |
| filesize        | The size of the file for the Item.                                                                                                                      |
| thumbnail       | A URL to the generated thumbnail image for this Item.                                                                                                   |
| image           | A URL to the generated image for this item.                                                                                                             |
| image\_absolute | The actual image URL (instead of the thumbnail/image placeholders which have been run through phpthumb based on snippet properties).                    |
| description     | The description of the item.                                                                                                                            |
| mediatype       | The media type of the Item. Currently this is only 'image'.                                                                                             |
| createdon       | The timestamp that this Item was created on.                                                                                                            |
| createdby       | The User ID of the creator of this Item.                                                                                                                |
| active          | If this Item is active or not. Can be 1 or 0.                                                                                                           |
| tags            | A list of Tags associated with this Item.                                                                                                               |
| cls             | The value of the &itemCls property on the Gallery Snippet. Defaults to 'gal-item'.                                                                      |
| linkToImage     | In the default content, if true, will link directly to the Image rather than appending the imageGetParam placeholder to a request param. Defaults to 1. |
| imageGetParam   | The GET param to use when adding a GET param to link with the GalleryItem snippet. Defaults to 'galItem'.                                               |
| albumRequestVar | The GET param to use to add when linking with the GalleryItem snippet. Clicking the image will stay on the selected Album with this Snippet.            |
| album           | The currently displayed Album.                                                                                                                          |

## See Also

1. [Gallery.Gallery](extras/gallery/gallery/index)
    1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
    2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
    1. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/containertpl)
    2. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
3. [Gallery.GalleryItem](extras/gallery/gallery.galleryitem)
    1. [Gallery.GalleryItem.albumTpl](extras/gallery/gallery.galleryitem/albumtpl)
    2. [Gallery.GalleryItem.GalleryItemPagination](extras/gallery/gallery.galleryitem/galleryitempagination)
    3. [Gallery.GalleryItem.tagTpl](extras/gallery/gallery.galleryitem/tagtpl)
    4. [Gallery.GalleryItem.tpl](extras/gallery/gallery.galleryitem/tpl)
4. [Gallery.Plugins](extras/gallery/gallery.plugins)
    1. [Gallery.Plugins.Galleriffic](extras/gallery/gallery.plugins/galleriffic)
    2. [Gallery.Plugins.Slimbox](extras/gallery/gallery.plugins/slimbox)
5. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
6. [Gallery.Example1](extras/gallery/gallery.example1)
7. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
