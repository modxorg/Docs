---
title: "mail_dkim_identity"
description: "DKIM identity, usually the From address."
---

**Name**: DKIM Identity
**Type**: String
**Default**: (empty)

The DKIM identity (`i=` tag) that identifies the agent responsible for the message. It is usually the From address or the domain that sends the mail.

The value is optional; when empty, PHPMailer leaves the identity out of the signature. It is passed by `core/src/Revolution/Mail/modMail.php`.

See also: [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain), [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector).
