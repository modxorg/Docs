---
title: "xPDO.getManager"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getmanager"
---

## xPDO::getManager

Получает класс менеджера для этого соединения xPDO.

Класс `Manager` может выполнять такие операции, как создание или изменение табличных структур, создание контейнеров данных, создание пользовательских классов персистентности и другие расширенные операции, которые не нужно загружать часто.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getManager()>

```php
object|null getManager ()
```

## Пример

```php
$manager = $xpdo->getManager();
```

## Смотрите также

-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")
-   [xPDO](extending-modx/xpdo "xPDO")
