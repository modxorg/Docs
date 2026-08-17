---
title: "sekUserGalleries.album.view"
description: "Сниппет просмотра альбома и его элементов"
translation: "extras/sekusergalleries/sekusergalleries.album.view"
---

## Что такое album.view?

Сниппет показывает информацию о выбранном альбоме и его элементы.

## Использование

Пример вызова album.view:

``` php
[[!album.view]]
```

Можно указать шаблоны:

``` php
[[!album.view? &tplAlbum=`album.view` &tplAlbumItems=`album.items.list`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя            | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplAlbum        | Контейнер для информации об альбоме и его элементов.                                                                                                                                                           | album.view                  | >0.0.1  |
| tplAlbumItems   | Список элементов альбома в шаблоне tplAlbum.                                                                                                                                                                      | album.items.list            | >0.0.1  |
| tplAltItems     | Альтернативные ссылки на изображения по размерам из менеджера, кроме primary.                                                                                                                 | album.items.alt             | >0.0.1  |
| tplPasswordForm | Шаблон формы, когда для просмотра альбома нужен пароль.                                                                                                                                                            | album.password.form         | >0.0.1  |
| loadjquery      | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss       | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
