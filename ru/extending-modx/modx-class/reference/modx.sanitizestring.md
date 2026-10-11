---
title: "modX.sanitizeString"
translation: "extending-modx/modx-class/reference/modx.sanitizestring"
description: "Вырезать теги и запрещённые символы, оставив безопасный набор знаков"
---

## modX::sanitizeString

Удаляет из строки HTML-теги, вычищает фиксированный список символов, а затем оставляет только буквы, цифры, `_`, `-`, `.`, `/`, пробелы и `[`. Символы выбрасываются, а не экранируются, поэтому результат можно сразу класть в запрос или ключ класса.

Ядро применяет его к значениям запроса, которые попадают в SQL или логику менеджера, например к внешним ключам пространств имён и флагам входа в менеджер.

## Синтаксис

``` php
string sanitizeString (string $str, [array $chars = ['/', "'", '"', '(', ')', ';', '>', '<']], [string $allowedTags = ''])
```

- `$str` _(string)_ значение для очистки
- `$chars` _(array)_ символы, удаляемые после снятия тегов; список по умолчанию показан в сигнатуре
- `$allowedTags` _(string)_ теги, которые сохраняет PHP `strip_tags()`, по умолчанию не сохраняется ни один

## Пример

``` php
$clean = $modx->sanitizeString('<b>foobar</b> (staff)');

// $clean === 'foobar staff'
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.stripTags](extending-modx/modx-class/reference/modx.striptags)
