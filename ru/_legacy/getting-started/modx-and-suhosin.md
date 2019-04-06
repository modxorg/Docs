---
title: "MODX и Suhosin"
translation: "_legacy/getting-started/modx-and-suhosin"
---

# MODX и Suhosin

## Известные проблемы с Suhosin

Suhosin - это расширение PHP, которое добавляет дополнительные меры безопасности в PHP. Одной из них является проверка предотвращения доступа к серверу, если переменная GET слишком длинная. Это вызывает проблемы в менеджере MODX, в версиях начиная с 2.2, поскольку MODX использует [Google minify](http://code.google.com/p/minify) для минимизации и сжатия JavaScript в менеджере.

Для предотвращения этого, при установке MODX попытается найти значение suhosin.get.max\_value\_length и если оно меньше 1024, отключит сжатие JS в менеджере.

### Рекомендуемая конфигурация

Если вы включили suhosin и хотите сжать JS, рекомендуется установить для параметра suhosin.get.max_value_length равным 4096 или выше:

``` php
suhosin.get.max_value_length = 4096
```

В некоторых случаях проблемы могут возникнуть из-за использования оператора eval(). Если это произойдет, вы можете отключить его блокировку, изменив конфигурацию:

``` php
suhosin.executor.disable_eval 0
```

Если вы не можете редактировать php.ini напрямую, проконсультируйтесь с технической поддержкой вашего хостинга. Некоторые хостинги разрешают его изменение с помощью файлов htaccess, интерфейса панели управления или прямых запросов в техническую поддержку.

## Так же

- [Базовая Установка](getting-started/installation/standard)
  - [MODx Revolution на Debian](_legacy/getting-started/modx-revolution-on-debian)
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
