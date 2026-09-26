---
title: "Nested tags, caching, and mosquito conditionals"
sortorder: 5
description: "How MODX parses nested tags, what ends up in the cache, and how to write conditionals without parsing unused branches."
---

MODX parses nested tags **inside out** and treats cached and uncached tags differently. That is useful when you nest a TV inside a Snippet property. It also explains why a conditional with full tags in both branches can run expensive code you never meant to run.

This page expands the short notes on [Tag Syntax](building-sites/tag-syntax#caching). The caching rules come from [Mark Hamstra's guidelines](https://www.markhamstra.com/modx/2011/10/caching-guidelines-for-modx-revolution/) and [nested caching write-up](https://www.markhamstra.com/modx/2011/11/nested-caching-in-modx-revolution/). The "mosquito" pattern is from [Jason Coward's post](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/).

## Parsing order (cached first)

On each pass the parser finds tags and runs them by priority, then checks the result for more tags and repeats.

Typical priority:

1. Nested cached tag
2. Cached tag
3. Nested uncached tag
4. Uncached tag

Source order also matters: a tag earlier in the template runs before a later one at the same priority.

Uncached tags wait until cached work for that pass is done. When the Resource is cacheable, the page cache stores the HTML **with uncached tags still present**. Later requests only re-run those `!` tags.

### Nested example

Start with a TV filter that embeds chunks:

``` php
[[*featured:is=`1`:then=`[[$chunkA]]`:else=`[[$chunkB]]`]]
```

The parser resolves the inner `[[$chunkA]]` and `[[$chunkB]]` (and anything inside them) **before** it evaluates `:is`. After that pass you may see something like:

``` php
[[*featured:is=`1`:then=`Title-[[!snippetA]]`:else=`Title-[[!snippetB]]`]]
```

Then the cached TV/filter runs. Only one branch remains in the output, but **both** branches already ran. Any uncached Snippet left in the winning branch stays in the cache file for every request.

## Caching guidelines (short)

| Situation | Prefer |
| --- | --- |
| Menus, listings, static chunks, Resource fields | Cached (no `!`) |
| Login / user profile / member-only output | Uncached |
| Output driven by query string or POST | Uncached |
| Snippet that only redirects | Uncached |
| External data with its own lifetime | Custom cache inside the Snippet |

Do not uncache Wayfinder or getResources just so edits "show up". Saving content clears the cache.

If an uncached Snippet sets placeholders, call those placeholders uncached too:

``` php
[[!Profile]]
Hello [[!+username]]
```

## Why conditionals bite ("mosquitoes")

This looks neat and is often wrong for performance:

``` php
[[*id:is=`1`:then=`[[!FirstChildRedirect]]`:else=`[[$videoGallery]]`]]
```

Because parsing is inside out, `FirstChildRedirect` and `$videoGallery` both run before `:is` decides. You can get redirected even when the condition would have chosen the gallery.

Conditionals with full tags in `:then` / `:else` behave like mosquitoes: every nested tag takes a bite whether you needed that branch or not.

## Build the tag from the condition result

Return **tag tokens and names**, not finished tags. Wrap the whole expression in an outer `[[` `]]` so the next parser pass forms a real tag:

``` php
[[[[*id:is=`1`:then=`!FirstChildRedirect`:else=`$videoGallery`]]]]
```

Order of work:

1. Outer brackets wait.
2. The inner `[[*id:is=...]]` runs and returns either `!FirstChildRedirect` or `$videoGallery`.
3. With the outer brackets that becomes `[[!FirstChildRedirect]]` or `[[$videoGallery]]`.
4. Only that tag runs.

Snippet with no token: put `!` in the returned name when you need it uncached (`!FirstChildRedirect`). Chunks keep `$`. To do nothing on the other branch, return a comment token such as `-` so the outer tag becomes `[[-]]` and is skipped.

### Sidebox pattern

Jason's example chunk `sidebox`:

``` php
<div class="sidebox">
  <h1>[[+title]]</h1>
  [[[[+element]][[+properties]]]]
</div>
```

Call (names and properties assemble the next tag):

``` php
[[$sidebox?
  &title=`[[getValue? &class=`modResource` &field=`menutitle` &where=`{"id":[[UltimateParent]]}`]]`
  &element=`Wayfinder`
  &properties=`@SidebarMenu? &startId=`[[UltimateParent]]` &level=`1``
]]
```

Placeholders only build the element name and property string. The heavy Snippet runs once, on the next pass.

## Practical checks

1. Search templates for `:then=`[[` and `:else=`[[`. Prefer mosquito-style returns when those branches call Snippets or large Chunks.
2. Keep navigation and getResources cached unless the markup is truly per-user or per-request.
3. After changing nesting, view the page HTML or use a parser/debug Extra and confirm unused branches do not appear as executed Snippets in the log.

## See also

- [Tag Syntax](building-sites/tag-syntax)
- [Output Filters / Modifiers](building-sites/tag-syntax/output-filters)
- [Caching Guidelines for MODX Revolution](https://www.markhamstra.com/modx/2011/10/caching-guidelines-for-modx-revolution/) (Mark Hamstra)
- [Nested caching in MODX Revolution](https://www.markhamstra.com/modx/2011/11/nested-caching-in-modx-revolution/) (Mark Hamstra)
- [Tags as the Result or How Conditionals are like Mosquitoes](https://modx.com/blog/2012/09/14/tags-as-the-result-or-how-conditionals-are-like-mosquitoes/) (Jason Coward)
