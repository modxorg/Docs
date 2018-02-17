---
title: "RESOURCE Binding"
_old_id: "260"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/resource-binding"
---

## What is the @RESOURCE Binding?

The @RESOURCE Binding returns the parsed contents of any specified Resource.

## Syntax

```
<pre class="brush: php">
@RESOURCE resource_id

```Binds the variable to a Resource, where resource\_id is the ID of the Resource. The returned value is a string containing the parsed content of the Resource.

## Usage

To output the contents of a Resource with ID of 12:

```
<pre class="brush: php">
@RESOURCE 12

```## See Also

- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")