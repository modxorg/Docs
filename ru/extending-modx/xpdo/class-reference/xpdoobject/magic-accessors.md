---
title: "Magic accessors"
translation: "extending-modx/xpdo/class-reference/xpdoobject/magic-accessors"
---

## Magic-методы xPDOObject

`xPDOObject` реализует магические методы `__get()`, `__set()` и `__isset()`, поэтому поля и загруженные связанные объекты доступны как свойства.

Эти методы работают только при включённых соответствующих опциях заполнения объекта данными:

-   `xPDO::OPT_HYDRATE_FIELDS` — открывает поля как читаемые свойства через `__get()`.
-   `xPDO::OPT_HYDRATE_RELATED_OBJECTS` — открывает загруженные связанные объекты как читаемые свойства через `__get()`.
-   `xPDO::OPT_HYDRATE_ADHOC_FIELDS` — открывает поля ad-hoc (не объявленные в модели).

Когда опции отключены, `__get()` молча возвращает `null`, а `__set()` возвращает `false` — обращение к `$object->somefield` выглядит рабочим, но ничего не даёт.

## Синтаксис

```php
mixed __get (string $name)
boolean __set (string $name, mixed $value)
boolean __isset (string $name)
```

## Пример

```php
$modx->setOption(xPDO::OPT_HYDRATE_FIELDS, true);
$resource = $modx->getObject('modResource', 42);
echo $resource->pagetitle;
```

## Смотрите также

-   [Заполнение полей](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Заполнение полей")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")