---
title: "xPDO.getTableName"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.gettablename"
---

## xPDO::getTableName

Получает фактическое имя таблицы времени выполнения из указанного имени класса.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getTableName()>

```php
string getTableName (string $className, [boolean $includeDb = false])
```

## Пример

Выведите имя таблицы для объекта Box с именем таблицы "boxes":

```php
echo $xpdo->getTableName('Box');
```

## Смотрите также

-   [xPDO](extending-modx/xpdo "xPDO")
