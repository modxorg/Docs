---
title: mailtrap.io
---

[Mailtrap](https://mailtrap.io) is a service (free plan available) that you can use to "trap" emails, without actually sending them to their intended recipient. Instead they're shown to you in a user interface.

When working on a development site, it's useful to configure emails to use such a service to prevent accidentally sending test emails to actual customers. 

After creating an account, you can find the credentials in the inbox settings. 

In MODX, configure the following via System > System Settings:

- `mail_smtp_hosts`: smtp.mailtrap.io
- `mail_smtp_port`: 587
- `mail_smtp_user` and `mail_smtp_pass` are provided in the inbox settings in mailtrap. 
- `mail_smtp_prefix`: tls

[Also see the generic instructions for sending email with SMTP for further activation and testing instructions](building-sites/sending-mail)
