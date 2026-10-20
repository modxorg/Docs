---
title: "mail_dkim_privatekeystring"
description: "DKIM private key supplied directly as a string."
---

**Name**: DKIM Private key string
**Type**: String
**Default**: (empty)

The private key used to sign outgoing mail, supplied as a string instead of a file path. It takes precedence over [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile).

Use this when the key cannot be stored as a file on the server. The key is stored in the database and visible in System Settings to anyone with the relevant permission. Prefer the file option on shared installations.

The value is passed to PHPMailer by `core/src/Revolution/Mail/modMail.php`.
