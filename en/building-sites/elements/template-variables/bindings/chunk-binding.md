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
@CHUNK chunk_name
```

Binds the variable to a document. Where chunk\_name is the name of the chunk. The returned value is a string containing the content of the chunk.

This binding is very similar to the [@RESOURCE binding](making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding "RESOURCE Binding") with the exception that it will bind the TV to a [Chunk](making-sites-with-modx/structuring-your-site/chunks "Chunks").

## Usage

``` php 
@CHUNK MycontactForm
```

## See Also

- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")