---
title: "Ресурсная политика"
translation: "building-sites/client-proofing/security/policies/permissions/resource-policy"
---

## Ресурсная политика

Эта политика упакована в MODX и предоставляется пользователям в любом контексте, которые хотят иметь доступ к содержимому базового объекта. Разрешения являются универсальными и применяются ко всем объектам MODX.

## Разрешения по умолчанию

| Имя |
|------|
| add\_children |
| create |
| delete |
| list |
| load |
| move |
| publish |
| remove |
| save |
| steal\_lock |
| undelete |
| unpublish |
| view |

Не путайте разрешения Resource `publish` / `unpublish` с контекстным `publish_document` из политики администратора. Чекбокс публикации, даты, пункты в дереве и процессоры в менеджере смотрят на `publish_document` для контекста **`mgr`**. Одних `publish` / `unpublish` на Resource ACL недостаточно. См. [ACL: публикация в менеджере](building-sites/client-proofing/security/policies/acls#публикация-в-менеджере-и-несколько-групп).

## Смотрите также

1. [Разрешения - Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Разрешения - Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)
