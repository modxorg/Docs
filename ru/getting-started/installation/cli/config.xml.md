---
title: "Создание установочного XML-файла"
translation: "getting-started/installation/cli/config.xml"
---

## XML-файл конфигурации

CLI-установка читает XML-файл (обычно `setup/config.xml`). Скопируйте `setup/config.dist.new.xml` из пакета MODX 3.x, переименуйте в `config.xml` и подставьте значения своего сервера. Файл можно держать вне web root и указать через `--config=/path/to/config.xml`.

Пример ниже совпадает с [`setup/config.dist.new.xml`](https://github.com/modxcms/revolution/blob/3.x/setup/config.dist.new.xml) в ветке 3.x. Перед установкой замените доступ к БД, учётку администратора, хост и пути на диске.

### Минимальный пример новой установки

```xml
<modx>
    <database_type>mysql</database_type>
    <database_server>localhost</database_server>
    <database>modx_modx</database>
    <database_user>db_username</database_user>
    <database_password>db_password</database_password>
    <database_connection_charset>utf8</database_connection_charset>
    <database_charset>utf8</database_charset>
    <database_collation>utf8_general_ci</database_collation>
    <table_prefix>modx_</table_prefix>
    <https_port>443</https_port>
    <http_host>localhost</http_host>

    <!-- 1 = файлы уже на месте (Git или полная распаковка до setup) -->
    <inplace>0</inplace>

    <!-- 1 = core.transport.zip уже распакован в core/packages/ -->
    <unpacked>0</unpacked>

    <!-- Код языка IANA для языка менеджера по умолчанию -->
    <language>ru</language>

    <cmsadmin>username</cmsadmin>
    <cmspassword>password</cmspassword>
    <cmsadminemail>email@address.com</cmsadminemail>

    <core_path>/www/modx/core/</core_path>

    <context_mgr_path>/www/modx/manager/</context_mgr_path>
    <context_mgr_url>/modx/manager/</context_mgr_url>
    <context_connectors_path>/www/modx/connectors/</context_connectors_path>
    <context_connectors_url>/modx/connectors/</context_connectors_url>
    <context_web_path>/www/modx/</context_web_path>
    <context_web_url>/modx/</context_web_url>

    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

Затем из каталога `setup/`:

```shell
php ./index.php --installmode=new
```

См. [установку из командной строки](getting-started/installation/cli) про `--config`, апгрейд и `upgrade-advanced`.

### Минимальный пример апгрейда

Для `--installmode=upgrade` в `setup/config.dist.upgrade.xml` достаточно ключей ниже (и любых других значений, которые хотите изменить):

```xml
<modx>
    <inplace>0</inplace>
    <unpacked>0</unpacked>
    <language>ru</language>
    <core_path>/www/modx/core/</core_path>
    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

## Параметры базы данных

| Ключ | Описание | По умолчанию |
| ---- | -------- | ------------ |
| database\_type | Драйвер базы данных. | mysql |
| database\_server | Хост сервера БД. Порт укажите через двоеточие: `хост:порт`. | localhost |
| database | Имя базы данных. | modx\_modx |
| database\_user | Пользователь БД. | db\_username |
| database\_password | Пароль пользователя БД. | db\_password |
| database\_connection\_charset | Кодировка соединения с БД. | utf8 |
| database\_charset | Кодировка базы данных. | utf8 |
| database\_collation | Collation базы данных. | utf8\_general\_ci |
| table\_prefix | Префикс таблиц MODX. | modx\_ |

## Параметры установки

| Ключ | Описание | По умолчанию |
| ---- | -------- | ------------ |
| inplace | `1`, если вы ставите из Git или уже распаковали полный пакет на сервер до запуска setup. | |
| unpacked | `1`, если уже распаковали `core/packages/core.transport.zip`. Ускоряет установку, когда нельзя поднять PHP `time_limit`. | |
| language | Язык менеджера по умолчанию. Коды IANA. | |
| cmsadmin | Логин нового администратора (новая установка). | username |
| cmspassword | Пароль нового администратора (новая установка). | password |
| cmsadminemail | Email нового администратора (новая установка). | email@address.com |
| remove\_setup\_directory | Удалять ли каталог `setup/` после установки. | 1 |

## Параметры путей

| Ключ | Описание | По умолчанию |
| ---- | -------- | ------------ |
| core\_path | Абсолютный путь к каталогу `core/`. | |
| context\_mgr\_path | Абсолютный путь к менеджеру. | |
| context\_mgr\_url | URL-путь к менеджеру (например `/modx/manager/`). | |
| context\_connectors\_path | Абсолютный путь к connectors. | |
| context\_connectors\_url | URL-путь к connectors. | |
| context\_web\_path | Абсолютный путь к корню контекста `web`. | |
| context\_web\_url | URL-путь к корню сайта (например `/modx/`). | |
| assets\_path | Абсолютный путь к `assets/` (опционально; по умолчанию под web path). | |
| assets\_url | URL-путь к `assets/` (опционально). | |
| processors\_path | Абсолютный путь к процессорам (опционально; MODX задаёт значение по умолчанию). | |

## Другие параметры

| Ключ | Описание | По умолчанию |
| ---- | -------- | ------------ |
| https\_port | Порт HTTPS на сервере. | 443 |
| http\_host | HTTP-хост сервера (имя хоста, например `mysite.com`). | localhost |
| cache\_disabled | Отключать ли кэш MODX. | 0 |

## См. также

- [Базовая установка](getting-started/installation/standard)
    - [Гид по Lighttpd](getting-started/friendly-urls/lighttpd)
    - [Установка на сервере с ModSecurity](getting-started/installation/troubleshooting/modsecurity)
    - [Настройка Nginx](getting-started/friendly-urls/nginx)
- [Расширенная установка](getting-started/installation/advanced)
- [Установка через Git](getting-started/installation/git)
- [Установка из командной строки](getting-started/installation/cli)
    - [Создание установочного XML-файла](getting-started/installation/cli/config.xml)
- [Устранение неполадок при установке](getting-started/installation/troubleshooting)
- [Успешная установка, что дальше?](getting-started/getting-started)
