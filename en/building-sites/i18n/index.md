---
title: "Internationalisation"
note: "This document is a stub, please help by expanding it."
---

MODX ships with the concept of _Lexicons_ to aid with internationalisation (i18n). They are key => value pairs, per language, that can be accessed in a variety of ways.


## Relevant settings

For proper i18n support, configure the following settings:

- For the manager, set the `manager_language` setting to the 2 character language code.
- For the frontend:
    - Set the `cultureKey` setting to the 2 character language code to indicate what lexicon should be loaded.
    - Set the `locale` setting to the full locale (e.g. `de_DE.UTF8`) to use the locale for time/date/number formats, among other things.
     

## Lexicons

Lexicon topics need to be loaded before they can be used.

### Using Lexicons in templates

``` php
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

### Using Lexicons in PHP

``` php
$modx->lexicon->load('namespace_name:topicname');
echo $modx->lexicon('key');
```

## Building a multi lingual site

To  build multi-lingual sites, there are typically 2 approaches you can take in MODX. 

The first involves setting up a [context per language](../contexts). You route the visitor to the right context by (sub)domain or subfolder using a [gateway plugin](../contexts/gateway-plugin) or third party extra like xRouting or LangRouter. With this approach, the Babel third party extra can be useful to connect translations across contexts. This allows you to use lexicons by configuring context settings appropriately. 

The second approach involves combining the languages into a single context. This requires third party extras like Lingua. 
