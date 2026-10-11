---
title: "modResource.getIconClasses"
translation: "extending-modx/core-model/modresource/modresource.geticonclasses"
description: "Собрать CSS-классы иконки ресурса для дерева менеджера"
---

## modResource.getIconClasses

Собирает CSS-классы, которые дерево менеджера использует как иконку ресурса. Иконка типа содержимого и иконка шаблона добавляются, если они есть; `mgr_tree_icon_<classkey>` используется только когда не задана ни одна из них. Веблинки, симлинки и статические ресурсы добавляют поверх свою иконку.

Всегда дописываются два CSS-класса в области ресурса и его родителя: `icon-<context>-<id>` и `icon-parent-<context>-<parent>`. Модификатор папки добавляется, когда у ресурса есть дочерние элементы или задан `isfolder`. Он применяется только если иконка шаблона не найдена и всё ещё используется иконка по умолчанию `tree-resource`.

## Синтаксис

``` php
array getIconClasses ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
echo implode(' ', $resource->getIconClasses());
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepareTreeNode](extending-modx/core-model/modresource/modresource.preparetreenode)
