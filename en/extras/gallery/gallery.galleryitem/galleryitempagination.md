---
title: "GalleryItemPagination"
_old_id: "877"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination"
---

## GalleryItemPagination Snippet

The GalleryItemPagination snippet offers placeholders for a basic navigation (previous, next) when displaying a single Gallery Item with GalleryItem.

## Properties

GalleryItemPagination uses the following properties:

| Name                    | Description                                                                                         | default value          |
| ----------------------- | --------------------------------------------------------------------------------------------------- | ---------------------- |
| curItem                 | The ID of the image currently on display. Can be overridden by an URL parameter.                    | 1, or an url parameter |
| checkForRequestVar      | Wether or not to override curItem with the url parameter as specified in the getParam property      | 1                      |
| getParam                | URL parameter to use with checkForRequestVar                                                        | galItem                |
| album                   | The ID or name of an album to use                                                                   | 1                      |
| checkForRequestAlbumVar | Whether or not to override album with the url parameter as specified in the albumRequstVar property | 1                      |
| albumRequestVar         | URL parameter to use with checkForRequestAlbumVar                                                   | galAlbum               |

## Placeholders

GalleryItemPagination sets placeholders for the current, previous, next, first and last item in an album. You can find the namespaces for that in the table below. You can use the same fields the [GalleryItem placeholders](extras/gallery/gallery.galleryitem/tpl), minus album and tags.

| Name             | Description                                      |
| ---------------- | ------------------------------------------------ |
| galitem.cur.\*   | placeholder namespace for current item of album  |
| galitem.prev.\*  | placeholder namespace for previous item of album |
| galitem.next.\*  | placeholder namespace for next item of album     |
| galitem.first.\* | placeholder namespace for first item of album    |
| galitem.last.\*  | placeholder namespace for last item of album     |

### Exampleplaceholders

Below you can find some common placeholders for GalleryItemPagination that can be used in your tpl/resource.

| Name                    | Description                               |
| ----------------------- | ----------------------------------------- |
| galitem.cur.id          | placeholder for current item ID of album  |
| galitem.prev.id         | placeholder for previous item ID of album |
| galitem.next.id         | placeholder for next item ID of album     |
| galitem.first.id        | placeholder for first item ID of album    |
| galitem.last.id         | placeholder for last item ID of album     |
| galitem.next.filename   | filename of the next item                 |
| galitem.cur.description | description of the current item           |

## GalleryItemPagination examples

Display a basic navigation for an GalleryItem item and use previous and next placeholders.

### Create snippet 'GalleryItemPagination'

First of all you have to create the snippet. Name it 'GalleryItemPagination' and save it.

``` php
<?php
// First instantiate the Gallery package
$modx->addPackage('gallery',$modx->getOption('gallery.core_path',$config,$modx->getOption('core_path').'components/gallery/').'model/');
$curItem = $modx->getOption('curItem',$scriptProperties,1);
if ($modx->getOption('checkForRequestVar',$scriptProperties,true)) {
    $getParam = $modx->getOption('getParam',$scriptProperties,'galItem');
    if (!empty($_REQUEST[$getParam])) { $curItem = (int)$_REQUEST[$getParam]; }
}
if (empty($curItem)) return '';
$album = $modx->getOption('album',$scriptProperties,1);
if ($modx->getOption('checkForRequestAlbumVar',$scriptProperties,true)) {
    $albumRequestVar = $modx->getOption('albumRequestVar',$scriptProperties,'galAlbum');
    if (!empty($_REQUEST[$albumRequestVar])) $album = $_REQUEST[$albumRequestVar];
}
// We pass the album name/ID to an &album property and find the gallery object
if (!is_int($album)) {
    $gallery = $modx->getObject('galAlbum',array('name' => $album));
    if ($gallery instanceof galAlbum)
        $album = $gallery->get('id');
}
$c = $modx->newQuery('galAlbumItem');
$c->innerJoin('galItem','Item');
$c->where(
    array(
        'album' => $album,
    )
);
$c->select(
    array(
        'galAlbumItem.*',
        'Item.*',
    )
);
$c->sortby('rank','asc');
$collection = $modx->getCollection('galAlbumItem',$c);
$items = array();
foreach ($collection as $i) {
    $items[] = $i->toArray();
}
$continue = true;
$i = 0; $prev = array(); $cur = array(); $next = array();
while ($continue) {
    $prev = $cur;
    $cur = $items[$i];
    if ($cur['id'] == $curItem) {
        $next = $items[$i+1];
        $continue = false;
    }
    $i++;
}
$first = $items[0];
$last = $items[count($items)-1];
$phs['galitem.cur.'] = $cur;
$phs['galitem.prev.'] = $prev;
$phs['galitem.next.'] = $next;
$phs['galitem.first.'] = $first;
$phs['galitem.last.'] = $last;
$modx->setPlaceholders($phs);
return '';
```

Now set up your placeholders for the navigation:

``` php
[[!GalleryItemPagination? &album=`1`]]
[[!If? &subject=`[[!+galitem.prev.id]]`&operator=`isnotempty` &then=`
<a id="previmg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.prev.id]]&galAlbum=1&galTag=">previous image</a>`]]
[[!If? &subject=`[[!+galitem.next.id]]`&operator=`isnotempty` &then=`
<a id="nextimg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.next.id]]&galAlbum=1&galTag=">next image</a>`]]
`]]
```

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
5. [Gallery.Roadmap](extras/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](extras/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](extras/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv)
