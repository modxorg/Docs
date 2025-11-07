---
title: Mailtrap
---

When working on your MODX site, it's useful to have a single platform to both test emails in development and send them reliably in production. We suggest using Mailtrap for this.

[Mailtrap](https://mailtrap.io) is an email platform for developer and product teams. It provides both an SMTP Service for sending transactional and bulk emails and an Email Sandbox for testing emails (free plan available for both).

## Email Sandbox

[Email Sandbox](https://mailtrap.io/email-sandbox/) is a service that you can use to "trap" emails, without actually sending them to their intended recipient. Instead, they're shown to you in a user interface.

After creating an account, you can find the credentials in the Email Sandbox > Sandboxes > your sandbox.

In MODX, configure the following via System > System Settings:

- `mail_smtp_hosts`: sandbox.smtp.mailtrap.io
- `mail_smtp_port`: 587
- `mail_smtp_user` and `mail_smtp_pass` are provided in the sandbox settings in Mailtrap. 
- `mail_smtp_prefix`: tls

## SMTP service

To send emails with [Mailtrap's SMTP](https://mailtrap.io/email-sending/), the [generic instructions apply](building-sites/sending-mail), but here's how to configure Mailtrap specifically. 

### Setup and verify your sending domain

1. In your Mailtrap account, navigate to Sending Domains and click Add Domain
2. Enter the domain name you want to send from (you must have access to its DNS records)
3. Add the provided DNS records to your domain provider
4. Click Verify DNS Records once all records are added
5. Wait for the automatic domain review to complete (usually takes a few minutes)
6. Once verified, you'll see a Verified badge next to your domain

_Important note: Some domains may require additional compliance checks. If selected, you'll be asked to fill out a simple compliance form._

### Get your SMTP credentials

Once your domain is verified, navigate to Sending Domains, select your domain, and open the Integrations tab.

Click Integrate under Transactional Stream (for automated emails) or Bulk Stream (for marketing campaigns).

Toggle to SMTP to reveal your credentials.

In MODX, configure the following via System > System Settings:

- `mail_smtp_hosts`: live.smtp.mailtrap.io
- `mail_smtp_port`: 587
- `mail_smtp_user` and `mail_smtp_pass` are provided in Mailtrap's Integration settings. 
- `mail_smtp_prefix`: tls

[Also see the generic instructions for sending email with SMTP for further activation and testing instructions](building-sites/sending-mail)
