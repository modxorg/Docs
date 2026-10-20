---
title: "mail_dkim_selector"
description: "DKIM selector used in the DNS record name."
---

**Name**: DKIM Selector
**Type**: String
**Default**: (empty)

The DKIM selector: the label that identifies which public key is used, published in DNS as `<selector>._domainkey.<domain>`.

`mail_dkim_selector` is required for DKIM signing. It is passed to PHPMailer by `core/src/Revolution/Mail/modMail.php`.

DKIM (DomainKeys Identified Mail) lets the receiving mail server verify that a message was sent by your domain and was not modified in transit. MODX passes these values to PHPMailer, which signs outgoing mail; you also need a matching public key in DNS at `<selector>._domainkey.<domain>`.

See also: [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain), [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile), [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring).
