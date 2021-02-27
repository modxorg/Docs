---
title: "modX.getTree"
translation: "extending-modx/modx-class/reference/modx.gettree"
---

## modX::getTree

Получение дерева сайта из одного или нескольких экземпляров `modResource`.

## Синтаксис

API Doc: [modX::getTree()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getTree())

``` php
array getTree ([int|array $id = null], [int $depth = 10])
```

## Пример

Получить дерево для ресурса с ID 12. Пройти только на 5 уровней.

``` php
$treeArray = $modx->getTree(12,5);
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
