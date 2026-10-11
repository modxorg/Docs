---
title: "modX.logManagerAction"
translation: "extending-modx/modx-class/reference/modx.logmanageraction"
description: "Записать строку в журнал действий менеджера"
---

## modX::logManagerAction

Создаёт и сохраняет запись `modManagerLog` для одного действия. Процессоры вызывают его сразу после изменения объекта, и строки появляются в разделе Reports → Manager Actions.

Пустые аргументы сохраняются так:

| Аргумент | Сохраняется как |
| --- | --- |
| `$action` | `'unknown'` |
| `$class_key` | `''` |
| `$item` | `'unknown'` |

Метод возвращает сохранённый объект или `null`, если сохранение не удалось после записи об ошибке.

## Синтаксис

``` php
modManagerLog|null logManagerAction (string $action, string $class_key, mixed $item, [int|null $userId = null])
```

- `$action` _(string)_ ключ действия, сохраняемый в строке
- `$class_key` _(string)_ ключ класса затронутого объекта
- `$item` _(mixed)_ идентификатор, сохраняемый как `item`
- `$userId` _(int|null)_ действующий пользователь; по умолчанию `null` берёт id `modX::$user`

## Пример

``` php
$log = $modx->logManagerAction('update_resource', modResource::class, 5);

if ($log === null) {
    // строка не была сохранена
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modResource](extending-modx/core-model/modresource)
