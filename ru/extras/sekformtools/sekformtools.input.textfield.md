---
title: "sekFormTools.input.textfield"
description: "Текстовое поле sekFormTools с подсказкой поверх поля"
translation: "extras/sekformtools/sekformtools.input.textfield"
---

## Что такое input.textfield?

Этот сниппет быстро добавляет текстовое поле в форму. Свойство title показывает подсказку поверх textarea или input.

## Использование

Пример input.textfield:

``` php
[[input.textfield? &title=`Search...`]]
```

## Свойства

| Имя         | Описание                                                               | По умолчанию | Обязательно | Версия |
| ------------ | ------------------------------------------------------------------------- | ------- | -------- | ------- |
| `input_id`   | ID поля ввода.                                        |         |          | >0.0.1  |
| `name`       | Имя поля ввода.                                      |         |          | >0.0.1  |
| `value`      | Значение поля ввода.                                     |         |          | >0.0.1  |
| `input_type` | text, password или textarea.                                              | text    |          | >0.0.1  |
| `title`      | Подсказка поверх текстового поля или textarea. |         |          | >0.0.1  |
