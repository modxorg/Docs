---
title: "mail_smtp_secure"
description: "SMTP encryption type: empty, ssl or tls."
---

**Name**: SMTP Secure
**Type**: String
**Default**:

Sets the SMTP encryption type. Options are `""` (no encryption), `"ssl"`, or `"tls"`.

The setting was renamed from `mail_smtp_prefix` in MODX 3.0. The upgrade script copies the old value to the new key and removes the old one.

See also: [`mail_smtp_autotls`](building-sites/settings/mail_smtp_autotls), [`mail_use_smtp`](building-sites/settings/mail_use_smtp).
