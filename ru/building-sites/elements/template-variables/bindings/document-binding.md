---
title: "Привязка DOCUMENT"
translation: "building-sites/elements/template-variables/bindings/document-binding"
---

## Привязка @DOCUMENT

`@DOCUMENT` возвращает содержимое одного ресурса. Она делает то же, что [`@RESOURCE`](building-sites/elements/template-variables/bindings/resource-binding).

```
@DOCUMENT resource_id
```

`resource_id` задаёт числовой id ресурса. Привязка возвращает содержимое этого ресурса. `pagetitle`, `introtext` и другие поля она не читает. Чтобы взять другое поле, вызовите сниппет через [`@SNIPPET`](building-sites/elements/template-variables/bindings/snippet-binding).

```
@DOCUMENT 12
```

Если такого ресурса нет, привязка возвращает `false`, а не пустую строку.

## См. также

- [Привязки](building-sites/elements/template-variables/bindings)
- [Привязка @RESOURCE](building-sites/elements/template-variables/bindings/resource-binding)
- [Привязка @CHUNK](building-sites/elements/template-variables/bindings/chunk-binding)
- [Привязка @SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding)
