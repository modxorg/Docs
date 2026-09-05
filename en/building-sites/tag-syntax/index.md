---
title: "Tag Syntax"
sortorder: "1"
_old_id: "302"
_old_uri: "2.x/making-sites-with-modx/tag-syntax"
---

## MODX tag variants

MODX provides a handy array of tags differentiated by a token, or set of tokens, which appear before a string. The below table identifies these tokens and where and how they are likely to be used.

| Type                                                            | Token | Example             | Usage                                                                                                |
| --------------------------------------------------------------- | ----- | ------------------- | ---------------------------------------------------------------------------------------------------- |
| Comment                                                         | `-`   | `[[- Comment ]]`    | Defines an un-parsed comment.<br>*eg:* `[[- This is a comment]]`                                     |
| [Resource Field](building-sites/tag-syntax/common)              | `*`   | `[[*fieldName]]`    | Outputs the value of a field related to the current resource.<br>*eg:* `[[*pagetitle]]`              |
| [Template Variable](building-sites/elements/template-variables) | `*`   | `[[*tvName]]`       | Output the value of a template variable.<br>*eg:* `[[*tags]]`                                        |
| [Chunk](building-sites/elements/chunks)                         | `$`   | `[[$chunkName]]`    | Defines a static chunk of code to be rendered.<br>*eg:* `[[$header]]`                                |
| [Snippet](building-sites/elements/snippets)                     |       | `[[snippetName]]`   | Defines a PHP snippet of code to be executed.<br>*eg:* `[[getResources]]`                            |
| Placeholder                                                     | `+`   | `[[+placeholder]]`  | Defines a placeholder for value(s) from the return of a query.<br>*eg:* `[[+pagetitle]]`             |
| Link                                                            | `~`   | `[[~link]]`         | Returns a link derived from a value.<br>*eg:* `[[~1? &scheme=full]]`                                 |
| [Setting](building-sites/settings)                              | `++`  | `[[++settingName]]` | Defines a placeholder specifically for values defined in system settings.<br>*eg:* `[[++site_name]]` |
| [Language](extending-modx/internationalization)                 | `%`   | `[[%language]]`     | *eg:* `[[%string? &language=en &namespace=generic &topic=topic]]`                                    |

## Deconstruction of a MODX Tag

A MODX tag can be extended with optional indicators and properties. The table below deconstructs a MODX tag in its entirety and illustrates how and where these optional indiciators and properties could be used.

| Type                      | Usage                                                                                                                                                                            |
| ------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `[[`                      | Defines the opening of a MODX tag.                                                                                                                                               |
| `!`                       | *Optional* non-caching flag                                                                                                                                                      |
| `Token`                   | *Optional* Defines element type.<br>`$` = Chunk,<br>`*` = Resource field / Template variable,<br>`+` = Placeholder *See above for more variants*                                 |
| `Name`                    | Name value of requested element.                                                                                                                                                 |
| `@propertyset`            | Defines a [property set](building-sites/properties-and-property-sets) to be used.                                                                                                |
| ``` :modifier=`value` ``` | Defines an output filter or modifier to be used.<br>*eg:*```:gt=`0`:then=`Now available!` ```                                                                                    |
| `?`                       | Indicates to MODX that properties accompany this call.<br>*Required if properties present*                                                                                       |
| ``` &property=`value` ``` | Defines a [property](building-sites/properties-and-property-sets) and value to be used with the call. Each property set separated by `&`.<br>*eg:* ``` &prop1=`1` &prop2=`2` ``` |
| `]]`                      | Defines the closing of a MODX tag.                                                                                                                                               |

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

## Literal square brackets inside tags

MODX 3 can keep literal single `[` and `]` characters inside tag property values (for example in an output filter) without breaking tag collection. [#13904](https://github.com/modxcms/revolution/pull/13904)

```php
[[+label:notempty=`[required]`]]
```

Standard tags still use double brackets: `[[ ... ]]`.

## Array values in element properties (extras / custom parsers)

When a snippet, chunk, or other element receives **array** property values (typical in PHP API calls rather than tag strings), MODX builds a stable cache/tag signature by serializing those arrays. Custom parser or element subclasses that forge tag signatures should treat array properties the same way so cache keys stay sortable and consistent. [#14689](https://github.com/modxcms/revolution/pull/14689)

## Properties

All MODX tags can accept [properties](building-sites/properties-and-property-sets), not just Snippets.

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

### When to cache

Cache every tag whose output stays the same between cache clears. Saving a Resource, Element, or (in many cases) a Setting clears the cache, so menus and listings usually do not need `!`.

Leave a tag uncached when:

1. The output is user-specific (Login, profile data, `[[!+modx.user.id]]`, member-only menus).
2. The output depends on GET/POST or other request data (search results, `getPage` paging, form feedback).
3. The Snippet's job is to redirect or otherwise act on the request even when it prints nothing.
4. You need custom cache lifetimes for data that changes outside MODX (write that inside the Snippet or use a dedicated cache Extra).

Common mistakes: calling Wayfinder or getResources with `!` "so the menu updates" (a content save already rebuilds the cache), and calling `If` uncached when its subject is a static Resource field.

### Parsing Order

The parser walks nested tags **inside out**. It finishes all **cached** work first, then processes **uncached** tags. A rough priority:

1. Nested cached tag
2. Cached tag
3. Nested uncached tag
4. Uncached tag

After a cached pass, any remaining uncached tags are left in the cached page output and run on every request.

If you call an uncached Snippet that sets placeholders, mark those placeholders uncached too:

``` php
[[!Profile]]
Hello [[!+username]],
```

Otherwise a cached `[[+username]]` can show a previous (or empty) value.

### Nested tags and "mosquito" conditionals

Nested tags are normal. Conditionals that embed full tags in `:then=` / `:else=` are risky: both branches are parsed **before** the condition runs. A redirect Snippet in the unused branch still fires.

Build the **next** tag from the condition result instead (mosquito style), then wrap it in outer `[[` `]]`:

``` php
[[[[*id:is=`1`:then=`$homeChunk`:else=`$defaultChunk`]]]]
```

Summary and examples: [Nested tags, caching, and mosquito conditionals](building-sites/tag-syntax/nested-tags).

## Timing

There are several timing tags in MODX:

- **\[^qt^\]** - Query Time - Shows how long MODX took talking to the database
- **\[^q^\]** - Query Count -Shows how many database queries MODX made
- **\[^p^\]** - Parse Time - Shows how long MODX took to parse the page
- **\[^t^\]** - Total Time - Shows the total time taken to parse/render the page
- **\[^s^\]** - Source - Shows the source of page, whether is database or cache
- **\[^m^\]** - Memory Usage - Shows the total memory taken to parse/render the page

### Additional Help

Because the tag syntax is problematic for many newcomers, there are tools available to help highlight problems. Check out the [SyntaxChecker](https://modx.com/extras/package/syntaxchecker) plugin.
