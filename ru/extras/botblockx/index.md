---
title: "BotBlockX"
description: "Плагин для блокировки плохо ведущих себя ботов на основе классического скрипта Alex Kemp"
translation: "extras/botblockx/index"
---

## Что такое BotBlockX?

BotBlockX основан на [классической процедуре блокировки ботов](http://download.modem-help.co.uk/non-modem/PHP/Rogue-Bot-Blocking/ "Classic bot blocking script") Alex Kemp. Код переписан для MODX Revolution с несколькими доработками, но основа осталась оригинальной.

При установке по умолчанию плагин блокирует плохо ведущих себя ботов (медленных и быстрых), не трогая хороших, например Google. Плохие боты также попадают в лог.

BotBlockX создаёт много файлов в каталоге block/, но все они нулевой длины и не считаются ресурсами сайта. Это возможно благодаря использованию modification time и access time для хранения данных о поведении посетителя. Каталоги block/ и logs/ лежат прямо под core MODX для быстрого доступа.

## Сведения о пакете

- Загрузок: 1 494
- Лицензия: GPLv2
- Требуется: Revolution 2.0.x или новее
- Поддерживает: mysql, sqlsrv

## История

- Автор: Alex Kemp [bot-block](http://biostatisticien.eu/www.searchlores.org/bot-block.php.txt)
- Автор: Bob Ray [Bob's Guides](http://bobsguides.com)

Эту версию extra BotBlockX разработал Bob Ray. Первый коммит на GitHub: 28 октября 2011 года. На 22 июня 2017 года последнее обновление было 12 июня 2017 года, 51 коммит, 1 494 загрузки. Пакет BotBlockX состоит из 296 файлов и 8 988 строк кода.

Сейчас проект поддерживает Bob Ray.

## Загрузка

BotBlockX устанавливается через менеджер MODX Revolution в [Менеджере пакетов](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer) или из [репозитория MODX Extras](https://modx.com/extras/package/botblockx).

## Разработка и сообщения об ошибках

BotBlockX хранится и развивается на GitHub: [главная страница BotBlockX на GitHub](https://github.com/BobRay/BotBlockX).

Ошибки и запросы функций: [страница issues BotBlockX](https://github.com/BobRay/BotBlockX/issues).

Вопросы по использованию BotBlockX задавайте на [форумах MODX](https://forums.modx.com).

## Документация

Полная документация на сайте автора (Bob's Guides): [документация BotBlockX](https://bobsguides.com/botblockx-tutorial.html).
