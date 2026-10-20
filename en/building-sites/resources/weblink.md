---
title: "Weblink"
description: "Redirect a Resource to a URL or another Resource, with response codes and menu behavior."
_old_id: "336"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/weblink"
---

## What is a Weblink?

A Weblink is a Resource that redirects to another URL. The target can be an external address or a Resource in the MODX tree.

The `type` field of a Weblink is `reference`, but MODX routes by `class_key` and the `MODX\Revolution\modWebLink` class.

A Weblink Template is not rendered: `modWebLink::process()` sends the redirect before any Template output, so Template Variables attached to a Weblink are not shown.

## Target URL

The `content` field holds the target. A numeric value is treated as a Resource ID: MODX builds the full URL with `makeUrl()` and redirects there. A non-numeric value is treated as a URL; MODX parses tags such as `[[~12]]` or `[[+placeholder]]` first, then redirects.

A numeric target must be an existing Resource. MODX rejects a missing ID when you save.

## Response Code

A Weblink sends `HTTP/1.1 301 Moved Permanently` by default. Change it in the **Response Code** field on the **Settings** tab.


The value is stored as the `responseCode` property of the Resource in the `core` namespace. Examples:

```text
HTTP/1.1 302 Found
HTTP/1.1 307 Temporary Redirect
```

A 301 is cached by browsers and search engines. Use a temporary code while the target may change.

## Weblinks in menus and link tags

By default, menus and link tags point to the Weblink's own URL, and the request triggers the redirect.

Enable [`use_weblink_target`](building-sites/settings/use_weblink_target) to make link tags and `makeUrl()` return the target URL directly. The setting is off by default.

## Example: footer link to another section

A footer menu needs links to Terms of Use, a Privacy Policy, and Contact Us. Contact Us already exists in the main tree and should not appear in the main menu.

Create an unpublished "utility pages" container and put the Contact Us Resource there. Then add a Weblink to that Resource in the footer menu container. The menu gets the Contact Us link without moving the Resource.


## See Also

1. [Content Types](building-sites/resources/content-types)
2. [Named Anchor](building-sites/integrating-templates/named-anchor)
3. [Static Resource](building-sites/resources/static-resource)
4. [Symlink](building-sites/resources/symlink)
5. [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks)
