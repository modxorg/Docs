---
title: Использование Memcache
translation: extending-modx/caching/memcache
---

## Требования

Для начала вам понадобится следующее:

- Работающий сервер memcached и адрес, на котором он работает
- [Расширение PHP memcached](http://php.net/memcached), установленное на сервере с MODX

## Настройка Memcache в MODX

Перейдите в системные настройки и измените системный параметр «cache_handler» на «cache.xPDOMemCache».

Если на вашем сервере имеется более одного сайта MODX с обработчиком кэша cache.xPDOMemCache, вам необходимо создать новый системный параметр «cache_prefix» со значением, например «yoursite_», чтобы различать ключи кэша для разных сайтов.

Если ваш сервер memcached находится на отдельном сервере, вы можете установить путь к нему с помощью системного параметра «resource_memcached_server» со значением, например «memcache.tld: 121212»

## Смотрите также

- [Кэширование](extending-modx/caching "Caching")
