---
title: "phpthumb_document_root"
_old_id: "225"
_old_uri: "2.x/administering-your-site/settings/system-settings/phpthumb_document_root"
---

## phpthumb\_document\_root

**Name**: PHPThumb Document Root
**Type**: textfield
**Default**:
**Available In:** 2.1+

Set this if you are experiencing issues with the server variable DOCUMENT\_ROOT, or getting errors with OutputThumbnail or !is\_resource. Set it to the absolute document root path you would like to use. If this is empty, MODX uses the `base_path` option (the root of the MODX installation), not the `DOCUMENT_ROOT` server variable.
