---
title: "getResources &where"
---

The `&where` property adds extra conditions to the getResources query. Pass a **JSON** string. getResources runs it through `$modx->fromJSON()`, then feeds the result to [`xPDOQuery::where()`](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where).

Use resource fields (`template`, `pagetitle`, `alias`, `published`, `parent`, and so on). For Template Variable filters, use `&tvFilters` instead.

## Form

Keys follow xPDO’s `field:operator` pattern. Omit the operator for equals:

```text
{"field": value}
{"field:=": value}
{"field:operator": value}
{"OR:field:operator": value}
{"AND:field:operator": value}
```

Common operators: `=`, `!=`, `>`, `<`, `>=`, `<=`, `LIKE`, `NOT LIKE`, `IN`, `NOT IN`, `IS`.

Put the JSON inside backticks on the snippet call. Prefer double quotes inside the JSON so you do not fight the outer backticks.

## Examples

Match template ID 8:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"template:=":8}`
  &tpl=`myRowTpl`
]]
```

Template 1 **or** 2 (same field twice needs an `OR:` key; plain duplicate keys in one object will not work):

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"template:=":1,"OR:template:=":2}`
  &tpl=`myRowTpl`
]]
```

Template in a list:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"template:IN":[1,2,3]}`
  &tpl=`myRowTpl`
]]
```

Alias starts with `news-`:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"alias:LIKE":"news-%"}`
  &tpl=`myRowTpl`
]]
```

Published resources whose pagetitle contains `Guide`:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"published:=":1,"pagetitle:LIKE":"%Guide%"}`
  &tpl=`myRowTpl`
]]
```

Only resources that are not folders and not hidden from menus:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"isfolder:=":0,"hidemenu:=":0}`
  &tpl=`myRowTpl`
]]
```

Null check (empty `pub_date`):

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`{"pub_date:IS":null}`
  &tpl=`myRowTpl`
]]
```

### Grouped OR / AND

Pass a **JSON array of objects** when you need groups, the same way xPDO accepts nested condition arrays. Example from the getResources snippet header: match alias LIKE patterns **or** a pagetitle/description pair:

```php
[[getResources?
  &parents=`[[*id]]`
  &where=`[{"alias:LIKE":"foo%","OR:alias:LIKE":"%bar"},{"OR:pagetitle:=":"foobar","AND:description:=":"raboof"}]`
  &tpl=`myRowTpl`
]]
```

## Tips

- Invalid JSON makes `&where` empty. Validate the string if results look wrong.
- Do not reuse the same JSON key twice in one object. Use `OR:field:=` / `AND:field:=`, `:IN`, or an array of objects.
- `&where` stacks on top of `&parents`, `&resources`, published/deleted flags, and context limits that getResources already builds.
- Operator details and PHP-array examples live on [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where). Translate those arrays to JSON for this property.

## See also

- [getResources](extras/getresources)
- [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where)
