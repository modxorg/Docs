---
title: "modX.lexicon"
description: "Returns a processed Lexicon entry"
---

## modX::lexicon

Returns a processed Lexicon entry.

The method itself always returns a string or `null`. The property `$modx->lexicon` of the same name holds the `modLexicon` service object — PHP allows a property and a method to share a name.

## Syntax

``` php
string|null lexicon (string $key, [array $params = array()], [string $language = ''])
```

- `$key` _(string)_ lexicon key. **required**
- `$params` _(array)_ values substituted into the placeholders of the entry
- `$language` _(string)_ language key; the `cultureKey` value is used by default.

Returns the translated string. Returns `null` if the entry does not exist or the lexicon service has not been initialized. In that case the log gets a "Culture not initialized; cannot use lexicon." error.


## Example

Output the translation of the `welcome_message` entry with the `name` Placeholder filled in:

``` php
echo $modx->lexicon('welcome_message', array('name' => 'John'), 'en');
```

The example assumes a lexicon entry with a `name` placeholder:

``` php
$_lang['welcome_message'] = 'Hello [[+name]]!  How are you today?';
```

## See Also

- [Internationalization](extending-modx/internationalization "Internationalization")
- [cultureKey](building-sites/settings/culturekey)
