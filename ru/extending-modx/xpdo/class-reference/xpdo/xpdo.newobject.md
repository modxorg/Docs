---
title: "xPDO.newObject"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.newobject"
---

## xPDO::newObject

Создает новый экземпляр указанного класса.

Все новые объекты, созданные с помощью этого метода, являются временными до [xPDOObject::save()](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "save") вызывается в первый раз и отражается свойством `xPDOObject::$_new`.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#newObject>

```php
object|null newObject (string $className, [array $fields = array ()])
```

## Пример

Создайте новый объект Box:

```php
$box = $xpdo->newObject('Box');
```

Создайте новый объект Box с уже установленными шириной и высотой:

```php
$box = $xpdo->newObject('Box',array(
   'width' => 10,
   'height' => 4,
));
```

## Смотрите также

-   [Creating Objects](extending-modx/xpdo/creating-objects "Creating Objects")
-   [Removing (deleting) objects](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove)
-   [xPDO](extending-modx/xpdo "xPDO")
