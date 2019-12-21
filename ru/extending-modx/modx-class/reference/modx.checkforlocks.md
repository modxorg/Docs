---
title: "modX.checkForLocks"
translation: "extending-modx/modx-class/reference/modx.checkforlocks"
---

## modX::checkForLocks

Проверяет наличие блокировки на странице. Страница "заблокирована", если другой пользователь уже просматривает ее. Это предотвращает столкновения.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::checkForLocks()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::checkForLocks())

``` php
void checkForLocks (integer $id, string $action, string $type)
```

## Пример

Проверьте наличие блокировок в действии `edit_chunk`.

``` php
if ($modx->checkForLocks($modx->getLoginUserID(),'edit_chunk','edit');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
