---
title: "xPDOQuery"
translation: "extending-modx/xpdo/class-reference/xpdoquery"
---

`XPDOQuery` расширяет класс `xPDOCriteria` и позволяет вам абстрагировать сложные запросы SQL в формат ООП. Это позволяет инкапсулировать вызовы SQL, чтобы они могли работать с несколькими типами баз данных, а также легко читаться и динамически создаваться.

1. [xPDOQuery.andCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.andcondition)
2. [xPDOQuery.groupby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby)
3. [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin)
4. [xPDOQuery.leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin)
5. [xPDOQuery.limit](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.limit)
6. [xPDOQuery.orCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.orcondition)
7. [xPDOQuery.rightJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin)
8. [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select)
9. [xPDOQuery.setClassAlias](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias)
10. [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby)
11. [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where)

## Примеры

Возьмите первые 4 коробки с:

1. Владельцы, которые имеют букву «а» в своих именах
2. Ширина не менее 10
3. Высота не 2
4. Цвет red, blue или green
5. Отсортировано по имени ящика по возрастанию, а затем по высоте ящика по убыванию

```php
$query = $xpdo->newQuery('Box');
// Помните: синтаксис здесь это имя класса, ваш псевдоним. Обратите внимание, что фильтры используют псевдоним.
$query->innerJoin('Owner','User');
// Владелец на самом деле является объектом User, определенным как Владелец в псевдониме отношения
$query->where(array(
    'Owner.name:LIKE' => '%a%',
    'Box.width:>=' => 10,
    'Box.height:!=' => 2,
    'Box.color:IN' => array('red','green','blue'),
));
$query->sortby('Box.name','ASC');
$query->sortby('Box.height','DESC');
$query->limit(4);
$boxes = $xpdo->getCollection('Box',$query);
```

Вы также можете выполнять более сложные запросы, например так:

```php
$query = $xpdo->newQuery('Person');
$query->where(array(
    array(
        'first_name:=' => 'Bob',
        array(
            'OR:last_name:LIKE' => 'Boblablaw',
            'AND:gender:=' => 'M',
        ),
    ),
    'password:!=' => null,
));
```

переводит на:

```php
(
  (      `Person`.`first_name` = 'Bob'
    OR ( `Person`.`last_name` LIKE 'Boblablaw' AND `Person`.`gender` = 'M' )
  )
  AND password IS NOT NULL
)
```

Обратите внимание, что если вы указываете условие в строке ключа, например `'OR:disabled:!=' => true`, вам также необходимо указать операнд. Это означает, что вы должны `specify = explicitly`, например, в: `'AND:gender:=' => 'M'`

### Действительные операторы

```php
$c = $xpdo->newQuery('Person');
$c->where(array(
  'name:=' => 'John', /* Равно */
  'name:!=' => 'Sue', /* Неравно */
  'age:>' => '21', /* Больше чем */
  'age:>=' => '21', /* Больше или равно */
  'age:<' => '18', /* Меньше, чем */
  'age:<=' => '18', /* Меньше или равно */
  'search:LIKE' => 'Term', /* LIKE statement */
  'field' => null, /* проверка на NULL */
  'ids:IN' => array(1,2,3), /* IN statement */
));
```

## Отладка

Иногда вам нужно посмотреть, какой запрос на самом деле генерируется. Вы можете сделать это, подготовив запрос и выдав его с помощью метода **`toSQL()`**.

```php
$c = $xpdo->newQuery('Person');
// добавить фильтры здесь...
$c->prepare();
print $c->toSQL();
```

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
