---
title: "forgot_login_email"
_old_id: "130"
_old_uri: "2.x/administering-your-site/settings/system-settings/forgot_login_email"
---

## forgot\_login\_email

**Name**: Forgot Login Email 
**Type**: textarea 
**Default**: (see below) 
**Available In**: Revolution 2.0.0+

The template for the email that is sent when a user has forgotten their MODX username and/or password.

The default is:

``` html 
<p>Hello [[+username]],</p>
<p>A request for a password reset has been issued for your MODX user. If you sent this, you may follow this link and use this password to login. If you did not send this request, please ignore this email.</p>

<p>
    <strong>Activation Link:</strong> [[+url_scheme]][[+http_host]][[+manager_url]]?modahsh=[[+hash]]<br />
    <strong>Username:</strong> [[+username]]<br />
    <strong>Password:</strong> [[+password]]<br />
</p>

<p>After you log into the MODX Manager, you can change your password again, if you wish.</p>

<p>Regards,<br />Site Administrator</p>
```