---
title: "signupemail_message"
_old_id: "286"
_old_uri: "2.x/administering-your-site/settings/system-settings/signupemail_message"
---

## signupemail\_message

**Name**: Signup Email Message
**Type**: String
**Default**:

``` html
Hello [[+uid]]

Here are your login details for [[+sname]] Content Manager:

Username: [[+uid]]
Password: [[+pwd]]

Once you log into the Content Manager ([[+surl]]), you can change your password.

Regards,
Site Administrator
```

Here you can set the message sent to your users when you create an account for them and let MODx send them an e-mail containing their username and password.

The following placeholders are replaced by the Content Manager when the message is sent: `[[+sname]]` - Name of your web site
`[[+saddr]]` - Your web site email address
`[[+surl]]` - Your site url
`[[+uid]]` - User\\'s Login name or id
`[[+pwd]]` - User\\'s password
`[[+ufn]]` - User\\'s full name.

Leave the `[[+uid]]` and `[[+pwd]]` in the e-mail, or else the username and password won't be sent in the mail and your users won't know their username or password!
