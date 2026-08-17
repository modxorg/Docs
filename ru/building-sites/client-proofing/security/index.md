---
title: "Безопасность (ACLs)"
translation: "building-sites/client-proofing/security"
---

## Безопасность в MODX Revolution

Безопасность в MODX Revolution строится на Attribute-Based Access Control (ABAC).

У каждого пользователя есть объект [User](building-sites/client-proofing/security/users). Его можно включить в любое число [User Groups](building-sites/client-proofing/security/user-groups). Группам задают атрибуты через [Access Control Lists](building-sites/client-proofing/security/policies/acls) (ACL). Названия ACL зависят от того, куда их применяют, но принцип один: в списке лежат [Permissions](building-sites/client-proofing/security/policies/permissions). Эти разрешения открывают доступ к разделам и действиям в MODX.

Обычно у ACL есть:

- **Principal**: кто получает права. По умолчанию это User Group.
- **Target**: к чему применяется ACL, например Context или Resource Group.
- **Access Policy**: список Permissions по этой ACL.
- **Authority**: минимальный уровень полномочий для использования ACL (см. [Roles](building-sites/client-proofing/security/roles)).

В MODX доступ **allow/deny**: по умолчанию всё открыто. После назначения ACL на объект (Context или Resource Group) туда попадают только те, у кого есть нужные Permissions.

### Видео-туториал по безопасности

На Sample Site MODX показано, как:

- ограничить RSS для Directors и выше
- ограничить Blog только для Staff
- сделать «secure» Context только для Directors и выше
- ограничить часть категорий элементов только для администраторов

![](understanding-revo-acls.jpg)

### Пример: доступ к Context

Создайте Context `test` и назначьте ему ACL. Откройте Context, вкладка **Access Permissions**. Дайте группе (например `HR Dept`) явный доступ: выберите User Group, политику `Administrator` и нужный Authority (например `9999` для Member):

![](sec-ugctx1.png)

Context `test` станет доступен пользователям, которые в группе `HR Dept` с ролью Member или с более сильным [Authority](building-sites/client-proofing/security/roles).
