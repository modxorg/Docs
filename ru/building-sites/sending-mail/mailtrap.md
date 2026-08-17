---
title: mailtrap.io
translation: "building-sites/sending-mail/mailtrap"
---

[Mailtrap](https://mailtrap.io) это сервис (есть бесплатный план), в котором вы «ловите» письма и не отправляете их реальному получателю. Вместо этого вы видите их в интерфейсе.

На сайте разработки так удобно настроить почту и не отправить тестовые письма настоящим клиентам.

После создания аккаунта возьмите учётные данные в настройках inbox.

В MODX задайте через **Система → Системные настройки**:

- `mail_smtp_hosts`: smtp.mailtrap.io
- `mail_smtp_port`: 587
- `mail_smtp_user` и `mail_smtp_pass` берите из настроек inbox в Mailtrap.
- `mail_smtp_prefix`: tls

[См. также общие инструкции по SMTP: включение и проверка](building-sites/sending-mail)
