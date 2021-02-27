---
title: "xPDO.getObjectGraph"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph"
---

## xPDO::getObjectGraph

Извлекает один экземпляр объекта и связанные объекты, определенные графиком, по заданным критериям.

Граф может быть массивом или объектом JSON, который описывает отношения из указанного `$className`.

Критериями могут быть значения первичного ключа, массив значений первичного ключа (для нескольких объектов первичного ключа) или объект `xPDOCriteria`. Если параметр `$criterts` не указан, класс не найден или объект не может быть найден по предоставленным критериям, возвращается значение null.

**Горячие модели**
Чтобы эффективно использовать `getObjectGraph`, вам необходимо понять модель данных, лежащую в основе вашего объекта. Стоит быть внимательным с файлом схемы XML, который определяет ваши объекты и их отношения. Если вы попытаетесь присоединиться к другому объекту, когда такого отношения не существует, этот метод завершится ошибкой!

## Синтаксис

API Docs: <http://api.modx.com/xpdo/xPDO.html#getObjectGraph>

```php
xPDOObject|null getObjectGraph (string $className, array|str $graph, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

## Пример использования шаблонных переменных

Прежде чем пытаться использовать этот метод для просмотра своей пользовательской модели данных, вот пример того, как ее можно использовать для извлечения встроенных объектов MODX.

### Пример чего НЕ нужно делать

У вас может возникнуть соблазн получить значения переменной шаблона MODX с помощью **getObjectGraph**:

```php
// НЕ ДЕЛАЙ ЭТОГО!!! У TV есть особые методы
$page = $modx->getObjectGraph('modResource', '{"TemplateVarResources":{}}',123);
$output = '';
foreach ($page->TemplateVarResources as $tv) {
    $output .= $tv->get('value');  // или сделать что-то еще с этим значением
}
return $output;
```

**Берегись!**
Важно понимать, что даже если вы думаете, что извлекаете один объект, этот объект может быть присоединен к _collection_ связанных объектов.

Вы заметите, что если вы используете приведенный выше пример для получения значений TV, вы иногда будете получать странные значения в кодировке JSON, которые в основном непригодны! Урок? **НЕ ПОЛЬЗУЙТЕСЬ** `getObjectGraph` для получения значений переменных шаблона! (Если значения TV не являются простым текстом или целыми числами _и_ для TV не установлено значение по умолчанию). **Это важно**: хотя вы можете получить некоторые значения таким образом, значения TV по умолчанию сохраняются в дальние углы базы данных, так что вместо этого вы должны полагаться на вспомогательную функцию **getTVValue**.

### Используйте вспомогательную функцию getTVValue

Вместо этого используйте вспомогательные функции **getTVValue** и **setTVValue**:

```php
$page = $modx->getObject('modResource', 123);
return $page->getTVValue('my_tv_name');
// or (faster)
return $page->getTVValue($tvId); // (ID of the TV)
```

## Пример

Получите объект Box с идентификатором 134 вместе с уже загруженными связанными экземплярами BoxColors и Color.

```php
$box = $xpdo->getObjectGraph('Box', array('BoxColors' => array('Color' => array())), 134);
foreach ($box->getMany('BoxColors') as $boxColor) {
    echo $boxColor->getOne('Color')->get('name');
}
```

Тот же пример, использующий параметр `$graph` в формате JSON.

```php
$box = $xpdo->getObjectGraph('Box', '{"BoxColors":{"Color":{}}}', 134);
foreach ($box->getMany('BoxColors') as $boxColor) {
    echo $boxColor->getOne('Color')->get('name');
}
```

**Нет дополнительных запросов**
Основным преимуществом использования `getObjectGraph` является получение данных из связанных таблиц в одном запросе. Никакие дополнительные запросы не выполняются, когда `getMany()` или `getOne()` вызываются для связанных объектов, которые уже загружены из `$graph`.

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO.load](extending-modx/xpdo/class-reference/xpdo/xpdo.load "xPDO.load")
-   [xPDO](extending-modx/xpdo "xPDO")
