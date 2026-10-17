---
title: "__construct"
translation: "extending-modx/xpdo/class-reference/xpdoobject/__construct"
---

## xPDOObject::__construct

Инициализирует объект. Конструктор предназначен для вызова из xPDO при заполнении объекта данными, а не напрямую из кода приложения. Производные классы обязаны вызывать `parent::__construct($xpdo)`.

При создании объекта контейнеры связанных объектов инициализируются согласно кардинальности агрегатных и композиционных связей класса.

## Синтаксис

```php
__construct (xPDO &$xpdo)
```

## Пример

```php
class MyObject extends \xPDO\Om\xPDOObject
{
    public function __construct(xPDO &$xpdo)
    {
        parent::__construct($xpdo);
    }
}
```

## Смотрите также

-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")