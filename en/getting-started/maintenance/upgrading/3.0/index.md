---
title: "Upgrading from 2.x to 3.0"
note: "This is a living document as MODX 3.0 is still in development."
sortorder: 1
---

This document details the changes made between 2.x and 3.0 that may affect upgrades. It's not a full list of all changes (see the [changelog for that](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt)), but rather a reference of (breaking) changes that may affect extras and sites. 

In general, you can follow the [standard upgrading process](getting-started/maintenance/upgrading) when upgrading to 3.0. It's recommended to first upgrade to the latest 2.7 release, which will log deprecated functionality your site depends on to the MODX log. 

## Server Requirements

- PHP requirement increased from PHP 5.3.3 to PHP 7.0 [#14488](https://github.com/modxcms/revolution/pull/14488)

## Removed functionality

- `modResource->contentType` field has been removed; that was replaced in Revolution 2.0 with a `content_type` field that maps to a `modContentType` instance. [#14057](https://github.com/modxcms/revolution/pull/14057)
- `modParser095`, `modTranslate095`, and `modTranslator` have been removed. Those were utilities for migrating templates from Evolution syntax. [14133](https://github.com/modxcms/revolution/pull/14133)
- `/manager/min/` directory has been removed; was unused since 2.5. [#12778](https://github.com/modxcms/revolution/pull/12778), [#13194](https://github.com/modxcms/revolution/pull/13194), [#14416](https://github.com/modxcms/revolution/pull/14416)
- `@EVAL` binding has been removed from TVs [#13865](https://github.com/modxcms/revolution/pull/13865)

## Notable changes and improvements
 
### Manager/Interface

- Manager has been redesigned.
- Language can now be switched on the fly [#14046](https://github.com/modxcms/revolution/pull/14046)
- All manager permissions are automatically made available in `MODx.perm` [#13924](https://github.com/modxcms/revolution/pull/13924), [#14425](https://github.com/modxcms/revolution/pull/14425), 
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

## System Settings

The default value for a number of settings have changed. These only apply to new installations, but may expose different behaviour by default on new installations of 3.0.

- `automatic_template_assignment` defaults to `sibling` instead of `parent` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `enable_gravatar` is disabled on new installations [#14215](https://github.com/modxcms/revolution/pull/14215)
- `manager_favicon_url` defaults to a new favicon, included in the MODX download, with the MODX logo. [#14324](https://github.com/modxcms/revolution/pull/14324)
- `manager_time_format` uses 24hr format (`H:i`) instead of am/pm (`g:i a`) by default [#14325](https://github.com/modxcms/revolution/pull/14325)
- `preserve_menuindex` defaults to `false` instead of `true` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `resource_tree_node_name_fallback` defaults to `alias` instead of `pagetitle` [#14328](https://github.com/modxcms/revolution/pull/14328)

### Removed settings

- `allow_tv_eval` [#13865](https://github.com/modxcms/revolution/pull/13865)
- `compress_js_max_files`, `manager_js_zlib_output_compression`, which related to the old dynamic manager js minification [#13859](https://github.com/modxcms/revolution/pull/13859)
- `upload_flash` [#14252](https://github.com/modxcms/revolution/pull/14252)
- `manager_language` [#13786](https://github.com/modxcms/revolution/pull/13786), replaced by dynamic language switching [#14046](https://github.com/modxcms/revolution/pull/14046)


