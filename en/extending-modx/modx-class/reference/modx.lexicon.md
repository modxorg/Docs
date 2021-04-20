---
title: "modX.lexicon"
description: "lexicon() grabs a processed Lexicon Entry"
---

## modX::lexicon

Grabs a processed Lexicon Entry.

This may also be a `modLexicon` object as well, if the Lexicon has been loaded. PHP supports having objects and methods with the same name.

## Syntax

API Doc: [modX::lexicon()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::lexicon())

``` php
string lexicon (string $key, [array $params = array()], [$language = ''])
```

- `$key` _(string)_ lexicon key. **required**
- `$params` _(array)_ array of additional parameters for passing values into the record, see second example below
- `$language` _(string)_ language key, `cultureKey` value will be used by default.

## Example

Output the translation of the 'welcome\_message' Entry, and sets the 'name' Placeholder in it.

``` php
echo $modx->lexicon('welcome_message', array('name' => 'John'), 'en');
```

The above example assumes a message that contains a placeholder for "name", e.g.

``` php
$_lang['welcome_message'] = 'Hello [[+name]]!  How are you today?';
```

## See Also

- [Internationalization](extending-modx/internationalization "Internationalization")
- [cultureKey](building-sites/settings/culturekey)