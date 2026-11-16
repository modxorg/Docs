---
title: "SELECT Binding"
_old_id: "272"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/select-binding"
---

## What is the @SELECT Binding?

The @SELECT binding calls a database query based on the provided value and returns the result.

## Syntax

``` sql
@SELECT `pagetitle` AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0
```

Write the query in [MySQL](http://dev.mysql.com/doc/refman/5.1/en/) and run it in the MySQL command line first. The pitfalls are listed under Errors. When the query runs, turn it into a binding:

- add an `@` in front of your SELECT
- leave off the final semicolon

Put the binding in either place:

- The TV field on the Resource. That Resource must use a [Template](building-sites/elements/templates "Templates") which has this [Template Variable](building-sites/elements/template-variables "Template Variables") assigned. Paste the `@SELECT` text into the field.
- The **Default Value** box on the Template Variable. If you replace the default of a TV that Resources already use, those pages may expect the output shape this binding returns.

Select two columns. MODX adds `SELECT ` in front of what you write. The first column is the label and the second is the stored value, joined as `label==value`. Each row is joined with `||`. A query that returns one column is used as it is. A line break in the query does not stop the binding.

For example, to grab a list of active users in a SELECT box:

``` sql
@SELECT `username` AS `name`,`id` FROM `[[+PREFIX]]users` WHERE `active` = 1
```

## Alternatives

A [Snippet](extending-modx/snippets "Snippets") can do the same work. Use a Snippet when the query must read other TVs or the output needs its own formatting. The binding is a shortcut.

## Having a blank Option

A list fed by this query has no blank row unless the query returns one. Add that row with `UNION ALL`:

``` sql
@SELECT '-none-' AS username, 0 AS id UNION ALL
SELECT `username`,`id` FROM `[[+PREFIX]]users` WHERE `active` = 1 ORDER BY username ASC
```

`ORDER BY` can move that blank row off the top. In the example, the username starts with a hyphen so it sorts first.

## How rows are formatted

A two-column query, like the active-users example, returns rows shaped as `username==id`, with `||` between rows. That is the `label==value` list a Listbox expects. A query that needs joins across TV values is easier in a Snippet.

## Errors

A query can succeed in the MySQL command line and still fail in the binding:

- Do not end the query with `;`.
- A line break does not stop the binding.
- Check table names and the table prefix before you paste the query into the TV. If the query fails, look in the MODX error log.

## Next Step: Formatting

Output types can format the returned value. For formatting they do not cover, use a [Snippet](extending-modx/snippets "Snippets").

## Security

The binding runs your text as one query that starts with SELECT, using MODX's database connection. The code does not search that text for UPDATE, INSERT, DELETE, or DROP. It does not start those commands itself. Anyone who can edit the binding can read rows that connection can read. That includes another user's password hash and Resources that person should not see.

## See Also

- [Template Variables](building-sites/elements/template-variables "Template Variables")
- [Bindings](building-sites/elements/template-variables/bindings "Bindings")
