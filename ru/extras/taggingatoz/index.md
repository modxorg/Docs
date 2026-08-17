---
title: "TaggingAtoZ"
description: "Список тегов по группам A-Z из TV для MODX Revolution"
translation: "extras/taggingatoz/index"
---

![](taggingatoz1.png)

TaggingAtoZ выводит теги (или другой контент TV) группами от A до Z и опционально 0-9 с настраиваемым заголовком. Данные из нескольких TV.
Типичный вывод как на картинке справа, полностью настраивается.

TaggingAtoZ разработал Mark Hamstra для Vierkante Meter.

## История и ссылки

Первый релиз. 13 октября 2011 года. Установка через Package Management и MODX Extras.

Исходники Github: <https://github.com/Mark-H/TaggingAtoZ>,
**баги и улучшения**: <https://github.com/Mark-H/TaggingAtoZ/issues/>

Обсуждение: <http://forums.modx.com/thread/71008/taggingatoz-displaying-alphabetical-grouped-tags>

| Version  | Released   | Notes                   |
| -------- | ---------- | ----------------------- |
| 1.1.0-pl | 26/10/2011 | Added &groups parameter |
| 1.0.0-pl | 13/10/2011 | First release           |

## Properties

| Property           | Description                                                                                                                                                                                                                                                                          | Default Value   |
| ------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | --------------- |
| tvs                | **Required**. Список TV (имя или ID) для сбора значений.                                                                                                                                                                                                   |                 |
| target             | **Usually Required**. ID целевого ресурса. Обычно нужен, можно переопределить в tplTag.                                                                                                                                                        | 1               |
| groups             | Какие группы использовать. Пример: &groups=`a,b,c`. Для numeric group передайте numericHeader: &groups=`0-9,a,b,c`. Не меняет порядок, только состав групп. _Added in 1.1.0._ |                 |
| tagKey             | Ключ тега для getResourcesTag. Можно переопределить в tplTag.                                                                                                                                                              | tag             |
| tagSeparator       | Разделитель tplTag.                                                                                                                                                                                                                                             | \\n             |
| groupSeparator     | Разделитель tplGroup.                                                                                                                                                                                                                                           | \\n             |
| limit              | Лимит **на группу**.                                                                                                                                                                                                                                                     | 5               |
| toLower            | \[1\|0\] Привести теги к нижнему регистру                                                                                                                                                                                                     | 1  (since v1.1) |
| encoding           | При use\_multibyte 1, кодировка для lower case.                                                                                                                                                                                                          | UTF-8           |
| use\_multibyte     | Multibyte для lower case.                                                                                                                                                                                                                                | 0               |
| groupNumeric       | \[1\|0\] Группировать цифры в одну группу при 1                                                                                                                                                                                                                                    | 1               |
| numericHeader      | Заголовок numeric group                                                                                                                                                                                                                                        | 0-9             |
| toPlaceholder      | Вывод в placeholder                                                                                                                                                                                                             |                 |
| groups             | Ограничить группы: a,b,c,d,e,f. numericHeader для numeric: 0-9,a,b,c,d,e,f.                                                                                               |                 |
| parents            | ID родителей для поиска значений.                                                                                                                                                                                                                 |                 |
| depth              | Глубина (только с &parents).                                                                                                                                                                                                                                 |                 |
| includeDeleted     | \[1\|0\] Включать удалённые ресурсы при 1.                                                                                                                                                                                                            | 0               |
| includeUnpublished | \[1\|0\] Включать неопубликованные при 1.                                                                                                                                                                                                        | 0               |
| tplTag             | Чанк для каждого тега.                                                                                                                                                                                                                     | atozTag         |
| tplGroup           | Чанк для каждой группы.                                                                                                                                                                                                                   | atozGroup       |
| tplOuter           | Wrapper для всех результатов.                                                                                                                                                                                                        | atozOuter       |
| cls                | Class для каждого item.                                                                                                                                                                                                                                                          |                 |
| altCls             | Class для нечётных items.                                                                                                                                                                                                                                                          | alt             |
| firstCls           | Class для первого тега.                                                                                                                                                                                                                                                      | first           |
| lastCls            | Class для последнего тега.                                                                                                                                                                                                                                                       | last            |
| weights            | (int) Для weightCls.                                                                                                                                                                                                                             | 0               |
| weightCls          | Префикс class для weights.                                                                                                                                                                                                                                                         |                 |
| debug              | 1 для debug.                                                                                                                                                                                                                                                  | 0               |

### Placeholders для tplTag

- tag: the tag name
- tagKey: the tagKey property's value
- count: number of times this tag occured
- target: target property's value
- cls: the classes as calculated based on the cls and \*Cls properties.
- idx: the tag counter for this group. 

### Placeholders для tplGroup

- group: the group name
- count: number of tags in this group (NOTE: this is the total amount. If you have more tags in this group than your limit property allows, this will be bigger than the number shown.
- wrapper: will be replaced with the individual tags parsed by the tplTag properties.

### Placeholders для tplOuter

- countgroups: number of groups being displayed
- counttags: total number of tags (not neccessarily the same amount as being displayed)
- wrapper: will be replaced with individual groups parsed by the tplGroup properties

## Использование

Теги из TV "MyTags" и TV с ID 16, ссылки на текущий ресурс:

``` php
[[TaggingAtoZ? &tvs=`MyTags,16` &target=`[[*id]]`]]
```
