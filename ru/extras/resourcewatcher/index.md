---
title: "ResourceWatcher"
description: "Плагин для отправки email-уведомлений при создании и обновлении ресурсов"
translation: "extras/resourcewatcher/index"
---

## Что такое ResourceWatcher?

Resource Watcher это плагин для MODX Revolution, который отправляет email-уведомления при создании и/или обновлении ресурса.

## Установка

1. Установка через package manager
2. Настройка system settings

Примечание: по умолчанию адрес отправителя задаётся в system settings (ключ emailsender). Имя отправителя это site name (ключ site\_name).

## Конфигурация. System Settings

### Общие

| Name                   | Description                                                  | Default Value |
| ---------------------- | ------------------------------------------------------------ | ------------- |
| resourcewatcher.prefix | (string) - Prefix for placeholders used in the message chunk | rw.           |

### Созданный ресурс

| Name                         | Description                                                                      | Default Value                   |
| ---------------------------- | -------------------------------------------------------------------------------- | ------------------------------- |
| resourcewatcher.new\_active  | (boolean) - Sets whether the plugin is active upon resource creation             | false                           |
| resourcewatcher.new\_email   | (string) - Email address(es) to send the notifications to                        |                                 |
| resourcewatcher.new\_hooks   | (string) - List of hooks (snippets) to execute when a resource is created        |                                 |
| resourcewatcher.new\_subject | (string) - Subject of the notification emails                                    | A new resource has been created |
| resourcewatcher.new\_tpl     | (string) - Chunk to use as the message of the e-mail when creating new resources | message-create                  |

### Обновлённый ресурс

| Name                         | Description                                                                   | Default Value               |
| ---------------------------- | ----------------------------------------------------------------------------- | --------------------------- |
| resourcewatcher.upd\_active  | (boolean) - Sets whether the plugin is active upon resource edition/update    | false                       |
| resourcewatcher.upd\_email   | (string) - Email address(es) to send the notifications to                     |                             |
| resourcewatcher.upd\_hooks   | (string) - List of hooks (snippets) to execute when a resource is updated     |                             |
| resourcewatcher.upd\_subject | (string) - Subject of the notification emails                                 | A resource has been updated |
| resourcewatcher.upd\_tpl     | (string) - Chunk to use as the message of the e-mail when updating a resource | message-update              |

## Плейсхолдеры (message chunks)

В чанках сообщений можно использовать плейсхолдеры (по умолчанию с префиксом «rw.»). Доступны поля modUser, modUserProfile и modResource. Краткий список (неполный):

| Name             | Description                                    |
| ---------------- | ---------------------------------------------- |
| prefix.id        | ID of the resource                             |
| prefix.pagetitle | pagetitle field of the resource                |
| prefix.username  | name of the user who did the action            |
| prefix.fullname  | full name of the user who performed the action |

## Hooks

По умолчанию отслеживаются все ресурсы во всех настройках. Ограничения задаются hooks (snippets).

Hooks суммируются и выполняются в порядке, указанном в System Setting.

Hook содержит ваши ограничения и возвращает true, если они выполнены (иначе false).

## Ресурсы

Github: <https://github.com/meltingmedia/ResourceWatcher>
Bug reports/feature requests: <https://github.com/meltingmedia/ResourceWatcher/issues>
