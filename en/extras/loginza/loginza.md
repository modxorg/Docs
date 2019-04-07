---
title: "Loginza"
_old_id: "918"
_old_uri: "revo/loginza/loginza.loginza"
---

## Description

This is snippet thats login and logout users.

On first login user will be registered. On next logins user profile will be updated by default.

## Usage

Call uncached snippet on your page.

``` php
[[!Loginza]]
```

Register user to group Users, do not update his profile on next logins and remember him.

``` php
[[!Loginza?
  &groups=`Users`
  &updateProfile=`0`
  &rememberme=`1`
]]
```

## Availible properties

| Name             | Description                                                                                                                                               | Default value                                                                                                 |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| action           | Action of the snippet (login, logout, getProfile, updateProfile, loadTpl)                                                                                 | loadTpl                                                                                                       |
|                  |                                                                                                                                                           |                                                                                                               |
| updateProfile    | Update user profile with info from validation service. Fullname, email, date of birth etc.                                                                | 1                                                                                                             |
| rememberme       | Remember user? Depends on [session\_cookie\_lifetime](administering-your-site/settings/system-settings/session_cookie_lifetime "session_cookie_lifetime") | 1                                                                                                             |
| groups           | Comma-separated list of existing groups for registering users.                                                                                            | none                                                                                                          |
|                  |                                                                                                                                                           |                                                                                                               |
| loginTpl         | Chunk for not authenticated users with link to login.                                                                                                     | [tpl.Loginza.login](extras/loginza/tpl.loginza.login "tpl.Loginza.login")                                    |
| logoutTpl        | Chunk for authenticated user with link to logout.                                                                                                         | [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout "tpl.Loginza.logout")                                 |
| profileTpl       | Chunk for display and edit user profile                                                                                                                   | [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile "tpl.Loginza.profile")                              |
|                  |                                                                                                                                                           |                                                                                                               |
| saltName         | Any string to complicate md5 hash of username md(identity + salt). Without it username will be simple md5 hash of its identity from remote service.       | none                                                                                                          |
| saltPass         | Any string to complicate md5 hash of pass. Without it pass will be simple md5 hash of its identity from remote service.                                   | none                                                                                                          |
|                  |                                                                                                                                                           |                                                                                                               |
| loginContext     | Context to login.                                                                                                                                         | current context                                                                                               |
| addContexts      | A comma-separated list of additional contexts to log in to.                                                                                               | none                                                                                                          |
| profileFields    | Comma separated list of allowed user fields for update                                                                                                    | username,email,fullname,phone,mobilephone,dob,gender,address,country,city,state,zip,fax,photo,comment,website |
| requiredFields   | Comma separated list of required user fields when update                                                                                                  | username,email,fullname                                                                                       |
|                  |                                                                                                                                                           |                                                                                                               |
| loginResourceId  | Resource id to redirect to on successful login. 0 will redirect to self.                                                                                  | 0                                                                                                             |
| logoutResourceId | Resource id to redirect to on successful logout. 0 will redirect to self.                                                                                 | 0                                                                                                             |

## Source code

Here is this [snippet on Github](https://github.com/bezumkin/modx-loginza/blob/master/core/components/loginza/elements/snippets/loginza.php).

## See Also

1. [Loginza.Loginza](extras/loginza/loginza.loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)