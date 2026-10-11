---
title: "modX.beforeRender"
translation: "extending-modx/modx-class/reference/modx.beforerender"
description: "Пустой фронтенд-хук, вызываемый прямо перед рендером ответа"
---

## modX::beforeRender

Пустой хук, который `modResponse::outputContent()` вызывает непосредственно перед срабатыванием `OnWebPagePrerender`, независимо от того, обрабатывался ли вывод ресурса. К этому моменту скрипты уже внедрены в страницу.

Тело в ядре пустое, поэтому поведение задаётся переопределением метода в подклассе `modX`. До него доходят только фронтенд-ответы: `modManagerResponse` и `modConnectorResponse` заменяют `outputContent()`, не вызывая его.

## Синтаксис

``` php
void beforeRender ()
```

Параметров нет.

## Пример

``` php
class SiteX extends \MODX\Revolution\modX
{
    public function beforeRender()
    {
        // вызывается прямо перед OnWebPagePrerender
    }
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.beforeProcessing](extending-modx/modx-class/reference/modx.beforeprocessing)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)
