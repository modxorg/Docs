---
title: "Rampart.hook.RampartQuip"
_old_id: "973"
_old_uri: "revo/rampart/rampart.hook.rampartquip"
---

hook.RampartQuip
----------------

To enable Rampart spam prevention on your Quip comments, simply add hook.RampartQuip as a preHook in your Quip call:

```
<pre class="brush: php">
[[!Quip?
  &preHook=`hook.RampartQuip`
]]

```This will automatically check the email on the Quip form against spammers in your system.

Available Properties
--------------------

It has the following properties to be passed into the FormIt snippet call:

<table><tbody><tr><th>name</th><th>description</th><th>default</th></tr><tr><td>rptSpammerErrorMessage</td><td>The field-specific message that will show when a spammer tries to submit the form.</td><td>Your account has been banned as a spammer. Sorry.</td></tr></tbody></table>See Also
--------

1. [Rampart.hook.RampartFormIt](/extras/revo/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](/extras/revo/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](/extras/revo/rampart/rampart.prehook.rampartregister)