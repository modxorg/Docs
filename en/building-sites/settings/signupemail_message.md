---
title: "signupemail_message"
description: "Removed as a system setting in MODX 3.0. The message comes from the login_signup_email lexicon entry."
_old_id: "286"
_old_uri: "2.x/administering-your-site/settings/system-settings/signupemail_message"
---

**Removed as a system setting in MODX 3.0.** On a fresh install the message is taken from the `login_signup_email` lexicon entry (`core/lexicon/en/login.inc.php`), and the subject from `login_email_subject`. Passwords are no longer emailed; new users are told to reset their password or ask an administrator.

The processor still reads a setting with this key as an override if one exists (`Processors/Security/User/Create.php`). The key is not installed, so you have to create it manually in System Settings. The preferred way to change the text is a [lexicon override](extending-modx/internationalization).

---

**Name**: Signup Email Message
**Type**: String
**Default**: `login_signup_email` lexicon entry
**Available In**: Revolution 2.x

On 2.x this was the message sent when an account was created for a user. The available placeholders in MODX 3 are `[[+uid]]`, `[[+ufn]]`, `[[+sname]]` and `[[+surl]]`; `[[+pwd]]` and `[[+saddr]]` are **not** set.
