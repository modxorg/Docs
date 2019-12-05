---
title: System Settings
---

MODX 3.0 cleaned up a significant number of old system settings and changed the default value (for new installations) of some as well.

## Removed

- `allow_tv_eval`, the `@EVAL` binding is no longer supported for TVs for security reasons [#13865](https://github.com/modxcms/revolution/pull/13865)
- `compress_js_max_files`, `manager_js_zlib_output_compression`, `manager_js_cache_file_locking`, `manager_js_cache_max_age`, `manager_js_document_root` which were related to the old dynamic manager js minification [#13859](https://github.com/modxcms/revolution/pull/13859), [#14868](https://github.com/modxcms/revolution/pull/14868)
- `upload_flash`, set `upload_files` or `upload_images` or the `allowedFileTypes` on the media source instead. [#14252](https://github.com/modxcms/revolution/pull/14252)
- `manager_language` [#13786](https://github.com/modxcms/revolution/pull/13786), replaced by automatic language detection and on-the-fly switching in the manager [#14046](https://github.com/modxcms/revolution/pull/14046). [Learn more about the manager language in 3.0](getting-started/maintenance/upgrading/3.0/manager-language)
- `editor_css_path` and `editor_css_selectors` have been removed [#14843](https://github.com/modxcms/revolution/pull/14843). These settings may be in by [TinyMCE](https://github.com/modxcms/TinyMCE/issues/30) or other third-party extras which may need to accommodate the setting not being available. 

## Changed default values

When the default value for a setting is changed, that only applies to fresh installations of MODX 3. Upgrades are unaffected (but you may want to consider making the same changes on an existing site).

- `automatic_template_assignment` defaults to `sibling` instead of `parent` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `enable_gravatar` is disabled on new installations [#14215](https://github.com/modxcms/revolution/pull/14215)
- `manager_favicon_url` defaults to a new favicon, included in the MODX download, with the MODX logo. [#14324](https://github.com/modxcms/revolution/pull/14324)
- `manager_time_format` uses 24hr format (`H:i`) instead of am/pm (`g:i a`) by default [#14325](https://github.com/modxcms/revolution/pull/14325)
- `preserve_menuindex` defaults to `false` instead of `true` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `resource_tree_node_name_fallback` defaults to `alias` instead of `pagetitle` [#14328](https://github.com/modxcms/revolution/pull/14328)
