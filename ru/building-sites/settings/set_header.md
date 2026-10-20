---
title: "set_header"
translation: "building-sites/settings/set_header"
description: "Отправлять HTTP-заголовки для ресурсов."
---

-   **Имя**: Устанавливать HTTP-заголовки
-   **Тип**: Да/Нет
-   **По умолчанию**: Да

Если включено, MODX отправляет HTTP-заголовки ресурса: `Content-Type` из его типа содержимого (с кодировкой `modx_charset` для небинарных типов), `Content-Disposition` и дополнительные заголовки, заданные в типе содержимого.

Проверка выполняется в `core/src/Revolution/modResponse.php`. Отключайте, только если заголовками управляет веб-сервер или прокси.

См. также: [`default_content_type`](building-sites/settings/default_content_type), [`modx_charset`](building-sites/settings/modx_charset).
