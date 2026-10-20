---
title: "mail_dkim_selector"
translation: "building-sites/settings/mail_dkim_selector"
description: "Селектор DKIM, используемый в имени DNS-записи."
---

-   **Имя**: Селектор DKIM
-   **Тип**: String
-   **По умолчанию**: (пусто)

Селектор DKIM — метка, которая указывает, какой открытый ключ используется. Публикуется в DNS как `<селектор>._domainkey.<домен>`.

Без `mail_dkim_selector` подпись DKIM не ставится. Значение передаётся в PHPMailer в `core/src/Revolution/Mail/modMail.php`.

DKIM (DomainKeys Identified Mail) позволяет принимающему почтовому серверу проверить, что письмо отправлено вашим доменом и не изменено по дороге. MODX передаёт эти значения в PHPMailer; в DNS также нужен соответствующий открытый ключ.

См. также: [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain), [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile), [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring).
