---
title: "Tag Syntax"
sortorder: "1"
_old_id: "302"
_old_uri: "2.x/making-sites-with-modx/tag-syntax"
---

## MODX tag variants

MODX provides a handy array of tags differentiated by a token, or set of tokens, which appear before a string. The below table identifies these tokens and where and how they are likely to be used.

| Type              | Token | Example             | Usage                                                                                              |
| ----------------- | ----- | ------------------- | -------------------------------------------------------------------------------------------------- |
| Comment           | `-`   | `[[- Comment ]]`    | Defines an un-parsed comment.  *eg: `[[- This is a comment]]`*                                     |
| Resource Field    | `*`   | `[[*fieldName]]`    | Outputs the value of a field related to the current resource.  *eg: `[[*pagetitle]]`*              |
| Template Variable | `*`   | `[[*tvName]]`       | Output the value of a template variable.  *eg: `[[*tags]]`*                                        |
| Chunk             | `$`   | `[[$chunkName]]`    | Defines a static chunk of code to be rendered.  *eg: `[[$header]]`*                                |
| Snippet           |       | `[[snippetName]]`   | Defines a PHP snippet of code to be executed.  *eg: `[[getResources]]`*                            |
| Placeholder       | `+`   | `[[+placeholder]]`  | Defines a placeholder for value(s) from the return of a query.  *eg: `[[+pagetitle]]`*             |
| Link              | `~`   | `[[~link]]`         | Returns a link derived from a value.  *eg: `[[~1? &scheme=full]]`*                                 |
| Setting           | `++`  | `[[++settingName]]` | Defines a placeholder specifically for values defined in system settings.  *eg: `[[++site_name]]`* |
| Language          | `%`   | `[[%language]]`     | *eg: `[[%string? &language=en &namespace=generic &topic=topic]]`*                                  |

## Deconstruction of a MODX Tag

A MODX tag can be extended with optional indicators and properties. The table below deconstructs a MODX tag in its entirely and illustrates how and where these optional indiciators and properties could be used.

| Type                     | Usage                                                                                                                                      |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------ |
| `[[`                     | Defines the opening of a MODX tag.                                                                                                         |
| `!`                      | *Optional* non-caching flag                                                                                                                |
| `Token`                  | *Optional* Defines element type.  `$` = Chunk,  `*` = Resource field / Template variable,  `+` = Placeholder *See above for more variants* |
| `Name`                   | Name value of requested element.                                                                                                           |
| `@propertyset`           | Defines a property set to be used.                                                                                                         |
| ```:modifier=`value` ``` | Defines an output filter or modifier to be used. *eg:  ```:gt=`0`:then=`Now available!` ``` *                                              |
| `?`                      | Indicates to MODX that properties accompany this call.  *Required if properties present*                                                   |
| ```&property=`value` ``` | Defines a property and value to be used with the call. Each property set separated by `&`.  ```*eg: &prop1=`1` &prop2=`2`*```              |
| `]]`                     | Defines the closing of a MODX tag.                                                                                                         |

## Construction of a MODX Tag

Utilising and combining all of the information above we could create a complex MODX tag which would look like the following:

```php
[[!MySnippet@myPropSet:filter1:filter2=`modifier`? &prop1=`x` &prop2=`y`]]
```

However, although MODX allows the use of complex conditional filters users should be cautious when constructing complicated tag logic. Unlike PHP, when you have invalid MODX tag syntax there are no helpful messages with line numbers indicating the location of an error.

Having tags that require debugging defeats the purpose of having a clean view layer. Keep 'em clean and simple.

A good rule-of-thumb is that your tags should fit onto one line, even if you multi-line them out for legibility. If you are reliant upon if statements and other conditionals in your MODX tags then a reconsideration of flow logic may be merited.

**Note** MODX is ambiguous to white space meaning both of the examples below would also be acceptable:

```php
[[!getResources? &parents=`123` &limit=`5`]]

[[!getResources?
  &parents=`123`
  &limit=`5`
]]
```

## Properties

All MODX tags can accept properties, not just Snippets.

In the example below we have a simple chunk named 'Hello'.

``` php
Hello [[+name]]!
```

Inside this chunk we have the `[[+name]]` placeholder setup for a value to be rendered. We can pass this value directly into our chunk with the following code:

``` php
[[$Hello? &name=`George`]]
```

This call would render as follows:

``` php
Hello George!
```

## Caching

Any tag can be called uncached by inserting an exclamation point immediately after the opening double-bracket:
`[[!snippet]]`, `[[!$chunk]]`, `[[!+placeholder]]`, `[[!*template_var]]`, etc.

If you have some kind of advanced setup in which the site_url setting is being set per request, but your `[[~[[*id]]]]` links are not being generated properly, remember that any tag can be called uncached, including the link or anchor tag: `[[!~[[*id]]]]`

However, you will only need that when the site\_url is set dynamically, can differ per request, and you are generating full URLs instead of relative ones. Any normal usage can be cached.

### Parsing Order

If you call an uncached Snippet, it will be executed after all cached tags have been processed.

If you have cached placeholders below that, they will be evaluated before that Snippet is executed - meaning they'll get the last value that was stored in the cache by that Snippet previously (or empty, if not set yet).

If you want to call a Snippet uncached that sets placeholders, you need to make sure the placeholders are set to uncached as well:

``` php
[[!Profile]]
Hello [[!+username]],
```

## Timing

There are several timing tags in MODX:

- **\[^qt^\]** - Query Time - Shows how long MODx took talking to the database
- **\[^q^\]** - Query Count -Shows how many database queries MODX made
- **\[^p^\]** - Parse Time - Shows how long MODX took to parse the page
- **\[^t^\]** - Total Time - Shows the total time taken to parse/render the page
- **\[^s^\]** - Source - Shows the source of page, whether is database or cache
- **\[^m^\]** - Memory Usage - Shows the total memory taken to parse/render the page

### Additional Help

Because the tag syntax is problematic for many newcomers, there are tools available to help highlight problems. Check out the [SyntaxChecker](http://modx.com/extras/package/syntaxchecker) plugin.
