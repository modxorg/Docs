---
title: "Установка при помощи командной строки"
_old_id: "349"
_old_uri: "2.x/getting-started/installation/command-line-installation"
---

Установка при помощи командной строки (CLI), доступна в MODX Revolution начиная с версии 2.2

- [Установка MODX при помощи командной строки (CLI)](##установка-modx-при-помощи-командной-строки-cli)
- [Установка (CLI)](#установка-cli)
- [Обновление MODX при помощи командной строки (CLI)](#обновление-modx-при-помощи-командной-строки-cli)
- [Расширенное обновление MODX при помощи командной строки (CLI)](#расширенное-обновление-modx-при-помощи-командной-строки-cli)
- [Использование вспомогательного скрипта](#использование-вспомогательного-скрипта)
- [Так же](#так-же)



## Установка MODX при помощи командной строки (CLI)

MODX позволяет выполнять обновление и установку при помощи командной строки (CLI), с использованием файла конфигурации XML. (Более подробную информацию об этом файле можно найти [здесь] (getting-started/installation/command-line-installation/the-setup-config-xml-file "Создание Установочного Xml Файла").) Это позволяет пользователям создавать простые скрипты для обновления своих установок <!-- установки --> MODX.

Рекомендуется, перед обновлением **всегда** создовать резервную копию файлов.


## Установка (CLI)

Прежде всего, [скачайте MODX](http://modx.com/download/) и распакуйте на ваш сервер. Скопируйте файл "config.dist.new.xml" в каталог setup/ и переименуйте его в "config.xml". Во время установки MODX автоматически выполнит поиск файла setup/config.xml. Вы можете разместить его за пределами каталога setup/ (и корневого каталога MODX, если захотите) и указать его местоположение с помощью аргумента "--config=/path/to/config.xml".

После этого откройте для редактирования XML-файл и настройте подключение к базе данных, путь к MODX и другие параметры конфигурации. Затем, используя командную строку, перейдите в каталог setup/ и введите:

``` php 
php ./index.php --installmode=new
```

MODX приступит к установке, по окончанию которой, отобразит затраченное время, а также сообщит о возникших ошибках (будут записаны в лог устанки core/cache/logs/).

Заметка: если вы используете не стандартный каталог, вы должны указать дополнительный аргумент:

``` php 
--core_path=/path/to/core/
```

## Обновление MODX при помощи командной строки (CLI)

Выполните те же действия, что и при новой установке, но на этот раз в вашем XML-файле вам можно указать только следующие атрибуты:

- inplace
- unpacked
- language
- remove\_setup\_directory

Вы можете указать любые другие атрибуты, которые вы хотели бы изменить во время обновления. Обновление может выполняться при помощи XML-файла «config.dist.upgrade.xml». Когда все готово, перейдите в каталог setup/ и выполните:

``` php 
php ./index.php --installmode=upgrade
```

MODX приступит к обновлению, по окончанию которого, отобразит затраченное время, а также сообщит о возникших ошибках (будут записаны в лог  core/cache/logs/).

## Расширенное обновление MODX при помощи командной строки (CLI)

Выполните те же шаги, что и при базовом обновлении, но на этот раз в вашем XML-файле вам потребуются все доступные атрибуты, включенные в файл config.dist.upgrade-advanced.xml, все они могут быть изменены при расширенном обновлении.

Когда все готово, перейдите в каталог setup/ и выполните:

``` php 
php ./index.php --installmode=upgrade-advanced
```

MODX приступит к обновлению, по окончанию которого, отобразит затраченное время, а также сообщит о возникших ошибках (будут записаны в лог  core/cache/logs/).

## Использование вспомогательного скрипта

На Github доступен вспомогательный скрипт ** installmodx.php **: [https://github.com/craftsmancoding/modx\_utils/blob/master/installmodx.php](https://github.com/craftsmancoding/modx_utils/blob/master/installmodx.php)

Этот скрипт устанавливает или обновляет существующую MODX Revolution до последней версии. Существует много параметров командной строки, которые вы можете использовать при выполнении сценария, но если они не предоставлены, вам будет предложено ввести необходимые сведения. Вот видео этого в действии: <!-- Видео нет( -->

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
