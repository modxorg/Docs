---
title: "_loadValidation"
translation: "extending-modx/xpdo/class-reference/xpdoobject/validation/loadvalidation"
---

## xPDOObject::_loadValidation

Загружает правила валидации, определённые для класса объекта, в валидатор. Вызывается автоматически из [getValidator()](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator "getValidator") при первом обращении к валидации; передайте `true`, чтобы принудительно перезагрузить правила.

## Синтаксис

```php
void _loadValidation ([boolean $reload = false])
```

## Пример

```php
$object->_loadValidation(true);
```

## Смотрите также

-   [getValidator](extending-modx/xpdo/class-reference/xpdoobject/validation/getvalidator "getValidator")
-   [addValidationRule](extending-modx/xpdo/class-reference/xpdoobject/validation/addvalidationrule "addValidationRule")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")