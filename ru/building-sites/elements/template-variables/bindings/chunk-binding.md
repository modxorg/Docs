---
title: "Привязка CHUNK"
translation: "building-sites/elements/template-variables/bindings/chunk-binding"
---

## Что такое @CHUNK привязка?

Привязка @CHUNK возвращает разобранное содержимое указанного чанка, когда @CHUNK используется в переменной шаблона (TV).

Другими словами, если @CHUNK Hello — значение TV с именем MyChunk, следующий тег в шаблоне или в поле содержимого ресурса будет заменён содержимым чанка Hello:

```php
[[*MyChunk]]
```

## Синтаксис

```php
@CHUNK chunk_name [properties_as_json]
```

Привязывает переменную к чанку. `chunk_name` — имя чанка. Возвращаемое значение — разобранный вывод чанка.

Необязательные JSON-свойства (MODX 3.0+) передаются в `getChunk()` как массив плейсхолдеров / свойств чанка.

## Использование

```php
@CHUNK MycontactForm
```

Со свойствами:

```php
@CHUNK MycontactForm {"submitLabel":"Отправить","showTitle":"1"}
```

Некорректный JSON после имени чанка пишется в лог ошибок и игнорируется. Чанк всё равно выполняется без этих свойств.

Эта привязка похожа на [@RESOURCE](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE привязка"), но связывает TV с [чанком](building-sites/elements/chunks "Чанки"). Для выполнения PHP используйте [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET привязка").

## Смотрите также

- [Переменные шаблона](building-sites/elements/template-variables "Переменные шаблона")
- [Привязки](building-sites/elements/template-variables/bindings "Привязки")
- [Привязка SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET привязка")
