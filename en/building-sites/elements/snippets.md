---
title: "Snippets"
sortorder: "4"
_old_id: "335"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/using-snippets"
---

[Snippets](extending-modx/snippets "Snippets") are MODX's answer to inline PHP code. They provide customizable dynamic content, such as menus, blog or news listings, search and other form-based functionality and anything else that your site needs to generate on-demand.

## Using a Snippet

Once you have a Snippet installed, you can use it simply by putting its tags in your template, a chunk or TV, or a document's content wherever you want the Snippet's output to be displayed.

``` php
[[MySnippet]]
```

If you expect the snippet code to be dynamic for different users, you can also call a snippet uncached:

``` php
[[!MySnippet]]
```

## Snippet Properties

Snippets can have [Properties](building-sites/properties-and-property-sets "Properties and Property Sets"), which can be passed in the Snippet call, like so:

``` php
[[!Wayfinder? &startId=`0` &level=`1`]]
```

You can also aggregate these Properties into a [Property Set](building-sites/properties-and-property-sets "Properties and Property Sets"), which is a dynamic collection of properties that can be attached to any Snippet (or Element for that matter). This allows you to share common property configs in a snippet call in one place.

Say you had a Property Set called 'Menu' with `startId` set to 0 and `level` set to 1:

``` php
[[!Wayfinder@Menu]]
```

would then load those properties automatically into the Snippet. And even those properties can be overridden:

``` php
[[!Wayfinder@Menu? &level=`2`]]
```

which would override the set's value on `level` of 1, setting it instead to 2.

## Installing Snippets

You can also download and install Snippets via [Package Management](extending-modx/transport-packages "Package Management"). See the tutorial on [installing a Package](building-sites/extras "Installing a Package") for more information.

## See Also

- [Installing a Package](building-sites/extras "Installing a Package")
