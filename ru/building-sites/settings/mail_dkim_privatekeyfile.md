---
title: "mail_dkim_privatekeyfile"
translation: "building-sites/settings/mail_dkim_privatekeyfile"
description: "Путь к файлу закрытого ключа DKIM."
---

-   **Имя**: Файл закрытого ключа DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Абсолютный путь к файлу закрытого ключа, которым подписывается исходящая почта. Файл должен быть читаем процессом PHP и не должен быть доступен публично.

Если заданы и этот параметр, и [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring), приоритет у ключа-строки.

Значение передаётся в PHPMailer в `core/src/Revolution/Mail/modMail.php`.
