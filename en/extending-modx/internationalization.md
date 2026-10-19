---
title: "Internationalization"
description: How MODX lexicons store, load, and address translated strings across languages, topics, and namespaces, in tags, PHP, and JavaScript"
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

All three properties are optional. Placeholders in the entry are filled from tag properties:

```
[[!%userinput=`amazing`]]
```

The `!` prefix marks the tag uncacheable — needed when the string changes per request.

### In PHP

The lexicon service registers during culture initialisation, so `$modx->lexicon` is ready. The `getService('lexicon', 'modLexicon')` form still works but uses a deprecated class alias.

`modLexicon::load()` takes `<topic>`, `<namespace>:<topic>` or `<language>:<namespace>:<topic>`, any number at once:

``` php
$modx->lexicon->load('chunk','user','school:playground');
$modx->lexicon->load('es:school:playground');
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

Load extra topics on demand from `connectors/lang.js.php` with a comma-separated `topic` parameter:

```
/connectors/lang.js.php?topic=myextra:default,myextra:settings
```

The response replaces `MODx.lang`, so call it before using the strings. Core loads `core:default` by itself.

## Lexicons for Settings

System Settings read their labels from the `setting` topic, not only from `default`. Prefix entries with the Component namespace to avoid collisions:

**Default topic** (`lexicon/en/default.inc.php`):

``` php
$_lang['gallery.display_thumbs'] = 'Display Thumbnails';
```

**Setting topic** (`lexicon/en/setting.inc.php`):

``` php
$_lang['setting_gallery.display_thumbs'] = 'Display Thumbnails';
$_lang['setting_gallery.display_thumbs_desc'] = 'When set to true, this will display thumbnails for the gallery.';
```

The Settings grid loads both topics, so a key without the `setting_` prefix will not label the setting.

## See Also

- [modX.lexicon](extending-modx/modx-class/reference/modx.lexicon "modX.lexicon")
- [Namespaces](extending-modx/namespaces "Namespaces")
- [locale](building-sites/settings/locale)
- [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture")