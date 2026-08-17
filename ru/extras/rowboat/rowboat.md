---
title: "Rowboat"
description: "Свойства сниппета Rowboat для выборки строк из таблицы"
translation: "extras/rowboat/rowboat.md"
---

## Сниппет Rowboat

Сниппет перебирает строки любой таблицы базы данных.

## Использование

Первые 10 Doodles из таблицы modx\_doodles, сортировка по name:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &sortBy=`name`
]]
```

Чанк «myDoodle»:

``` php
<li id="doodle[[+id]]"><strong>[[+name]]</strong> - [[+description]]</li>
```

## Доступные свойства

| Name              | Description                                                                                                                              | Default  |
| ----------------- | ---------------------------------------------------------------------------------------------------------------------------------------- | -------- |
| tpl               | Чанк для каждой строки. Если пусто, выводится массив доступных плейсхолдеров.                                        |          |
| table             | Обязательно. Таблица для выборки.                                                                                                |          |
| columns           | JSON с колонками и алиасами. Если не задано, выбираются все колонки.              | \*       |
| where             | JSON для WHERE.                                                                                                     |          |
| sortBy            | Поле сортировки, если задано.                                                                                                         |
| sortDir           | Направление сортировки.                                                                                                                | ASC      |
| limit             | Лимит строк. По умолчанию 10. 0: все.                                                              | 10       |
| offset            | Стартовый индекс при лимите.                                                                                             | 0        |
| cacheResults      | 1: кешировать результат запроса.                                                                               | 1        |
| cacheTime         | Секунды кеша, если cacheResults = 1.                                                               | 3600     |
| placeholderPrefix | Префикс глобальных плейсхолдеров, например total.                                                                       | rowboat. |
| outputSeparator   | Разделитель между записями.                                                                                                  |          |
| toPlaceholder     | Если задано, вывод в плейсхолдер, сниппет вернёт пустую строку.                                                              |          |
| debug             | 1: таблица с информацией о запросе и результатах. На production оставьте 0. | 0        |

## Свойства чанка tpl

В чанке &tpl доступны выбранные колонки и:

| Name    | Description                                                             |
| ------- | ----------------------------------------------------------------------- |
| \_idx   | Индекс строки.                                                  |
| \_alt   | 1 для чётной строки, 0 для нечётной.                                          |
| \_first | 1, если строка первая в наборе страницы. |
| \_last  | 1, если строка последняя в наборе страницы.  |

## Примеры

Топ 10 Doodles по name из modx\_doodles, где name содержит «Test»:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]
```

Только id, name и description (description с алиасом «desc»). Неалиased колонки требуют пустой алиас «»:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &columns=`{"id":"","name":"","description":"desc"}`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]
```

10 Doodles, где description не пустой **или** name равен «Test»:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"description:!=":"","OR:name":"Test"}`
   &sortBy=`name`
]]
```

Скоро добавим ещё примеры.

### Использование [getPage](extras/getpage "getPage") с Rowboat

Задайте totalVar в getPage как «rowboat.total» и cache=`0`. Пример: все doodles, где name содержит «Fun», по 10 на страницу с навигацией:

``` php
[[!getPage?
   &element=`Rowboat`
   &table=`modx_doodles`
   &sortBy=`name`
   &where=`{"name:LIKE":"%Fun%"}`
   &totalVar=`rowboat.total`
   &tpl=`myDoodle`
   &cache=`0`
   &limit=`10`
]]
<div class="paging">
<ul class="pageList">
  [[!+page.nav]]
</ul>
</div>
```

## Подводные камни

Будьте осторожны с &columns: несуществующая колонка даст пустой результат вызова Rowboat.

## См. также

1. [Rowboat.Rowboat](extras/rowboat/rowboat)
