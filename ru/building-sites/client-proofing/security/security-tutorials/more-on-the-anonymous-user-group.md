---
title: "Ещё про группу Anonymous"
translation: "building-sites/client-proofing/security/security-tutorials/more-on-the-anonymous-user-group"
---

## Кто такой Anonymous?

Любой посетитель сайта без входа относится к [User Group](building-sites/client-proofing/security/user-groups "User Groups") Anonymous.

Чтобы править группу, откройте верхнее меню **Security → Access Controls**, вкладка User Groups. Кликните правой кнопкой имя Anonymous и выберите **Update User Group**. ![](access+controls.png)

## Что может Anonymous?

По умолчанию Anonymous получает Load Only во всех [Context](building-sites/contexts "Contexts"), кроме `mgr`. Без Load Only запрос к Context вернёт 404 Page Not Found.

![](user+group_+anonymous.png)

Load Only не означает, что ресурс можно View (см. ниже).

Пример: вы создаёте [Resource Group](building-sites/client-proofing/security/resource-groups "Resource Groups") и даёте доступ конкретной User Group. Anonymous эту Resource Group не увидит. На этом строится [создание страниц только для участников](building-sites/client-proofing/security/security-tutorials/making-member-only-pages "Making Member-Only Pages").

### 401 против 404 на защищённых страницах

Для защищённых Resource Groups у Anonymous по умолчанию нет Load. Ответ будет 404 Page Not Found. Если нужен 401 Unauthorized, дайте Anonymous доступ к Resource Group с политикой Load Only.

Это делается на вкладке Resource Group Access при редактировании Anonymous.

![](screen+shot+2012-10-19+at+11.43.46+pm.png)

Нажмите **Add Resource Group**, выберите защищённую Resource Group, Context (не `mgr`) и Access Policy Load Only. Сохраните.

View по ресурсам в этой группе всё ещё закрыт. Доступен только Load и ответ 401. Кастомную Unauthorized-страницу задайте через [Unauthorized Page System Setting](building-sites/settings/unauthorized_page "unauthorized_page").
