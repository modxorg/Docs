---
title: "sekUserGalleries.album.manage"
description: "Сниппет добавления, редактирования и удаления альбомов"
translation: "extras/sekusergalleries/sekusergalleries.album.manage"
---

## Что такое album.manage?

Если пользователь авторизован и имеет право на галерею, сниппет позволяет добавлять, редактировать и удалять альбомы.

## Использование

Пример вызова album.manage:

``` php
[[!album.manage]]
```

Можно указать шаблон:

``` php
[[!album.manage? &tplFormAlbum=`album.form` &tplDeleteConfirmation=`album.delete`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя                  | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| --------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplFormAlbum          | Контейнер формы добавления, редактирования и удаления альбома.                                                                                                                                                                             | album.form                  | >0.0.1  |
| tplDeleteConfirmation | Шаблон формы подтверждения удаления.                                                                                                                                                                                                | album.delete                | >0.0.1  |
| loadjquery            | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss             | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
