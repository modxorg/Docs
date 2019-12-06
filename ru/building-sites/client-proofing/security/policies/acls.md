---
title: "ACL (Список контроля доступа)"
translation: "building-sites/client-proofing/security/policies/acls"
---

## Что такое ACL (список контроля доступа)?

ACL (список контроля доступа) представляет собой набор [Прав доступа](building-sites/client-proofing/security/policies/permissions "Права доступа"), прикрепленных к объекту. Больше информации о ACL можно найти в [Википедии](http://en.wikipedia.org/wiki/Access_control_list).

## Использование

В MODX ACL может быть применен к любому 'modAccessibleObject'. Прежде всего MODX Revolution применяет ACL к ресурсам и контекстам.

### Контексты

Контексты ACL упоминаются:

- [Контексты](building-sites/contexts "Контексты")
- [Группы пользователей](building-sites/client-proofing/security/user-groups "Группы пользователей")
- [Минимальная роль](building-sites/client-proofing/security/roles "Минимальная роль")
- [Политика доступа](building-sites/client-proofing/security/policies "Политика доступа")

Это означает, что можно назначить ACL для контекста, который будет применяться к:

- Всем пользователям группы
- ...обладающим минимальной ролью
- ...что даст пользователям все разрешения в назначенной политике доступа

### Ресурсы

ACL для ресурсов ведет себя немного по-другому и в основном позволяет ограничивать доступ к ресурсам (таким как документы, веб-ссылки и т. Д.) по группам ресурсов. Ссылки:

- [Группы ресурсов](building-sites/client-proofing/security/resource-groups "Группы ресурсов")
- [Группы пользователей](building-sites/client-proofing/security/user-groups "Группы пользователей")
- [Минимальная роль](building-sites/client-proofing/security/roles "Минимальная роль")
- [Политика доступа](building-sites/client-proofing/security/policies "Политика доступа")
- [Контексты](building-sites/contexts "Контексты")

Это означает, что ACL, примененный к группе ресурсов:

- Использоваться для всех пользователей состоящих в группе
- ... с минимальной указанной ролью
- ... получивших разрешения на ресурсы (сохранить, загрузить, удалить и т. д.) в указанной политике
- ... ко всем ресурсам в группе ресурсов

## Смотрите также

1. [Политики - Шаблоны политик](building-sites/client-proofing/security/policies/policytemplates)
2. [Политики - Контроль доступа](building-sites/client-proofing/security/policies/acls)
