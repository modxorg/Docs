---
title: "mail_dkim_privatekeystring"
translation: "building-sites/settings/mail_dkim_privatekeystring"
description: "Закрытый ключ DKIM, заданный строкой."
---

-   **Имя**: Строка закрытого ключа DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Закрытый ключ для подписи исходящей почты, заданный строкой вместо пути к файлу. Имеет приоритет над [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile).

Используйте этот вариант, если ключ нельзя хранить файлом на сервере. Ключ хранится в базе и виден в системных настройках всем, у кого есть соответствующее право, поэтому на общих установках предпочитайте файл.

Значение передаётся в PHPMailer в `core/src/Revolution/Mail/modMail.php`.
