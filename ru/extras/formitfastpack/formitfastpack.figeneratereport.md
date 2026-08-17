---
title: "fiGenerateReport"
description: "Хук FormIt для автоматической генерации email-отчёта по отправленным полям"
translation: "extras/formitfastpack/formitfastpack.figeneratereport"
---

## Как это работает

fiGenerateReport формирует простой список имён и значений полей из данных отправленного запроса. Вы можете использовать один шаблон email для нескольких форм.

Подписи генерируются простыми выходными фильтрами по имени поля из запроса. По умолчанию подчёркивания заменяются пробелами, а первая буква каждого слова делается заглавной.

Примеры для шаблона строки по умолчанию:

| Пример поля формы                                                      | Сгенерированная подпись                                 |
| ----------------------------------------------------------------------- | ----------------------------------------------- |
| `<field name="first_name" value="VALUE" />`                             | `<p><strong>First Name:</strong> VALUE</p>`     |
| `<field type="checkbox" name="are_you_vegetarian" checked="checked" />` | `<p><strong>Are You Vegetarian:</strong> 1</p>` |
| `<field name="companyAddress" value="VALUE" />`                         | `<p><strong>companyAddress:</strong> VALUE</p>` |

Если вы используете этот хук, называйте поля формы так, чтобы выходные фильтры корректно превращали имена в читаемые подписи.

## Использование

Используйте как хук FormIt перед хуком «email»:

```php
[[!FormIt?
    &hooks=`math,spam,fiGenerateReport,email,redirect`
    ...
]]
```

В emailTpl (шаблоне отчёта FormIt) или других шаблонах, которые парсит FormIt, используйте плейсхолдер figr_values вместо ручного размещения каждой подписи и значения:

```html
<p>
    A <strong>[[++site_name]]</strong> contact form submission was sent from the
    <strong>[[*pagetitle]]</strong> page:
</p>
[[+figr_values]]
```

Дополнительные параметры можно передать прямо в вызов FormIt:

```php
[[!FormIt?
    &hooks=`math,spam,fiGenerateReport,email,redirect`
    ...
    &figrExcludedFields=`op1,op2,operator,math`
]]
```

## Чекбоксы и другие значения-массивы

В некоторых (более поздних?) версиях FormIt значения-массивы уже обрабатываются, но если несколько чекбоксов или другие массивы не попадают в отчёт, добавьте хук fiProcessArrays сразу перед fiGenerateReport:

```php
[[!FormIt?
    &hooks=`math,spam,fiProcessArrays,fiGenerateReport,email,redirect`
    ...
    &figrExcludedFields=`op1,op2,operator,math`
]]
```

## Доступные свойства

Следующие параметры можно передать в вызов FormIt:

| Name                      | Description                                                                                                                         | Default Value                                                   | Version Added |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------- | ------------- | --- |
| figrExcludedFields        | Поля, исключаемые из списка. Объединяется с figrDefaultExcludedFields.                                                             |                                                                 | 1.1.0-pl      |
| figrDefaultExcludedFields | Дополнительные поля для исключения из списка. Доступно как опция, если нужно отключить значения по умолчанию.                        | nospam,blank,recaptcha_challenge_field,recaptcha_response_field | 1.1.0-pl      |
| figrTpl                   | Шаблон для каждой строки.                                                                                                   | formReportRow                                                   | 1.1.0-pl      |
| figrAllValuesLabel        | Плейсхолдер для вывода.                                                                                              | figr_values                                                     | 1.1.0-pl      |
| figrIncludeArrays         | Если True, включает поля со значениями-массивами. Оставьте False, если используете fiProcessArrays или аналог для преобразования массивов. | False                                                           | _1.1.1_       |     |
| figrFields                | Список полей, которыми ограничить автоматический отчёт. Можно задать и пользовательский порядок полей.                    |                                                                 | _1.1.1_       |

## Чанк figrTpl

По умолчанию используется содержимое чанка formReportRow:

```php
<p><strong>[[+field:replace=`_== `:ucwords]]:</strong> [[+value:nl2br]]</p><br>
```

В чанке доступны только плейсхолдеры `[[+field]]` (имя поля из запроса) и `[[+value]]` (значение поля из запроса).

## Безопасность

FormIt не удаляет и не проверяет добавленные поля, поэтому опытный пользователь может добавить в запрос лишние поля. Такие поля попадут в email-отчёт.

FormIt выполняет базовую санитизацию всех данных запроса, поэтому такие поля не должны быть опаснее остальных отправленных данных.
