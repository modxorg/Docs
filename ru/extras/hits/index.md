---
title: "Hits"
description: "Подсчёт просмотров страниц MODX Revolution с хранением в отдельной таблице"
translation: "extras/hits/index"
---

Hits считает просмотры страниц MODX Revolution и сохраняет их в отдельной таблице.

С Hits вы можете:

- записывать просмотры по hit\_key (например ID ресурса)
- получать результаты запроса и использовать с getResources (`[[~[[*id]]]]`)

## Использование

Записать просмотр текущего ресурса.

``` php
[[!Hits? &punch=`[[*id]]`]]
```

Записать просмотр ресурса 3.

``` php
[[!Hits? &punch=`3`]]
```

Записать 20 просмотров ресурса 4

``` php
[[!Hits? &punch=`4` &amount=`20`]]
```

Убрать 4 просмотра у ресурса 5.

``` php
[[!Hits? &punch=`5` &amount=`-4`]]
```

Список ID 10 самых посещаемых страниц на 10 уровней вниз от контекста web.

``` php
[[!Hits? &parents=`0` &depth=`10` &limit=`10` &outputSeparator=`,`]]
```

Список ID 4 наименее посещаемых дочерних ресурсов ресурса 2 с чанком hitInfo.

``` php
[[!Hits? &parents=`2` limit=`4` &dir=`ASC`  &chunk=`hitInfo` &outputSeparator=`,`]]
```

Четыре самых популярных ресурса без первого

``` php
[[!Hits? &parents=`0` &limit=`4` &offset=`1` &outputSeparator=`,`]]
```

Обнулить ресурс 3 и добавить 2 просмотра (knockout обнуляет значение перед increment)

``` php
[[!Hits? &punch=`3` &amount=`2` &knockout=`1`]]
```

## Доступные свойства

| Name            | Description                                                                                                                    | Default Value    | Added in version |
| --------------- | ------------------------------------------------------------------------------------------------------------------------------ | ---------------- | ---------------- |
| punch           | hit\_key для записи одного или нескольких просмотров. Обычно ID ресурса.                                                      |                  | 1.0.0            |
| amount          | Количество просмотров для punch.                                                                         | 1                | 1.0.0            |
| parents         | Список ID родителей для поиска самых посещаемых ресурсов. При указании возвращаются результаты. |                  | 1.0.0            |
| depth           | Глубина поиска от каждого родителя. Первый уровень дочерних = depth.     | 10               | 1.0.0            |
| tpl             | В чанк передаются hit\_key, hit\_count и id для каждого результата.                        | outputs hit\_key | 1.0.0            |
| limit           | Количество результатов.                                                                                               | 5                | 1.0.0            |
| sort            | Поле сортировки: hit\_count, hit\_key или id.                                                 | hit\_count       | 1.0.0            |
| dir             | Направление сортировки.                                                                                               | DESC             | 1.0.0            |
| outputSeparator | Строка-разделитель между экземплярами tpl.                                                                              | "\\n"            | 1.0.0            |
| toPlaceholder   | Записать результат в placeholder вместо вывода.                                                     |                  | 1.0.0            |
| offset          | Смещение результатов                                                                                                      |                  | 1.1.0            |
| knockout        | 1 обнуляет hit\_count перед increment по amount                                                    |                  | 1.2.0            |

## С getResources

Hits работает с [getResources](extras/getresources) для списка самых или наименее посещаемых страниц. Список ID 10 самых посещаемых передаётся в getResources.

``` php
[[getResources?
    &resources=`[[!Hits? &parents=`0` &depth=`10` &limit=`10` &outputSeparator=`,`]]`
    ...
]]
```

## Оптимизация

### Запись просмотров

Hits вызывайте без кэша при punch. Чтобы punch не влиял на время загрузки, записывайте просмотры после загрузки страницы через AJAX.

### Отображение статистики

С getResources используйте [getCache](https://github.com/opengeek/getCache/wiki) для кэширования результатов на диск на заданный срок и общего кэша между страницами. Для «Most Visited Pages» в сайдбаре результаты часто одинаковы на всех страницах. Используйте cacheElementKey getCache для общего файла кэша. Перенесите тег getResources в чанк getMostViewed.

``` php
[[!getCache?
    &element=`getMostViewed`
    &cacheExpires=`900`
    &cacheKey=`hits`
    &cacheElementKey=`getMostViewed`
]]
```

Чанк getMostViewed обрабатывается раз в 15 минут и грузится из общего кэша. При любом числе посетителей обработка раз в 15 минут.

Если результаты getResources различаются по страницам, оберните тег Hits в getCache.

``` php
[[getResources?
    &resources=`[[!getCache?
    &element=`mostHitsIDs`
    &cacheExpires=`900`
    &cacheKey=`hits`
    &cacheElementKey=`mostHitsIDs`]]`
    ...
]]
```

## См. также

- [Project home](https://github.com/jpdevries/hits) на Github
