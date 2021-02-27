---
title: "xPDO.getOption"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getoption"
---

## xPDO::getOption

Получает значение параметра конфигурации xPDO по ключу.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getOption>

```php
mixed getOption (string $key [, array|null $options [, mixed $default [, boolean $skipEmpty]]] )
```

-   `$key`: ключ настройки или опции для загрузки.
-   `$options`: источник настройки или опции. Либо null (который пытается найти ключ в основной конфигурации), либо массив параметров.
-   `$default`: значение, которое возвращается, если ключ не найден.
-   `$skipEmpty`: если установлено значение `true`, `$default` также будет возвращено, если значение `$key's` является пустой строкой. Добавлено в xPDO 2.2.1 / MODX 2.2.0-rc2.

## Примеры

Получить префикс таблицы:

```php
$tablePrefix = $xpdo->getOption(xPDO::OPT_TABLE_PREFIX);
```

Получить параметр из указанного пользователем массива и, если он не установлен, проверить его в `$xpdo->config`. Если он там не установлен, верните false в качестве значения по умолчанию:

```php
$mySetting = $xpdo->getOption('my_setting',$myConfig,false);
```

## Смотрите также

-   [xPDO.setOption](extending-modx/xpdo/class-reference/xpdo/xpdo.setoption "xPDO.setOption")
-   [xPDO](extending-modx/xpdo "xPDO")
