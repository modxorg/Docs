---
title: "Loading MODX Externally"
_old_uri: "2.x/developing-in-modx/other-development-resources/loading-modx-externally"
---

## Загрузка объекта modX

Использование объекта modX (и все его соответствующие классы) довольно просто. Все, что вам нужно, это код:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
```

Это инициализирует объект MODX в 'web' [Context](building-sites/contexts "Contexts"). Теперь, если вы хотите получить к нему доступ в другом контексте (и тем самым изменить его права доступа, политики и т.д.), Вам просто нужно изменить 'web' на что угодно [Context](building-sites/contexts "Contexts"), что вы хотите загрузить. Это также загружает обработчик ошибок MODX.

Оттуда вы можете использовать любые методы, функции или классы MODX.

## Другой пример

Сценарии сборки - это отличное место, чтобы увидеть, как MODX загружается из командной строки. Они обычно начинаются с чего-то вроде этого:

``` php
if (!defined('MODX_CORE_PATH')) {
        define('MODX_CORE_PATH', '/path/to/core/');
}
if (!defined('MODX_CONFIG_KEY')) {
        define('MODX_CONFIG_KEY', 'config');
}
require_once( MODX_CORE_PATH . 'model/modx/modx.class.php');
$modx = new modX();
$modx->initialize('mgr');
```

## Устаревший пример

Этот пример является устаревшим. Так что лучше измените свой код, если вы все еще используете MODX\_API\_MODE.
Вы также можете использовать MODX в своем режиме API, а затем включить основной index.php файл для вашего сайта:

``` php
define('MODX_API_MODE', true);
// Full path to the index
require_once('/path/to/modx/public_html/index.php');
$modx->initialize('mgr');
```

## Смотрите также

- [Developer Introduction](extending-modx/getting-started/developer-introduction "Developer Introduction")
- [xPDO](extending-modx/xpdo "Home"), the db-layer for Revolution
