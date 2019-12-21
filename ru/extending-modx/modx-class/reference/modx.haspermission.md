---
title: "modX.hasPermission"
translation: "extending-modx/modx-class/reference/modx.haspermission"
---

## modX::hasPermission

Возвращает true, если пользователь имеет указанное разрешение политики.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::hasPermission()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::hasPermission())

``` php
boolean hasPermission (string|array $pm)
```

## Пример

Запретить пользователю доступ, если у него нет разрешения `edit_chunk` в загруженных политиках.

``` php
$pm = 'edit_chunk';
if (!$modx->hasPermission($pm)) {
    die('Access Denied!');
}
```

Также возможно проверить, есть ли у пользователя несколько разрешений, таких как `edit_chunk` и `edit_template`. Подобно;

``` php
$pm = array('edit_chunk' => true, 'edit_template' => true);
if (!$modx->hasPermission($pm)) {
    die ('Access Denied!');
}
```

## Смотрите также

- [Policies](building-sites/client-proofing/security/policies "Policies")
