---
title: "ArchivistGrouper"
description: "Сниппет ArchivistGrouper: группировка архивов по месяцам или годам"
translation: "extras/archivist/archivist.archivistgrouper"
---

Дополнение [Articles](extras/articles "Articles") 1.6.1 поставлялось с Archivist 1.2.3, поэтому сниппет ArchivistGrouper теперь входит в [Archivist](extras/archivist "Archivist"). Автор ещё не опубликовал документацию, но доступные параметры сниппета найдены в коде.

Описания в таблице ниже предположительные. Их стоит проверить или уточнить тем, кто знает сниппет лучше, или автору.

## Использование

Разместите сниппет там, где нужен список архивов. Укажите родителей, из которых брать архивы.

``` php
[[!ArchivistGrouper? &parents=`12`]]
```

## Доступные параметры

| Имя                 | Описание                                                                                                                                                  | По умолчанию                              |
| ------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------- |
| mode                | Режим группировки: month или year                                                                                                                         | month                                     |
| itemTpl             | Chunk для каждого элемента внутри группы                                                                                                                  |                                           |
| parents             | Список ID родителей через запятую.                                                                                                                        |                                           |
| target              | Ресурс, на котором вызывается getArchives и отображаются результаты фильтра архива.                                                                       |                                           |
| depth               | Глубина поиска ресурсов от каждого родителя.                                                                                                              | 10                                        |
| where               |                                                                                                                                                           |                                           |
| hideContainers      |                                                                                                                                                           | true                                      |
| sortBy              | Поле для сортировки и группировки результатов.                                                                                                            | publishedon                               |
| sortDir             | Направление сортировки. По умолчанию DESC.                                                                                                                | DESC                                      |
| dateFormat          | Формат даты по синтаксису MySQL DATE\_FORMAT() для каждой строки. Если пусто, ArchivistGrouper вычислит его автоматически.                                |                                           |
| limitGroups         | Ограничивает число возвращаемых групп.                                                                                                                    | 12                                        |
| limitItems          | Ограничивает число возвращаемых элементов. 0 означает без лимита?                                                                                         | 0                                         |
| resourceSeparator   |                                                                                                                                                           | \\n                                       |
| groupSeparator      |                                                                                                                                                           | \\n                                       |
| filterPrefix        | Префикс GET-параметров в ссылках Archivist. Должен совпадать с filterPrefix в вызове getArchives.                                                         | arc\_                                     |
| useFurls            | Если true, ссылки генерируются в формате Friendly URL.                                                                                                    | true                                      |
| persistGetParams    |                                                                                                                                                           | false                                     |
| extraParams         |                                                                                                                                                           |                                           |
| cls                 | CSS-класс для каждой строки.                                                                                                                              | arc-resource-row                          |
| altCls              | CSS-класс для каждой чередующейся строки.                                                                                                                 | arc-resource-row-alt                      |
| setLocale           | Если true, Archivist вызывает setlocale с вашим cultureKey, если cultureKey не «en».                                                                      | true                                      |
| groupTpl            | Chunk для каждого результата по месяцу или году.                                                                                                          | yearContainer (при mode=`year`)           |
|                     |                                                                                                                                                           | monthContainer (при mode=`month`)         |

Почти все описания совпадают с параметрами на [странице Archivist](extras/archivist/archivist.archivist "Archivist.Archivist").

## Chunks

Если шаблоны не заданы, используются значения по умолчанию. Чтобы понять, как сделать свой шаблон для групп, можно посмотреть исходный код. Для monthContainer используется такой шаблон:

``` php
<li><a href="[[+url]]">[[+month_name]] [[+year]]</a>
<ul>
[[+resources]]
</ul>
```

Обратите внимание на плейсхолдер **`[[+resources]]`**. Он передаёт результаты в itemTpl.
