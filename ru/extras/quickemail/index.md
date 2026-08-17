---
title: "QuickEmail"
description: "Сниппет для отправки email и диагностики проблем с почтой в MODX Revolution"
translation: "extras/quickemail/index"
---

## Что такое QuickEmail?

QuickEmail можно использовать для отправки email из сниппета, но основная задача пакета это диагностика проблем с почтой.

После установки QuickEmail создайте ресурс QuickEmailCheck и добавьте в контент следующий тег сниппета:

При предпросмотре страницы вы должны получить письмо. Если письма нет, замените тег на этот и снова откройте предпросмотр:

``` php
[[!QuickEmail? &debug=`1`]]
```

## Сведения о пакете

- Загрузок: 8 202
- Лицензия: GPLv2
- Требуется: Revolution 2.0.x или новее
- Поддерживает: mysql, sqlsrv

## История

- Автор: Bob Ray [Bob's Guides](https://bobsguides.com)

Эту версию extra QuickEmail разработал Bob Ray. Первый коммит на GitHub: 7 декабря 2010 года. На 22 июня 2017 года последнее обновление было 22 июня 2017 года, 27 коммитов, 8 202 загрузки. Пакет QuickEmail состоит из 276 файлов, 2 359 строк кода.

Сейчас проект поддерживает Bob Ray.

## Загрузка

QuickEmail устанавливается через менеджер MODX Revolution в [Менеджере пакетов](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer) или из [репозитория MODX Extras](https://modx.com/extras/package/quickemail).

## Разработка и сообщения об ошибках

QuickEmail хранится и развивается на GitHub: [главная страница QuickEmail на GitHub](https://github.com/BobRay/QuickEmail).

Ошибки и запросы функций: [страница issues QuickEmail](https://github.com/BobRay/QuickEmail/issues).

Вопросы по использованию QuickEmail задавайте на [форумах MODX](https://forums.modx.com).

## Документация

Полная документация на сайте автора (Bob's Guides): [документация QuickEmail](https://bobsguides.com/quickemail-snippet-tutorial.html).
