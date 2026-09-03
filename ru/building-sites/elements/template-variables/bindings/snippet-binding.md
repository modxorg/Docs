---
title: "Привязка SNIPPET"
translation: "building-sites/elements/template-variables/bindings/snippet-binding"
---

## Что такое привязка @SNIPPET?

Привязка @SNIPPET выполняет указанный сниппет MODX. Используйте её только с осторожностью с точки зрения безопасности.

## Синтаксис

``` php
@SNIPPET snippet_name [properties_as_json]
```

Привязывает переменную к сниппету. Где `snippet_name` - это имя сниппета. Возвращаемое значение - вывод сниппета.\
Свойства в формате JSON необязательны (MODX 3.0+) и передаются сниппету как scriptProperties.

## Использование

Пусть есть сниппет `datefmt` с таким кодом:

``` php
<?php
$locale = $modx->getOption('locale',$scriptProperties,'en_US');
$pattern = $modx->getOption('pattern',$scriptProperties,'YYYY/MM/dd');

$fmt = datefmt_create(
    $locale,
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    null,
    null,
    $pattern
);
return datefmt_format($fmt, time());
```

В поле Default Text просто укажите имя сниппета после тега @SNIPPET:

``` php
@SNIPPET datefmt
```

``` php
@SNIPPET datefmt {"locale":"de-DE","pattern":"EEEE, dd.MM.YYYY"}
```

## Примеры

### Показ связанных материалов

Есть отдельная страница с примером использования привязки SNIPPET для генерации input-options: [Создание multi-select списка связанных страниц в шаблоне](building-sites/tutorials/multiselect-related-pages "Creating a multi-select box for related pages in your template").

### Значения input-option из БД через migxLoopCollection

Допустим, вам нужен выпадающий список для выбора user-id по username.\
Требование: установлен MIGX.

Создайте TV типа listbox с такими input-options:

``` php
@SNIPPET migxLoopCollection {"classname":"modUser","tpl":"@CODE:[[+username]]==[[+id]]","outputSeparator":"||","wrapperTpl":"@CODE:-- select a user--==0||[[+output]]"}
```

## Смотрите также

- [Переменные шаблона](building-sites/elements/template-variables "Template Variables")
- [Привязки](building-sites/elements/template-variables/bindings "Bindings")
