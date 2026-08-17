---
title: "GalleryItemPagination"
description: "Сниппет GalleryItemPagination для навигации previous/next при просмотре одного элемента Gallery"
translation: "extras/gallery/gallery.galleryitem/galleryitempagination"
---

## Сниппет GalleryItemPagination

Сниппет GalleryItemPagination задаёт плейсхолдеры для базовой навигации (previous, next) при выводе одного элемента Gallery через GalleryItem.

## Свойства

GalleryItemPagination использует следующие свойства:

| Name                    | Description                                                                                         | default value          |
| ----------------------- | --------------------------------------------------------------------------------------------------- | ---------------------- |
| curItem                 | ID текущего изображения. Можно переопределить URL-параметром.                    | 1, or an url parameter |
| checkForRequestVar      | Переопределять ли curItem URL-параметром из getParam      | 1                      |
| getParam                | URL-параметр для checkForRequestVar                                                        | galItem                |
| album                   | ID или имя альбома                                                                   | 1                      |
| checkForRequestAlbumVar | Переопределять ли album URL-параметром из albumRequestVar | 1                      |
| albumRequestVar         | URL-параметр для checkForRequestAlbumVar                                                   | galAlbum               |

## Плейсхолдеры

GalleryItemPagination задаёт плейсхолдеры для текущего, предыдущего, следующего, первого и последнего элемента альбома. Пространства имён в таблице ниже. Можно использовать те же поля, что у [плейсхолдеров GalleryItem](extras/gallery/gallery.galleryitem/tpl), кроме album и tags.

| Name             | Description                                      |
| ---------------- | ------------------------------------------------ |
| galitem.cur.\*   | Пространство имён текущего элемента альбома  |
| galitem.prev.\*  | Пространство имён предыдущего элемента альбома |
| galitem.next.\*  | Пространство имён следующего элемента альбома     |
| galitem.first.\* | Пространство имён первого элемента альбома    |
| galitem.last.\*  | Пространство имён последнего элемента альбома     |

### Примеры плейсхолдеров

Ниже частые плейсхолдеры GalleryItemPagination для tpl или ресурса.

| Name                    | Description                               |
| ----------------------- | ----------------------------------------- |
| galitem.cur.id          | Плейсхолдер ID текущего элемента альбома  |
| galitem.prev.id         | Плейсхолдер ID предыдущего элемента альбома |
| galitem.next.id         | Плейсхолдер ID следующего элемента альбома     |
| galitem.first.id        | Плейсхолдер ID первого элемента альбома    |
| galitem.last.id         | Плейсхолдер ID последнего элемента альбома     |
| galitem.next.filename   | Имя файла следующего элемента                 |
| galitem.cur.description | Описание текущего элемента           |

## Примеры GalleryItemPagination

Базовая навигация для элемента GalleryItem с плейсхолдерами previous и next.

### Создайте сниппет «GalleryItemPagination»

Сначала создайте сниппет. Назовите его «GalleryItemPagination» и сохраните.

```php
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

Настройте плейсхолдеры навигации:

```php
[[!GalleryItemPagination? &album=`1`]]
[[!If? &subject=`[[!+galitem.prev.id]]`&operator=`isnotempty` &then=`
<a id="previmg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.prev.id]]&galAlbum=1&galTag=">previous image</a>`]]
[[!If? &subject=`[[!+galitem.next.id]]`&operator=`isnotempty` &then=`
<a id="nextimg" href="[[++site_url]]?id=[[*id]]&galItem=[[!+galitem.next.id]]&galAlbum=1&galTag=">next image</a>`]]
`]]
```

## Смотрите также

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
