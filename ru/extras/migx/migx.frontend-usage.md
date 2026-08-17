---
title: "Использование на фронтенде"
translation: "extras/migx/migx.frontend-usage"
description: "Вывод элементов MIGX на сайте через сниппет getImageList: параметры, плейсхолдеры и примеры"
---

## Использование на фронтенде

## Вывод элементов MIGX

MIGX включает сниппет getImageList для вывода данных из MIGX TV. Несмотря на название, можно получать не только изображения. Думайте о нём как о популярном сниппете [getResources](extras/getresources), но для MIGX.

Примеры использования getImageList:

- галереи изображений
- слайдеры изображений или HTML
- табличные данные
- вывод в CSV или XML

Приступим.

## Пример использования

Выведем изображения, которые вы ввели на шаге 3. Вставьте этот код туда, где нужны изображения:

``` php
<ul>
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`@CODE:<li>[[+idx]]<img src="[[+image]]"/><p>[[+title]]</p></li>
  `]]
</ul>
```

Разберём параметры. Первый, `&tvname`, это имя MIGX TV, которую вы создали в [Использовании в бэкенде](extras/migx/migx.backend-usage), шаг 2. `&tpl` это либо строка кода для элементов MIGX, либо имя чанка. Для строки кода добавьте префикс `@CODE`, как выше.

Если вы используете [phpthumbof](extras/phpthumbof), нужен чанк, а не строка кода.

``` php
<ul>
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl`]]
</ul>
```

### thumbTpl

``` php
<li>
  <img src="[[+image:phpthumbof=`w=300&h=300&zc=1`]]" alt="[[+title]]"/>
</li>

```

## MIGX вместе с getResources

Вы можете вызывать getImageList из [getResources](extras/getresources), чтобы собрать галерею галерей.

``` php
<li>
  <a href="[[~[[+id]]]]">[[+pagetitle]]</a>  
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl`
    &limit=`1`
    &docid=`[[+id]]`
  ]]
</li>
```

Готово. У вас есть собственная MIGX-галерея изображений.

### Значения getResources в вызове MIGX

Чтобы использовать значения getResources в чанке, который вызывает getImageList, передайте их как параметры вызова сниппета и обращайтесь через плейсхолдер `+property`.

Передайте их в вызове сниппета:

``` html
[[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`thumbTpl2`
    &docid=`[[+id]]`
    &limit=`1`
    &pagetitle=`[[+pagetitle]]`
    &originalResourceId=`[[+id]]`
]]

```

Затем используйте их в чанке с префиксом `+property.`:

``` html
  <li>
    <img src="[[+image:phpthumbof=`w=300&h=300&zc=1`]]" alt="[[+title]]" />
    <a href="[[~[[+property.originalResourceId]]]]">See more images from [[+property.pagetitle]]</a>
  </li>
```

Ещё один [пример из обсуждения на форуме](http://forums.modx.com/thread/78950/odd-issue-with-migx#dis-post-435072), который привёл к примеру выше.

## Свойства

| Name                                                                                                       | Description                                                                                                                                           | Default   |
| ---------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------- | --------- |
| tvname                                                                                                     | имя вашей MIGX TV                                                                                                                                     |           |
| tpl                                                                                                        | имя чанка для каждой записи. Можно также `@CODE:` или `@FILE:`. Если пусто, getImageList выведет массив записей в виде строки                       |           |
| docid                                                                                                      | показать записи MIGX из других ресурсов. Полезно в шаблонах [getResources](extras/getresources) с ``&docid=`[[+id]]``                                 | `[[*id]]` |
| value                                                                                                      | передать собственную JSON-строку в getImageList вместо вывода TV. Тогда tvname и docid игнорируются                                                   |           |
| limit                                                                                                      | если не 0, выводит только X элементов                                                                                                                 | 0         |
| offset                                                                                                     | индекс, с которого начинать выборку при ограничении числа элементов                                                                                   | 0         |
| totalVar                                                                                                   | ключ плейсхолдера для общего числа. Полезно с [getPage](extras/getpage) для пагинации                                                                 | total     |
| randomize                                                                                                  | задайте ``&randomize=`1```, если нужен случайный порядок                                                                                              | 0         |
| preselectLimit                                                                                             | вместе с `&randomize` предварительно выбирает элементы сверху до limit. Для изображений, которые должны попасть в случайный вывод в любом случае     | 5         |
| where                                                                                                      | фильтр элементов. Пример: `{"active:=":"1","rating:>":"5"}`                                                                                           |           |
| sort                                                                                                       | сортировка по нескольким полям. Пример: `[{"sortby":"age","sortdir":"DESC","sortmode":"numeric"},{"sortby":"name","sortdir":"ASC"}]`                  |           |
| reverse                                                                                                    | задайте `&reverse=1`, чтобы вывести всё в обратном порядке                                                                                            | 0         |
| toPlaceholder                                                                                              | вывод в плейсхолдер. Пример: ``&toPlaceholder=`MIGX```, результат в ``[[+MIGX]]``                                                                   |           |
| toSeparatePlaceholders                                                                                     | вывод элементов в отдельные плейсхолдеры. Пример: ``&toSeparatePlaceholders=`MIGX```, элементы в ``[[+MIGX.1]]`` ``[[+MIGX.2]]`` ...                 |           |
| placeholdersKeyField                                                                                       | вместе с ``&toSeparatePlaceholders``. Пример: ``&placeholdersKeyField=`title```, элементы в ``[[+MIGX.firsttitle]]`` ``[[+MIGX.thirdtitle]]`` ...    |           |
| outputSeparator                                                                                            | разделитель между элементами                                                                                                                          |           |
| toJsonPlaceholder                                                                                          | вывод элементов как JSON в плейсхолдер. Полезно, если нужно показать случайные элементы в разных местах                                               |           |
| example: ``&toJsonPlaceholder=`jsonoutput``` -> ``[[getImagelist? &value=`[[+jsonoutput]]`................]]`` |                                                                                                                                                    |           |
| jsonVarKey                                                                                                 | пример: ``&jsonVarKey=`migx_json```. Возьмёт значение из ``$_REQUEST['migx_json']``, если оно есть                                                   |           |
| useful together with the backend-preview-feature                                                           | migx\_outputvalue                                                                                                                                     |

## Плейсхолдеры

| Placeholder          | Description                                                                                                                                                             |
| -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `[[+fieldname]]`     | замените `fieldname` на имя вашего поля                                                                                                                                   |
| `[[+idx]]`           | индекс каждого элемента, всегда начинается с 1                                                                                                                            |
| `[[+_first]]`        | возвращает 1, если это первая строка                                                                                                                                   |
| `[[+_last]]`         | возвращает 1, если это последняя строка                                                                                                                                 |
| `[[+_alt]]`          | возвращает 1 через каждую вторую строку                                                                                                                                 |
| `[[+total]]`         | число всех строк. Замените `total` на ваш totalVar                                                                                                                      |
| `[[+property.name]]` | любой параметр вызова сниппета. Например, при `&docid=`20`` плейсхолдер `[[+property.docid]]` вернёт 20                                                                |

## Расширенное использование

### Переключение шаблона

С `&tpl=`@FIELD:`` вы можете использовать любое поле как имя шаблона и менять tpl от элемента к элементу.

``` php
  [[getImageList?
    &tvname=`myMIGXtv`
    &tpl=`@FIELD:tpl`
  ]]
```

Если в настройке MIGX TV есть поле `tpl`, getImageList возьмёт его значение как tpl элемента. Значение должно совпадать с тем, что вы указали бы в `&tpl`: имя чанка, `@CODE:...`, `@FILE:...`
