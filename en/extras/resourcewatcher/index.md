---
title: "ResourceWatcher"
_old_id: "700"
_old_uri: "revo/resourcewatcher"
---

- [What is ResourceWatcher?](#ResourceWatcher-WhatisResourceWatcher%3F)
- [Installation](#ResourceWatcher-Installation)
- [Configuration - System Settings](#ResourceWatcher-ConfigurationSystemSettings)
  - [General](#ResourceWatcher-General)
  - [Created resource](#ResourceWatcher-Createdresource)
  - [Updated resource](#ResourceWatcher-Updatedresource)
- [Placeholders (message chunks)](#ResourceWatcher-Placeholders%28messagechunks%29)
- [Hooks](#ResourceWatcher-Hooks)
- [Resources](#ResourceWatcher-Resources)



## What is ResourceWatcher?

Resource Watcher is a plugin for MODx Revolution allowing you to send notification emails when a resource is created and/or updated.

## Installation

1. Installing from package manager
2. Configure the proper system settings

Note: By default, the email address used to send the notifications is defined in the system settings (emailsender key). The name of the sender is the site name, defined in the system settings (site\_name key).

## Configuration - System Settings

### General

| Name | Description | Default Value |
|------|-------------|---------------|
| resourcewatcher.prefix | (string) - Prefix for placeholders used in the message chunk | rw. |

### Created resource

| Name | Description | Default Value |
|------|-------------|---------------|
| resourcewatcher.new\_active | (boolean) - Sets whether the plugin is active upon resource creation | false |
| resourcewatcher.new\_email | (string) - Email address(es) to send the notifications to |  |
| resourcewatcher.new\_hooks | (string) - List of hooks (snippets) to execute when a resource is created |  |
| resourcewatcher.new\_subject | (string) - Subject of the notification emails | A new resource has been created |
| resourcewatcher.new\_tpl | (string) - Chunk to use as the message of the e-mail when creating new resources | message-create |

### Updated resource

| Name | Description | Default Value |
|------|-------------|---------------|
| resourcewatcher.upd\_active | (boolean) - Sets whether the plugin is active upon resource edition/update | false |
| resourcewatcher.upd\_email | (string) - Email address(es) to send the notifications to |  |
| resourcewatcher.upd\_hooks | (string) - List of hooks (snippets) to execute when a resource is updated |  |
| resourcewatcher.upd\_subject | (string) - Subject of the notification emails | A resource has been updated |
| resourcewatcher.upd\_tpl | (string) - Chunk to use as the message of the e-mail when updating a resource | message-update |

## Placeholders (message chunks)

Placeholders (prefixed by default with "rw.") can be used in chunks used as a message. The available information/placeholders are the modUser, modUserProfile and modResource fields. Here is a small list (not exhaustive)

| Name | Description |
|------|-------------|
| prefix.id | ID of the resource |
| prefix.pagetitle | pagetitle field of the resource |
| prefix.username | name of the user who did the action |
| prefix.fullname | full name of the user who performed the action |

## Hooks

By default, all resources in all settings are "monitored". You can add constraints by using hooks (snippets).

The hooks are cumulative (and executed in the order in which you have filled in the System Setting).

Your hook should contain your constraints and return true if they are satisfied (otherwise false).

## Resources

Github: <https://github.com/meltingmedia/ResourceWatcher>
Bug reports/feature requests: <https://github.com/meltingmedia/ResourceWatcher/issues>