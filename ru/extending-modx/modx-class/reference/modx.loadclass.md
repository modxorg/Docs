---
title: "modX.loadClass"
translation: "extending-modx/modx-class/reference/modx.loadclass"
description: "Разрешить старое имя класса в PSR-4 класс с запасным вариантом xPDO"
---

## modX::loadClass

**Устарело с 3.0** — обращайтесь к классам `MODX\Revolution\*` напрямую и пусть их подгружает PSR-4 автозагрузчик.

Имя разрешается в следующем порядке:

1. Уже существующее имя с пространством имен возвращается без изменений.
2. Простое или точечное имя вроде `modx.modChunk` отображается на `MODX\Revolution\`. Для старого имени создаётся `class_alias()`, если его нет, фиксируется устаревание, а возвращается PSR-4 имя.
3. Если эта догадка не сработала, метод возвращает то, что ответит `xPDO::loadClass()`: имя класса или `false`.

Непустой `$path` отключает шаг 2. `$path`, `$ignorePkg` и `$transient` действуют только на шаге 3.

## Синтаксис

``` php
bool|string loadClass (string $fqn, [string $path = ''], [bool $ignorePkg = false], [bool $transient = false])
```

- `$fqn` _(string)_ имя класса: простое, точечное или с пространством имен
- `$path` _(string)_ каталог для поиска в `xPDO::loadClass()`, по умолчанию `''`
- `$ignorePkg` _(bool)_ пропустить поиск пакета внутри `xPDO::loadClass()`, по умолчанию `false`
- `$transient` _(bool)_ загрузить без карты метаданных внутри `xPDO::loadClass()`, по умолчанию `false`

## Пример

``` php
$class = $modx->loadClass('modx.modChunk');
// 'MODX\Revolution\modChunk'

$missing = $modx->loadClass('modMissingClass');
// false, а xPDO пишет "Could not load class"
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.deprecated](extending-modx/modx-class/reference/modx.deprecated)
