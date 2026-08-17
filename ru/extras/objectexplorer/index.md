---
title: "ObjectExplorer"
description: "Сниппет-справочник по объектам MODX на основе schema-файла"
translation: "extras/objectexplorer/index"
---

## Что такое ObjectExplorer

Вывод ObjectExplorer берётся из schema-файла MODX, поэтому соответствует объектам вашей версии MODX Revolution. Удобен как справочник при работе с кодом MODX. Работает и вне MODX.

По умолчанию выводится Quick Reference, это рекомендуемый режим. Альтернатива: Full Reference, дамп всей схемы как массива.

Создайте ресурс и вставьте в content тег:

``` php
[[ObjectExplorer]]
```

``` php
[[ObjectExplorer? &full=`1`]]
```

``` php
[[ObjectExplorer? &columns=`5`]]
```

Откройте ресурс и вы увидите справочник.

По умолчанию индекс сверху в 4 колонки. При изменении, вероятно, нужно подправить ширину JumpList в CSS.

Вызывайте сниппет некэшированным. Выполнение занимает время.

## Сведения о пакете

- Загрузок: 1 054
- Лицензия: GPLv2
- Требуется: Revolution 2.0.x или новее
- Поддерживает: mysql, sqlsrv

## История

- Автор: Bob Ray [Bob's Guides](https://bobsguides.com)

Эту версию extra ObjectExplorer разработал Bob Ray. Первый коммит на GitHub: 26 ноября 2011 года. На 22 июня 2017 года последнее обновление было 22 июня 2017 года, 34 коммита, 1 054 загрузки. Пакет ObjectExplorer состоит из 201 файла и 10 152 строк кода.

Сейчас проект поддерживает Bob Ray.

## Загрузка

ObjectExplorer устанавливается через менеджер MODX Revolution в [Менеджере пакетов](developing-in-modx/advanced-development/package-management "Package Manager") (Extras -> Installer) или из [репозитория MODX Extras](https://modx.com/extras/package/objectexplorer).

## Разработка и сообщения об ошибках

ObjectExplorer хранится и развивается на GitHub: [главная страница ObjectExplorer на GitHub](https://github.com/BobRay/ObjectExplorer).

Ошибки и запросы функций: [страница issues ObjectExplorer](https://github.com/BobRay/ObjectExplorer/issues).

Вопросы по использованию ObjectExplorer задавайте на [форумах MODX](https://forums.modx.com).

## Документация

Полная документация на сайте автора (Bob's Guides): [документация ObjectExplorer](https://bobsguides.com/objectexplorer-tutorial.html).
