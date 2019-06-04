---
title: "spam"
_old_id: "862"
_old_uri: "revo/formit/formit.hooks/formit.hooks.spam"
---

## The spam hook

The spam hook will check all the fields specified in the property _spamEmailFields_ against a spam filter via [StopForumSpam](http://www.stopforumspam.com/). If the user is flagged as a spammer, it will show an error message for that field checked.

The spam hook requires either cURL or Sockets support in your PHP installation (The same requirements for [Package Management](developing-in-modx/advanced-development/package-management "Package Management")).

## Available Properties

| name            | description                                                                     |
| --------------- | ------------------------------------------------------------------------------- |
| spamEmailFields | Optional. A comma-delimited list of email fields to check. Defaults to 'email'. |
| spamCheckIp     | If true, will also check the IP of the submitter. Defaults to false.            |

## Usage

Simply specify the "spam" hook in your FormIt call. FormIt will handle the rest.

``` php
[[!FormIt? &hooks=`spam`]]
```

### Checking the IP For Spam

Although it is **strongly recommended not** to use the IP for spam checking (since spammers can easily change IP addresses, and checking IPs often gives false positives), FormIt provides you the option. Just set the &spamCheckIp value to 1 on your FormIt call.

## See Also

1. [FormIt.Hooks.email](extras/formit/formit.hooks/email)
2. [FormIt.Hooks.FormItAutoResponder](extras/formit/formit.hooks/formitautoresponder)
3. [FormIt.Hooks.FormItSaveForm](extras/formit/formit.hooks/formitsaveform)
4. [FormIt.Hooks.math](extras/formit/formit.hooks/math)
5. [FormIt.Hooks.recaptcha](extras/formit/formit.hooks/recaptcha)
6. [FormIt.Hooks.redirect](extras/formit/formit.hooks/redirect)
7. [FormIt.Hooks.spam](extras/formit/formit.hooks/spam)
8. [FormIt.PreHooks.FormItLoadSavedForm](extras/formit/formit.hooks/prehooks.formitloadsavedform)
