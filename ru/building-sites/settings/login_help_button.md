---
title: "login_help_button"
translation: "building-sites/settings/login_help_button"
description: "Показывать кнопку справки на экране входа в менеджер."
---

-   **Имя**: Показывать кнопку справки
-   **Тип**: Да/Нет
-   **По умолчанию**: Нет

Если включено, на экране входа в менеджер появляется ссылка «Помощь», открывающая панель с инструкцией по входу.

Текст панели берётся из темы лексикона `login`: `login_help_button_text`, `login_help_title` и `login_help_text`. Переопределите эти записи, чтобы изменить содержимое.

Значение читается в `manager/controllers/default/security/login.class.php`.
