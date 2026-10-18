---
title: "setDirty"
translation: "extending-modx/xpdo/class-reference/xpdoobject/state-accessors/setdirty"
---

## xPDOObject::setDirty

Помечает поле объекта как изменённое. Поле добавляется в карту dirty-полей объекта, а его флаг валидации сбрасывается. Без аргументов помечает dirty все поля объекта.

Ничего не возвращает. Неизвестное имя поля разрешается через [getField()](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfield "getField") и молча игнорируется, если разрешилось в `false`.

## Синтаксис

```php
void setDirty ([string $key = ''])
```

## Пример

```php
$resource = $modx->getObject('modResource', 42);
$resource->setDirty('pagetitle');
```

## Смотрите также

-   [isDirty](extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isdirty "isDirty")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")