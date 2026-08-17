---
title: "sekUserGalleries.users.gallery.view"
description: "Сниппет просмотра альбомов галереи выбранного пользователя"
translation: "extras/sekusergalleries/sekusergalleries.users.gallery.view"
---

## Что такое users.gallery.view?

Сниппет показывает альбомы галереи выбранного пользователя. Пользователь с нужными правами может создать одну галерею. В галерее хранятся альбомы, их количество не ограничено. Если в URL не указана галерея, а пользователь авторизован и имеет право на галерею, откроется его галерея.

## Использование

Пример вызова users.gallery.view:

``` php
[[!users.gallery.view]]
```

Можно указать шаблоны:

``` php
[[!users.gallery.view? &tplGallery=`users.gallery.view` &tplAlbumList=`users.gallery.albumlist`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя         | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplGallery   | Контейнер для информации о галерее и альбомов.                                                                                                                                                              | users.gallery.view          | >0.0.1  |
| tplAlbumList | Список альбомов.                                                                                                                                                                                                               | users.gallery.albumlist     | >0.0.1  |
| loadjquery   | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
