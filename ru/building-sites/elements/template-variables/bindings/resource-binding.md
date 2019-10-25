---
title: "RESOURCE привязка"
translation: "building-sites/elements/template-variables/bindings/resource-binding"
---

## Что такое @RESOURCE привязка?

Привязка @RESOURCE возвращает проанализированное содержимое любого указанного ресурса.

## Синтаксис

``` php
@RESOURCE resource_id
```

Связывает переменную с ресурсом, где `resource_id` - это идентификатор ресурса. Возвращаемое значение представляет собой строку, содержащую проанализированный контент ресурса.

## Использование

Чтобы вывести содержимое ресурса с идентификатором 12:

``` php
@RESOURCE 12
```

## Смотрите также

- [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона")
- [Привязки](building-sites/elements/template-variables/bindings "Привязки")
