---
title: "Системные настройки"
translation: "building-sites/settings/"
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

![](/2.x/en/building-sites/settings/system+settings+annotated.png)

### Параметры

- Ключ: в конечном итоге это уникальное имя вашего `[[++placeholder]]`
- Имя: эта метка отображается в столбце «Имя» при просмотре всех настроек системы. Это значение может быть локализовано (см. Ниже).
- Тип поля: в настоящее время поддерживаются 3 типа ввода: TextField, TextArea, Yes/No
- Пространство имен: как с [Пользовательские страницы менеджера](extending-modx/custom-manager-pages "Пользовательские страницы менеджера"), пространство имен определяет папку внутри core/components/.
- Area Lexicon Entry: это значение влияет на группировку системных настроек; создайте несколько системных настроек, которые совместно используют «Область ввода лексики», и они будут сгруппированы вместе.
- Значение: значение по умолчанию.
- Описание: это значение может быть локализовано (см. Ниже).

### Локализация

Значения, используемые для описания настроек системы, могут быть необязательно локализованы (т.е. переведены) путем ссылки на конкретный файл локализации. Ключи лексики следуют определенному формату:

- Имя: `setting_` + _Key_
- Описание: `setting_` + _Key_ + `_desc`

Например, если мы посмотрим на Quip's `[[++quip.emailsFrom]]` настройки, мы видим, что он использует пространство имен **quip**. Ожидаемая структура папок состоит в том, чтобы искать файлы локализации в папке пространства имен, затем в папке «лексикона», затем в папках, разделенных по языковым кодам, и затем в **default.inc.php** файле, для примера **core/components/quip/lexicon/en/default.inc.php**

В нашем примере Quip мы видим имя _setting\_quip.emailsFrom_ и описание _setting\_quip.emailsFrom\_desc_. Эти два значения соответствуют ключам в **$\_lang** массив внутри **default.inc.php**:

 ``` php
$_lang['setting_quip.emailsFrom'] = 'From Email';
$_lang['setting_quip.emailsFrom_desc'] = 'The email address to send system emails from.';
```

Мы рекомендуем вам щелкнуть правой кнопкой мыши существующий системный параметр и выбрать «Обновить системный параметр», чтобы получить представление о том, как это работает.

### Получение настроек системы (программно)

Чтобы получить значение настройки из фрагмента, плагина или другого PHP-кода, вы используете [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") функции и передачи ей уникальный ключ для опции, например:

 ``` php
$siteStartId = $modx->getOption('site_start');
```

В WordPress сопоставимая функция API **get_option()**.

Эта функция извлекает значение из кэша настроек.

### Сохранение настроек системы (программно)

Здесь все становится немного сложнее: когда мы получаем значение, используя [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption"), мы получаем объект из кэша настроек. Это имеет явное преимущество в скорости, но это означает, что у нас по существу есть копия значения настройки, доступная только для чтения.

Пока есть метод setOption; это только обновляет кэш настроек в памяти.

Это по архитектурным причинам: системные настройки должны быть определены как _configurations_, **NOT runtime dynamic values**. Они обычно устанавливаются во время установки, а затем не часто обновляются. Однако могут быть законные времена, когда вам нужно обновить системные настройки программно, например, возможно, вы написали [Пользовательская страница менеджера](extending-modx/custom-manager-pages "Пользовательские страницы менеджеры - Руководство") которая предлагает настраиваемую форму для ваших пользователей для своих системных настроек.

Если мы хотим обновить настройки системы, мы используем мощный xPDO [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") функция. Итак, давайте вернемся к нашему поиску простой настройки сайта и сравним ее рядом с более подробным (и более гибким) аналогом xPDO:

 ``` php
echo $modx->getOption('site_name');
// prints the same thing as this:
$setting = $modx->getObject('modSystemSetting', 'site_name');
if ($setting) {
    echo $setting->get('value');
}
```

Разница в том, что использование **getObject** извлекает объект из базы данных без кэширования, и мы можем делать с объектом гораздо больше вещей, включая сохранение этого объекта. Итак, вот как мы должны получить и сохранить настройки системы:

 ``` php
$setting = $modx->getObject('modSystemSetting', 'site_name');
$setting->set('value', 'My New Site Name');
$setting->save();
```

Однако обратите внимание, что это не очищает кэш настроек, поэтому любые последующие вызовы **getOption** по-прежнему будут возвращать более старую кешированную версию настройки.

Чтобы исправить это в MODX, вы должны очистить кеш. По крайней мере, кэш system_settings, но если вы используете значение параметра во фрагменте или другой код, влияющий на интерфейс, кеш ресурсов тоже:

``` php
$cacheRefreshOptions =  [
    'system_settings' => [],
    'resource' => [],
];
$modx->cacheManager->refresh($cacheRefreshOptions);
```

В WordPress сопоставимая функция API **update\_option()**.

### Получение метаданных настроек

Как только мы начнем извлекать _Objects_, которые представляют системные настройки, а не только их значение, мы можем увидеть все метаданные для любого заданного параметра (то есть все атрибуты). Посмотрите на этот код в качестве примера:

 ``` php
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

 ``` php
$relatedSettings = $modx->getCollection('modSystemSetting', array('area'=>'Mail'));
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

Это естественным образом приводит нас к одной из других особенностей xPDO: [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") объект. Мы можем использовать его для передачи более сложных критериев нашему **вызову getCollection**. Вот как мы можем получить все настройки, которые используют префикс «quip»:

 ``` php
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

 ``` php
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

- Имя: `setting_` + _Key_
- Описание: `setting_` + _Key_ + `_desc`

Таким образом, в этом примере вам необходимо добавить следующие записи лексикона в загруженный вами лексикон:

``` php
$_lang['setting_mykey'] = 'Name of My Setting';
$_lang['setting_mykey_desc'] = 'Description of my key';
```

MODX заполняет значения для имени и описания на основе этих записей лексики.

Может оказаться полезным ссылаться на ваши локализованные языковые строки внутри ваших шаблонов или CMP. Это можно сделать с помощью тега лексикона, но вы должны указать тему «setting», например,

``` php
[[!%setting_emailsender? &topic=`setting` &namespace=`core` &language=`en`]]
```

## Типы системных настроек

Атрибут **xtype** определяет, какой тип поля GUI будет использовать при рендеринге интерфейса для этого поля:

- **combo-boolean** : сохраненные значения 1 и 0. Будет отображать «Да» и «Нет»
- **textfield** : стандартное текстовое поле
- **textarea** : стандартная текстовая область
- **text-password** : стандартное поле пароля (ввод маскируется)
- **numberfield** : используется для ввода цифр
- **modx-combo-language** : позволяет пользователю выбрать язык
- **modx-combo-source** :
- **modx-combo-template** : позволяет пользователю выбрать шаблон
- **modx-combo-content-type** : позволяет пользователю выбрать тип контента
- **modx-combo-charset** : позволяет пользователю выбрать набор символов
- **modx-combo-rte** : как текстовая область, но с элементами управления форматированием
- **modx-combo-context** : позволяет пользователю выбрать контекст

## Список настроек

Описание каждого параметра следующее:

1. [access\_category\_enabled](building-sites/settings/access_category_enabled)
2. [access\_context\_enabled](building-sites/settings/access_context_enabled)
3. [access\_resource\_group\_enabled](building-sites/settings/access_resource_group_enabled)
4. [allow\_duplicate\_alias](building-sites/settings/allow_duplicate_alias)
5. [allow\_forward\_across\_contexts](building-sites/settings/allow_forward_across_contexts)
6. [allow\_multiple\_emails](building-sites/settings/allow_multiple_emails)
7. [allow\_tags\_in\_post](building-sites/settings/allow_tags_in_post)
8. [archive\_with](building-sites/settings/archive_with)
9. [auto\_check\_pkg\_updates](building-sites/settings/auto_check_pkg_updates)
10. [auto\_check\_pkg\_updates\_cache\_expire](building-sites/settings/auto_check_pkg_updates_cache_expire)
11. [auto\_menuindex](building-sites/settings/auto_menuindex)
12. [automatic\_alias](building-sites/settings/automatic_alias)
13. [base\_help\_url](building-sites/settings/base_help_url)
14. [blocked\_minutes](building-sites/settings/blocked_minutes)
15. [cache\_action\_map](building-sites/settings/cache_action_map)
16. [cache\_context\_settings](building-sites/settings/cache_context_settings)
17. [cache\_db](building-sites/settings/cache_db)
18. [cache\_db\_expires](building-sites/settings/cache_db_expires)
19. [cache\_db\_session](building-sites/settings/cache_db_session)
20. [cache\_default](building-sites/settings/cache_default)
21. [cache\_disabled](building-sites/settings/cache_disabled)
22. [cache\_format](building-sites/settings/cache_format)
23. [cache\_handler](building-sites/settings/cache_handler)
24. [cache\_json](building-sites/settings/cache_json)
25. [cache\_json\_expires](building-sites/settings/cache_json_expires)
26. [cache\_lang\_js](building-sites/settings/cache_lang_js)
27. [cache\_lexicon\_topics](building-sites/settings/cache_lexicon_topics)
28. [cache\_noncore\_lexicon\_topics](building-sites/settings/cache_noncore_lexicon_topics)
29. [cache\_resource](building-sites/settings/cache_resource)
30. [cache\_resource\_expires](building-sites/settings/cache_resource_expires)
31. [cache\_scripts](building-sites/settings/cache_scripts)
32. [cache\_system\_settings](building-sites/settings/cache_system_settings)
33. [clear\_cache\_refresh\_trees](building-sites/settings/clear_cache_refresh_trees)
34. [compress\_css](building-sites/settings/compress_css)
35. [compress\_js](building-sites/settings/compress_js)
36. [context\_tree\_sort](building-sites/settings/context_tree_default_sort)
37. [context\_tree\_sortby](building-sites/settings/context_tree_sortby)
38. [context\_tree\_sortdir](building-sites/settings/context_tree_sortdir)
39. [concat\_js](building-sites/settings/concat_js)
40. [container\_suffix](building-sites/settings/container_suffix)
41. [cultureKey](building-sites/settings/culturekey)
42. [custom\_resource\_classes](building-sites/settings/custom_resource_classes)
43. [default\_per\_page](building-sites/settings/default_per_page)
44. [default\_template](building-sites/settings/default_template)
45. [editor\_css\_path](building-sites/settings/editor_css_path)
46. [editor\_css\_selectors](building-sites/settings/editor_css_selectors)
47. [emailsender](building-sites/settings/emailsender)
48. [emailsubject](building-sites/settings/emailsubject)
49. [enable\_dragdrop](building-sites/settings/enable_dragdrop)
50. [error\_page](building-sites/settings/error_page)
51. [extension\_packages](building-sites/settings/extension_packages)
52. [failed\_login\_attempts](building-sites/settings/failed_login_attempts)
53. [fe\_editor\_lang](building-sites/settings/fe_editor_lang)
54. [feed\_modx\_news](building-sites/settings/feed_modx_news)
55. [feed\_modx\_news\_enabled](building-sites/settings/feed_modx_news_enabled)
56. [feed\_modx\_security](building-sites/settings/feed_modx_security)
57. [feed\_modx\_security\_enabled](building-sites/settings/feed_modx_security_enabled)
58. [filemanager\_path](building-sites/settings/filemanager_path)
59. [filemanager\_path\_relative](building-sites/settings/filemanager_path_relative)
60. [filemanager\_url](building-sites/settings/filemanager_url)
61. [filemanager\_url\_relative](building-sites/settings/filemanager_url_relative)
62. [forgot\_login\_email](building-sites/settings/forgot_login_email)
63. [forward\_merge\_excludes](building-sites/settings/forward_merge_excludes)
64. [friendly\_alias\_lowercase\_only](building-sites/settings/friendly_alias_lowercase_only)
65. [friendly\_alias\_max\_length](building-sites/settings/friendly_alias_max_length)
66. [friendly\_alias\_restrict\_chars](building-sites/settings/friendly_alias_restrict_chars)
67. [friendly\_alias\_restrict\_chars\_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
68. [friendly\_alias\_strip\_element\_tags](building-sites/settings/friendly_alias_strip_element_tags)
69. [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit)
70. [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class)
71. [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path)
72. [friendly\_alias\_trim\_chars](building-sites/settings/friendly_alias_trim_chars)
73. [friendly\_alias\_urls](building-sites/settings/friendly_alias_urls)
74. [friendly\_alias\_word\_delimiter](building-sites/settings/friendly_alias_word_delimiter)
75. [friendly\_alias\_word\_delimiters](building-sites/settings/friendly_alias_word_delimiters)
76. [friendly\_url\_prefix](building-sites/settings/friendly_url_prefix)
77. [friendly\_url\_suffix](building-sites/settings/friendly_url_suffix)
78. [friendly\_urls](building-sites/settings/friendly_urls)
79. [global\_duplicate\_uri\_check](building-sites/settings/global_duplicate_uri_check)
80. [hidemenu\_default](building-sites/settings/hidemenu_default)
81. [link\_tag\_scheme](building-sites/settings/link_tag_scheme)
82. [mail\_charset](building-sites/settings/mail_charset)
83. [mail\_encoding](building-sites/settings/mail_encoding)
84. [mail\_smtp\_auth](building-sites/settings/mail_smtp_auth)
85. [mail\_smtp\_helo](building-sites/settings/mail_smtp_helo)
86. [mail\_smtp\_hosts](building-sites/settings/mail_smtp_hosts)
87. [mail\_smtp\_keepalive](building-sites/settings/mail_smtp_keepalive)
88. [mail\_smtp\_pass](building-sites/settings/mail_smtp_pass)
89. [mail\_smtp\_port](building-sites/settings/mail_smtp_port)
90. [mail\_smtp\_prefix](building-sites/settings/mail_smtp_prefix)
91. [mail\_smtp\_single\_to](building-sites/settings/mail_smtp_single_to)
92. [mail\_smtp\_timeout](building-sites/settings/mail_smtp_timeout)
93. [mail\_smtp\_user](building-sites/settings/mail_smtp_user)
94. [mail\_use\_smtp](building-sites/settings/mail_use_smtp)
95. [manager\_date\_format](building-sites/settings/manager_date_format)
96. [manager\_direction](building-sites/settings/manager_direction)
97. [manager\_favicon\_url](building-sites/settings/manager_favicon_url)
98. [manager\_lang\_attribute](building-sites/settings/manager_lang_attribute)
99. [manager\_language](building-sites/settings/manager_language)
100. [manager\_theme](building-sites/settings/manager_theme)
101. [manager\_time\_format](building-sites/settings/manager_time_format)
102. [modx\_charset](building-sites/settings/modx_charset)
103. [new\_file\_permissions](building-sites/settings/new_file_permissions)
104. [new\_folder\_permissions](building-sites/settings/new_folder_permissions)
105. [password\_generated\_length](building-sites/settings/password_generated_length)
106. [password\_min\_length](building-sites/settings/password_min_length)
107. [phpthumb\_allow\_src\_above\_docroot](building-sites/settings/phpthumb_allow_src_above_docroot)
108. [phpthumb\_cache\_maxage](building-sites/settings/phpthumb_cache_maxage)
109. [phpthumb\_cache\_maxfiles](building-sites/settings/phpthumb_cache_maxfiles)
110. [phpthumb\_cache\_maxsize](building-sites/settings/phpthumb_cache_maxsize)
111. [phpthumb\_cache\_source\_enabled](building-sites/settings/phpthumb_cache_source_enabled)
112. [phpthumb\_document\_root](building-sites/settings/phpthumb_document_root)
113. [phpthumb\_error\_bgcolor](building-sites/settings/phpthumb_error_bgcolor)
114. [phpthumb\_error\_fontsize](building-sites/settings/phpthumb_error_fontsize)
115. [phpthumb\_error\_textcolor](building-sites/settings/phpthumb_error_textcolor)
116. [phpthumb\_far](building-sites/settings/phpthumb_far)
117. [phpthumb\_imagemagick\_path](building-sites/settings/phpthumb_imagemagick_path)
118. [phpthumb\_nohotlink\_enabled](building-sites/settings/phpthumb_nohotlink_enabled)
119. [phpthumb\_nohotlink\_erase\_image](building-sites/settings/phpthumb_nohotlink_erase_image)
120. [phpthumb\_nohotlink\_text\_message](building-sites/settings/phpthumb_nohotlink_text_message)
121. [phpthumb\_nohotlink\_valid\_domains](building-sites/settings/phpthumb_nohotlink_valid_domains)
122. [phpthumb\_nooffsitelink\_enabled](building-sites/settings/phpthumb_nooffsitelink_enabled)
123. [phpthumb\_nooffsitelink\_erase\_image](building-sites/settings/phpthumb_nooffsitelink_erase_image)
124. [phpthumb\_nooffsitelink\_require\_refer](building-sites/settings/phpthumb_nooffsitelink_require_refer)
125. [phpthumb\_nooffsitelink\_text\_message](building-sites/settings/phpthumb_nooffsitelink_text_message)
126. [phpthumb\_nooffsitelink\_valid\_domains](building-sites/settings/phpthumb_nooffsitelink_valid_domains)
127. [phpthumb\_nooffsitelink\_watermark\_src](building-sites/settings/phpthumb_nooffsitelink_watermark_src)
128. [phpthumb\_zoomcrop](building-sites/settings/phpthumb_zoomcrop)
129. [principal\_targets](building-sites/settings/principal_targets)
130. [proxy\_auth\_type](building-sites/settings/proxy_auth_type)
131. [proxy\_host](building-sites/settings/proxy_host)
132. [proxy\_password](building-sites/settings/proxy_password)
133. [proxy\_port](building-sites/settings/proxy_port)
134. [proxy\_username](building-sites/settings/proxy_username)
135. [publish\_default](building-sites/settings/publish_default)
136. [rb\_base\_dir](building-sites/settings/rb_base_dir)
137. [rb\_base\_url](building-sites/settings/rb_base_url)
138. [request\_controller](building-sites/settings/request_controller)
139. [request\_param\_alias](building-sites/settings/request_param_alias)
140. [request\_param\_id](building-sites/settings/request_param_id)
141. [resource\_tree\_node\_name](building-sites/settings/resource_tree_node_name)
142. [resource\_tree\_node\_tooltip](building-sites/settings/resource_tree_node_tooltip)
143. [richtext\_default](building-sites/settings/richtext_default)
144. [search\_default](building-sites/settings/search_default)
145. [server\_offset\_time](building-sites/settings/server_offset_time)
146. [server\_protocol](building-sites/settings/server_protocol)
147. [session\_cookie\_domain](building-sites/settings/session_cookie_domain)
148. [session\_cookie\_lifetime](building-sites/settings/session_cookie_lifetime)
149. [session\_cookie\_path](building-sites/settings/session_cookie_path)
150. [session\_cookie\_secure](building-sites/settings/session_cookie_secure)
151. [session\_enabled](building-sites/settings/session_enabled)
152. [session\_handler\_class](building-sites/settings/session_handler_class)
153. [session\_name](building-sites/settings/session_name)
154. [settings\_version](building-sites/settings/settings_version)
155. [signupemail\_message](building-sites/settings/signupemail_message)
156. [site\_name](building-sites/settings/site_name)
157. [site\_start](building-sites/settings/site_start)
158. [site\_status](building-sites/settings/site_status)
159. [site\_unavailable\_message](building-sites/settings/site_unavailable_message)
160. [site\_unavailable\_page](building-sites/settings/site_unavailable_page)
161. [strip\_image\_paths](building-sites/settings/strip_image_paths)
162. [symlink\_merge\_fields](building-sites/settings/symlink_merge_fields)
163. [tree\_default\_sort](building-sites/settings/tree_default_sort)
164. [tree\_root\_id](building-sites/settings/tree_root_id)
165. [tvs\_below\_content](building-sites/settings/tvs_below_content)
166. [udperms\_allowroot](building-sites/settings/udperms_allowroot)
167. [ui\_debug\_mode](building-sites/settings/ui_debug_mode)
168. [unauthorized\_page](building-sites/settings/unauthorized_page)
169. [upload\_maxsize](building-sites/settings/upload_maxsize)
170. [use\_alias\_path](building-sites/settings/use_alias_path)
171. [use\_browser](building-sites/settings/use_browser)
172. [use\_editor](building-sites/settings/use_editor)
173. [use\_multibyte](building-sites/settings/use_multibyte)
174. [welcome\_screen](building-sites/settings/welcome_screen)
175. [which\_editor](building-sites/settings/which_editor)
176. [which\_element\_editor](building-sites/settings/which_element_editor)
177. [xhtml\_urls](building-sites/settings/xhtml_urls)
