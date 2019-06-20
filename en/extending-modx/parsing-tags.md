---
title: Parsing MODX Tags
---

In some cases you'll need to parse [snippet, chunk or lexicon tags](building-sites/tag-syntax) outside of the regular parsing flow. For example when generating email content, or when building an API that needs to return fully-processed content.

When doing so, you may notice that [modX::getChunk](extending-modx/modx-class/reference/modx.getchunk) only processes regular `[[+placeholders]]`, and not all other valid tags contained in the chunk. 

In those cases, you can use the `modParser` to complete processing:

```` php
// First render a chunk, which processes the provided placeholders 
$content = $modx->getChunk('MyChunkName', ['foo' => 'bar']); 

// Get the modParser instance
$parser = $modx->getParser();

// Define how deep we can go
$maxIterations= (integer) $modx->getOption('parser_max_iterations', null, 10);

// Parse cached tags, while leaving unprocessed tags in place
$parser->processElementTags('', $content, false, false, '[[', ']]', [], $maxIterations);
// Parse uncached tags and remove anything that could not be processed
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
````

