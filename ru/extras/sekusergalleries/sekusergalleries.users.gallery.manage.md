---
title: "sekUserGalleries.users.gallery.manage"
description: "Сниппет редактирования настроек галереи пользователя"
translation: "extras/sekusergalleries/sekusergalleries.users.gallery.manage"
---

## Что такое users.gallery.manage?

Если пользователь авторизован и имеет право на галерею, сниппет показывает настройки галереи: заголовок, описание и обложку.

## Использование

Пример вызова users.gallery.manage:

``` php
[[!users.gallery.manage]]
```

Можно указать шаблон:

``` php
[[!users.gallery.manage? &tplFormGallery=`users.gallery.form`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя           | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| -------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplFormGallery | Контейнер формы редактирования настроек галереи.                                                                                                                                                                                  | users.gallery.form          | >0.0.1  |
| loadjquery     | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss      | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
