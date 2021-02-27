---
title: "xPDO.fromJSON"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.fromjson"
---

## xPDO::fromJSON

Преобразует исходную строку JSON в эквивалентное представление PHP.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#fromJSON>

```php
mixed fromJSON (string $src, [boolean $asArray = true])
```

## Пример

Преобразовать код JSON в массив:

```php
$str = '{name:"John"}';
$ar = $xpdo->fromJSON($str);
print_r($ar); // prints: Array ( 'name' => 'John' )
```

## Смотрите также

-   [xPDO.toJSON](extending-modx/xpdo/class-reference/xpdo/xpdo.tojson "xPDO.toJSON")
-   [xPDO](extending-modx/xpdo "xPDO")
