---
title: System Settings
---

MODX 3.0 cleaned up a significant number of old system settings and changed the default value (for new installations) of some as well.

## Removed


- `allow_tv_eval`, the `@EVAL` binding is no longer supported for TVs for security reasons [#13865](https://github.com/modxcms/revolution/pull/13865)
- `forgot_login_email`, password-reset mail now uses the `login_forgot_email` lexicon and a reset link instead of emailing a password [#13786](https://github.com/modxcms/revolution/pull/13786). See [forgot_login_email](building-sites/settings/forgot_login_email)
- `compress_js_max_files`, `manager_js_zlib_output_compression`, `manager_js_cache_file_locking`, `manager_js_cache_max_age`, `manager_js_document_root` which were related to the old dynamic manager js minification [#13859](https://github.com/modxcms/revolution/pull/13859), [#14868](https://github.com/modxcms/revolution/pull/14868)
- `editor_css_path` and `editor_css_selectors` have been removed [#14843](https://github.com/modxcms/revolution/pull/14843). [TinyMCE](https://github.com/modxcms/TinyMCE/issues/30) and other third-party extras may still reference these settings and need to accommodate their absence.
- `manager_language` [#13786](https://github.com/modxcms/revolution/pull/13786), replaced by automatic language detection and on-the-fly switching in the manager [#14046](https://github.com/modxcms/revolution/pull/14046). [Learn more about the manager language in 3.0](getting-started/upgrading-to-3.0/manager-language)
- `resolve_hostnames` and `server_protocol` have been removed [#14877](https://github.com/modxcms/revolution/pull/14877). Deprecated settings from MODX Evolution.
- `upload_flash`, set `upload_files` or the `allowedFileTypes` on the media source instead. [#14252](https://github.com/modxcms/revolution/pull/14252). Note: 3.0 additionally introduced `upload_images` and `upload_media`, but both were removed again in **3.1.0** [#16349](https://github.com/modxcms/revolution/pull/16349) — on current releases only `upload_files` and `allowedFileTypes` remain.
- `udperms_allowroot` and `webpwdreminder_message` [#14841](https://github.com/modxcms/revolution/pull/14841). Root resource creation uses the `new_document_in_root` permission. `webpwdreminder_message` was an unused web-user password email template. See [udperms_allowroot](building-sites/settings/udperms_allowroot) and [webpwdreminder_message](building-sites/settings/webpwdreminder_message).
- `cache_action_map` as the action map has been removed completely now that modAction is officially gone [#14927](https://github.com/modxcms/revolution/pull/14927)
- `filemanager_path`, `filemanager_path_relative`, `filemanager_url`, `filemanager_url_relative`, `rb_base_dir`, `rb_base_url`, `strip_image_paths`, `use_browser` and `fe_editor_lang`. These mostly governed file-manager and RedBox paths; if you had a custom `filemanager_path` or `rb_base_dir`, check your extras for the settings no longer being present after the upgrade.
- `emailsubject`, `signupemail_message`, `websignupemail_message`, `manager_lang_attribute` and `topmenu_subitems_max`. The first three were mail templates/subjects: their text now comes from lexicons (`signupemail_message` is still read with a lexicon fallback when a user account is created). `manager_lang_attribute` and `topmenu_subitems_max` were unused leftovers.

## Renamed

- `mail_smtp_prefix` → `mail_smtp_secure`. Setup migrates the value on upgrade ([3.0.0 upgrade script](https://github.com/modxcms/revolution/blob/3.x/setup/includes/upgrades/common/3.0.0-update-smtp-system-settings.php)).
- `upload_check_exists` → `upload_file_exists`. There is **no automatic migration** for this one: check your site settings for the old key after upgrading.

## Changed default values

Changed defaults below apply to fresh MODX 3 installations only. Upgrades keep the old values — consider applying the new ones to an existing site yourself.


- `automatic_template_assignment` defaults to `sibling` instead of `parent` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `enable_gravatar` is disabled on new installations [#14215](https://github.com/modxcms/revolution/pull/14215)
- `manager_favicon_url` defaults to a new favicon, included in the MODX download, with the MODX logo. [#14324](https://github.com/modxcms/revolution/pull/14324)
- `manager_time_format` uses 24hr format (`H:i`) instead of am/pm (`g:i a`) by default [#14325](https://github.com/modxcms/revolution/pull/14325)
- `preserve_menuindex` defaults to `false` instead of `true` [#14328](https://github.com/modxcms/revolution/pull/14328)
- `resource_tree_node_name_fallback` defaults to `alias` instead of `pagetitle` [#14328](https://github.com/modxcms/revolution/pull/14328)
