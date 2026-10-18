---
title: "getIterator"
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getiterator"
---

## xPDOObject::getIterator

Возвращает `xPDO\xPDOIterator` по объектам, связанным с текущим через указанный псевдоним связи. Это экономный по памяти способ обойти большой набор связанных объектов: загружается по одному объекту за раз.

## Синтаксис

```php
xPDO\xPDOIterator|false getIterator (string $alias, [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

## Пример

```php
$wheels = $box->getIterator('Wheels');
foreach ($wheels as $wheel) {
    echo $wheel->get('position');
}
```

## Смотрите также

-   [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
-   [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")