---
title: "xPDOValidator.hasMessages"
description: "Указывает, что сообщения проверки были сгенерированы validate()."
translation: "extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages"
---

## xPDOValidator::hasMessages

Указывает, что сообщения проверки были сгенерированы [validate()](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate "xPDOValidator.validate").

## Синтаксис

```php
boolean hasMessages ()
```

## Пример

Посмотрите, существуют ли какие-либо сообщения для проверенного объекта.

```php
$validator = $obj->getValidator();
$validator->validate();

$failed = $validator->hasMessages();
echo $failed ? 'Oh noes! We failed!' : 'Success!';
```

## Смотрите также

1. [xPDOValidator.addMessage](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate)
