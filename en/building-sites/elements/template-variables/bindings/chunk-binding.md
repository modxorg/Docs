---
title: "CHUNK Binding"
_old_id: "55"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/chunk-binding"
---

## What is the @CHUNK Binding?

The @CHUNK Binding returns the parsed content of any specified Chunk when @CHUNK is used in a Template Variable (TV).

If the TV `MyChunk` is set to `@CHUNK Hello`, this tag in a Template or in Resource content is replaced with the Hello Chunk:

``` php
[[*MyChunk]]
```

## Syntax

``` php
@CHUNK chunk_name [properties_as_json]
```

Binds the variable to a Chunk. `chunk_name` is the Chunk name. The returned value is the parsed Chunk output.

Optional JSON after the Chunk name becomes placeholders in that Chunk.

## Usage

``` php
@CHUNK MycontactForm
```

With properties:

``` php
@CHUNK MycontactForm {"submitLabel":"Send","showTitle":"1"}
```

Invalid JSON after the Chunk name is written to the MODX error log. The Chunk name is not trimmed, so MODX looks for a Chunk whose name includes that tail and does not find it. Valid JSON is still split off and passed to the Chunk.

This binding is similar to the [@RESOURCE binding](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE Binding"), except it binds the TV to a [Chunk](building-sites/elements/chunks "Chunks"). For running PHP, use [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding") instead.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
- [SNIPPET Binding](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding")
