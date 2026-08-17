---
title: "Базовая установка"
sortorder: "1"
_old_id: "32"
_old_uri: "2.x/getting-started/installation/basic-installation"
description: "Установка MODX 3 из traditional zip-пакета"
translation: "getting-started/installation/standard"
---

Это руководство по обычной новой установке из **traditional** zip. Большинству сайтов подходит этот путь.

- Обновляете существующий сайт? См. [Обновление MODX](getting-started/maintenance/upgrading).
- Переименовываете `manager/` или `connectors/`? Используйте [расширенную установку](getting-started/installation/advanced).
- Устанавливаете из Git или Composer? См. [установку через Git](getting-started/installation/git) или [Composer](getting-started/installation/composer).

## 1. Проверьте требования

Убедитесь, что хостинг соответствует [требованиям к серверу](getting-started/server-requirements). Для актуального MODX 3.x (3.2+) нужны **PHP 8.1+** и MySQL/MariaDB.

Вам понадобятся:

- Корень сайта (или подкаталог), куда будет установлен MODX
- База MySQL и пользователь с полными правами на эту базу
- Возможность загрузить и распаковать файлы (файловый менеджер, SFTP или SSH)

## 2. Скачайте и разместите файлы

1. Скачайте последний **traditional**-пакет с [modx.com/download](https://modx.com/download/).
2. Загрузите zip на сервер.
3. Распакуйте его **на сервере** (файловый менеджер хостинга или `unzip`). Лучше распаковывать на сервере, чем заливать тысячи файлов по FTP: так меньше риск повреждения или пропуска файлов.
4. Переместите распакованные файлы в корень сайта (или нужный подкаталог), чтобы в этой директории лежали `index.php`, `core/`, `manager/`, `connectors/` и `setup/`.
5. Zip и пустую обёрточную папку после распаковки можно удалить.

Для продакшена обычно ставят в корень домена. Подкаталог подходит для тестов. Особые случаи (существующий HTML/CMS, временный URL хостинга) описаны в [установке рядом с существующим сайтом](getting-started/installation/existing-site).

Перед продолжением убедитесь, что PHP может писать как минимум в:

- `core/cache/`
- `core/config/`
- `core/packages/`
- `core/import/`
- `core/export/`

## 3. Создайте базу данных

В панели MySQL хостинга (phpMyAdmin, панель управления, CLI и т. п.):

1. Создайте пустую базу (utf8mb4: хороший выбор кодировки, если хостинг её предлагает).
2. Создайте пользователя БД и выдайте ему все привилегии на эту базу. Если нужен более узкий набор прав, см. список в [требованиях к серверу](getting-started/server-requirements).
3. Запишите hostname (часто `localhost`), имя базы, логин и пароль. На shared-хостинге имена баз и пользователей иногда имеют префикс (например `account_modx`). В setup указывайте полные имена.

## 4. Запустите setup

В браузере откройте `https://yoursite.example/setup/`, чтобы запустить мастер установки.

Используйте реальный домен или локальный URL. Если ставили в подкаталог, включите его в путь.

### Язык и приветствие

Выберите язык и пройдите экран приветствия.

### Параметры установки

![](setup-opt1.png)

Для нового сайта оставьте **New Installation**. Поля прав на файлы и каталоги обычно можно не менять. Нажмите **Next**.

### Подключение к базе данных

![](setup-db-1.png)

Укажите:

- **Database hostname**: обычно `localhost`. Для нестандартного порта: `host;port=3307`. Для Unix-сокета: `;unix_socket=/path/to/mysql.sock`.
- **Username** и **password**
- **Database name**
- **Table prefix**: `modx_` подходит. Меняйте только если в одной базе несколько установок MODX

Нажмите **Test database server connection and view collations**. Исправьте ошибки до продолжения (частые причины: неверный пароль, отсутствующая база, пользователь без прав).

### Кодировка и collation

![](setup-db2.png)

Обычно выбирают `utf8mb4` и `utf8mb4_general_ci` для широкой совместимости. Обычный `utf8` может не сохранять эмодзи и часть символов других письменностей. Если меняете значения, charset и collation должны соответствовать друг другу. Затем создайте или подтвердите выбор базы, как просит setup.

### Пользователь-администратор

![](setup-db3.png)

Создайте основного пользователя Manager:

- Лучше не `admin`
- Надёжный пароль
- Реальный email, которым вы пользуетесь (setup также задаёт начальное значение `emailsender`)

Нажмите **Next**.

### Проверки перед установкой и установка

Setup проверяет PHP, расширения и права на запись. Устраните сбои (см. [требования к серверу](getting-started/server-requirements) и [устранение неполадок при установке](getting-started/installation/troubleshooting)), затем нажмите **Install**.

После успешного завершения перейдите к экрану итогов.

### Удалите setup и войдите

![](setup-cleanup1.png)

Отметьте опцию **удалить каталог `setup/`**, затем войдите в Manager.

Оставляйте `setup/` только пока он нужен. Установщик даёт широкие права. Удалите его сразу после успешной установки.

## 5. После установки

1. Проверьте вход в Manager и открытие фронтенда сайта.
2. Пройдите [установка прошла успешно, что дальше?](getting-started/getting-started).
3. Включите [дружественные URL](getting-started/friendly-urls), когда будете готовы (и настройте правила Apache/nginx).
4. Усильте защиту: [безопасность MODX](getting-started/maintenance/securing-modx) (особенно запрет веб-доступа к `core/`).
5. При необходимости установите Extras через Package Management: [транспортные пакеты](extending-modx/transport-packages).

Если позже письма с сайта не уходят, проверьте, что [emailsender](building-sites/settings/emailsender): допустимый адрес для вашего домена.

## Если что-то пошло не так

- Пустая страница или зависшая установка: [устранение неполадок при установке](getting-started/installation/troubleshooting)
- Всё ещё не получается? Спросите на [форуме MODX Community](https://community.modx.com) и укажите версию PHP, тип и версию БД и точный текст ошибки setup (также смотрите `core/cache/logs/error.log`, если файл есть).

## Смотрите также

- [Установка рядом с существующим сайтом](getting-started/installation/existing-site)
- [Расширенная установка](getting-started/installation/advanced)
- [Установка из командной строки](getting-started/installation/cli)
- [Дружественные URL на nginx](getting-started/friendly-urls/nginx) / [Apache](getting-started/friendly-urls/apache)
- [ModSecurity](getting-started/installation/troubleshooting/modsecurity)
