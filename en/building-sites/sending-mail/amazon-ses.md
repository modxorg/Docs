---
title: Amazon SES
---

To send emails with Amazon SES (Simple Email Service) over SMTP, the [generic instructions apply](building-sites/sending-mail), but it can be a bit complex to find the appropriate details.

## Authorizing the domain and email address

Before starting, [login to the AWS Console](https://console.aws.amazon.com) and navigate to the SES (Simple Email Service) service.

Under Identity Management > Domains, click the button to Verify a New Domain. Enter the domain name, tick the box to generate DKIM Settings, and follow the presented instructions to add the appropriate DNS records to your site. 

Once that's done, go to Identify Management > Email Addresses and click the button to Verify a New Email Address. Enter the email address, and follow the instructions in the email you will receive to verify the email address. **This is necessary for every email address you wish to send from.**

## Creating IAM SMTP credentials

Still in the Amazon SES dashboard, go to Email Sending > SMTP Settings.

- You'll see the server name listed; add that to the `mail_smtp_hosts` system setting.
- Use one of the provided ports for the `mail_smtp_port` system setting. Any of them should work, 465 definitely does.
- As it indicates TLS is enabled, set `mail_smtp_prefix` to `tls` (or `ssl`). 

Next, click the "Create My SMTP Credentials" button. That's a convenient shortcut to adding an IAM user, which otherwise is a fairly complex process.

(Important to note: the generated IAM user **only** has access to send emails via SMTP. To send emails via API, or to use other Amazon services, you'll need to either add an extra user or a custom access policy. [Read more about creating IAM users for sending email here](https://docs.aws.amazon.com/ses/latest/DeveloperGuide/control-user-access.html))

Enter a user name - make it descriptive of the site it will be used for.

Click the Create button in the bottom right. 

The user is now created. You can download the credentials via the button in the bottom right, or expand the "Show User SMTP Security Credentials" section and copy the provided SMTP Username (add to the `mail_smtp_user` system setting) and SMTP Password (add to the `mail_smtp_pass` system setting). 

Unless you downloaded the credentials, **this is the only time you'll be able of seeing the credentials**, so make sure email sending works before closing the window. 

## Testing & next steps

Use QuickEmail [as described in the mail documentation](building-sites/sending-mail) to test the integration.

Important: email sending might not work until your domain and email verification completed. Amazon also enforces limits on email sending by new users. 

In the SES service dashboard, under Domains and by clicking on your domain, you can find more information about authenticating your sending. 

- In the Verification section you'll find the TXT record for verification. This needs to stay on the domain for as long as you use Amazon SES.
- In the DKIM section, you'll find a list of DNS records that will [enable DKIM](https://en.wikipedia.org/wiki/DomainKeys_Identified_Mail). 
- In the MAIL FROM Domain section, you can set up a dedicated FROM domain. When configured, this will show your own domain (rather than amazonses.com) as the sender. 

In the Email ADdresses



