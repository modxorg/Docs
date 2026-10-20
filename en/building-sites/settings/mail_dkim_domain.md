---
title: "mail_dkim_domain"
description: "Domain used for DKIM signing."
---

**Name**: DKIM Domain
**Type**: String
**Default**: (empty)

The domain that DKIM signs as (`d=` tag). It must match the domain of the From address and the domain where the public key is published in DNS.

`mail_dkim_domain` is required for DKIM signing. It is passed to PHPMailer by `core/src/Revolution/Mail/modMail.php`.

See also: [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector), [`mail_dkim_identity`](building-sites/settings/mail_dkim_identity).
