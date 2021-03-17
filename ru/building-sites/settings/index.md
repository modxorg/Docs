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
$_lang['setting_mykey'] = 'Name of My Setting';
$_lang['setting_mykey_desc'] = 'Description of my key';
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

## Список настроек

Описание каждого параметра следующее:

1. [access_category_enabled](building-sites/settings/access_category_enabled)
2. [access_context_enabled](building-sites/settings/access_context_enabled)
3. [access_resource_group_enabled](building-sites/settings/access_resource_group_enabled)
4. [allow_duplicate_alias](building-sites/settings/allow_duplicate_alias)
5. [allow_forward_across_contexts](building-sites/settings/allow_forward_across_contexts)
6. [allow_multiple_emails](building-sites/settings/allow_multiple_emails)
7. [allow_tags_in_post](building-sites/settings/allow_tags_in_post)
8. [archive_with](building-sites/settings/archive_with)
9. [auto_check_pkg_updates](building-sites/settings/auto_check_pkg_updates)
10. [auto_check_pkg_updates_cache_expire](building-sites/settings/auto_check_pkg_updates_cache_expire)
11. [auto_menuindex](building-sites/settings/auto_menuindex)
12. [automatic_alias](building-sites/settings/automatic_alias)
13. [base_help_url](building-sites/settings/base_help_url)
14. [blocked_minutes](building-sites/settings/blocked_minutes)
15. [cache_action_map](building-sites/settings/cache_action_map)
16. [cache_context_settings](building-sites/settings/cache_context_settings)
17. [cache_db](building-sites/settings/cache_db)
18. [cache_db_expires](building-sites/settings/cache_db_expires)
19. [cache_db_session](building-sites/settings/cache_db_session)
20. [cache_default](building-sites/settings/cache_default)
21. [cache_disabled](building-sites/settings/cache_disabled)
22. [cache_format](building-sites/settings/cache_format)
23. [cache_handler](building-sites/settings/cache_handler)
24. [cache_json](building-sites/settings/cache_json)
25. [cache_json_expires](building-sites/settings/cache_json_expires)
26. [cache_lang_js](building-sites/settings/cache_lang_js)
27. [cache_lexicon_topics](building-sites/settings/cache_lexicon_topics)
28. [cache_noncore_lexicon_topics](building-sites/settings/cache_noncore_lexicon_topics)
29. [cache_resource](building-sites/settings/cache_resource)
30. [cache_resource_expires](building-sites/settings/cache_resource_expires)
31. [cache_scripts](building-sites/settings/cache_scripts)
32. [cache_system_settings](building-sites/settings/cache_system_settings)
33. [clear_cache_refresh_trees](building-sites/settings/clear_cache_refresh_trees)
34. [compress_css](building-sites/settings/compress_css)
35. [compress_js](building-sites/settings/compress_js)
36. [context_tree_sort](building-sites/settings/context_tree_default_sort)
37. [context_tree_sortby](building-sites/settings/context_tree_sortby)
38. [context_tree_sortdir](building-sites/settings/context_tree_sortdir)
39. [concat_js](building-sites/settings/concat_js)
40. [container_suffix](building-sites/settings/container_suffix)
41. [cultureKey](building-sites/settings/culturekey)
42. [custom_resource_classes](building-sites/settings/custom_resource_classes)
43. [default_per_page](building-sites/settings/default_per_page)
44. [default_template](building-sites/settings/default_template)
45. [editor_css_path](building-sites/settings/editor_css_path)
46. [editor_css_selectors](building-sites/settings/editor_css_selectors)
47. [emailsender](building-sites/settings/emailsender)
48. [emailsubject](building-sites/settings/emailsubject)
49. [enable_dragdrop](building-sites/settings/enable_dragdrop)
50. [error_page](building-sites/settings/error_page)
51. [extension_packages](building-sites/settings/extension_packages)
52. [failed_login_attempts](building-sites/settings/failed_login_attempts)
53. [fe_editor_lang](building-sites/settings/fe_editor_lang)
54. [feed_modx_news](building-sites/settings/feed_modx_news)
55. [feed_modx_news_enabled](building-sites/settings/feed_modx_news_enabled)
56. [feed_modx_security](building-sites/settings/feed_modx_security)
57. [feed_modx_security_enabled](building-sites/settings/feed_modx_security_enabled)
58. [filemanager_path](building-sites/settings/filemanager_path)
59. [filemanager_path_relative](building-sites/settings/filemanager_path_relative)
60. [filemanager_url](building-sites/settings/filemanager_url)
61. [filemanager_url_relative](building-sites/settings/filemanager_url_relative)
62. [forgot_login_email](building-sites/settings/forgot_login_email)
63. [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
64. [friendly_alias_lowercase_only](building-sites/settings/friendly_alias_lowercase_only)
65. [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length)
66. [friendly_alias_restrict_chars](building-sites/settings/friendly_alias_restrict_chars)
67. [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
68. [friendly_alias_strip_element_tags](building-sites/settings/friendly_alias_strip_element_tags)
69. [friendly_alias_translit](building-sites/settings/friendly_alias_translit)
70. [friendly_alias_translit_class](building-sites/settings/friendly_alias_translit_class)
71. [friendly_alias_translit_class_path](building-sites/settings/friendly_alias_translit_class_path)
72. [friendly_alias_trim_chars](building-sites/settings/friendly_alias_trim_chars)
73. [friendly_alias_urls](building-sites/settings/friendly_alias_urls)
74. [friendly_alias_word_delimiter](building-sites/settings/friendly_alias_word_delimiter)
75. [friendly_alias_word_delimiters](building-sites/settings/friendly_alias_word_delimiters)
76. [friendly_url_prefix](building-sites/settings/friendly_url_prefix)
77. [friendly_url_suffix](building-sites/settings/friendly_url_suffix)
78. [friendly_urls](building-sites/settings/friendly_urls)
79. [global_duplicate_uri_check](building-sites/settings/global_duplicate_uri_check)
80. [hidemenu_default](building-sites/settings/hidemenu_default)
81. [link_tag_scheme](building-sites/settings/link_tag_scheme)
82. [mail_charset](building-sites/settings/mail_charset)
83. [mail_encoding](building-sites/settings/mail_encoding)
84. [mail_smtp_auth](building-sites/settings/mail_smtp_auth)
85. [mail_smtp_helo](building-sites/settings/mail_smtp_helo)
86. [mail_smtp_hosts](building-sites/settings/mail_smtp_hosts)
87. [mail_smtp_keepalive](building-sites/settings/mail_smtp_keepalive)
88. [mail_smtp_pass](building-sites/settings/mail_smtp_pass)
89. [mail_smtp_port](building-sites/settings/mail_smtp_port)
90. [mail_smtp_prefix](building-sites/settings/mail_smtp_prefix)
91. [mail_smtp_single_to](building-sites/settings/mail_smtp_single_to)
92. [mail_smtp_timeout](building-sites/settings/mail_smtp_timeout)
93. [mail_smtp_user](building-sites/settings/mail_smtp_user)
94. [mail_use_smtp](building-sites/settings/mail_use_smtp)
95. [manager_date_format](building-sites/settings/manager_date_format)
96. [manager_direction](building-sites/settings/manager_direction)
97. [manager_favicon_url](building-sites/settings/manager_favicon_url)
98. [manager_lang_attribute](building-sites/settings/manager_lang_attribute)
99. [manager_language](building-sites/settings/manager_language)
100. [manager_theme](building-sites/settings/manager_theme)
101. [manager_time_format](building-sites/settings/manager_time_format)
102. [modx_charset](building-sites/settings/modx_charset)
103. [new_file_permissions](building-sites/settings/new_file_permissions)
104. [new_folder_permissions](building-sites/settings/new_folder_permissions)
105. [password_generated_length](building-sites/settings/password_generated_length)
106. [password_min_length](building-sites/settings/password_min_length)
107. [phpthumb_allow_src_above_docroot](building-sites/settings/phpthumb_allow_src_above_docroot)
108. [phpthumb_cache_maxage](building-sites/settings/phpthumb_cache_maxage)
109. [phpthumb_cache_maxfiles](building-sites/settings/phpthumb_cache_maxfiles)
110. [phpthumb_cache_maxsize](building-sites/settings/phpthumb_cache_maxsize)
111. [phpthumb_cache_source_enabled](building-sites/settings/phpthumb_cache_source_enabled)
112. [phpthumb_document_root](building-sites/settings/phpthumb_document_root)
113. [phpthumb_error_bgcolor](building-sites/settings/phpthumb_error_bgcolor)
114. [phpthumb_error_fontsize](building-sites/settings/phpthumb_error_fontsize)
115. [phpthumb_error_textcolor](building-sites/settings/phpthumb_error_textcolor)
116. [phpthumb_far](building-sites/settings/phpthumb_far)
117. [phpthumb_imagemagick_path](building-sites/settings/phpthumb_imagemagick_path)
118. [phpthumb_nohotlink_enabled](building-sites/settings/phpthumb_nohotlink_enabled)
119. [phpthumb_nohotlink_erase_image](building-sites/settings/phpthumb_nohotlink_erase_image)
120. [phpthumb_nohotlink_text_message](building-sites/settings/phpthumb_nohotlink_text_message)
121. [phpthumb_nohotlink_valid_domains](building-sites/settings/phpthumb_nohotlink_valid_domains)
122. [phpthumb_nooffsitelink_enabled](building-sites/settings/phpthumb_nooffsitelink_enabled)
123. [phpthumb_nooffsitelink_erase_image](building-sites/settings/phpthumb_nooffsitelink_erase_image)
124. [phpthumb_nooffsitelink_require_refer](building-sites/settings/phpthumb_nooffsitelink_require_refer)
125. [phpthumb_nooffsitelink_text_message](building-sites/settings/phpthumb_nooffsitelink_text_message)
126. [phpthumb_nooffsitelink_valid_domains](building-sites/settings/phpthumb_nooffsitelink_valid_domains)
127. [phpthumb_nooffsitelink_watermark_src](building-sites/settings/phpthumb_nooffsitelink_watermark_src)
128. [phpthumb_zoomcrop](building-sites/settings/phpthumb_zoomcrop)
129. [principal_targets](building-sites/settings/principal_targets)
130. [proxy_auth_type](building-sites/settings/proxy_auth_type)
131. [proxy_host](building-sites/settings/proxy_host)
132. [proxy_password](building-sites/settings/proxy_password)
133. [proxy_port](building-sites/settings/proxy_port)
134. [proxy_username](building-sites/settings/proxy_username)
135. [publish_default](building-sites/settings/publish_default)
136. [rb_base_dir](building-sites/settings/rb_base_dir)
137. [rb_base_url](building-sites/settings/rb_base_url)
138. [request_controller](building-sites/settings/request_controller)
139. [request_param_alias](building-sites/settings/request_param_alias)
140. [request_param_id](building-sites/settings/request_param_id)
141. [resource_tree_node_name](building-sites/settings/resource_tree_node_name)
142. [resource_tree_node_tooltip](building-sites/settings/resource_tree_node_tooltip)
143. [richtext_default](building-sites/settings/richtext_default)
144. [search_default](building-sites/settings/search_default)
145. [server_offset_time](building-sites/settings/server_offset_time)
146. [server_protocol](building-sites/settings/server_protocol)
147. [session_cookie_domain](building-sites/settings/session_cookie_domain)
148. [session_cookie_lifetime](building-sites/settings/session_cookie_lifetime)
149. [session_cookie_path](building-sites/settings/session_cookie_path)
150. [session_cookie_secure](building-sites/settings/session_cookie_secure)
151. [session_enabled](building-sites/settings/session_enabled)
152. [session_handler_class](building-sites/settings/session_handler_class)
153. [session_name](building-sites/settings/session_name)
154. [settings_version](building-sites/settings/settings_version)
155. [signupemail_message](building-sites/settings/signupemail_message)
156. [site_name](building-sites/settings/site_name)
157. [site_start](building-sites/settings/site_start)
158. [site_status](building-sites/settings/site_status)
159. [site_unavailable_message](building-sites/settings/site_unavailable_message)
160. [site_unavailable_page](building-sites/settings/site_unavailable_page)
161. [strip_image_paths](building-sites/settings/strip_image_paths)
162. [symlink_merge_fields](building-sites/settings/symlink_merge_fields)
163. [tree_default_sort](building-sites/settings/tree_default_sort)
164. [tree_root_id](building-sites/settings/tree_root_id)
165. [tvs_below_content](building-sites/settings/tvs_below_content)
166. [udperms_allowroot](building-sites/settings/udperms_allowroot)
167. [ui_debug_mode](building-sites/settings/ui_debug_mode)
168. [unauthorized_page](building-sites/settings/unauthorized_page)
169. [upload_maxsize](building-sites/settings/upload_maxsize)
170. [use_alias_path](building-sites/settings/use_alias_path)
171. [use_browser](building-sites/settings/use_browser)
172. [use_editor](building-sites/settings/use_editor)
173. [use_multibyte](building-sites/settings/use_multibyte)
174. [welcome_screen](building-sites/settings/welcome_screen)
175. [which_editor](building-sites/settings/which_editor)
176. [which_element_editor](building-sites/settings/which_element_editor)
177. [xhtml_urls](building-sites/settings/xhtml_urls)