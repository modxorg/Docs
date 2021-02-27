---
title: "xPDOValidator.validate"
translation: "extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate"
---

## xPDOValidator::validate

Выполняет проверку для объекта, прикрепленного к этому валидатору. Может также принимать массив параметров для передачи в правило проверки.

## Синтаксис

API Doc: <http://api.modxcms.com/xpdo/om/xPDOValidator.html#>

```php
boolean validate ([array $parameters = array()])
```

## Пример

Проверьте, не произошли ли какие-либо ошибки проверки.

```php
$validator = $obj->getValidator();
if ($validator->validate()) {
   echo 'Errors occurred!';
}
```

## Смотрите также

1. [xPDOValidator.addMessage](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate)
