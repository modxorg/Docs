---
title: "Template Variables"
sortorder: "2"
translation: "building-sites/elements/template-variables"
---

## Что такое переменная шаблона TV?

**Переменная шаблона (TV) - это настраиваемое поле**, или, более конкретно, это настраиваемое поле для ресурса MODX. TV используются для расширения атрибутов по умолчанию, доступных для ресурса (например, для страницы или веб-ссылки). Обычный ресурс MODX имеет определенное количество полей по умолчанию: заголовок страницы, контент, описание и т.д. Если вам нужно добавить некоторые пользовательские поля на свои страницы, например, вторая область содержимого или выпадающий список названий месяцев или любой другой бит пользовательских данных, вы делаете это, добавляя переменную шаблона в свой шаблон. MODX позволяет вам иметь практически неограниченное количество TV.

**Почему это называется переменной шаблона**
Другие системы управления контентом называют их просто «Пользовательские поля», так почему же MODX называет их «переменными шаблона»? Ну, каждый раз, когда у вас есть настроенный контент, у вас также будут настроенные шаблоны. Ваши шаблоны MODX уже имеют плейсхолдеры для **содержимого** или **longtitle**, потому что это встроенные поля для стандартной страницы MODX: информация и шаблон, используемые для отображения этой информации, идут рука об руку. Если у вас есть форма менеджера с полем для ввода специальной даты, то вполне понятно, что ваш HTML-шаблон, который вы используете для отображения этой страницы, также будет выделен для отображения этой даты. Аналогично, вы не будете создавать HTML-шаблоны с элементами div и таблицами для форматирования битов данных, если менеджер не предложит какой-либо способ их редактирования. Таким образом, содержимое неумолимо связано с шаблоном, поэтому имя **переменная шаблона**.

Когда [Ресурс](building-sites/resources "Ресурсы") отображается в Интернете, TV заменяются фактическим значением, введенным пользователем. TV есть [Шаблон](building-sites/elements/templates "Шаблоны"), то есть они могут быть использованы только в [Шаблонах](building-sites/elements/templates "Шаблоны") назначеных им.

Шаблонные выходные фильтры позволяют пользователям добавлять специальные визуальные эффекты на свои веб-сайты. Всего несколькими щелчками мыши вы можете добавить изображение, URL-адрес или пользовательский рендер на свой веб-сайт.

## Использование

Допустим, у нас есть TV под названием bio, это текстовое поле TV, которое мы создали. Мы присвоили его нашему шаблону «Страницы биографии» и хотим показать его на нашей странице. Для этого мы просто поместим этот тег в наши шаблоны:

 ``` php
[[*bio]]
```

Чтобы добавить TV на страницу, вы должны вспомнить его шаблон (это переменные _Template_, помните?). Убедитесь, что вы определили TV и прикрепили его к используемому шаблону. Смотрите страницу [Создание переменной шаблона](building-sites/elements/template-variables/step-by-step "Создание переменной шаблона").

### Расширенное использование

TVs также могут иметь свойства. Скажем, у вас был TV под названием «intromsg» со значением:

> Hello `[[+name]]`, you have `[[+messageCount]]` messages.

Вы можете заполнить данные с помощью вызова:

 ``` php
[[*intromsg?name=`George` &messageCount=`123`]]
```

Который будет выводить:

> Hello George, you have 123 messages.

 [Выходные фильтры](building-sites/elements/template-variables/step-by-step "Фильтры ввода и вывода (модификаторы вывода)") также отличные инструменты для применения к TV. Скажем, вы хотите ограничить вывод TV до 100 символов. Вы бы просто использовали выходной фильтр «limit»:

 ``` php
[[*bioMessage:limit=`100`]]
```

## Смотрите также

1. [Создание переменной шаблона TV](building-sites/elements/template-variables/step-by-step)
2. [Привязки](building-sites/elements/template-variables/bindings)
   1. [CHUNK привязка](building-sites/elements/template-variables/bindings/chunk-binding)
   2. [DIRECTORY привязка](building-sites/elements/template-variables/bindings/directory-binding)
   3. [EVAL привязка](building-sites/elements/template-variables/bindings/eval-binding)
   4. [FILE привязка](building-sites/elements/template-variables/bindings/file-binding)
   5. [INHERIT привязка](building-sites/elements/template-variables/bindings/inherit-binding)
   6. [RESOURCE привязка](building-sites/elements/template-variables/bindings/resource-binding)
   7. [SELECT привязка](building-sites/elements/template-variables/bindings/select-binding)
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
