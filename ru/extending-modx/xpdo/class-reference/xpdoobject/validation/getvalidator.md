---
title: "getValidator"
description: "Получает класс xPDOValidator, настроенный для этого экземпляра."
translation: "extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator"
---

## xPDOObject::getValidator()

Получает класс `xPDOValidator`, настроенный для этого экземпляра.

## Синтаксис

```php
xPDOValidator|null getValidator ()
```

Класс валидатора берётся из опции `xPDO::OPT_VALIDATOR_CLASS` и по умолчанию равен `xPDO\Validation\xPDOValidator`. Правила для класса объекта подгружаются при первом обращении — см. [_loadValidation()](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation "_loadValidation").

## Смотрите также

-   [_loadValidation](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation)
-   [validate](extending-modx/xpdo/class-reference/xpdoobject/validation/validate)
-   [isValidated](extending-modx/xpdo/class-reference/xpdoobject/validation/isvalidated)
