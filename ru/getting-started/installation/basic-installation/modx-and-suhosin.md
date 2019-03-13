---
title: "MODX и Suhosin"
translation: "_legacy/getting-started/modx-and-suhosin"
---

- [Известные проблемы с Suhosin](#известные-проблемы-с-suhosin)
  - [Рекомендуемая конфигурация](#рекомендуемая-конфигурация)
- [Так же](#Так-же)



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
