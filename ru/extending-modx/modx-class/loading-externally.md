---
title: "Загрузка MODX извне"
description: "Загрузка MODX во внешнем скрипте: конфигурация, автозагрузчик и реестр экземпляров."
translation: "extending-modx/modx-class/loading-externally"
---

## Загрузка объекта modX

Использовать объект modX (и все его классы) довольно просто. Всё, что нужно, — этот код:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';
$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
```

Он инициализирует объект MODX в контексте `web` [Контексте](building-sites/contexts "Контексты"). Если нужен другой контекст (с другими правами доступа, политиками и т.д.), замените `web` на нужный [Контекст](building-sites/contexts "Контексты").

Используйте [modX.getInstance](extending-modx/modx-class/reference/modx.getinstance "modX.getInstance"), а не `new \MODX\Revolution\modX()`: `getInstance()` регистрирует объект в общем реестре экземпляров, а созданный через `new` объект в реестр не попадает — следующий вызов `getInstance()` молча создаст второй объект со своим соединением с базой данных.

Далее можно использовать любые методы, функции и классы MODX.

## Смотрите также

- [modX.getInstance](extending-modx/modx-class/reference/modx.getinstance "modX.getInstance")
- [Введение для разработчиков](extending-modx/getting-started/developer-introduction "Введение для разработчиков")
- [xPDO](extending-modx/xpdo "xPDO"), уровень базы данных для Revolution
