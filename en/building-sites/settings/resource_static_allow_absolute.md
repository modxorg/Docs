---
title: "resource_static_allow_absolute"
description: "Allow absolute file paths as the content of static resources."
---

**Name**: Allow absolute static resource path
**Type**: Yes/No
**Default**: No

When enabled, the content of a static resource may be a fully qualified absolute path to any readable file on the server. When disabled, the path is always resolved relative to [`resource_static_path`](building-sites/settings/resource_static_path).

**Security warning:** enabling this lets any manager user who can edit static resources read arbitrary files that the PHP process can read. Keep it disabled unless you trust every manager user.

The value is read in `core/src/Revolution/modStaticResource.php`.
