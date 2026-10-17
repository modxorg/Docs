---
title: "xPDO.getValidationRules"
description: "Возвращает правила валидации, определённые для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getvalidationrules"
---

## xPDO::getValidationRules

Возвращает правила валидации, определённые для класса в его схеме, с ключом — именем поля. Каждое правило описывает свои `name`, `type` и параметры.

## Синтаксис

```php
array|null getValidationRules (string $className)
```

## Пример

```php
$rules = $xpdo->getValidationRules('modResource');
```

## Смотрите также

-   [xPDOObject.addValidationRule](extending-modx/xpdo/class-reference/xpdoobject/validation/addvalidationrule "xPDOObject.addValidationRule")
-   [Object Validation](extending-modx/xpdo/class-reference/xpdoobject/validation "Object Validation")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")