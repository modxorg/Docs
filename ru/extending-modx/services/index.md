---
title: "MODX сервисы"
translation: "extending-modx/services"
---

## Что такое сервис?

Сервис - это любой объект, который загружается через [$modx->getService](extending-modx/modx-class/reference/modx.getservice "modX.getService"). Это может быть пользовательский класс, предоставленный пользователем, или самим MODX.

Как только объект загружен с помощью getService, он доступен через `$modx->(servicename)`. Так, например:

``` php
$modx->getService('twitter','myTwitter','/path/to/twitter/model/',array(  
  'api_key' => 3212423,
));  
$modx->twitter->tweet('Success!');  
```

## Какие сервисы включены по умолчанию?

Список основных сервисов MODX выглядит следующим образом:

1. [modFileHandler](extending-modx/services/modfilehandler)
2. [modMail](extending-modx/services/modmail)
3. [modRegistry](developing-in-modx/advanced-development/modx-services/modregistry)

## Смотрите также

- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService")
