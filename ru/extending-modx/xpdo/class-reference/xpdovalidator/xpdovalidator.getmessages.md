---
title: "xPDOValidator.getMessages"
translation: "extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages"
---

## xPDOValidator::getMessages

Получить сообщения проверки, сгенерированные [validate()](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate "xPDOValidator.validate"), если таковые существуют.

Каждое сообщение представляет собой массив со следующими ключами:

-   `field` - Название поля, которое было проверено.
-   `name` - Название правила проверки.
-   `message` - Возвращаемое сообщение об ошибке.

## Синтаксис

API Doc: <http://api.modxcms.com/xpdo/om/xPDOValidator.html#getMessages>

```php
array getMessages ()
```

## Пример

Проверьте, нет ли ошибок при проверке. Если это так, верните ошибки и распечатайте в браузере.

```php
$validator = $obj->getValidator();
if ($validator->validate() == false) {
   $errorMessages = $validator->getMessages();
   foreach ($errorMessages as $message) {
       echo 'An error occurred on field "'.$message['field'].'": '.$message['message'];
   }
}
```

## Смотрите также

1. [xPDOValidator.addMessage](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.addmessage)
2. [xPDOValidator.getMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.getmessages)
3. [xPDOValidator.hasMessages](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.hasmessages)
4. [xPDOValidator.validate](extending-modx/xpdo/class-reference/xpdovalidator/xpdovalidator.validate)
