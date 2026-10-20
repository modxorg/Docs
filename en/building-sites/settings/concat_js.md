---
title: "concat_js"
description: "Removed in MODX 2.2.0. The manager no longer concatenates core JavaScript libraries."
_old_id: "63"
_old_uri: "2.x/administering-your-site/settings/system-settings/concat_js"
---

**Removed in MODX 2.2.0.** Core JavaScript libraries are loaded from the bundled files in `manager/assets/modext/`; the setting is no longer installed and has no effect.

---

**Name**: Use Concatenated Javascript Libraries
**Type**: Yes/No
**Default**: Yes
**Available In**: Revolution 2.0.x–2.1.x only

On 2.0.x and 2.1.x, enabling this loaded a concatenated build of the core JavaScript libraries, reducing the number of requests.
