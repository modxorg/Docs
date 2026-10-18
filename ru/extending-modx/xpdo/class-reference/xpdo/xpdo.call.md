---
title: "xPDO.call"
description: "Вызывает метод класса, при необходимости загружая его."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.call"
---

## xPDO::call

Вызывает статический или экземплярный метод класса, при необходимости сначала загружая сам класс. Именно этот механизм используется для диспетчеризации к пользовательским классам-загрузчикам и другим методам модели.

## Синтаксис

``` php
mixed call (string $class, string $method, [array $args = array()], [boolean $transient = false])
```

-   `$class` — класс, на котором вызывается метод.
-   `$method` — имя метода.
-   `$args` — аргументы, передаваемые в метод.
-   `$transient` — если `true`, класс не загружается постоянно.

## Пример

``` php
$result = $xpdo->call('MyVendor\\MyPackage\\MyModel', 'myStaticMethod', array($arg));
```

## Смотрите также

-   [Использование пользовательских загрузчиков объектов](extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/using-custom-loader-classes "Using Custom Object Loaders")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")