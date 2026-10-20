---
title: "filemanager_url"
description: "Removed in MODX 3.0. Use Media Sources instead."
_old_id: "128"
_old_uri: "2.x/administering-your-site/settings/system-settings/filemanager_url"
---

**Removed in MODX 3.0.** The file manager is configured through [Media Sources](building-sites/media-sources) instead.

---

**Name**: File Manager URL
**Type**: String
**Default**:
**Available In**: Revolution 2.0.6–2.x only

On 2.x this was used together with [filemanager_path](building-sites/settings/filemanager_path). It set the URL where the file manager directory was accessible. That helped when the directory was outside the MODX web root or mapped to a different URL. Setting an absolute URL required [filemanager_url_relative](building-sites/settings/filemanager_url_relative) to be set to No.
