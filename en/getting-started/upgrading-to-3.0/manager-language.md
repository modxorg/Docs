---
title: Manager Language
---

In MODX 2.x, the manager language was managed through a `manager_language` system setting (and optionally overridden on context or user level). In MODX 3, this setting has been removed, and the manager language is instead stored in the users' session. 

The current language is available with the key `cultureKey` in the MODX config array: `$modx->config['cultureKey']`. The backend javascripts have to be changed from `MODx.config.manager_language` to `MODx.config.cultureKey`.

When visiting the manager, it will automatically select the most likely desirable language based on the browser language. A different language can be selected at the bottom of the login screen.

To dynamically change your language while logged in, use the User > Toggle Language menu from the manager menu.

![Toggling the manager language while you're logged in to the manager](manager-language.jpg)
