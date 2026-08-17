---
title: "Настройка галереи"
description: "Краткая инструкция по базовой галерее: список альбомов, просмотр фото и увеличенное изображение"
translation: "extras/gallery/gallery.setting-up-your-gallery"
---

## Настройка галереи

Эта краткая инструкция показывает, как настроить простую галерею на сайте: список альбомов, после выбора альбома изображения из него, после клика по миниатюре увеличенная версия:

![](gallery-demo.png)

## Загрузка фото

Сначала загрузите фото, иначе выводить будет нечего.

- Перейдите в Components -> Gallery в верхнем меню менеджера.
- Нажмите кнопку «Create Album».
- Укажите имя и описание альбома.
- Отметьте чекбокс «Active».
- Нажмите «Save».

Щёлкните по новому альбому правой кнопкой и выберите «Update Album». Затем нажмите «Upload Item» или «Batch Upload» и загрузите фото.

## Вывод фото

Вставьте этот код в ресурс:

```html
<div style="float: right">
<h2>Galleries</h2>
<ul>
[[!GalleryAlbums]]
</ul>
</div>

<h2>Item</h2>

[[!GalleryItem]]
[[!+galitem.image:notempty=`
<div class="image">
  <a href="[[+galitem.image]]"><img class="[[+galitem.imgCls]]" src="[[+galitem.image]]" alt="[[+galitem.name]]" /></a>
  <br />Albums: [[+galitem.albums]]
  <br />Tags: [[+galitem.tags]]
</div>
`]]

<hr />

[[!Gallery? &album=`1` &toPlaceholder=`gallery`]]
<h1><a href="[[~[[*id]] &galAlbum=`[[+gallery.id]]`]]">[[+gallery.name]]</a></h1>
<p>[[+gallery.description]]</p>

[[+gallery]]
```

Готово. Всё заработает. Разберём каждую часть.

## Список альбомов Gallery

Код для вывода альбомов Gallery:

```html
<div style="float: right">
<h2>Galleries</h2>
<ul>
[[!GalleryAlbums]]
</ul>
</div>
```

Мы вызываем сниппет GalleryAlbums. В HTML блок смещён вправо через float. Это необязательно, но экономит место на экране. GalleryAlbums выведет список альбомов со ссылками.

## Вывод выбранного альбома

После клика по альбому сниппет Gallery покажет все изображения из него. Gallery работает вместе с GalleryAlbums без дополнительной настройки:

```html
[[!Gallery? &album=`1` &toPlaceholder=`gallery`]]
<h1><a href="[[~[[*id]] &galAlbum=`[[+gallery.id]]`]]">[[+gallery.name]]</a></h1>
<p>[[+gallery.description]]</p>

[[+gallery]]
```

По умолчанию Gallery показывает альбом с ID 1. Если вы перешли по ссылке из GalleryAlbums выше, этот выбор переопределится. Пока же стартуем с альбома №1. Вывод записан в плейсхолдер «gallery», чтобы показать имя и описание альбома.

## Увеличенное изображение

Миниатюры есть, но при клике нужно большое изображение. Сниппет GalleryItem обрабатывает это автоматически:

```html
[[!GalleryItem]]
[[!+galitem.image:notempty=`
<div class="image">
  <a href="[[+galitem.image]]"><img class="[[+galitem.imgCls]]" src="[[+galitem.image]]" alt="[[+galitem.name]]" /></a>
  <br />Albums: [[+galitem.albums]]
  <br />Tags: [[+galitem.tags]]
</div>
`]]
```

Сниппет GalleryItem ищет параметр «galItem» в URL. Когда он найден, загружается изображение из альбома. Сниппет Gallery использует эти параметры в URL миниатюр. Далее выводим метаданные: имя, альбомы, теги и прямую ссылку на изображение.

Галерея готова к работе.

## Заключение

У Gallery гораздо больше возможностей, но эта краткая инструкция показывает, как части работают вместе.
