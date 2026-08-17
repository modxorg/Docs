---
title: "prettyNumbers"
description: "Output filter SocialSuite для компактного форматирования больших чисел"
translation: "extras/socialsuite/socialsuite.prettynumbers"
---

[SocialSuite](extras/socialsuite "SocialSuite") это набор полезных инструментов для интеграции социальных сетей в сайт MODX.

prettyNumbers это [output filter](building-sites/tag-syntax/output-filters "Input and Output Filters") из SocialSuite. Он форматирует числа в зависимости от величины. Как отдельный сниппет передайте число в свойство **input**.

## Базовое использование

Если `[[+count]]` возвращает число, добавьте output filter prettyNumbers:

``` php
[[+count:prettyNumbers]]
```

и число будет отформатировано.

Чтобы отформатировать результат сниппета, используйте синтаксис output filter, например с getFacebookShares:

``` php
[[!getFacebookShares:prettyNumbers? &url=`http://google.com/`]]
```

Как отдельный сниппет синтаксис немного другой в обоих случаях:

``` php
[[prettyNumbers? &input=`[[+count]]`]]
[[prettyNumbers? &input=`[[!getFacebookShares? &url=`http://google.com/`]]`]]
```

## Расширенное использование

Вы можете передать опции output filter или сниппету, чтобы изменить формат. Доступны такие параметры:

| Option Key | Default   | Description                                                                                            |
| ---------- | --------- | ------------------------------------------------------------------------------------------------------ |
| case       | lower     | Значения "u", "ucase", "upper" или "strtoupper" переводят суффикс (k, m, b) в верхний регистр. |
| decimal    | . (dot)   | Строка-разделитель дробной части.                                                                  |
| thousands  | , (comma) | Строка-разделитель разрядов.                                                               |

Задайте их так:

``` php
[[+count:prettyNumbers=`case=upper&decimal=,&thousands=.`]][[prettyNumbers? &input=`[[!getFacebookShares? &url=`http://google.com/`]]` &options=`case=upper&decimal=,&thousands=.`]]
```

## Форматирование по умолчанию

``` php
5 => 5
515 => 515
5141 => 5.1k
5151 => 5.2k
51415 => 51k
51515 => 52k
515151 => 515k
5151515 => 5.2m
51515151 => 52m
515151515 => 515m
5151515151 => 5.2b
51515151515 => 52b
515151515151 => 515b
5151515151515 => 5,152b
51515151515151 => 51,515b
515151515151515 => 515,152b
```
