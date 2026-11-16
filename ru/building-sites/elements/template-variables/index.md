---
title: "Переменные шаблона TV"
sortorder: "2"
translation: "building-sites/elements/template-variables"
---

## Что такое переменная шаблона TV?

Переменная шаблона (TV) это своё поле ресурса. У ресурса уже есть поля `pagetitle`, `content` и `description`. TV добавляют, когда нужно ещё одно поле, например вторая область текста или список месяцев.

TV можно добавить несколько. При сохранении MODX не проверяет, сколько их уже есть.

Когда [ресурс](building-sites/resources "Ресурсы") показывается на сайте, `[[*имя]]` заменяется значением TV. В форме ресурса поле есть, только если TV назначена шаблону этого ресурса. На другой странице тот же тег всё равно выведет значение по умолчанию или уже сохранённое для этого ресурса значение.

Тип вывода форматирует это значение, например как картинку или URL.

## Использование

TV `bio` типа textarea, назначенная шаблону «Страницы биографии», выводится так:

``` php
[[*bio]]
```

Определите TV и привяжите её к шаблону, который использует ресурс. См. [Создание переменной шаблона](building-sites/elements/template-variables/step-by-step "Создание переменной шаблона").

### Расширенное использование

У TV могут быть свойства. TV `intromsg`:

> Hello `[[+name]]`, you have `[[+messageCount]]` messages.

Плейсхолдеры заполняет вызов:

``` php
[[*intromsg?name=`George` &messageCount=`123`]]
```

Вывод:

> Hello George, you have 123 messages.

[Фильтр вывода](building-sites/elements/template-variables/step-by-step "Фильтры ввода и вывода (модификаторы вывода)") меняет напечатанное значение. Ограничение в 100 символов:

``` php
[[*bioMessage:limit=`100`]]
```

## Смотрите также

1. [Создание переменной шаблона TV](building-sites/elements/template-variables/step-by-step)
2. [Привязки](building-sites/elements/template-variables/bindings)
   1. [CHUNK привязка](building-sites/elements/template-variables/bindings/chunk-binding)
   2. [DIRECTORY привязка](building-sites/elements/template-variables/bindings/directory-binding)
   3. [FILE привязка](building-sites/elements/template-variables/bindings/file-binding)
   4. [INHERIT привязка](building-sites/elements/template-variables/bindings/inherit-binding)
   5. [RESOURCE привязка](building-sites/elements/template-variables/bindings/resource-binding)
   6. [SELECT привязка](building-sites/elements/template-variables/bindings/select-binding)
3. [Типы ввода переменных шаблона TV](building-sites/elements/template-variables/input-types)
4. [Типы вывода переменных шаблона TV](building-sites/elements/template-variables/output-types)
    1. [Тип вывода TV - Дата](building-sites/elements/template-variables/output-types/date)
    2. [Тип вывода TV - Разделитель](building-sites/elements/template-variables/output-types/delimiter)
    3. [Тип вывода TV - HTML тег](building-sites/elements/template-variables/output-types/html)
    4. [Тип вывода TV - Изображение](building-sites/elements/template-variables/output-types/image)
    5. [Тип вывода TV - URL](building-sites/elements/template-variables/output-types/url)
5. [Добавление пользовательского типа TV - MODX 2.2](extending-modx/custom-tvs)
6. [Создание поля множественного выбора для связанных страниц в вашем шаблоне](building-sites/tutorials/multiselect-related-pages)
7. [Доступ к значениям переменных шаблона через API](extending-modx/snippets/accessing-tvs)
