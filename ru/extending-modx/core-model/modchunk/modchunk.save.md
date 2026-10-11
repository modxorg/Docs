---
title: "modChunk.save"
translation: "extending-modx/core-model/modchunk/modchunk.save"
description: "Сохранить Chunk в базу, вызвав OnChunkBeforeSave и OnChunkSave"
---

## modChunk::save

Метод записывает запись Chunk в базу. Вызов идёт через `modElement::save`, который дополнительно синхронизирует внешний файл статического Chunk.

Оба события выполняются, только когда экземпляр — `modX`: `OnChunkBeforeSave` до записи, `OnChunkSave` после успешной записи. Каждому событию передаются `mode` (`new` либо `upd`), ссылка на `chunk` и `cacheFlag`.

Слушатель может изменить chunk, поскольку запись идёт после события. Возвращаемые значения слушателей игнорируются, поэтому отменить сохранение из события нельзя. Неудачная запись логируется как `chunk_err_create` для нового Chunk и как `chunk_err_save` для существующего.

## Синтаксис

``` php
boolean save ([boolean|integer $cacheFlag = null])
```

- `$cacheFlag` _(boolean|integer)_ Попадает ли запись в кэш; целое задаёт время жизни в секундах, по умолчанию `null`. Оба события получают его параметром.
- Объявлен в `modChunk` (`core/src/Revolution/modChunk.php`), оборачивает `modElement::save` (`core/src/Revolution/modElement.php`).

## Пример

``` php
$chunk = $modx->newObject('modChunk');
$chunk->fromArray([
    'name' => 'MyChunk',
    'content' => '<p>Hello!</p>',
]);
$chunk->save();
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
- [OnChunkBeforeSave](extending-modx/plugins/system-events/onchunkbeforesave)
- [OnChunkSave](extending-modx/plugins/system-events/onchunksave)
