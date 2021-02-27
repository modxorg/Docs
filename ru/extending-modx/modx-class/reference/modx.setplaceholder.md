---
title: "modX.setPlaceholder"
_old_id: "1106"
translation: "extending-modx/modx-class/reference/modx.setplaceholder"
---

## modX::setPlaceholder

Устанавливает значение плейсхолдера, соответствующее синтаксису "+".

## Синтаксис

API Doc: [modX::setPlaceholder()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setPlaceholder())

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
