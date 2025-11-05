---
title: Mailtrap
---

[Mailtrap](https://mailtrap.io) is an email delivery platform for developer and product teams. It provides SMTP service (free plan available) that you can use to send transactional and bulk emails. 

After creating a Mailtrap account and verifying your sending domain, you can find your SMTP credentials in the Sending Domains section, under Integrations.

In MODX, configure the following via System > System Settings:

- `mail_smtp_hosts`: live.smtp.mailtrap.io
- `mail_smtp_port`: 587
- `mail_smtp_user` and `mail_smtp_pass` are provided in the inbox settings in Mailtrap. 
- `mail_smtp_prefix`: tls

[Also see the generic instructions for sending email with SMTP for further activation and testing instructions](building-sites/sending-mail)
