---
title: Конфигурация
translation: "extending-modx/di-container/config"
description: "Сервис config: массив базовой конфигурации MODX"
---

Базовая конфигурация доступна через сервис `config` в [контейнере внедрения зависимостей](extending-modx/di-container).

При запросе возвращает массив опций, используемых для инициализации класса MODX. Например:

```
  'cache_key' => string 'default' (length=7)
  'cache_handler' => string 'xPDO\Cache\xPDOFileCache' (length=24)
  'cache_path' => string '/path/to/core/cache/' (length=45)
  'table_prefix' => string 'modx_' (length=5)
  'hydrate_fields' => boolean true
  'hydrate_related_objects' => boolean true
  'hydrate_adhoc_fields' => boolean true
  'validator_class' => string 'MODX\Revolution\Validation\modValidator' (length=39)
  'validate_on_save' => boolean true
  'cache_system_settings' => boolean true
  'cache_system_settings_key' => string 'system_settings' (length=15)
  'load_deprecated_global_class_aliases' => boolean true
  'connections' =>
    array (size=1)
      0 =>
        array (size=5)
          'dsn' => string 'mysql:host=localhost;dbname=your-db-name;charset=utf8mb4' (length=55)
          'username' => string '' (length=0)
          'password' => string '' (length=0)
          'options' =>
            array (size=1)
              'connection_mutable' => boolean true
          'driverOptions' =>
            array (size=0)
              ...
```

Этот дамп — иллюстрация: точные значения зависят от установки, а ключи можно переопределить через `$config_options` в `core/config/config.inc.php`. Обратите внимание: `connection_mutable` лежит внутри `connections[0]['options']`; массив `connection_init` верхнего уровня появляется, только если вы сами зададите `xPDO::OPT_CONN_INIT` в `$config_options`.
