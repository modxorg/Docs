---
title: "Привязки"
translation: "building-sites/elements/template-variables/bindings"
---

Привязка с `@` задаёт источник данных переменной шаблона. Чаще её ставят на TV со списком или флажками: варианты подставляются, когда ресурс редактируют.

Источники:

- файл, присланный на сервер, например по FTP
- таблица базы, которую MODX может прочитать
- [ресурс](building-sites/resources "Ресурсы") в дереве ресурсов
- [чанк](building-sites/elements/chunks "Чанки") в дереве элементов
- результат PHP-скрипта

Команды:

- @FILE file\_path
- @RESOURCE resource\_id
- @CHUNK chunk\_name \[properties\_as\_json\]
- @SNIPPET snippet\_name \[properties\_as\_json\]
- @SELECT sql\_query
- @DIRECTORY path\_relative\_to\_base\_path
- @INHERIT
- @DOCUMENT resource\_id
- @INLINE доступный в некоторых дополнительных объектах (например, getResources), это указывает блок форматирования in-line в виде строки.

Источник может вернуть строку (в том числе число или дату), массив или набор записей. Что вернётся, зависит от привязки. Некоторые типы ввода затем пытаются превратить результат в строку или массив.

Например, элементы управления, которые принимают строковые значения, такие как группа переключателей или список выбора, будут пытаться преобразовать набор записей (строки и столбцы) в следующий формат:

``` php
col1row1Value==col2row1Value||col1row2Value==col2row2Value,...
```

Привязка в поле значений параметров ввода собирает варианты, пока вы редактируете ресурс. Привязка в поле значения по умолчанию заполняет TV, если у ресурса ещё нет своего значения. Привязка, сохранённая у ресурса, тоже выполняется, когда страница выводит `[[*tvName]]`, если сохранённое значение начинается с `@`.

## Types

- [@FILE](building-sites/elements/template-variables/bindings/file-binding "FILE привязка")
- [@RESOURCE](building-sites/elements/template-variables/bindings/resource-binding "RESOURCE привязка")
- [@CHUNK](building-sites/elements/template-variables/bindings/chunk-binding "CHUNK привязка")
- [@SELECT](building-sites/elements/template-variables/bindings/select-binding "SELECT привязка")
- [@SNIPPET](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET привязка")
- [@DIRECTORY](building-sites/elements/template-variables/bindings/directory-binding "DIRECTORY привязка")
- [@INHERIT](building-sites/elements/template-variables/bindings/inherit-binding "INHERIT привязка")
- [@DOCUMENT](building-sites/elements/template-variables/bindings/document-binding "DOCUMENT привязка")

Некоторые дополнения, такие как [getResources](/extras/getresources "getResources"), поддерживают привязки `@INLINE` или `@FILE` для своих чанков.

## Смотрите также

- [Переменные шаблона TV](building-sites/elements/template-variables "Переменные шаблона TV")
