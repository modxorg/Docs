---
title: "Привязка CHUNK"
translation: "building-sites/elements/template-variables/bindings/chunk-binding"
---

## Что такое @CHUNK привязка?

Привязка @CHUNK возвращает проанализированный контент любого указанного чанка, если @CHUNK используется в переменной шаблона (TV).

Другими словами, если @CHUNK Hello - это значение телевизора с именем MyChunk, следующий тег в шаблоне или в поле Resource Content ресурса будет заменен содержимым блока Hello:

``` php
[[*MyChunk]]
```

## Синтаксис

``` php
@CHUNK chunk_name
```

Привязывает переменную к документу. Где `chunk_name` - это имя чанка. Возвращаемое значение является строкой, содержащей содержимое чанка.

Это связывание очень похоже на [@RESOURCE привязку](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE привязка") за исключением того, что он будет привязывать TV к [чанку](building-sites/elements/chunks "Чанки").

## Использование

``` php
@CHUNK MycontactForm
```

## Смотрите также

- [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона")
- [Привязки](building-sites/elements/template-variables/bindings "Привязки")
