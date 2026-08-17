---
title: "Gallery"
description: "Сниппет Gallery выводит галерею изображений по альбому, тегу или обоим параметрам"
translation: "extras/gallery/gallery/index"
---

## Сниппет Gallery

Этот сниппет выводит «галерею» изображений по альбому, тегу или обоим параметрам.

## Свойства

| Name                    | Description                                                                                                                                                                                                                                                         | Default Value   |
| ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------- |
| album                   | Загружает только элементы из этого альбома. Можно указать имя или ID альбома.                                                                                                                                                                                    |                 |
| tag                     | Загружает только элементы с этим тегом.                                                                                                                                                                                                                                 |                 |
| plugin                  | Имя плагина для отображения на фронтенде. См. раздел «Plugins» ниже.                                                                                                                                                                                  |                 |
| thumbTpl                | Чанк для каждой миниатюры.                                                                                                                                                                                                                       | galItemThumb    |
| containerTpl            | Необязательный чанк-обёртка для вывода.                                                                                                                                                                                                                            |                 |
| toPlaceholder           | Если задано, вывод записывается в плейсхолдер с этим именем, а вызов сниппета ничего не возвращает.                                                                                                                                                               |                 |
| placeholderPrefix       | Если плейсхолдер не задан, префикс для свойств name/id/description/total текущего альбома.                                                                                                                                                                            | gallery.        |
| thumbWidth              | Ширина генерируемой миниатюры в пикселях.                                                                                                                                                                                                                    | 100             |
| thumbHeight             | Высота генерируемой миниатюры в пикселях.                                                                                                                                                                                                                   | 100             |
| thumbZoomCrop           | Использовать ли zoom crop для миниатюры.                                                                                                                                                                                                                   | 1               |
| thumbFar                | Соотношение сторон phpThumb для миниатюры. Изображение создаётся в размере «w» и «h» (оба должны быть заданы). Значения выравнивания: L=left, R=right, T=top, B=bottom, C=center. BL, BR, TL, TR для альбомной или портретной ориентации. | C               |
| thumbQuality            | Качество миниатюры от 0 до 100.                                                                                                                                                                                                                 | 90              |
| thumbProperties         | JSON-объект параметров phpThumb для миниатюры.                                                                                                                                                                                    |                 |
| imageWidth              | При использовании плагина: максимальная ширина отображаемого изображения.                                                                                                                                                                                         | 500             |
| imageHeight             | При использовании плагина: максимальная высота отображаемого изображения.                                                                                                                                                                                        | 500             |
| imageZoomCrop           | Использовать ли zoom crop для изображения.                                                                                                                                                                                                                       |                 |
| imageFar                | Соотношение сторон phpThumb для изображения.                                                                                                                                                                                                                       |                 |
| imageQuality            | При использовании плагина: качество изображения от 0 до 100.                                                                                                                                                                                                    | 90              |
| imageProperties         | JSON-объект параметров phpThumb для изображения.                                                                                                                                                                                        |                 |
| sort                    | Поле сортировки изображений. Можно указать «rand» для случайного порядка.                                                                                                                                                                                              | rank            |
| dir                     | Направление сортировки изображений.                                                                                                                                                                                                                                    | ASC             |
| limit                   | Если не 0, показывает только X элементов.                                                                                                                                                                                                               | 0               |
| start                   | Индекс начала выборки при ограничении числа элементов. Аналог SQL LIMIT start.                                                                                                                                                        | 0               |
| showInactive            | При true также показывает неактивные изображения.                                                                                                                                                                                                                         | false           |
| albumRequestVar         | REQUEST-переменная для фильтрации по альбому вместе с checkForRequestAlbumVar=`true`. Можно фильтровать по имени или ID галереи.                                                                             | galAlbum        |
| checkForRequestAlbumVar | При true, если найдена REQUEST-переменная albumRequestVar (по умолчанию galAlbum), её значение используется как album.                                                                                                      | false           |
| tagRequestVar           | REQUEST-переменная для фильтрации по тегу вместе с checkForRequestTagVar=`true`.                                                                                                                                    | galTag          |
| checkForRequestTagVar   | При true, если найдена REQUEST-переменная tagRequestVar (по умолчанию galTag), её значение используется как tag.                                                                                                            | false           |
| useCss                  | При true подключает CSS сниппета Gallery. Установите «0», чтобы не загружать CSS Gallery.                                                                                                                                                         | 1 (true)        |
| itemCls                 | CSS-класс каждого элемента.                                                                                                                                                                                                                                 | gal-item        |
| activeCls               | CSS-класс, добавляемый активному элементу.                                                                                                                                                                                                              | gal-item-active |
| linkToImage             | Ссылка ведёт напрямую на изображение для каждой миниатюры или на URL GalleryItem.                                                                                                                                                              | 0               |
| linkAttributes          | HTML-атрибуты тега A в item tpl.                                                                                                                                                                                                                      |                 |
| imageAttributes         | HTML-атрибуты тега img в item tpl.                                                                                                                                                                                                                    |                 |

## Чанки Gallery

Gallery обрабатывает 2 чанка. Соответствующие параметры Gallery:

- [thumbTpl](extras/gallery/gallery/thumbtpl "Gallery.Gallery.thumbTpl"): чанк для каждого отображаемого элемента.
- [containerTpl](extras/gallery/gallery/containertpl "Gallery.Gallery.containerTpl"): необязательный. Если задан, оборачивает содержимое.

## Плагины

Gallery выводит галереи как миниатюры на фронтенде или через jQuery-плагины. Имя плагина передают в свойство &plugin сниппета Gallery.

- [Slimbox](extras/gallery/gallery.plugins/slimbox "Gallery.Plugins.Slimbox")
- [Galleriffic](extras/gallery/gallery.plugins/galleriffic "Gallery.Plugins.Galleriffic")

Galleriffic меняет свойство `thumbTpl` на `gallerifficThumbTpl`, а `containerTpl` на `gallerifficContainerTpl`.

## Примеры

Галерея фото альбома «My Album»:

```php
[[!Gallery?
    &album=`My Album`
]]
```

Галерея альбома «Trucks» с пользовательским чанком «truckThumb» для миниатюр:

```php
[[!Gallery?
    &album=`Trucks`
    &thumbTpl=`truckThumb`
]]
```

Галерея фото с тегом «Cool» и плагином Galleriffic:

```php
[[!Gallery?
    &tag=`Cool`
    &plugin=`Galleriffic`
]]
```

Три фото из альбома «Cars» в плейсхолдер «gallery»:

```php
[[!Gallery?
    &limit=`3`
    &album=`Cars`
    &toPlaceholder=`gallery`
]]
<div class="my-gallery">
[[+gallery]]
</div>
```

Через &thumbProperties задаём миниатюры в jpg с качеством 90% вместо png:

```php
[[!Gallery?
    &album=`My Album`
    &thumbProperties=`{"f":"jpg","q":"90%"}`
]]
```

## Смотрите также

1. [Gallery.Gallery](extras/gallery/gallery/index)
    1. [Gallery.Gallery.containerTpl](extras/gallery/gallery/containertpl)
    2. [Gallery.Gallery.thumbTpl](extras/gallery/gallery/thumbtpl)
2. [Gallery.GalleryAlbums](extras/gallery/gallery.galleryalbums)
    1. [Gallery.GalleryAlbums.rowTpl](extras/gallery/gallery.galleryalbums/rowtpl)
    2. [Gallery.GalleryAlbums.containerTpl](extras/gallery/gallery.galleryalbums/containertpl)
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
