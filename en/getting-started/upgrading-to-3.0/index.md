---
title: "Upgrading from 2.x to 3.0"
note: "This is a living document as MODX 3.0 is still in development. At this time it's not yet recommended to upgrade sites to MODX 3.0 unless you're a developer looking to test, and prepare, your extras. "
sortorder: 7
---

This document details the changes made between 2.x and 3.0 that may affect upgrades. It's not a full list of all changes (see the [changelog for that](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt)), but rather a reference of (breaking) changes that may affect extras and sites.

## Upgrade to 3.0

In general, you can follow the [standard upgrading process](getting-started/maintenance/upgrading) when upgrading to 3.0. It's recommended to first upgrade to the latest 2.7 release, which will log deprecated functionality your site depends on to the MODX log.

After upgrading the core and upgrading your extras, you may encounter some breaking changes that need to be addressed in extras or custom code.

- Important: [MODX 3.0 requires at least PHP 7.1](getting-started/maintenance/upgrading/3.0/requirements)
- [A list of breaking changes can be found here](getting-started/maintenance/upgrading/3.0/breaking-changes), most notably [many core classes have been moved and renamed](getting-started/maintenance/upgrading/3.0/class-names)
- [The manager language is now dynamic](getting-started/maintenance/upgrading/3.0/manager-language)
- [Various system settings have been removed or changed](getting-started/maintenance/upgrading/3.0/system-settings)

## Other notable changes and improvements

### Manager/Interface

- Redesigned installer [#14507](https://github.com/modxcms/revolution/pull/14507) and login [#13773](https://github.com/modxcms/revolution/pull/13773).
- Manager has been redesigned. Improved manager on mobile devices [#14700](https://github.com/modxcms/revolution/pull/14700), [#14735](https://github.com/modxcms/revolution/pull/14735). Changed resource styles in the tree [#14832](https://github.com/modxcms/revolution/pull/14832)
- Language can now be switched on the fly [#14046](https://github.com/modxcms/revolution/pull/14046)
- All manager permissions are automatically made available in `MODx.perm` [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425)
- Google translations are now disabled in the manager [#14414](https://github.com/modxcms/revolution/pull/14414)
- More consistent resource/element duplication [#14411](https://github.com/modxcms/revolution/pull/14411)

### Packages

- Markdown is now parsed in package attributes (changelog/readme/license) [#13853](https://github.com/modxcms/revolution/pull/13853)

### Files & Media

- Media sources now use Flysystem [#13709](https://github.com/modxcms/revolution/pull/13709)
- Core directories are now protected from being renamed/removed from the manager [#14374](https://github.com/modxcms/revolution/pull/14374)

### Resources & Templates

- Resources can now get an icon based on their content type [#14383](https://github.com/modxcms/revolution/pull/14383)
- New output modifiers related to files: `dirname`, `basename`, `filename`, `extensions` [#14198](https://github.com/modxcms/revolution/pull/14198)
