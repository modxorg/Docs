---
title: "RESOURCE Binding"
_old_id: "260"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding"
---

## What is the @RESOURCE Binding?

The @RESOURCE Binding returns the parsed contents of any specified Resource.

## Syntax

``` php
@RESOURCE resource_id
```

Binds the variable to a Resource, where resource\_id is the ID of the Resource. The returned value is a string containing the parsed content of the Resource.

## Usage

To output the contents of a Resource with ID of 12:

``` php
@RESOURCE 12
```

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")