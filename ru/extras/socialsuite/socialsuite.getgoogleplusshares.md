---
title: "getGooglePlusShares"
description: "Сниппет SocialSuite для подсчёта репостов URL в Google+ через неофициальный API"
translation: "extras/socialsuite/socialsuite.getgoogleplusshares"
---

[SocialSuite](extras/socialsuite "SocialSuite") это набор полезных инструментов для интеграции социальных сетей в сайт MODX.

getGooglePlusShares это [сниппет](developing-in-modx/basic-development/snippets "Snippets") из SocialSuite. Он возвращает число: сколько раз указанный URL **поделили** в Google+. Сейчас используется **неофициальный API**, поэтому интеграция может перестать работать в любой момент, пока Google не выпустит поддерживаемый API.

## Свойства сниппета

| Property                  | Default Value           | Description                                                                                                                                                                    |
| ------------------------- | ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| url                       | url of current resource | URL, для которого нужен счётчик репостов. Нужен полный URL. При генерации через `[[~]]` добавьте &scheme=`full`, например: |
| `[[~15? &scheme=`full`]]` |
| cache                     | true                    | Кэшировать результат или нет. По умолчанию включено. 0 отключает (не рекомендуется).                                                                                       |
| cacheExpires              | 3600                    | Время в секундах, в течение которого кэш действителен, после чего данные снова запрашиваются у Facebook.                                                                                      |

## Базовое использование

Число репостов текущего ресурса:

``` php
[[!getGooglePlusShares]]
```

Число репостов для URL "`http://google.com/`" с форматированием через [prettyNumbers](extras/socialsuite/socialsuite.prettynumbers "SocialSuite.prettyNumbers") из SocialSuite:

``` php
[[!getGooglePlusShares:prettyNumbers? &url=`http://google.com/`]]
```

Вызов сниппета из другого сниппета для подсчёта конкретного URL:

``` php
<?php
$url = 'http://google.com/';
$shares = $modx->runSnippet('getGooglePlusShares', array('url' => $url));
return "The url {$url} has been shared {$shares} times on Google+.";
```
