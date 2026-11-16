---
title: "Привязка CHUNK"
translation: "building-sites/elements/template-variables/bindings/chunk-binding"
---

## Что такое @CHUNK привязка?

Привязка @CHUNK возвращает разобранное содержимое указанного чанка, когда @CHUNK используется в переменной шаблона (TV).

Если у TV `MyChunk` стоит `@CHUNK Hello`, этот тег в шаблоне или в содержимом ресурса заменяется содержимым чанка Hello:

```php
[[*MyChunk]]
```

## Синтаксис

```php
@CHUNK chunk_name [properties_as_json]
```

Привязывает переменную к чанку. `chunk_name` — имя чанка. Возвращаемое значение — разобранный вывод чанка.

Необязательный JSON после имени чанка становится плейсхолдерами этого чанка.

## Использование

```php
@CHUNK MycontactForm
```

Со свойствами:

```php
@CHUNK MycontactForm {"submitLabel":"Отправить","showTitle":"1"}
```

Некорректный JSON после имени чанка пишется в журнал ошибок MODX. Имя чанка не обрезается, поэтому MODX ищет чанк с этим хвостом в имени и не находит его. Корректный JSON по-прежнему отделяется и передаётся чанку.

Эта привязка похожа на [@RESOURCE](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE привязка"), но связывает TV с [чанком](building-sites/elements/chunks "Чанки"). Для выполнения PHP используйте [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET привязка").

## Смотрите также

- [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона")
- [Привязки](building-sites/elements/template-variables/bindings "Привязки")
- [Привязка SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET привязка")
