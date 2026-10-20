---
title: "quick_search_result_max"
description: "Maximum number of quick search results per element type."
---

**Name**: Number of items in search result
**Type**: Number
**Default**: 10

The maximum number of results returned for each type (resources, templates, chunks, snippets, and so on) in the manager quick search.

The value is read by `Processors/Search/Search.php` and does not limit the total across all types.

See also: [`quick_search_in_content`](building-sites/settings/quick_search_in_content).
