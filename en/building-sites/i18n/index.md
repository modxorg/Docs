---
title: "Internationalisation"
description: "Lexicons in MODX: how the language of a request is chosen, how to call a lexicon entry from a template or from PHP, and how to add a missing translation."
---

## What Lexicons Are

Lexicons hold the translated strings of MODX. A lexicon is a set of `key => value` pairs, one set per language, and every language is split into topics.

## How the Language Is Chosen

The `cultureKey` setting decides which language is loaded. MODX takes the value from the first source that has it:

1. the `cultureKey` parameter of the request;
2. the `cultureKey` of the session;
3. the `cultureKey` Context setting, when the request runs in a Context that has one;
4. the `cultureKey` System setting.

The `cultureKey` System setting is `en` by default. A value that is not a language code is replaced by the default value: the code is checked against the pattern `[A-Za-z0-9_-]+`. Valid codes are `de`, `de_DE` and `pt-br`.

The `locale` setting holds the full locale of the system, for example `de_DE.UTF8`. It is applied with `setlocale()` and decides the formats of dates, times and numbers.

### The Language of the Manager

The manager has its own language, and it is not a System setting: the value lives in the session under `manager_language`.

- The **Toggle language** item of the **Admin** menu changes it. The item needs the `language` permission.
- The login page picks a language when the session has none. It takes `manager_language` from the request, then from the session, then from the `Accept-Language` header of the browser, and falls back to `en`.

The available languages are the directories under `core/lexicon/`, and the available topics are the `*.inc.php` files in a language directory.

## Lexicons

Lexicon topics must be loaded before they can be used.

### Using Lexicons in Templates

``` php
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

The tag has three properties:

| Property | Default | What it does |
| --- | --- | --- |
| `topic` | `default` | The topic of the lexicon. |
| `namespace` | `core` | The namespace the lexicon belongs to. |
| `language` | the `cultureKey` setting | The language of the values. |

Every property of the tag is also available inside the value as a placeholder: `[[+property]]` is replaced with the value of that property.

When a key or a topic is missing in the chosen language, the English value is used. When the key is missing altogether, the tag outputs the key itself. A typo in the name then shows up on the page.

### Using Lexicons in PHP

``` php
$modx->lexicon->load('namespace_name:topicname');
echo $modx->lexicon('key');
```

`load()` takes a topic, a namespace and a language:

| Form | What is loaded |
| --- | --- |
| `topic` | The topic, taken from every namespace. |
| `namespace:topic` | The topic of one namespace. |
| `language:namespace:topic` | The topic of one namespace in the given language. |

Without a language, the current one is used: the `cultureKey` setting, or the language of the manager when the call happens there.

### Overriding a Single Entry

A single string can be overridden in the manager, under **Admin → Lexicon Management**. Double-click the value of an entry and type the new one, or use the **Create** button to add a string the core does not have at all.

An override is stored in the database, takes precedence over the file of the topic and survives an update of MODX. **Revert Lexicon Entry** removes the override of one entry, and **Revert Entries** removes the overrides of a whole topic and language.

See [Add a missing translation](building-sites/i18n/add-missing-translation) for the rest.

## Events

| Event | When it fires |
| --- | --- |
| `OnInitCulture` | After the language and the locale are set, before the lexicons are used. |

## Building a Multi-Lingual Site

Two approaches are common:

1. **A Context per language.** Set up a [Context for each language](building-sites/contexts) and route the visitor to the right Context by (sub)domain or subfolder. Use a [gateway plugin](building-sites/contexts/gateway-plugin), a [virtual host](building-sites/contexts/virtual-host), or an extra such as [ContextRouter](extras/contextrouter) or [Babel](extras/babel). [Babel](extras/babel) connects translations across Contexts. Lexicons also work in templates of different Contexts: create the `cultureKey` and `locale` Context settings you need.
2. **A single Context for all languages.** Manage all languages from one Context. This requires an extra, such as [Lingua](extras/lingua).

## See Also

1. [Internationalisation](building-sites/i18n)
2. [Add a missing translation](building-sites/i18n/add-missing-translation)
3. [Contexts](building-sites/contexts)
   1. [Gateway Plugin](building-sites/contexts/gateway-plugin)
   2. [Virtual Host](building-sites/contexts/virtual-host)
4. [Tag Syntax](building-sites/tag-syntax)
   1. [Common Tags and Modifiers](building-sites/tag-syntax/common)
