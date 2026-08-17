---
title: "modActiveDirectory"
description: "Интеграция Microsoft Active Directory для аутентификации в MODX Revolution"
translation: "extras/modactivedirectory/index"
---

## Что такое modActiveDirectory?

modActiveDirectory. интеграция [Microsoft ActiveDirectory](http://en.wikipedia.org/wiki/Active_Directory) для MODX Revolution. Позволяет входить в MODX через ActiveDirectory.

## Требования

- MODX Revolution 2.0.0-pl или новее
- PHP5 или новее
- LDAP extension для PHP

## Установка

Установите через менеджер MODX Revolution в разделе [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), или скачайте: <https://modx.com/extras/package/modactivedirectory>

Перед установкой файл manager/controllers/security/login.php должен быть доступен PHP для записи, если ещё нет. modActiveDirectory исправляет баг в Revo 2.0.0-pl.

Затем настройте две System Settings:

- activedirectory.account\_suffix : Суффикс учётной записи домена. Обычно @forest.domain.
- activedirectory.domain\_controllers : Список контроллеров домена через запятую. Несколько контроллеров балансируют LDAP-запросы.

### История

modActiveDirectory написал [Shaun McCormick](https://github.com/splittingred), первый релиз. 6 августа 2010 года.

### Разработка и сообщения об ошибках

Код на GitHub: <http://github.com/splittingred/modActiveDirectory>

Баги: <http://github.com/splittingred/modActiveDirectory/issues>

## Использование

modActiveDirectory работает после установки и настройки domain controllers и account suffix. Дополнительные настройки в namespace 'activedirectory' в System Settings.

### Доступные настройки

| Name                                | Description                                                                                                                                                                                                                                                                                      | Default       |
| ----------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| activedirectory.account\_suffix     | Суффикс учётной записи домена. Обычно @forest.domain.                                                                                                                                                                                                                            | @forest.local |
| activedirectory.autoadd\_adgroups   | При true берёт все группы Active Directory пользователя и ищет совпадающие UserGroups в MODX. При совпадении пользователь MODX добавляется в эти группы.                                                                                 | 1             |
| activedirectory.autoadd\_usergroups | Список имён UserGroup MODX через запятую, в которые пользователь всегда добавляется.                                                                                                                                                                                                           |               |
| activedirectory.base\_dn            | Base dn домена. Обычно можно оставить пустым, MODX вычислит автоматически.                                                                                                                                                                                    |               |
| activedirectory.domain\_controllers | Контроллеры домена через запятую. Несколько контроллеров балансируют LDAP-запросы.                                                                                                                                                               | 127.0.0.1     |
| activedirectory.real\_primarygroup  | Определяет реальную primary group. false упрощает «Domain Users» и быстрее. Если primary group не «Domain Users», результат может быть неверным. См. <http://support.microsoft.com/?kbid=321360>. | 1             |
| activedirectory.recursive\_groups   | Рекурсивный запрос членства в группах. Рекомендуется оставить включённым.                                                                                                                                                                                                                     | 1             |
| activedirectory.use\_ssl            | SSL (LDAPS). AD сервер должен поддерживать. Работает только если use\_tls выключен.                                                                                                                                                                                            | 0             |
| activedirectory.use\_tls            | TLS. AD сервер должен поддерживать. Работает только если use\_ssl выключен.                                                                                                                                                                                                    | 0             |

### Синхронизация групп ActiveDirectory

modActiveDirectory автоматически получает группы ActiveDirectory пользователя и ищет UserGroups MODX с совпадающими именами. При совпадении пользователь добавляется в группы.

Чтобы отключить, установите 'activedirectory.autoadd\_adgroups' в 0.

Можно указать список UserGroup MODX через запятую в 'activedirectory.autoadd\_usergroups'.

Убедитесь, что User Groups, в которые пользователь попадает автоматически, имеют доступ к менеджеру через Access Controls, если нужен доступ к менеджеру.
