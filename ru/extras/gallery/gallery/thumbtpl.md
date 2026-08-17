---
title: "thumbTpl"
description: "Чанк thumbTpl для миниатюры каждого элемента в сниппете Gallery"
translation: "extras/gallery/gallery/thumbtpl"
---

## Чанк thumbTpl Gallery

Этот чанк выводится через свойство &thumbTpl сниппета [Gallery](extras/gallery "Gallery").

## Значение по умолчанию

```php
<div class="[[+cls]]">
    <a href="[[+linkToImage:if=`[[+linkToImage]]`:is=`1`:then=`[[+image_absolute]]`:else=`[[~[[*id]]?
            &[[+imageGetParam]]=`[[+id]]`
            &[[+albumRequestVar]]=`[[+album]]`
            &[[+tagRequestVar]]=`[[+tag]]` ]]`]]">
        <img class="[[+imgCls]]" src="[[+thumbnail]]" alt="[[+name]]" />
    </a>
</div>
```

## Доступные плейсхолдеры

| Name            | Description                                                                                                                                             |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- |
| name            | Имя элемента.                                                                                                                                   |
| filename        | Базовое имя файла элемента.                                                                                                                          |
| filesize        | Размер файла элемента.                                                                                                                      |
| thumbnail       | URL сгенерированной миниатюры элемента.                                                                                                   |
| image           | URL сгенерированного изображения элемента.                                                                                                             |
| image\_absolute | Фактический URL изображения (в отличие от thumbnail/image, которые проходят через phpthumb по свойствам сниппета).                    |
| description     | Описание элемента.                                                                                                                            |
| mediatype       | Тип медиа элемента. Сейчас только «image».                                                                                             |
| createdon       | Метка времени создания элемента.                                                                                                            |
| createdby       | ID пользователя, создавшего элемент.                                                                                                                |
| active          | Активен ли элемент. Может быть 1 или 0.                                                                                                           |
| tags            | Список тегов элемента.                                                                                                               |
| cls             | Значение свойства &itemCls сниппета Gallery. По умолчанию «gal-item».                                                                      |
| linkToImage     | В содержимом по умолчанию при true ссылка ведёт напрямую на изображение, а не добавляет imageGetParam к GET-параметру. По умолчанию 1. |
| imageGetParam   | GET-параметр для ссылки с GalleryItem. По умолчанию «galItem».                                               |
| albumRequestVar | GET-параметр для ссылки с GalleryItem. Клик по изображению сохраняет выбранный альбом.            |
| album           | Текущий отображаемый альбом.                                                                                                                          |

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
