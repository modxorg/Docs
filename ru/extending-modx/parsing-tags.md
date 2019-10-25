---
title: Парсинг MODX тегов
translation: "extending-modx/parsing-tags"
---

В некоторых случаях вам нужно будет разобрать [снипетты, чанки и теги лексиконов](building-sites/tag-syntax) вне регулярного парсинга потока. Например, при создании содержимого электронной почты или при создании API, который должен возвращать полностью обработанный контент.

При этом вы можете заметить, что [modX::getChunk](extending-modx/modx-class/reference/modx.getchunk) обрабатывает только обычные `[[+placeholder]]`, а не все другие допустимые теги, содержащиеся в чанке.

В этих случаях вы можете использовать `modParser` для завершения обработки:

``` php
// Сначала визуализируем чанк, который обрабатывает предоставленные плейсхолдеры
$content = $modx->getChunk('MyChunkName', ['foo' => 'bar']);

// Получаем экземпляр modParser
$parser = $modx->getParser();

// Определяем, как глубоко мы можем пойти
$maxIterations= (integer) $modx->getOption('parser_max_iterations', null, 10);

// Разобрать кэшированные теги, оставив необработанные теги на месте
$parser->processElementTags('', $content, false, false, '[[', ']]', [], $maxIterations);
// Разобрать некэшированные теги и удалить все, что не удалось обработать
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
```
