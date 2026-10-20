---
title: "login_logo"
translation: "building-sites/settings/login_logo"
description: "Логотип на экране входа в менеджер и в письмах менеджера."
---

-   **Имя**: Логотип экрана входа
-   **Тип**: String
-   **По умолчанию**: (пусто — логотип MODX)

URL или путь к логотипу в левом верхнем углу экрана входа в менеджер. Если поле пустое, используется `manager/templates/<тема>/images/modx-logo-color.svg`.

Это же значение подставляется в шаблон писем менеджера (`manager/templates/default/email/default.tpl`), поэтому изображение должно быть доступно по публичному URL.
