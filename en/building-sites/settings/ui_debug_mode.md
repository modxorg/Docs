---
title: "ui_debug_mode"
_old_id: "318"
_old_uri: "2.x/administering-your-site/settings/system-settings/ui_debug_mode"
---

## ui\_debug\_mode

**Name**: UI Debug Mode
**Type**: Yes/No
**Default**: No

(2.1+ only)

When enabled, all calls to the JS function MODx.debug(msg) will be outputted with console.log(). This is useful for debugging [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages") and other custom code without breaking a production site, as it will suppress logging should this setting be set to No.
