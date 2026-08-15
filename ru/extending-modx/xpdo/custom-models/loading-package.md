---
title: "Загрузка пакетов"
translation: "extending-modx/xpdo/custom-models/loading-package"
---

## Что такое xPDO пакеты?

Пакеты - это коллекции карт и классов, которые представляют таблицы в базе данных. Это слой ORM, обычно хранящийся внутри каталога "model/" в компоненте.

## Как они используются?

Пакеты загружаются в xPDO при помощи метода addPackage или методов addExtensionPackage. Метод addPackage подходит для плагинов и сниппетов, которые должны загружать классы и данные таблиц по требованию. addExtensionPackage - это удобный метод, который в конечном итоге опирается на addPackage. Когда пакет добавляется через метод addExtensionPackage, он загружается с каждым MODX запросом; это больше подходит для пакетов, которые изменяют функциональность ядра.

Метод `addPackage` принимает имя пакета, абсолютный путь к каталогу модели и необязательный префикс таблиц. Если префикс не передать, xPDO берёт значение соединения (`xPDO::OPT_TABLE_PREFIX`), в MODX это префикс сайта. **Не передавайте свой префикс таблиц, если таблицы пакета не должны жить отдельно от префикса MODX.** Жёсткий третий аргумент переопределяет префикс MODX и ломает установки со сменённым `table_prefix` (см. [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)).

Допустим, пакет модели xPDO (карты и классы) лежит здесь:

> /myapp/core/model/boxpackage/

Загрузите его с префиксом соединения:

``` php
$xpdo->addPackage('boxpackage', '/myapp/core/model/');
```

Дальше классы пакета можно брать методами выборки xPDO.

## Выводы

Теперь, когда вы загрузили пакет, вы можете захотеть взглянуть на [creating objects](extending-modx/xpdo/creating-objects "Создание объектов"), или добавление строк в ваши таблицы при помощи xPDO.

## Смотрите также

- [Метод addPackage()](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)
- [Настройка extension\_packages](building-sites/settings/extension_packages)
