---
title: "getResourcesTag"
description: "Сниппет getResourcesTag выводит ресурсы, отфильтрованные по тегам"
translation: "extras/taglister/taglister.getresourcestag"
---

## Сниппет getResourcesTag

Этот сниппет выводит результаты по ссылке на тег, сформированной сниппетом [tagLister](extras/taglister/taglister.getresourcestag "tagLister.getResourcesTag").

## Использование

Разместите сниппет там, где нужно показать списки ресурсов по тегам.

```php
[[!getResourcesTag? &parents=`4,12,33` &tpl=`tag_result`]]
```

Смотрите раздел **Примеры** ниже.

## Доступные свойства

getResourcesTag это обёртка вокруг [getResources](extras/getresources "getResources"). Доступны все свойства [getResources](extras/getresources "getResources"), а также следующие:

| Name            | Description                                                                | Default |
| --------------- | -------------------------------------------------------------------------- | ------- |
| tagKey          | TV для фильтрации.                                                         | tags    |
| tagRequestParam | REQUEST-параметр для фильтра по тегу.                                      | tag     |
| grSnippet       | Сниппет, который оборачивает getResourcesTag. Рекомендуется оставить getPage. | getPage |

### Часто используемые свойства из getResources

Помните: все свойства [getResources](extras/getresources "getResources") можно передать в **getResourcesTag**. На практике чаще всего используют такие:

| Name     | Description                                                                                                                                                                                                                                                                                                                                         |
| -------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| tpl      | Имя чанка-шаблона ресурса. Если не задано, свойства каждого ресурса выводятся в вывод                                                                                                                                                                                                                                  |
| tplOdd   | Имя чанка для ресурсов с нечётным idx (см. свойство idx)                                                                                                                                                                                                                                                 |
| tplFirst | Имя чанка для первого ресурса                                                                                                                                                                                                                                                                                 |
| tplLast  | Имя чанка для последнего ресурса                                                                                                                                                                                                                                                                                  |
| sortby   | [Любое поле ресурса](making-sites-with-modx/structuring-your-site/resources#Resources-ResourcesResourceFields) (кроме TV) для сортировки. Частые варианты: publishedon, menuindex, pagetitle и др. Полный список полей см. в документации по ресурсам. Указывайте только имя поля, без синтаксиса тегов. |

## Примеры

Выведите ресурсы с тегом `test` (из GET-параметра `tag`) в TV `blog-tags` и поместите результат в плейсхолдер `results`:

```php
[[!getResourcesTag? &parents=`4,12,33` &tagKey=`blog-tags` &toPlaceholder=`results` &tpl=`tag_result`]]

<h2>Search Results</h2>

<ul>
[[!+results]]
</ul>
```

Где **tag_result** это чанк с таким содержимым:

```php
<li>
<a href="[[~[[+id]]]]">[[+pagetitle]]</a>
</li>
```

## См. также

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister)
    1. [tagLister.tagLister.all](extras/taglister/taglister/all)
    2. [tagLister.tagLister.tpl](extras/taglister/taglister/tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
    1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/tpl)
