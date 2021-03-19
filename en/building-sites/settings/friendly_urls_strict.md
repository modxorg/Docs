---
title: "friendly_urls_strict"
description: "When friendly URLs are enabled, this option forces non-canonical requests that match a Resource to 301 redirect to the canonical URI for that Resource"
---

**Name**: Use Strict Friendly URLs  
**Type**: Yes/No  
**Default**: No  
**Available In**: Revolution 2.2.3+

When friendly URLs are enabled, this option forces non-canonical requests that match a Resource to 301 redirect to the canonical URI for that Resource. 

**WARNING:** Do not enable if you use custom rewrite rules which do not match at least the beginning of the canonical URI. For example, a canonical URI of *foo/* with custom rewrites for *foo/bar.html* would work, but attempts to rewrite *bar/foo.html* as *foo/* would force a redirect to *foo/* with this option enabled