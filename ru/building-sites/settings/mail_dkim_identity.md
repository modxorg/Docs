---
title: "mail_dkim_identity"
translation: "building-sites/settings/mail_dkim_identity"
description: "Идентификатор DKIM, обычно адрес отправителя."
---

-   **Имя**: Идентификатор DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Идентификатор DKIM (тег `i=`), который указывает, кто отвечает за письмо. Обычно это адрес отправителя или домен, с которого отправляется почта.

Значение необязательное: если оно пустое, PHPMailer не включает идентификатор в подпись. Передаётся в `core/src/Revolution/Mail/modMail.php`.

См. также: [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain), [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector).
