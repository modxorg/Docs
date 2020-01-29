---
title: "xPDOQuery.where"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where"
---

## xPDOQuery::where

Добавьте условие `WHERE` в запрос. Как правило, это работает, когда вы добавляете оператор к атрибуту после двоеточия.

```php
array('attribute:operator' => 'value')
```

| Operator                 | Symbol   | Example                                                       |
| ------------------------ | -------- | ------------------------------------------------------------- |
| Equals                   | _none_   | `$query->where(array('width' => 15));`                        |
| Not Equals               | !=       | `$query->where(array('width:!=' => 15));`                     |
| Greater Than             | >        | `$query->where(array('width:>' => 15));`                      |
| Less Than                | <        | `$query->where(array('width:<' => 15));`                      |
| Greater Than or Equal to | >=       | `$query->where(array('width:>=' => 15));`                     |
| Less Than or Equal to    | <=       | `$query->where(array('width:<=' => 15));`                     |
| Like                     | LIKE     | `$query->where(array('width:LIKE' => '%15%'));`               |
| Not Like                 | NOT LIKE | `$query->where(array('width:NOT LIKE' => '%15%'));`           |
| Exists in                | IN       | `$query->where(array('width:IN' => array(15,16,17,20)));`     |
| Not Exists in            | NOT IN   | `$query->where(array('width:NOT IN' => array(15,16,17,20)));` |
| Is Null                  | IS       | `$query->where(array('width:IS' => null));`                   |

## Синтаксис

API Docs: [xPDOQuery::where()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::where()>)

```php
xPDOQuery where ([mixed $conditions = ''],
    [string $conjunction = xPDOQuery::SQL_AND],
    [mixed $binding = null],
    [integer $condGroup = 0])
```

## Примеры

Получить все коробки шириной 15.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$boxes = $xpdo->getCollection('Box',$query);
```

Получите все коробки шириной 15 или 10.

```php
$query = $xpdo->newQuery('Box');
$query->where(array('width' => 15));
$query->where(array('width' => 10),xPDOQuery::SQL_OR); // Вы можете использовать orCondition здесь также
$boxes = $xpdo->getCollection('Box',$query);
```

Альтернативный способ получить коробки шириной 15 или 10.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
    array( // два массива, используемые для хранения оператора OR в перечисленных условиях
        'width' => 15
    ),
    array(
        'width' => 10
    )
),xPDOQuery::SQL_OR); // используйте один массив, если нет дополнительных, где используются операторы.
$boxes = $xpdo->getCollection('Box',$query);
```

Следующий альтернативный способ - получить коробки шириной 15 или 10.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
    array(
        'width' => 15
    ),
    array(
        'OR:width:=' => 10
    )
));
$boxes = $xpdo->getCollection('Box',$query);
```

Возьмите все коробки шириной больше или равной 15, но не шириной 23.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
    'width:>=' => 15,
    'width:!=' => 23,
));
$boxes = $xpdo->getCollection('Box',$query);
```

Получите все коробки с именем с буквой 'q':

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
    'name:LIKE' => '%q%',
));
$boxes = $xpdo->getCollection('Box',$query);
```

Используйте и `&` или в одном запросе, чтобы получить все поля шириной 15 или 10 и высотой от 10 до 15.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
    array(
        'width:=' => 15, // обратите внимание, что добавляя 'AND:' или 'OR:' перед атрибутом, необходимо использовать операторd ':='
        'OR:width:=' => 10
    ),
    array(
        'AND:height:>=' => 10,
        'AND:height:<=' => 15
    )
));
$boxes = $xpdo->getCollection('Box',$query);
```

### Более сложные примеры

Если у вас более сложная модель с множеством соединенных таблиц, метод `where` должен ссылаться _только_ на **_class alias_** (не имя класса), который содержит атрибут. Ниже приведен пример запроса, переданного методом [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph"), где вы можете видеть, что объект myTable присоединен к информации профиля пользователя.

```php
$query = $modx->newQuery('myTable');
$query->where(array('Profile.fullname:LIKE' => '%Company%'));
$records = $this->ParentCMS->getCollectionGraph('myTable', '{"modUser": {"Profile":{} } }',$query);
```

Другой метод заключается в немедленной передаче массива `$criteria` в качестве второго аргумента в `newQuery`. Обратите внимание, как используется псевдоним `Resource`, поскольку именно он указан в качестве псевдонима в определении схемы для объекта `modTemplateVarResource`:

```php
$criteria = array();
$criteria['modTemplateVarResource.tmplvarid'] = 9;
$criteria['modTemplateVarResource.value:IN'] = array('Red','Green','Blue');
$criteria['Resource.template'] = 2;
$criteria = $modx->newQuery('modTemplateVarResource', $criteria);
$tvrs = $modx->getCollectionGraph('modTemplateVarResource','{"Resource":{}}', $criteria);
```

Вот несколько примеров выполнения подзапросов:

<http://forums.modx.com/index.php?topic=60287.0>
<https://github.com/netProphET/revolution/commit/464b8ff3d05f7114412ef19c3ec4729fa78ffeba>

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
