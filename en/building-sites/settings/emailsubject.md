---
title: "emailsubject"
description: "Removed in MODX 3.0. The subject now comes from the login_email_subject lexicon entry."
_old_id: "104"
_old_uri: "2.x/administering-your-site/settings/system-settings/emailsubject"
---

**Removed in MODX 3.0.** Email subjects are no longer system settings. The subject for signup and password-reset emails is taken from the `login_email_subject` lexicon entry (`core/lexicon/en/login.inc.php`); the message body for a new user comes from `login_signup_email`.

To change the wording, override those lexicon entries with a [lexicon override](extending-modx/internationalization) or a custom lexicon topic.

---

**Name**: Email Subject
**Type**: String
**Default**: Your login details
**Available In**: Revolution 2.x only

On 2.x this was the subject line of the default signup email.
