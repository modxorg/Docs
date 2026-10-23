---
title: "Snippets"
sortorder: "4"
_old_id: "335"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/using-snippets"
---

A [Snippet](extending-modx/snippets "Snippets") is PHP that the page runs when it is requested. Typical results are a menu, a news list, or a search form.

## Using a Snippet

Put the Snippet tag where its output should appear: in a Template, a Chunk, a TV, or Resource content.

``` php
[[MySnippet]]
```

If you expect the snippet code to be dynamic for different users, you can also call a snippet uncached:

``` php
[[!MySnippet]]
```

## Snippet Properties

Pass [properties](building-sites/properties-and-property-sets "Properties and Property Sets") in the Snippet call:

``` php
[[!Wayfinder? &startId=`0` &level=`1`]]
```

A [property set](building-sites/properties-and-property-sets "Properties and Property Sets") stores those properties under one name. Attach the set to the Snippet (or to another Element).

Say you had a Property Set called `Menu` with `startId` set to 0 and `level` set to 1. Attach that set to the Snippet. Then:

``` php
[[!Wayfinder@Menu]]
```

That call loads those properties into the Snippet. If the set is not attached to this Snippet, `@Menu` adds nothing. Properties in the tag still override the set:

``` php
[[!Wayfinder@Menu? &level=`2`]]
```

sets `level` to 2 instead of the set's `1`.

## Installing Snippets

Install a Snippet from [Package Management](extending-modx/transport-packages "Package Management"). Steps: [installing a package](building-sites/extras "Installing a Package").

## See Also

- [Installing a Package](building-sites/extras "Installing a Package")
