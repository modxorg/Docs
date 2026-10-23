---
title: "INHERIT Binding"
_old_id: "163"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/inherit-binding"
---

## What is the @INHERIT Binding?

The @INHERIT binding looks up the same TV on the parent Resource. If that parent also uses @INHERIT, it keeps walking up. If the walk reaches the root and no value was stored, the TV is empty. It is not `0`. To supply a fallback at the root, write it after the command: `@INHERIT fallback`.

While the child still shows the inherited value, MODX does not store a separate value for that child.

**Be Careful**
A value is not always written to the database when you are using @INHERIT.

While the child still matches what `@INHERIT` would return, MODX does not keep a separate value for that child. Later edits on the parent show up on the child. A value you type on the child stops the lookup. Clearing the field does not turn the lookup back on: the empty value is saved, and the child stays empty. To inherit again, set the child so its saved value matches the processed `@INHERIT`. MODX then drops the child's own value.

## Usage

This gets used when you define a Template Variable. You paste the following into the TV's "Default Value" field:

``` php
@INHERIT
```

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")