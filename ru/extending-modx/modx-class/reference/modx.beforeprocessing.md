---
title: "modX.beforeProcessing"
translation: "extending-modx/modx-class/reference/modx.beforeprocessing"
description: "Пустой фронтенд-хук, который вызывается после загрузки ресурса"
---

## modX::beforeProcessing

Пустой хук, который `modRequest::prepareResponse()` вызывает сразу после определения ресурса и перед срабатыванием `OnLoadWebDocument` — последняя точка расширения перед выводом.

Тело в ядре пустое, поэтому поведение задаётся переопределением метода в подклассе `modX`. До него доходят только фронтенд-запросы; ответы менеджера и коннектора его не вызывают.

## Синтаксис

``` php
void beforeProcessing ()
```

Параметров нет.

## Пример

``` php
class SiteX extends \MODX\Revolution\modX
{
    public function beforeProcessing()
    {
        // вызывается после загрузки ресурса, перед OnLoadWebDocument
    }
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.beforeRender](extending-modx/modx-class/reference/modx.beforerender)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)
