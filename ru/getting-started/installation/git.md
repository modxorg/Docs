---
title: "Установка через Git"
sortorder: "4"
_old_id: "154"
_old_uri: "2.x/getting-started/installation/git-installation"
translation: "getting-started/installation/git"
---

Установка MODX из git даёт самую свежую версию и нужна, если вы участвуете в разработке MODX. Шагов больше, чем при стандартной установке.

## Процесс установки

Вам нужно:

- получить файлы с GitHub
- установить зависимости через Composer
- собрать пакет ядра
- запустить обычный setup

Каждый шаг описан ниже.

### Получение файлов с GitHub

Склонируйте [репозиторий revolution на GitHub](http://github.com/modxcms/revolution):

``` bash
git clone http://github.com/modxcms/revolution.git -b 3.x www
```

Команда выбирает ветку 3.x и кладёт файлы в каталог `www`. Путь можно изменить под свою схему.

Чтобы участвовать в разработке: [сделайте fork modxcms/revolution](http://help.github.com/forking/), клонируйте свой репозиторий как `origin` и добавьте modxcms/revolution как remote `upstream`:

``` bash
git clone git@github.com:yourgitusernamehere/revolution.git
cd revolution
git remote add upstream -f http://github.com/modxcms/revolution.git -b 3.x www
```

Переключение ветки: `git checkout <name-of-branch>` или `git checkout -b 3.x upstream/3.x`

### Установка зависимостей через Composer

MODX использует Composer для внутренних зависимостей, нужных для 3.x.

Если Composer ещё не установлен, [инструкции здесь](https://getcomposer.org/download/). Ниже предполагается глобальная установка, например `mv composer.phar /usr/local/bin/composer` после инструкций по ссылке.

Запустите `composer install` в корне каталога `www`.

``` bash
$ composer install
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 40 installs, 0 updates, 0 removals
 - Installing xpdo/xpdo (3.2.0): Extracting archive
 - Installing league/flysystem (2.5.0): Extracting archive
 - Installing phpmailer/phpmailer (v6.9.1): Extracting archive
 - Installing smarty/smarty (v4.5.0): Extracting archive
 - Installing guzzlehttp/guzzle (7.8.1): Extracting archive
 ...
Generating optimized autoload files
```

Точные версии пакетов со временем меняются. Успешный запуск заканчивается генерацией autoloader в `core/vendor/`.

Иногда нужен `composer update`, чтобы зависимости соответствовали вашей ветке.

### Сборка

После установки зависимостей перейдите в `_build` и скопируйте конфиги:

``` bash
cd www/_build
cp build.config.sample.php build.config.php
cp build.properties.sample.php build.properties.php
```

Обычно файлы менять не нужно. При необходимости можно настроить подключение к БД.

Запустите `php transport.core.php` в `_build`:

``` bash
$ php transport.core.php
[2018-03-22 07:38:12] (INFO @ transport.core.php) Beginning build script processes...
[2018-03-22 07:38:12] (INFO @ transport.core.php) Removed pre-existing core/ and core.transport.zip.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Core transport package created.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Core Namespace packaged.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Default workspace packaged.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged modx.com transport provider.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 modMenus.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged all default modContentTypes.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged all default modClassMap objects.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 189 default events.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 225 default system settings.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 default context settings.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default user groups.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default dashboards.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 1 default media sources.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 5 default dashboard widgets.
[2018-03-22 07:38:12] (INFO @ transport.core.php) Packaged in 2 default roles Member and SuperUser.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 6 default Access Policy Template Groups.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 7 default Access Policy Templates.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in 12 default Access Policies.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in web context.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in mgr context.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Packaged in connectors.
[2018-03-22 07:38:13] (INFO @ transport.core.php) Beginning to zip up transport package...
[2018-03-22 07:38:14] (INFO @ transport.core.php) Transport zip created. Build script finished.

Execution time: 1.8067 s
```

Можно запустить из корня проекта: `php _build/transport.core.php`, если конфиги уже созданы.

### Запуск Setup

Откройте обычный setup в браузере, например `http://localhost/setup/`.

При установке из Git отметьте **Core package has been manually unpacked** и **Files are already in-place**. Обычно они уже выбраны.

Дойдите до конца setup: готово.

## Обновление локального git-репозитория после коммитов

``` bash
git fetch upstream
git rebase upstream/3.x
```

Если клонировали напрямую из `modxcms/revolution`, используйте `origin`:

``` bash
git fetch origin
git rebase origin/3.x
```

`3.x` можно заменить на любую другую ветку.

После подтягивания изменений может понадобиться снова запустить сборку и setup.

## Участие через pull request

Если вы исправили баг или добавили улучшение в fork revolution, отправьте pull request: его проверят core integrators.

[Подробнее в разделе Contribute](contribute/code).

## Переключение веток

Чтобы переключиться на другую уже локально полученную ветку:

``` bash
git fetch upstream
git checkout 2.5.x upstream/2.5.x
```

Подставьте имя нужной ветки вместо `2.5.x`. Затем снова запустите сборку и `setup/`: у разных веток могут быть разные базы.

Откат на более старую ветку не всегда безопасен. Например, с 2.x на 2.5.x: изменения БД нельзя откатить. Серьёзных сбоев обычно нет, но лучше держать отдельные базы для каждой ветки.

## Дополнительно

### Альтернатива: create-project

`composer create-project` клонирует репозиторий, ставит зависимости и собирает ядро за один шаг.

Из родительского каталога, куда нужно установить MODX:

```bash
composer create-project modx/revolution your_directory 3.x-dev
cd your_directory
```

`your_directory`: каталог установки (можно `.` для текущего пустого каталога).

Чтобы направить git на свой fork:

1. `git remote add upstream https://github.com/modxcms/revolution.git`
2. `git remote set-url origin {your github repo url}`
3. При необходимости: `git remote set-url --push origin {your github repo url}`

Откройте setup, например `http://localhost/setup/`, и завершите установку.

### PHP MAMP на macOS

Если `php -v` в Terminal показывает другую версию, чем MAMP (или сборка падает с ошибками библиотек), вызывайте бинарник PHP MAMP явно. Путь зависит от версии MAMP. Типичный PHP 8.2:

``` bash
/Applications/MAMP/bin/php/php8.2.0/bin/php transport.core.php
```

Можно поставить этот `bin` в начало `PATH` (см. ниже), чтобы `php` и `composer` использовали одну версию.

### Проверка `php` в PATH

Если composer или сборка не запускаются, проверьте PHP в PATH:

``` bash
$ php -v
PHP 8.2.12 (cli) (built: Nov 21 2023 08:00:00) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.2.12, Copyright (c) Zend Technologies
 with Zend OPcache v8.2.12, Copyright (c), by Zend Technologies
```

Для актуального MODX 3.x нужен **PHP 8.1 или выше** (обязательно с 3.2). Если `php -v` показывает более старую версию, установите или выберите более новый PHP.

В локальных средах (MAMP, XAMPP) проверьте, какой PHP реально используется:

``` bash
$ which php
/Applications/MAMP/bin/php/php8.2.0/bin/php
```

Если путь не тот, отредактируйте `$PATH` в `~/.bash_profile` или `~/.zshrc`.
