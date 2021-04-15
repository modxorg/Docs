---
title: "modX.getTree"
translation: "extending-modx/modx-class/reference/modx.gettree"
description: "Получение дерева сайта из одного или нескольких экземпляров modResource"
---

## modX::getTree

Получение дерева сайта из одного или нескольких экземпляров `modResource`.

## Синтаксис

API документация: [modX::getTree()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getTree())

``` php
array getTree ([int|array $id = null], [int $depth = 10], [array $options = array()])
```

- `$id` _(int|array)_ Один или несколько идентификаторов `modResource` для построения дерева.
- `$depth` _(integer)_ Максимальная глубина для построения дерева (по умолчанию - 10).
- `$options` _(array)_ Массив параметров фильтрации, например 'context', для указания контекста, из которого нужно получить данные. 

## Пример

Получить дерево для ресурса с ID 12. Пройти только на 5 уровней.

``` php
$treeArray = $modx->getTree(12,5);
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
