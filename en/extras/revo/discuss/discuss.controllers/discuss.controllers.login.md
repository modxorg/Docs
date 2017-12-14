---
title: "Discuss.Controllers.login"
_old_id: "817"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.login"
---

The Login controller is used for either showing a login form, or when discuss.sso\_mode is enabled (recommended), to redirect the user to the login page.

<div>- [Basic Information](#Discuss.Controllers.login-BasicInformation)
- [Options](#Discuss.Controllers.login-Options)
- [Controller Template](#Discuss.Controllers.login-ControllerTemplate)
- [System Events](#Discuss.Controllers.login-SystemEvents)

</div>Basic Information
-----------------

<table><tbody><tr><td>Since Version</td><td>1.0</td></tr><tr><td>Controller File</td><td>controllers/web/login.class.php</td></tr><tr><td>Controller Class Name</td><td>DiscussLoginController   
</td></tr><tr><td>Controller Template</td><td>pages/login.tpl (if sso\_mode=0)</td></tr><tr><td>Manifest Name</td><td>login</td></tr></tbody></table>Options
-------

The Login controller does not have any manifest options.

The usage of the Login controller depends on 2 system settings. If the **discuss.login\_resource\_id** is set and discuss.sso\_mode is enabled, the Login controller will simply redirect requests to the resource specified by the login\_resource\_id setting with a &discuss=1 query string.

If either sso\_mode is disabled or no login\_resource\_id is set, the Login controller will use the pages/login.tpl template to display a login form.

Controller Template
-------------------

There are no specific placeholders to use in this controller template.

```
<pre class="brush: php">
[[!Login?
    &loginTpl=`disLoginTpl`
    &logoutTpl=`disLogoutTpl`
    &preHooks=`preHook.DiscussLogin`
    &postHooks=`postHook.DiscussLogin`
]]

```Please note that the disLoginTpl and disLogoutTpl chunks are currently (1.1.0) not included in the package, but can be any valid [Login chunk](/extras/revo/login/login.login "Login.Login"). In order to properly sync user data to Discuss, you will need to have the preHook.DiscussLogin as prehook and postHook.DiscussLogin as posthook - also when using a third party auth scheme.

[Follow these instructions to set up login on your site using sso\_mode (recommended).](http://rtfm.modx.com/display/ADDON/Discuss.Installation#Discuss.Installation-SettingupLogin%2CRegister%26UpdateProfilepageswithDiscuss)

System Events
-------------

No custom system events trigger on this controller.