---
title: "mail_dkim_passphrase"
description: "Passphrase for an encrypted DKIM private key."
---

**Name**: DKIM Passphrase
**Type**: String
**Default**: (empty)

The passphrase used to decrypt the DKIM private key. Set it only when the key file or key string is encrypted.

The field is rendered as a password input in System Settings. The value is passed to PHPMailer by `core/src/Revolution/Mail/modMail.php`.
