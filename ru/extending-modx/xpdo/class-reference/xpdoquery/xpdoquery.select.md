---
title: "xPDOQuery.select"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select"
---

## xPDOQuery::select

Укажите столбцы для возврата из запроса SQL.

## Синтаксис

API Docs: [xPDOQuery::select()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::select()>)

```php
getSelectColumns($className, $tableAlias= '', $columnPrefix= '', $columns= array (), $exclude= false)
```

```php
xPDOQuery select ([string $columns = '*'])
```

При выборе полей **всегда** обязательно включайте хотя бы первичный ключ таблицы, в противном случае xPDO не сможет сделать объект из него и потеряться в рекурсии с ошибкой превышения максимального числа вложенных функций в 100.

## Пример

Получить коллекцию ящиков, только с полями ID и name.

```php
$query = $xpdo->newQuery('Box');
$query->select($xpdo->getSelectColumns('Box','Box','',array('id','name')));
$boxes = $xpdo->getCollection('Box',$query);
```

## Использование с toArray()

Важно отметить, что `toArray()` будет по умолчанию использовать значения отложенной загрузки, поэтому он эффективно переопределяет значения, которые вы передали методу `select()`. Чтобы `toArray()` следовал вместе с тем, что вы передали в `select()`, вы устанавливаете для его третьего параметра значение `true`.

```php
$query = $xpdo->newQuery('modUser');
$query->select('id,username');
$users = $xpdo->getCollection('modUser',$query);
foreach ($users as $u) {
    print_r($u->toArray()); // will print ALL fields.
    print_r($u->toArray('',false,true)); // will print ONLY the selected fields.
}
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")

Функция работает с массивом имен полей или строкой, разделенной запятыми:

```php
xPDOQuery select ([string $columns = '*'])
xPDOQuery select ([array $columns =  array()])
```

The example in the API docs passes `select()` the results of `getSelectColumns()`, which returns a comma-delimited list (a string).
