---
title: "xPDO.toJSON"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.tojson"
---

## xPDO::toJSON

Преобразует массив PHP в строку в кодировке JSON.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::toJSON()>

```php
string toJSON (array $array)
```

## Пример

```php
$ar = array('name' => 'John');
$str = $xpdo->toJSON($ar);
echo $str; // prints: {name:"John"}
```

## Смотрите также

-   [xPDO.fromJSON](extending-modx/xpdo/class-reference/xpdo/xpdo.fromjson "xPDO.fromJSON")
-   [xPDO](extending-modx/xpdo "xPDO")
