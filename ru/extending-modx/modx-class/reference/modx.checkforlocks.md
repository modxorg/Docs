---
title: "modX.checkForLocks"
description: "Проверяет наличие блокировки на странице."
translation: "extending-modx/modx-class/reference/modx.checkforlocks"
---

## modX::checkForLocks

Проверяет наличие блокировки на странице. Страница "заблокирована", если другой пользователь уже просматривает ее. Это предотвращает столкновения.

## Синтаксис

``` php
string|false checkForLocks (integer $id, string $action, string $type)
```

- `$id` _(integer)_ ID пользователя, проверяющего блокировку; если пусто или `0`, используется текущий вошедший пользователь
- `$action` _(string)_ Действие, по которому определяется, что заблокировано
- `$type` _(string)_ Сообщение, указывающий тип проверяемой блокировки

Возвращает переведённую строку лексикона `lock_msg` (с указанием пользователя, удерживающего блокировку), если страница заблокирована, или `false`, если нет.

## Пример

Проверка блокировок для действия `edit_chunk`.

``` php
$msg = $modx->checkForLocks($modx->getLoginUserID(), 'edit_chunk', 'edit');
if ($msg) {
    echo $msg;
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
