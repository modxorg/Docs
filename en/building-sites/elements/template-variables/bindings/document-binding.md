---
title: "@DOCUMENT Binding"
_old_id: "999"
_old_uri: "..."
---

## @DOCUMENT Binding

`@DOCUMENT` returns the content of one Resource. It does the same job as [`@RESOURCE`](building-sites/elements/template-variables/bindings/resource-binding).

```
@DOCUMENT resource_id
```

`resource_id` is the numeric id of the Resource. The binding returns that Resource's content. It does not read `pagetitle`, `introtext`, or any other field. To use another field, call a Snippet with [`@SNIPPET`](building-sites/elements/template-variables/bindings/snippet-binding).

```
@DOCUMENT 12
```

If that Resource does not exist, the binding returns `false`, not an empty string.

## See Also

- [Bindings Overview](building-sites/elements/template-variables/bindings)
- [@RESOURCE Binding](building-sites/elements/template-variables/bindings/resource-binding)
- [@CHUNK Binding](building-sites/elements/template-variables/bindings/chunk-binding)
- [@SNIPPET Binding](building-sites/elements/template-variables/bindings/snippet-binding)
