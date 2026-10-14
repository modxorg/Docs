---
title: "xPDO.setOption"
description: "Устанавливает значение параметра конфигурации xPDO."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.setoption"
---

## xPDO::setOption

Устанавливает значение параметра конфигурации xPDO.

## Синтаксис

```php
void setOption (string $key, mixed $value)
```

## Пример

Установите для кэширования БД значение `false`.

```php
$xpdo->setOption(xPDO::OPT_CACHE_DB,false);
```

Помните: `setOption` изменяет значение параметра _only_ для текущего запроса: значения не сохраняются.

## Смотрите также

-   [xPDO.getOption](extending-modx/xpdo/class-reference/xpdo/xpdo.getoption "xPDO.getOption")
-   [xPDO](extending-modx/xpdo "xPDO")
