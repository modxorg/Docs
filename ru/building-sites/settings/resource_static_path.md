---
title: "resource_static_path"
translation: "building-sites/settings/resource_static_path"
description: "Базовый путь для относительных файлов статических ресурсов."
---

-   **Имя**: Базовый путь статических ресурсов
-   **Тип**: String
-   **По умолчанию**: `{assets_path}`

Базовый путь, который подставляется перед именем файла статического ресурса, когда [`resource_static_allow_absolute`](building-sites/settings/resource_static_allow_absolute) отключено (по умолчанию).

При отключённой настройке файлы ограничены этим каталогом. Слишком широкий путь позволяет пользователям менеджера читать файлы, которые им видеть не следует, поэтому держите его узким — например, `{assets_path}static/`.

Менеджер раскрывает `{assets_path}`, `{core_path}` и `{base_path}` в значениях системных настроек при сборке кэшированной конфигурации (`modCacheManager::generateConfig()`), поэтому значение по умолчанию указывает на каталог assets установки. Теги шаблона вроде `[[++assets_path]]` тоже обрабатываются. Файлы, выбранные через браузер медиа, разрешаются относительно этого пути.

См. также: [`resource_static_allow_absolute`](building-sites/settings/resource_static_allow_absolute).
