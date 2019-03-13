---
title: "Создание Установочного Xml Файла"
translation: "getting-started/installation/command-line-installation/the-setup-config-xml-file"
---

- [Установочный Xml Файл](#установочный-xml-файл)
  - [Параметры конфигурации базы данных](#параметры-конфигурации-базы-данных)
  - [Параметры установки](#параметры-установки)
  - [Конфигурация пути](#конфигурация-пути)
  - [Другие параметры конфигурации](#другие-параметры-конфигурации)
- [Так же](#Так-же)

## Установочный Xml Файл

Файл config.xml, используемый для установки через командную строку (CLI), имеет следующие элементы XML:

### Параметры конфигурации базы данных

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

### Параметры установки

| Key                      | Description                                                                                                                                                                                                               | Default           |
| ------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------- |
| inplace                  | Установите значение 1, если вы используете MODX из Git или извлекли его из пакета MODX                                                                                                                                    |
| unpacked                 | Установите значение 1, если вы вручную извлекли ядро из файла core/packages/core.transport.zip. Это сократит время, необходимое для установки в системах, которые не позволяют изменять настройки времени PHP time\_limit |
| language                 | Язык установки MODX. Этот параметр установит язык менеджера по умолчанию. Используйте коды IANA.                                                                                                                          |
| cmsadmin                 | Имя пользователя администратора, который будет создан после установки                                                                                                                                                     | username          |
| cmspassword              | Пароль учетной записи администратора (для новых установок)                                                                                                                                                                | password          |
| cmsadminemail            | Электронный адрес новой учетной записи администратора (для новых установок)                                                                                                                                               | email@address.com |
| remove\_setup\_directory | Следует ли удалять каталог setup/ после установки.                                                                                                                                                                        | 1                 |

### Конфигурация пути

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

### Другие параметры конфигурации

| Key             | Description                                                     | Default   |
| --------------- | --------------------------------------------------------------- | --------- |
| https\_port     | Порт для соединения по HTTPS                                    | 443       |
| http\_host      | HTTP-хост вашего сервера. Обычно имя хоста, например mysite.com | localhost |
| cache\_disabled | Следует ли отключить кэш MODX                                   | 0         |

## Так же

1. [Базовая Установка](getting-started/installation/basic-installation)
  1. [MODx Revolution на Debian](getting-started/installation/basic-installation/modx-revolution-on-debian)
  2. [Гид по Lighttpd](getting-started/installation/basic-installation/lighttpd-guide)
  3. [Проблемы с WAMPServer 2.0i](getting-started/installation/basic-installation/problems-with-wampserver-2.0i)
  4. [Установка на сервере с запущеным ModSecurity](getting-started/installation/basic-installation/installation-on-a-server-running-modsecurity)
  5. [MODX и Suhosin](getting-started/installation/basic-installation/modx-and-suhosin)
  6. [Настройка Сервера Nginx](getting-started/installation/basic-installation/nginx-server-config)
2. [Расширенная Установка](getting-started/installation/advanced-installation)
3. [Установка через Git](getting-started/installation/git-installation)
4. [Установка При Помощи Командной Строки](getting-started/installation/command-line-installation)
  1. [Создание Установочного Xml Файла](getting-started/installation/command-line-installation/the-setup-config-xml-file)
5. [Устранение неполадок при установке](getting-started/installation/troubleshooting-installation)
6. [Успешная Установка, Что Дальше?](getting-started/installation/successful-installation,-now-what-do-i-do)
7. [Использование MODX Revolution от SVN](getting-started/installation/using-modx-revolution-from-svn)
