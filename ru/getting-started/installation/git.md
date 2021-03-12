---
title: "Установка с Git"
translation: "getting-started/installation/git"
---

Установка MODX из git - отличный способ получить самую последнюю версию, а также она необходима, если вы планируете внести свой вклад в разработку MODX. Это требует на несколько шагов больше, чем при стандартной установке.

## Процесс установки

Вам необходимо:

- получить файлы с GitHub
- установить зависимости composer
- собрать ядро
- запустить стандартную настройку

Каждый шаг подробно описывается ниже.

### Получите файлы с GitHub

Склонируйте [репозиторий Revolution на GitHub](<http://github.com/modxcms/revolution>), используя следующий синтаксис:

``` bash
git clone http://github.com/modxcms/revolution.git -b 3.x www
```

Обратите внимание, что он предварительно выбирает ветку 3.x и устанавливается в каталог `www`, вы можете настроить его в соответствии с желаемой настройкой.

Или, если вы хотите внести свой вклад: [сделайте форк modxcms/revolution в свою учетную запись GitHub](<http://help.github.com/forking/>), клонируйте этот репозиторий как "origin" и добавьте `modxcms/revolution` репозиторий как удаленный под названием "upstream":

``` bash
git clone git@github.com:yourgitusernamehere/revolution.git
cd revolution
git remote add upstream -f http://github.com/modxcms/revolution.git -b 3.x www
```

Вы можете переключиться на другую ветку, используя `git checkout <name-of-branch>` или `git checkout -b 3.x upstream/3.x`

### Установите зависимости с помощью Composer

MODX использует Composer для управления внутренними зависимостями, необходимыми для запуска 3.x.

Если в вашей системе еще не установлен Composer [см. Инструкции по установке здесь](https://getcomposer.org/download/). В приведенной ниже команде предполагается, что вы установили Composer глобально, например, запустив `mv composer.phar /usr/local/bin/composer` после инструкций по установке, указанных выше.

Запустите `composer install` в корне директории `www`.

``` bash
$ composer install
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 21 installs, 0 updates, 0 removals

- Installing psr/log (1.0.2): Loading from cache
- Installing symfony/debug (v4.0.6): Loading from cache
- Installing symfony/polyfill-mbstring (v1.7.0): Loading from cache
- Installing symfony/console (v3.4.6): Loading from cache
- Installing psr/container (1.0.0): Loading from cache
- Installing container-interop/container-interop (1.2.0): Loading from cache
- Installing xpdo/xpdo (3.x-dev 5801782): Cloning 58017821d0 from cache
- Installing mtdowling/jmespath.php (2.4.0): Loading from cache
- Installing psr/http-message (1.0.1): Loading from cache
- Installing guzzlehttp/psr7 (1.4.2): Loading from cache
- Installing guzzlehttp/promises (v1.3.1): Loading from cache
- Installing guzzlehttp/guzzle (6.3.0): Loading from cache
- Installing aws/aws-sdk-php (3.52.30): Downloading (100%)
- Installing league/flysystem (1.0.43): Loading from cache
- Installing league/flysystem-aws-s3-v3 (1.0.18): Loading from cache
- Installing psr/cache (1.0.1): Loading from cache
- Installing league/flysystem-cached-adapter (1.0.6): Loading from cache
- Installing phpmailer/phpmailer (v6.0.3): Loading from cache
- Installing smarty/smarty (v3.1.31): Loading from cache
- Installing james-heinrich/phpthumb (v1.7.14): Loading from cache
- Installing pelago/emogrifier (v2.0.0): Loading from cache
symfony/console suggests installing symfony/event-dispatcher ()
symfony/console suggests installing symfony/lock ()
symfony/console suggests installing symfony/process ()
xpdo/xpdo suggests installing ext-redis (Allows caching using Redis)
aws/aws-sdk-php suggests installing aws/aws-php-sns-message-validator (To validate incoming SNS notifications)
aws/aws-sdk-php suggests installing doctrine/cache (To use the DoctrineCacheAdapter)
league/flysystem suggests installing league/flysystem-aws-s3-v2 (Allows you to use S3 storage with AWS SDK v2)
league/flysystem suggests installing league/flysystem-azure (Allows you to use Windows Azure Blob storage)
league/flysystem suggests installing league/flysystem-eventable-filesystem (Allows you to use EventableFilesystem)
league/flysystem suggests installing league/flysystem-rackspace (Allows you to use Rackspace Cloud Files)
league/flysystem suggests installing league/flysystem-sftp (Allows you to use SFTP server storage via phpseclib)
league/flysystem suggests installing league/flysystem-webdav (Allows you to use WebDAV storage)
league/flysystem suggests installing league/flysystem-ziparchive (Allows you to use ZipArchive adapter)
league/flysystem suggests installing spatie/flysystem-dropbox (Allows you to use Dropbox storage)
league/flysystem suggests installing srmklive/flysystem-dropbox-v2 (Allows you to use Dropbox storage for PHP 5 applications)
league/flysystem-cached-adapter suggests installing ext-phpredis (Pure C implemented extension for PHP)
phpmailer/phpmailer suggests installing league/oauth2-google (Needed for Google XOAUTH2 authentication)
phpmailer/phpmailer suggests installing hayageek/oauth2-yahoo (Needed for Yahoo XOAUTH2 authentication)
phpmailer/phpmailer suggests installing stevenmaguire/oauth2-microsoft (Needed for Microsoft XOAUTH2 authentication)
Writing lock file
Generating autoload files
```

Время от времени может потребоваться запускать `composer update`, чтобы быть в курсе последних обновлений.

### Запускаем сборку

После того, как зависимости установлены, перейдите в папку `_build` и скопируйте туда файлы конфигурации.

``` bash
cd www/_build
cp build.config.sample.php build.config.php
cp build.properties.sample.php build.properties.php
```

Как правило, никаких изменений в эти файлы не требуется, но при необходимости вы можете изменить параметры подключения к базе данных.

Затем запустите `php transport.core.php` в папке `_build`:

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

Вы также можете запустить это из корня проекта как `php _build/transport.core.php`, если вы ранее создали файлы конфигурации.

### Запустить установку

Теперь вы готовы выполнить стандартную настройку через браузер, например: <http://localhost/setup/>.

Убедитесь, что вы отметили оба параметра: «Основной пакет распакован вручную» и «Файлы уже на месте» при установке из Git. Обычно они предварительно выбираются за вас.

Продолжайте настройку, и все готово!

## Обновление локального репозитория Git после фиксации

Выполните следующее, чтобы обновить локальный репозиторий git после коммитов.

``` bash
git fetch upstream
git rebase upstream/3.x
```

Если вы клонировали прямо из `modxcms/revolution`, используйте `origin`:

``` bash
git fetch origin
git rebase origin/3.x
```

Вы можете заменить `3.x` любой другой веткой.

Может потребоваться запустить этап сборки и настройка после загрузки изменений.

## Участие путем отправки Pull request

Если вы исправили ошибку или добавили улучшение, и вы работаете над форком репозитория Revolution, вы можете отправить запрос на перенос в MODX, который будет рассмотрен основными интеграторами.

[См. Дополнительную информацию в разделе "Содействие"](contribute/code).

## Переключение веток

Если вы хотите переключиться на другую ветку (которую вы уже выполнили локально), просто введите эти команды:

``` bash
git fetch upstream
git checkout 2.5.x upstream/2.5.x
```

Конечно, заменив 2.5.x фактическим именем ветки, на которую вы хотите переключиться. После того, как вы это сделаете, запустите сборку и снова запустите `setup/`, поскольку разные ветки могут иметь разные базы данных.

Обратное переключение не всегда рекомендуется, т.е. переключение с 2.x (последние функции в разработке для следующего второстепенного выпуска) на 2.5.x (последние исправления для следующего выпуска исправлений), поскольку изменения в базе данных не могут быть выполнены в обратном порядке. Хотя никаких серьезных проблем возникнуть не должно, будьте осторожны при этом или храните свою работу в отдельных базах данных для каждой ветви, над которой вы работаете.

## Дополнительная информация

### Альтернатива: использование create-project

Команда `composer create-project` будет клонировать, устанавливать зависимости и собирать ядро за один шаг.

Из родительского каталога, в который вы хотите установить MODX, выполните следующую команду, где `your_directory` - это каталог, в который вы хотите установить MODX. (Это также может быть `.` для установки в текущий пустой каталог.)

```bash
composer create-project modx/revolution your_directory 3.x-dev
cd your_directory
```

Если вы хотите указать git на свой форк, чтобы внести свой вклад в MODX:

1. `git remote add upstream https://github.com/modxcms/revolution.git`
2. `git remote set-url origin {your github repo url}`
3. Также вам могут понадобиться: `git remote set-url --push origin {your github repo url}`

Теперь перейдите к стандартной настройке, например: `http://localhost/setup/` настроить и установить MODX.

### DYLD ошибка с MAMP в Mac OS X

Если вы используете MAMP в Mac OS X, у вас могут возникнуть проблемы (ошибки о том, что библиотеки DYLD не включены) при попытке запустить `transport.core.php` из терминала. Это связано с тем, что библиотеки MAMP PHP по умолчанию не находятся в пути динамического компоновщика.

Чтобы настроить путь библиотеки динамического компоновщика для включения библиотек MAMP PHP, выполните следующую команду через терминал:

``` bash
export DYLD_LIBRARY_PATH=/Applications/MAMP/Library/lib:$\{DYLD_LIBRARY_PATH\}
```

Затем вы можете выполнить `transport.core.php`, используя абсолютный путь к исполняемому файлу MAMP PHP:

``` bash
/Applications/MAMP/bin/php5/bin/php transport.core.php
```

### Убедитесь, что `php` находится в вашем PATH

Если у вас возникли проблемы с запуском шагов composer или сборки, проверьте, есть ли PHP в вашем PATH, выполнив следующие действия:

``` bash
$ php -v
PHP 7.2.3 (cli) (built: Mar 8 2018 10:30:06) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
 with Zend OPcache v7.2.3, Copyright (c) 1999-2018, by Zend Technologies
```

Если у вас не получается что-то подобное, спросите кого-нибудь или Google, как это установить.

В некоторых локальных средах разработки (например, MAMP, XAMMP) вы также можете проверить, какую версию PHP вы используете.

``` bash
$ which php
/Applications/MAMP/bin/php/php7.4.12/bin/php
```

Если это не возвращает ожидаемый путь, отредактируйте `$PATH` в вашем `~/.bash_profile` или `~/.zshrc`.
