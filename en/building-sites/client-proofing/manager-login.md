---
title: Customizing the Login
---

With MODX3 you get more and easier control over the appearance of the manager login page. 

## Logo

By default, the MODX logo will be used. This file is included in the release in `/manager/templates/default/images/modx-logo-color.svg`. 

To use a different logo, provide an image URL in the the `login_logo` system setting. This can be both a local file or an external (full) URL. The image is limited to a width of 192 pixels (or 384 on 2x displays).

## Background image

The background image on the login screen is a default one included in `/manager/templates/default/images/login/default-background.jpg`. The photo provided with MODX 3.0.0 was created by Christian Seel, and shows a mountain range near Engelberg, Switzerland, where the new login experience was originally built during a SnowUp event. ([Source](https://github.com/modxcms/revolution/pull/13773#issuecomment-364594061))

> If you've created or use a custom manager theme, you must also provide a `/manager/templates/YOUR-THEME/images/login/default-background.jpg` file to act as the default.

To change the background to a different image, provide an image URL in the `login_background_image` system setting. This can be both a local file or an external (full) URL. A landscape image works best.

### Changing programmatically

Alternatively, the background can also be changed programmatically with a plugin. 

One pre-made example of that is the [DailyPhoto extra](https://modx.com/extras/package/dailyphoto) which uses a different random photo each time from Unsplash. 

To create your own custom logic for the background image, create a plugin that listens to the `OnManagerLoginFormRender` system event, with code like this:

```php
$modx->controller->setPlaceholder('background', '/full/url/to/image.jpg');
```

## Help block

The login page also includes a help block, however this is disabled by default. To enable it, set the `login_help_button` system setting to yes. A help link will then be shown at the bottom of the login panel.  

The content of the login block is managed in the lexicon. To change, go to System > Lexicons. Select `core` as the namespace (if not pre-selected by default) and the `login` topic. Also choose the language to edit. The relevant lexicon keys are `login_help_button_text`, `login_help_text`, and  `login_help_title` which can be edited by double clicking on the value.

## Passwordless login

If desirable you can also enable [logging in with a magic login link](building-sites/client-proofing/security/passwordless-login) instead of a username and password.
