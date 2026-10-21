---
title: "Internationalization"
description: "How MODX lexicons store, load, and address translated strings across languages, topics, and namespaces, in tags, PHP, and JavaScript"
_old_id: "168"
_old_uri: "2.x/developing-in-modx/advanced-development/internationalization"
---

## Overview

A Lexicon is a collection of strings grouped by language and topic. Entries live in files under `lexicon/<lang>/<topic>.inc.php` inside a [namespace](extending-modx/namespaces), which keeps a Component's strings from colliding with core ones.

- **Languages** — IANA keys, e.g. `en`, `de`, `ru`
- **Topics** — files that group related entries
- **Namespaces** — directory scope; defaults to `core`

Splitting entries into topics keeps language files small and cheap to load, both server-side and in the browser.

### Locales

MODX does support locales in core. The [locale](building-sites/settings/locale) system setting is applied with `setlocale(LC_ALL, …)` during culture initialisation; the `setlocale` option gates that call and is not exposed in the manager, so it comes from `core/config/config.inc.php`.

Use a UTF-8 locale such as `de_DE.utf8`, otherwise the backend renders incorrectly. To change locale per request rather than per site, set it in a Plugin on [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture").

## Lexicon Entries

An entry has a key and a translated value, plus the coordinates that address it:

| Field | Meaning | Default |
| --- | --- | --- |
| `name` | The key you reference | — |
| `value` | The translation | — |
| `topic` | Topic the entry belongs to | `default` |
| `namespace` | Namespace the topic lives in | `core` |
| `language` | IANA key of the target language | current `cultureKey`, or `en` |
| `createdon` / `editedon` | Timestamps | set automatically |

Files are the source of truth. The `modLexiconEntry` table (`MODX\Revolution\modLexiconEntry`) stores database overrides that are merged on top of the files — it is not where translations originate.

## Loading and Using Lexicons

Topics load on demand, deduplicated by full coordinate. Switch languages through a site or context setting, not per tag — one context per language is the usual shape.

### In content, chunks, and templates

```
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

The `topic` and the `language` can be left out: the topic falls back to `default`, the language to the one of the request. The `namespace` falls back to `core` as well, so it has to be given for a lexicon outside the core namespace — without it the tag looks in the core only.

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

A page declares the topics it needs, and the manager loads them into `MODx.lang`. To add the topics of an own component, name them in `getLanguageTopics()` of a controller of the component — it extends the list of the lexicons loaded for the page:

``` php
/**
 * Specify the language topics to load
 * @return array
 */
public function getLanguageTopics()
{
    return ['mycomponent:default'];
}
```

A page that needs a topic beyond those of its controller adds it with `addLexiconTopic()`:

``` php
$this->addLexiconTopic('mycomponent:settings');
```

The manager asks the connector `connectors/lang.js.php` for the topics of the page: it reads the `topic` parameter, splits it by commas and loads every coordinate with `modLexicon::load()`. The templates of the core use it the same way — `manager/templates/default/header.tpl` asks for `?ctx=mgr&topic=topmenu,file,resource,…`.

The connector does not extend the lexicon of a page that is already running: it answers with the topics of its own request — `core:default` and the ones asked for — and the response replaces `MODx.lang`. The topics of the page therefore have to be declared before it is rendered.

## Lexicons for Settings

The label of a System Setting is the key `setting_<key>`, and its description is `setting_<key>_desc`. The key of the setting keeps the prefix of the Component it belongs to, for example `gallery.display_thumbs`.

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

The Settings grid loads both topics of the namespace of the setting, so a key with the `setting_` prefix is found in either of them. A key without that prefix does not label the setting.

## See Also

- [modX.lexicon](extending-modx/modx-class/reference/modx.lexicon "modX.lexicon")
- [Namespaces](extending-modx/namespaces "Namespaces")
- [locale](building-sites/settings/locale)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture")