---
title: "MODX и Suhosin"
translation: "_legacy/getting-started/modx-and-suhosin"
---

- [Известные проблемы с Suhosin](#%D0%B8%D0%B7%D0%B2%D0%B5%D1%81%D1%82%D0%BD%D1%8B%D0%B5-%D0%BF%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC%D1%8B-%D1%81-suhosin)
  - [Рекомендуемая конфигурация](#%D1%80%D0%B5%D0%BA%D0%BE%D0%BC%D0%B5%D0%BD%D0%B4%D1%83%D0%B5%D0%BC%D0%B0%D1%8F-%D0%BA%D0%BE%D0%BD%D1%84%D0%B8%D0%B3%D1%83%D1%80%D0%B0%D1%86%D0%B8%D1%8F)
- [Так же](#%D1%82%D0%B0%D0%BA-%D0%B6%D0%B5)



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

1. [Базовая Установка](getting-started/installation/standard)
  1. [MODx Revolution на Debian](_legacy/getting-started/modx-revolution-on-debian)
  2. [Гид по Lighttpd](getting-started/friendly-urls/lighttpd)
  3. [Проблемы с WAMPServer 2.0i](_legacy/getting-started/problems-with-wampserver-2.0i)
  4. [Установка на сервере с запущеным ModSecurity](getting-started/installation/troubleshooting/modsecurity)
  5. [MODX и Suhosin](_legacy/getting-started/modx-and-suhosin)
  6. [Настройка Сервера Nginx](getting-started/friendly-urls/nginx)
2. [Расширенная Установка](getting-started/installation/advanced)
3. [Установка через Git](getting-started/installation/git)
4. [Установка При Помощи Командной Строки](getting-started/installation/cli)
  1. [Создание Установочного Xml Файла](getting-started/installation/cli/config.xml)
5. [Устранение неполадок при установке](getting-started/installation/troubleshooting)
6. [Успешная Установка, Что Дальше?](getting-started/getting-started)
7. [Использование MODX Revolution от SVN](_legacy/getting-started/using-modx-revolution-from-svn)
