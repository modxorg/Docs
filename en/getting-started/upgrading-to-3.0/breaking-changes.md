---
title: Breaking Changes
description: 'Breaking changes in MODX3 that may affect site upgrades and packages.'
sortorder: 1
note: 'This document is not yet complete.'
---

As a major release, MODX 3.0 comes with a number of breaking changes. There is always a balance to be kept between breaking changes that cleanup technical debt, and not breaking things unnecessarily.

## Most important breaking changes

The biggest breaking changes can be summarised as follows:

- [Minimum supported PHP version was increased to 7.2 in 3.0, and again to 8.1 in 3.2](getting-started/upgrading-to-3.0/requirements)
- [It's no longer possible to use a custom core folder/path](getting-started/upgrading-to-3.0/core-folder)
- [sqlsrv support has been removed](getting-started/upgrading-to-3.0/sqlsrv)
- [A large number of (previously unnamespaced) classes have been renamed and moved](getting-started/upgrading-to-3.0/class-names), including processors and model classes.
- [xPDO 3 ships via Composer with PSR-4 models; migrate custom packages](getting-started/upgrading-to-3.0/xpdo)
- [All processors have been renamed, including base processors](getting-started/upgrading-to-3.0/processors)
- [modAction and related functionality has been removed](getting-started/upgrading-to-3.0/actions)
- modRestClient has been removed [#15781](https://github.com/modxcms/revolution/pull/15781) and has been [replaced with a new PSR-7/17/18 HTTP service](extending-modx/services/http)

## Legacy functionality cleanup

- `modResource->contentType` field has been removed. Use the `content_type` integer field (FK to `modContentType`) instead. [#14057](https://github.com/modxcms/revolution/pull/14057)

  Before (legacy / broken in 3.0):

  ```php
  $mime = $resource->get('contentType'); // removed field
  ```

  After:

  ```php
  $contentTypeId = $resource->get('content_type');
  $contentType = $resource->getOne('ContentType'); // or $modx->getObject(modContentType::class, $contentTypeId)
  $mime = $contentType ? $contentType->get('mime_type') : '';
  ```

- `modParser095`, `modTranslate095`, and `modTranslator` have been removed. They only helped migrate Evolution (0.9.x) tag syntax into Revolution. Do not call them for Evo→Revo migrations anymore: convert templates to standard `[[...]]` tags manually or with your own tooling, then rely on the normal `modParser`. [#14133](https://github.com/modxcms/revolution/pull/14133)
- Flash-based copy-to-clipboard in ExtJS has been removed. Manager copy actions use the browser clipboard APIs instead. [#13697](https://github.com/modxcms/revolution/pull/13697)
- `/manager/min/` directory has been removed; was unused since 2.5. [#12778](https://github.com/modxcms/revolution/pull/12778), [#13194](https://github.com/modxcms/revolution/pull/13194), [#14416](https://github.com/modxcms/revolution/pull/14416)
- Unused ExtJS grids have been removed: assets/modext/widgets/resource/modx.grid.resource.security.js, assets/modext/widgets/security/modx.grid.role.user.js, assets/modext/workspace/lexicon/language.grid.js, assets/modext/workspace/lexicon/lexicon.topic.grid.js [#14895](https://github.com/modxcms/revolution/pull/14895)
- `@EVAL` binding has been removed from TVs [#13865](https://github.com/modxcms/revolution/pull/13865)
