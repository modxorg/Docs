---
title: "Загрузка MODX извне"
translation: "extending-modx/modx-class/loading-externally"
---

## Загрузка объекта modX

Использовать объекта modX (и все его соответствующие классы) довольно просто. Все, что вам нужно, это следующий код:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
```

Это инициализирует объект MODX в `web` [Контексте](building-sites/contexts "Контексты"). Теперь, если вы хотите получить к нему доступ в другом контексте (и тем самым изменить его права доступа, политики и т.д.), вам просто нужно изменить `web` на любой другой [Контекст](building-sites/contexts "Контексты"), тот, что вы хотите загрузить. Это также загружает обработчик ошибок MODX.

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

Этот пример является устаревшим. Так что лучше измените свой код, если вы все еще используете `MODX_API_MODE`.
Вы также можете использовать MODX в своем режиме API, а затем включить основной `index.php` файл для вашего сайта:

``` php
define('MODX_API_MODE', true);
// Полный путь до index.php
require_once('/path/to/modx/public_html/index.php');
$modx->initialize('mgr');
```

## Смотрите также

- [Введение для разработчиков](extending-modx/getting-started/developer-introduction)
- [xPDO](extending-modx/xpdo "xPDO"), уровень базы данных для Revolution
