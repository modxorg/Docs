---
title: "modResource.hasChildren"
translation: "extending-modx/core-model/modresource/modresource.haschildren"
description: "Посчитать прямые потомки ресурса"
---

## modResource.hasChildren

Считает ресурсы, у которых `parent` равен этому ресурсу. Несмотря на имя, возвращается количество потомков, а не логическое значение.

Запрос не зависит от связи `Children`, поэтому всегда отражает текущее состояние базы данных.

## Синтаксис

``` php
integer hasChildren ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->hasChildren() > 0) {
    echo 'container';
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
