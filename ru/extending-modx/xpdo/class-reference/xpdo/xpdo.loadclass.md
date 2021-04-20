---
title: "xPDO.loadClass"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass"
---

## xPDO::loadClass

Включите класс по полному имени. Это удобный способ выполнить операцию `include_once` для включения файла `.class.php`. Если файл не найден, возвращается `false` и записывается предупреждение. Это включает в себя только класс: он не создает экземпляр этого экземпляра.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::loadClass()>

```php
string|boolean loadClass (string $fqn, [ $path = ''], [ $ignorePkg = false], [ $transient = false])
```

`$fqn` (полное имя) должно быть в формате:

> dir_a.dir_b.dir_c.classname

который будет переводить на:

> XPDO_CORE_PATH/om/dir_a/dir_b/dir_c/dbtype/classname.class.php

### Совет

-   Имя файла, которое вы включаете, должно включать **.class.php** в качестве его расширения.
-   Путь к вашей модели должен заканчиваться косой чертой!

## Пример

Загрузить класс из пути '/my/path/to/model/'.

```php
$xpdo->loadClass('myBox','/my/path/to/model/');
```

Другой пример:

```php
if (!$xpdo->loadClass('myBox','/my/path/to/model/',true,true)) {
    die('Could not load class myBox!');
}
$Box = new myBox();
```

## Смотрите также

-   [xPDO](extending-modx/xpdo "xPDO")
-   [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService") - this will include a class and instantiate it.
