---
title: "sekUserGalleries.directory"
description: "Сниппет статистики занятого и доступного места пользователя"
translation: "extras/sekusergalleries/sekusergalleries.directory"
---

## Что такое directory?

Сниппет показывает, сколько места пользователь занял и сколько ещё доступно.

## Использование

Пример вызова directory:

``` php
[[!directory]]
```

Можно указать шаблоны:

``` php
[[!directory? &tplDirContainer=`directory.container` &tplDirGraph=`directory.bargraph`]]
```

Дополнительные опции см. в свойствах сниппета.

## Свойства

| Имя            | Описание                                                                                                                                                                                                                       | По умолчанию                     | Версия |
| --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | ------- |
| tplDirContainer | Контейнер для столбчатой диаграммы.                                                                                                                                                                                       | directory.container         | >0.0.1  |
| tplDirGraph     | Столбчатая диаграмма со статистикой.                                                                                                                                                                                                      | directory.bargraph          | >0.0.1  |
| loadjquery      | Загружает jQuery, поставляемый с sekUserGalleries. Значение 1 или 0 переопределяет системную настройку sekusergalleries.load\_jquery.                                                                     | load\_jquery system setting | >0.0.3  |
| customcss       | Чтобы использовать свой CSS вместо стандартного, укажите путь относительно папки assets modx (например «sitefolder/assets/css/custom.css» вводите как «&customcss=`css/custom.css`»). |                             | >0.0.3  |
| graphcss        | Как customcss: загружает CSS для внешнего вида столбчатой диаграммы.                                                                                                                                                |                             | >0.0.3  |
