---
title: "getRelated"
description: "Сниппет связанных ресурсов MODX Revolution"
translation: "extras/getrelated/index"
---

getRelated: сниппет MODX Revolution для списка связанных ресурсов.

Алгоритм настраивается через свойство &fields: поля для сравнения и вес каждого поля.

## Ссылки и история

| Version     | Released On         | Highlights                                                                                                                                                                      |
| ----------- | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 1.2.0-pl    | June 7th, 2012      | Add &stopwords property, properly handling multiple calls per page, can also be used with Russian now.                                                                          |
| 1.1.2-pl    | January 21st, 2012  | Add &hideContainers property. Prevent E\_NOTICE errors. Fix &includeDeleted property.                                                                                           |
| 1.1.1-pl    | December 10th, 2011 | Fix issue with &parents. Fix issue with &fields with only one resource field chosen.                                                                                            |
| 1.1.0-pl    | December 4th, 2011  | Adds TVs to the result set using new &returnTVs propery, and also a new &exclude property to hide certain results.                                                              |
| 1.0.2-pl    | November 10th, 2011 | Fixes bug with filtering out current resource, now searches case insensitively and fixes ignoreHidden and ignoreUnpublished properties. Also improves legibility of debug data. |
| 1.0.1-pl(2) | October 26th, 2011  | Fixes bugs with tpl properties, &parents and &fields                                                                                                                            |
| 1.0.0-pl    | October 13th, 2011  | First public release. Versions < 1.0 were only released for HandyMan Contributors through its beta channel.                                                                     |

Исходники Github: <https://github.com/Mark-H/getRelated>
Баги и feature requests: <https://github.com/Mark-H/getRelated/Issues>

Обсуждение: <http://forums.modx.com/thread/71009/getrelated-automatically-listing-related-resources-for-revolution>

Разработчик [Mark Hamstra](http://www.markhamstra.nl) для [Vierkante Meter](http://vierkante-meter.nl).

## Как работает getRelated (обязательно к прочтению)

Чтобы настроить свойства, нужно понимать алгоритм.

Шаги при сборе связанных ресурсов:

1. getRelated берёт базовый ресурс, обычно текущий. Поля &fields разбираются на отдельные слова.
2. Stopwords из языкового лексикона отфильтровывают частые слова.
3. По найденным словам выполняется запрос в заданных contexts и parents. **Это comparison sample.** Для полей ресурса и TV по свойству fields.
4. Sample обрабатывается с весами из &fields, считается ranking каждого ресурса.
5. Результаты сортируются по ranking и выводятся через tpl.

Свойства ниже настраивают один или несколько шагов. В таблице указан шаг для каждого свойства.

## Свойства сниппета

| Property           | Step(s) | Description                                                                                                                                                                                                                                                   | Default Value                                                                                                                    |
| ------------------ | ------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| resource           | 1       | Either the Resource ID to find related resources for or "current" or empty to find related for the current resource.                                                                                                                                          | current                                                                                                                          |
| fields             | 1, 3, 4 | Comma separated list of fieldname:weight to use in the comparison. Prefix TVs with "tv.". Don\\'t use the content unless you want to kill performance. Example of use: pagetitle:3,tv.MyTags:7,tv.MySubjects:15,introtext:2                                   | pagetitle:3,introtext:2                                                                                                          |
| defaultWeight      | 4       | (int) Weight to assign to fields that don't have a weight set specifically.                                                                                                                                                                                   | 5                                                                                                                                |
| returnFields       | 5 (3)   | Resource Fields (use &returnTVs for template variables) to include in the output. By default you will have access to the resource ID as well.                                                                                                                 | pagetitle,longtitle,introtext                                                                                                    |
| returnTVs          | 5       | Specify a comma separated list of TV names to include in the results. These TVs are not used in the comparison process, but are only retrieved when returning the top ranking results. Do _not_ prefix with "tv." like you would in the &fields property.     |                                                                                                                                  |
| parents            | 3       | Comma separated list of parents to use in finding related resources                                                                                                                                                                                           |                                                                                                                                  |
| parentsDepth       | 3       | The depth to search parents for                                                                                                                                                                                                                               | 10                                                                                                                               |
| exclude            | 3       | Comma separated list of resource IDs you want to exclude from the results.                                                                                                                                                                                    |                                                                                                                                  |
| contexts           | 3       | Comma separated list of Contexts to search in                                                                                                                                                                                                                 | current                                                                                                                          |
| includeUnpublished | 3       | \[1                                                                                                                                                                                                                                                           | 0\] Also use unpublished resources in the result set.                                                                            | 0 |
| includeHidden      | 3       | \[1                                                                                                                                                                                                                                                           | 0\] Also use resources marked as hidden in menus in the result set. Set to 0 to exclude them.                                    | 1 |
| hideContainers     | 3       | \[1                                                                                                                                                                                                                                                           | 0\] _Added in 1.2.0._ When set to 1 this will exclude resources which have "isfolder" set to true, ie those that are containers. | 0 |
| stopwords          | 2       | _Added in 1.2.0_                                                                                                                                                                                                                                              | A comma separated list of words to filter out of the match data, on top of the language specific stopwords.                      |   |
| limit              | 5       | Number of related resources to output to screen.                                                                                                                                                                                                              | 3                                                                                                                                |
| fieldSample        | 3       | Number of resources to collect for the **sample** in comparing based on **resource fields**. Can have a huge impact on performance so if you're experiencing long load times, try decreasing this number or adjusting the stopwords in your language lexicon. | 125                                                                                                                              |
| fieldSort          | 3       | Resource field to sort by in collecting the sample, used in conjunction with the fieldSample propert. (_Does not sort the related resources output, only the sample used in determining related resources!_)                                                  | createdon                                                                                                                        |
| fieldSortDir       | 3       | Sort direction for the fieldSort property, used in collecting the sample.                                                                                                                                                                                     | desc                                                                                                                             |
| tvSample           | 3       | Number of TV results to include (note: one resource can have more than one result depending on your fields property) in the **sample** in comparing based on TV values.                                                                                       | 125                                                                                                                              |
| tvSort             | 3       | Resource field to sort by in the TV query, used in conjunction with the tvSample property. (_Does not sort the related resources output, only the sample used in determining related resources!_)                                                             | createdon                                                                                                                        |
| tvSortDir          | 3       | Sort direction for the tvSort property, used in collecting the sample.                                                                                                                                                                                        | desc                                                                                                                             |
| tplOuter           | 5       | Chunk name to use as outer (or wrapper) template. The `[[+wrapper]]` placeholder will be filled with the individual rows, separated by whatever is in the rowSeparator property (see below). Placeholders you can use are `[[+count]]` and `[[+wrapper]]`.    |

``` php
<h3>[[%getrelated.pagesfound? &namespace=`getrelated` &count=`[[+count]]`]]</h3>
<ul>
  [[+wrapper]]
</ul>
``` | relatedOuter |
| tplRow | 5 | Chunk name to use as row template, used in every related resource.

The placeholders you can use include the fields in your &fields property (minus TVs), as well as those in the returnFields property. The resource ID is always accessible with `[[+id]]`, the ranking (the result of the algorithm) as `[[+rank]]` and the number of the result with `[[+idx]]`.

Default chunk (stored as file in core/components/getrelated/elements/chunks/):

``` php
<li>
  <a href="[[~[[+id]]]]" title="[[+longtitle:default=`[[+pagetitle]]`]]">
    [[+longtitle:default=`[[+pagetitle]]`]] ([[+rank]])
  </a>
</li>
``` | relatedRow |
| noResults | 5 | Text or output when there are no related resources found. (Hint: you could add a `[[$chunk]]` to the property to output that when there are no results: &noResults=``[[$chunkname]]``) | "No related pages found." |
| rowSeparator | 5 | String to use as separator between rows. | \\n |
| debug |  | \[1|0\] Enable/disable debug mode. When enabled it will dump lots of information on screen. | 0 |

## Использование

Нет веской причины вызывать сниппет без кэша. На большом сайте это сильно бьёт по производительности. Сниппет смотрит на данные ресурсов, кэш сбрасывается при обновлении ресурса. Между обновлениями getRelated не видит изменений. НЕ ВЫЗЫВАЙТЕ БЕЗ КЭША. Без кэша тег с восклицательным знаком: `[[!snippetname]]`. Нужен вызов **без** восклицательного знака: `[[snippetname]]`.



Минимальный вызов:

``` php
[[getRelated]]
```

Список до трёх связанных ресурсов по pagetitle и introtext. Уточняйте через &fields: TV тегов, категорий или поле с ключевыми словами.

### Оптимизация производительности

Если getRelated тормозит:

1. Вызывайте **с кэшем**. Без кэша с производительностью не помогу.
2. Не используйте content, данных слишком много.
3. Запрос sample может быть слишком широким:
    1. Нет перевода лексикона для вашего языка, отсекаются английские stopwords. Переведите [English Lexicon](https://github.com/Mark-H/getRelated/blob/master/core/components/getrelated/lexicon/en/default.inc.php) и отправьте автору. Длинный список stop words в файле не переводите, возьмите список stopwords для вашего языка из надёжного источника.
    2. Все ресурсы содержат одни и те же слова (название компании, продукта). Включите debug (&debug=`1`) и проверьте Match Data.
        Добавьте лишние слова в "getrelated.stopwords" лексикон: System > Lexicon Management, namespace "getrelated", нужный язык. Для включения в пакет: [bug report](https://github.com/Mark-H/getRelated/issues).
4. Слишком много связанных ресурсов:
    1. Уменьшите sample sizes. По умолчанию ~1 сек на первую загрузку (дальше из кэша). tvSample можно снизить до 50 на TV. Три TV: с 375 до 150 ресурсов в обработке.
        Порядок sample меняйте через tvSort, tvSortDir, fieldSort, fieldSortDir. По умолчанию createdon, новые первые.
5. returnTVs с многими TV и большим result set может тормозить. Ограничьте result set и берите только нужные TV.
6. Возможен баг. Напишите на форум или Github (ссылки выше).
