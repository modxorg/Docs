---
title: "getFacebookShares"
description: "Сниппет SocialSuite для подсчёта репостов и комментариев URL в Facebook"
translation: "extras/socialsuite/socialsuite.getfacebookshares"
---

[SocialSuite](extras/socialsuite "SocialSuite") это набор полезных инструментов для интеграции социальных сетей в сайт MODX.

getFacebookShares это [сниппет](developing-in-modx/basic-development/snippets "Snippets") из SocialSuite. Он возвращает число: сколько раз указанный URL **поделили или прокомментировали** в Facebook.

## Свойства сниппета

| Property                  | Default Value           | Description                                                                                                                                                                                                                                                                                                       |
| ------------------------- | ----------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| url                       | url of current resource | URL, для которого нужен счётчик репостов. Нужен полный URL. При генерации через `[[~]]` добавьте &scheme=`full`, например:                                                                                                                                    |
| `[[~15? &scheme=`full`]]` |
| cache                     | true                    | Кэшировать результат или нет. По умолчанию включено. 0 отключает (не рекомендуется).                                                                                                                                                                                                                          |
| cacheExpires              | 3600                    | Время в секундах, в течение которого кэш действителен, после чего данные снова запрашиваются у Facebook.                                                                                                                                                                                                                         |
| node                      | shares                  | Значение "comments" возвращает число комментариев для URL. Обычно работает, если на странице есть виджет комментариев Facebook. Считаются только комментарии верхнего уровня, без ответов. Значение "id" показывает URL, который проверяет Facebook. |

## Примеры использования

Число репостов текущего ресурса:

``` php
[[!getFacebookShares]]
```

Число комментариев Facebook для текущего ресурса:

``` php
[[!getFacebookShares? &node=`comments`]]
```

Число комментариев Facebook для ресурса в tpl getResources:

``` php
Comments: [[!getFacebookShares? &node=`comments` &url=`[[~[[+id]]? &scheme=`full`]]`]]
```

Число репостов для URL "`http://google.com/`" с форматированием через output filter prettyNumbers из SocialSuite:

``` php
[[!getFacebookShares:prettyNumbers? &url=`http://google.com/`]]
```

Вызов сниппета из другого сниппета для подсчёта конкретного URL:

``` php
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getFacebookShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Facebook.";
```
