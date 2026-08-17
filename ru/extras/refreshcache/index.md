---
title: "RefreshCache"
description: "Сниппет принудительного обновления кэша ресурсов, чанков и сниппетов в MODX Revolution"
translation: "extras/refreshcache/index"
---

## Что такое RefreshCache?

RefreshCache это сниппет для MODX Revolution, который обновляет кэш всех кэшируемых ресурсов и входящих в них чанков и сниппетов, даже если это не требуется. Работает медленно и неэлегантно, но после завершения посетителям не придётся так долго ждать загрузки страниц.

Сниппет запрашивает каждый ресурс сайта через cURL. Скорость намеренно занижена, чтобы не перегружать сервер и не попадать под скрипты блокировки ботов.

## Сведения о пакете

- Загрузок: 1 829
- Лицензия: GPLv2
- Требуется: Revolution 2.0.x или новее
- Поддерживает: mysql, sqlsrv

## История

- Автор: Bob Ray [Bob's Guides](https://bobsguides.com)

Эту версию extra RefreshCache разработал Bob Ray. Первый коммит на GitHub: 14 декабря 2011 года. На 22 июня 2017 года последнее обновление было 22 июня 2017 года, 35 коммитов, 1 829 загрузок. Пакет RefreshCache состоит из 422 файлов, 5 564 строк кода.

Сейчас проект поддерживает Bob Ray.

## Загрузка

RefreshCache устанавливается через менеджер MODX Revolution в [Менеджере пакетов](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer) или из [репозитория MODX Extras](https://modx.com/extras/package/refreshcache).

## Разработка и сообщения об ошибках

RefreshCache хранится и развивается на GitHub: [главная страница RefreshCache на GitHub](https://github.com/BobRay/RefreshCache).

Ошибки и запросы функций: [страница issues RefreshCache](https://github.com/BobRay/RefreshCache/issues).

Вопросы по использованию RefreshCache задавайте на [форумах MODX](https://forums.modx.com).

## Документация

Полная документация на сайте автора (Bob's Guides): [документация RefreshCache](https://bobsguides.com/refreshcache-tutorial).
