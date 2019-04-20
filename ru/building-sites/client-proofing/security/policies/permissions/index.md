  ---
title: "Разрешения"
translation: "building-sites/client-proofing/security/policies/permissions"
---

## Что такое Разрешения??
"Разрешения" в Revolution - это единый контроль доступа, который разрешает или запрещает выполнение какой-либо задачи. Вы можете представить разрешения как чекбокс: может ли пользователь выполнить действие или нет?
Пример такого разрешения - "content\_types" - если пользовательская политика не содержит это разрешение, тогда пользователь не сможет выполнить данное действие. В этом случае, пользователь не может просмотреть Тип Контента страницы.

Обычно вам не придется настраивать разрешения индивидуально, а в группах под названием [Политики Доступа](/display/revolution20/Policies "Политика"). [Политика Доступа](/display/revolution20/Policies "Политика") - это список индивидуальных доступов (так же называют Список Контроля Доступа или СКД). Например, если вы хотите назначить пользователям необходимые разрешения для редактирования содержимого в панели управления, вы можете назначить им политику "Content Editor".
Разрешения MODX всегда аддитивны: если в разрешении назначена "Политика Доступа А" и не назначена "Политика Доступа Б" и вы хотите добавить обе политики пользователю, еффективнее всего будет коллекция всех разрешений, определенных в обеих Политиках. Добавление большего количества политик никогда не удалит разрешения для пользователя. Например, если вы добавите ограничетельную политику "Load Only" к администратору, то администратор все еще будет иметь доступ ко всем действиям назначеных в политике "Администратор".


## Применение
На практике, Политики Доступа связанные с Группами Пользователей (не с индивидуальными пользователями). Политики Доступа связанные с Групой пользователей и пользователи могут быть добавлены в группу.

Политики Доступа (ПД) определяют списки разрешений (смотрите Security --> Access Controls). Эти списки содержат группы разрешений, которые относятся друг к другу.

1. [Права Доступа - Политика Администратора](building-sites/client-proofing/security/policies/permissions/administrator-policy)
2. [Права Доступа - Политика Ресурса](building-sites/client-proofing/security/policies/permissions/resource-policy)

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

Есть так же "Шаблоны Политик" -- они помогают организовать списки разрешений в политиках доступа. Политики Доступа - это список чекбоксов, шаблоны политик определяют, какие флажки доступны для Политики доступа. Поскольку полный список разрешений может быть довольно длинным, не эффективно назначать Политики Доступа пробираясь через сотни чекбоксов. Шаблоны политик позволяют сузить параметры, доступные для политики доступа.
