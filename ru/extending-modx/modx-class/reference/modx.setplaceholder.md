---
title: "modX.setPlaceholder"
description: "Устанавливает значение плейсхолдера, соответствующее синтаксису \"+\"."
_old_id: "1106"
translation: "extending-modx/modx-class/reference/modx.setplaceholder"
---

## modX::setPlaceholder

Устанавливает значение плейсхолдера, соответствующее синтаксису "+".

## Синтаксис

``` php
void setPlaceholder (string $key, mixed $value)
```

## Пример

``` php
$modx->setPlaceholder('name','Barry');
```

Это заставляет плейсхолдер `[[+ name]]` быть доступным внутри ваших шаблонов или содержимого страницы.

## Смотрите также

- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
