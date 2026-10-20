---
title: mailtrap.io
description: "Use the Mailtrap email sandbox to capture test mail from a MODX development site."
---

[Mailtrap](https://mailtrap.io) is a service (free plan available) that captures email in a sandbox instead of sending it to the real recipient. On a development site this keeps test messages from reaching real customers. You read the captured messages in Mailtrap's interface.

After creating an account, open the sandbox's SMTP settings and copy the username and password.

In MODX, set these in System > System Settings:

- `mail_use_smtp`: Yes
- `mail_smtp_auth`: Yes
- `mail_smtp_hosts`: `sandbox.smtp.mailtrap.io`
- `mail_smtp_port`: `587` (Mailtrap also recommends `2525`)
- `mail_smtp_user` and `mail_smtp_pass`: the sandbox credentials
- `mail_smtp_secure`: `tls`

Port `465` also works with `mail_smtp_secure` set to `ssl`. The sandbox is for development; Mailtrap provides a separate live SMTP host for production mail.

[See the generic SMTP instructions for enabling and testing email](building-sites/sending-mail)
