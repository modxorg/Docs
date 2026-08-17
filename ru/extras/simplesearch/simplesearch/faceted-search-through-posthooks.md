---
title: "Фасетный поиск через PostHooks"
description: "Настройка фасетного поиска в SimpleSearch через postHooks"
translation: "extras/simplesearch/simplesearch/faceted-search-through-posthooks"
---

## Фасетный поиск в SimpleSearch

SimpleSearch 1.3.0+ позволяет задавать фасетные результаты через postHooks. Вы можете уточнять результаты поиска и даже включать в выдачу данные вне ресурсов MODX. Это базовое руководство показывает, как начать настройку фасетного поиска.

SimpleSearch помещает все основные результаты по ресурсам в фасету 'default'. В postHooks вы добавляете другие фасеты и даёте пользователям направлять поиск в них. Мы создадим фасету 'people', которая ищет пользователей и формирует ссылки на ресурс профиля (ID 10).

## Настройка ресурса

Сначала подготовьте страницу для вывода результатов:

``` php
[[!SimpleSearch?
    &toPlaceholder=`simplesearch.results`
    &perPage=`10`
    &postHooks=`PeopleFacetHook`
    &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+simplesearch.results]]

<br />
<h2>People Results ([[+simplesearch.people.total]])</h2>
<ol>[[+simplesearch.people.results]]</ol>

<a href="[[~123]]?facet=people&search=[[!+simplesearch.query]]">Get more Peoples...</a>
```

Здесь есть стандартный плейсхолдер 'simplesearch.results', а также 'simplesearch.people.results'. Он содержит топ результатов из postHook. 'people' между частями имени плейсхолдера это имя нашей пользовательской фасеты. Нам нужны только топ-5 результатов из пользовательской фасеты, поэтому facetLimit установлен в 5.

Внизу страница ведёт на другую страницу (ID 123), где можно сузить результаты: только People, по 20 на странице:

``` php
[[!SimpleSearch?
    &toPlaceholder=`simplesearch.results`
    &perPage=`20`
    &postHooks=`PeopleFacetHook`
    &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+simplesearch.results]]
```

## Настройка PostHook

Создайте сниппет 'PeopleFacetHook' и вставьте в него:

``` php
<?php
$c = $modx->newQuery('modUser');
$c->innerJoin('modUserProfile','Profile');
$c->where(array(
    'username:LIKE' => '%'.$search.'%',
    'OR:Profile.fullname:LIKE' => '%'.$search.'%',
    'OR:Profile.email:LIKE' => '%'.$search.'%',
));
$count = $modx->getCount('modUser',$c);
$c->select(array(
    'modUser.*',
    'Profile.fullname',
    'Profile.email',
));
$c->limit($limit,$offset);
$users = $modx->getCollection('modUser',$c);

$results = array();
foreach ($users as $user) {
    $results[] = array(
        'pagetitle' => $user->get('fullname'),
        'longtitle' => $user->get('email'),
        'link' => $modx->makeUrl(10,'',array(
            'user' => $user->get('id'),
        )),
        'excerpt' => '',
    );
}
$hook->addFacet('people',$results,$count);
return true;
```

В этом сниппете мы выбираем всех пользователей, у которых username, fullname или email совпадают со строкой поиска. Здесь также применяется limit и берётся общий count (для пагинации на втором ресурсе). SimpleSearch передаёт в postHook следующие переменные:

- **$search**: строка поиска
- **$limit**: число результатов для ограничения поиска по этой фасете
- **$offset**: начальный индекс для поиска по этой фасете

Когда у нас есть коллекция $users, мы проходим по ней и формируем массив в формате SimpleSearch. Ссылки на результаты ведут на ресурс ID 10 с GET-параметром 'user', равным ID пользователя. (Этот postHook подходит для страницы поиска профилей). При необходимости здесь же можно задать excerpt для результатов.

Затем вызываем метод $hook->addFacet с тремя параметрами:

- Имя пользовательской фасеты. Здесь 'people', как описано выше.
- Собранный массив результатов.
- Общее число результатов (мы возвращаем только подмножество).

## Отдельный шаблон для каждой фасеты

Допустим, для результатов «people» нужен отдельный чанк, а не стандартный из &tpl вызова SimpleSearch. Мы назвали фасету «people». SimpleSearch позволяет передавать tpl для конкретной фасеты. Например, пользовательский чанк «OurPeopleChunk» через постфикс имени фасеты к свойству &tpl:

``` php
[[!SimpleSearch?
    &toPlaceholder=`simplesearch.results`
    &perPage=`20`
    &postHooks=`PeopleFacetHook`
    &tplpeople=`OurPeopleChunk`
    &facetLimit=`5`
]]

<h2>Search Results</h2>
[[+simplesearch.results]]

<h2>People</h2>
[[+simplesearch.people.results]]
```

Если tpl для фасеты не указан, используется стандартный &tpl.

Готово. Поиск стал фасетным, его можно сужать, и у каждой фасеты может быть свой шаблон.

## Смотрите также

1. [SimpleSearch.SimpleSearch](extras/simplesearch/simplesearch)
    1. [SimpleSearch.SimpleSearch.containerTpl](extras/simplesearch/simplesearch/containertpl)
    2. [SimpleSearch.SimpleSearch.currentPageTpl](extras/simplesearch/simplesearch/currentpagetpl)
    3. [SimpleSearch.SimpleSearch.pageTpl](extras/simplesearch/simplesearch/pagetpl)
    4. [SimpleSearch.SimpleSearch.tpl](extras/simplesearch/simplesearch/tpl)
    5. [SimpleSearch.Faceted Search Through PostHooks](extras/simplesearch/simplesearch/faceted-search-through-posthooks)
2. [SimpleSearch.SimpleSearchForm](extras/simplesearch/simplesearch.simplesearchform)
    1. [SimpleSearch.SimpleSearchForm.tpl](extras/simplesearch/simplesearch.simplesearchform/tpl)
3. [SimpleSearch.Solr](extras/simplesearch/simplesearch.solr)
