---
title: "modChunk.remove"
translation: "extending-modx/core-model/modchunk/modchunk.remove"
description: "Удалить Chunk, вызвав OnChunkBeforeRemove и OnChunkRemove"
---

## modChunk::remove

Метод удаляет запись Chunk вместе со связанными записями: ссылками на property sets и записями ACL элемента. Файл статического источника статического Chunk остаётся на диске.

Оба события выполняются, только когда экземпляр — `modX`: `OnChunkBeforeRemove` до удаления, `OnChunkRemove` после успешного удаления. Каждому событию передаются ссылка на `chunk` и массив `ancestors`. Родительская реализация сначала проверяет политику доступа `remove`, а неудачу удаления сам `modChunk::remove` пишет в журнал с `chunk_err_remove`.

## Синтаксис

``` php
boolean remove ([array $ancestors = []])
```

- `$ancestors` _(array)_ Уже удалённые записи, чтобы составные ссылки не зациклились, по умолчанию `[]`.
- Объявлен в `modChunk` (`core/src/Revolution/modChunk.php`); родительская реализация — `modAccessibleObject::remove` (`core/src/Revolution/modAccessibleObject.php`).

## Пример

``` php
$chunk = $modx->getObject('modChunk', ['name' => 'MyChunk']);
if ($chunk) {
    $chunk->remove();
}
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk)
- [OnChunkBeforeRemove](extending-modx/plugins/system-events/onchunkbeforeremove)
- [OnChunkRemove](extending-modx/plugins/system-events/onchunkremove)
