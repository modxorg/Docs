---
title: "Gallery.GalleryItem.GalleryItemPagination"
_old_id: "877"
_old_uri: "revo/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination"
---

GalleryItemPagination Snippet
-----------------------------

 The GalleryItemPagination snippet offers placeholders for a basic navigation (previous, next) when displaying a single Gallery Item with GalleryItem.

Properties
----------

 GalleryItemPagination uses the following properties:

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> default value </th> </tr><tr><td> curItem   
</td> <td> The ID of the image currently on display. Can be overridden by an URL parameter.   
</td> <td> 1, or an url parameter   
</td> </tr><tr><td> checkForRequestVar   
</td> <td> Wether or not to override curItem with the url parameter as specified in the getParam property   
</td> <td> 1   
</td> </tr><tr><td> getParam   
</td> <td> URL parameter to use with checkForRequestVar   
</td> <td> galItem   
</td> </tr><tr><td> album   
</td> <td> The ID or name of an album to use   
</td> <td> 1   
</td> </tr><tr><td> checkForRequestAlbumVar   
</td> <td> Whether or not to override album with the url parameter as specified in the albumRequstVar property   
</td> <td> 1   
</td> </tr><tr><td> albumRequestVar   
</td> <td> URL parameter to use with checkForRequestAlbumVar   
</td> <td> galAlbum </td></tr></tbody></table>Placeholders
------------

 GalleryItemPagination sets placeholders for the current, previous, next, first and last item in an album. You can find the namespaces for that in the table below. You can use the same fields the [GalleryItem placeholders](display/ADDON/Gallery.GalleryItem#Gallery.GalleryItem-DefaultPlaceholders), minus album and tags.

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> galitem.cur.\* </td> <td> placeholder namespace for current item of album </td> </tr><tr><td> galitem.prev.\* </td> <td> placeholder namespace for previous item of album </td> </tr><tr><td> galitem.next.\* </td> <td> placeholder namespace for next item of album </td> </tr><tr><td> galitem.first.\* </td> <td> placeholder namespace for first item of album </td> </tr><tr><td> galitem.last.\* </td> <td> placeholder namespace for last item of album </td></tr></tbody></table>### Example placeholders

 Below you can find some common placeholders for GalleryItemPagination that can be used in your tpl/resource.

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> galitem.cur.id </td> <td> placeholder for current item ID of album </td> </tr><tr><td> galitem.prev.id </td> <td> placeholder for previous item ID of album </td> </tr><tr><td> galitem.next.id </td> <td> placeholder for next item ID of album </td> </tr><tr><td> galitem.first.id </td> <td> placeholder for first item ID of album </td> </tr><tr><td> galitem.last.id </td> <td> placeholder for last item ID of album </td> </tr><tr><td> galitem.next.filename   
</td> <td> filename of the next item   
</td> </tr><tr><td> galitem.cur.description   
</td> <td> description of the current item   
</td></tr></tbody></table>GalleryItemPagination examples
------------------------------

 Display a basic navigation for an GalleryItem item and use previous and next placeholders.

### Create snippet 'GalleryItemPagination'

 First of all you have to create the snippet. Name it 'GalleryItemPagination' and save it.

 ```
<pre class="brush: php">
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

``` Now set up your placeholders for the navigation:

 ```
<pre class="brush: php">
[[!GalleryItemPagination? &album=`1`]]
[[!If? &subject=`[[!+galitem.prev.id]]`&operator=`isnotempty` &then=`
<a id="previmg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.prev.id]]&galAlbum=1&galTag=">previous image</a>`]]
[[!If? &subject=`[[!+galitem.next.id]]`&operator=`isnotempty` &then=`
<a id="nextimg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.next.id]]&galAlbum=1&galTag=">next image</a>`]]
`]]

```See Also
--------

1. [Gallery.Gallery](/extras/revo/gallery/gallery.gallery)
  1. [Gallery.Gallery.containerTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.containertpl)
  2. [Gallery.Gallery.thumbTpl](/extras/revo/gallery/gallery.gallery/gallery.gallery.thumbtpl)
2. [Gallery.GalleryAlbums](/extras/revo/gallery/gallery.galleryalbums)
  1. [Gallery.GalleryAlbums.containerTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.containertpl)
  2. [Gallery.GalleryAlbums.rowTpl](/extras/revo/gallery/gallery.galleryalbums/gallery.galleryalbums.rowtpl)
3. [Gallery.GalleryItem](/extras/revo/gallery/gallery.galleryitem)
  1. [Gallery.GalleryItem.albumTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.albumtpl)
  2. [Gallery.GalleryItem.GalleryItemPagination](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.galleryitempagination)
  3. [Gallery.GalleryItem.tagTpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tagtpl)
  4. [Gallery.GalleryItem.tpl](/extras/revo/gallery/gallery.galleryitem/gallery.galleryitem.tpl)
4. [Gallery.Plugins](/extras/revo/gallery/gallery.plugins)
  1. [Gallery.Plugins.Galleriffic](/extras/revo/gallery/gallery.plugins/gallery.plugins.galleriffic)
  2. [Gallery.Plugins.Slimbox](/extras/revo/gallery/gallery.plugins/gallery.plugins.slimbox)
5. [Gallery.Roadmap](/extras/revo/gallery/gallery.roadmap)
6. [Gallery.Setting Up Your Gallery](/extras/revo/gallery/gallery.setting-up-your-gallery)
7. [Gallery.Example1](/extras/revo/gallery/gallery.example1)
8. [Gallery.Setting Up the GalleryItem TV](/extras/revo/gallery/gallery.setting-up-the-galleryitem-tv)