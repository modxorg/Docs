---
title: "Core processor list"
description: "Catalog of core processors in MODX 3.x with action paths, short descriptions, and permissions"
---

## Core processor list (MODX 3.x)

This page lists **callable core processors** under `core/src/Revolution/Processors/`. Paths work with [`modX::runProcessor`](extending-modx/modx-class/reference/modx.runprocessor) as slash actions (`resource/create`) or as namespaced classes (`\\MODX\\Revolution\\Processors\\Resource\\Create`).

Notes:

- Built from class docblocks and `$permission` on MODX Revolution **3.x**. Wording follows the source.
- Skips abstract bases, `Model\\*Processor` helpers, and Template Variable Configs/Renders (manager UI pieces, not typical `runProcessor` targets).
- For Template Variables the folder is `Element/TemplateVar/`. Slash form `element/templatevar/` resolves. Legacy `element/tv/` is rewritten to TemplateVar in the loader.
- Permission is the processor `$permission` property when set. An empty cell means the class does not declare one (access may still be checked in `checkPermissions()` or elsewhere).
- Exact required properties differ per processor. Open the class file when a call fails validation.

Total in this catalog: **379** processors.

See also: [Processors overview](extending-modx/processors), [Using runProcessor](extending-modx/processors/using-runprocessor).

## Browser (files and directories)

16 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `browser/directory/create` | Create a directory. | `directory_create` |
| `browser/directory/getfiles` | Gets all files in a directory | `file_list` |
| `browser/directory/getlist` | Get a list of directories and files, sorting them first by folder/file and then alphanumerically. | `directory_list` |
| `browser/directory/remove` | Remove a directory | `directory_remove` |
| `browser/directory/rename` | Renames a directory | `directory_update` |
| `browser/directory/sort` | Sort a directory. | `directory_update` |
| `browser/directory/update` | Renames a directory. |  |
| `browser/file/create` | Creates a file. | `file_create` |
| `browser/file/download` | Send a file to user | `file_view` |
| `browser/file/get` | Gets the contents of a file | `file_view` |
| `browser/file/remove` | Removes a file. | `file_remove` |
| `browser/file/rename` | Renames a file | `file_update` |
| `browser/file/unpack` | Unpacks archives, currently only zip | `file_unpack` |
| `browser/file/update` | Updates a file. | `file_update` |
| `browser/file/upload` | Upload files to a directory | `file_upload` |
| `browser/visibility` | Set visibility on a directory or file | `directory_chmod` |

## Context

19 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `context/create` | Creates a context | `new_context` |
| `context/duplicate` | Duplicates a context. | `new_context` |
| `context/get` | Grabs a context | `view_context` |
| `context/getlist` | Grabs a list of contexts. | `view_context` |
| `context/group/create` | Create a Context Group. | `new_context` |
| `context/group/get` | Get a Context Group. | `view_context` |
| `context/group/getlist` | Get a list of Context Groups. | `view_context` |
| `context/group/remove` | Remove a Context Group and unassign its Contexts. | `delete_context` |
| `context/group/update` | Update a Context Group. | `edit_context` |
| `context/group/updatefromgrid` | Update a Context Group from a grid row (JSON data). |  |
| `context/remove` | Removes a context | `delete_context` |
| `context/setting/create` | Creates a context setting | `settings` |
| `context/setting/get` | Gets a context setting | `settings` |
| `context/setting/getlist` | Get a list of context settings | `settings` |
| `context/setting/remove` | Removes a context setting. |  |
| `context/setting/update` | Updates a context setting |  |
| `context/setting/updatefromgrid` | Updates a setting from a grid. Passed as JSON data. |  |
| `context/update` | Updates a context. | `edit_context` |
| `context/updatefromgrid` | Update a context from a grid. Passed as JSON data. |  |

## Element (Chunks, Snippets, Plugins, Templates, TVs, Property Sets)

68 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `element/category/create` | Create a category. | `save_category` |
| `element/category/get` | Gets a category. | `view_category` |
| `element/category/getlist` | Grabs a list of Categories. |  |
| `element/category/remove` | Deletes a category. Resets all elements with that category to 0. | `delete_category` |
| `element/category/update` | Update a category. | `save_category` |
| `element/chunk/create` | Creates a chunk. | `new_chunk` |
| `element/chunk/duplicate` | Duplicates a chunk. | `new_chunk` |
| `element/chunk/get` | Gets a chunk. | `view_chunk` |
| `element/chunk/getlist` | Grabs a list of chunks. | `view_chunk` |
| `element/chunk/remove` | Removes a chunk. | `delete_chunk` |
| `element/chunk/update` | Updates a chunk. | `save_chunk` |
| `element/duplicate` | Abstract class for Duplicate Element processors. To be extended for each derivative element type. |  |
| `element/exportproperties` | Export properties and output url to download to browser |  |
| `element/getclasses` | Outputs a list of Element subclasses |  |
| `element/getinsertproperties` | Class GetInsertProperties |  |
| `element/getlistbyclass` | Grabs a list of elements by their subclass |  |
| `element/getnodes` | Grabs all elements for element tree |  |
| `element/importproperties` | Import properties from a file |  |
| `element/plugin/activate` | Activate a plugin. | `save_plugin` |
| `element/plugin/create` | Creates a plugin | `new_plugin` |
| `element/plugin/deactivate` | Deactivate a plugin. | `save_plugin` |
| `element/plugin/duplicate` | Duplicate a plugin | `new_plugin` |
| `element/plugin/event/associate` | Associate the event to the plugins. | `save_plugin` |
| `element/plugin/event/get` | Get Plugin event | `view_plugin` |
| `element/plugin/event/getassoc` | Gets a list of plugins associated to system event | `view_plugin` |
| `element/plugin/event/getlist` | Gets a list of system events | `view_plugin` |
| `element/plugin/event/remove` | Remove Event from a Plugin | `delete_plugin` |
| `element/plugin/event/update` | Update Plugin Event | `save_plugin` |
| `element/plugin/event/updatefromgrid` | Update Plugin event from the grid |  |
| `element/plugin/get` | Get a plugin | `view_plugin` |
| `element/plugin/getlist` | Grabs a list of plugins. | `view_plugin` |
| `element/plugin/remove` | Delete a plugin. | `delete_plugin` |
| `element/plugin/update` | Update a plugin. | `save_plugin` |
| `element/propertyset/addelement` | Adds an element to a Property Set | `save_propertyset` |
| `element/propertyset/associate` | Associates a property set to an element, or creates a property set |  |
| `element/propertyset/create` | Creates a property set | `new_propertyset` |
| `element/propertyset/duplicate` | Duplicates a property set | `new_propertyset` |
| `element/propertyset/get` | Grabs a property set | `view_propertyset` |
| `element/propertyset/getlist` | Grabs a list of property sets for building dropdown (combo) fields. | `view_propertyset` |
| `element/propertyset/getnodes` | Grabs all elements for propertyset tree | `view_propertyset` |
| `element/propertyset/getproperties` | Gets properties for a property set |  |
| `element/propertyset/remove` | Removes a property set | `delete_propertyset` |
| `element/propertyset/removeelement` | Removes an element from a Property Set | `delete_propertyset` |
| `element/propertyset/update` | Updates a property set | `save_propertyset` |
| `element/propertyset/updatefromelement` | Saves a property set |  |
| `element/snippet/create` | Create a snippet. | `new_snippet` |
| `element/snippet/duplicate` | Duplicate a snippet. | `new_snippet` |
| `element/snippet/get` | Get a snippet. | `view_snippet` |
| `element/snippet/getlist` | Grabs a list of snippets. | `view_snippet` |
| `element/snippet/remove` | Delete a snippet. | `delete_snippet` |
| `element/snippet/update` | Update a snippet | `save_snippet` |
| `element/sort` | Sorts elements in the element tree |  |
| `element/template/create` | Create a template | `new_template` |
| `element/template/duplicate` | Duplicate a Template. | `new_template` |
| `element/template/get` | Gets a template | `view_template` |
| `element/template/getlist` | Grabs a list of templates. | `view_template` |
| `element/template/remove` | Deletes a template. | `delete_template` |
| `element/template/templatevar/getlist` | Gets a list of TVs, marking ones associated with the template. |  |
| `element/template/update` | Update a template | `save_template` |
| `element/templatevar/create` | Create a Template Variable. | `new_tv` |
| `element/templatevar/duplicate` | Duplicate a TV | `new_tv` |
| `element/templatevar/get` | Gets a TV | `view_tv` |
| `element/templatevar/getlist` | Grabs a list of TVs. | `view_tv` |
| `element/templatevar/remove` | Delete a TV | `delete_tv` |
| `element/templatevar/resourcegroup/getlist` | Gets a list of resource groups associated to a TV. |  |
| `element/templatevar/template/getlist` | Grabs a list of templates associated with the TV |  |
| `element/templatevar/template/updatefromgrid` | Assigns or unassigns a template to a TV. Passed in JSON data. |  |
| `element/templatevar/update` | Updates a TV | `save_tv` |

## Resource

27 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `resource/create` | Creates a resource. | `new_document` |
| `resource/data` | Returns resource data. |  |
| `resource/delete` | Deletes a resource. | `delete_document` |
| `resource/duplicate` | Duplicates a resource, and optionally, all of its children. |  |
| `resource/emptyrecyclebin` | Empties the recycle bin. |  |
| `resource/event/getlist` | Grabs the site schedule data. |  |
| `resource/event/updatefromgrid` | Update a resource from the site schedule grid. |  |
| `resource/get` | Retrieves a resource by its ID. | `view` |
| `resource/getlist` | Gets a list of resources. | `view` |
| `resource/getnodes` | Get nodes for the resource tree |  |
| `resource/gettoolbar` | Gets a dynamic toolbar for the Resource tree. |  |
| `resource/locks/release` | Release a lock on a resource |  |
| `resource/locks/steal` | Steal a lock on a resource |  |
| `resource/publish` | Publishes a resource. |  |
| `resource/reload` | save resource form data for reload |  |
| `resource/resourcegroup/getlist` | Grabs a list of resource groups for a resource. |  |
| `resource/resourcegroup/updatefromgrid` | Assign or unassigns a resource group to a resource. | `resource` |
| `resource/search` | Searches for specific resources and returns them in an array. | `search` |
| `resource/sort` | Sorts the resource tree |  |
| `resource/translit` | Retrieves a string and returns it transliterated to use in various applications but mainly for real-time alias |  |
| `resource/trash/getlist` | Gets a list of resources for trash manager. | `view` |
| `resource/trash/purge` | Empties the recycle bin. |  |
| `resource/trash/restore` | Restores deleted files. |  |
| `resource/undelete` | Undeletes a resource. |  |
| `resource/unpublish` | Unpublishes a resource. |  |
| `resource/update` | Updates a resource. | `save_document` |
| `resource/updatefromgrid` | _(no class docblock)_ | `save_document` |

## Search

1 processor.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `search/search` | Searches for elements, resources and users |  |

## Security (users, ACLs, forms, messages)

128 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `security/access/addacl` | Adds an ACL | `access_permissions` |
| `security/access/flush` | Flushes permissions for the logged in user. |  |
| `security/access/getacl` | Gets an ACL. | `access_permissions` |
| `security/access/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/getnodes` | Gets a node list of ACLs | `access_permissions` |
| `security/access/permission/getlist` | _(no class docblock)_ | `access_permissions` |
| `security/access/policy/create` | Create an access policy. | `policy_new` |
| `security/access/policy/duplicate` | Duplicates a policy | `policy_new` |
| `security/access/policy/export` | Export a policy template. | `policy_view` |
| `security/access/policy/getlist` | Gets a list of policies. | `policy_view` |
| `security/access/policy/import` | Import a policy template. | `policy_view` |
| `security/access/policy/remove` | Removes a policy | `policy_delete` |
| `security/access/policy/removemultiple` | Removes multiple policies | `policy_delete` |
| `security/access/policy/template/create` | Create an access policy template | `policy_template_new` |
| `security/access/policy/template/duplicate` | Duplicates a policy template | `policy_template_new` |
| `security/access/policy/template/export` | Export a policy template. | `policy_template_view` |
| `security/access/policy/template/getlist` | Gets a list of policy templates. | `policy_template_view` |
| `security/access/policy/template/group/getlist` | Gets a list of policy template groups. | `policy_template_view` |
| `security/access/policy/template/import` | Import a policy template. | `policy_template_view` |
| `security/access/policy/template/remove` | Removes a policy template | `policy_template_delete` |
| `security/access/policy/template/removemultiple` | Removes multiple policy templates | `policy_template_delete` |
| `security/access/policy/template/update` | Updates a policy template | `policy_template_save` |
| `security/access/policy/template/updatefromgrid` | Update a policy template from a grid |  |
| `security/access/policy/update` | Updates a policy | `policy_save` |
| `security/access/policy/updatefromgrid` | Update a policy from a grid |  |
| `security/access/removeacl` | Remove an ACL. | `access_permissions` |
| `security/access/updateacl` | Update an ACL. | `access_permissions` |
| `security/access/usergroup/accessnamespace/create` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/accessnamespace/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/usergroup/accessnamespace/remove` | Remove a Resource Group ACL for a user group | `access_permissions` |
| `security/access/usergroup/accessnamespace/update` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/category/create` | Class Create | `access_permissions` |
| `security/access/usergroup/category/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/usergroup/category/remove` | Remove a Resource Group ACL for a user group | `access_permissions` |
| `security/access/usergroup/category/update` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/context/create` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/context/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/usergroup/context/remove` | Remove a context ACL for a user group | `access_permissions` |
| `security/access/usergroup/context/update` | Update ACL for Context | `access_permissions` |
| `security/access/usergroup/resourcegroup/create` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/resourcegroup/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/usergroup/resourcegroup/remove` | Remove a Resource Group ACL for a user group | `access_permissions` |
| `security/access/usergroup/resourcegroup/update` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/source/create` | _(no class docblock)_ | `access_permissions` |
| `security/access/usergroup/source/getlist` | Gets a list of ACLs. | `access_permissions` |
| `security/access/usergroup/source/remove` | Remove a Media Source ACL for a user group | `access_permissions` |
| `security/access/usergroup/source/update` | _(no class docblock)_ | `access_permissions` |
| `security/flush` | Flush all sessions |  |
| `security/forms/profile/activate` | Activate a FC Profile | `customize_forms` |
| `security/forms/profile/activatemultiple` | Activate multiple FC Profiles |  |
| `security/forms/profile/create` | Create a FC Profile | `customize_forms` |
| `security/forms/profile/deactivate` | Deactivate a FC Profile | `customize_forms` |
| `security/forms/profile/deactivatemultiple` | Deactivate multiple FC Profiles |  |
| `security/forms/profile/duplicate` | Duplicate a FC Profile | `customize_forms` |
| `security/forms/profile/getlist` | Gets a list of Form Customization profiles. | `customize_forms` |
| `security/forms/profile/remove` | Remove FC Profile | `customize_forms` |
| `security/forms/profile/removemultiple` | Remove multiple FC profiles |  |
| `security/forms/profile/update` | Update a FC Profile | `customize_forms` |
| `security/forms/profile/updatefromgrid` | Update a FC Profile from grid |  |
| `security/forms/set/activate` | Activate a FC Set | `customize_forms` |
| `security/forms/set/activatemultiple` | Activate multiple FC Sets |  |
| `security/forms/set/create` | Create a FC Set | `customize_forms` |
| `security/forms/set/deactivate` | Deactivate a FC Set | `customize_forms` |
| `security/forms/set/deactivatemultiple` | Deactivate multiple FC Sets |  |
| `security/forms/set/duplicate` | Duplicate a FC Set | `customize_forms` |
| `security/forms/set/export` | Export a form customization set. | `customize_forms` |
| `security/forms/set/getlist` | Gets a list of Form Customization sets. | `customize_forms` |
| `security/forms/set/import` | Import a Form Customization Set from an XML file | `customize_forms` |
| `security/forms/set/remove` | Remove a FC Set | `customize_forms` |
| `security/forms/set/removemultiple` | Remove multiple FC sets |  |
| `security/forms/set/update` | Saves a Form Customization Set. | `customize_forms` |
| `security/forms/set/updatefromgrid` | Update a FC Profile from grid | `customize_forms` |
| `security/group/create` | Create a user group | `usergroup_new` |
| `security/group/getlist` | Gets a list of user groups | `usergroup_view` |
| `security/group/getnodes` | Get the user groups in tree node format |  |
| `security/group/remove` | Remove a user group | `usergroup_delete` |
| `security/group/setting/create` | Create a User Group setting |  |
| `security/group/setting/getlist` | Gets a list of user group settings |  |
| `security/group/setting/remove` | Remove a user group setting and its lexicon strings |  |
| `security/group/setting/update` | Update a user group setting |  |
| `security/group/setting/updatefromgrid` | Update a user group setting from a grid |  |
| `security/group/sort` | Sort users and user groups, effectively repositioning users into proper groups |  |
| `security/group/update` | Update a user group | `usergroup_save` |
| `security/group/user/create` | Add a user to a user group |  |
| `security/group/user/getlist` | Gets a list of users in a usergroup | `usergroup_user_list` |
| `security/group/user/remove` | Remove a user from a user group |  |
| `security/group/user/update` | Update a users role in a user group |  |
| `security/login` | Properly log in the user and set up the session. |  |
| `security/logout` | Properly log out the user, running any events and flushing the session. |  |
| `security/message/create` | Create a message | `messages` |
| `security/message/getlist` | Get a list of messages | `messages` |
| `security/message/read` | Mark a message as read | `messages` |
| `security/message/remove` | Remove a message | `messages` |
| `security/message/unread` | Mark a message as unread | `messages` |
| `security/profile/changepassword` | Change a user's password |  |
| `security/profile/get` | Get a user profile |  |
| `security/profile/update` | Update a user profile |  |
| `security/resourcegroup/create` | Create a resource group | `resourcegroup_new` |
| `security/resourcegroup/getlist` | Gets a list of resource groups | `resourcegroup_view` |
| `security/resourcegroup/getnodes` | Get the resource groups as nodes |  |
| `security/resourcegroup/remove` | Remove a resource group |  |
| `security/resourcegroup/removeresource` | Remove a resource-resourcegroup pairing |  |
| `security/resourcegroup/update` | Update a resource group |  |
| `security/resourcegroup/updateresourcesin` | Update documents in a resource group | `resourcegroup_resource_edit` |
| `security/role/create` | Creates a role from a POST request. | `new_role` |
| `security/role/get` | Gets a role | `view_role` |
| `security/role/getauthoritylist` | Gets a list of roles |  |
| `security/role/getlist` | Gets a list of roles | `view_role` |
| `security/role/remove` | Removes a role. | `delete_role` |
| `security/role/update` | Update a role from a POST request | `save_role` |
| `security/role/updatefromgrid` | Updates a role from a grid. Passed as JSON data |  |
| `security/user/activatemultiple` | Activate multiple users |  |
| `security/user/create` | Create a user | `new_user` |
| `security/user/deactivatemultiple` | Deactivate multiple users |  |
| `security/user/delete` | Deletes a user | `delete_user` |
| `security/user/duplicate` | Duplicates a user. | `new_user` |
| `security/user/get` | Get a user | `view_user` |
| `security/user/getlist` | Gets a list of users | `view_user` |
| `security/user/getonline` | Gets a list of all users who are online |  |
| `security/user/getrecentlyeditedresources` | Gets a list of recently edited resources by a user | `view_document` |
| `security/user/removemultiple` | Remove multiple users |  |
| `security/user/setting/create` | Create a user setting |  |
| `security/user/setting/getlist` | Gets a list of user settings |  |
| `security/user/setting/remove` | Remove a user setting and its lexicon strings |  |
| `security/user/setting/update` | Updates a user setting |  |
| `security/user/setting/updatefromgrid` | Updates a setting from a grid |  |
| `security/user/update` | Update a user. | `save_user` |
| `security/user/updatefromgrid` | Update a user from a grid |  |

## Software update

3 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `softwareupdate/base` | Provides base methods and shared properties for building status data used in the front end display of software updates (MODX and Extras) |  |
| `softwareupdate/getfile` | Retrieves the downloadable file URL and other metadata for the specified MODX upgrade package |  |
| `softwareupdate/getlist` | Retrieves status data for use in the front end display of software updates (MODX and Extras) |  |

## Media Source

8 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `source/create` | Creates a Media Source | `source_save` |
| `source/duplicate` | Duplicates a source. | `source_save` |
| `source/getlist` | Gets a list of Media Sources | `source_view` |
| `source/remove` | Removes a Media Source | `source_delete` |
| `source/removemultiple` | Removes multiple Media Sources |  |
| `source/type/getlist` | Gets a list of media source types |  |
| `source/update` | Updates a Media Source | `source_save` |
| `source/updatefromgrid` | Update a Source from the grid. Sent through JSON-encoded 'data' parameter. |  |

## System (settings, menus, dashboards, logs)

72 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `system/activeresource/getlist` | Gets a list of active resources | `view_document` |
| `system/charset/getlist` | Gets a list of charsets |  |
| `system/clearcache` | Refreshes the site cache |  |
| `system/configcheck` | Runs a config check |  |
| `system/configjs` | Outputs the $modx->config to JSON |  |
| `system/console` | Read from the registry to console |  |
| `system/contenttype/create` | Create a content type | `content_types` |
| `system/contenttype/getlist` | Gets a list of content types |  |
| `system/contenttype/remove` | Removes a content type | `content_types` |
| `system/contenttype/update` | Update a content type from the grid. Sent through JSON-encoded 'data' parameter. | `content_types` |
| `system/contenttype/updatefromgrid` | Update a content type from the grid. Sent through JSON-encoded 'data' parameter. |  |
| `system/country/getlist` | Gets a list of country codes |  |
| `system/dashboard/create` | Creates a Dashboard | `dashboards` |
| `system/dashboard/duplicate` | Duplicates a dashboard. | `dashboards` |
| `system/dashboard/getlist` | Gets a list of dashboards | `dashboards` |
| `system/dashboard/remove` | Removes a Dashboard | `dashboards` |
| `system/dashboard/removemultiple` | Removes multiple Dashboards |  |
| `system/dashboard/update` | Updates a Dashboard | `dashboards` |
| `system/dashboard/updatefromgrid` | Update a Dashboard from the grid. Sent through JSON-encoded 'data' parameter. |  |
| `system/dashboard/user/create` | Class Create |  |
| `system/dashboard/user/getlist` | Class GetList |  |
| `system/dashboard/user/remove` | Class Remove |  |
| `system/dashboard/user/resize` | Class Resize |  |
| `system/dashboard/user/sort` | Class Sort |  |
| `system/dashboard/widget/create` | Creates a new Dashboard Widget | `dashboards` |
| `system/dashboard/widget/feed` | Class modDashboardWidgetFeedProcessor Used to load the news and security feeds on the dashboard over AJAX. The processed feed content (i.e. HTML) is returned in object->html. |  |
| `system/dashboard/widget/getlist` | Gets a list of dashboards | `dashboards` |
| `system/dashboard/widget/remove` | Removes a Dashboard Widget | `dashboards` |
| `system/dashboard/widget/removemultiple` | Removes multiple Dashboard Widgets |  |
| `system/dashboard/widget/update` | Updates a Dashboard Widget | `dashboards` |
| `system/databasetable/getlist` | Gets a list of database tables |  |
| `system/databasetable/mysql/getlist` | MySQL-specific table listing processor |  |
| `system/databasetable/mysql/optimize` | _(no class docblock)_ |  |
| `system/databasetable/mysql/optimizedatabase` | _(no class docblock)_ |  |
| `system/databasetable/mysql/truncate` | _(no class docblock)_ |  |
| `system/databasetable/optimize` | Optimize a database table |  |
| `system/databasetable/optimizedatabase` | Optimize a database |  |
| `system/databasetable/truncate` | Truncate a database table |  |
| `system/deprecatedlog/clear` | Clear the error log |  |
| `system/deprecatedlog/getlist` | Get a list of system settings |  |
| `system/derivatives/getlist` | Gets a list of derivative classes for a class |  |
| `system/downloadoutput` | Output data to a file for downloading |  |
| `system/errorlog/clear` | Clear the error log |  |
| `system/errorlog/download` | Grab and download the error log |  |
| `system/errorlog/get` | Grab and output the error log |  |
| `system/event/create` | Create a system event | `events` |
| `system/event/getlist` | Gets a list of system events |  |
| `system/event/grouplist` | Create a system setting |  |
| `system/event/remove` | Remove a system even | `events` |
| `system/info` | Removes locks on all objects |  |
| `system/language/getlist` | Grabs a list of lexicon languages |  |
| `system/log/getlist` | Gets a list of manager log actions |  |
| `system/log/truncate` | Clears the manager log actions |  |
| `system/menu/create` | Creates a menu item | `menus` |
| `system/menu/getlist` | Get a list of menu items | `menus` |
| `system/menu/getnodes` | Get the menu items, in node format | `menus` |
| `system/menu/remove` | Remove a menu item | `menus` |
| `system/menu/sort` | Sort menu items for a tree |  |
| `system/menu/update` | Update a menu item | `menus` |
| `system/phpinfo` | Display phpinfo() |  |
| `system/phpthumb` | Generate a thumbnail |  |
| `system/refreshuris` | Regenerate the system's Resource URIs in the database |  |
| `system/registry/register/read` | Read from the registry |  |
| `system/registry/register/send` | Send a message to the registry. |  |
| `system/removelocks` | Removes locks on all objects |  |
| `system/rte/getlist` | Get a list of registered RTEs |  |
| `system/settings/create` | Create a system setting | `settings` |
| `system/settings/getareas` | Get a list of setting areas | `settings` |
| `system/settings/getlist` | Get a list of system settings | `settings` |
| `system/settings/remove` | Remove a system setting | `settings` |
| `system/settings/update` | Update a system setting | `settings` |
| `system/settings/updatefromgrid` | Update a setting from a grid |  |

## Workspace (packages, lexicon, namespaces)

37 processors.

| Action | Description | Permission |
| ------ | ----------- | ---------- |
| `workspace/lexicon/create` | Updates a lexicon entry from a grid |  |
| `workspace/lexicon/getlist` | Gets a list of lexicon entries |  |
| `workspace/lexicon/reloadfrombase` | Regenerates strings from the base lexicon files, resetting any customizations. |  |
| `workspace/lexicon/revert` | Updates a lexicon entry from a grid |  |
| `workspace/lexicon/topic/getlist` | Gets a list of lexicon topics |  |
| `workspace/lexicon/updatefromgrid` | Updates a lexicon entry from a grid |  |
| `workspace/packagenamespace/create` | Creates a namespace | `namespaces` |
| `workspace/packagenamespace/getlist` | Gets a list of namespaces | `namespaces` |
| `workspace/packagenamespace/remove` | Removes a namespace. | `namespaces` |
| `workspace/packagenamespace/removemultiple` | Removes namespaces. |  |
| `workspace/packagenamespace/update` | Updates a namespace from a grid | `namespaces` |
| `workspace/packagenamespace/updatefromgrid` | Updates a namespace from a grid |  |
| `workspace/packages/checkforupdates` | Update a package from its provider. |  |
| `workspace/packages/dependency/download` | Download a package by resolving dependent package constraints |  |
| `workspace/packages/get` | Gets a Transport Package. | `packages` |
| `workspace/packages/getattribute` | Gets an attribute of a package |  |
| `workspace/packages/getdependencies` | Gets a list of packages | `packages` |
| `workspace/packages/getlist` | Gets a list of packages | `packages` |
| `workspace/packages/install` | Install a package |  |
| `workspace/packages/purge` | Purge old package versions |  |
| `workspace/packages/remove` | Remove a package |  |
| `workspace/packages/rest/download` | Download a package by passing in its location |  |
| `workspace/packages/rest/getinfo` | _(no class docblock)_ |  |
| `workspace/packages/rest/getlist` | _(no class docblock)_ |  |
| `workspace/packages/rest/getnodes` | _(no class docblock)_ |  |
| `workspace/packages/scanlocal` | Scans for local packages to add to the workspace. |  |
| `workspace/packages/uninstall` | Uninstall a package |  |
| `workspace/packages/update` | Gets a chunk. |  |
| `workspace/packages/upload` | Upload transport package to Packages directory |  |
| `workspace/packages/version/getlist` | Gets a list of package versions for a package | `packages` |
| `workspace/packages/version/remove` | Remove a package |  |
| `workspace/providers/create` | Create a provider | `providers` |
| `workspace/providers/getlist` | Gets a list of providers | `providers` |
| `workspace/providers/remove` | Remove a provider | `providers` |
| `workspace/providers/update` | Update a provider | `providers` |
| `workspace/providers/updatefromgrid` | Update a provider from a grid |  |
| `workspace/theme/getlist` | Grabs a list of manager themes | `settings` |

