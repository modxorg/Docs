---
title: "login_logo"
description: "Logo shown on the manager login screen and in manager emails."
---

**Name**: Login Logo
**Type**: String
**Default**: (empty — the MODX logo)

URL or path to the logo shown in the top left of the manager login screen. When it is empty, MODX uses `manager/templates/<theme>/images/modx-logo-color.svg`.

The same value is used in the default manager email template (`manager/templates/default/email/default.tpl`), so it should be a publicly reachable image URL.
