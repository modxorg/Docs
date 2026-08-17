---
title: "Устранение неполадок при установке"
_old_id: "311"
_old_uri: "2.x/getting-started/installation/troubleshooting-installation"
translation: "getting-started/installation/troubleshooting"
---

## Общие проблемы

Сначала проверьте:

- Вы выполнили все шаги [здесь](getting-started/installation "Installation") для своего дистрибутива.
- Окружение соответствует актуальным [требованиям к серверу](getting-started/server-requirements), в том числе **PHP 8.1+** (обязательно с MODX 3.2; в более ранних 3.x допускался PHP 7.2+) и поддерживаемая версия MySQL/MariaDB.
- Каталог `core/cache/` полностью очищен перед setup. Неверные права на файлы иногда мешают установке.
- Очищены кеш и cookies браузера.

## Сообщения об ошибках PDO

Если при установке появляются ошибки PDO, перед разбором конкретных случаев ниже проверьте конфигурацию PDO. Запустите этот код (подставьте user/password/database/host):

``` php
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=testdb;host=localhost';
$user = 'dbuser';
$password = 'dbpass';

try {
 $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
 echo 'Connection failed: ' . $e->getMessage();
}
?>
```

Если скрипт падает, PDO настроен неверно.

## Распространённые ошибки

Типичные проблемы при установке и что с ними делать:

### «Вместо страницы настроек: пустой белый экран»

Скорее всего вы скопировали `config.inc.tpl` в `config.inc.php`. Так делать нельзя. Сделайте `config.inc.php` пустым и доступным для записи.

Если переименовали `config.inc.tpl` в `config.inc.php`, верните имя `config.inc.tpl` и создайте пустой writable-файл `config.inc.php`.

### «Нажал Install: белый экран»

В php.ini параметр `memory_limit` должен быть не меньше 32M. На медленных серверах может понадобиться 64M.

### «Cannot connect to database» на странице параметров БД

Частая причина: нестандартный порт MySQL. В поле hostname укажите (подставьте свой хост и порт):

> my.database.com;port=3307

### Warning: PDO:\_\_construct() \[pdo.--construct\]: \[2002\] Argument invalid (trying to connect via unix://) ИЛИ «Checking database:Could not connect to the mysql server.»

Сокет MySQL настроен неверно. Обычно помогает добавить или обновить в php.ini:

``` php
mysql.default_socket=/path/to/my/mysql.sock
mysqli.default_socket=/path/to/my/mysql.sock
pdo_mysql.default_socket=/path/to/my/mysql.sock
```

### Страница входа снова открывает форму без ошибки

Так бывает на старых beta Revolution. Удалите из таблицы `[prefix]_system_settings` (prefix: ваш префикс) три настройки:

- `session_name`
- `session_cookie_path`
- `session_cookie_domain`

Затем удалите `core/cache/config.cache.php`.

Если вы меняли эти настройки намеренно, шаг не нужен.

### Страница «сыпется», элементы не грузятся (eAccelerator)

Используете eAccelerator? На части серверов он мешает. Отключите в php.ini:

``` php
eaccelerator.enable = 0;
eaccelerator.optimizer = 0;
eaccelerator.debug = 0;
```

Или в `.htaccess` в корне MODX, если сервер поддерживает директивы `php_flag`:

``` php
php_flag eaccelerator.enable 0
php_flag eaccelerator.optimizer 0
php_flag eaccelerator.debug 0
```

### Странное поведение Manager (не eAccelerator)

На shared-хостинге иногда виноваты системные настройки `compress_js` и/или `compress_css`. Откройте Система → Системные настройки, в поиске введите `compress`. Выключите обе настройки, выйдите, удалите всё из `core/cache`, очистите кеш браузера и cookies, войдите снова.

Если Manager настолько сломан, что настройки не меняются, см. ниже правку `compress_js` и `compress_css` в таблице `modx_system_settings` через PhpMyAdmin.

### Деревья ресурсов / элементов / файлов не появляются

Часть «флаков» страницы: из кеша браузера: старый JS и другие файлы на клиенте. Проверьте вход в Manager из браузера, где вы ещё не работали с сайтом.

Простой fix: очистить кеш браузера и войти снова.

Полнее:

1. Система → Очистить кеш
2. Безопасность → Сбросить права, затем Завершить сессии
3. Вас разлогинит
4. Очистите кеш браузера

### Не могу войти в Manager после установки

Если каждый раз возвращает на форму входа, добавьте в `.htaccess` в корне MODX:

``` php
php_value session.auto_start 0
```

### Could not connect to the database server. Check the connection properties and try again. Access Denied

На shared-хостинге имя пользователя БД с подчёркиванием (`_`) иногда ломает подключение. Уберите `_` из имени пользователя и попробуйте снова.

Другие частые случаи появятся позже...

### Manager после установки показывает plain text

Manager грузит сжатые CSS и JS. Часть конфигураций сервера... См. «JS Errors in the Manager due to Error 4»

### Manager как plain text, части интерфейса нет, JavaScript 400 в Manager

Если Manager не грузится из‑за 400 при загрузке JS, сжатого Google Minify, вероятна misconfiguration на сервере. Если с серверной стороны не исправить, отключите сжатие JS и CSS вручную:

1. В PhpMyAdmin откройте таблицу `table_prefix_system_settings` (prefix обычно modx).
2. Найдите ключи `compress_js` и `compress_css`, поставьте значение 0, сохраните.
3. Очистите `core/cache/`.
4. Очистите кеш браузера и cookies.
5. Войдите в Manager.

Manager будет работать без сжатия JS и CSS.

### Части Manager отсутствуют, неопределённые языковые строки, JavaScript 500

1. У каталога `connectors/` должны быть права 0755.

## Всё ещё не работает?

Опишите ошибку и окружение сервера на [форуме](https://forums.modx.com/index.php/board,378.0.html). Постараемся помочь как можно скорее.
