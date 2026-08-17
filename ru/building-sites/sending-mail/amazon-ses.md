---
title: Amazon SES
translation: "building-sites/sending-mail/amazon-ses"
---

Чтобы отправлять почту через Amazon SES (Simple Email Service) по SMTP, [работают общие инструкции](building-sites/sending-mail), но нужные детали иногда искать долго.

## Подтверждение домена и адреса

Сначала [войдите в AWS Console](https://console.aws.amazon.com) и откройте сервис SES (Simple Email Service).

В **Identity Management → Domains** нажмите Verify a New Domain. Укажите домен, включите генерацию DKIM Settings и по инструкции добавьте DNS-записи.

Затем откройте **Identity Management → Email Addresses** и нажмите Verify a New Email Address. Укажите адрес и подтвердите его по письму. **Это нужно для каждого адреса, с которого вы хотите слать почту.**

## Создание IAM SMTP credentials

В дашборде Amazon SES откройте **Email Sending → SMTP Settings**.

- Имя сервера добавьте в системную настройку `mail_smtp_hosts`.
- Один из предложенных портов задайте в `mail_smtp_port`. Обычно работают 465 или 587.
- Если TLS включён, в `mail_smtp_secure` поставьте `tls` или `ssl` (настройки Mail в MODX 3).

Дальше нажмите **Create My SMTP Credentials**. Это быстрый путь к IAM user. Иначе процесс заметно сложнее.

(Важно: созданный IAM user **только** шлёт почту по SMTP. Для API или других сервисов Amazon нужен другой user или отдельная access policy. [Подробнее про IAM users для почты](https://docs.aws.amazon.com/ses/latest/DeveloperGuide/control-user-access.html))

Укажите имя пользователя. Сделайте его понятным для сайта, где будете использовать учётку.

Внизу справа нажмите Create.

User создан. Скачайте credentials кнопкой внизу справа или раскройте **Show User SMTP Security Credentials** и скопируйте SMTP Username (в `mail_smtp_user`) и SMTP Password (в `mail_smtp_pass`).

Если credentials не скачивали, **увидеть их снова не получится**. Перед закрытием окна проверьте, что отправка почты работает.

## Проверка и следующие шаги

Проверьте интеграцию через QuickEmail [как в документации по почте](building-sites/sending-mail).

Важно: пока не завершена верификация домена и адреса, отправка может не работать. Для новых пользователей Amazon ещё ограничивает объём писем.

В дашборде SES, в Domains, по клику на домен есть детали аутентификации писем.

- В Verification лежит TXT-запись. Она должна оставаться на домене, пока вы используете Amazon SES.
- В DKIM список DNS-записей для [включения DKIM](https://en.wikipedia.org/wiki/DomainKeys_Identified_Mail).
- В MAIL FROM Domain можно задать отдельный FROM-домен. Тогда отправителем будет ваш домен, а не amazonses.com.
