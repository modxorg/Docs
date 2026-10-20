---
title: "mail_dkim_privatekeyfile"
description: "Path to the DKIM private key file."
---

**Name**: DKIM Private key file
**Type**: String
**Default**: (empty)

The absolute path to the private key file used to sign outgoing mail. The file must be readable by the PHP process and must not be publicly accessible.

If both this setting and [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring) are set, the key string takes precedence.

The value is passed to PHPMailer by `core/src/Revolution/Mail/modMail.php`.
