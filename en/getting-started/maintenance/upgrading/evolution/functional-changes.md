---
title: "Functional Changes from Evolution"
_old_id: "151"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution"
---

## Changes from MODX Evolution to MODX Revolution

### Tag Syntax

Tag syntax changed; see the [Tag Syntax changes](building-sites/tag-syntax "Tag Syntax").

### Parsing Order

Evolution parsed a whole page through eval; Revolution parses tags in source order, as they occur:

- _Don't put Snippet calls that assign placeholders at the end of a Resource, or after the Resource._ The placeholders will be blank, because the [Snippet](extending-modx/snippets "Snippets") has not executed yet.
- _Tags can now have tags within their properties._ `[[mySnippet? &tag=`test`[[call]]``]]` is valid.
- Using `=`, `?`, `!` and `*` in a Snippet property is now allowed.


### No More 5000-Document limit

Later Evolution versions mostly lifted the 5000-document limit but kept a performance cost; Revolution removes it at the caching level.

Even so, a site with more than 10,000 Resources is usually designed the wrong way: for repeated pages such as inventories or e-commerce, write custom [Snippets](extending-modx/snippets "Snippets") that read their own database tables.

### Security

The access permissions system was rewritten as an ABAC-based system; see [Security](building-sites/client-proofing/security "Security").

### Error Page vs Unauthorized Page

On a protected front-end page, anonymous users are redirected to the Error (page not found) page, not the Unauthorized page: without the "load" permission a resource counts as nonexistent.

To send them to the Unauthorized page instead:

1. Create an Access Policy called "Load" and add a single Permission: Load.
2. Create a Context Access ACL entry for the anonymous User Group with a Context of "web," a Role of "member" and an Access Policy of "Load."

(credit to [Bob's Guides](http://bobsguides.com/revolution-permissions.html))

### FURL Suffixes and Prefixes -> Content Types

The `friendly_url_prefix` and `friendly_url_suffix` settings no longer apply; Revolution handles this with [Content Types](building-sites/resources/content-types "Content Types").
