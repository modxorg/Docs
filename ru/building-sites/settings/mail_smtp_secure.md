---
title: "mail_smtp_secure"
translation: "building-sites/settings/mail_smtp_secure"
description: "Тип шифрования SMTP: пусто, ssl или tls."
---

-   **Имя**: SMTP Secure
-   **Тип**: String
-   **По умолчанию**:

Задаёт тип шифрования SMTP. Варианты: `""` (без шифрования), `"ssl"`, `"tls"`.

В MODX 3.0 настройка переименована из `mail_smtp_prefix`; скрипт обновления 3.0 переносит старое значение в новый ключ и удаляет старый.

См. также: [`mail_smtp_autotls`](building-sites/settings/mail_smtp_autotls), [`mail_use_smtp`](building-sites/settings/mail_use_smtp).
