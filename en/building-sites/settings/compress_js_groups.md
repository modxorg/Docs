---
title: "compress_js_groups"
description: "Removed in MODX 2.5.0. The manager no longer groups core JavaScript files via minify's groupsConfig."
---

**Removed in MODX 2.5.0.** Manager JavaScript is now shipped as pre-built grouped files; the setting is no longer installed and has no effect.

---

**Name**: Use Grouping When Compressing JavaScript
**Type**: Yes/No
**Default**: No
**Available In**: Revolution 2.2.0–2.4.x only

On 2.2–2.4, this grouped the core MODX manager JavaScript using minify's `groupsConfig`. It was meant for setups with Suhosin or other request-size limits.

## See also

-   [Suhosin](https://suhosin.org/)
-   [Minify](https://github.com/mrclay/minify)
