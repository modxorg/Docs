---
title: "ForcedPasswdChange"
_old_id: "643"
_old_uri: "revo/forcedpasswdchange"
---

## What is ForcedPasswdChange?

With the ForcedPasswdChange you can create or update an user and activate the forced change of their password in the Manager. When checked this option, the user can login but can't do anything untill they have changed their password succesful.

### Requirements

- MODx Revolution 2.0.0-RC-2 or later
- PHP5 or later

### History

ForcedPasswdChange, was written by Bert Oost ([www.oostdesign.nl](http://en.oostdesign.nl)), a component to let users change their password before they can do anything else, and first released on December 4th, 2011.

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository.

## Development and Bug Reporting

ForcedPasswdChange is stored and developed in GitHub, and can be found here: <https://github.com/bertoost/MODX-ForcedPasswdChange>

Bugs can be filed here: <https://github.com/bertoost/MODX-ForcedPasswdChange/issues>

## Howto use it

Just install it and edit a user (not yourself!) and find the checkbox below the "New password" fieldset. Check it and login as the editted/created user.
Screenshots will be soon available

## Events

After the user has changed the password, the event [OnUserChangePassword](http://rtfm.modx.com/display/revolution20/OnUserChangePassword) will be fired.
