---
title: "Archivist"
description: "Сниппет Archivist: ссылки на архивы по месяцам или годам"
translation: "extras/archivist/archivist"
---

## Сниппет Archivist

Этот сниппет выводит ссылки на архивы по месяцам или годам.

## Использование

Разместите сниппет там, где нужен список архивов. Укажите родителей, из которых брать архивы, и целевой ресурс для загрузки архивов через сниппет [getArchives](extras/archivist/archivist.getarchives "Archivist.getArchives").

``` php
[[!Archivist? &target=`123` &parents=`4,12,33`]]
```

## Доступные параметры

| Имя           | Описание                                                                                                                                                  | По умолчанию |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
| tpl           | Chunk для вывода каждого результата по месяцу или году.                                                                                                   | row          |
| target        | Ресурс, на котором вызывается getArchives и отображаются результаты фильтра архива.                                                                       |              |
| parents       | Список ID родителей через запятую.                                                                                                                        |              |
| depth         | Глубина поиска ресурсов от каждого родителя.                                                                                                              | 10           |
| sortBy        | Поле для сортировки и группировки результатов.                                                                                                            | publishedon  |
| sortDir       | Направление сортировки. По умолчанию DESC.                                                                                                                | DESC         |
| limit         | Ограничивает число возвращаемых ресурсов.                                                                                                                 | 10           |
| start         | Необязательно. Смещение, с которого пропускать ресурсы в выборке.                                                                                         | 0            |
| useMonth      | Если 1, в списке архивов используется месяц.                                                                                                               | 1            |
| useDay        | Если 1, в списке архивов используется день.                                                                                                               | 0            |
| dateFormat    | Необязательно. Формат даты по синтаксису MySQL DATE\_FORMAT() для каждой строки. Если пусто, Archivist вычислит его автоматически.                      |              |
| useFurls      | Если true, ссылки генерируются в формате Friendly URL.                                                                                                    | 1            |
| extraParams   | Необязательно. Если задано, добавляется к URL каждой строки.                                                                                              |              |
| cls           | CSS-класс для каждой строки.                                                                                                                              | arc-row      |
| altCls        | CSS-класс для каждой чередующейся строки.                                                                                                                 | arc-row-alt  |
| firstCls      | Необязательно. CSS-класс для первой строки. Если пусто, игнорируется.                                                                                     |              |
| lastCls       | Необязательно. CSS-класс для последней строки. Если пусто, игнорируется.                                                                                  |              |
| filterPrefix  | Префикс GET-параметров в ссылках Archivist. Должен совпадать с filterPrefix в вызове getArchives.                                                         | arc\_        |
| toPlaceholder | Если задано, вывод сниппета записывается в плейсхолдер вместо прямого вывода.                                                                            |              |
| setLocale     | Если true, Archivist вызывает setlocale с вашим cultureKey, если cultureKey не «en».                                                                      | true         |
| grSnippet     | Имя сниппета для вывода результатов.                                                                                                                      | getResources |

## Chunks Archivist

Archivist обрабатывает один chunk. Соответствующий параметр:

- [tpl](extras/archivist/archivist/tpl "Archivist.Archivist.tpl"): chunk для каждого выводимого результата.

## Примеры

Выведите список месяцев архивов для ресурсов с ID 2, 4 и 6. По клику переход на страницу 123:

``` php
[[!Archivist? &target=`123` &parents=`2,4,6`]]

```

## См. также

1. [Archivist.Archivist](extras/archivist/archivist)
   1. [Archivist.Archivist.tpl](extras/archivist/archivist/tpl)
2. [Archivist.ArchivistGrouper](extras/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](extras/archivist/archivist.getarchives)
   1. [Archivist.getArchives.tpl](extras/archivist/archivist.getarchives/tpl)
