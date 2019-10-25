---
title: "modMail"
translation: "extending-modx/services/modmail"
---

## Что такое modMail?

`modMail` абстрактный класс, который можно расширить для предоставления почтовых сервисов для Revolution. Он не может быть запущен сам по себе, но должен быть расширен с помощью класса реализации (такого как `PHPMailer`).

### Что такое modPHPMailer?

`modPHPMailer` - это класс, который расширяет `modMail`, чтобы обеспечить реализацию класса `PHPMailer` с открытым исходным кодом.

### Другие реализации ModMail

- [modSwiftMailer](https://modx.com/extras/revo/modswiftmailer "modSwiftMailer") - Может быть загружен через Управление пакетами.

## Использование

Следующий пример основан на нативном `modPHPMailer`, который поставляется с MODX Revolution.

Допустим, у нас есть шаблон электронной почты в чанке `myEmailTemplate`. Мы хотим отправить его по электронной почте на адрес `user@example.com` с адресом «От» `me@example.org`. Мы также хотим, чтобы это было электронное письмо в формате HTML. Вот как мы это сделаем:

``` php
$message = $modx->getChunk('myEmailTemplate');

$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,'me@example.org');
$modx->mail->set(modMail::MAIL_FROM_NAME,'Johnny Tester');
$modx->mail->set(modMail::MAIL_SUBJECT,'Check out my new email template!');
$modx->mail->address('to','user@example.com');
$modx->mail->address('reply-to','me@xexample.org');
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
}
$modx->mail->reset();
```

Легко, нет?

Обратите внимание, что мы должны запустить `reset()`, если мы хотим отправить почту снова: это сбрасывает все поля на пустые. Кроме того, приведенные выше поля являются _необязательными_ (точно так же, как и PHPMailer), так что если вы не хотите указывать 'reply-to' (хотя мы рекомендуем это!), Вы можете это сделать.

Кроме того, если вы хотите отправить электронное письмо на несколько адресов, вы можете просто снова позвонить по адресу ('to'), например так:

``` php
$modx->mail->address('to','user@example.com');
$modx->mail->address('to','mom@example.org');
```

И, наконец, приведенный выше пример кода отправит сообщение в наш error.log, если письмо не было отправлено по какой-либо причине (обычно это неверная конфигурация сервера).

## Плейсхолдеры в вашем чанке

В приведенном выше примере, [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk") был использован в качестве почтового сообщения. Смотрите документацию по этой функции, чтобы узнать, как использовать ее необязательный второй аргумент. Что касается `modMail`, то используемые плейсхолдеры полностью зависят от вас: вам даже не нужно использовать `getChunk` вообще. Вы также можете легко передать `modMail::MAIL_BODY`, устанавливающий статическую строку.

## Что если я хочу использовать другой класс электронной почты?

Просто - просто расширьте `modMail` этим классом, затем загрузите свой класс через [getService](extending-modx/modx-class/reference/modx.getservice "modX.getService"). Вы получите всю функциональность `modMail`, но для этого вам потребуется предоставить класс-оболочку (например, `modPHPMailer`).

## Смотрите также

- [MODX Services](extending-modx/services "MODX Сервисы")
- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService")
- [modSwiftMailer](https://modx.com/extras/revo/modswiftmailer "modSwiftMailer")
