---
title: "Получение объектов"
translation: "extending-modx/xpdo/retrieving-objects"
---

Чтобы получить объекты в xPDO, существует множество методов. Здесь мы рассмотрим две основные темы: различия между объектом, коллекцией и итератором.

**Объект** - это отдельный `xPDOObject`, ни больше, ни меньше. Он извлекается через `xPDO::getObject()`. Думайте об этом как об одной строке в таблице базы данных.
**Коллекция** - это массив `xPDOObjects`. Они извлекаются через `xPDO::getCollection`. Думайте об этом как о списке строк в таблице.
**Итератор** - это особый вид `Collection`, к которому осуществляется последовательный доступ, так что все строки и представляющие их объекты не загружаются в память одновременно.

### [xPDO::getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")

`getObject` принимает 3 аргумента:

-   `$className` -это имя класса, которое вы хотите получить
-   `$criteria` - критерий, по которому вы хотите его искать
-   `$cacheFlag`- опция кэширования для объекта.

Если для аргумента `$cacheFlag` указано целочисленное значение, оно указывает время нахождения в кеше объекта, если `cacheFlag === false`, кэширование для объекта игнорируется, а если `cacheFlag === true`, объект будет находиться в кэше бесконечно долго.

Вернемся к `$criteria`. Это может быть одна из 3 вещей:

-   Значение первичного ключа
-   массив полей
-   Объект или производная от xPDOCriteria.

Мы вернемся к третьему варианту позже. Во-первых, пример первого варианта:

```php
$box23 = $xpdo->getObject('Box',23);
```

Если объект не существует, он вернет `null`.

Вы можете указать несколько критериев фильтрации внутри вашего второго аргумента:

```php
// GroupUser - это таблица с двумя полями - `user` и `group`
$gu = $xpdo->getObject('GroupUser',array(
    'user' => 12,
    'group' => 4,
));
```

Или, скажем, мы хотели получить первый найденный нами объект Box шириной 150:

```php
$bigbox = $xpdo->getObject('Box',array('width' => 150));
```

**Полезный совет**
Если ваш критерий соответствует нескольким объектам, `getObject` вернет только _первый_. Какой будет первым? Это зависит от базы данных и как ее естественный порядок сортировки.

Мы обсудим третий вариант, `xPDOCriteria`, позже в разделах`xPDOQuery` и `xPDOCriteria`.

### [xPDO::getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")

`xPDO::getCollection` принимает те же три аргумента, что и `getObject`, за исключением того, что поле `$tests` должно быть либо массивом, либо объектом `xPDOCriteria``.

Допустим, мы хотели получить все объекты Box шириной 14:

```php
// предположим, у нас есть 3 коробки
$boxes = $xpdo->getCollection('Box',array(
  'width' => 14,
));
foreach ($boxes as $box) {
   echo $box->get('color')."\n";
}
// Если бы наши 3 коробки имели цвет 'red','blue' и 'yellow', это напечатало бы:
// red
// blue
// yellow
```

### [xPDO::getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")

Метод `xPDO::getIterator` идентичен `xPDO::getCollection`, за исключением того, что вы можете получить доступ только к одному `xPDOObject` из коллекции строк одновременно. Если вам нужен доступ ко всем объектам/строкам одновременно, используйте `getCollection`. В противном случае с точки зрения использования памяти более эффективно использовать `getIterator` для циклического перебора коллекции `xPDOObjects`.

Код для перебора объектов Box шириной 14 практически идентичен коду `getCollection`:

```php
// предположим, у нас есть 3 коробки, с цветами 'red','blue' и 'yellow'
$boxes = $xpdo->getIterator('Box', array(
  'width' => 14,
));
foreach ($boxes as $box) {
   echo $box->get('color')."\n";
}
// это напечатало бы:
// red
// blue
// yellow
```

Обратите внимание, что индекс для каждого объекта при повторном выполнении не является первичным ключом, в отличие от индекса массива при использовании `getCollection`.

### [xPDO::newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")

Одна из самых мощных частей xPDO - это возможность создавать сложные запросы простым способом, используя [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") обертку. Этот класс позволяет создавать запросы SQL с использованием методов ООП, расширяющих класс `xPDOCriteria` - вы можете передавать его экземпляр прямо в вызовы `getObject` или `getCollection`. Функция `newQuery` создает [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") объект, и принимает 3 параметра:

-   `$class` - Имя класса, для которого создается запрос.
-   `$criteria` - Это необязательно, но вы можете указать критерии здесь.
-   `$cacheFlag` - Как и в `getObject's cacheFlag`, вы можете указать поведение кэширования для этого запроса.

Во-первых, давайте просто покажем, как вы можете использовать `newQuery` для определения критериев, которые мы использовали ранее: width = 14. Мы просто добавим параметр сортировки для сортировки результатов.

```php
$c = $xpdo->newQuery('Box');
$c->where(array('width' => 14));
$c->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$c);
```

Получив свой результат, вы можете перебирать массив (см. Выше). Вы можете увидеть сходство между определением объекта запроса и передачей простого массива в `getObject` или `getCollection`. Так зачем использовать [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")? Это более гибко. Вы видели, как мы могли бы использовать это, чтобы указать порядок сортировки?

Далее, давайте использовать запрос, чтобы присоединиться к связанной таблице, используя [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Давайте создадим пример запроса, используя [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") это возьмет первые 5 ящиков шириной 5 и владельца ID 2, отсортированные по их имени. Наша таблица "Box" имеет отношение "многие ко многим" с таблицей "BoxOwner".

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // аргументами являются className, alias
$c->where(array(
    'width' => 5,
    'Owner.user' => 2,
));
$c->sortby('name','ASC');
$c->limit(5);
$boxes = $xpdo->getCollection('Box',$c);
```

Мы можем присоединиться к 3-му столу («Owner»), используя другой вызов [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Давайте также возьмем 2-е 5 ящиков, указав смещение - это 2-й аргумент функции `limit()`:

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // аргументами являются: className, alias
$c->innerJoin('User','User','Owner.user = User.id');
// обратите внимание на третий аргумент, который определяет отношения во innerJoin
$c->where(array(
    'Box.width' => 5,
    'User.user' => 2,
));
$c->sortby('Box.name','ASC');
$c->limit(5,5); // limit, offset
$boxes = $xpdo->getCollection('Box',$c);
```

Вы можете видеть, что функции `sortby` и где функции могут иметь точечный синтаксис для своих параметров. Они могут добавлять к своим столбцам псевдонимы - иногда они должны делать это для предотвращения столкновений!

Больше информации о [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") можно найти [здесь](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery").

Схему xml можно найти в основной папке установки MODX, здесь: _model/schema/modx.mysql.schema.xml_ (полезно получить classNames, aliases и т.д. для ваших запросов)

#### Отладка

Зачастую полагаться на уровень ORM может быть непонятно, поэтому вы можете заставить xPDO распечатывать необработанные запросы к базе данных.

```php
$c = $xpdo->newQuery('Box');
// ... добавить еще несколько критериев...
$c->prepare();
print $c->toSQL();
```

### xPDOCriteria

Одна из самых мощных частей xPDO - это возможность создавать сложные запросы простым способом, используя обертку [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery"). Этот класс позволяет создавать запросы SQL с использованием методов ООП, расширяющих класс xPDOCriteria - вы можете передать его экземпляр прямо в вызовы `getObject` или `getCollection`. Функция `newQuery` создает [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") объект, и принимает 3 параметра:

-   `$class` - Имя класса, для которого создается запрос.
-   `$criteria` - Это необязательно, но вы можете указать критерии здесь.
-   `$cacheFlag` - Как и в `getObject's cacheFlag`, вы можете указать поведение кэширования для этого запроса.

Во-первых, давайте просто покажем, как вы можете использовать `newQuery` для определения критериев, которые мы использовали ранее: width = 14. Мы просто добавим параметр сортировки для сортировки результатов.

```php
$c = $xpdo->newQuery('Box');
$c->where(array('width' => 14));
$c->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$c);
```

Получив свой результат, вы можете перебирать массив (см. Выше). Вы можете увидеть сходство между определением объекта запроса и передачей простого массива в `getObject` или `getCollection`. Так зачем использовать [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")? Это более гибко. Вы видели, как мы могли бы использовать это, чтобы указать порядок сортировки?

Далее, давайте использовать запрос, чтобы присоединиться к связанной таблице, используя [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Давайте создадим пример запроса, используя [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") это возьмет первые 5 ящиков шириной 5 и владельца ID 2, отсортированные по их имени. Наша таблица "Box" имеет отношение "многие ко многим" с таблицей "BoxOwner".

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // аргументами являются className, alias
$c->where(array(
    'width' => 5,
    'Owner.user' => 2,
));
$c->sortby('name','ASC');
$c->limit(5);
$boxes = $xpdo->getCollection('Box',$c);
```

Мы можем присоединиться к 3-му столу («Owner»), используя другой вызов [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Давайте также возьмем 2-е 5 ящиков, указав смещение - это 2-й аргумент функуии `limit()`:

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // аргументами являются: className, alias
$c->innerJoin('User','User','Owner.user = User.id');
// обратите внимание на третий аргумент, который определяет отношения во innerJoin
$c->where(array(
    'Box.width' => 5,
    'User.user' => 2,
));
$c->sortby('Box.name','ASC');
$c->limit(5,5); // limit, offset
$boxes = $xpdo->getCollection('Box',$c);
```

Вы можете видеть, что функции `sortby` и где функции могут иметь точечный синтаксис для своих параметров. Они могут добавлять к своим столбцам псевдонимы - иногда они должны делать это для предотвращения столкновений!

Больше информации о [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") можете найти [здесь](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery").

Смотрите также [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")

## Графы

Графы расширяют представление об объекте (или объектах в коллекциях). Вместо простого объекта граф включает ссылки на связанные объекты. Графики являются полезной альтернативой JOIN.

### xPDO::getObjectGraph

Это то же самое, что и `getCollectionGraph`, но оно возвращает один объект. Смотрите `getCollectionGraph` ниже для информации.

### xPDO::getCollectionGraph

```php
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}');
if ($collection) {
    foreach ($collection as $obj) {
        $out = $obj->toArray();
        $out['timezone'] = $obj->TZ->get('tzname');
        $out['state'] = $obj->ST->get('statename');
        $out['county'] = $obj->CT->get('countyname');
        print_r($out);
    }
}
```

**Псевдонимы в JSON**
Помните, что хэш JSON, переданный в `getObjectGraph` или `getCollectionGraph`, должен использовать _псевдонимы_, а не имена классов.

У вас есть прямой доступ ко всем полям (строкам таблицы) в графе коллекции, содержащемся в этих четырех таблицах. Псевдоним используется для создания графика. В этом примере таблица «Zip» является первичной таблицей, поэтому мы смотрим на эту таблицу и определяем отношения с точки зрения этой первичной таблицы.

Как и в случае с `getObject` и `getCollection`, мы можем предоставить объект `$tests` для `getCollectionGraph`. Давайте добавим некоторые критерии к нашему запросу `getCollectionGraph()`. В этом примере мы можем искать почтовые индексы в Калифорнии (Калифорния)

```php
$criteria = $modx->newQuery('Zip');
$criteria->where(array('ST.statename' => 'CA'));
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}', $criteria);
if ($collection) {
    foreach ($collection as $obj) {
        $out = $obj->toArray();
        $out['timezone'] = $obj->TZ->get('tzname');
        $out['state'] = $obj->ST->get('statename');
        $out['county'] = $obj->CT->get('countyname');
        print_r($out);
    }
}
```

**Псевдонимы в критериях**
Имена таблиц, которые вы указываете в своих критериях, должны использовать _псевдонимы_, а не имена классов (как хеши JSON).

Покажем еще один пример, на этот раз с использованием таблиц MODX. Это только пример: фильтрация по переменным шаблона немного опасна, поскольку значения, хранящиеся в базе данных, не всегда являются точными значениями, которые вы используете в менеджере или в ваших шаблонах. Но этот пример должен помочь продемонстрировать использование псевдонимов и то, что вы должны знать об отношениях между объектами (некоторые связанные объекты являются единичными, некоторые являются массивами).

```php
$criteria = array();
$criteria['modResource.id:IN'] = array(1,2,3);
$criteria['TemplateVarResources.tmplvarid'] = 5;
$criteria = $modx->newQuery('modResource', $criteria);
$pages = $modx->getCollectionGraph('modResource', '{"TemplateVarResources":{"TemplateVar":{}}}', $criteria);
if ($pages) {
    foreach ($pages as $p) {
        print $p->get('pagetitle');
        foreach ($p->TemplateVarResources as $tvr) {
            $name = $tvr->TemplateVar->get('name');
            print $name . ' is '. $tvr->get('value');
        }
    }
}
```

Пожалуйста, просмотрите специальную страницу: [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph")

## Смотрите также

-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
-   [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
-   [xPDO.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDO.where")
