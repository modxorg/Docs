---
title: "Complex Queries with xPDOCriteria and xPDOQuery"
_old_id: "1219"
_old_uri: "2.x/getting-started/introduction-to-the-xpdo-object-model/understanding-xpdocriteria-and-xpdoquery"
---

## Overview

`xPDOCriteria` and `xPDOQuery` are the primary tools for building **complex** queries against the MODX database. They provide a fluent, object‑oriented API that abstracts raw SQL while still allowing fine‑grained control. The classes live in the `xPDO\Om` namespace and are instantiated via `$modx->newQuery('ClassName')`.

## Three‑Part Key Syntax (`CONJ:FIELD:OPERATOR`)

When building a criteria array you can use the **three‑part key** syntax to declare a **conjunction** (AND/OR), the **field** name and an **operator** in a single string:

```php
$query->where([
    // AND conjunction (default)
    'name:LIKE' => "%example%",            // name LIKE "%example%"
    // Explicit AND – same as default
    'price:>='   => 10,                     // price >= 10
    // OR conjunction – query will be (condition1 OR condition2)
    'OR:status:IN' => ['draft', 'pending'],
]);
```

- **Conjunction** – optional (`AND` is assumed). Use `OR:` to group conditions with logical OR.
- **Field** – any column of the target class.
- **Operator** – one of the supported operators (`=`, `!=`, `>`, `>=`, `<`, `<=`, `LIKE`, `IN`, `NOT IN`, `BETWEEN`, `NOT BETWEEN`, …). The operator is case‑insensitive.

The three‑part syntax mirrors the implementation in `xPDO\Om\xPDOCriteria::parseCriteria()` and is documented in the source at `core/vendor/xpdo/xpdo/src/xPDO/Om/xPDOQuery.php`.

## LIKE Behaviour

`LIKE` in xPDO does **not** automatically add wildcard characters. You must include `%` (or `_`) in the value yourself. This mirrors raw SQL semantics and prevents accidental matches:

```php
$query->where([
    // Correct – matches any name containing "car"
    'name:LIKE' => "%car%",
]);
```

If you omit the wildcard, the statement becomes an exact match (`name LIKE 'car'`). The docs previously suggested automatic wildcards – this has been corrected.

## IN Behaviour

When using the `IN` operator, the value must be an **array** of items. xPDO will **inline** the values into the generated SQL and will **type‑cast** each element based on the field’s metadata. Empty arrays are ignored and a **warning** is logged:

```php
// Safe usage – array of integers
$query->where([
    'id:IN' => [1, 2, 3],
]);

// Empty array – will be ignored and a warning emitted
$query->where([
    'id:IN' => [],
]);
```

If the array contains mixed types, each element is cast to the column’s PHP type (`int`, `float`, `string`, …) before being interpolated.

## Condition Grouping (`$condGroup` and `$conjunction`)

xPDO supports **nested condition groups** via the `$condGroup` parameter of `where()`. Pass an array of groups or use the `orWhere()` helper for OR logic:

```php
$query->where([
    // Group 1 – ANDed together (default)
    'price:>' => 5,
    'price:<=' => 20,
], xPDO::CONJUNCTION_AND);

// OR group – any of the conditions may match
$query->orWhere([
    'status' => 'draft',
    'status' => 'pending',
]);
```

Internally, `xPDOQuery::where()` builds a tree where each node can have its own conjunction (`AND`/`OR`). The `$condGroup` argument lets you supply a pre‑built group.

## `addDerivativeCriteria` – Automatic Filter for Single‑Table Inheritance

When a class participates in **single‑table inheritance (STI)**, xPDO adds a hidden column (often `class_key`) to differentiate child types. The method `addDerivativeCriteria()` is called automatically by `newQuery()` for such classes, injecting an additional `WHERE` clause that restricts results to the concrete class:

```php
// Assuming `MyBase` is an STI parent and `MyChild` extends it
$q = $modx->newQuery('MyChild');
// The generated SQL will contain: "class_key = 'MyChild'"
```

You normally do not need to add this manually; the method ensures that queries against a subclass never return rows belonging to a sibling subclass.

## Full Example

```php
$query = $modx->newQuery('modResource');
$query->where([
    // Find published resources that have a TV called "price" >= 10
    'published' => 1,
    'price:>=' => 10,
    // OR group – either status is draft OR pending
    'OR:status:IN' => ['draft', 'pending'],
    // LIKE with explicit wildcards
    'pagetitle:LIKE' => "%car%",
]);

// Add a custom condition group for date range
$dateGroup = $modx->newQuery('modResource');
$dateGroup->where([
    'createdon:>=' => '2024-01-01',
    'createdon:<=' => '2024-12-31',
]);
$query->where($dateGroup);

$collection = $modx->getCollection('modResource', $query);
foreach ($collection as $resource) {
    echo $resource->get('id') . " – " . $resource->get('pagetitle') . "\n";
}
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
- [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")
