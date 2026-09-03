---
title: "CHUNK Binding"
_old_id: "55"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/chunk-binding"
---

## What is the @CHUNK Binding?

The @CHUNK Binding returns the parsed content of any specified Chunk when @CHUNK is used in a Template Variable (TV).

In other words, if @CHUNK Hello is the value of a TV called MyChunk, the following tag in a Template or in the Resource Content field of a Resource will be replaced with the contents of the Hello chunk:

``` php
[[*MyChunk]]
```

## Syntax

``` php
@CHUNK chunk_name [properties_as_json]
```

Binds the variable to a Chunk. `chunk_name` is the Chunk name. The returned value is the parsed Chunk output.

Optional JSON properties (MODX 3.0+) are passed to `getChunk()` as the Chunk placeholders / properties array.

## Usage

``` php
@CHUNK MycontactForm
```

With properties:

``` php
@CHUNK MycontactForm {"submitLabel":"Send","showTitle":"1"}
```

Invalid JSON after the Chunk name is logged as an error and ignored; the Chunk still runs without those properties.

This binding is similar to the [@RESOURCE binding](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE Binding"), except it binds the TV to a [Chunk](building-sites/elements/chunks "Chunks"). For running PHP, use [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding") instead.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
- [SNIPPET Binding](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding")
