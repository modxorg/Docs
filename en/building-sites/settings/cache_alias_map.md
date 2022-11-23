---
title: "cache_alias_map"
description: "When enabled, all Resource URIs are cached into the Context. Enable on smaller sites and disable on larger sites for better performance."
---

 **Name**: Enable Context Alias Map Cache  
**Type**: Yes/No  
**Default**: Yes  
**Available In**: Revolution 2.2.7+

When enabled, all Resource URIs are cached into the Context. It is enabled by default, which is appropriate for the vast majority of MODX websites.

For contexts with a large number of resources (say 50,000 or more), disabling the alias map caching can lower memory consumption. Generating links and looking up URIs will then go directly to the database, however that becomes relatively quicker compared to an in-memory lookup in a very large array. 
