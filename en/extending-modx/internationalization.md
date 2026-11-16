---
title: "Internationalization"
description: "How MODX lexicons store, load, and address translated strings across languages, topics, and namespaces, in tags, PHP, and JavaScript"
_old_id: "168"
_old_uri: "2.x/developing-in-modx/advanced-development/internationalization"
---

## Overview

A Lexicon groups strings by language and topic. Entries live in files under `lexicon/<lang>/<topic>.inc.php` inside a [namespace](extending-modx/namespaces). That keeps a Component's strings from colliding with core ones.

- **Languages** — IANA keys, e.g. `en`, `de`, `ru`
- **Topics** — files that group related entries
- **Namespaces** — directory scope; defaults to `core`

Splitting entries into topics keeps language files small and cheap to load, both server-side and in the browser.

### Locales

MODX supports locales in core. The [locale](building-sites/settings/locale) system setting is applied with `setlocale(LC_ALL, …)` during culture initialisation. The `setlocale` option gates that call and is not exposed in the manager, so it comes from `core/config/config.inc.php`.

Use a UTF-8 locale such as `de_DE.utf8`, otherwise the backend renders incorrectly. To change locale per request rather than per site, set it in a Plugin on [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture").

## Lexicon Entries

An entry has a key and a translated value, plus the coordinates that address it:

| Field | Meaning | Default |
| --- | --- | --- |
| `name` | The key you reference | — |
| `value` | The translation | — |
| `topic` | Topic the entry belongs to | `default` |
| `namespace` | Namespace the topic lives in | `core` |
| `language` | IANA key of the target language | `en` |
| `createdon` | When the row was created | the create processor does not set it |
| `editedon` | Last edit | set when the entry is created in the manager, and updated when the row is written |

Files are the source of truth. The `modLexiconEntry` table (`MODX\Revolution\modLexiconEntry`) stores database overrides that are merged on top of the files — it is not where translations originate.

## Loading and Using Lexicons

Topics load on demand. A coordinate that includes a namespace (`namespace:topic` or `language:namespace:topic`) is loaded once. A bare topic name is loaded again on the next call. Switch languages through a site or context setting, not per tag — one context per language is the usual shape.

### In content, chunks, and templates

```
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

| Property | When omitted |
| --- | --- |
| `topic` | `default` |
| `language` | the request language (`cultureKey`), not the column default `en` |
| `namespace` | `core`. Set it for a lexicon outside the core namespace, or the tag looks in core only |

Placeholders in the entry are filled from the properties of the tag, which follow the `?`:

```
[[!%key? &userinput=`amazing`]]
```

The `!` prefix marks the tag uncacheable — needed when the string changes per request.

### In PHP

The lexicon service registers during culture initialisation, so `$modx->lexicon` is ready. The `getService('lexicon', 'modLexicon')` form still works but uses a deprecated class alias.

`modLexicon::load()` takes `<topic>`, `<namespace>:<topic>` or `<language>:<namespace>:<topic>`. Every argument is one such coordinate — there is no separate parameter for the namespace:

``` php
$modx->lexicon->load('chunk');                 // the topic in every namespace
$modx->lexicon->load('school:playground');    // the topic of one namespace
$modx->lexicon->load('es:school:playground'); // the topic of one namespace in one language
```

Read one entry with `modX::lexicon()`; pass an array as the second argument to fill placeholders:

``` php
$modx->lexicon('school.basketball');
$modx->lexicon('school.basketball', ['userinput' => 'amazing']);
```

### In JavaScript (within MODX)

In a CMP, `_()` reads from the lexicon set loaded for the page:

``` js
 _('lexicon.key');
 _('lexicon.key', { userinput: 'amazing' });
```

The controller loads the topic `action`, then every topic returned by `getLanguageTopics()`, then `trash`. Return the topics the page needs. The base method returns an empty array.

``` php
/**
 * Specify the language topics to load
 * @return array
 */
public function getLanguageTopics()
{
    return ['mycomponent:default', 'mycomponent:settings'];
}
```

A page that needs a topic beyond its controller's list adds it with `addLexiconTopic()`:

``` php
$this->addLexiconTopic('mycomponent:reports');
```

The manager asks the connector `connectors/lang.js.php` for the page's topics. It reads the `topic` parameter, splits it on commas, and loads every coordinate with `modLexicon::load()`. Core templates do the same. `manager/templates/default/header.tpl` asks for `?ctx=mgr&topic=topmenu,file,resource,…`.

The connector does not extend a running page's lexicon. It answers with its own request's topics, `core:default` and the ones asked for, and the response replaces `MODx.lang`. Declare the page's topics before it is rendered.

## Lexicons for Settings

A System Setting's label is the key `setting_<key>`, and its description is `setting_<key>_desc`. The setting key keeps its Component's prefix, for example `gallery.display_thumbs`.

The core keeps its labels in the `setting` topic (`core/lexicon/en/setting.inc.php`):

``` php
$_lang['setting_manager_date_format'] = 'Manager Date Format';
$_lang['setting_manager_date_format_desc'] = 'The format string, in PHP date() format, for the dates represented in the manager.';
```

A Component outside the core namespace keeps them in the `default` topic (`lexicon/en/default.inc.php`) — that is also the topic the manager writes a translated label into:

``` php
$_lang['setting_gallery.display_thumbs'] = 'Display Thumbnails';
$_lang['setting_gallery.display_thumbs_desc'] = 'When set to true, this will display thumbnails for the gallery.';
```

The Settings grid loads both topics from the setting's namespace, so a key with the `setting_` prefix is found in either of them. A key without that prefix does not label the setting.

## See Also

- [modX.lexicon](extending-modx/modx-class/reference/modx.lexicon "modX.lexicon")
- [Namespaces](extending-modx/namespaces "Namespaces")
- [locale](building-sites/settings/locale)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture")