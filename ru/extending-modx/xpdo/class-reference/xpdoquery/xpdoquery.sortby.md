---
title: "xPDOQuery.sortby"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby"
---

## xPDOQuery::sortby

Добавьте в запрос предложение `ORDER BY`.

## Синтаксис

API Docs: [xPDOQuery::sortby()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::sortby()>)

```php
xPDOQuery sortby (string $column, [string $direction = 'ASC'])
```

## Пример

Получить все объекты Box, отсортированные по имени.

```php
$query = $xpdo->newQuery('Box');
$query->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$query);
```

Вы можете отсортировать в случайном порядке, ссылаясь на `RAND()`:

```php
$query = $xpdo->newQuery('Box');
$query->sortby('RAND()');
$boxes = $xpdo->getCollection('Box',$query);
```

Аналогично, вы можете передать любую допустимую функцию базы данных в метод `sortby`, например, `FIELD()` чтобы определить конкретный порядок для ваших результатов:

```php
$query = $xpdo->newQuery('modResource');
$query->sortby('FIELD(modResource.id, 4,7,2,5,1 )');
$boxes = $xpdo->getCollection('modResource',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
