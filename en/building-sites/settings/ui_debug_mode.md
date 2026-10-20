---
title: "ui_debug_mode"
description: "Not installed by default. Controls whether MODx.debug() writes to the browser console."
_old_id: "318"
_old_uri: "2.x/administering-your-site/settings/system-settings/ui_debug_mode"
---

## ui\_debug\_mode

**Name**: UI Debug Mode
**Type**: Yes/No
**Default**: No
**Available In**: Revolution 2.1+

**Not installed by default.** MODX does not ship a `ui_debug_mode` system setting: the key is absent from the install transport in both 2.x and 3.x, although the lexicon entry and the client-side check still exist. `MODx.debug(msg)` in `manager/assets/modext/core/modx.js` only writes to `console.log()` when `MODx.config.ui_debug_mode == 1`. The switch stays off unless you create the setting yourself: System → System Settings → Create new setting, key `ui_debug_mode`, type Yes/No.

When enabled, all calls to `MODx.debug(msg)` are written to the browser console. This is useful for debugging [Custom Manager Pages](extending-modx/custom-manager-pages) and other custom code without breaking a production site.
