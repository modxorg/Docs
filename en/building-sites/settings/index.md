---
title: "System Settings"
_old_id: "299"
_old_uri: "2.x/administering-your-site/settings/system-settings/"
---

- [Creating new System Settings (via the GUI)](#SystemSettings-CreatingnewSystemSettings%28viatheGUI%29)
  - [Parameters](#SystemSettings-Parameters)
  - [Localization](#SystemSettings-Localization)
- [Using System Settings in your Code](#SystemSettings-UsingSystemSettingsinyourCode)
  - [Getting a System Setting (programmatically)](#SystemSettings-GettingaSystemSetting%28programmatically%29)
  - [Saving a System Setting (programmatically)](#SystemSettings-SavingaSystemSetting%28programmatically%29)
  - [Retrieving a Setting's Meta Data](#SystemSettings-RetrievingaSetting%27sMetaData)
- [Retrieving a list of Related Settings](#SystemSettings-RetrievingalistofRelatedSettings)
- [Creating a System Setting Programmatically](#SystemSettings-CreatingaSystemSettingProgrammatically)
- [Types of System Settings](#SystemSettings-TypesofSystemSettings)
- [Settings List](#SystemSettings-SettingsList)

 MODx comes with a flexible amount of system settings. They are found in System -> System Settings, and can easily be edited and changed. All system settings are available in your templates by using the `[[++placeholder]]` notation. See [Template Tags](building-sites/tag-syntax/common) for more information.

## Overriding Settings (Inheritance)

While this document mostly talks about _System_ Settings, MODX comes with a very powerful inheritance system that allows you to override settings at the context, usergroup, or user setting.

Basically, when a setting is requested in the session of a specific user, the settings are checked in the following order:

1. User Setting
2. Usergroup Setting
3. Context Setting (Note that in the manager, the context is usually `mgr`)
4. System setting

## Creating new System Settings (via the GUI)

 To create a new system setting, click the "Create New Settings" link under System -> System Settings.

 ![](/download/attachments/18678127/system+settings+annotated.png?version=1&modificationDate=1303174387000)

### Parameters

- Key: This is ultimately the unique name of your `[[++placeholder]]`
- Name: This is the label displayed in the "Name" column while viewing all system settings. This value can be localized (see below).
- Field Type: There are currently 3 supported input types: TextField, TextArea, Yes/No
- Namespace: as with [Custom Manager Pages](extending-modx/custom-manager-pages "Custom Manager Pages"), the namespace defines a folder inside core/components/.
- Area Lexicon Entry: this value affects the grouping of system settings; create multiple system settings that share the "Area Lexicon Entry" and they will be grouped together.
- Value: The default value.
- Description: This value can be localized (see below).

### Localization

 The values used to describe system settings can be optionally localized (i.e. translated) by referencing a specific localization file. The lexicon keys follow a specific format:

- Name: `setting_` + _Key_
- Description: `setting_` + _Key_ + `_desc`

 For example, if we look at Quip's `[[++quip.emailsFrom]]` setting, we see that it uses the the **quip** namespace. The expected folder structure is to look for localization files in the namespace's folder, then in a "lexicon" folder, then in folders divided by language codes, and then in the **default.inc.php** file, for example **core/components/quip/lexicon/en/default.inc.php**

 In our Quip example, we see a name of _setting\_quip.emailsFrom_ and a description of _setting\_quip.emailsFrom\_desc_. These two values correspond to keys in the **$\_lang** array inside of **default.inc.php**:

 ``` php
$_lang['setting_quip.emailsFrom'] = 'From Email';
$_lang['setting_quip.emailsFrom_desc'] = 'The email address to send system emails from.';
```

 We encourage you to right-click an existing system setting and choose to "Update System Setting" to get an idea of how this works.

## Using System Settings in your Code

 Frequently, you'll want to be able to retrieve the values for your system settings in your Snippets or Plugins. There's more information [on this page](_legacy/administering-your-site/settings "Settings").

### Getting a System Setting (programmatically)

 In a nutshell, you do it using the [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption") function and passing it the unique key for the option, for example:

 ``` php
$siteStartId = $modx->getOption('site_start');
```

 In WordPress, the comparable API function is **get\_option()**.

 This function retrieves the value from the settings cache.

### Saving a System Setting (programmatically)

 Here's where things get a little bit more complicated: when we retrieve the value using [getOption](extending-modx/xpdo/class-reference/xpdoobject/configuration-accessors/getoption "getOption"), we are retrieving the object from the settings cache. This has the distinct advantage of speed, but it means that we essentially have a read-only copy of the setting's value.

 This is for architectural reasons: the system settings are meant to defined as _configurations_, **NOT runtime dynamic values**. They are typically set at the time of install and then not often updated. However, there may be legitimate times when you need to update system settings programmatically, e.g. perhaps you have written a [Custom Manager Page](_legacy/developing-in-modx/custom-manager-pages-tutorial "Custom Manager Pages Tutorial") that offers a customized form to your users for its system settings.

 If we want to update a system setting, we default to the powerful xPDO [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject") function. So let's revisit our retrieval of a simple site setting and compare it side by side with the more verbose (and more flexible) xPDO counterpart:

 ``` php
print $modx->getOption('site_name');
// prints the same thing as this:
$Setting = $modx->getObject('modSystemSetting', 'site_name');
print $Setting->get('value');
```

 The difference is that using **getObject** retrieves the object from the database uncached, and we can do far more things with an object, including saving that object. So here's how we would retrieve and save a system setting:

 ``` php
$Setting = $modx->getObject('modSystemSetting', 'site_name');
$Setting->set('value', 'My New Site Name');
$Setting->save();
```

 However, note that this does not clear the settings cache, so any subsequent calls to **getOption** will still return the older cached version of the setting.

 To rectify this in MODx 2.0.x, you have to clear the _entire_ cache, including your page cache. Clearing your entire cache frequently could slow down your system because it would keep having to rebuild it:

 ``` php
// clear cache in MODx 2.0.x
$modx->cacheManager->clearCache();
```

 MODx 2.1.x offers more granular caching, which helps us in this case:

 ``` php
// clear cache in MODx 2.1.x
$cacheRefreshOptions =  array( 'system_settings' => array() );
$modx->cacheManager-> refresh($cacheRefreshOptions);
```

 In WordPress, the comparable API function is **update\_option()**.

### Retrieving a Setting's Meta Data

 Once we start retrieving the _Objects_ that represent the system settings instead of just their value, we can see all of the meta data for any given setting (i.e. all of the attributes). Look at this code as an example:

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

 Once you understand how to manipulate objects using MODx and xPDO, you'll be able to retrieve and modify just about everything inside of MODx, because just about everything is an object.

## Retrieving a list of Related Settings

 If you have noticed in the GUI above, MODx allows for some very logical grouping of system settings. The most useful groupings are **area** and by the prefix of the **key**. Using xPDO's [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") method, we can easily supply some search criteria to get the settings that we want.

 Here's how we would pull up all settings from the 'Mail' area:

 ``` php
$relatedSettings = $modx->getCollection('modSystemSetting', array('area'=>'Mail'));
foreach ( $relatedSettings as $Setting ) {
        print $Setting->get('value');
}
```

 This leads us naturally to one of xPDO's other features: the [Query](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") object. We can use it to pass more complex criteria to our **getCollection call**. Here's how we would pull up all settings that used the prefix of "quip.":

 ``` php
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
$modx->cacheManager-> refresh($cacheRefreshOptions);
```

 Note that you must create lexicon entries that match your key name (see the section above on Localization):

- Name: `setting_` + _Key_
- Description: `setting_` + _Key_ + `_desc`

 So in this example, you would need to add the following lexicon entries to a lexicon that you have loaded:

 ``` php
$_lang['setting_mykey'] = 'Name of My Setting';
$_lang['setting_mykey_desc'] = 'Description of my key';
```

 MODX will populate the values for the name and description based on those lexicon entries.

 You may find it useful to reference your localized language strings inside your Templates or CMPs. You can do this via a lexicon tag, but you must specify the "setting" topic, e.g.

 ``` php
[[!%setting_emailsender? &topic=`setting` &namespace=`core` &language=`en`]]
```

## Types of System Settings

 The **xtype** attribute defines what type of field the GUI will use when rendering the interface for this field:

- **combo-boolean** : stored values are 1 and 0; the GUI will display "Yes" and "No"
- **textfield** : standard text field
- **textarea** : standard textearea
- **text-password** : standard password field (input is masked)
- **numberfield** : used for entering numbers
- **modx-combo-language** : allows user to select a language
- **modx-combo-source** :
- **modx-combo-template** : allows user to select a template
- **modx-combo-content-type** : allows user to select a content type
- **modx-combo-charset** : allows user to select a character set
- **modx-combo-rte** : like the textarea, but with formatting controls
- **modx-combo-context** : allows user to select a context

## Settings List

 A description of each setting follows:

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
