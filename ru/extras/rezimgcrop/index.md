---
title: "RezImgCrop"
description: "Output Filter для уменьшения, обрезки и перевода изображений в оттенки серого"
translation: "extras/rezimgcrop/index"
---

## Что такое RezImgCrop?

RezImgCrop это пользовательский [Output Filter](making-sites-with-modx/customizing-content/input-and-output-filters-(output-modifiers) "Input and Output Filters (Output Modifiers)") для MODX Revolution, который уменьшает изображения, обрезает их и переводит в оттенки серого.
При добавлении статей или новостей изображения часто получаются разными. Этот фильтр не ломает пропорции и создаёт каталог «rezcrop» в папке изображения, сохраняя файлы с уникальным именем, чтобы при повторном вызове вернуть уже обработанный результат даже после очистки кэша.

### Требования

- MODX Revolution 2.2.x или новее
- TV output Type: Text

### История

RezImgCrop написал [valikras](https://modx.com/extras/author/valikras), релиз 9 июня 2011 года.

### Загрузка

RezImgCrop можно скачать через менеджер MODX Revolution в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или из репозитория MODX Extras: <https://modx.com/extras/package/rezimgcrop2>

### Атрибуты

- r - уменьшает изображение,
- c - обрезает изображение,
- g - переводит цветное изображение в оттенки серого,
   WxH - w = ширина, H = высота (в пикселях)

## Примеры использования

Уменьшение по ширине и обрезка:

``` php
[[*tv.images:rezimgcrop=`r-150x,c-150x75`]]
```

Уменьшаем, обрезаем и переводим в оттенки серого:

``` php
[[*tv.images:rezimgcrop=`r-150x,c-150x75,g-`]]
```

Минимальный размер 150px:

``` php
[[*tv.images:rezimgcrop=`min-150`]]
```

Минимум 150px, затем обрезка:

``` php
[[*tv.images:rezimgcrop=`min-150,c-150x150`]]
```

Уменьшение по ширине:

``` php
[[*tv.images:rezimgcrop=`r-150x`]]
```

Уменьшение по ширине:

``` php
[[*tv.images:rezimgcrop=`r-150x0`]]
```

Уменьшение по высоте:

``` php
[[*tv.images:rezimgcrop=`r-0x75`]]
```

Уменьшение по высоте:

``` php
[[*tv.images:rezimgcrop=`r-x75`]]
```

Если указать два параметра уменьшения, изображение сожмётся непропорционально. Лучше задать ширину, затем применить crop.

``` php
[[*tv.images:rezimgcrop=`r-150x75`]]
```
