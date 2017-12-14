---
title: "emailsender"
_old_id: "103"
_old_uri: "2.x/administering-your-site/settings/system-settings/emailsender"
---

 emailsender 
-------------

 **Name**: Site Admin Email Address   
**Type**: String   
**Default**: Set at Install (see notes below)

 The e-mail address used when sending users their usernames and passwords.

<div class="note"> Some hosts may not allow MODX to send email if the default email is not a valid email address for the hosted domain. Since emailsender is set upon install to the email address entered for the admin user during setup (which may or may not be a valid email address for the domain), if MODX is failing to send emails check this setting and make sure to set it to a valid email address for the domain. </div>###  See Also 

 [modMail](/revolution/2.x/developing-in-modx/advanced-development/modx-services/modmail) for sending emails.