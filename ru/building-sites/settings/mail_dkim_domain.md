---
title: "mail_dkim_domain"
translation: "building-sites/settings/mail_dkim_domain"
description: "Домен, от имени которого ставится подпись DKIM."
---

-   **Имя**: Домен DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Домен, от имени которого подписывается письмо (тег `d=`). Он должен совпадать с доменом адреса отправителя и с доменом, где в DNS опубликован открытый ключ.

Без `mail_dkim_domain` подпись DKIM не ставится. Значение передаётся в PHPMailer в `core/src/Revolution/Mail/modMail.php`.

См. также: [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector), [`mail_dkim_identity`](building-sites/settings/mail_dkim_identity).
