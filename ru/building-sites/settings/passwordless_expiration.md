---
title: "passwordless_expiration"
translation: "building-sites/settings/passwordless_expiration"
description: "Время жизни ссылки для входа без пароля в секундах."
---

-   **Имя**: Срок действия входа без пароля
-   **Тип**: String
-   **По умолчанию**: 3600

Сколько секунд действует одноразовая ссылка для входа. По умолчанию — один час.

Значение читается в `manager/controllers/default/security/login.class.php` при создании и проверке ссылки.

См. также: [`passwordless_activated`](building-sites/settings/passwordless_activated).
