---
title: "modX.filterPathSegment"
translation: "extending-modx/modx-class/reference/modx.filterpathsegment"
description: "Превратить строку в сегмент URL-пути конвейером алиасов ресурса"
---

## modX::filterPathSegment

Делегирует вызов статическому `modResource::filterPathSegment()` — конвейеру, который превращает заголовок страницы в алиас ресурса. По порядку он:

1. снимает теги и декодирует сущности;
2. транслитерирует и ограничивает набор символов;
3. расставляет разделители слов, приводит к нижнему регистру и обрезает края;
4. усекает сегмент до `friendly_alias_max_length`, если настройка больше нуля.

Тот же метод работает как выходной фильтр [`filterPathSegment`](building-sites/tag-syntax/output-filters), а медиаисточники пропускают через него имена загружаемых файлов.

## Синтаксис

``` php
string filterPathSegment (string $string, [array $options = []])
```

- `$string` _(string)_ текст для преобразования
- `$options` _(array)_ переопределения `friendly_alias_*` для этого вызова, по умолчанию `[]`

## Пример

``` php
$segment = $modx->filterPathSegment('My News Title');
// 'my-news-title'

$segment = $modx->filterPathSegment('My News Title', array(
    'friendly_alias_lowercase_only' => false,
));
// 'My-News-Title'
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modResource](extending-modx/core-model/modresource)
- [Transliteration](getting-started/friendly-urls/transliteration)
- [Output filters](building-sites/tag-syntax/output-filters)
