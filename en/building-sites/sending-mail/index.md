---
title: Sending mail
---

MODX has an [email service built-in](extending-modx/services/modmail), which can send emails through PHPs plain `mail()` function, or by using SMTP.

There are various scenarios in which emails may be sent:

- When requesting a password reset, or using passwordless login
- When a user submits a form on the front-end, typically handled by [FormIt](extras/formit)
- In custom code. For instructions about using the email service, see [modMail](extending-modx/services/modmail).

In all of these cases, the MODX core email settings are used. These are found in the manager under System (cog icon) > System Settings. Search for "mail" or select the "Mail" area filter.

By default, email is sent using PHPs `mail()` feature. This uses server-level settings, but is typically not recommended due to poor deliverability. Instead, configure sending via SMTP. 

## Enabling sending via SMTP

1. Enable the `mail_use_smtp` system setting
2. Enable the `mail_smtp_auth` system setting
3. Configure the host the SMTP server is available from in the `mail_smtp_hosts` system setting.
4. Configure the SMTP port in the `mail_smtp_port` system setting. In many cases, port 25 is blocked, so you'll need to use a different one, typically 587 or 465.
5. Enter your SMTP credentials in the `mail_smtp_user` and `mail_smtp_pass` fields.
6. If necessary, set `mail_smtp_secure` to `tls` or `ssl` (MODX 3). Older docs referred to `mail_smtp_prefix`; use the Mail area in System Settings and match what your install shows.

For steps 3-6, the exact details will depend on the mail server or mail service you're using. Consult their documentation, setup instructions, or support for the information to use.

More specific instructions are available for:

- [Amazon SES](building-sites/sending-mail/amazon-ses)
- [Mailtrap.io](building-sites/sending-mail/mailtrap)

### Common SMTP providers

Use these as starting points. Providers change auth rules; create app passwords or SMTP credentials in their dashboards when prompted.

| Provider | Host | Port | `mail_smtp_secure` | Auth notes |
| -------- | ---- | ---- | ------------------ | ---------- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` / `465` | `tls` / `ssl` | App password or OAuth; plain account password usually rejected |
| Yandex Mail | `smtp.yandex.com` or `smtp.yandex.ru` | `465` / `587` | `ssl` on 465 | App password from Yandex Mail client settings |
| Mail.ru | `smtp.mail.ru` | `465` / `587` | `ssl` / `tls` | App password from Mail.ru security settings |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Confirm current requirements in Rambler help |
| Mailgun | `smtp.mailgun.org` or `smtp.eu.mailgun.org` | `587` / `465` / `2525` | Match port | Per-domain SMTP credentials in Mailgun |
| Custom VPS / shared hosting | Host-provided SMTP hostname | Often `587` or `465` | Per host | Outbound `25` is often blocked |

Set `emailsender` to an address that provider allows (same mailbox, or a verified sending domain).

If FormIt redirects or shows success but no message arrives, install [QuickEmail](extras/quickemail) and test SMTP alone before changing FormIt hooks. See also the troubleshooting section on the [simple contact page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## Testing email sending

Once you've configured the sending, you'll want to make sure it works. The simplest way to do so is by installing the [QuickEmail extra](extras/quickemail) through the [package manager](building-sites/extras). 

Once installed, add the following snippet call to a resource. 

```
[[!QuickEmail? &debug=`1`]]
```

View the resource on the front-end. QuickEmail will try to send a test email, and will render a detailed debug log. If it fails, it usually comes down to the wrong port, prefix, or authentication. 

**When it works as expected, remove the snippet call.** If you don't, someone else may stumble across it, which may leak your email credentials. 

## Testing and improving email deliverability

Sending emails is one - but if it actually arrives in the recipients inbox is another question. 

This can be affected by anything from the email content (does it seem spammy?), but also by various mail protection systems such as SPF, DKIM, and DMARC. Mail server IPs may also get blacklisted if they send too much spam.

These systems are configured on the server level, and are out of scope for this documentation, but to make sure your emails arrive it is strongly recommended to make sure those are properly configured. 

There are various services and tutorials online to help you with that. [mail-tester.com](https://www.mail-tester.com/) is an excellent one that can be used for free. It provides you a single-use email address to send an email to (tip: use QuickEmail, adding the `&to` property), and will check a large part of what can influence your deliverability.

## Other relevant settings

Unless otherwise configured on a snippet or in code, the `From` email header will be set to the value of the `emailsender` system setting, and the name will be your `site_name` system setting. 
