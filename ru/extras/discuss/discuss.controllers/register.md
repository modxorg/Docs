---
title: "register"
description: "Контроллер регистрации в форуме Discuss и интеграция с SSO"
translation: "extras/discuss/discuss.controllers/register"
---

Контроллер Register показывает форму регистрации или, если включён **discuss.sso_mode** (рекомендуется), перенаправляет пользователя на ресурс регистрации.

## Основная информация

| Since Version         | 1.0                                           |
| --------------------- | --------------------------------------------- |
| Controller File       | controllers/web/register.class.php            |
| Controller Class Name | DiscussRegisterController                     |
| Controller Template   | pages/register.tpl (only used if sso_mode=0) |
| Manifest Name         | register                                      |

## Опции

У контроллера Register нет опций manifest.

Поведение контроллера Register зависит от двух системных настроек. Если задан **discuss.register_resource_id** и включён discuss.sso_mode, контроллер Register перенаправляет запросы на ресурс из register_resource_id с query string &discuss=1.

Если sso_mode выключен или register_resource_id не задан, контроллер Login использует шаблон pages/login.tpl и показывает форму входа.

## Шаблон контроллера

В шаблоне этого контроллера нет специфичных плейсхолдеров.

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

## Системные события

На этом контроллере не срабатывают пользовательские системные события.
