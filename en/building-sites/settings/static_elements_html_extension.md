---
title: "static_elements_html_extension"
description: "File extension used for static templates, chunks and TVs."
---

**Name**: Static elements html extension
**Type**: String
**Default**: `.tpl`

The extension appended to the file name of static elements with HTML content. The manager builds file names as `<name>.template<extension>`, `<name>.chunk<extension>` and `<name>.tv<extension>`. With the default, a chunk is stored as `my-chunk.chunk.tpl`.

Snippets and plugins use `.php` regardless of this setting. The value is read in `manager/assets/modext/core/modx.js`.

See also: [`static_elements_basepath`](building-sites/settings/static_elements_basepath).
