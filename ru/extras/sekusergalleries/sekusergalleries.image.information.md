---
title: "sekUserGalleries.image.information"
description: "Сниппет дополнительной информации об изображении"
translation: "extras/sekusergalleries/sekusergalleries.image.information"
---

## Что такое image.information?

Простой сниппет с дополнительной информацией об изображении: дата съёмки, камера и т.д.

## Использование

Пример вызова image.information:

``` php
[[!image.information]]
```

Можно указать шаблон:

``` php
[[!image.information? &tplContainer=`image.information`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя         | Описание                                         | По умолчанию           | Версия |
| ------------ | --------------------------------------------------- | ----------------- | ------- |
| tplContainer | Контейнер для информации об изображении. | image.information | >0.0.1  |
