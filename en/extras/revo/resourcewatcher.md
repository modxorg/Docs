---
title: "ResourceWatcher"
_old_id: "700"
_old_uri: "revo/resourcewatcher"
---

<div>- [What is ResourceWatcher?](#ResourceWatcher-WhatisResourceWatcher%3F)
- [Installation](#ResourceWatcher-Installation)
- [Configuration - System Settings](#ResourceWatcher-ConfigurationSystemSettings)
  - [General](#ResourceWatcher-General)
  - [Created resource](#ResourceWatcher-Createdresource)
  - [Updated resource](#ResourceWatcher-Updatedresource)
- [Placeholders (message chunks)](#ResourceWatcher-Placeholders%28messagechunks%29)
- [Hooks](#ResourceWatcher-Hooks)
- [Resources](#ResourceWatcher-Resources)

</div>What is ResourceWatcher?
------------------------

Resource Watcher is a plugin for MODx Revolution allowing you to send notification emails when a resource is created and/or updated.

Installation
------------

1. Installing from package manager
2. Configure the proper system settings

Note: By default, the email address used to send the notifications is defined in the system settings (emailsender key). The name of the sender is the site name, defined in the system settings (site\_name key).

Configuration - System Settings
-------------------------------

### General

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>resourcewatcher.prefix</td><td>(string) - Prefix for placeholders used in the message chunk</td><td>rw.</td></tr></tbody></table>### Created resource

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>resourcewatcher.new\_active</td><td>(boolean) - Sets whether the plugin is active upon resource creation</td><td>false</td></tr><tr><td>resourcewatcher.new\_email</td><td>(string) - Email address(es) to send the notifications to</td><td> </td></tr><tr><td>resourcewatcher.new\_hooks</td><td>(string) - List of hooks (snippets) to execute when a resource is created</td><td> </td></tr><tr><td>resourcewatcher.new\_subject</td><td>(string) - Subject of the notification emails</td><td>A new resource has been created</td></tr><tr><td>resourcewatcher.new\_tpl</td><td>(string) - Chunk to use as the message of the e-mail when creating new resources</td><td>message-create</td></tr></tbody></table>### Updated resource

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>resourcewatcher.upd\_active</td><td>(boolean) - Sets whether the plugin is active upon resource edition/update</td><td>false</td></tr><tr><td>resourcewatcher.upd\_email</td><td>(string) - Email address(es) to send the notifications to</td><td> </td></tr><tr><td>resourcewatcher.upd\_hooks</td><td>(string) - List of hooks (snippets) to execute when a resource is updated</td><td> </td></tr><tr><td>resourcewatcher.upd\_subject</td><td>(string) - Subject of the notification emails</td><td>A resource has been updated</td></tr><tr><td>resourcewatcher.upd\_tpl</td><td>(string) - Chunk to use as the message of the e-mail when updating a resource</td><td>message-update</td></tr></tbody></table>Placeholders (message chunks)
-----------------------------

Placeholders (prefixed by default with "rw.") can be used in chunks used as a message. The available information/placeholders are the modUser, modUserProfile and modResource fields. Here is a small list (not exhaustive)

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>prefix.id</td><td>ID of the resource</td></tr><tr><td>prefix.pagetitle</td><td>pagetitle field of the resource</td></tr><tr><td>prefix.username</td><td>name of the user who did the action</td></tr><tr><td>prefix.fullname</td><td>full name of the user who performed the action</td></tr></tbody></table>Hooks
-----

By default, all resources in all settings are "monitored". You can add constraints by using hooks (snippets).

The hooks are cumulative (and executed in the order in which you have filled in the System Setting).

Your hook should contain your constraints and return true if they are satisfied (otherwise false).

Resources
---------

Github: <https://github.com/meltingmedia/ResourceWatcher>  
Bug reports/feature requests: <https://github.com/meltingmedia/ResourceWatcher/issues>