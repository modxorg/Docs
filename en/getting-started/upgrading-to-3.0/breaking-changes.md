---
title: Breaking Changes
description: 'Breaking changes in MODX3 that may affect site upgrades and packages.'
sortorder: 1
note: 'This document is not yet complete.'
---

As a major release, MODX 3.0 comes with a number of breaking changes. There is always a balance to be kept between breaking changes that cleanup technical debt, and not breaking things unnecessarily.

## Most important breaking changes

The biggest breaking changes can be summarised as follows:

- [Minimum supported PHP version has been increased to 7.1](getting-started/upgrading-to-3.0/requirements)
- [It's no longer possible to use a custom core folder/path](getting-started/upgrading-to-3.0/core-folder)
- [sqlsrv support has been removed](getting-started/upgrading-to-3.0/sqlsrv)
- [A large number of (previously unnamespaced) classes have been renamed and moved](getting-started/upgrading-to-3.0/class-names), including processors and model classes.
- [All processors have been renamed, including base processors](getting-started/upgrading-to-3.0/processors)
- [modAction and related functionality has been removed](getting-started/upgrading-to-3.0/actions)
- modRestClient has been removed [#15781](https://github.com/modxcms/revolution/pull/15781) and has been [replaced with a new PSR-7/17/18 HTTP service](extending-modx/services/http)

## Legacy functionality cleanup

- `modResource->contentType` field has been removed; that was replaced in Revolution 2.0 with a `content_type` field that maps to a `modContentType` instance. [#14057](https://github.com/modxcms/revolution/pull/14057)
- `modParser095`, `modTranslate095`, and `modTranslator` have been removed. Those were utilities for migrating templates from Evolution syntax. [#14133](https://github.com/modxcms/revolution/pull/14133)
- `/manager/min/` directory has been removed; was unused since 2.5. [#12778](https://github.com/modxcms/revolution/pull/12778), [#13194](https://github.com/modxcms/revolution/pull/13194), [#14416](https://github.com/modxcms/revolution/pull/14416)
- Unused ExtJS grids have been removed: assets/modext/widgets/resource/modx.grid.resource.security.js, assets/modext/widgets/security/modx.grid.role.user.js, assets/modext/workspace/lexicon/language.grid.js, assets/modext/workspace/lexicon/lexicon.topic.grid.js [#14895](https://github.com/modxcms/revolution/pull/14895)
- `@EVAL` binding has been removed from TVs [#13865](https://github.com/modxcms/revolution/pull/13865)
