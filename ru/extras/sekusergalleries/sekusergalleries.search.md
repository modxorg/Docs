---
title: "sekUserGalleries.search"
description: "Сниппет поиска по альбомам галереи"
translation: "extras/sekusergalleries/sekusergalleries.search"
---

## Что такое search?

Сниппет ищет по заголовку, описанию и ключевым словам альбомов и выводит результаты.

## Использование

Пример вызова search:

``` php
[[!search]]
```

Можно указать шаблоны:

``` php
[[!search? &tplContainer=`search.container` &tplAlbumList=`users.gallery.albumlist`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя         | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplContainer | Контейнер для результатов поиска.                                                                                                                                                                                  | search.container            | >0.0.1  |
| tplAlbumList | Список альбомов в шаблоне tplContainer.                                                                                                                                                                       | users.gallery.albumlist     | >0.0.1  |
| loadjquery   | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
