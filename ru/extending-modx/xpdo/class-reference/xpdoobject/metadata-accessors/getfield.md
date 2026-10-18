---
title: "getField"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfield"
---

## xPDOObject::getField

Разрешает имя поля или псевдоним в фактическое имя поля объекта. Если `$key` — объявленное поле, оно возвращается без изменений; если это псевдоним поля, возвращается само поле.

## Синтаксис

```php
string|boolean getField (string $key, [boolean $validate = false])
```

-   `$key` — имя поля или псевдоним для разрешения.
-   `$validate` — при `true` возвращает `false`, если ключ не является ни полем, ни псевдонимом; при `false` (по умолчанию) ключ возвращается как передан.

## Пример

```php
$store = $xpdo->getObject('sfStore', 1);
echo $store->getField('postalcode');
// 'zip'
```

## Смотрите также

-   [xPDO.getFieldAliases](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldaliases "xPDO.getFieldAliases")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")