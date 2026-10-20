---
title: "Named Anchor"
description: "Link to a place inside a page of MODX: build the URL of the resource with a fragment by hand, or let a plugin add the URL to every anchor of the page."
_old_id: "207"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/named-anchor"
---

## What is a Named Anchor?

A named anchor is a link to a place within the current Resource.

A typical named anchor looks like this:

> `<a name="prohibited"></a>`

With friendly URLs enabled, a plain `href="#prohibited"` sends the browser to the root of the site. The address of the page has no fragment of its own to anchor to. There are two ways to build the link so that it keeps working.

## Linking to the Anchor by Hand

A link to the current Resource, with a named anchor of "prohibited":

``` html
<a href="[[~[[*id]]]]#prohibited">Prohibited Activities</a>
```

A link to the Resource with ID 12, with the same anchor:

``` html
<a href="[[~12]]#prohibited">Prohibited Activities</a>
```

> [!WARNING]
> The path that `[[~id]]` returns is relative to the site, so it is correct only when the Template carries a `<base href="[[!++site_url]]" />`. Without a `<base href>` the browser resolves the path against the address of the current page. The link then breaks on every page that sits deeper than the root.

The Template needs the tag in the head:

``` html
<base href="[[!++site_url]]" />
```

The scheme of the link comes from the system setting [link_tag_scheme](building-sites/settings/link_tag_scheme). The default value `-1` gives a relative URL, `full` gives an absolute one. Every link can ask for another scheme on its own:

``` html
<a href="[[~12? &scheme=`full`]]#prohibited">Prohibited Activities</a>
```

## Adding the URL with a Plugin

Alternatively, a Plugin can prepend the URL of the current Resource to every anchor.

The extra [AnchorsAway](https://extras.modx.com/package/anchorsaway) does this. A Plugin of your own does the same: put the code below in a new Plugin. Assign it to the **OnWebPagePrerender** event on the **System Events** tab. The code comes from the thread [Plugin: AnchorsAway](https://forums.modx.com/thread/35800/plugin-anchorsaway) in the archive of the old forum.

``` php
if ($modx->resource->get('id') != $modx->config['site_start']) {
    $modx->resource->_output = str_replace('href="#', 'href="' . $modx->makeUrl($modx->resource->get('id')) . '#', $modx->resource->_output);
}
```

The code first makes sure we are not on the homepage: there is no need to add the URL there. When we are not, it replaces every occurrence of `href="#` with `href="<url>#`, so that the anchors work as intended.

> [!TIP]
> `OnWebPagePrerender` is called after the page is assembled and before it is sent, so a change of `$modx->resource->_output` made in the event reaches the browser.

Two more places in the core make the same kind of change:

- `modX::beforeRender()` — a public method of the class `modX`, called right before `OnWebPagePrerender`. A class that extends `modX` can override it and change the output there.
- The event `OnParseDocument` of the parser — it receives the content being parsed, so the anchors can be fixed in the content itself. The event is called on every pass, so the change has to be safe to repeat.

With the Plugin in place, a link to an anchor on another Resource still uses the `[[~12]]` form above.

## See Also

1. [Integrating Templates](building-sites/integrating-templates)
2. [Video Quick-Start Series](building-sites/integrating-templates/video-quick-start)
3. [Named Anchor](building-sites/integrating-templates/named-anchor)
4. [Templates](building-sites/elements/templates)
5. [Chunks](building-sites/elements/chunks)
6. [Snippets](building-sites/elements/snippets)
