---
title: "passwordless_expiration"
description: "Lifetime of a passwordless login link, in seconds."
---

**Name**: Passwordless login expiration
**Type**: String
**Default**: 3600

How long a one-time login link stays valid, in seconds. The default is one hour.

The value is read in `manager/controllers/default/security/login.class.php` when the magic link is generated and validated.

See also: [`passwordless_activated`](building-sites/settings/passwordless_activated).
