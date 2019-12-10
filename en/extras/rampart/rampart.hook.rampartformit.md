---
title: "Rampart.hook.RampartFormIt"
_old_id: "972"
_old_uri: "revo/rampart/rampart.hook.rampartformit"
---

## hook.RampartFormIt

To enable Rampart spam prevention on your FormIt forms, simply add hook.RampartFormIt as a hook in your FormIt call:

``` php
[[!FormIt?
    &hook=`hook.RampartFormIt`
    &rptErrorField=`rampart`
    &submitVar=`contact_me`
]]

/* somewhere in my form */
[[!+fi.error.rampart]]
```

## Available Properties

It has the following properties to be passed into the FormIt snippet call:

| name                   | description                                                                                                                                                                        | default                                           |
| ---------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------- |
| rptErrorField          | The name of the field that Rampart should set an error message for should it flag a spam attempt.                                                                                  | email                                             |
| rptUsernameField       | If you have a field not named "username", but want to use it to spam-check as a username on, set the name of the field here. If Rampart doesn't find the field, it will ignore it. | username                                          |
| rptEmailField          | If you have a field not named "email", but want to use it to spam-check as an email on, set the name of the field here. If Rampart doesn't find the field, it will ignore it.      | email                                             |
| rptSpammerErrorMessage | The field-specific message that will show when a spammer tries to submit the form.                                                                                                 | Your account has been banned as a spammer. Sorry. |

## See Also

1. [Rampart.hook.RampartFormIt](extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](extras/rampart/rampart.prehook.rampartregister)
