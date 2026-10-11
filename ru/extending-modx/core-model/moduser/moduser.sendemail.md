---
title: "modUser.sendEmail"
translation: "extending-modx/core-model/moduser/moduser.sendemail"
description: "Отправить письмо на адрес из профиля пользователя"
---

## modUser::sendEmail

Метод отправляет письмо на `email` связанного профиля, отображаемое имя — `fullname`. `$message` — только тело: тема берётся из `$options['subject']` либо из лексикона `emailsubject`, а `reply-to` повторяет отправителя.

Без экземпляра modX, без профиля или при неудачной загрузке почтового сервиса метод возвращает `false`. Иначе возвращается результат отправки: ошибки уходят в журнал, объект письма сбрасывается.

## Синтаксис

``` php
boolean sendEmail (string $message [, array $options = array()])
```

- `$message` _(string)_ Тело письма.
- `$options` _(array)_ Переопределяет `from` (иначе `emailsender`), `fromName` (иначе `site_name`), `sender` (иначе `emailsender`), `subject` (иначе лексикон `emailsubject`) и `html` (иначе `true`), по умолчанию `array()`.

## Пример

``` php
$user->sendEmail('Hello staff', array(
    'subject' => 'Welcome',
    'html' => false,
));
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [emailsender](building-sites/settings/emailsender)
- [site_name](building-sites/settings/site_name)
