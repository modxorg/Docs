---
title: "cache_format"
translation: "building-sites/settings/cache_format"
description: "Формат сериализации кэша. Меняйте только через config_options."
---

-   **Имя**: Формат кэширования
-   **Тип**: Number
-   **По умолчанию**: 0
-   **Доступен в**: Revolution 2.1+

Значения:

-   `0`: PHP-массивы
-   `1`: JSON
-   `2`: сериализованные данные PHP

---

**ВАЖНО**: не меняйте значение в системных настройках. Если изменить его в менеджере, MODX начнёт писать кэш в новом формате, а старые файлы останутся на диске. Сайт и менеджер могут перестать запускаться.

Чтобы переопределить значение по умолчанию, задайте его в `$config_options` в `core/config/config.inc.php` и очистите каталог `core/cache/`:

```php
$config_options = [
    'cache_format' => 0, // 0 = PHP, 1 = JSON, 2 = serialize
];
```

См. также: [Использование Memcache](extending-modx/caching/memcache) — ещё один пример `$config_options`.
