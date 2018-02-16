---
title: "filemanager_url"
_old_id: "128"
_old_uri: "2.x/administering-your-site/settings/system-settings/filemanager_url"
---

filemanager\_url
----------------

**Name**: File Manager URL   
**Type**: Textfield   
**Default**:   
**Available In**: Revolution 2.0.6+

To be used with [filemanager\_path](administering-your-site/settings/system-settings/filemanager_path "filemanager_path"). Should specify the URL that the [filemanager\_path](administering-your-site/settings/system-settings/filemanager_path "filemanager_path") directory is accessible from. This is useful if your filemanager\_path setting points to a directory that is not in the MODX webroot, or if the path is mapped differently than the MODX base URL.

If you set this to an absolute URL, you will need to set [filemanager\_url\_relative](administering-your-site/settings/system-settings/filemanager_url_relative "filemanager_url_relative") to No.