---
title: "xPDO.getFieldAliases"
description: "Возвращает карту псевдонимов полей, определённых для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldaliases"
---

## xPDO::getFieldAliases

Возвращает карту псевдонимов полей класса, где ключ — имя псевдонима, а значение — поле, на которое он указывает. Псевдонимы полей объявляются в схеме как `<alias key="..." field="..."/>` и позволяют читать поле под другим именем.

## Синтаксис

```php
array getFieldAliases (string $className)
```

## Пример

```php
$aliases = $xpdo->getFieldAliases('sfStore');
// array('postalcode' => 'zip')
```

## Смотрите также

-   [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")