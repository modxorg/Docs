---
title: "getPrimaryKey"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getprimarykey"
---

## xPDOObject::getPrimaryKey

Возвращает значение поля первичного ключа объекта, либо массив значений для составного первичного ключа.

Для составного первичного ключа, если какая-то часть пуста или `null` и у этого поля в метаданных задан `default`, значение по умолчанию записывается обратно в поля объекта и используется. Если поле допускает `null`, используется `null`. Иначе метод возвращает `null` вместо массива.

## Синтаксис

```php
mixed getPrimaryKey ([boolean $validateCompound = true])
```

-   `$validateCompound` — при `true` (по умолчанию) неполный составной первичный ключ без допустимого значения по умолчанию даёт `null`; при `false` частичные значения возвращаются массивом.

## Пример

```php
$resource = $modx->getObject('modResource', 42);
echo $resource->getPrimaryKey();
// 42
```

## Смотрите также

-   [getPK](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpk "getPK")
-   [getPKType](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpktype "getPKType")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")