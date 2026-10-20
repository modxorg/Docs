---
title: Amazon SES
description: "Send MODX email through Amazon SES over SMTP: verify identities, create SMTP credentials, and test."
---

To send email with Amazon SES (Simple Email Service) over SMTP, the [generic instructions](building-sites/sending-mail) apply. This page covers the values the SES console hides.

## Verifying a domain and address

[Sign in to the AWS Console](https://console.aws.amazon.com) and open SES.

Under **Identity Management > Identities**, create a domain identity. Enter the domain, leave Easy DKIM enabled, and add the DNS records SES shows.

Then create an email address identity for every address you send from, and confirm it through the verification email.

## Creating SMTP credentials

In the SES console, open **Email sending > SMTP settings**.

- Copy the server name into the `mail_smtp_hosts` system setting.
- Use one of the listed ports in `mail_smtp_port`; `465` or `587` usually works.
- SES supports TLS. Set `mail_smtp_secure` to `ssl` for port 465 or `tls` for port 587 (MODX 3 Mail settings).

Click **Create SMTP credentials**. This creates an IAM user that can send only through SMTP. To use the SES API or other AWS services, create another user or attach a custom policy. [Read more about IAM users for SES](https://docs.aws.amazon.com/ses/latest/DeveloperGuide/control-user-access.html).

Enter a user name that identifies the site, then click **Create**.

Download the credentials, or expand **Show User SMTP Security Credentials** and copy the SMTP username into `mail_smtp_user` and the password into `mail_smtp_pass`.

**If you do not download the credentials, this is the only time you can see them.** Test sending before you close the window.

## Testing and next steps

Test with QuickEmail [as described in the mail documentation](building-sites/sending-mail).

Sending may fail until domain and address verification finish. Amazon also limits sending for new accounts.

In the SES console, open your domain identity to see its authentication details:

- **Verification** shows the TXT record. Keep it on the domain while you use SES.
- **DKIM** lists the DNS records that [enable DKIM](https://en.wikipedia.org/wiki/DomainKeys_Identified_Mail).
- **MAIL FROM domain** sets a dedicated envelope-from domain. Messages then return to your domain instead of `amazonses.com`, which helps SPF alignment. The visible `From` header still uses the address you send from.
