---
title: Sending mail
description: "Configure outgoing email in MODX: SMTP, DKIM, provider settings, and testing."
---

MODX has a built-in [email service](extending-modx/services/modmail). It sends mail through PHP's `mail()` function or an SMTP server.

Mail is sent in several situations:

- Password reset and passwordless login.
- Front-end forms, usually through [FormIt](extras/formit).
- Custom code that uses the mail service.

All of these use the core mail settings. Find them in System (cog icon) > System Settings. Search for `mail_`, or filter the **Mail** area. Two related settings sit elsewhere: `emailsender` in **Authentication and Security**, and `site_name` in **Site**.

By default, MODX sends mail with PHP's `mail()`. It relies on server-level settings and often has poor deliverability. Configure SMTP instead.

## Sending via SMTP

1. Enable `mail_use_smtp`.
2. Enable `mail_smtp_auth` if the server requires a login.
3. Set `mail_smtp_hosts` to the SMTP server. Separate several hosts with `;` to try them in order; each host can include a port (`smtp1.example.com:587;smtp2.example.com`). A host may also start with `ssl://` or `tls://`.
4. Set `mail_smtp_port`. The installer default is `587`; `465` is also common. Many providers block outbound port `25`.
5. Enter the login in `mail_smtp_user` and `mail_smtp_pass`.
6. If the server needs explicit encryption, set `mail_smtp_secure` to `tls` or `ssl`. Use `tls` with port 587 or 2525, and `ssl` with port 465. MODX 3 calls this setting `mail_smtp_secure`; older versions used `mail_smtp_prefix`.

Steps 3–6 depend on the mail server or service. Consult its documentation for exact values.

More specific instructions:

- [Amazon SES](building-sites/sending-mail/amazon-ses)
- [Mailtrap.io](building-sites/sending-mail/mailtrap)

### Common SMTP providers

The values below are starting points; confirm them with the provider. Create app passwords or SMTP credentials in the provider's dashboard when prompted.

| Provider | Host | Port | `mail_smtp_secure` | Auth notes |
| --- | --- | --- | --- | --- |
| Gmail / Google Workspace | `smtp.gmail.com` | `587` / `465` | `tls` / `ssl` | App password or OAuth; a plain account password is usually rejected |
| Yandex Mail | `smtp.yandex.com` or `smtp.yandex.ru` | `465` / `587` | `ssl` on 465, `tls` on 587 | App password from Yandex Mail settings |
| Mail.ru | `smtp.mail.ru` | `465` / `587` | `ssl` / `tls` | App password from Mail.ru security settings |
| Rambler | `smtp.rambler.ru` | `465` | `ssl` | Check the current requirements in Rambler help |
| Mailgun | `smtp.mailgun.org` or `smtp.eu.mailgun.org` | `587` / `465` / `2525` | `tls` on 587 and 2525, `ssl` on 465 | Per-domain SMTP credentials in Mailgun |
| Custom VPS / shared hosting | Host-provided hostname | Often `587` or `465` | Per host | Outbound `25` is often blocked by the provider |

Set [`emailsender`](building-sites/settings/emailsender) to an address the provider allows: the same mailbox, or an address on a verified sending domain.

If FormIt reports success but no message arrives, install [QuickEmail](extras/quickemail) and test SMTP without FormIt hooks. See also the troubleshooting section on the [simple contact page](extras/formit/formit.tutorials-and-examples/examples.simple-contact-page).

## Testing email sending

Install the [QuickEmail extra](extras/quickemail) through the [package manager](building-sites/extras).

Add this snippet call to a resource:

```
[[!QuickEmail? &debug=`1`]]
```

Open the resource in a browser where you are signed in to the manager. QuickEmail returns `Unauthorized` without a manager session (`mgr` context). With `debug`, it sends a test message and renders the SMTP log.

If sending fails, check the port, `mail_smtp_secure`, and the credentials. PHPMailer hides the username and password at this debug level, but the server response is still shown.

**Remove the snippet call after testing.** While it is published, anyone with a manager session can send test email from that page.

## DKIM signing

DKIM lets the recipient verify that your domain sent the message and that it was not modified in transit. MODX signs outgoing mail through PHPMailer. SPF and DMARC are still configured in DNS and at the mail provider.

Set these in System Settings:

- [`mail_dkim_selector`](building-sites/settings/mail_dkim_selector) — the selector published in DNS as `<selector>._domainkey.<domain>`.
- [`mail_dkim_domain`](building-sites/settings/mail_dkim_domain) — the signing domain.
- [`mail_dkim_privatekeyfile`](building-sites/settings/mail_dkim_privatekeyfile) — path to the private key file, readable by PHP; or
- [`mail_dkim_privatekeystring`](building-sites/settings/mail_dkim_privatekeystring) — the key itself. It takes precedence over the file.
- [`mail_dkim_identity`](building-sites/settings/mail_dkim_identity) — optional identity (`i=`) for the signature.
- [`mail_dkim_passphrase`](building-sites/settings/mail_dkim_passphrase) — passphrase for an encrypted key.

Signing starts only when the domain, selector, and a key are set. Publish the matching public key in DNS at `<selector>._domainkey.<domain>`.

## Deliverability

Delivery depends on more than MODX: content that looks like spam, a new IP address, and missing DNS records all reduce the chance a message reaches the inbox.

- SPF and DMARC are configured in DNS and at the mail provider. DKIM is signed by MODX with a key published in DNS.
- A server IP can be blacklisted when it sends too much spam.
- [mail-tester.com](https://www.mail-tester.com/) gives you a one-time address and checks most of these factors. Send to it with QuickEmail and the `&to` property.

## Other mail settings

| Setting | Default | Effect |
| --- | --- | --- |
| [`mail_smtp_autotls`](building-sites/settings/mail_smtp_autotls) | Yes | PHPMailer starts STARTTLS when the server offers it, even with an empty `mail_smtp_secure`. This is why port 587 often works without setting `tls`. |
| [`mail_smtp_helo`](building-sites/settings/mail_smtp_helo) | empty | HELO/EHLO hostname; empty uses the server hostname. |
| [`mail_smtp_timeout`](building-sites/settings/mail_smtp_timeout) | 10 | SMTP timeout in seconds. |
| [`mail_smtp_single_to`](building-sites/settings/mail_smtp_single_to) | No | Send one message per recipient instead of one message with several `To` addresses. |
| [`mail_smtp_keepalive`](building-sites/settings/mail_smtp_keepalive) | No | Keep the SMTP connection open between messages. Not recommended for normal use. |
| [`mail_charset`](building-sites/settings/mail_charset) | UTF-8 | Message charset. |
| [`mail_encoding`](building-sites/settings/mail_encoding) | 8bit | Transfer encoding. |
| `mail_inlinestyle_inline` | Yes | Move CSS from `<style>` blocks into inline `style` attributes in HTML mail. |
| `mail_inlinestyle_remove_style_tags` | No | Remove `<style>` tags after inlining. Can break responsive layouts. |

## From address

`modMail` does not set a default `From` header. Core flows do: password reset, passwordless login, and user create/update use [`emailsender`](building-sites/settings/emailsender) as the address and [`site_name`](building-sites/settings/site_name) as the name.

In custom code, set both explicitly:

```php
use MODX\Revolution\Mail\modMail;

$mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
$mail->set(modMail::MAIL_FROM_NAME, $modx->getOption('site_name'));
```

Without a valid `From` header, receiving servers may reject the message.
