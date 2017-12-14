---
title: "Rampart.hook.RampartFormIt"
_old_id: "972"
_old_uri: "revo/rampart/rampart.hook.rampartformit"
---

hook.RampartFormIt
------------------

To enable Rampart spam prevention on your FormIt forms, simply add hook.RampartFormIt as a hook in your FormIt call:

```
<pre class="brush: php">
[[!FormIt?
  &hook=`hook.RampartFormIt`
  &rptErrorField=`rampart`
  &submitVar=`contact_me`
]]

/* somewhere in my form */
[[!+fi.error.rampart]]

```Available Properties
--------------------

It has the following properties to be passed into the FormIt snippet call:

<table><tbody><tr><th>name</th><th>description</th><th>default</th></tr><tr><td>rptErrorField</td><td>The name of the field that Rampart should set an error message for should it flag a spam attempt.</td><td>email</td></tr><tr><td>rptUsernameField</td><td>If you have a field not named "username", but want to use it to spam-check as a username on, set the name of the field here. If Rampart doesn't find the field, it will ignore it.</td><td>username</td></tr><tr><td>rptEmailField</td><td>If you have a field not named "email", but want to use it to spam-check as an email on, set the name of the field here. If Rampart doesn't find the field, it will ignore it.</td><td>email</td></tr><tr><td>rptSpammerErrorMessage</td><td>The field-specific message that will show when a spammer tries to submit the form.</td><td>Your account has been banned as a spammer. Sorry.</td></tr></tbody></table>See Also
--------

1. [Rampart.hook.RampartFormIt](/extras/revo/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](/extras/revo/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](/extras/revo/rampart/rampart.prehook.rampartregister)