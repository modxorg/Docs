---
title: "Example1"
description: "Пример использования Gallery: список альбомов, фото альбома и увеличенное изображение"
translation: "extras/gallery/gallery.example1"
---

Пример использования Gallery. Страница сначала показывает список альбомов Gallery, после клика загружает все фото альбома. При клике по фото оно отображается в большом формате.

Вставьте этот код в ресурс.

```php
[[!Gallery? &toPlaceholder=`gallery`]]
[[!GalleryItem]]
[[!GalleryAlbums? &toPlaceholder=`galleries`]]

<div style="float: right">
    <h2>Galleries</h2>
    <ul>
        [[+galleries]]
    </ul>
</div>

<h2>Item</h2>

[[!+galitem.image:notempty=`
<div class="image">
    <a href="[[+galitem.image]]"><img class="[[+galitem.imgCls]]" src="[[+galitem.image]]" alt="[[+galitem.name]]" /></a>
    <br />Albums: [[+galitem.albums]]
    <br />Tags: [[+galitem.tags]]
</div>
`]]

<hr />

[[!+gallery:notempty=`
    <h1><a href="[[~[[*id]]]]">[[+gallery.name]]</a></h1>
    <h2>[[+gallery.description]]</h2>
    
    [[+gallery]]
`]]
```
