---
title: "xPDO.getFieldMeta"
description: "Возвращает метаданные полей, определённых для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta"
---

## xPDO::getFieldMeta

Возвращает карту метаданных полей класса, где ключ — имя поля. Каждая запись описывает тип в базе данных (`dbtype`), тип в PHP (`phptype`), допустимость `null`, значение по умолчанию и информацию об индексах.

## Синтаксис

```php
array getFieldMeta (string $className, [boolean $includeExtended = false])
```

-   `$className` — класс, для которого нужен ответ.
-   `$includeExtended` — при `true` включаются поля, унаследованные от родительских классов.

## Пример

```php
$meta = $xpdo->getFieldMeta('modResource');
print_r($meta['pagetitle']);
```

## Смотрите также

-   [xPDO.getFieldAliases](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldaliases "xPDO.getFieldAliases")
-   [xPDO.getFields](extending-modx/xpdo/class-reference/xpdo/xpdo.getfields "xPDO.getFields")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")