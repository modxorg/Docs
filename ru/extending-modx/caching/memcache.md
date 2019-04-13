---
title: Использование Memcache
_old_id: '283'
_old_uri: 2.x/developing-in-modx/advanced-development/caching/setting-up-memcache-in-modx
---

## Требования

Для начала вам понадобится следующее:

- Работающий сервер memcached и адрес, на котором он работает
- The [PHP memcached extension](http://php.net/memcached), installed on the server running MODX

## Настройка Memcache в MODX

Go to System Settings, and change the "cache_handler" system setting to "cache.xPDOMemCache".

Если на вашем сервере имеется более одного сайта MODX с обработчиком кэша cache.xPDOMemCache, вам необходимо создать новый системный параметр «cache_prefix» со значением, например «yoursite_», чтобы различать ключи кэша для разных сайтов.

Если ваш сервер memcached находится на отдельном сервере, вы можете установить путь к нему с помощью системного параметра «resource_memcached_server» со значением, например «memcache.tld: 121212»

## Смотрите также

- [Кэширование](extending-modx/caching "Caching")
