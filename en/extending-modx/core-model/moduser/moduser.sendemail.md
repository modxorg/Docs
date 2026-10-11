---
title: "modUser.sendEmail"
description: "Send a mail to the email address in the User profile"
---

## modUser::sendEmail

Sends a mail to the `email` of the related profile, with `fullname` as display name. `$message` is the body only; `reply-to` follows the sender.

The method returns `false` without a modX instance, without a profile, or when the mail service will not load. Otherwise it returns the result of the send; failures go to the error log and the mail object is reset.

## Syntax

``` php
boolean sendEmail (string $message [, array $options = array()])
```

- `$message` _(string)_ Body of the mail.
- `$options` _(array)_ Overrides for `from`, `fromName`, `sender`, `subject` and `html`; `from` and `sender` fall back to `emailsender`, `fromName` to `site_name`, `subject` to the `emailsubject` lexicon entry and `html` to `true`, by default `array()`.

## Example

``` php
$user->sendEmail('Hello staff', array(
    'subject' => 'Welcome',
    'html' => false,
));
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [emailsender](building-sites/settings/emailsender)
- [site_name](building-sites/settings/site_name)
