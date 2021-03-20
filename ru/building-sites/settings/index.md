---
title: "Системные настройки"
translation: "building-sites/settings/"
description: "MODX поставляется с гибким набором системных настроек, все они перечислены на этой странице."
---

MODX поставляется с гибким набором системных настроек. Они находятся в Система -> Системные настройки и могут быть легко отредактированы и изменены. Все системные настройки доступны в ваших шаблонах с помощью обозначения `[[++placeholder]]`. Посмотрите [Теги шаблона](building-sites/tag-syntax/common) для дополнительной информации.

## Переопределение настроек (Наследование)

В то время как в этом документе в основном говорится о _Системных_ настройках, MODX поставляется с очень мощной системой наследования, которая позволяет переопределять настройки в контексте, пользовательской группе или пользовательской настройке.

По сути, когда параметр запрашивается в сеансе определенного пользователя, параметры проверяются в следующем порядке:

1. Настройка пользователя
2. Настройка группы пользователей
3. Настройка контекста (обратите внимание, что в менеджере контекст обычно называется mgr)
4. Настройка системы

## Создание новых системных настроек (через графический интерфейс)

Чтобы создать новый параметр системы, нажмите ссылку «Создать новые параметры» в разделе «Система» -> «Параметры системы».

![](system_settings_annotated.png)

### Параметры

-   Ключ: в конечном итоге это уникальное имя вашего `[[++placeholder]]`
-   Имя: эта метка отображается в столбце «Имя» при просмотре всех настроек системы. Это значение может быть локализовано (см. Ниже).
-   Тип поля: в настоящее время поддерживаются 3 типа ввода: TextField, TextArea, Yes/No
-   Пространство имен: как с [Пользовательские страницы менеджера](extending-modx/custom-manager-pages "Пользовательские страницы менеджера"), пространство имен определяет папку внутри core/components/.
-   Area Lexicon Entry: это значение влияет на группировку системных настроек; создайте несколько системных настроек, которые совместно используют «Область ввода лексики», и они будут сгруппированы вместе.
-   Значение: значение по умолчанию.
-   Описание: это значение может быть локализовано (см. Ниже).

### Локализация

Значения, используемые для описания настроек системы, могут быть необязательно локализованы (т.е. переведены) путем ссылки на конкретный файл локализации. Ключи лексики следуют определенному формату:

-   Имя: `setting_` + _Key_
-   Описание: `setting_` + _Key_ + `_desc`

Например, если мы посмотрим на Quip's `[[++quip.emailsFrom]]` настройки, мы видим, что он использует пространство имен **quip**. Ожидаемая структура папок состоит в том, чтобы искать файлы локализации в папке пространства имен, затем в папке «лексикона», затем в папках, разделенных по языковым кодам, и затем в **default.inc.php** файле, для примера **core/components/quip/lexicon/en/default.inc.php**

В нашем примере Quip мы видим имя _setting_quip.emailsFrom_ и описание _setting_quip.emailsFrom_desc_. Эти два значения соответствуют ключам в **\$\_lang** массив внутри **default.inc.php**:

```php
$_lang['setting_quip.emailsFrom'] = 'From Email';
$_lang['setting_quip.emailsFrom_desc'] = 'The email address to send system emails from.';
```

Мы рекомендуем вам щелкнуть правой кнопкой мыши существующий системный параметр и выбрать «Обновить системный параметр», чтобы получить представление о том, как это работает.

### Получение настроек системы (программно)

Чтобы получить значение настройки из сниппета, плагина или другого PHP-кода, вы используете [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") функции и передачи ей уникальный ключ для опции, например:

```php
$siteStartId = $modx->getOption('site_start');
```

В WordPress сопоставимая функция API **get_option()**.

Эта функция извлекает значение из кэша настроек.

### Сохранение настроек системы (программно)

Здесь все становится немного сложнее: когда мы получаем значение, используя [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption"), мы получаем объект из кэша настроек. Это имеет явное преимущество в скорости, но это означает, что у нас по существу есть копия значения настройки, доступная только для чтения.

Пока есть метод setOption; это только обновляет кэш настроек в памяти.

Это по архитектурным причинам: системные настройки должны быть определены как _configurations_, **NOT runtime dynamic values**. Они обычно устанавливаются во время установки, а затем не часто обновляются. Однако могут быть законные времена, когда вам нужно обновить системные настройки программно, например, возможно, вы написали [Пользовательская страница менеджера](extending-modx/custom-manager-pages "Пользовательские страницы менеджеры - Руководство") которая предлагает настраиваемую форму для ваших пользователей для своих системных настроек.

Если мы хотим обновить настройки системы, мы используем мощный xPDO [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") функция. Итак, давайте вернемся к нашему поиску простой настройки сайта и сравним ее рядом с более подробным (и более гибким) аналогом xPDO:

```php
echo $modx->getOption('site_name');
// prints the same thing as this:
$setting = $modx->getObject('modSystemSetting', 'site_name');
if ($setting) {
    echo $setting->get('value');
}
```

Разница в том, что использование **getObject** извлекает объект из базы данных без кэширования, и мы можем делать с объектом гораздо больше вещей, включая сохранение этого объекта. Итак, вот как мы должны получить и сохранить настройки системы:

```php
$setting = $modx->getObject('modSystemSetting', 'site_name');
$setting->set('value', 'My New Site Name');
$setting->save();
```

Однако обратите внимание, что это не очищает кэш настроек, поэтому любые последующие вызовы **getOption** по-прежнему будут возвращать более старую кешированную версию настройки.

Чтобы исправить это в MODX, вы должны очистить кеш. По крайней мере, кэш system_settings, но если вы используете значение параметра во сниппете или другой код, влияющий на интерфейс, кеш ресурсов тоже:

```php
$cacheRefreshOptions =  [
    'system_settings' => [],
    'resource' => [],
];
$modx->cacheManager->refresh($cacheRefreshOptions);
```

В WordPress сопоставимая функция API **update_option()**.

### Получение метаданных настроек

Как только мы начнем извлекать _Objects_, которые представляют системные настройки, а не только их значение, мы можем увидеть все метаданные для любого заданного параметра (то есть все атрибуты). Посмотрите на этот код в качестве примера:

```php
$Setting = $modx->getObject('modSystemSetting', 'site_name');
print_r( $Setting->toArray() );
/*
prints out something like this:
Array (
        [key] => site_name
        [value] => My Skiphop Site
        [xtype] => textfield
        [namespace] => core
        [area] => site
        [editedon] => 2010-10-24 21:53:55
)
*/
```

Как только вы поймете, как манипулировать объектами с помощью MODX и xPDO, вы сможете извлекать и изменять практически все внутри MODX, потому что практически все является объектом.

## Получение списка связанных настроек

Если вы заметили в графическом интерфейсе выше, MODX позволяет несколько логично сгруппировать настройки системы. Самые полезные группировки - это **area** и префикс **key**. Использование xPDO [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") Метод, мы можем легко предоставить некоторые критерии поиска, чтобы получить настройки, которые мы хотим.

Вот как мы можем получить все настройки из области «Почта»:

```php
$relatedSettings = $modx->getCollection('modSystemSetting', array('area'=>'Mail'));
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

Это естественным образом приводит нас к одной из других особенностей xPDO: [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") объект. Мы можем использовать его для передачи более сложных критериев нашему **вызову getCollection**. Вот как мы можем получить все настройки, которые используют префикс «quip»:

```php
$query = $modx->newQuery('modSystemSetting');
$query->where(array('key:LIKE' => 'quip.%') );
$relatedSettings = $modx->getCollection('modSystemSetting', $query);
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

Возможно, вы не ожидали введения в xPDO, пока вы просто пытались получить и установить системные настройки, но он там.

## Создание системной настройки программно

Возможно, вы захотите создать Системные настройки программно, чтобы предоставить вашим пользователям более чистый UX / UI. В своем коде вы можете поместить что-то вроде следующего:

```php
$MySetting = $modx->newObject('modSystemSetting');
$MySetting->set('key', 'mykey');
$MySetting->set('value', 'my_value');
$MySetting->set('xtype', 'textfield');
$MySetting->set('namespace', 'my_namespace');
$MySetting->set('area', 'MyArea');
$MySetting->save();
// Clear the cache:
$cacheRefreshOptions =  array( 'system_settings' => array() );
$modx->cacheManager->refresh($cacheRefreshOptions);
```

Обратите внимание, что вы должны создать записи лексики, которые соответствуют вашему имени ключа (см. Раздел «Локализация» выше):

-   Имя: `setting_` + _Key_
-   Описание: `setting_` + _Key_ + `_desc`

Таким образом, в этом примере вам необходимо добавить следующие записи лексикона в загруженный вами лексикон:

```php
$_lang['setting_mykey'] = 'Имя моей настройки';
$_lang['setting_mykey_desc'] = 'Описание моего ключа';
```

MODX заполняет значения для имени и описания на основе этих записей лексики.

Может оказаться полезным ссылаться на ваши локализованные языковые строки внутри ваших шаблонов или CMP. Это можно сделать с помощью тега лексикона, но вы должны указать тему «setting», например,

```php
[[!%setting_emailsender? &topic=`setting` &namespace=`core` &language=`en`]]
```

## Типы системных настроек

Атрибут **xtype** определяет, какой тип поля GUI будет использовать при рендеринге интерфейса для этого поля:

-   **combo-boolean** : сохраненные значения 1 и 0. Будет отображать «Да» и «Нет»
-   **textfield** : стандартное текстовое поле
-   **textarea** : стандартная текстовая область
-   **text-password** : стандартное поле пароля (ввод маскируется)
-   **numberfield** : используется для ввода цифр
-   **modx-combo-language** : позволяет пользователю выбрать язык
-   **modx-combo-source** :
-   **modx-combo-template** : позволяет пользователю выбрать шаблон
-   **modx-combo-content-type** : позволяет пользователю выбрать тип контента
-   **modx-combo-charset** : позволяет пользователю выбрать набор символов
-   **modx-combo-rte** : как текстовая область, но с элементами управления форматированием
-   **modx-combo-context** : позволяет пользователю выбрать контекст
-   **modx-combo-manager-theme** : позволяет пользователю выбрать тему оформления интерфейса менеджера MODX

## Список настроек

Описание каждого параметра следующее:

1. [access_category_enabled](building-sites/settings/access_category_enabled)
1. [access_context_enabled](building-sites/settings/access_context_enabled)
1. [access_resource_group_enabled](building-sites/settings/access_resource_group_enabled)
1. [allow_duplicate_alias](building-sites/settings/allow_duplicate_alias)
1. [allow_forward_across_contexts](building-sites/settings/allow_forward_across_contexts)
1. [allow_manager_login_forgot_password](building-sites/settings/allow_manager_login_forgot_password)
1. [allow_multiple_emails](building-sites/settings/allow_multiple_emails)
1. [allow_tags_in_post](building-sites/settings/allow_tags_in_post)
1. [allow_tv_eval](building-sites/settings/allow_tv_eval)
1. [anonymous_sessions](building-sites/settings/anonymous_sessions)
1. [archive_with](building-sites/settings/archive_with)
1. [automatic_alias](building-sites/settings/automatic_alias)
1. [automatic_template_assignment](building-sites/settings/automatic_template_assignment)
1. [auto_check_pkg_updates](building-sites/settings/auto_check_pkg_updates)
1. [auto_check_pkg_updates_cache_expire](building-sites/settings/auto_check_pkg_updates_cache_expire)
1. [auto_isfolder](building-sites/settings/auto_isfolder)
1. [auto_menuindex](building-sites/settings/auto_menuindex)
1. [base_help_url](building-sites/settings/base_help_url)
1. [blocked_minutes](building-sites/settings/blocked_minutes)
1. [cache_action_map](building-sites/settings/cache_action_map)
1. [cache_alias_map](building-sites/settings/cache_alias_map)
1. [cache_context_settings](building-sites/settings/cache_context_settings)
1. [cache_db](building-sites/settings/cache_db)
1. [cache_db_expires](building-sites/settings/cache_db_expires)
1. [cache_db_session](building-sites/settings/cache_db_session)
1. [cache_db_session_lifetime](building-sites/settings/cache_db_session_lifetime)
1. [cache_default](building-sites/settings/cache_default)
1. [cache_disabled](building-sites/settings/cache_disabled)
1. [cache_format](building-sites/settings/cache_format)
1. [cache_handler](building-sites/settings/cache_handler)
1. [cache_json](building-sites/settings/cache_json)
1. [cache_json_expires](building-sites/settings/cache_json_expires)
1. [cache_lang_js](building-sites/settings/cache_lang_js)
1. [cache_lexicon_topics](building-sites/settings/cache_lexicon_topics)
1. [cache_noncore_lexicon_topics](building-sites/settings/cache_noncore_lexicon_topics)
1. [cache_resource](building-sites/settings/cache_resource)
1. [cache_resource_clear_partial](building-sites/settings/cache_resource_clear_partial)
1. [cache_resource_expires](building-sites/settings/cache_resource_expires)
1. [cache_scripts](building-sites/settings/cache_scripts)
1. [cache_system_settings](building-sites/settings/cache_system_settings)
1. [clear_cache_refresh_trees](building-sites/settings/clear_cache_refresh_trees)
1. [compress_css](building-sites/settings/compress_css)
1. [compress_js](building-sites/settings/compress_js)
1. [compress_js_groups](building-sites/settings/compress_js_groups)
1. [compress_js_max_files](building-sites/settings/compress_js_max_files)
1. [concat_js](building-sites/settings/concat_js)
1. [confirm_navigation](building-sites/settings/confirm_navigation)
1. [container_suffix](building-sites/settings/container_suffix)
1. [context_tree_sortby](building-sites/settings/context_tree_sortby)
1. [context_tree_sortdir](building-sites/settings/context_tree_sortdir)
1. [context_tree_sort](building-sites/settings/context_tree_default_sort)
1. [context_tree_sort](building-sites/settings/context_tree_sort)
1. [cultureKey](building-sites/settings/culturekey)
1. [custom_resource_classes](building-sites/settings/custom_resource_classes)
1. [date_timezone](building-sites/settings/date_timezone)
1. [debug](building-sites/settings/debug)
1. [default_content_type](building-sites/settings/default_content_type)
1. [default_context](building-sites/settings/default_context)
1. [default_duplicate_publish_option](building-sites/settings/default_duplicate_publish_option)
1. [default_media_source](building-sites/settings/default_media_source)
1. [default_media_source_type](building-sites/settings/default_media_source_type)
1. [default_per_page](building-sites/settings/default_per_page)
1. [default_template](building-sites/settings/default_template)
1. [default_username](building-sites/settings/default_username)
1. [editor_css_path](building-sites/settings/editor_css_path)
1. [editor_css_selectors](building-sites/settings/editor_css_selectors)
1. [emailsender](building-sites/settings/emailsender)
1. [emailsubject](building-sites/settings/emailsubject)
1. [enable_dragdrop](building-sites/settings/enable_dragdrop)
1. [enable_gravatar](building-sites/settings/enable_gravatar)
1. [error_log_filename](building-sites/settings/error_log_filename)
1. [error_log_filepath](building-sites/settings/error_log_filepath)
1. [error_page](building-sites/settings/error_page)
1. [extension_packages](building-sites/settings/extension_packages)
1. [failed_login_attempts](building-sites/settings/failed_login_attempts)
1. [feed_modx_news](building-sites/settings/feed_modx_news)
1. [feed_modx_news_enabled](building-sites/settings/feed_modx_news_enabled)
1. [feed_modx_security](building-sites/settings/feed_modx_security)
1. [feed_modx_security_enabled](building-sites/settings/feed_modx_security_enabled)
1. [fe_editor_lang](building-sites/settings/fe_editor_lang)
1. [filemanager_path](building-sites/settings/filemanager_path)
1. [filemanager_path_relative](building-sites/settings/filemanager_path_relative)
1. [filemanager_url](building-sites/settings/filemanager_url)
1. [filemanager_url_relative](building-sites/settings/filemanager_url_relative)
1. [forgot_login_email](building-sites/settings/forgot_login_email)
1. [form_customization_use_all_groups](building-sites/settings/form_customization_use_all_groups)
1. [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
1. [friendly_alias_lowercase_only](building-sites/settings/friendly_alias_lowercase_only)
1. [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length)
1. [friendly_alias_realtime](building-sites/settings/friendly_alias_realtime)
1. [friendly_alias_restrict_chars](building-sites/settings/friendly_alias_restrict_chars)
1. [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
1. [friendly_alias_strip_element_tags](building-sites/settings/friendly_alias_strip_element_tags)
1. [friendly_alias_translit](building-sites/settings/friendly_alias_translit)
1. [friendly_alias_translit_class](building-sites/settings/friendly_alias_translit_class)
1. [friendly_alias_translit_class_path](building-sites/settings/friendly_alias_translit_class_path)
1. [friendly_alias_trim_chars](building-sites/settings/friendly_alias_trim_chars)
1. [friendly_alias_urls](building-sites/settings/friendly_alias_urls)
1. [friendly_alias_word_delimiters](building-sites/settings/friendly_alias_word_delimiters)
1. [friendly_alias_word_delimiter](building-sites/settings/friendly_alias_word_delimiter)
1. [friendly_urls](building-sites/settings/friendly_urls)
1. [friendly_urls_strict](building-sites/settings/friendly_urls_strict)
1. [friendly_url_prefix](building-sites/settings/friendly_url_prefix)
1. [friendly_url_suffix](building-sites/settings/friendly_url_suffix)
1. [global_duplicate_uri_check](building-sites/settings/global_duplicate_uri_check)
1. [hidemenu_default](building-sites/settings/hidemenu_default)
1. [inherit_parent_template](building-sites/settings/inherit_parent_template)
1. [link_tag_scheme](building-sites/settings/link_tag_scheme)
1. [locale](building-sites/settings/locale)
1. [lock_ttl](building-sites/settings/lock_ttl)
1. [log_deprecated](building-sites/settings/log_deprecated)
1. [log_level](building-sites/settings/log_level)
1. [log_snippet_not_found](building-sites/settings/log_snippet_not_found)
1. [log_target](building-sites/settings/log_target)
1. [mail_charset](building-sites/settings/mail_charset)
1. [mail_encoding](building-sites/settings/mail_encoding)
1. [mail_smtp_auth](building-sites/settings/mail_smtp_auth)
1. [mail_smtp_autotls](building-sites/settings/mail_smtp_autotls)
1. [mail_smtp_helo](building-sites/settings/mail_smtp_helo)
1. [mail_smtp_hosts](building-sites/settings/mail_smtp_hosts)
1. [mail_smtp_keepalive](building-sites/settings/mail_smtp_keepalive)
1. [mail_smtp_pass](building-sites/settings/mail_smtp_pass)
1. [mail_smtp_port](building-sites/settings/mail_smtp_port)
1. [mail_smtp_prefix](building-sites/settings/mail_smtp_prefix)
1. [mail_smtp_single_to](building-sites/settings/mail_smtp_single_to)
1. [mail_smtp_timeout](building-sites/settings/mail_smtp_timeout)
1. [mail_smtp_user](building-sites/settings/mail_smtp_user)
1. [mail_use_smtp](building-sites/settings/mail_use_smtp)
1. [main_nav_parent](building-sites/settings/main_nav_parent)
1. [manager_date_format](building-sites/settings/manager_date_format)
1. [manager_direction](building-sites/settings/manager_direction)
1. [manager_favicon_url](building-sites/settings/manager_favicon_url)
1. [manager_html5_cache](building-sites/settings/manager_html5_cache)
1. [manager_js_cache_file_locking](building-sites/settings/manager_js_cache_file_locking)
1. [manager_js_cache_max_age](building-sites/settings/manager_js_cache_max_age)
1. [manager_js_document_root](building-sites/settings/manager_js_document_root)
1. [manager_js_zlib_output_compression](building-sites/settings/manager_js_zlib_output_compression)
1. [manager_language](building-sites/settings/manager_language)
1. [manager_lang_attribute](building-sites/settings/manager_lang_attribute)
1. [manager_login_url_alternate](building-sites/settings/manager_login_url_alternate)
1. [manager_theme](building-sites/settings/manager_theme)
1. [manager_time_format](building-sites/settings/manager_time_format)
1. [manager_use_fullname](building-sites/settings/manager_use_fullname)
1. [manager_week_start](building-sites/settings/manager_week_start)
1. [mgr_source_icon](building-sites/settings/mgr_source_icon)
1. [mgr_tree_icon_context](building-sites/settings/mgr_tree_icon_context)
1. [modx_browser_default_sort](building-sites/settings/modx_browser_default_sort)
1. [modx_browser_default_viewmode](building-sites/settings/modx_browser_default_viewmode)
1. [modx_browser_tree_hide_files](building-sites/settings/modx_browser_tree_hide_files)
1. [modx_browser_tree_hide_tooltips](building-sites/settings/modx_browser_tree_hide_tooltips)
1. [modx_charset](building-sites/settings/modx_charset)
1. [new_file_permissions](building-sites/settings/new_file_permissions)
1. [new_folder_permissions](building-sites/settings/new_folder_permissions)
1. [parser_recurse_uncacheable](building-sites/settings/parser_recurse_uncacheable)
1. [password_generated_length](building-sites/settings/password_generated_length)
1. [password_min_length](building-sites/settings/password_min_length)
1. [phpthumb_allow_src_above_docroot](building-sites/settings/phpthumb_allow_src_above_docroot)
1. [phpthumb_cache_maxage](building-sites/settings/phpthumb_cache_maxage)
1. [phpthumb_cache_maxfiles](building-sites/settings/phpthumb_cache_maxfiles)
1. [phpthumb_cache_maxsize](building-sites/settings/phpthumb_cache_maxsize)
1. [phpthumb_cache_source_enabled](building-sites/settings/phpthumb_cache_source_enabled)
1. [phpthumb_document_root](building-sites/settings/phpthumb_document_root)
1. [phpthumb_error_bgcolor](building-sites/settings/phpthumb_error_bgcolor)
1. [phpthumb_error_fontsize](building-sites/settings/phpthumb_error_fontsize)
1. [phpthumb_error_textcolor](building-sites/settings/phpthumb_error_textcolor)
1. [phpthumb_far](building-sites/settings/phpthumb_far)
1. [phpthumb_imagemagick_path](building-sites/settings/phpthumb_imagemagick_path)
1. [phpthumb_nohotlink_enabled](building-sites/settings/phpthumb_nohotlink_enabled)
1. [phpthumb_nohotlink_erase_image](building-sites/settings/phpthumb_nohotlink_erase_image)
1. [phpthumb_nohotlink_text_message](building-sites/settings/phpthumb_nohotlink_text_message)
1. [phpthumb_nohotlink_valid_domains](building-sites/settings/phpthumb_nohotlink_valid_domains)
1. [phpthumb_nooffsitelink_enabled](building-sites/settings/phpthumb_nooffsitelink_enabled)
1. [phpthumb_nooffsitelink_erase_image](building-sites/settings/phpthumb_nooffsitelink_erase_image)
1. [phpthumb_nooffsitelink_require_refer](building-sites/settings/phpthumb_nooffsitelink_require_refer)
1. [phpthumb_nooffsitelink_text_message](building-sites/settings/phpthumb_nooffsitelink_text_message)
1. [phpthumb_nooffsitelink_valid_domains](building-sites/settings/phpthumb_nooffsitelink_valid_domains)
1. [phpthumb_nooffsitelink_watermark_src](building-sites/settings/phpthumb_nooffsitelink_watermark_src)
1. [phpthumb_zoomcrop](building-sites/settings/phpthumb_zoomcrop)
1. [preserve_menuindex](building-sites/settings/preserve_menuindex)
1. [principal_targets](building-sites/settings/principal_targets)
1. [proxy_auth_type](building-sites/settings/proxy_auth_type)
1. [proxy_host](building-sites/settings/proxy_host)
1. [proxy_password](building-sites/settings/proxy_password)
1. [proxy_port](building-sites/settings/proxy_port)
1. [proxy_username](building-sites/settings/proxy_username)
1. [publish_default](building-sites/settings/publish_default)
1. [rb_base_dir](building-sites/settings/rb_base_dir)
1. [rb_base_url](building-sites/settings/rb_base_url)
1. [request_controller](building-sites/settings/request_controller)
1. [request_method_strict](building-sites/settings/request_method_strict)
1. [request_param_alias](building-sites/settings/request_param_alias)
1. [request_param_id](building-sites/settings/request_param_id)
1. [resource_tree_node_name](building-sites/settings/resource_tree_node_name)
1. [resource_tree_node_name_fallback](building-sites/settings/resource_tree_node_name_fallback)
1. [resource_tree_node_tooltip](building-sites/settings/resource_tree_node_tooltip)
1. [richtext_default](building-sites/settings/richtext_default)
1. [search_default](building-sites/settings/search_default)
1. [send_poweredby_header](building-sites/settings/send_poweredby_header)
1. [server_offset_time](building-sites/settings/server_offset_time)
1. [server_protocol](building-sites/settings/server_protocol)
1. [session_cookie_domain](building-sites/settings/session_cookie_domain)
1. [session_cookie_httponly](building-sites/settings/session_cookie_httponly)
1. [session_cookie_lifetime](building-sites/settings/session_cookie_lifetime)
1. [session_cookie_path](building-sites/settings/session_cookie_path)
1. [session_cookie_secure](building-sites/settings/session_cookie_secure)
1. [session_enabled](building-sites/settings/session_enabled)
1. [session_gc_maxlifetime](building-sites/settings/session_gc_maxlifetime)
1. [session_handler_class](building-sites/settings/session_handler_class)
1. [session_name](building-sites/settings/session_name)
1. [settings_version](building-sites/settings/settings_version)
1. [setting_static_elements_basepath](building-sites/settings/setting_static_elements_basepath)
1. [show_tv_categories_header](building-sites/settings/show_tv_categories_header)
1. [signupemail_message](building-sites/settings/signupemail_message)
1. [site_name](building-sites/settings/site_name)
1. [site_start](building-sites/settings/site_start)
1. [site_status](building-sites/settings/site_status)
1. [site_unavailable_message](building-sites/settings/site_unavailable_message)
1. [site_unavailable_page](building-sites/settings/site_unavailable_page)
1. [static_elements_automate_chunks](building-sites/settings/static_elements_automate_chunks)
1. [static_elements_automate_plugins](building-sites/settings/static_elements_automate_plugins)
1. [static_elements_automate_snippets](building-sites/settings/static_elements_automate_snippets)
1. [static_elements_automate_templates](building-sites/settings/static_elements_automate_templates)
1. [static_elements_automate_tvs](building-sites/settings/static_elements_automate_tvs)
1. [static_elements_basepath](building-sites/settings/static_elements_basepath)
1. [static_elements_default_category](building-sites/settings/static_elements_default_category)
1. [static_elements_default_mediasource](building-sites/settings/static_elements_default_mediasource)
1. [strip_image_paths](building-sites/settings/strip_image_paths)
1. [symlink_merge_fields](building-sites/settings/symlink_merge_fields)
1. [syncsite_default](building-sites/settings/syncsite_default)
1. [tree_default_sort](building-sites/settings/tree_default_sort)
1. [tree_root_id](building-sites/settings/tree_root_id)
1. [tvs_below_content](building-sites/settings/tvs_below_content)
1. [udperms_allowroot](building-sites/settings/udperms_allowroot)
1. [ui_debug_mode](building-sites/settings/ui_debug_mode)
1. [unauthorized_page](building-sites/settings/unauthorized_page)
1. [upload_files](building-sites/settings/upload_files)
1. [upload_maxsize](building-sites/settings/upload_maxsize)
1. [user_nav_parent](building-sites/settings/user_nav_parent)
1. [use_alias_path](building-sites/settings/use_alias_path)
1. [use_browser](building-sites/settings/use_browser)
1. [use_context_resource_table](building-sites/settings/use_context_resource_table)
1. [use_editor](building-sites/settings/use_editor)
1. [use_frozen_parent_uris](building-sites/settings/use_frozen_parent_uris)
1. [use_multibyte](building-sites/settings/use_multibyte)
1. [use_weblink_target](building-sites/settings/use_weblink_target)
1. [welcome_action](building-sites/settings/welcome_action)
1. [welcome_namespace](building-sites/settings/welcome_namespace)
1. [welcome_screen](building-sites/settings/welcome_screen)
1. [welcome_screen_url](building-sites/settings/welcome_screen_url)
1. [which_editor](building-sites/settings/which_editor)
1. [which_element_editor](building-sites/settings/which_element_editor)
1. [xhtml_urls](building-sites/settings/xhtml_urls)