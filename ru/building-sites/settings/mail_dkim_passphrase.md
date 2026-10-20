---
title: "mail_dkim_passphrase"
translation: "building-sites/settings/mail_dkim_passphrase"
description: "Парольная фраза для зашифрованного закрытого ключа DKIM."
---

-   **Имя**: Парольная фраза DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Парольная фраза для расшифровки закрытого ключа DKIM. Задавайте её, только если файл или строка ключа зашифрованы.

В системных настройках поле отображается как поле пароля. Значение передаётся в PHPMailer в `core/src/Revolution/Mail/modMail.php`.
