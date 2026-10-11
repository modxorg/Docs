---
title: Системные настройки
translation: "getting-started/upgrading-to-3.0/system-settings"
---

MODX 3.0 очистил значительное количество старых системных настроек и изменил значение по умолчанию (для новых установок) некоторых из них.

## Удалены

-   `allow_tv_eval`, привязка `@EVAL` больше не поддерживается для TVs по соображениям безопасности [#13865](https://github.com/modxcms/revolution/pull/13865)
-   `forgot_login_email`, письмо сброса пароля теперь из лексикона `login_forgot_email` и ссылки сброса, без пароля в письме [#13786](https://github.com/modxcms/revolution/pull/13786). См. [forgot_login_email](building-sites/settings/forgot_login_email)
-   `compress_js_max_files`, `manager_js_zlib_output_compression`, `manager_js_cache_file_locking`, `manager_js_cache_max_age`, `manager_js_document_root` что связано со старым динамическим менеджером JS minification [#13859](https://github.com/modxcms/revolution/pull/13859), [#14868](https://github.com/modxcms/revolution/pull/14868)
-   `editor_css_path` и `editor_css_selectors` был удален [#14843](https://github.com/modxcms/revolution/pull/14843). Эти настройки могут быть в [TinyMCE](https://github.com/modxcms/TinyMCE/issues/30) или других сторонних дополнениях, которые могут потребоваться для настройки недоступных настроек.)
-   `manager_language` [#13786](https://github.com/modxcms/revolution/pull/13786), заменено автоматическое определение языка и переключение на лету в менеджере [#14046](https://github.com/modxcms/revolution/pull/14046). [Узнайте больше о языке менеджера в 3.0](getting-started/upgrading-to-3.0/manager-language)
-   `resolve_hostnames` и `server_protocol` были удалены [#14877](https://github.com/modxcms/revolution/pull/14877). Устаревшие настройки из MODX Evolution.
-   `upload_flash`, установите `upload_files` или `allowedFileTypes` у media source. [#14252](https://github.com/modxcms/revolution/pull/14252). Примечание: в 3.0 дополнительно появились `upload_images` и `upload_media`, но их снова удалили начиная с **3.1.0** [#16349](https://github.com/modxcms/revolution/pull/16349) — в актуальных релизах остаются только `upload_files` и `allowedFileTypes`.
-   `udperms_allowroot` и `webpwdreminder_message` [#14841](https://github.com/modxcms/revolution/pull/14841). Создание ресурсов в корне задаёт разрешение `new_document_in_root`. `webpwdreminder_message` был неиспользуемым шаблоном письма веб-пользователю. См. [udperms_allowroot](building-sites/settings/udperms_allowroot) и [webpwdreminder_message](building-sites/settings/webpwdreminder_message).
-   `cache_action_map` поскольку карта действий была полностью удалена, теперь официально исчезло modAction [#14927](https://github.com/modxcms/revolution/pull/14927)
-   `filemanager_path`, `filemanager_path_relative`, `filemanager_url`, `filemanager_url_relative`, `rb_base_dir`, `rb_base_url`, `strip_image_paths`, `use_browser` и `fe_editor_lang`. В основном это настройки путей файлового менеджера и RedBox; если у вас был свой `filemanager_path` или `rb_base_dir`, проверьте дополнения после обновления — параметров больше нет.
-   `emailsubject`, `signupemail_message`, `websignupemail_message`, `manager_lang_attribute` и `topmenu_subitems_max`. Первые три — шаблоны/темы писем: их текст теперь берётся из лексиконов (`signupemail_message` при создании пользователя всё ещё читается с fallback на лексикон). `manager_lang_attribute` и `topmenu_subitems_max` — неиспользуемые остатки.

## Переименованы

-   `mail_smtp_prefix` → `mail_smtp_secure`. Значение переносит установщик при обновлении ([скрипт апгрейда 3.0.0](https://github.com/modxcms/revolution/blob/3.x/setup/includes/upgrades/common/3.0.0-update-smtp-system-settings.php)).
-   `upload_check_exists` → `upload_file_exists`. Для этого переименования **автоматической миграции нет**: после обновления проверьте настройки сайта на наличие старого ключа.

## Измененные значения по умолчанию

Когда значение по умолчанию для параметра изменяется, это применяется только к новым установкам MODX 3. Обновления не затрагиваются (но вы можете рассмотреть возможность внесения тех же изменений на существующем сайте).

-   `automatic_template_assignment` по умолчанию используется `sibling` вместо `parent` [#14328](https://github.com/modxcms/revolution/pull/14328)
-   `enable_gravatar` отключается при новых установках [#14215](https://github.com/modxcms/revolution/pull/14215)
-   `manager_favicon_url` по умолчанию используется новый фавикон, включенный в загрузку MODX, с логотипом MODX. [#14324](https://github.com/modxcms/revolution/pull/14324)
-   `manager_time_format` использует 24-часовой формат (`H:i`) вместо am/pm (`g:i a`) по умолчанию [#14325](https://github.com/modxcms/revolution/pull/14325)
-   `preserve_menuindex` по умолчанию `false` вместо `true` [#14328](https://github.com/modxcms/revolution/pull/14328)
-   `resource_tree_node_name_fallback` по умолчанию `alias` вместо `pagetitle` [#14328](https://github.com/modxcms/revolution/pull/14328)
