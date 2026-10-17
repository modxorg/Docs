---
title: "getValidator"
description: "Возвращает класс валидатора, настроенный для этого экземпляра."
translation: "extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator"
---

## xPDOObject::getValidator()

Возвращает валидатор, настроенный для этого экземпляра. Класс берётся из опции `xPDO::OPT_VALIDATOR_CLASS` и по умолчанию равен `xPDO\Validation\xPDOValidator`; в MODX 3 он переопределён на `MODX\Revolution\Validation\modValidator`. Глобальное имя `xPDOValidator` в 3.x **недоступно** — в `core/include/deprecated.php` нет алиаса для него, поэтому разрешается только namespaced-имя.

Правила для класса объекта подгружаются при первом обращении методом [`_loadValidation()`](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation "_loadValidation").

## Синтаксис

```php
xPDO\Validation\xPDOValidator|null getValidator ()
```

## Пример

```php
$validator = $object->getValidator();
if ($validator->hasMessages()) {
    print_r($validator->getMessages());
}
```

## Смотрите также

-   [_loadValidation](extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation)
-   [validate](extending-modx/xpdo/class-reference/xpdoobject/validation/validate)
-   [isValidated](extending-modx/xpdo/class-reference/xpdoobject/validation/isvalidated)