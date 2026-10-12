---
title: Config
description: "The config service: the core configuration array of MODX"
---

The core configuration is available via the `config` service in the [dependency injection container](extending-modx/di-container):

```php
$config = $modx->services->get('config');
echo $config['table_prefix'];
```

The service returns an array of the options used to initialize the MODX class, for example:

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

This dump is an illustration — exact values depend on your installation, and keys can be overridden via `$config_options` in `core/config/config.inc.php`. Note that `connection_mutable` lives inside `connections[0]['options']`; a top-level `connection_init` array appears only if you set `xPDO::OPT_CONN_INIT` yourself in `$config_options`.
