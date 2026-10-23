---
title: Customizing the Login
description: "The login page of the MODX Manager: its logo, the background image, the help block, the language, and the settings that change them."
---

The login page of MODX 3 has its own settings, its own template, and its own events. You can change its look without changing the rest of the manager.

## Logo

The site logo is used by default. The file is `manager/templates/default/images/modx-logo-color.svg`.

To use a different logo, put the address of an image into the `login_logo` system setting. It can be a local file or a full external URL. The image is limited to a width of 192 CSS pixels.

The logo is also used in the manager's letters, in the standard template `email/default.tpl`.

**A custom theme needs its own logo**
The default logo is read from the directory of the theme, with no fallback to `default`. A theme that has no `images/modx-logo-color.svg` shows a broken logo on the login page.

The favicon of the page is a separate setting, `manager_favicon_url`.

## Background Image

The login background ships as `manager/templates/default/images/login/default-background.jpg`. The photo in MODX 3.0.0 is by Christian Seel ([source](https://github.com/modxcms/revolution/pull/13773#issuecomment-364594061)).

To use another image, put its address in the `login_background_image` system setting. It can be a local file or a full external URL. A landscape image works best.

> [!NOTE]
> If you've created or use a custom manager theme, you must also provide a `/manager/templates/YOUR-THEME/images/login/default-background.jpg` file to act as the default.

### Changing Programmatically

A plugin can set the background, which is how you give every visitor a different picture. One ready-made example is the [DailyPhoto extra](https://modx.com/extras/package/dailyphoto), which uses a different random photo each day from Unsplash.

To set the background yourself, create a plugin that listens to the `OnManagerLoginFormRender` system event:

``` php
$modx->controller->setPlaceholder('background', '/full/url/to/image.jpg');
```

The event `OnManagerLoginFormPrerender` places its output before the form. A plugin on that event cannot set the background: the theme writes the placeholder after Prerender runs.

## Help Block

The login page includes a help block, disabled by default. Set the `login_help_button` system setting to yes, and a help link shows at the bottom of the login panel.

The content of the login block is managed in the lexicon. Go to **Admin → Lexicons**, select `core` as the namespace (if it is not pre-selected) and the `login` topic, and choose the language to edit. The relevant lexicon keys are `login_help_button_text`, `login_help_text`, and `login_help_title`. Double-click a value to edit it.

The text of the greeting is chosen by the time of day from the keys `login_greeting_morning`, `login_greeting_afternoon`, `login_greeting_evening` and `login_greeting_night` of the same topic.

## Language

The language of the login page is picked on the page itself. It is not the `manager_language` setting. In MODX 3 that setting is removed on upgrade, and the language lives in the session.

The page uses the first source that has a language:

| Order | Source |
| --- | --- |
| 1 | The request |
| 2 | The session |
| 3 | The browser |
| 4 | `en` |

## Other Settings

| Setting | What it changes |
| --- | --- |
| `allow_manager_login_forgot_password` | Whether the block for resetting a forgotten password is shown. |
| `manager_login_url_alternate` | The address an unauthorized user is sent to, instead of the login page. |
| `manager_direction` | The direction of the text, `rtl` for a right-to-left language. |
| `compress_css` | Whether the login page links the minified stylesheet. |
| `password_min_length` | The minimum length of a password, in the hint under the field. |
| `session_cookie_lifetime` | The lifetime of the session, shown in the label of the "remember me" checkbox. |

## Passwordless Login

Instead of a username and a password, the login page can offer [logging in with a magic link](building-sites/client-proofing/security/passwordless-login). With `passwordless_activated` set, the form shows only the field for the e-mail address. The lifetime of the link is set by the `passwordless_expiration` setting, 3600 seconds by default.

## See Also

1. [Client-proofing the manager](building-sites/client-proofing)
2. [Custom Manager Themes](building-sites/client-proofing/custom-manager-themes)
3. [Customizing the Login](building-sites/client-proofing/manager-login)
4. [Logging in with a magic link](building-sites/client-proofing/security/passwordless-login)
