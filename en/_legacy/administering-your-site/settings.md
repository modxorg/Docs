---
title: "Settings"
_old_id: "284"
_old_uri: "2.x/administering-your-site/settings"
---

## What are Settings?

Settings are site-wide variables that can be used by either the MODx Core or by 3rd-Party Components to provide site, context, or user-level customization. The trick here is the override behavior that applies in the hierarchy: [Contextual Settings](building-sites/contexts "Contexts") (if present), override any of the System Settings. [User Settings](administering-your-site/security/users#Users-UsersUserSettings) (if present) override any of the Context or System settings obeying the hierarchy of **System -> Context -> User**

See the following for more information:

- [System Settings](administering-your-site/settings/system-settings "System Settings")
- [Context Settings](building-sites/contexts "Contexts")
- [User Settings](administering-your-site/security/users#Users-UsersUserSettings)

## Usage

They can be referenced at any point via their Tag, for example, for the 'site\_start' Setting:

``` php 
[[++site_start]]
```

System Settings can be overridden by Context Settings, which are specific to each [Context](building-sites/contexts "Contexts"). Context Settings can in turn be overridden by [User Settings](administering-your-site/security/users#Users-UsersUserSettings).

The hierarchy to remember is:

System Setting -> Context Setting -> User Setting





Let's say I set the System Setting named 'use\_editor' to 0. However, I created a Context Setting called 'use\_editor' for the 'mgr' context and set it to 1. This would mean that any time I'm in the mgr context, the setting would be 1, overriding the System Setting.

Further, I've got a user named 'johndoe' who I don't want to use the editor. I create a User Setting 'use\_editor' for his user and set it to 0. Now, John Doe's "use\_editor" setting will be 0, overriding the Context Setting.

Settings can also be specific to [Namespaces](extending-modx/namespaces "Namespaces"), as well. This allows you to easily group your settings for each of your different Components.

## Retrieving Settings in PHP

Getting settings is simple in MODx Revolution; simply use [getOption](/xpdo/1.x/class-reference/xpdo/xpdo.getoption "xPDO.getOption"). For example, to get the setting 'site\_start', simply:

``` php 
$siteStartId = $modx->getOption('site_start');
```

Now, all settings are overridable by Context and User, as described above, and getOption respects that. So, if in the above code example, if you had set site\_start as a Context Setting that overrode the System Setting, getOption will respect that - but only if you're executing the PHP in that Context that has the Setting.

For example, if I were using that code block in a Context called 'boo', and I had added a Context Setting for site\_start in the 'boo' Context, and set it to 3, the above code would output '3'.

Now if I were in the 'web' context, and site\_start was still '1' (from the System Setting), getOption would return 1.

### Default values with getOption

getOption supports 3 parameters:

1\. The key of the setting 
2\. An array to search first before looking for the setting 
3\. A default value should the setting not be found.

So, for example, if I were in a Snippet and wanted some default properties at the top, I could use getOption. [Snippets](extending-modx/snippets "Snippets") automatically pass in an array of all the Properties attached to that snippet (or specified in the Tag call) via the $scriptProperties array. So, you can use that array to check for default properties. This example sets a default value to the 'showPublished' property should it not be specified:

``` php 
$showPublished = $modx->getOption('showPublished',$scriptProperties,true);
```

Now, assuming the Snippet doesnt have showPublished as a [default property](building-sites/properties-and-property-sets "Properties and Property Sets"), if you called the Snippet via the tag call:

> \[\[mySnippet\]\]

showPublished will be set to true. If it did have the default Property attached to it that set the value to 0, or the showPublished property was specified as 0 in the tag, then showPublished would be 0.

## Additional Information

- Only use getOption if you're reading an existing setting from the DB, not if you need to update the option.
- getOption uses the settings cache (it's much faster)
- getOption will also check User -> Context -> System settings (allowing you to override system settings with context and further with user settings)

## See Also

[System Settings](administering-your-site/settings/system-settings "System Settings")

1. [System Settings](administering-your-site/settings/system-settings)
  1. [access\_category\_enabled](administering-your-site/settings/system-settings/access_category_enabled)
  2. [access\_context\_enabled](administering-your-site/settings/system-settings/access_context_enabled)
  3. [access\_resource\_group\_enabled](administering-your-site/settings/system-settings/access_resource_group_enabled)
  4. [allow\_duplicate\_alias](administering-your-site/settings/system-settings/allow_duplicate_alias)
  5. [allow\_forward\_across\_contexts](administering-your-site/settings/system-settings/allow_forward_across_contexts)
  6. [allow\_multiple\_emails](administering-your-site/settings/system-settings/allow_multiple_emails)
  7. [allow\_tags\_in\_post](administering-your-site/settings/system-settings/allow_tags_in_post)
  8. [archive\_with](administering-your-site/settings/system-settings/archive_with)
  9. [auto\_check\_pkg\_updates](administering-your-site/settings/system-settings/auto_check_pkg_updates)
  10. [auto\_check\_pkg\_updates\_cache\_expire](administering-your-site/settings/system-settings/auto_check_pkg_updates_cache_expire)
  11. [auto\_menuindex](administering-your-site/settings/system-settings/auto_menuindex)
  12. [automatic\_alias](administering-your-site/settings/system-settings/automatic_alias)
  13. [base\_help\_url](administering-your-site/settings/system-settings/base_help_url)
  14. [blocked\_minutes](administering-your-site/settings/system-settings/blocked_minutes)
  15. [cache\_action\_map](administering-your-site/settings/system-settings/cache_action_map)
  16. [cache\_context\_settings](administering-your-site/settings/system-settings/cache_context_settings)
  17. [cache\_db](administering-your-site/settings/system-settings/cache_db)
  18. [cache\_db\_expires](administering-your-site/settings/system-settings/cache_db_expires)
  19. [cache\_db\_session](administering-your-site/settings/system-settings/cache_db_session)
  20. [cache\_default](administering-your-site/settings/system-settings/cache_default)
  21. [cache\_disabled](administering-your-site/settings/system-settings/cache_disabled)
  22. [cache\_format](administering-your-site/settings/system-settings/cache_format)
  23. [cache\_handler](administering-your-site/settings/system-settings/cache_handler)
  24. [cache\_json](administering-your-site/settings/system-settings/cache_json)
  25. [cache\_json\_expires](administering-your-site/settings/system-settings/cache_json_expires)
  26. [cache\_lang\_js](administering-your-site/settings/system-settings/cache_lang_js)
  27. [cache\_lexicon\_topics](administering-your-site/settings/system-settings/cache_lexicon_topics)
  28. [cache\_noncore\_lexicon\_topics](administering-your-site/settings/system-settings/cache_noncore_lexicon_topics)
  29. [cache\_resource](administering-your-site/settings/system-settings/cache_resource)
  30. [cache\_resource\_expires](administering-your-site/settings/system-settings/cache_resource_expires)
  31. [cache\_scripts](administering-your-site/settings/system-settings/cache_scripts)
  32. [cache\_system\_settings](administering-your-site/settings/system-settings/cache_system_settings)
  33. [clear\_cache\_refresh\_trees](administering-your-site/settings/system-settings/clear_cache_refresh_trees)
  34. [compress\_css](administering-your-site/settings/system-settings/compress_css)
  35. [compress\_js](administering-your-site/settings/system-settings/compress_js)
  36. [concat\_js](administering-your-site/settings/system-settings/concat_js)
  37. [container\_suffix](administering-your-site/settings/system-settings/container_suffix)
  38. [cultureKey](administering-your-site/settings/system-settings/culturekey)
  39. [custom\_resource\_classes](administering-your-site/settings/system-settings/custom_resource_classes)
  40. [default\_per\_page](administering-your-site/settings/system-settings/default_per_page)
  41. [default\_template](administering-your-site/settings/system-settings/default_template)
  42. [editor\_css\_path](administering-your-site/settings/system-settings/editor_css_path)
  43. [editor\_css\_selectors](administering-your-site/settings/system-settings/editor_css_selectors)
  44. [emailsender](building-sites/settings/emailsender)
  45. [emailsubject](administering-your-site/settings/system-settings/emailsubject)
  46. [enable\_dragdrop](administering-your-site/settings/system-settings/enable_dragdrop)
  47. [error\_page](administering-your-site/settings/system-settings/error_page)
  48. [extension\_packages](administering-your-site/settings/system-settings/extension_packages)
  49. [failed\_login\_attempts](administering-your-site/settings/system-settings/failed_login_attempts)
  50. [fe\_editor\_lang](administering-your-site/settings/system-settings/fe_editor_lang)
  51. [feed\_modx\_news](administering-your-site/settings/system-settings/feed_modx_news)
  52. [feed\_modx\_news\_enabled](administering-your-site/settings/system-settings/feed_modx_news_enabled)
  53. [feed\_modx\_security](administering-your-site/settings/system-settings/feed_modx_security)
  54. [feed\_modx\_security\_enabled](administering-your-site/settings/system-settings/feed_modx_security_enabled)
  55. [filemanager\_path](administering-your-site/settings/system-settings/filemanager_path)
  56. [filemanager\_path\_relative](administering-your-site/settings/system-settings/filemanager_path_relative)
  57. [filemanager\_url](administering-your-site/settings/system-settings/filemanager_url)
  58. [filemanager\_url\_relative](administering-your-site/settings/system-settings/filemanager_url_relative)
  59. [forgot\_login\_email](administering-your-site/settings/system-settings/forgot_login_email)
  60. [forward\_merge\_excludes](administering-your-site/settings/system-settings/forward_merge_excludes)
  61. [friendly\_alias\_lowercase\_only](administering-your-site/settings/system-settings/friendly_alias_lowercase_only)
  62. [friendly\_alias\_max\_length](administering-your-site/settings/system-settings/friendly_alias_max_length)
  63. [friendly\_alias\_restrict\_chars](administering-your-site/settings/system-settings/friendly_alias_restrict_chars)
  64. [friendly\_alias\_restrict\_chars\_pattern](administering-your-site/settings/system-settings/friendly_alias_restrict_chars_pattern)
  65. [friendly\_alias\_strip\_element\_tags](administering-your-site/settings/system-settings/friendly_alias_strip_element_tags)
  66. [friendly\_alias\_translit](administering-your-site/settings/system-settings/friendly_alias_translit)
  67. [friendly\_alias\_translit\_class](administering-your-site/settings/system-settings/friendly_alias_translit_class)
  68. [friendly\_alias\_translit\_class\_path](administering-your-site/settings/system-settings/friendly_alias_translit_class_path)
  69. [friendly\_alias\_trim\_chars](administering-your-site/settings/system-settings/friendly_alias_trim_chars)
  70. [friendly\_alias\_urls](administering-your-site/settings/system-settings/friendly_alias_urls)
  71. [friendly\_alias\_word\_delimiter](administering-your-site/settings/system-settings/friendly_alias_word_delimiter)
  72. [friendly\_alias\_word\_delimiters](administering-your-site/settings/system-settings/friendly_alias_word_delimiters)
  73. [friendly\_url\_prefix](administering-your-site/settings/system-settings/friendly_url_prefix)
  74. [friendly\_url\_suffix](administering-your-site/settings/system-settings/friendly_url_suffix)
  75. [friendly\_urls](administering-your-site/settings/system-settings/friendly_urls)
  76. [global\_duplicate\_uri\_check](administering-your-site/settings/system-settings/global_duplicate_uri_check)
  77. [hidemenu\_default](administering-your-site/settings/system-settings/hidemenu_default)
  78. [link\_tag\_scheme](administering-your-site/settings/system-settings/link_tag_scheme)
  79. [mail\_charset](administering-your-site/settings/system-settings/mail_charset)
  80. [mail\_encoding](administering-your-site/settings/system-settings/mail_encoding)
  81. [mail\_smtp\_auth](administering-your-site/settings/system-settings/mail_smtp_auth)
  82. [mail\_smtp\_helo](administering-your-site/settings/system-settings/mail_smtp_helo)
  83. [mail\_smtp\_hosts](administering-your-site/settings/system-settings/mail_smtp_hosts)
  84. [mail\_smtp\_keepalive](administering-your-site/settings/system-settings/mail_smtp_keepalive)
  85. [mail\_smtp\_pass](administering-your-site/settings/system-settings/mail_smtp_pass)
  86. [mail\_smtp\_port](administering-your-site/settings/system-settings/mail_smtp_port)
  87. [mail\_smtp\_prefix](administering-your-site/settings/system-settings/mail_smtp_prefix)
  88. [mail\_smtp\_single\_to](administering-your-site/settings/system-settings/mail_smtp_single_to)
  89. [mail\_smtp\_timeout](administering-your-site/settings/system-settings/mail_smtp_timeout)
  90. [mail\_smtp\_user](administering-your-site/settings/system-settings/mail_smtp_user)
  91. [mail\_use\_smtp](administering-your-site/settings/system-settings/mail_use_smtp)
  92. [manager\_date\_format](administering-your-site/settings/system-settings/manager_date_format)
  93. [manager\_direction](administering-your-site/settings/system-settings/manager_direction)
  94. [manager\_favicon\_url](administering-your-site/settings/system-settings/manager_favicon_url)
  95. [manager\_lang\_attribute](administering-your-site/settings/system-settings/manager_lang_attribute)
  96. [manager\_language](administering-your-site/settings/system-settings/manager_language)
  97. [manager\_theme](administering-your-site/settings/system-settings/manager_theme)
  98. [manager\_time\_format](administering-your-site/settings/system-settings/manager_time_format)
  99. [modx\_charset](administering-your-site/settings/system-settings/modx_charset)
  100. [new\_file\_permissions](administering-your-site/settings/system-settings/new_file_permissions)
  101. [new\_folder\_permissions](administering-your-site/settings/system-settings/new_folder_permissions)
  102. [password\_generated\_length](administering-your-site/settings/system-settings/password_generated_length)
  103. [password\_min\_length](administering-your-site/settings/system-settings/password_min_length)
  104. [phpthumb\_allow\_src\_above\_docroot](administering-your-site/settings/system-settings/phpthumb_allow_src_above_docroot)
  105. [phpthumb\_cache\_maxage](administering-your-site/settings/system-settings/phpthumb_cache_maxage)
  106. [phpthumb\_cache\_maxfiles](administering-your-site/settings/system-settings/phpthumb_cache_maxfiles)
  107. [phpthumb\_cache\_maxsize](administering-your-site/settings/system-settings/phpthumb_cache_maxsize)
  108. [phpthumb\_cache\_source\_enabled](administering-your-site/settings/system-settings/phpthumb_cache_source_enabled)
  109. [phpthumb\_document\_root](administering-your-site/settings/system-settings/phpthumb_document_root)
  110. [phpthumb\_error\_bgcolor](administering-your-site/settings/system-settings/phpthumb_error_bgcolor)
  111. [phpthumb\_error\_fontsize](administering-your-site/settings/system-settings/phpthumb_error_fontsize)
  112. [phpthumb\_error\_textcolor](administering-your-site/settings/system-settings/phpthumb_error_textcolor)
  113. [phpthumb\_far](administering-your-site/settings/system-settings/phpthumb_far)
  114. [phpthumb\_imagemagick\_path](administering-your-site/settings/system-settings/phpthumb_imagemagick_path)
  115. [phpthumb\_nohotlink\_enabled](administering-your-site/settings/system-settings/phpthumb_nohotlink_enabled)
  116. [phpthumb\_nohotlink\_erase\_image](administering-your-site/settings/system-settings/phpthumb_nohotlink_erase_image)
  117. [phpthumb\_nohotlink\_text\_message](administering-your-site/settings/system-settings/phpthumb_nohotlink_text_message)
  118. [phpthumb\_nohotlink\_valid\_domains](administering-your-site/settings/system-settings/phpthumb_nohotlink_valid_domains)
  119. [phpthumb\_nooffsitelink\_enabled](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_enabled)
  120. [phpthumb\_nooffsitelink\_erase\_image](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_erase_image)
  121. [phpthumb\_nooffsitelink\_require\_refer](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_require_refer)
  122. [phpthumb\_nooffsitelink\_text\_message](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_text_message)
  123. [phpthumb\_nooffsitelink\_valid\_domains](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_valid_domains)
  124. [phpthumb\_nooffsitelink\_watermark\_src](administering-your-site/settings/system-settings/phpthumb_nooffsitelink_watermark_src)
  125. [phpthumb\_zoomcrop](administering-your-site/settings/system-settings/phpthumb_zoomcrop)
  126. [principal\_targets](administering-your-site/settings/system-settings/principal_targets)
  127. [proxy\_auth\_type](administering-your-site/settings/system-settings/proxy_auth_type)
  128. [proxy\_host](administering-your-site/settings/system-settings/proxy_host)
  129. [proxy\_password](administering-your-site/settings/system-settings/proxy_password)
  130. [proxy\_port](administering-your-site/settings/system-settings/proxy_port)
  131. [proxy\_username](administering-your-site/settings/system-settings/proxy_username)
  132. [publish\_default](administering-your-site/settings/system-settings/publish_default)
  133. [rb\_base\_dir](administering-your-site/settings/system-settings/rb_base_dir)
  134. [rb\_base\_url](administering-your-site/settings/system-settings/rb_base_url)
  135. [request\_controller](administering-your-site/settings/system-settings/request_controller)
  136. [request\_param\_alias](administering-your-site/settings/system-settings/request_param_alias)
  137. [request\_param\_id](administering-your-site/settings/system-settings/request_param_id)
  138. [resource\_tree\_node\_name](administering-your-site/settings/system-settings/resource_tree_node_name)
  139. [resource\_tree\_node\_tooltip](administering-your-site/settings/system-settings/resource_tree_node_tooltip)
  140. [richtext\_default](administering-your-site/settings/system-settings/richtext_default)
  141. [search\_default](administering-your-site/settings/system-settings/search_default)
  142. [server\_offset\_time](administering-your-site/settings/system-settings/server_offset_time)
  143. [server\_protocol](administering-your-site/settings/system-settings/server_protocol)
  144. [session\_cookie\_domain](administering-your-site/settings/system-settings/session_cookie_domain)
  145. [session\_cookie\_lifetime](administering-your-site/settings/system-settings/session_cookie_lifetime)
  146. [session\_cookie\_path](administering-your-site/settings/system-settings/session_cookie_path)
  147. [session\_cookie\_secure](administering-your-site/settings/system-settings/session_cookie_secure)
  148. [session\_handler\_class](administering-your-site/settings/system-settings/session_handler_class)
  149. [session\_name](administering-your-site/settings/system-settings/session_name)
  150. [settings\_version](administering-your-site/settings/system-settings/settings_version)
  151. [signupemail\_message](administering-your-site/settings/system-settings/signupemail_message)
  152. [site\_name](administering-your-site/settings/system-settings/site_name)
  153. [site\_start](administering-your-site/settings/system-settings/site_start)
  154. [site\_status](administering-your-site/settings/system-settings/site_status)
  155. [site\_unavailable\_message](administering-your-site/settings/system-settings/site_unavailable_message)
  156. [site\_unavailable\_page](administering-your-site/settings/system-settings/site_unavailable_page)
  157. [strip\_image\_paths](administering-your-site/settings/system-settings/strip_image_paths)
  158. [symlink\_merge\_fields](administering-your-site/settings/system-settings/symlink_merge_fields)
  159. [tree\_default\_sort](administering-your-site/settings/system-settings/tree_default_sort)
  160. [tree\_root\_id](administering-your-site/settings/system-settings/tree_root_id)
  161. [tvs\_below\_content](administering-your-site/settings/system-settings/tvs_below_content)
  162. [udperms\_allowroot](administering-your-site/settings/system-settings/udperms_allowroot)
  163. [ui\_debug\_mode](administering-your-site/settings/system-settings/ui_debug_mode)
  164. [unauthorized\_page](administering-your-site/settings/system-settings/unauthorized_page)
  165. [upload\_maxsize](administering-your-site/settings/system-settings/upload_maxsize)
  166. [use\_alias\_path](administering-your-site/settings/system-settings/use_alias_path)
  167. [use\_browser](administering-your-site/settings/system-settings/use_browser)
  168. [use\_editor](administering-your-site/settings/system-settings/use_editor)
  169. [use\_multibyte](administering-your-site/settings/system-settings/use_multibyte)
  170. [welcome\_screen](administering-your-site/settings/system-settings/welcome_screen)
  171. [which\_editor](administering-your-site/settings/system-settings/which_editor)
  172. [which\_element\_editor](administering-your-site/settings/system-settings/which_element_editor)
  173. [xhtml\_urls](administering-your-site/settings/system-settings/xhtml_urls)