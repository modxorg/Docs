---
title: "emailsender"
_old_id: "103"
_old_uri: "2.x/administering-your-site/settings/system-settings/emailsender"
---

## emailsender

 **Name**: Registration Email From Address
**Type**: String
**Default**: Set at Install (see notes below)

The email address used as the From address for mail sent by MODX, including account notifications.

Some hosts do not allow MODX to send email if the From address is not valid for the hosted domain. `emailsender` is set at install to the email address entered for the admin user during setup, which may not be valid for the domain. If MODX fails to send email, set this to a valid address for the domain.

### See Also

[modMail](extending-modx/services/modmail) for sending emails.
