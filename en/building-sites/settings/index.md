---
title: "System Settings"
_old_id: "299"
_old_uri: "2.x/administering-your-site/settings/system-settings/"
---

MODX comes with a flexible amount of system settings. They are found in System -> System Settings, and can easily be edited and changed. All system settings are available in your templates by using the `[[++placeholder]]` notation. See [Template Tags](building-sites/tag-syntax/common) for more information.

## Overriding Settings (Inheritance)

While this document mostly talks about _System_ Settings, MODX comes with a very powerful inheritance system that allows you to override settings at the context, usergroup, or user setting.

Basically, when a setting is requested in the session of a specific user, the settings are checked in the following order:

1. User Setting
2. Usergroup Setting
3. Context Setting (Note that in the manager, the context is usually `mgr`)
4. System setting

## Creating new System Settings (via the GUI)

To create a new system setting, click the "Create New Settings" link under System -> System Settings.

![](system_settings_annotated.png)

### Parameters

-   Key: This is ultimately the unique name of your `[[++placeholder]]`
-   Name: This is the label displayed in the "Name" column while viewing all system settings. This value can be localized (see below).
-   Field Type: There are currently 3 supported input types: TextField, TextArea, Yes/No
-   Namespace: as with [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages"), the namespace defines a folder inside core/components/.
-   Area Lexicon Entry: this value affects the grouping of system settings; create multiple system settings that share the "Area Lexicon Entry" and they will be grouped together.
-   Value: The default value.
-   Description: This value can be localized (see below).

### Localization

The values used to describe system settings can be optionally localized (i.e. translated) by referencing a specific localization file. The lexicon keys follow a specific format:

-   Name: `setting_` + _Key_
-   Description: `setting_` + _Key_ + `_desc`

For example, if we look at Quip's `[[++quip.emailsFrom]]` setting, we see that it uses the the **quip** namespace. The expected folder structure is to look for localization files in the namespace's folder, then in a "lexicon" folder, then in folders divided by language codes, and then in the **default.inc.php** file, for example **core/components/quip/lexicon/en/default.inc.php**

In our Quip example, we see a name of _setting_quip.emailsFrom_ and a description of _setting_quip.emailsFrom_desc_. These two values correspond to keys in the **\$\_lang** array inside of **default.inc.php**:

```php
$_lang['setting_quip.emailsFrom'] = 'From Email';
$_lang['setting_quip.emailsFrom_desc'] = 'The email address to send system emails from.';
```

We encourage you to right-click an existing system setting and choose to "Update System Setting" to get an idea of how this works.

### Getting a System Setting (programmatically)

To get a setting value from a snippet, plugin, or other PHP-code, you use the [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") function and passing it the unique key for the option, for example:

```php
$siteStartId = $modx->getOption('site_start');
```

In WordPress, the comparable API function is **get_option()**.

This function retrieves the value from the settings cache.

### Saving a System Setting (programmatically)

Here's where things get a little bit more complicated: when we retrieve the value using [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption"), we are retrieving the object from the settings cache. This has the distinct advantage of speed, but it means that we essentially have a read-only copy of the setting's value.

While there is a setOption method available; that only updates the in-memory setting cache.

This is for architectural reasons: the system settings are meant to defined as _configurations_, **NOT runtime dynamic values**. They are typically set at the time of install and then not often updated. However, there may be legitimate times when you need to update system settings programmatically, e.g. perhaps you have written a [Custom Manager Page](extending-modx/custom-manager-pages "Custom Manager Pages Tutorial") that offers a customized form to your users for its system settings.

If we want to update a system setting, we use the powerful xPDO [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") function. So let's revisit our retrieval of a simple site setting and compare it side by side with the more verbose (and more flexible) xPDO counterpart:

```php
echo $modx->getOption('site_name');
// prints the same thing as this:
$setting = $modx->getObject('modSystemSetting', 'site_name');
if ($setting) {
    echo $setting->get('value');
}
```

The difference is that using **getObject** retrieves the object from the database uncached, and we can do far more things with an object, including saving that object. So here's how we would retrieve and save a system setting:

```php
$setting = $modx->getObject('modSystemSetting', 'site_name');
$setting->set('value', 'My New Site Name');
$setting->save();
```

However, note that this does not clear the settings cache, so any subsequent calls to **getOption** will still return the older cached version of the setting.

To rectify this in MODX, you have to clear the cache. At the very least the system_settings cache, but if you're using the setting value in a snippet or other code affecting the front-end, the resource cache too:

```php
$cacheRefreshOptions =  [
    'system_settings' => [],
    'resource' => [],
];
$modx->cacheManager->refresh($cacheRefreshOptions);
```

In WordPress, the comparable API function is **update_option()**.

### Retrieving a Setting's Meta Data

Once we start retrieving the _Objects_ that represent the system settings instead of just their value, we can see all of the meta data for any given setting (i.e. all of the attributes). Look at this code as an example:

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

Once you understand how to manipulate objects using MODX and xPDO, you'll be able to retrieve and modify just about everything inside of MODX, because just about everything is an object.

## Retrieving a list of Related Settings

If you have noticed in the GUI above, MODX allows for some very logical grouping of system settings. The most useful groupings are **area** and by the prefix of the **key**. Using xPDO's [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") method, we can easily supply some search criteria to get the settings that we want.

Here's how we would pull up all settings from the 'Mail' area:

```php
$relatedSettings = $modx->getCollection('modSystemSetting', array('area'=>'Mail'));
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

This leads us naturally to one of xPDO's other features: the [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") object. We can use it to pass more complex criteria to our **getCollection call**. Here's how we would pull up all settings that used the prefix of "quip.":

```php
$query = $modx->newQuery('modSystemSetting');
$query->where(array('key:LIKE' => 'quip.%') );
$relatedSettings = $modx->getCollection('modSystemSetting', $query);
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

You may not have been expecting an introduction to xPDO while you were simply trying to retrieve and set system settings, but it's in there.

## Creating a System Setting Programmatically

You may desire to create a System Setting programmatically in order to provide your users with a cleaner UX/UI. In your code, you can put something like the following:

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

Note that you must create lexicon entries that match your key name (see the section above on Localization):

-   Name: `setting_` + _Key_
-   Description: `setting_` + _Key_ + `_desc`

So in this example, you would need to add the following lexicon entries to a lexicon that you have loaded:

```php
$_lang['setting_mykey'] = 'Name of My Setting';
$_lang['setting_mykey_desc'] = 'Description of my key';
```

MODX will populate the values for the name and description based on those lexicon entries.

You may find it useful to reference your localized language strings inside your Templates or CMPs. You can do this via a lexicon tag, but you must specify the "setting" topic, e.g.

```php
[[!%setting_emailsender? &topic=`setting` &namespace=`core` &language=`en`]]
```

## Types of System Settings

The **xtype** attribute defines what type of field the GUI will use when rendering the interface for this field:

-   **combo-boolean** : stored values are 1 and 0; the GUI will display "Yes" and "No"
-   **textfield** : standard text field
-   **textarea** : standard textearea
-   **text-password** : standard password field (input is masked)
-   **numberfield** : used for entering numbers
-   **modx-combo-language** : allows user to select a language
-   **modx-combo-source** :
-   **modx-combo-template** : allows user to select a template
-   **modx-combo-content-type** : allows user to select a content type
-   **modx-combo-charset** : allows user to select a character set
-   **modx-combo-rte** : like the textarea, but with formatting controls
-   **modx-combo-context** : allows user to select a context
-   **modx-combo-namespace** : allows user to select a namespace
-   **modx-combo-manager-theme** : allows user to select a MODX manager theme

## Settings List

A description of each setting follows:

1. [access_category_enabled](building-sites/settings/access_category_enabled)
2. [access_context_enabled](building-sites/settings/access_context_enabled)
3. [access_resource_group_enabled](building-sites/settings/access_resource_group_enable)
4. [allow_duplicate_alias](building-sites/settings/allow_duplicate_alias)
5. [allow_forward_across_contexts](building-sites/settings/allow_forward_across_contexts)
6. [allow_manager_login_forgot_password](building-sites/settings/allow_manager_login_forgot_password)
7. [allow_multiple_emails](building-sites/settings/allow_multiple_emails)
8. [allow_tags_in_post](building-sites/settings/allow_tags_in_post)
9. [allow_tv_eval](building-sites/settings/allow_tv_eval)
10. [anonymous_sessions](building-sites/settings/anonymous_sessions)
11. [archive_with](building-sites/settings/archive_with)
12. [automatic_alias](building-sites/settings/automatic_alias)
13. [automatic_template_assignment](building-sites/settings/automatic_template_assignment)
14. [auto_check_pkg_updates](building-sites/settings/auto_check_pkg_updates)
15. [auto_check_pkg_updates_cache_expire](building-sites/settings/auto_check_pkg_updates_cache_expire)
16. [auto_isfolder](building-sites/settings/auto_isfolder)
17. [auto_menuindex](building-sites/settings/auto_menuindex)
18. [base_help_url](building-sites/settings/base_help_url)
19. [blocked_minutes](building-sites/settings/blocked_minutes)
20. [cache_action_map](building-sites/settings/cache_action_map)
21. [cache_alias_map](building-sites/settings/cache_alias_map)
22. [cache_context_settings](building-sites/settings/cache_context_settings)
23. [cache_db](building-sites/settings/cache_db)
24. [cache_db_expires](building-sites/settings/cache_db_expires)
25. [cache_db_session](building-sites/settings/cache_db_session)
26. [cache_db_session_lifetime](building-sites/settings/cache_db_session_lifetime)
27. [cache_default](building-sites/settings/cache_default)
28. [cache_disabled](building-sites/settings/cache_disabled)
29. [cache_format](building-sites/settings/cache_format)
30. [cache_handler](building-sites/settings/cache_handler)
31. [cache_json](building-sites/settings/cache_json)
32. [cache_json_expires](building-sites/settings/cache_json_expires)
33. [cache_lang_js](building-sites/settings/cache_lang_js)
34. [cache_lexicon_topics](building-sites/settings/cache_lexicon_topics)
35. [cache_noncore_lexicon_topics](building-sites/settings/cache_noncore_lexicon_topics)
36. [cache_resource](building-sites/settings/cache_resource)
37. [cache_resource_clear_partial](building-sites/settings/cache_resource_clear_partial)
38. [cache_resource_expires](building-sites/settings/cache_resource_expires)
39. [cache_scripts](building-sites/settings/cache_scripts)
40. [cache_system_settings](building-sites/settings/cache_system_settings)
41. [clear_cache_refresh_trees](building-sites/settings/clear_cache_refresh_trees)
42. [compress_css](building-sites/settings/compress_css)
43. [compress_js](building-sites/settings/compress_js)
44. [compress_js_groups](building-sites/settings/compress_js_groups)
45. [compress_js_max_files](building-sites/settings/compress_js_max_files)
46. [concat_js](building-sites/settings/concat_js)
47. [confirm_navigation](building-sites/settings/confirm_navigation)
48. [container_suffix](building-sites/settings/container_suffix)
49. [context_tree_sortby](building-sites/settings/context_tree_sortby)
50. [context_tree_sortdir](building-sites/settings/context_tree_sortdir)
51. [context_tree_sort](building-sites/settings/context_tree_default_sort)
52. [context_tree_sort](building-sites/settings/context_tree_sort)
53. [cultureKey](building-sites/settings/culturekey)
54. [custom_resource_classes](building-sites/settings/custom_resource_classes)
55. [date_timezone](building-sites/settings/date_timezone)
56. [debug](building-sites/settings/debug)
57. [default_content_type](building-sites/settings/default_content_type)
58. [default_context](building-sites/settings/default_context)
59. [default_duplicate_publish_option](building-sites/settings/default_duplicate_publish_option)
60. [default_media_source](building-sites/settings/default_media_source)
61. [default_media_source_type](building-sites/settings/default_media_source_type)
62. [default_per_page](building-sites/settings/default_per_page)
63. [default_template](building-sites/settings/default_template)
64. [default_username](building-sites/settings/default_username)
65. [editor_css_path](building-sites/settings/editor_css_path)
66. [editor_css_selectors](building-sites/settings/editor_css_selectors)
67. [emailsender](building-sites/settings/emailsender)
68. [emailsubject](building-sites/settings/emailsubject)
69. [enable_dragdrop](building-sites/settings/enable_dragdrop)
70. [enable_gravatar](building-sites/settings/enable_gravatar)
71. [error_log_filename](building-sites/settings/error_log_filename)
72. [error_log_filepath](building-sites/settings/error_log_filepath)
73. [error_page](building-sites/settings/error_page)
74. [extension_packages](building-sites/settings/extension_packages)
75. [failed_login_attempts](building-sites/settings/failed_login_attempts)
76. [feed_modx_news](building-sites/settings/feed_modx_news)
77. [feed_modx_news_enabled](building-sites/settings/feed_modx_news_enabled)
78. [feed_modx_security](building-sites/settings/feed_modx_security)
79. [feed_modx_security_enabled](building-sites/settings/feed_modx_security_enabled)
80. [fe_editor_lang](building-sites/settings/fe_editor_lang)
81. [filemanager_path](building-sites/settings/filemanager_path)
82. [filemanager_path_relative](building-sites/settings/filemanager_path_relative)
83. [filemanager_url](building-sites/settings/filemanager_url)
84. [filemanager_url_relative](building-sites/settings/filemanager_url_relative)
85. [forgot_login_email](building-sites/settings/forgot_login_email)
86. [form_customization_use_all_groups](building-sites/settings/form_customization_use_all_groups)
87. [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
88. [friendly_alias_lowercase_only](building-sites/settings/friendly_alias_lowercase_only)
89. [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length)
90. [friendly_alias_realtime](building-sites/settings/friendly_alias_realtime)
91. [friendly_alias_restrict_chars](building-sites/settings/friendly_alias_restrict_chars)
92. [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
93. [friendly_alias_strip_element_tags](building-sites/settings/friendly_alias_strip_element_tags)
94. [friendly_alias_translit](building-sites/settings/friendly_alias_translit)
95. [friendly_alias_translit_class](building-sites/settings/friendly_alias_translit_class)
96. [friendly_alias_translit_class_path](building-sites/settings/friendly_alias_translit_class_path)
97. [friendly_alias_trim_chars](building-sites/settings/friendly_alias_trim_chars)
98. [friendly_alias_urls](building-sites/settings/friendly_alias_urls)
99. [friendly_alias_word_delimiters](building-sites/settings/friendly_alias_word_delimiters)
100. [friendly_alias_word_delimiter](building-sites/settings/friendly_alias_word_delimiter)
101. [friendly_urls](building-sites/settings/friendly_urls)
102. [friendly_urls_strict](building-sites/settings/friendly_urls_strict)
103. [friendly_url_prefix](building-sites/settings/friendly_url_prefix)
104. [friendly_url_suffix](building-sites/settings/friendly_url_suffix)
105. [global_duplicate_uri_check](building-sites/settings/global_duplicate_uri_check)
106. [hidemenu_default](building-sites/settings/hidemenu_default)
107. [inherit_parent_template](building-sites/settings/inherit_parent_template)
108. [link_tag_scheme](building-sites/settings/link_tag_scheme)
109. [locale](building-sites/settings/locale)
110. [lock_ttl](building-sites/settings/lock_ttl)
111. [log_deprecated](building-sites/settings/log_deprecated)
112. [log_level](building-sites/settings/log_level)
113. [log_snippet_not_found](building-sites/settings/log_snippet_not_found)
114. [log_target](building-sites/settings/log_target)
115. [mail_charset](building-sites/settings/mail_charset)
116. [mail_encoding](building-sites/settings/mail_encoding)
117. [mail_smtp_auth](building-sites/settings/mail_smtp_auth)
118. [mail_smtp_autotls](building-sites/settings/mail_smtp_autotls)
119. [mail_smtp_helo](building-sites/settings/mail_smtp_helo)
120. [mail_smtp_hosts](building-sites/settings/mail_smtp_hosts)
121. [mail_smtp_keepalive](building-sites/settings/mail_smtp_keepalive)
122. [mail_smtp_pass](building-sites/settings/mail_smtp_pass)
123. [mail_smtp_port](building-sites/settings/mail_smtp_port)
124. [mail_smtp_prefix](building-sites/settings/mail_smtp_prefix)
125. [mail_smtp_single_to](building-sites/settings/mail_smtp_single_to)
126. [mail_smtp_timeout](building-sites/settings/mail_smtp_timeout)
127. [mail_smtp_user](building-sites/settings/mail_smtp_user)
128. [mail_use_smtp](building-sites/settings/mail_use_smtp)
129. [main_nav_parent](building-sites/settings/main_nav_parent)
130. [manager_date_format](building-sites/settings/manager_date_format)
131. [manager_direction](building-sites/settings/manager_direction)
132. [manager_favicon_url](building-sites/settings/manager_favicon_url)
133. [manager_html5_cache](building-sites/settings/manager_html5_cache)
134. [manager_js_cache_file_locking](building-sites/settings/manager_js_cache_file_locking)
135. [manager_js_cache_max_age](building-sites/settings/manager_js_cache_max_age)
136. [manager_js_document_root](building-sites/settings/manager_js_document_root)
137. [manager_js_zlib_output_compression](building-sites/settings/manager_js_zlib_output_compression)
138. [manager_language](building-sites/settings/manager_language)
139. [manager_lang_attribute](building-sites/settings/manager_lang_attribute)
140. [manager_login_url_alternate](building-sites/settings/manager_login_url_alternate)
141. [manager_theme](building-sites/settings/manager_theme)
142. [manager_time_format](building-sites/settings/manager_time_format)
143. [manager_use_fullname](building-sites/settings/manager_use_fullname)
144. [manager_week_start](building-sites/settings/manager_week_start)
145. [mgr_source_icon](building-sites/settings/mgr_source_icon)
146. [mgr_tree_icon_context](building-sites/settings/mgr_tree_icon_context)
147. [modx_browser_default_sort](building-sites/settings/modx_browser_default_sort)
148. [modx_browser_default_viewmode](building-sites/settings/modx_browser_default_viewmode)
149. [modx_browser_tree_hide_files](building-sites/settings/modx_browser_tree_hide_files)
150. [modx_browser_tree_hide_tooltips](building-sites/settings/modx_browser_tree_hide_tooltips)
151. [modx_charset](building-sites/settings/modx_charset)
152. [new_file_permissions](building-sites/settings/new_file_permissions)
153. [new_folder_permissions](building-sites/settings/new_folder_permissions)
154. [parser_recurse_uncacheable](building-sites/settings/parser_recurse_uncacheable)
155. [password_generated_length](building-sites/settings/password_generated_length)
156. [password_min_length](building-sites/settings/password_min_length)
157. [phpthumb_allow_src_above_docroot](building-sites/settings/phpthumb_allow_src_above_docroot)
158. [phpthumb_cache_maxage](building-sites/settings/phpthumb_cache_maxage)
159. [phpthumb_cache_maxfiles](building-sites/settings/phpthumb_cache_maxfiles)
160. [phpthumb_cache_maxsize](building-sites/settings/phpthumb_cache_maxsize)
161. [phpthumb_cache_source_enabled](building-sites/settings/phpthumb_cache_source_enabled)
162. [phpthumb_document_root](building-sites/settings/phpthumb_document_root)
163. [phpthumb_error_bgcolor](building-sites/settings/phpthumb_error_bgcolor)
164. [phpthumb_error_fontsize](building-sites/settings/phpthumb_error_fontsize)
165. [phpthumb_error_textcolor](building-sites/settings/phpthumb_error_textcolor)
166. [phpthumb_far](building-sites/settings/phpthumb_far)
167. [phpthumb_imagemagick_path](building-sites/settings/phpthumb_imagemagick_path)
168. [phpthumb_nohotlink_enabled](building-sites/settings/phpthumb_nohotlink_enabled)
169. [phpthumb_nohotlink_erase_image](building-sites/settings/phpthumb_nohotlink_erase_image)
170. [phpthumb_nohotlink_text_message](building-sites/settings/phpthumb_nohotlink_text_message)
171. [phpthumb_nohotlink_valid_domains](building-sites/settings/phpthumb_nohotlink_valid_domains)
172. [phpthumb_nooffsitelink_enabled](building-sites/settings/phpthumb_nooffsitelink_enabled)
173. [phpthumb_nooffsitelink_erase_image](building-sites/settings/phpthumb_nooffsitelink_erase_image)
174. [phpthumb_nooffsitelink_require_refer](building-sites/settings/phpthumb_nooffsitelink_require_refer)
175. [phpthumb_nooffsitelink_text_message](building-sites/settings/phpthumb_nooffsitelink_text_message)
176. [phpthumb_nooffsitelink_valid_domains](building-sites/settings/phpthumb_nooffsitelink_valid_domains)
177. [phpthumb_nooffsitelink_watermark_src](building-sites/settings/phpthumb_nooffsitelink_watermark_src)
178. [phpthumb_zoomcrop](building-sites/settings/phpthumb_zoomcrop)
179. [preserve_menuindex](building-sites/settings/preserve_menuindex)
180. [principal_targets](building-sites/settings/principal_targets)
181. [proxy_auth_type](building-sites/settings/proxy_auth_type)
182. [proxy_host](building-sites/settings/proxy_host)
183. [proxy_password](building-sites/settings/proxy_password)
184. [proxy_port](building-sites/settings/proxy_port)
185. [proxy_username](building-sites/settings/proxy_username)
186. [publish_default](building-sites/settings/publish_default)
187. [rb_base_dir](building-sites/settings/rb_base_dir)
188. [rb_base_url](building-sites/settings/rb_base_url)
189. [request_controller](building-sites/settings/request_controller)
190. [request_method_strict](building-sites/settings/request_method_strict)
191. [request_param_alias](building-sites/settings/request_param_alias)
192. [request_param_id](building-sites/settings/request_param_id)
193. [resource_tree_node_name](building-sites/settings/resource_tree_node_name)
194. [resource_tree_node_name_fallback](building-sites/settings/resource_tree_node_name_fallback)
195. [resource_tree_node_tooltip](building-sites/settings/resource_tree_node_tooltip)
196. [richtext_default](building-sites/settings/richtext_default)
197. [search_default](building-sites/settings/search_default)
198. [send_poweredby_header](building-sites/settings/send_poweredby_header)
199. [server_offset_time](building-sites/settings/server_offset_time)
200. [server_protocol](building-sites/settings/server_protocol)
201. [session_cookie_domain](building-sites/settings/session_cookie_domain)
202. [session_cookie_httponly](building-sites/settings/session_cookie_httponly)
203. [session_cookie_lifetime](building-sites/settings/session_cookie_lifetime)
204. [session_cookie_path](building-sites/settings/session_cookie_path)
205. [session_cookie_secure](building-sites/settings/session_cookie_secure)
206. [session_enabled](building-sites/settings/session_enabled)
207. [session_gc_maxlifetime](building-sites/settings/session_gc_maxlifetime)
208. [session_handler_class](building-sites/settings/session_handler_class)
209. [session_name](building-sites/settings/session_name)
210. [settings_version](building-sites/settings/settings_version)
211. [setting_static_elements_basepath](building-sites/settings/setting_static_elements_basepath)
212. [show_tv_categories_header](building-sites/settings/show_tv_categories_header)
213. [signupemail_message](building-sites/settings/signupemail_message)
214. [site_name](building-sites/settings/site_name)
215. [site_start](building-sites/settings/site_start)
216. [site_status](building-sites/settings/site_status)
217. [site_unavailable_message](building-sites/settings/site_unavailable_message)
218. [site_unavailable_page](building-sites/settings/site_unavailable_page)
219. [static_elements_automate_chunks](building-sites/settings/static_elements_automate_chunks)
220. [static_elements_automate_plugins](building-sites/settings/static_elements_automate_plugins)
221. [static_elements_automate_snippets](building-sites/settings/static_elements_automate_snippets)
222. [static_elements_automate_templates](building-sites/settings/static_elements_automate_templates)
223. [static_elements_automate_tvs](building-sites/settings/static_elements_automate_tvs)
224. [static_elements_basepath](building-sites/settings/static_elements_basepath)
225. [static_elements_default_category](building-sites/settings/static_elements_default_category)
226. [static_elements_default_mediasource](building-sites/settings/static_elements_default_mediasource)
227. [strip_image_paths](building-sites/settings/strip_image_paths)
228. [symlink_merge_fields](building-sites/settings/symlink_merge_fields)
229. [syncsite_default](building-sites/settings/syncsite_default)
230. [tree_default_sort](building-sites/settings/tree_default_sort)
231. [tree_root_id](building-sites/settings/tree_root_id)
232. [tvs_below_content](building-sites/settings/tvs_below_content)
233. [udperms_allowroot](building-sites/settings/udperms_allowroot)
234. [ui_debug_mode](building-sites/settings/ui_debug_mode)
235. [unauthorized_page](building-sites/settings/unauthorized_page)
236. [upload_files](building-sites/settings/upload_files)
237. [upload_maxsize](building-sites/settings/upload_maxsize)
238. [user_nav_parent](building-sites/settings/user_nav_parent)
239. [use_alias_path](building-sites/settings/use_alias_path)
240. [use_browser](building-sites/settings/use_browser)
241. [use_context_resource_table](building-sites/settings/use_context_resource_table)
242. [use_editor](building-sites/settings/use_editor)
243. [use_frozen_parent_uris](building-sites/settings/use_frozen_parent_uris)
244. [use_multibyte](building-sites/settings/use_multibyte)
245. [use_weblink_target](building-sites/settings/use_weblink_target)
246. [welcome_action](building-sites/settings/welcome_action)
247. [welcome_namespace](building-sites/settings/welcome_namespace)
248. [welcome_screen](building-sites/settings/welcome_screen)
249. [welcome_screen_url](building-sites/settings/welcome_screen_url)
250. [which_editor](building-sites/settings/which_editor)
251. [which_element_editor](building-sites/settings/which_element_editor)
252. [xhtml_urls](building-sites/settings/xhtml_urls)
