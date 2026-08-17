---
title: "sekUserGalleries.album.items.manage"
description: "Сниппет управления элементами альбома"
translation: "extras/sekusergalleries/sekusergalleries.album.items.manage"
---

## Что такое album.items.manage?

Если пользователь авторизован и имеет право на галерею, сниппет позволяет добавлять, редактировать и удалять элементы в альбоме.

## Использование

Пример вызова album.items.manage:

``` php
[[!album.items.manage]]
```

Можно указать шаблон:

``` php
[[!album.items.manage? &tplItemsForm=`album.items.form`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя         | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplItemsForm | Контейнер формы добавления, редактирования и удаления элементов альбома.                                                                                                                                                                          | album.items.form            | >0.0.1  |
| tplJsDisplay | JavaScript-код отображения информации о загруженном элементе.                                                                                                                                                                      | album.items.js.display      | >0.0.1  |
| tplJsUpload  | JavaScript-код формы загрузки элемента альбома.                                                                                                                                                                 | album.items.js.upload       | >0.0.1  |
| loadjquery   | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss    | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
