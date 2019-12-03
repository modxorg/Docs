---
title: "Политики"
translation: "building-sites/client-proofing/security/policies"
---

## Что такое политика доступа?

 Политика доступа - это набор [Разрешений](building-sites/client-proofing/security/policies/permissions "Разрешения") содержащий одно или несколько Разрешений, определённых в панели управления. По умолчанию в MODX определены следующие политики доступа:

- **Administrator**: Политика администрирования контекста со всеми разрешениями по умолчанию.
- **Content Editor**: Политика администрирования контекста с ограниченными разрешениями, относящимися к редактированию контента, но без разрешений на публикацию.
- **Context**: Стандартная политика контекста, которую можно применять при создании списков ACL для получения базового доступа в контексте (read/write и view\_unpublished).  
- **Element**: Политика элемента MODX со всеми атрибутами.
- **Load Only**: Минимальная политика с разрешением на загрузку объекта.
- **Load, List and View**: Разрешает загрузку чтение и просмотри.
- **Media Source Admin**: Политика администрирования медиа источника.
- **Media Source User**: Политика пользователя медиа источника, с базовым просмотром и использованием - но без редактирования.
- **Object**: Политика объекта со всеми разрешениями.
- **Resource**: Политика ресурсов MODX со всеми атрибутами.

Если вы настраиваете любую из вышеуказанных политик доступа по умолчанию, продублируйте и переименуйте их перед настройкой! 
Если вы этого не сделаете, при обновлении версии MODX все настройки будут утеряны, поскольку они будут переопределены сценарием установки.

## Создание и редактирование

Чтобы создать Политику доступа в менеджере, перейдите к

> Настройки -> Контроль доступа -> Политики доступа

В этом разделе вы можете добавить новые политики. Чтобы изменить Политику доступа в менеджере, просто щелкните правой кнопкой мыши Политику, которую вы хотите изменить.

## Использование

Политики могут использоваться различными способами. Вот 3 примера использования по умолчанию в MODX:

### Доступ к контекстам

Политики доступа могут быть назначены с помощью [Списков контроля доступа](building-sites/client-proofing/security/policies/acls "ACLs") (ACLs), для контекста или группы пользователей с указанием минимальной [Роли](building-sites/client-proofing/security/roles "Роли"). Это означает, что все пользователи в этой группе  обладающие минимальной ролью, могут использовать разрешения в политике контекста, указанные в [ACL](building-sites/client-proofing/security/policies/acls "ACLs").

По умолчанию в MODX присутствует политика доступа ["Administrator"](building-sites/client-proofing/security/policies/permissions/administrator-policy "Политики - Политика Администратора") которая содержит все [Разрешения](building-sites/client-proofing/security/policies/permissions "Разрешения") которые можно использовать в контексте ACL. При создании пользовательской политики доступа, для пользователей с ограничениями, эту политику лучше всего продублировать.

### Доступ к группе ресурсов

Доступ к ресурсам так же может быть разграничен с использованием ролей и групп ресурсов. По умолчанию MODX имеет [Ресурсную политику](building-sites/client-proofing/security/policies/permissions/resource-policy "Разрешения - Ресурсная политика"), содержащую все основные разрешения, которые можно использовать в ACL групп ресурсов.

 Примером может быть назначение политики "Resource" группе ресурсов под названием "Documents HR". Затем вы предоставили бы группе пользователей под названием «Отдел кадров» доступ к этой группе ресурсов через ACL ресурса:

![](acl-rg1.png)

Такая настройка разрешит доступ к ресурсам из группы "Documents HR" только пользователям из группы «Отдел кадров».

### Доступ к элементам категории

Просмотр элементов также может быть ограничен с использованием ACL. Например, если у вас есть группа пользователей 'Developers', и вы хотите, чтобы пользователи в этой группе были единственной группой, которая может видеть элементы в категории 'Gallery', вы должны создать ACL в разделе «Доступ к категории элементов» (вкладка при редактировании группы пользователей):

![](acl-ecat1.png)

Это позволит только пользователям, состоящим в группе "Developers" просматривать элементы в категории "Gallery".

## Примеры

Пример пользовательской политики:

![](policy1.png)

и его разрешений:

![](policy1-perm.png)

Все пользователи которым назначена эта политика будут иметь разрешения `view_accounts` и `save_accounts`.

## Смотрите также

1. [Пользователи](building-sites/client-proofing/security/users)
2. [Группы пользователей](building-sites/client-proofing/security/user-groups)
3. [Группы Ресурсов](building-sites/client-proofing/security/resource-groups)
4. [Роли](building-sites/client-proofing/security/roles)
5. [Политики](building-sites/client-proofing/security/policies)
    1. [Права Доступа](building-sites/client-proofing/security/policies/permissions)
      1. [Права Доступа - Политика Администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
      2. [Права Доступа - Политика Ресурса](building-sites/client-proofing/security/policies/permissions/resource-policy)
    2. [КД](building-sites/client-proofing/security/policies/acls)
    3. [Шаблоны Политик](building-sites/client-proofing/security/policies/policytemplates)
6. [Уроки безопасности](building-sites/client-proofing/security/security-tutorials)
    1. [Предоставление доступа "User Manager"](building-sites/client-proofing/security/security-tutorials/giving-a-user-manager-access)
    2. [Создание "Member-Only" страниц](building-sites/client-proofing/security/security-tutorials/making-member-only-pages)
    3. [Создание второго "Super Admin" пользователя](building-sites/client-proofing/security/security-tutorials/creating-a-second-super-admin-user)
    4. [Ограничение Элементов от пользователей](building-sites/client-proofing/security/security-tutorials/restricting-an-element-from-users)
    5. [Подробнее о группе анонимных пользователей](building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group)
7. [Закалка MODX Revolution](getting-started/maintenance/securing-modx)
8. [Стандарты безопасности](administering-your-site/security/security-standards)
9. [Поиск проблем в безопасности](building-sites/client-proofing/security/troubleshooting-security)
    1. [Сбрость пароля пользователя в ручную](building-sites/client-proofing/security/troubleshooting-security/resetting-a-user-password-manually)
