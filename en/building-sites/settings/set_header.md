---
title: "set_header"
description: "Send HTTP headers for resources."
---

**Name**: Set HTTP Headers
**Type**: Yes/No
**Default**: Yes

When enabled, MODX sends the HTTP headers for a resource. These include the `Content-Type` from its content type, `Content-Disposition`, and any custom headers configured on the content type. For non-binary types the `modx_charset` charset is appended to `Content-Type`.

The check is performed in `core/src/Revolution/modResponse.php`. Disable it only if your web server or a proxy is responsible for these headers.

See also: [`default_content_type`](building-sites/settings/default_content_type), [`modx_charset`](building-sites/settings/modx_charset).
