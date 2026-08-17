---
title: "tagLister"
description: "Extra tagLister для навигации по тегам: облако тегов, списки и фильтрация ресурсов"
translation: "extras/taglister/index"
---

## Что такое tagLister?

tagLister это сниппет, который выводит список тегов для навигации по тегам, например облако тегов. Теги это уникальные значения заданной TV (отдельной переменной для тегов). tagLister работает вместе с несколькими связанными сниппетами.

**tagLister** размещают на странице, где нужно показать уникальные теги. Сниппет getResourcesTag размещают на странице со ссылками на ресурсы с выбранным тегом.

Если разложить задачу по частям, **tagLister** решает три задачи: показать теги записи, вывести облако всех доступных тегов и открыть страницу со всеми ресурсами с выбранным тегом. Эти три задачи выполняют три встроенных сниппета **tagLister**.

Ниже три компонента, которые нужно настроить.

### 1. Показать все страницы с заданным тегом

Создайте страницу для вывода всех ресурсов с выбранным тегом. На ней разместите сниппет **getResourcesTag**. По сути это расширение сниппета [getResources](extras/getresources "getResources"), поэтому аргументы почти те же.

Если вы тегируете ресурсы только в одной папке, укажите ID этой страницы в аргументе **&parents**. Иначе используйте `0`, чтобы искать по всему сайту.

```php
[[!getResourcesTag? &parents=`0` &tagKey=`my_tags` &tpl=`result_tpl`]]
```

- **&tagKey**: уникальное имя TV с тегами
- **&tpl**: чанк для форматирования каждого результата (как в **getResources**)

Запомните ID этой страницы: он понадобится на следующем шаге.

### 2. Показать все теги страницы

На следующем шаге выводят теги, назначенные конкретной странице. Для этого используйте сниппет **toLinks**. Он ведёт на ID страницы из шага 1.

```php
[[!toLinks? &items=`[[*my_tags]]` &target=`123`]]
```

В аргумент **&items** передайте значение TV: какими тегами помечена страница. Укажите имя вашей TV.

### 3. Вывести облако тегов

Третья типичная задача: облако тегов со всеми доступными тегами. Для неё используйте третий сниппет из набора **tagLister**.

## Требования

- Серия ресурсов (например, записи блога) с TV для автоматического тегирования
- Страница для вывода всех ресурсов с выбранным тегом (страница результатов поиска)
- MODX Revolution 2.0.0-RC-2 или новее
- PHP5 или новее

## История

tagLister написал [Shaun McCormick](https://github.com/splittingred). Первый релиз вышел 14 июня 2010 года.

### Загрузка

Пакет можно установить через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management") или скачать из репозитория MODX Extras: <https://modx.com/extras/package/taglister>

### Разработка и сообщения об ошибках

Исходный код tagLister хранится на GitHub: <http://github.com/splittingred/tagLister>

Ошибки можно сообщать здесь: <http://github.com/splittingred/tagLister/issues>

## Использование

tagLister содержит один сниппет, который выводит список использованных тегов из указанной TV.

В состав tagLister входят три сниппета:

- [tagLister](extras/taglister/taglister "tagLister"): выводит наиболее часто используемые теги.
- [getResourcesTag](extras/taglister/taglister.getresourcestag "tagLister.getResourcesTag"): выбирает ресурсы, отфильтрованные по тегам.
- [tolinks](extras/taglister/taglister.tolinks "tagLister.tolinks"): превращает список через запятую в ссылки.

## Примеры

Получите список тегов из TV `tags` (разделитель: запятая) и направьте ссылки на главную страницу:

```php
[[!tagLister? &tv=`tags`]]
```

Получите список тегов из TV `blog-tags` (разделитель: пробел) и направьте ссылки на ресурс с ID 123:

```php
[[!tagLister? &tv=`blog-tags` &tvDelimiter=` ` &target=`123`]]
```

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
