---
title: "emailsubject"
translation: "building-sites/settings/emailsubject"
description: "Удалено в MODX 3.0. Тема письма берётся из лексикона login_email_subject."
---

**Удалено в MODX 3.0.** Тема письма больше не является системной настройкой. Для писем о регистрации и сбросе пароля она берётся из записи лексикона `login_email_subject` (`core/lexicon/en/login.inc.php`), а текст письма новому пользователю — из `login_signup_email`.

Чтобы изменить текст, переопределите эти записи лексикона.

---

-   **Имя**: Email Subject
-   **Тип**: String
-   **По умолчанию**: Ваши данные для входа
-   **Доступен в**: только Revolution 2.x

В 2.x это была тема письма, отправляемого при регистрации пользователя.
