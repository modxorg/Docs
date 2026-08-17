---
title: "getRTImages"
description: "Извлечение и вывод изображений из Rich Text TV в MODX"
translation: "extras/getrtimages/index"
---

## Основы

1. Настройте Rich Text TV
2. Установите getRTImages через Package Management
3. Вызовите сниппет
4. Оформите вывод чанком
5. Редакторы загружают любое число изображений через Rich Text Editor, они выводятся на странице. Плохая разметка в TV не мешает, извлекаются только img.

## Сценарий использования

Подходит для простых слайдшоу. Изображения на уровне ресурса, интерфейс знаком авторам контента. Rich Text Editor.

Есть gallery Extras с большими возможностями, но часто это «слишком много». MIGX обычно выбирают для такого, но нужна настройка. getRTImages проще объяснить. Чище в Resource Tree, чем вложенные Resources для картинок, для чего Resources не предназначены.

Это один из вариантов слайдшоу и галерей в MODX, выбирайте под задачу.

## Как использовать

### **Examples**

#### Вызов сниппета

``` php
[[getRTImages? &tv=`rich_text_TV` &tpl=`image_list_tpl`]]
```

 Извлекает html img, атрибуты src, alt, title и data-index как плейсхолдеры в &tpl Chunk. По умолчанию до 10 изображений, меняется через &limit.

#### Template Chunk

``` html
<li><a href="[[+src]]" title="[[+title]]"><img src="[[+src]]" alt="[[+alt]]"></a></li>
```

### **Available Placeholders**

| `[[+src]]`   | Атрибут "src" элемента img.                           |
| ------------ | ----------------------------------------------------------------- |
| `[[+alt]]`   | Атрибут "alt"...                                            |
| `[[+title]]` | Атрибут "title"...                                          |
| `[[+index]]` | Значение атрибута из свойства "indexAttr". |

### **Properties**

| Property             | Description                                                                                  | Required? | Default                                       |
| -------------------- | -------------------------------------------------------------------------------------------- | --------- | --------------------------------------------- |
| **&id**              | ID ресурса для значения TV.                                           | Yes       | Current Resource: `[[*id]]`                   |
| **&tv**              | Имя TV для извлечения изображений.                                                     | Yes       | null (snippet will return nothing if not set) |
| **&tpl**             | Чанк для вывода.                                                     | No        | null (snippet will print an array of results) |
| **&outputSeparator** | Разделитель результатов.                                             | No        | PHP\_EOL                                      |
| **&sort**            | Сортировка. See below for details.                                      | No        | ASC (php asort function)                      |
| **&indexAttr**       | Атрибут для ключа index массива.                               | No        | data-index                                    |
| **&limit**           | Лимит результатов. При dump в array игнорируется. | No        | 10                                            |

#### Sort Options

| Property Value     | PHP function | Behaviour                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| ------------------ | ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 'ASC'              | asort()      | The position of the elements in the array seems to affect priority of sorting using this method. As such, values are prioritized in this order: index, src, alt, title. Which means, when the "indexAttr" property is defined, and there are values in those attributes, those values will act as a "sort order index". This gives the end user or content author control over sorting by adding incremental values to the "data-index" attribute, for example. |
| 'DESC'             | arsort()     | Same as above but in reverse order.                                                                                                                                                                                                                                                                                                                                                                                                                             |
| 'natural'          | natsort()    | Although this is meant to sort items the way a human would do it, using it on an array (like we are) has unexpected results. This feature is experimental at best.                                                                                                                                                                                                                                                                                              |
| 'RAND' or 'random' | shuffle()    | Random sorting.                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| '0' or null        | DOM ordering | This will return results in the same order in which they appear in the source html. This is also an easy, intuitive way to give end users control over sort order.                                                                                                                                                                                                                                                                                              |

## Дополнительные ресурсы

- [MODX Extras Repo](https://modx.com/extras/package/getrtimages)
- [getRTImages blog post](http://www.sepiariver.ca/blog/modx-web/getrtimages-list-and-sort-images-from-rich-text-field)
- [GitHub repo](https://github.com/sepiariver/getRTImages/)
- [More information on PHP array sorting](http://php.net/manual/en/array.sorting.php)
