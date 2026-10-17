---
title: "xPDO.getSelectColumns"
description: "Возвращает список колонок выборки через запятую для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getselectcolumns"
---

## xPDO::getSelectColumns

Формирует список колонок для выборки по классу через запятую, при необходимости уточняя его алиасом таблицы и префиксом колонок. Именно этот список `xPDOQuery::select()` разворачивает, когда получает `'*'`.

## Синтаксис

```php
string getSelectColumns (string $className, [string $tableAlias = ''], [string $columnPrefix = ''], [array $columns = array()], [boolean $exclude = false])
```

-   `$className` — класс, колонки которого нужно перечислить.
-   `$tableAlias` — необязательный алиас, уточняющий каждую колонку.
-   `$columnPrefix` — необязательный префикс, добавляемый к имени каждой колонки (используется, чтобы избежать конфликтов при объединении таблиц).
-   `$columns` — явный список колонок; если пуст, используются все поля класса.
-   `$exclude` — если `true`, перечисленные колонки исключаются, а не выбираются.

## Пример

```php
$columns = $xpdo->getSelectColumns('Box', 'Box', 'Box_');
// Box.id, Box.name, Box.width, ...
```

## Смотрите также

-   [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")