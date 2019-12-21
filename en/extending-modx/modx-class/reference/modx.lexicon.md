---
title: "modX.lexicon"
_old_id: "1086"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.lexicon"
---

## modX::lexicon

Grabs a processed Lexicon Entry.

This may also be a modLexicon object as well, if the Lexicon has been loaded. PHP supports having objects and methods with the same name.

## Syntax

API Doc: [modX::lexicon()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::lexicon())

``` php
string lexicon (string $key, [array $params = array()])
```

## Example

Output the translation of the 'welcome\_message' Entry, and sets the 'name' Placeholder in it.

``` php
echo $modx->lexicon('welcome_message',array('name' => 'John'));
```

The above example assumes a message that contains a placeholder for "name", e.g.

``` php
$_lang['welcome_message'] = 'Hello [[+name]]!  How are you today?';
```

## See Also

- [Internationalization](extending-modx/internationalization "Internationalization")
