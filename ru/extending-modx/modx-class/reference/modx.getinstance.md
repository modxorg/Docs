---
title: "modX.getInstance"
description: "modX.getInstance создаёт или возвращает зарегистрированный экземпляр modX."
translation: "extending-modx/modx-class/reference/modx.getinstance"
---

## modX::getInstance

Создаёт, возвращает или обновляет зарегистрированные экземпляры modX. Это канонический способ получить объект `modX`: через него работают все точки входа MODX (`index.php`, `manager/index.php`, `connectors/index.php`, установщик и тесты), а полученный объект регистрируется в общем реестре экземпляров.

## Синтаксис

``` php
static modX getInstance ([string|int|null $id = null], [array|null $config = null], [boolean $forceNew = false])
```

- `$id` _(string|int|null)_ Идентификатор экземпляра. Если не задан — возвращается уже существующий экземпляр (если он есть), иначе генерируется новый идентификатор и создаётся новый экземпляр.
- `$config` _(array|null)_ Данные конфигурации для экземпляра. Переданный с уже существующим `$id`, он объединяется с конфигурацией этого экземпляра; переданный без `$id` — приводит к созданию нового экземпляра.
- `$forceNew` _(boolean)_ Создать новый экземпляр, даже если экземпляр с таким `$id` уже есть.

Возвращает экземпляр `modX`; бросает `xPDOException`, если запись в реестре не является корректным экземпляром.

Регистрация важна: объект, созданный через `new \MODX\Revolution\modX()`, работает, но в реестр **не** сохраняется, поэтому следующий вызов `getInstance()` (в точке входа, в установщике или в тестах) создаст второй экземпляр с собственным соединением к базе данных и собственной конфигурацией. Везде используйте `getInstance()`.

## Пример

Загрузка MODX извне через реестр экземпляров:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';

$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
```

## Смотрите также

- [Внешняя загрузка MODX](extending-modx/modx-class/loading-externally "Внешняя загрузка MODX")
- [modX](extending-modx/core-model/modx "modX")
