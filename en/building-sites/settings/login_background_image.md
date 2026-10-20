---
title: "login_background_image"
description: "Background image for the manager login screen."
---

**Name**: Login Background Image
**Type**: String
**Default**: (empty — the theme's default background)

URL or path to the background image used on the manager login screen. The image is stretched to fill the screen.

When the setting is empty, MODX uses `manager/templates/<theme>/images/login/default-background.jpg`. The value is read in `manager/controllers/default/security/login.class.php`.

See also: [`login_logo`](building-sites/settings/login_logo), [`manager_theme`](building-sites/settings/manager_theme).
