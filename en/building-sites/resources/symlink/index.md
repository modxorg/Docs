---
title: "Symlink"
description: "Forward a request to another Resource without changing the URL, with target rules and permissions."
_old_id: "296"
_old_uri: "2.x/making-sites-with-modx/structuring-your-site/resources/symlink"
---

## What is a Symlink?

A Symlink forwards a request to another Resource. It keeps the URL the visitor used and returns the target's content in the same response. It is not an HTTP redirect: the status is 200, and search engines see the content at both URLs. Unlike a 301, it does not pass ranking signals to the target.

For a 301, use a [Weblink](building-sites/resources/weblink) with a `301` Response Code, or a server-level redirect.


## Use Cases

- Keep an old URL working after a Resource moves. Add a canonical tag if duplicate content matters for search.
- Show the same content at more than one place in the tree without duplicating it.
- Provide a short URL for a Resource deep in the tree.
- Cover spelling variants of a URL, each as a separate Symlink.

## Target

The `content` field holds the target Resource ID. A tag is accepted if it renders a numeric ID. A URL or alias is not supported: `sendForward()` converts the value to an integer, so a non-numeric target ends on the error page. Use a [Weblink](building-sites/resources/weblink) for external URLs.

The target must exist. MODX rejects a non-numeric value and a missing Resource when you save a Symlink. A value that contains tags skips that check and is resolved at request time.

The update processor also rejects a Symlink that points to itself. The create processor does not, so avoid entering the new Resource's own ID.

## Target visibility and permissions

An unpublished target is not returned to anonymous visitors: MODX treats it as missing and sends the 404 error page. A signed-in manager user with `view_unpublished` can open it.

The target's `view` permission is checked during the forward. A Symlink in another Resource Group does not grant access to the target; it adds another check. A Symlink can narrow access, not widen it.

## Fields and caching

The Symlink's non-empty fields can override the target's fields, depending on [`symlink_merge_fields`](building-sites/settings/symlink_merge_fields). The `content` field always stays the target ID. See [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks#field-merging) for the exclusions.

If the target does not appear after you save, clear the site cache and the document cache.

## See Also

1. [Content Types](building-sites/resources/content-types)
2. [Named Anchor](building-sites/integrating-templates/named-anchor)
3. [Static Resource](building-sites/resources/static-resource)
4. [Symlink](building-sites/resources/symlink)
5. [Using Resource Symlinks](building-sites/resources/symlink/using-resource-symlinks)
6. [Weblink](building-sites/resources/weblink)
