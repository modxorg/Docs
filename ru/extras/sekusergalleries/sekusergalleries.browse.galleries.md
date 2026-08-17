---
title: "sekUserGalleries.browse.galleries"
description: "Сниппет списка всех галерей на сайте"
translation: "extras/sekusergalleries/sekusergalleries.browse.galleries"
---

## Что такое browse.galleries?

Список галерей на сайте.

## Использование

Пример вызова browse.galleries:

``` php
[[!browse.galleries]]
```

Можно указать шаблоны:

``` php
[[!users.gallery.view? &tplContainer=`browse.galleries.container` &tplRow=`browse.galleries.row`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя         | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplContainer | Контейнер для списка галерей.                                                                                                                                                                                    | browse.galleries.container  | >0.0.1  |
| tplRow       | Список галерей внутри tplContainer.                                                                                                                                                                              | browse.galleries.row        | >0.0.1  |
| loadjquery   | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
