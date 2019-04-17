---
title: "filemanager_path"
_old_id: "126"
_old_uri: "2.x/administering-your-site/settings/system-settings/filemanager_path"
---

## filemanager\_path

This setting was deprecated in MODX Revolution 2.2. It has been replaced with [Media Sources](building-sites/media-sources).

**Name**: File Manager Path
**Type**: string
**Default**:
**Available In**: Revolution 2.0.0 - 2.2.x

Determines the root of the file browser for the currently-logged in user in the manager backend.

## Usage

Specify either a relative path from the MODx root directory, or an absolute path. It can be outside of the webroot, but you will have to set [filemanager\_path\_relative](building-sites/settings/filemanager_path_relative "filemanager_path_relative") to false.
