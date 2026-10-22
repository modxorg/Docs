---
title: Отправка почты
translation: "building-sites/sending-mail"
description: "Настройка исходящей почты в MODX: SMTP, DKIM, параметры провайдеров и проверка."
---

В MODX есть [встроенный сервис почты](extending-modx/services/modmail). Он отправляет письма через PHP-функцию `mail()` или SMTP-сервер.

Письма уходят в нескольких случаях:

- Сброс пароля и вход без пароля.
- Формы на сайте, обычно через [FormIt](extras/formit).
- Свой код, использующий почтовый сервис.

Во всех случаях действуют системные настройки почты. Они находятся в разделе «Система» (иконка шестерёнки) → «Системные настройки». Ищите по `mail_` или включите фильтр области **Почта**. Две связанные настройки лежат в других областях: `emailsender` — в **Авторизации и безопасности**, `site_name` — в **Сайте**.

По умолчанию MODX отправляет почту через PHP `mail()`. Эта функция зависит от настроек сервера и часто даёт плохую доставляемость. Настройте SMTP.

## Включение отправки через SMTP

1. Включите `mail_use_smtp`.
2. Включите `mail_smtp_auth`, если сервер требует авторизацию.
3. Укажите SMTP-сервер в `mail_smtp_hosts`. Несколько хостов разделяйте `;`, MODX попробует их по порядку; у каждого хоста можно указать порт (`smtp1.example.com:587;smtp2.example.com`). Хост может начинаться с `ssl://` или `tls://`.
4. Задайте `mail_smtp_port`. Значение после установки — `587`; также часто используют `465`. Многие провайдеры блокируют исходящий порт `25`.
5. Введите логин и пароль в `mail_smtp_user` и `mail_smtp_pass`.
6. Если сервер требует явное шифрование, задайте `mail_smtp_secure`: `tls` или `ssl`. `tls` используют с портом 587 или 2525, `ssl` — с портом 465. В MODX 3 настройка называется `mail_smtp_secure`; в старых версиях — `mail_smtp_prefix`.

Шаги 3–6 зависят от почтового сервера или сервиса. Точные значения смотрите в их документации.

Отдельные инструкции:

- [Amazon SES](building-sites/sending-mail/amazon-ses)
- [Mailtrap.io](building-sites/sending-mail/mailtrap)

### Частые SMTP-провайдеры

Значения ниже — отправные; сверьте их с провайдером. App password или SMTP credentials создавайте в панели провайдера, когда это требуется.

| Провайдер | Хост | Порт | `mail_smtp_secure` | Авторизация |
| --- | --- | --- | --- | --- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` / `465` | `tls` / `ssl` | App password или OAuth; обычный пароль аккаунта обычно отклоняют |
| Yandex Mail | `smtp.yandex.com` или `smtp.yandex.ru` | `465` / `587` | `ssl` на 465, `tls` на 587 | App password в настройках Yandex Mail |
| Mail.ru | `smtp.mail.ru` | `465` / `587` | `ssl` / `tls` | App password в настройках безопасности Mail.ru |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Актуальные требования — в справке Rambler |
| Mailgun | `smtp.mailgun.org` или `smtp.eu.mailgun.org` | `587` / `465` / `2525` | `tls` на 587 и 2525, `ssl` на 465 | SMTP credentials на домен в Mailgun |
| VPS или shared hosting | Хост от провайдера | Часто `587` или `465` | Зависит от хоста | Исходящий `25` часто блокирует провайдер |

В [`emailsender`](building-sites/settings/emailsender) укажите адрес, который разрешает провайдер: тот же ящик или адрес на подтверждённом домене отправки.

Если FormIt сообщает об успехе, а письмо не приходит, установите [QuickEmail](extras/quickemail) и проверьте SMTP без хуков FormIt. См. также раздел диагностики на [простой контактной странице](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## Проверка отправки

Установите [QuickEmail](extras/quickemail) через [менеджер пакетов](building-sites/extras).

Добавьте вызов сниппета в ресурс:

```
[[!QuickEmail? &debug=`1`]]
```

Откройте ресурс в браузере, где выполнен вход в менеджер. Без сессии менеджера (контекст `mgr`) QuickEmail вернёт `Unauthorized`. С `debug` он отправит тестовое письмо и покажет SMTP-лог.

Если отправка не удалась, проверьте порт, `mail_smtp_secure` и учётные данные. PHPMailer скрывает логин и пароль на этом уровне отладки, но ответ сервера показывает.

**Удалите вызов сниппета после проверки.** Пока он опубликован, любой пользователь с сессией менеджера может отправить тестовое письмо с этой страницы.

## Подпись DKIM

DKIM позволяет получателю проверить, что письмо отправил ваш домен и что по пути его не изменили. MODX подписывает исходящие письма через PHPMailer. SPF и DMARC по-прежнему настраиваются в DNS и у почтового провайдера.

Задайте в системных настройках:

- [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector) — селектор; публикуется в DNS как `<selector>._domainkey.<domain>`.
- [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain) — домен подписи.
- [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile) — путь к файлу закрытого ключа, доступному PHP; или
- [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring) — сам ключ. Он имеет приоритет над файлом.
- [`mail_dkim_identity`](building-sites/settings/mail_dkim_identity) — необязательный идентификатор (`i=`) подписи.
- [`mail_dkim_passphrase`](building-sites/settings/mail_dkim_passphrase) — парольная фраза для зашифрованного ключа.

Подпись включается, только когда заданы домен, селектор и ключ. Опубликуйте соответствующий открытый ключ в DNS по адресу `<selector>._domainkey.<domain>`.

## Доставляемость

Доставка зависит не только от MODX. На неё влияют содержание, похожее на спам, новый IP-адрес и отсутствующие DNS-записи.

- SPF и DMARC настраиваются в DNS и у почтового провайдера. DKIM подписывает MODX ключом, опубликованным в DNS.
- IP сервера может попасть в чёрный список, если с него отправляют много спама.
- [mail-tester.com](https://www.mail-tester.com/) выдаёт одноразовый адрес и проверяет большинство факторов. Отправьте на него письмо через QuickEmail с параметром `&to`.

## Другие настройки почты

| Настройка | По умолчанию | Действие |
| --- | --- | --- |
| [`mail_smtp_autotls`](building-sites/settings/mail_smtp_autotls) | Да | PHPMailer включает STARTTLS, если сервер его предлагает, даже при пустом `mail_smtp_secure`. Поэтому порт 587 часто работает без `tls`. |
| [`mail_smtp_helo`](building-sites/settings/mail_smtp_helo) | пусто | Имя в HELO/EHLO; при пустом значении используется имя сервера. |
| [`mail_smtp_timeout`](building-sites/settings/mail_smtp_timeout) | 10 | Таймаут SMTP в секундах. |
| [`mail_smtp_single_to`](building-sites/settings/mail_smtp_single_to) | Нет | Отправлять отдельное письмо каждому получателю вместо одного письма с несколькими адресами в `To`. |
| [`mail_smtp_keepalive`](building-sites/settings/mail_smtp_keepalive) | Нет | Не закрывать SMTP-соединение между письмами. Для обычной работы не рекомендуется. |
| [`mail_charset`](building-sites/settings/mail_charset) | UTF-8 | Кодировка сообщения. |
| [`mail_encoding`](building-sites/settings/mail_encoding) | 8bit | Кодировка передачи. |
| `mail_inlinestyle_inline` | Да | Переносит CSS из блоков `<style>` в атрибуты `style` в HTML-письмах. |
| `mail_inlinestyle_remove_style_tags` | Нет | Удаляет теги `<style>` после переноса. Может сломать адаптивную вёрстку. |

## Адрес отправителя

`modMail` не задаёт заголовок `From` по умолчанию. Это делают сценарии ядра: сброс пароля, вход без пароля, создание и обновление пользователя. Они берут адрес из [`emailsender`](building-sites/settings/emailsender), а имя — из [`site_name`](building-sites/settings/site_name).

В своём коде задайте оба значения явно:

```php
use MODX\Revolution\Mail\modMail;

$mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
$mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
```

Без корректного `From` получающие серверы могут отклонить письмо.
