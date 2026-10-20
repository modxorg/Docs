---
title: "passwordless_activated"
description: "Enable passwordless login with one-time email links."
---

**Name**: Activate passwordless login
**Type**: Yes/No
**Default**: No

When enabled, users can enter their email on the manager login screen. They receive a one-time login link instead of entering a username and password. The link is valid for the period set in [`passwordless_expiration`](building-sites/settings/passwordless_expiration).

This requires working mail delivery. Passwordless login is handled in `manager/controllers/default/security/login.class.php`.

**Security note:** anyone who can read the user's mailbox can log in, so enable it only when email accounts are appropriately protected.
