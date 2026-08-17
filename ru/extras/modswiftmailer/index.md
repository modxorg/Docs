---
title: "modSwiftMailer"
description: "Расширение modMail на базе Swift Mailer для гибкой отправки почты в MODX"
translation: "extras/modswiftmailer/index"
---

На некоторых плохо мигрированных копиях MODX пакет может не установиться. Та же проблема возможна при стандартной установке, если папки не принадлежат Apache/root. Подробнее в разделе устранения неполадок.

## Что такое modSwiftMailer?

modSwiftMailer: сторонний core add-on от Mark Ernst. Расширяет [modMail](developing-in-modx/advanced-development/modx-services/modmail "modMail") и даёт более настраиваемую реализацию нативного modMail (в связке с PHPMailer). modSwiftMailer основан на [Swift Mailer](http://swiftmailer.org/), open-source библиотеке Chris Corbyn. Использование modSwiftMailer почти совпадает с modPHPMailer по базовой функциональности, но есть отличия и преимущества.

### Текущая версия

Текущая версия поддерживает около 90% обычного функционала Swift Mailer. Что добавлено, исправлено и улучшено, см. в changelog.txt.

## Требования

- MODX Revolution 2.0.2-pl или новее
- PHP5 или новее
- Знание [modMail](developing-in-modx/advanced-development/modx-services/modmail "modMail")

## История

modSwiftMailer создал и написал Mark Ernst (ReSpawN). Релиз: 18 июля 2011 года.

### Загрузка

modSwiftMailer доступен в [репозитории MODX Extras](https://modx.com/extras/package/modswiftmailer) и в [Package Management](developing-in-modx/advanced-development/package-management "Package Management") менеджера MODX Revolution.

## Использование

Переход с modPHPMailer на modSwiftMailer сделан максимально простым. Ниже код почти не отличается от того, что у вас уже есть.

### Простое письмо

Сначала создадим простое письмо. Удобный фрагмент для теста кода.

```php
$modx->getService('mail', 'mail.modSwiftMailer');

$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->subject('Dear GOD why won\'t my code function properly!');
$modx->mail->body(print_r($data, true));

$modx->mail->send();
```

Вставьте этот код в сниппет. При правильной настройке MODX вы получите письмо с темой и выведенным массивом.

**Вы могли заметить**, что по сравнению с modPHPMailer не хватает нескольких строк. Например, modMail::MAIL_FROM, reply-to, setHTML, обработка ошибок и reset.
modSwiftMailer по умолчанию отправляет text/html письма в UTF-8 с 8bit-кодировкой. Любой чанк можно встроить в modSwiftMailer без смены defaults или переопределения поведения (например setHTML). Подробнее ниже.

После первого письма modSwiftMailer можно расширять примерами ниже.

## Примеры

### Простая отправка

Код ниже отправляет письмо **одному** получателю. В цикле for(each) после каждой итерации используйте $modx->mail->reset().

```php
$modx->getService('mail', 'mail.modSwiftMailer');

$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->subject('A simple e-mail');
$modx->mail->body('<h1>Simple e-mail</h1><p>With a basic message</p>');

$modx->mail->send();
```

### Несколько получателей

modSwiftMailer позволяет отправить письмо массиву получателей. Есть несколько способов.

Сначала запустите сервис modSwiftMailer.

```php
$modx->getService('mail', 'mail.modSwiftMailer');
```

modSwiftMailer принимает разные форматы. У каждого свой результат.

```php
$modx->mail->address('to', 'recipient@domain.tld', 'Recipient');
```

Добавит **один** адрес «recipient@domain.tld» с **именем** «Recipient».

Пример с частью актёров How I Met Your Mother:

```php
$modx->mail->address('to', array(
    'barneystinson@howimetyourmother.tld' => 'Barney Stison',
    'tedmosby@howimetyourmother.tld' => 'Ted Mosby'
));
```

Добавит **два** адреса: «barneystinson@howimetyourmother.tld» с **именем** «Barney Stison» и «tedmosby@howimetyourmother.tld» с **именем** «Ted Mosby».

Ещё вариант: одному человеку на несколько адресов. Редкий случай, но возможен.

```php
$modx->mail->address('to', array(
    'barneystinson@howimetyourmother.tld',
    'tedmosby@howimetyourmother.tld'
), 'How I Met Your Mother cast');
```

Добавит **два** адреса с общим **именем** «How I Met Your Mother cast».

Если форма подключена к [FormIt postHook](extras/formit/formit.hooks "FormIt.Hooks") с необязательным полем fullname (или name, или username), письма не будут выглядеть некрасиво.

```php
$modx->mail->address('to', array(
    'barneystinson@howimetyourmother.tld',
    'tedmosby@howimetyourmother.tld' => 'Ted Mosby'
));
```

Чаще всего используют первый, второй и четвёртый примеры.

В [FormIt postHook](extras/formit/formit.hooks "FormIt.Hooks") можно отправить копию BCC (*B*lind *C*arbon *C*opy):

```php
$modx->mail->address('bcc', 'phantom@theopera.tld', 'Phantom');
```

Дальше задают отправителя письма:

```php
$modx->mail->address('sender', 'sender@domain.tld');
$modx->mail->address('from', 'from@domain.tld', 'Graphical sender');
```

«sender» всегда попадает в заголовки письма. Обычно это no-reply адрес веб-сервера, но не всегда. Чтобы снизить риск попадания в спам, используйте его (если само письмо не «спамное», это не спасёт). «from» видит почтовая программа: имя рядом с темой («Graphical sender») и в деталях (или заголовках) как Graphical sender <from@domain.tld>.

Можно задать bounce и reply-to. Без reply-to modSwiftMailer возьмёт sender или from (зависит от программы).

```php
$modx->mail->bounce('bounce@domain.tld');
$modx->mail->receipt('receipt@domain.tld');
$modx->mail->replyto('no-reply@domain.tld');
```

receipt не поддерживается браузерами. Outlook и Thunderbird могут воспринять его как подтверждение прочтения.

Наконец отправьте письмо всем получателям (to, cc и bcc) с темой и телом:

```php
$modx->mail->subject('A subject');
$modx->mail->body('Some content');

$modx->mail->send();
```

## Устранение неполадок

### Письма не отправляются

**Использую native mail()**
SMTP-провайдер не принимает команды или адрес получателя неверен. На локальной машине (Windows 32/64bit, Linux или Mac) нужен рабочий SMTP хоста. Часто его находят через tracert внешнего IP (проверено на Windows). В tracert появится часть хоста (dynamic.host.tld). Укажите это значение в php.ini (WAMP, LAMP).

**Использую sendmail (Linux)**
Настройка зависит от дистрибутива. Проверьте MAIL_ENGINE_PATH (для sendmail) и его работу. Можно сравнить с modPHPMailer. Если modPHPMailer работает, а modSwiftMailer нет, сообщите автору.

**Использую внутренний SMTP (ISP)**
ISP: ваш «SMTP provider» в разделе **I am using native mail()**. См. тот раздел.

**Использую внешний SMTP**
Проверьте аутентификацию. SMTP обычно требует hostname, port и credentials (user: smtp@domain.tld, pass: **doh**?).

### Письма не уходят из‑за Return-Path

Задайте все три (лучше все): sender, bounce (Return-Path) и from.

### Пакет не устанавливается

Возможный сбой. Установите CHMOD 0777 на каталог model/modx/mail и повторите установку.

Отчёты об ошибках пока через форум MODX:

<https://forums.modx.com/index.php/topic,66815.0.html>
