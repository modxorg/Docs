---
title: "login_background_image"
translation: "building-sites/settings/login_background_image"
description: "Фоновое изображение экрана входа в менеджер."
---

-   **Имя**: Фоновое изображение экрана входа
-   **Тип**: String
-   **По умолчанию**: (пусто — фон темы по умолчанию)

URL или путь к фоновому изображению экрана входа в менеджер. Изображение растягивается на весь экран.

Если поле пустое, используется `manager/templates/<тема>/images/login/default-background.jpg`. Значение читается в `manager/controllers/default/security/login.class.php`.

См. также: [`login_logo`](building-sites/settings/login_logo), [`manager_theme`](building-sites/settings/manager_theme).
