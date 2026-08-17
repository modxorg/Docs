---
title: "GalleryAlbums"
description: "Сниппет GalleryAlbums выводит список альбомов Gallery"
translation: "extras/gallery/gallery.galleryalbums/index"
---

## Сниппет GalleryAlbums

Этот сниппет выводит список альбомов. По умолчанию выбирает только «prominent» альбомы.

Вы можете показать миниатюру каждого альбома с изображением из альбома, если зададите свойство «rowTpl» как «galAlbumRowWithCoverTpl» или используете `[[+image]]` в своём rowTpl.

## Свойства

| Name              | Description                                                                                                                                                                    | Default Value  |
| ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | -------------- |
| rowTpl            | Чанк для каждой строки альбома.                                                                                                                                           | galAlbumRowTpl |
| containerTpl      | Чанк для обёртки всех строк альбомов (доступно с 1.6.0 beta).                                                                                                      |                |
| sort              | Поле сортировки результатов.                                                                                                                                              | createdon      |
| dir               | Направление сортировки результатов.                                                                                                                                          | DESC           |
| limit             | Если не 0, ограничивает число результатов.                                                                                                                 | 10             |
| start             | Индекс начала выборки в результатах.                                                                                                                                        | 0              |
| toPlaceholder     | Если не пусто, записывает вывод в плейсхолдер с этим именем.                                                                                                            |                |
| showInactive      | При 1 показывает также неактивные галереи.                                                                                                                                    | 0              |
| showAll           | При 1 показывает все альбомы независимо от родителя.                                                                                                                         | 1              |
| showName          | При 0 скрывает имя альбома.                                                                                                                                                 | 1              |
| parent            | Выбирает только альбомы с родителем с этим ID. Не забудьте showAll = 0, иначе не сработает!                                                                  | 0              |
| prominentOnly     | При 1 показывает только альбомы со статусом «prominent».                                                                                                               | 1              |
| albumCoverSort    | Поле сортировки для обложки альбома. Для первого изображения используйте «rank». Для случайного «random».                                           | rank           |
| albumCoverSortDir | Направление сортировки обложки альбома. Принимает «ASC» или «DESC».                                                                                             | ASC            |
| thumbWidth        | Ширина миниатюры обложки альбома.                                                                                                                                       | 100            |
| thumbHeight       | Ширина миниатюры обложки альбома.                                                                                                                                       | 100            |
| thumbZoomCrop     | Использовать zoom crop для миниатюры обложки.                                                                                                                  | 1              |
| thumbFar          | Соотношение сторон phpThumb для миниатюры обложки.                                                                                                                  | C              |
| thumbQuality      | Качество миниатюры обложки от 0 до 100.                                                                                                                           | 90             |
| thumbProperties   | JSON-объект параметров phpThumb для миниатюры альбома.                                                                                         |                |
| albumRequestVar   | Если checkForRequestAlbumVar = true в сниппете Gallery, ищет REQUEST-переменную с этим именем для выбора альбома.                                              |                |
| totalVar          | Ключ плейсхолдера с общим числом альбомов без учёта limit (доступно с 1.6.0 beta). | total          |

## Чанки GalleryAlbums

GalleryAlbums обрабатывает следующие чанки. Соответствующие параметры GalleryAlbums:

- [rowTpl](extras/gallery/gallery.galleryalbums/rowtpl "Gallery.GalleryAlbums.rowTpl"): чанк для каждого отображаемого альбома.
- [containerTpl](extras/gallery/gallery.galleryalbums/containertpl): чанк для обёртки всех строк альбомов (доступно с 1.6.0 beta).

## Примеры

Первые 10 активных prominent альбомов.

```php
[[!GalleryAlbums]]
```

10 prominent альбомов, отсортированных по алфавиту:

```php
[[!GalleryAlbums?
    &sort=`name`
    &dir=`ASC`
]]
```

3 последних альбома, prominent или нет, в плейсхолдер «albums»:

```php
[[!GalleryAlbums?
    &limit=`3`
    &prominentOnly=`0`
    &toPlaceholder=`albums`
]]
```

3 последних альбома со случайной обложкой.

```php
[[!GalleryAlbums?
    &limit=`3`
    &albumCoverSort=`random`
]]
```

Через &thumbProperties задаём обложку в jpg с качеством 90% вместо png:

```php
[[!GalleryAlbums?
    &thumbProperties=`{"f":"jpg","q":"90%"}`
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
