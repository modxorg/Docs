---
title: "webpwdreminder_message"
description: "Removed in MODX 3.0. Unused web-user password reminder email template"
---

The `webpwdreminder_message` setting was removed in MODX 3.0. In 2.x it stored the HTML email sent when a web user requested a password reset. The core no longer used that template.

Manager password reset uses [forgot_login_email](building-sites/settings/forgot_login_email). Front-end reset is handled by extras such as Login.
