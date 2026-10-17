---
title: "xPDO.getAncestry"
description: "Возвращает родительские классы класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getancestry"
---

## xPDO::getAncestry

Возвращает массив имён классов, которые наследует указанный класс, от самого класса до `xPDOObject`. По умолчанию включается и сам класс; передайте `false` вторым аргументом, чтобы начать с его родителя. Если класс не удалось загрузить, возвращает пустой массив.

## Синтаксис

```php
array getAncestry (string $className, [boolean $includeSelf = true])
```

## Пример

```php
$ancestry = $xpdo->getAncestry('MODX\\Revolution\\modResource');
// array('MODX\\Revolution\\modResource', 'xPDO\\Om\\xPDOObject')
```

## Смотрите также

-   [xPDO.getPK](extending-modx/xpdo/class-reference/xpdo/xpdo.getpk "xPDO.getPK")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")