---
title: "modMail"
translation: "extending-modx/services/modmail"
---

## Что такое modMail?

`modMail` абстрактный класс, который можно расширить для предоставления почтовых сервисов для Revolution. Он не может быть запущен сам по себе, но должен быть расширен с помощью класса реализации (такого как `PHPMailer`).

### Что такое modPHPMailer?

`modPHPMailer` - это класс, который расширяет `modMail`, чтобы обеспечить реализацию класса `PHPMailer` с открытым исходным кодом.

## Использование

Следующий пример основан на нативном `modPHPMailer`, который поставляется с MODX Revolution.

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

## API и настройки

### Методы

Помимо методов `set()`, `address()`, `send()` и `reset()`, использованных выше, реализация modPHPMailer предоставляет:

- `header($header)` — добавить «сырой» заголовок в сообщение;
- `attach($file, $name = '', $encoding = 'base64', $type = 'application/octet-stream')` — прикрепить файл;
- `embedImage($image, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream')` — встроить картинку (на нее ссылается `$cid` в HTML-теле);
- `clearEmbeddedImages()` / `clearAttachments()` — удалить ранее добавленные картинки/вложения перед повторным использованием объекта;
- `setHTML($toggle)` — переключить режим plain-text/HTML (использован в примере выше);
- `hasError()` / `getError()` — проверить наличие и прочитать ошибку почтового движка;
- `getDefaultAttributes()` — резолвленные атрибуты по умолчанию (см. ниже).

### Константы атрибутов

`set()` и `get()` принимают ключи, определенные константами класса `modMail`: `MAIL_BODY`, `MAIL_BODY_TEXT`, `MAIL_CHARSET`, `MAIL_CONTENT_TYPE`, `MAIL_ENCODING`, `MAIL_ENGINE`, `MAIL_ENGINE_PATH`, `MAIL_ERROR_INFO`, `MAIL_FROM`, `MAIL_FROM_NAME`, `MAIL_HOSTNAME`, `MAIL_LANGUAGE`, `MAIL_PRIORITY`, `MAIL_READ_TO`, `MAIL_SENDER`, `MAIL_SERVICE`, `MAIL_SUBJECT`, SMTP-набор (`MAIL_SMTP_AUTH`, `MAIL_SMTP_HELO`, `MAIL_SMTP_HOSTS`, `MAIL_SMTP_KEEPALIVE`, `MAIL_SMTP_PASS`, `MAIL_SMTP_PORT`, `MAIL_SMTP_SECURE`, `MAIL_SMTP_AUTOTLS`, `MAIL_SMTP_SINGLE_TO`, `MAIL_SMTP_TIMEOUT`, `MAIL_SMTP_USER`) и DKIM-набор (`MAIL_DKIM_SELECTOR`, `MAIL_DKIM_IDENTITY`, `MAIL_DKIM_DOMAIN`, `MAIL_DKIM_PRIVATEKEYFILE`, `MAIL_DKIM_PRIVATEKEYSTRING`, `MAIL_DKIM_PASSPHRASE`).

### Системные настройки

`getDefaultAttributes()` читает значения по умолчанию из системных настроек, поэтому почтовый движок настраивается на сайте без кода:

- `mail_use_smtp` — если включена, вместо PHP `mail()` заполняются SMTP-атрибуты ниже;
- `mail_smtp_auth`, `mail_smtp_helo`, `mail_smtp_hosts` (по умолчанию `localhost`), `mail_smtp_keepalive`, `mail_smtp_pass`, `mail_smtp_port` (по умолчанию `25`), `mail_smtp_secure`, `mail_smtp_autotls` (по умолчанию `true`), `mail_smtp_single_to`, `mail_smtp_timeout` (по умолчанию `10`), `mail_smtp_user`;
- `mail_dkim_selector`, `mail_dkim_identity`, `mail_dkim_domain`, `mail_dkim_privatekeyfile`, `mail_dkim_privatekeystring`, `mail_dkim_passphrase`;
- `mail_charset` (по умолчанию `UTF-8`), `mail_encoding` (по умолчанию `8bit`).

Смотрите [Отправка почты](building-sites/sending-mail) для настройки этих опций в менеджере.

## Смотрите также

- [MODX Services](extending-modx/services "MODX Сервисы")
- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService")
- [Отправка почты](building-sites/sending-mail)
