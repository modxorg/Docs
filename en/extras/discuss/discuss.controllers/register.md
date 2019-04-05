---
title: "register"
_old_id: "820"
_old_uri: "revo/discuss/discuss.controllers/discuss.controllers.register"
---

The Register controller is used for either showing a registration form, or when **discuss.sso\_mode** is enabled (recommended), to redirect the user to the registration resource.

## Basic Information

| Since Version         | 1.0                                           |
| --------------------- | --------------------------------------------- |
| Controller File       | controllers/web/register.class.php            |
| Controller Class Name | DiscussRegisterController                     |
| Controller Template   | pages/register.tpl (only used if sso\_mode=0) |
| Manifest Name         | register                                      |

## Options

The Register controller does not have any manifest options.

The usage of the Register controller depends on 2 system settings. If the **discuss.register\_resource\_id** is set and discuss.sso\_mode is enabled, the Register controller will simply redirect requests to the resource specified by the register\_resource\_id setting with a &discuss=1 query string.

If either sso\_mode is disabled or no register\_resource\_id is set, the Login controller will use the pages/login.tpl template to display a login form.

## Controller Template

There are no specific placeholders to use in this controller template.

``` php 
[[!Register?
    &submitVar=`dis-register-btn`
    &activationResourceId=`[[*id]]`
    &activationEmailTpl=`disActivationEmailTpl`
    &activationEmailSubject=`Thanks for Registering!`
    &usergroups=`Forum New Member`
]]
```
``` html
<form class="dis-form dis-register" action="[[~[[*id]]]]register" method="post">
    <h2>[[%discuss.register? &namespace=`discuss` &topic=`web`]]</h2>
    <span class="error">[[+error.spam_empty]]</span>
    <input type="hidden" name="spam_empty" value="" />
    <label for="dis-register-username">[[%discuss.username]]:
        <span class="error">[[+error.username]]</span>
    </label>
    <input type="text" name="username" id="dis-register-username" value="[[+username]]" />
    <label for="dis-register-password">[[%discuss.password]]:
        <span class="error">[[+error.password]]</span>
    </label>
    <input type="password" name="password" id="dis-register-password" value="[[+password]]" />
    <label for="dis-register-password-confirm">[[%discuss.password_confirm]]:
        <span class="error">[[+error.password_confirm]]</span>
    </label>
    <input type="password" name="password_confirm" id="dis-register-password-confirm" value="[[+password]]" />
    <label for="dis-register-email">[[%discuss.email]]:
        <span class="error">[[+error.email]]</span>
    </label>
    <input type="text" name="email" id="dis-register-email" value="[[+email]]" />
    <label for="dis-register-show-email">[[%discuss.show_email]]:
        <span class="error">[[+error.show_email]]</span>
    </label>
    <input type="checkbox" name="show_email" id="dis-register-show-email" value="1" [[+show_email]] />

    <div style="padding-left: 140px; clear:both;">
    [[+recaptcha_html]]
    [[+error.recaptcha]]
    </div>

    <br class="clearfix" />
    [[+discuss.login_error]]
    <div class="dis-form-buttons">
    <input type="submit" class="dis-action-btn" name="dis-register-btn" value="[[%discuss.register]]" />
    </div>
</form>
```

## System Events

No custom system events trigger on this controller.