---
title: "Rampart.preHook.RampartRegister"
_old_id: "974"
_old_uri: "revo/rampart/rampart.prehook.rampartregister"
---

## preHook.RampartRegister

To enable Rampart spam prevention on your Register forms, simply add preHook.RampartRegister as a preHook:

``` php 
[[!Register?
  &preHooks=`math,preHook.RampartRegister`
  &moderatedResourceId=`217`
  &submittedResourceId=`194`
  &activationResourceId=`193`
  &submitVar=`login-register-btn`
]]
```

If you set the moderatedResourceId property, it will redirect registrations that have been flagged as possible spammers to that Resource instead of the normal &submittedResourceId page.

Rampart will then prevent spam registrations by flagging spam users and preventing their accounts from being activated until they are approved. You can approve flagged users in the Rampart Custom Manager Page, in the MODX admin. Once approved, the flagged user will receive their confirmation email and must confirm before being activated.

### How Does it Work?

Rampart compares registrations against your ban list that you can edit in the Custom Manager Page. If a user tries to register and matches one of those ban patterns, it will prevent Registration at all.

It also checks with [StopForumSpam](http://stopforumspam.com/) for any flagged emails, and username+ip combinations. If they're found, it will mark the registration as 'flagged', and prevent activation of the user (and the sending of the activation email) until the registration has been approved by a moderator via the Custom Manager Page.

## Available Properties

It has the following properties to be passed into the Register snippet call:

| name | description | default |
|------|-------------|---------|
| rptSpammerErrorMessage | The field-specific message that will show when a banned user tries to sign up. | Your account has been banned as a spammer. Sorry. |

## See Also

1. [Rampart.hook.RampartFormIt](/extras/rampart/rampart.hook.rampartformit)
2. [Rampart.hook.RampartQuip](/extras/rampart/rampart.hook.rampartquip)
3. [Rampart.preHook.RampartRegister](/extras/rampart/rampart.prehook.rampartregister)