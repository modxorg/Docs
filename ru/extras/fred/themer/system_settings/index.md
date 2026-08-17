---
title: "Системные настройки"
description: "fred.blueprint_sort, fred.default_enabled, fred.launcher_position и другие"
translation: "extras/fred/themer/system_settings/index"
---

Системные настройки Fred управляют поведением сайта. Fred загружается на фронтенде, поэтому настройки можно менять по context, пользователю или группе.

### Blueprint Sort (fred.blueprint_sort)

По умолчанию blueprints сортируются по `name`. Можно переключить на `rank` для заданного порядка.

### Blueprint's Category Sort (fred.blueprint_category_sort)

По умолчанию категории blueprints сортируются по `name`. Можно переключить на `rank`.

### Fred Enabled (fred.default_enabled)

По умолчанию Fred активен при открытии страницы. Значение `No` отключает Fred до включения в сессии пользователя.

### Element's Group Sort (fred.element_sort)

По умолчанию Elements сортируются по `name`. Можно переключить на `rank`.

### Element's Group Sort (fred.element_group_sort)

По умолчанию категории Elements сортируются по `name`. Можно переключить на `rank`.

### Icon Editor (fred.icon_editor)

Fred использует плагины для разных типов Elements. Icon Editor работает с Elements `<i>`, у которых есть атрибут `data-fred-name`.

### Image Editor (fred.image_editor)

Fred использует плагины для разных типов Elements. Image Editor работает с Elements `<img>` с атрибутом `data-fred-name`.

### Position of Launcher (fred.launcher_position)

Launcher Fred можно поставить в любой угол, чтобы не перекрывать Element. Варианты: `bottom_left`, `bottom`, `bottom_right`, `top_left`, `top`, `top_right`.

### Rich Text Editor (fred.rte)

Fred использует плагины для разных типов Elements. RTE работает с wrapper Elements с `data-fred-name` и `data-fred-editable="true" data-fred-rte="true"`.

### Secret (fred.secret)

Автоматически сгенерированный ключ для подписи XHR-запросов.
