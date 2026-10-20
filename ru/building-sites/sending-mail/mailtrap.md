---
title: mailtrap.io
translation: "building-sites/sending-mail/mailtrap"
description: "Песочница Mailtrap для перехвата тестовых писем с сайта MODX."
---

[Mailtrap](https://mailtrap.io) — сервис (есть бесплатный план), который перехватывает письма в песочнице вместо отправки реальному получателю. Сообщения видны в интерфейсе Mailtrap.

На сайте разработки это не даёт тестовым письмам уйти настоящим клиентам.

После регистрации откройте SMTP-настройки песочницы и скопируйте логин и пароль.

В MODX задайте в разделе «Система» → «Системные настройки»:

- `mail_use_smtp`: Да
- `mail_smtp_auth`: Да
- `mail_smtp_hosts`: `sandbox.smtp.mailtrap.io`
- `mail_smtp_port`: `587` (или `2525`; Mailtrap рекомендует его)
- `mail_smtp_user` и `mail_smtp_pass`: учётные данные песочницы
- `mail_smtp_secure`: `tls`

Порт `465` тоже работает, если задать `mail_smtp_secure`: `ssl`. Песочница предназначена для разработки; для рабочей почты у Mailtrap есть отдельный live-хост SMTP.

[Общие инструкции по SMTP: включение и проверка](building-sites/sending-mail)
