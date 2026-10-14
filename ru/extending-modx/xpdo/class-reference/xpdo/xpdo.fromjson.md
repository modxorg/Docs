---
title: "xPDO.fromJSON"
description: "Преобразует исходную строку JSON в эквивалентное представление PHP."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.fromjson"
---

## xPDO::fromJSON

Преобразует исходную строку JSON в эквивалентное представление PHP.

## Синтаксис

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
