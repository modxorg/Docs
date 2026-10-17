---
title: "xPDOQuery.from"
description: "Задаёт таблицу (класс), из которой запрос выбирает данные."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.from"
---

## xPDOQuery::from

Задаёт класс (и, соответственно, таблицу), из которой запрос выбирает данные, при необходимости с псевдонимом. Это переопределяет класс, переданный в `newQuery()`.

## Синтаксис

```php
xPDOQuery from (string $class, [string $alias = ''])
```

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->from('Box', 'B');
```

## Смотрите также

-   [xPDOQuery.setClassAlias](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias "xPDOQuery.setClassAlias")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")