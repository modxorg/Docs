---
title: "xPDO.getCollectionGraph"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph"
---

## xPDO::getCollectionGraph

Извлекает коллекцию `xPDOObjects` и связанных объектов по указанному`xPDOCriteria`.

Если ничего не найдено, возвращает пустой массив.

## Синтаксис

API Docs: <http://api.modx.com/xpdo/xPDO.html#getCollectionGraph>

```php
array getCollectionGraph (string $className, array|str $graph, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

Помните, что если вы используете карту xPDO и файлы классов, которые были сгенерированы из схемы XML, имя класса **не** совпадает с именем вашей таблицы. Если сомневаетесь, взгляните на XML-файл схемы, например,

```php
<object class="MyClassName" table="my_class_name" extends="xPDOObject">
```

## Пример

Получите коллекцию объектов Box со связанными объектами BoxColors и Color, где Box имеет ширину 40.

```php
$boxes = $xpdo->getCollectionGraph('Box', '{"BoxColors":{"Color":{}}}', array('Box.width' => 40));
foreach ($boxes as $box) {
    foreach ($box->getMany('BoxColors') as $boxColor) {
        echo "A box with width of 40 and a color of " . $boxColor->getOne('Color')->get('name') . " was found.\n";
    }
}
```

**Нет дополнительных запросов**
Основным преимуществом использования getCollectionGraph является получение данных из связанных таблиц в одном запросе. Никакие дополнительные запросы не выполняются, когда `getMany()` или `getOne()` вызываются для связанных объектов, которые уже загружены из `$graph`. Графики являются полезной альтернативой использованию соединений xPDO.

## Отладка

При использовании `getCollectionGraph` необходимо учитывать несколько предостережений. Вы не можете использовать традиционные методы "prepare" и "toSQL". Рассмотрим следующий код:

```php
$criteria['modResource.id:IN'] = array(1,2,3);
$criteria['TemplateVarResources.tmplvarid'] = 5;
$criteria = $modx->newQuery('modResource', $criteria);
$criteria->prepare();
print $criteria->toSQL();
$pages = $modx->getCollectionGraph('modResource', '{"TemplateVarResources":{"TemplateVar":{}}}', $criteria);
```

Если вы посмотрите на запрос, то увидите, что в объекте `$critree`, который указывает JOIN, нет ничего присущего. Вы указываете столбцы в нескольких таблицах (`modResource` и `TemplateVarResources`), но если вы посмотрите на запрос при использовании метода `toSQL()`, вы обнаружите, что запрос не будет выполнен.

Объединение связанных таблиц происходит в этом случае, когда выполняется функция `getCollectionGraph()`, поэтому попытка распечатать SQL до этого момента не даст точного результата.

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO](extending-modx/xpdo "xPDO")
