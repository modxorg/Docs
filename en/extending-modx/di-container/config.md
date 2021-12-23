---
title: Config
---

The core configuration is available via the `config` service in the [dependency injection container](extending-modx/di-container). 

When requested, it returns an array of options used for initialising the MODX class. For example:

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
  'connection_init' => 
    array (size=1)
      'connection_mutable' => boolean true
  'connections' => 
    array (size=1)
      0 => 
        array (size=5)
          'dsn' => string 'mysql:host=localhost;dbname=your-db-name;charset=utf8' (length=52)
          'username' => string '' (length=0)
          'password' => string '' (length=0)
          'options' => 
            array (size=1)
              ...
          'driverOptions' => 
            array (size=0)
              ...
```
