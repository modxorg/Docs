---
title: "remove"
description: "Remove the persistent instance of an object permanently, together with everything linked to it by composite relations."
_old_id: "1203"
_old_uri: "2.x/class-reference/xpdoobject/persistence-methods/remove"
---

## xPDOObject::remove()

Delete the row behind this object, and every row reachable through a composite relation.

## Syntax

``` php
boolean remove ([array $ancestors = array ()])
```

`$ancestors` is filled in by the method itself to break circular references. Pass it only when you need to remove several objects that reference each other.

## Composite Relations Are Removed First

Before deleting its own row, the method walks `_composites` and calls `remove()` on every object it finds there: through `getMany()` for a relation of `cardinality="many"`, through `getOne()` for `cardinality="one"`. Each of those objects is walked the same way, so the deletion goes all the way down the tree.

Aggregate relations are **not** followed. Objects that only point at this one through an `aggregate` relation stay in the database.

> [!CAUTION]
> A `modResource` owns five composite relations, and one of them is `Children`:
>
> | Alias | Class | Foreign key |
> | --- | --- | --- |
> | `Children` | `MODX\Revolution\modResource` | `parent` |
> | `TemplateVarResources` | `MODX\Revolution\modTemplateVarResource` | `contentid` |
> | `ResourceGroupResources` | `MODX\Revolution\modResourceGroupResource` | `document` |
> | `Acls` | `MODX\Revolution\modAccessResource` | `target` |
> | `ContextResources` | `MODX\Revolution\modContextResource` | `resource` |
>
> `remove()` on one resource therefore deletes its whole subtree of child resources, together with the TV values, resource group assignments, permissions, and context settings that belong to every resource in that subtree. To take a resource out of the tree without losing it, set `deleted` and `published` and move it to the recycle bin instead. See [Removing Objects](extending-modx/xpdo/removing-objects).

## Returns false Without a Primary Key

A new object has no primary key yet, and `remove()` does not build an INSERT for it. The method returns `false` straight away, without a query and without a message in the log.

## Examples

Remove a single object that has no composite relations:

``` php
$snippet = $modx->getObject('modSnippet', 12);

if (!$snippet->remove()) {
    return 'The snippet was not removed.';
}
```

Move every child of a resource to the recycle bin instead of deleting the tree:

``` php
$resource = $modx->getObject('modResource', 5);

foreach ($resource->getMany('Children') as $child) {
    $child->set('deleted', true);
    $child->set('published', false);
    $child->save();
}
```

## See Also

- [Removing Objects](extending-modx/xpdo/removing-objects)
- [save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save)