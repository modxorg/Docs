---
title: "Разрешения"
translation: "building-sites/client-proofing/security/policies/permissions"
description: "Разрешения MODX: что такое одно разрешение и как политики группируют их."
---

## Что такое Разрешения?

"Разрешения" в Revolution - это единый контроль доступа, который разрешает или запрещает выполнение какой-либо задачи. Вы можете представить разрешения как чекбокс: может ли пользователь выполнить действие или нет?
Пример такого разрешения - "content\_types" - если пользовательская политика не содержит это разрешение, тогда пользователь не сможет выполнить данное действие. В этом случае, пользователь не может просмотреть Тип Контента страницы.

Обычно вам не придется настраивать разрешения индивидуально, а в группах под названием [Политики Доступа](building-sites/client-proofing/security/policies "Политика"). [Политика Доступа](building-sites/client-proofing/security/policies "Политика") - это список индивидуальных доступов (так же называют Список Контроля Доступа или СКД). Например, если вы хотите назначить пользователям необходимые разрешения для редактирования содержимого в панели управления, вы можете назначить им политику "Content Editor".
Разрешения MODX всегда аддитивны: если в разрешении назначена "Политика Доступа А" и не назначена "Политика Доступа Б" и вы хотите добавить обе политики пользователю, еффективнее всего будет коллекция всех разрешений, определенных в обеих Политиках. Добавление большего количества политик никогда не удалит разрешения для пользователя. Например, если вы добавите ограничетельную политику "Load Only" к администратору, то администратор все еще будет иметь доступ ко всем действиям назначеных в политике "Администратор".

## Применение

На практике, Политики Доступа связанные с Группами Пользователей (не с индивидуальными пользователями). Политики Доступа связанные с Групой пользователей и пользователи могут быть добавлены в группу.

Политики Доступа (ПД) определяют списки разрешений (смотрите "Меню" --> "Контроль доступа"). Эти списки содержат группы разрешений, которые относятся друг к другу.

1. [Права Доступа - Политика Администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Права Доступа - Политика Ресурса](building-sites/client-proofing/security/policies/permissions/resource-policy)

Шаблоны политик организуют списки разрешений в политиках доступа. Политика доступа — это список чекбоксов, а шаблоны политик определяют, какие чекбоксы доступны в политике. Полный список разрешений может быть очень длинным, поэтому определять политики, перебирая сотни чекбоксов, неэффективно. Шаблоны политик позволяют сузить набор доступных опций.

## Смотрите также

1. [Безопасность (ACLs)](building-sites/client-proofing/security)
2. [Пользователи](building-sites/client-proofing/security/users)
3. [Группы пользователей](building-sites/client-proofing/security/user-groups)
4. [Группы ресурсов](building-sites/client-proofing/security/resource-groups)
5. [Роли](building-sites/client-proofing/security/roles)
6. [Политики](building-sites/client-proofing/security/policies)
    1. [Разрешения](building-sites/client-proofing/security/policies/permissions)
        1. [Политика администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
        2. [Ресурсная политика](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [ACL](building-sites/client-proofing/security/policies/acls)
    3. [Шаблоны политик](building-sites/client-proofing/security/policies/policytemplates)
7. [Учебники по безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Доступ менеджера](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Страницы только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Второй суперпользователь](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение элемента](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Об анонимном пользователе](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
8. [Диагностика безопасности](building-sites/client-proofing/security/troubleshooting-security)
    1. [Ручной сброс пароля пользователя](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
