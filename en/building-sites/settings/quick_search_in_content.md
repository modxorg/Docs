---
title: "quick_search_in_content"
description: "Include element content in manager quick search results."
---

**Name**: Allow search in content
**Type**: Yes/No
**Default**: Yes

When enabled, the manager quick search also searches inside the content of resources, templates, chunks, snippets and other elements, not just their names and descriptions.

Searching content can be slower on large sites. The value is read by `Processors/Search/Search.php`.

See also: [`quick_search_result_max`](building-sites/settings/quick_search_result_max).
