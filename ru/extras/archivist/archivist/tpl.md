---
title: "tpl"
description: "Chunk tpl сниппета Archivist: плейсхолдеры и значение по умолчанию"
translation: "extras/archivist/archivist/tpl"
---

## Chunk tpl Archivist

Это chunk, который выводится через параметр &tpl сниппета [Archivist](extras/archivist/archivist "Archivist.Archivist").

## Значение по умолчанию

``` php
<li class="[[+cls]]">
    <a href="[[+url]]" title="[[+date]]">[[+date]]</a> ([[+count]])
</li>
```

## Доступные плейсхолдеры

| Имя               | Описание                                                                       |
| ----------------- | ------------------------------------------------------------------------------ |
| url               | URL соответствующего архива.                                                   |
| cls               | CSS-класс из параметра вызова сниппета Archivist.                              |
| date              | Отформатированный период, который архивируется.                                |
| count             | Число ресурсов за эту «дату».                                                  |
| month             | Номер месяца (01, 07, 11 и т. д.).                                             |
| month\_name       | Название месяца.                                                               |
| month\_name\_abbr | Сокращённое название месяца.                                                   |
| year              | Год из четырёх цифр.                                                           |
| day               | Число дня (01, 24, 31 и т. д.).                                                |
| day\_formatted    | День с суффиксом th, rd или nd (1st, 2nd, 3rd).                                |
| weekday           | Название дня недели.                                                           |
| weekday\_idx      | Индекс дня недели.                                                             |

## См. также

1. [Сниппет Archivist](extras/archivist/archivist)
   1. [Archivist tpl](extras/archivist/archivist/tpl)
2. [Сниппет ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [Сниппет getArchives](extras/archivist/archivist.getarchives)
   1. [getArchives tpl](extras/archivist/archivist.getarchives/tpl)
