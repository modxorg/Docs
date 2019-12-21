---
title: "modX.getChildIds"
translation: "extending-modx/modx-class/reference/modx.getchildids"
---

## modX::getChildIds

Получает все дочерние идентификаторы ресурса для данного ресурса.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getChildIds()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getChildIds())

``` php
array getChildIds ([integer $id = null], [integer $depth = 10], [array $options = array()])
```

## Пример

Получить все дочерние идентификаторы для ресурса 23. Ограничение до 6 уровней в глубину. Только в контексте `web`.

``` php
$array_ids = $modx->getChildIds(23,6,array('context' => 'web'));
```

Обратите внимание, что при использовании этого метода в диспетчере (например, для сбора параметров ввода для TV) необходимо определить контекст с помощью третьего параметра `options`, поскольку он по умолчанию соответствует текущему контексту (в этом сценарии менеджер).

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.getParentIds](extending-modx/modx-class/reference/modx.getparentids "modX.getParentIds")
