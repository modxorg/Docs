---
title: Manager UI in 3.0
---

The manager in 3.0 is the same ExtJS app with a new skin and a set of layout tweaks. This page lists the leftover interface changes from the 3.0 cycle that do not have their own how-to.

Installer and login redesigns are covered on [Upgrading to 3.0](getting-started/upgrading-to-3.0) and [Manager login](building-sites/client-proofing/manager-login). Language switching is on [Manager language](getting-started/upgrading-to-3.0/manager-language).

## Already documented elsewhere

- Redesigned [manager login](building-sites/client-proofing/manager-login), including custom backgrounds. [#13773](https://github.com/modxcms/revolution/pull/13773)
- Redesigned installer. [#14507](https://github.com/modxcms/revolution/pull/14507)
- [On-the-fly manager language](getting-started/upgrading-to-3.0/manager-language). [#14046](https://github.com/modxcms/revolution/pull/14046)
- Media browser and manager layout on smaller screens. [#14700](https://github.com/modxcms/revolution/pull/14700), [#14735](https://github.com/modxcms/revolution/pull/14735)
- Chrome in-page translation is blocked in the manager. [#14414](https://github.com/modxcms/revolution/pull/14414)
- Gravatar is off on new installs. See [system settings in 3.0](getting-started/upgrading-to-3.0/system-settings). [#14215](https://github.com/modxcms/revolution/pull/14215)

## Tooltips

Field description tooltips can be turned off, and you can change how long they stay on screen:

- [manager_tooltip_enable](building-sites/settings/manager_tooltip_enable) (default Yes)
- [manager_tooltip_delay](building-sites/settings/manager_tooltip_delay) (default 2300 ms, ExtJS `dismissDelay`)

Media Browser image previews use [modx_browser_tree_hide_tooltips](building-sites/settings/modx_browser_tree_hide_tooltips), not these settings. [#14535](https://github.com/modxcms/revolution/pull/14535)

## Profile and resource forms

- User profile screens share one layout. [#14731](https://github.com/modxcms/revolution/pull/14731), [#14420](https://github.com/modxcms/revolution/pull/14420)
- Resource settings and the Quick Update Resource window use the same field layout. [#14726](https://github.com/modxcms/revolution/pull/14726)
- Template and TV forms put the TV tab before Settings. Resource editing does the same for TVs. [#14251](https://github.com/modxcms/revolution/pull/14251), [#14250](https://github.com/modxcms/revolution/pull/14250)
- Grid "New" buttons follow one pattern. [#14312](https://github.com/modxcms/revolution/pull/14312)

## Other manager behaviour

- System Info → Database tables shows a success notice after a table operation. [#14525](https://github.com/modxcms/revolution/pull/14525)
- The top search bar (uberbar) trims leading and trailing spaces before it searches. [#14523](https://github.com/modxcms/revolution/pull/14523)
- The manager CSS starts from normalize.css. [#14369](https://github.com/modxcms/revolution/pull/14369)
