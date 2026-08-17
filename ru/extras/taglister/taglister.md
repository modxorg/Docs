---
title: "tagLister"
description: "Сниппет tagLister выводит список наиболее часто используемых тегов на сайте"
translation: "extras/taglister/taglister"
---

## Сниппет tagLister

Этот сниппет выводит список наиболее часто используемых тегов на вашем сайте.

## Использование

Разместите сниппет там, где нужен список популярных тегов. Передайте ID или имя TV и ID целевого ресурса для ссылок:

```php
[[!tagLister? &tv=`tags` &target=`123`]]
```

## Свойства

| Name          | Description                                                                            | Default Value |
| ------------- | -------------------------------------------------------------------------------------- | ------------- |
| tpl           | Имя чанка для каждого результата.                                                     | tag           |
| tv            | Имя или ID TV для тегов.                                                              | tags          |
| tvDelimiter   | Разделитель тегов в TV. Обычно запятая, иногда пробел.                                | ,             |
| target        | Целевой ресурс для ссылок на теги.                                                      | 1             |
| tagVar        | Параметр запроса для вывода тега в шаблоне tpl по умолчанию.                          | tag           |
| tagKeyVar     | Параметр запроса для вывода ключа в шаблоне tpl по умолчанию.                         |               |
| sortBy        | Поле сортировки: tag или count.                                                         | count         |
| sortDir       | Направление сортировки.                                                                 | ASC           |
| limit         | Ограничивает число возвращаемых тегов.                                                  | 10            |
| cls           | CSS-класс для каждой строки.                                                            | tl-tag        |
| all           | Показывать ссылку «Все теги».                                                           | false         |
| allTpl        | Имя чанка для ссылки «Все теги»                                                         | all           |
| altCls        | CSS-класс для каждой чередующейся строки.                                               | tl-tag-alt    |
| firstCls      | Необязательно. CSS-класс для первой строки. Пустое значение игнорируется.             |               |
| lastCls       | Необязательно. CSS-класс для последней строки. Пустое значение игнорируется.          |               |
| activeCls     | Необязательно. CSS-класс для активной строки. Пустое значение игнорируется.           |               |
| toPlaceholder | Если задано, вывод сниппета попадёт в этот плейсхолдер вместо прямого вывода.         |               |
| toLower       | При 1/true теги приводятся к нижнему регистру.                                          | false         |
| weights       |                                                                                        | 0             |
| weightCls     |                                                                                        |               |
| parents       | Список родителей через запятую для ограничения поиска тегов.                            |               |
| depth         | Глубина поиска среди родителей.                                                         | 10            |

## Чанки tagLister

tagLister обрабатывает 2 чанка. Соответствующие параметры:

- [tpl](extras/taglister/taglister/tpl "tpl"): чанк для каждого выводимого тега.
- [allTpl](extras/taglister/taglister/all "all"): чанк для ссылки «Все теги».

## Примеры

Выведите топ-5 тегов для TV `tags` со ссылками на ресурс с ID 123:

```php
[[!tagLister? &tv=`tags` &limit=`5` &target=`123`]]
```

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
