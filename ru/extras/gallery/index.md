---
title: "Gallery"
description: "Динамическая галерея изображений для MODX Revolution с альбомами, тегами и плагинами отображения"
translation: "extras/gallery/index"
---

## Что такое Gallery?

Gallery это динамический extra галереи для MODX Revolution. С его помощью вы быстро создаёте галереи изображений, сортируете их, назначаете теги и выводите на сайте множеством способов.

Сообщество подготовило учебник по Gallery, его можно скачать здесь: [Tutorial - Gallery Component with Galleriffic.pdf](https://github.com/modxorg/Docs/raw/2.x/en/extras/gallery/galery.pdf)

Небольшой учебник по настройке альбома с Gallery: <https://www.sitsol.be/blog/modx-gallery>

## Требования

- MODX Revolution 2.0.0-rc-2 или новее
- PHP5 или новее
- php-mbstring включён

## История и сведения

Gallery написал Shaun McCormick (splittingred) как динамический компонент галереи. Первый релиз вышел 5 февраля 2010 года.

### Загрузка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачайте из репозитория MODX Extras: <https://modx.com/extras/package/gallery>

### Разработка и сообщения об ошибках

Исходный код Gallery хранится на GitHub: <https://github.com/modxcms/Gallery>

## Использование

Сниппеты Gallery вызывают через [теги](making-sites-with-modx/tag-syntax "Tag Syntax"):

```php
[[Gallery? &album=`My Album`]]
[[GalleryAlbums? &limit=`10`]]
```

### Сниппеты

В пакете Gallery три сниппета. «Gallery» выводит галерею по альбому, тегу или обоим параметрам. «GalleryAlbums» показывает список альбомов. «GalleryItem» выводит одно изображение галереи.

- [Gallery](extras/gallery/gallery "Gallery.Gallery")
- [GalleryAlbums](extras/gallery/gallery.galleryalbums "Gallery.GalleryAlbums")
- [GalleryItem](extras/gallery/gallery.galleryitem "Gallery.GalleryItem")

### Системные настройки

Путь хранения изображений Gallery меняют через следующие настройки:

| gallery.files_path  | Абсолютный путь к папке для хранения изображений.                  |
| ------------------- | ------------------------------------------------------------------ |
| `gallery.files_url` | Веб-доступный URL, по которому открывается gallery.files_path. |

С версии 1.3.0 доступна интеграция TinyMCE для описаний элементов Gallery. Доступны такие настройки:

| key                                         | description                                                                                                                                 |
| ------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
| `gallery.use_richtext`                      | Установите yes (true), чтобы включить интеграцию TinyMCE. Для работы нужен установленный extra TinyMCE. |
| `gallery.tiny.width`                        | Ширина текстового редактора в пикселях или процентах.                                                                                  |
| `gallery.tiny.height`                       | Высота текстового редактора в пикселях или процентах.                                                                                 |
| `gallery.tiny.buttons1/2/3/4/5`             | Кнопки на строках 1-5. Если пусто, наследуются основные настройки TinyMCE.                        |
| `gallery.tiny.custom_plugins`               | Список плагинов через запятую. Если пусто, наследуются основные настройки TinyMCE.                                     |
| `gallery.tiny.theme_advanced_blockformats`  | Форматы блоков в выпадающем списке. Если пусто, наследуются основные настройки TinyMCE.                                                  |
| `gallery.tiny.theme_advanced_css_selectors` | CSS-селекторы на выбор. Если пусто, наследуются основные настройки TinyMCE.                                                               |

### Пользовательский TV

Gallery поставляется с пользовательским типом ввода и вывода TV для управления изображениями в бэкенде. Вы можете обрезать, изменять размер, поворачивать и выполнять другие операции. Подробнее:

- [Setting Up the GalleryItem TV](extras/gallery/gallery.setting-up-the-galleryitem-tv "Gallery.Setting Up the GalleryItem TV")

### Плагины Gallery

Gallery выводит галереи как миниатюры на фронтенде или через jQuery-плагины. Имя плагина передают в сниппет Gallery. Сейчас доступен плагин [Galleriffic](extras/gallery/gallery.plugins/galleriffic "Gallery.Plugins.Galleriffic").

### Страница менеджера Gallery

Gallery включает отдельную страницу менеджера (Components в верхнем меню), где вы управляете альбомами. Создайте альбом и используйте его имя в сниппете Gallery, чтобы вывести нужную галерею. После создания альбома щёлкните по нему правой кнопкой и выберите Update, чтобы управлять фотографиями.

Доступны четыре способа загрузки: одиночная загрузка (опционально с rich text описанием, см. системные настройки выше), мульти-загрузка, bulk upload (импорт изображений из папки на файловой системе) и zip upload (распаковка zip-архива).

### Media Source Gallery

Gallery поставляется с пользовательским типом Media Source, который показывает альбомы и их элементы в левом дереве менеджера. Создайте Media Source с типом «Gallery Albums», остальное Gallery настроит сам.

## Примеры

Пример вызова галереи Galleriffic для альбома «My Album»:

```php
[[!Gallery? &album=`My Album` &plugin=`galleriffic`]]
```

Первые 10 фото с тегом «Fun»:

```php
[[!Gallery? &tag=`Fun`]]
```

Все фото альбома «My Album» с тегом «Blue»:

```php
[[!Gallery? &album=`My Album` &tag=`blue`]]
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
