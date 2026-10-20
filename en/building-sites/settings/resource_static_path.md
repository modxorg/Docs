---
title: "resource_static_path"
description: "Base path used to resolve relative static resource files."
---

**Name**: Static resource base path
**Type**: String
**Default**: `{assets_path}`

The base path that is prepended to the file name stored in a static resource when [`resource_static_allow_absolute`](building-sites/settings/resource_static_allow_absolute) is disabled (the default).

When that setting is disabled, files are restricted to this directory. Setting the path too wide can let manager users read files they should not see, so keep it narrow — for example `{assets_path}static/`.

The manager expands `{assets_path}`, `{core_path}` and `{base_path}` in system setting values when it builds the cached configuration (`modCacheManager::generateConfig()`). The default therefore resolves to the assets directory of the installation. Element tags such as `[[++assets_path]]` are parsed as well. Files picked through the media browser are resolved against this path.

See also: [`resource_static_allow_absolute`](building-sites/settings/resource_static_allow_absolute).
