---
title: "Media Sources"
description: "Настройки fred и fredReadOnly, mediaSource и imageMediaSource в Elements"
translation: "extras/fred/themer/media_sources/index"
---

Media Sources можно назначить глобально в настройках Media Source или в settings Element по имени Media Source. При установке в каждый Media Source добавляются две новые настройки. Для доступа из Fred их нужно задать вручную. ПРИМЕЧАНИЕ: Fred пока не проверяет права пользователя на Media Source и смотрит только перечисленные ниже настройки.

## Настройки Media Source

### fred

Yes/No: Media Source доступен Elements, отрендеренным в Fred. _(по умолчанию no)_

### fredReadOnly

Yes/No: запись в Media Source запрещена. _(по умолчанию no)_

## Настройки Element

### mediaSource

ID Media Source для Finder. Несколько ID через запятую `,`.

### imageMediaSource

ID Media Source для полей image. Несколько ID через запятую `,`. Перекрывает `mediaSource`.
