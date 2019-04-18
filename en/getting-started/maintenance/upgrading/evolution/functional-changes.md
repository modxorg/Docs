---
title: "Functional Changes from Evolution"
_old_id: "151"
_old_uri: "2.x/administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution"
---

## Changes from MODx Evolution to MODX Revolution

Much has changed from MODx Evolution in the new Revolution release. This document will attempt to address some of the major ones.

### Tag Syntax

Tags have changed their basic syntax. You can view the [Tag Syntax changes here](building-sites/tag-syntax "Tag Syntax").

### Parsing Order

In Evolution, pages were parsed via eval and done as a whole - in Revolution, we implemented "Source Order" parsing. This means tags are parsed in the order that they occur.

So what does that mean? Well, a few things:

- _Don't put Snippet calls that assign placeholders at the end of a Resource, or after the Resource._ The placeholders will simply be blank, since the [Snippet](extending-modx/snippets "Snippets") haven't executed yet.
- _Tags can now have tags within their properties._ \[\[mySnippet? &tag=`test\[\[call\]\]`\]\] is now 100% a-okay.
- \_Using =,?,!,\* is now OK in a Snippet property.

### No More 5000-Document limit

Although this has been mostly remedied in later versions of Evolution, there is still a performance hit in those versions. This, caching-wise, has been fixed in Revolution.

That said, if you're creating a site that has over 10,000 Resources, chances are you're not designing it right. Consider writing custom [Snippets](extending-modx/snippets "Snippets") that pull from custom database tables instead for similar pages (such as inventories or e-commerce).

### Security

The access permissions system has been completely rewritten into a new ABAC-based system. You can read more about it [here](building-sites/client-proofing/security "Security").

### Error Page vs Unauthorized Page

This is a change from MODx Evolution. In Revolution, if a web page is protected in the front end so that only logged-in users can see it, the default behavior is for anonymous users to be redirected to the Error (page not found) page rather than the Unauthorized page when they try to access the resource. In Revolution, if Users don't have the "load" permission for a resource, it's as if it doesn't exist — thus the "page not found" response. If you would like them to be sent to the Unauthorized page instead, you can do the following:

- Create a new Access Policy called "Load" and add a single Permission: Load.
- Create a new Context Access ACL entry for the anonymous User Group with a Context of "web," a Role of "member" and an Access Policy of "Load."

(credit to [Bob's Guides](http://bobsguides.com/revolution-permissions.html))

### FURL Suffixes and Prefixes -> Content Types

The settings friendly\_url\_prefix and friendly\_url\_suffix are no longer applicable, as Revolution handles those now through [Content Types](building-sites/resources/content-types "Content Types").