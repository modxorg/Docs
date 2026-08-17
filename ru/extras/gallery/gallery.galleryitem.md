---
title: "GalleryItem"
description: "Сниппет GalleryItem выводит одно изображение галереи"
translation: "extras/gallery/gallery.galleryitem"
---

## Сниппет GalleryItem

Сниппет GalleryItem выводит один элемент Gallery.

## Свойства

| Name                 | Description                                                                                                          | Default Value |
| -------------------- | -------------------------------------------------------------------------------------------------------------------- | ------------- |
| id                   | ID элемента для вывода                                                                                        |               |
| toPlaceholders       | При true записывает свойства элемента в плейсхолдеры. При false использует tpl для вывода чанка. | 1             |
| toPlaceholdersPrefix | Необязательный префикс плейсхолдеров. Работает только при toPlaceholders = true.               | galitem       |
| tpl                  | Имя чанка при toPlaceholders = false.                                                          | galItem       |
| albumTpl             | Чанк для каждого альбома элемента.                                                   | galItemAlbum  |
| albumSeparator       | Разделитель альбомов элемента.                                                               | ,             |
| albumRequestVar      | REQUEST-переменная для ссылок на альбомы.                                                                          | galAlbum      |
| tagTpl               | Чанк для каждого тега элемента.                                                     | galItemTag    |
| tagSeparator         | Разделитель тегов элемента.                                                                 | ,&nsbp;       |
| tagSortDir           | Направление сортировки тегов элемента.                                                                | DESC          |
| tagRequestVar        | REQUEST-переменная для ссылок на теги.                                                                            | galTag        |
| thumbWidth           | Максимальная ширина миниатюры в пикселях.                                                                 | 100           |
| thumbHeight          | Максимальная высота миниатюры в пикселях.                                                                | 100           |
| thumbZoomCrop        | Использовать zoom crop для миниатюры.                                                               | 1             |
| thumbQuality         | Качество миниатюры от 0 до 100.                                                                            | 90            |
| thumbFar             | Значение «far» phpThumb для миниатюры при zoom по соотношению сторон.                                            | C             |
| thumbProperties      | JSON-объект параметров phpThumb для миниатюры.                                     |               |
| imageWidth           | Максимальная ширина изображения.                                                                                | 500           |
| imageHeight          | Максимальная высота изображения.                                                                               | 500           |
| imageZoomCrop        | Использовать zoom crop для изображения.                                                                   | 0             |
| imageQuality         | Качество изображения от 0 до 100.                                                                                | 90            |
| imageFar             | Значение «far» phpThumb для изображения при zoom по соотношению сторон.                                      | C             |
| imageProperties      | JSON-объект параметров phpThumb для изображения.                               |               |

## Плейсхолдеры по умолчанию

При toPlaceholders = 1 GalleryItem автоматически задаёт плейсхолдеры элемента. По умолчанию префикс «galitem», его меняют через toPlaceholdersPrefix. Список плейсхолдеров:

| Name        | Description                                                                                                                                |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
| name        | Имя элемента.                                                                                                                      |
| filename    | Имя файла элемента. Путь относительно каталога хранения, обычно assets/components/gallery/files/. |
| description | Описание элемента.                                                                                                               |
| mediatype   | Тип медиа элемента. Сейчас только «image».                                                                                |
| createdon   | Метка времени создания элемента.                                                                                               |
| createdby   | ID пользователя, создавшего элемент.                                                                                                   |
| active      | Активен ли элемент. Может быть 1 или 0.                                                                                              |
| albums      | Список альбомов элемента.                                                                                                          |
| tags        | Список тегов элемента.                                                                                                  |
| url         | URL элемента, если задан.                                                                                                               |

## Чанки GalleryItem

GalleryItem обрабатывает 3 чанка. Соответствующие параметры GalleryItem:

- [tpl](extras/gallery/gallery.galleryitem/tpl "Gallery.GalleryItem.tpl"): чанк при toPlaceholders = 0.
- [albumTpl](extras/gallery/gallery.galleryitem/albumtpl "Gallery.GalleryItem.albumTpl"): чанк для каждого альбома элемента.
- [tagTpl](extras/gallery/gallery.galleryitem/tagtpl "Gallery.GalleryItem.tagTpl"): чанк для каждого тега элемента.

## Примеры

Элемент с ID 12, только если он существует.

```php
[[!GalleryItem? &id=`12`]]
[[!+galitem.image:notempty=`
    <div class="image">
    <a href="[[+galitem.image]]">
    <img src="[[+galitem.image]]" alt="[[+galitem.name]]" />
    </a>
    <br />Albums: [[+galitem.albums]]
    <br />Tags: [[+galitem.tags]]
    </div>
`]]
```

Элемент с ID 23 с чанком «Photo» для вывода.

```php
[[!GalleryItem?
    &id=`23`
    &toPlaceholders=`0`
    &tpl=`Photo`
]]
```

Элемент с ID 432 с чанком «Photo», теги разделены символом «|»:

```php
[[!GalleryItem?
    &id=`432`
    &toPlaceholders=`0`
    &tpl=`Photo`
    &tagSeparator=` | `
]]
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
