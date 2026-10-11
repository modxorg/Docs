---
title: "modX.deprecated"
translation: "extending-modx/modx-class/reference/modx.deprecated"
description: "Записать уведомление об устаревании вызывающего метода"
---

## modX::deprecated

Пишет уведомление об устаревании метода, который будет удалён. Вызывайте его первой строкой такого метода: по трассировке определяются и устаревшее описание, и код, который его вызвал.

Вызов пропускается, когда опция `log_deprecated` выключена; по умолчанию она включена.

Уведомления живут в памяти: по одному на описание, вызывающие накапливаются. При завершении запроса они становятся строками `modDeprecatedMethod`. В менеджере они перечислены в разделе Reports → Error Log, панель Deprecations Log.

## Синтаксис

``` php
void deprecated (string $since, [string $recommendation = ''], [string $deprecatedDef = ''])
```

- `$since` _(string)_ версия, в которой функция стала устаревшей
- `$recommendation` _(string)_ совет по замене, по умолчанию `''`
- `$deprecatedDef` _(string)_ имя для записи; по умолчанию `''` оно выводится из трассировки

## Пример

``` php
function legacy_lookup($modx, $id)
{
    $modx->deprecated('3.1.0', 'Use $modx->getObject instead');

    return $modx->getObject(modResource::class, $id);
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.loadClass](extending-modx/modx-class/reference/modx.loadclass)
- [modX.messageQuit](extending-modx/modx-class/reference/modx.messagequit)
