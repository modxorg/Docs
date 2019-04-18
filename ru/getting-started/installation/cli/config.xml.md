---
title: "Создание Установочного Xml Файла"
translation: "getting-started/installation/cli/config.xml"
---

Файл config.xml, используемый для установки через командную строку (CLI), имеет следующие элементы XML:

## Параметры конфигурации базы данных

| Ключ                          | Описание                                                                                                                        | По умолчанию      |
| ----------------------------- | ------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| database\_type                | Используемы драйвер базы данных.                                                                                                | mysql             |
| database\_server              | Имя хоста, на котором расположен ваш сервер базы данных. Чтобы сменитьпорт по умолчанию укажите его через двоеточие: portnumber | localhost         |
| database                      | Имя базы данных                                                                                                                 | modx\_modx        |
| database\_user                | Пользователь базы данных                                                                                                        | db\_username      |
| database\_password            | Пароль пользователя для доступа к базе данных                                                                                   | db\_password      |
| database\_connection\_charset | Кодировка, используемая при подключении к базе данных                                                                           | utf8              |
| database\_charset             | Кодировка базы данных                                                                                                           | utf8              |
| database\_collation           | Сопоставление базы данных                                                                                                       | utf8\_general\_ci |
| table\_prefix                 | Префикс таблицы, используемый для всех таблиц MODX                                                                              | modx\_            |

## Параметры установки

| Key                      | Description                                                                                                                                                                                                               | Default           |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| inplace                  | Установите значение 1, если вы используете MODX из Git или извлекли его из пакета MODX                                                                                                                                    |
| unpacked                 | Установите значение 1, если вы вручную извлекли ядро из файла core/packages/core.transport.zip. Это сократит время, необходимое для установки в системах, которые не позволяют изменять настройки времени PHP time\_limit |
| language                 | Язык установки MODX. Этот параметр установит язык менеджера по умолчанию. Используйте коды IANA.                                                                                                                          |
| cmsadmin                 | Имя пользователя администратора, который будет создан после установки                                                                                                                                                     | username          |
| cmspassword              | Пароль учетной записи администратора (для новых установок)                                                                                                                                                                | password          |
| cmsadminemail            | Электронный адрес новой учетной записи администратора (для новых установок)                                                                                                                                               | email@address.com |
| remove\_setup\_directory | Следует ли удалять каталог setup/ после установки.                                                                                                                                                                        | 1                 |

## Конфигурация пути

| Key                       | Description | Default |
| ------------------------- | ----------- | ------- |
| context\_mgr\_path        |             |         |
| context\_mgr\_url         |             |         |
| context\_connectors\_path |             |         |
| context\_connectors\_url  |             |         |
| context\_web\_path        |             |         |
| context\_web\_url         |             |         |
| assets\_path              |             |         |
| assets\_url               |             |         |
| core\_path                |             |         |
| processors\_path          |             |         |

## Другие параметры конфигурации

| Key             | Description                                                     | Default   |
| --------------- | --------------------------------------------------------------- | --------- |
| https\_port     | Порт для соединения по HTTPS                                    | 443       |
| http\_host      | HTTP-хост вашего сервера. Обычно имя хоста, например mysite.com | localhost |
| cache\_disabled | Следует ли отключить кэш MODX                                   | 0         |

## Так же

- [Базовая Установка](getting-started/installation/standard)
  - [MODX Revolution на Debian](_legacy/getting-started/modx-revolution-on-debian)
  - [Гид по Lighttpd](getting-started/friendly-urls/lighttpd)
  - [Проблемы с WAMPServer 2.0i](_legacy/getting-started/problems-with-wampserver-2.0i)
  - [Установка на сервере с запущеным ModSecurity](getting-started/installation/troubleshooting/modsecurity)
  - [MODX и Suhosin](_legacy/getting-started/modx-and-suhosin)
  - [Настройка Сервера Nginx](getting-started/friendly-urls/nginx)
- [Расширенная Установка](getting-started/installation/advanced)
- [Установка через Git](getting-started/installation/git)
- [Установка При Помощи Командной Строки](getting-started/installation/cli)
  - [Создание Установочного Xml Файла](getting-started/installation/cli/config.xml)
- [Устранение неполадок при установке](getting-started/installation/troubleshooting)
- [Успешная Установка, Что Дальше?](getting-started/getting-started)
- [Использование MODX Revolution от SVN](_legacy/getting-started/using-modx-revolution-from-svn)
