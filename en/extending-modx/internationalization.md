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

### In content, chunks, and templates

```
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

`language`, `topic`, and `namespace` are all optional. The tag loads its topic on demand, so there is no separate preload step. Topics are deduplicated by their full coordinate — `de:school:default` and `en:school:default` are different entries in the cache.

Prefer switching languages per site or context setting over per tag. Separate contexts per language is the usual approach.

Placeholders in the entry are filled from tag properties:

```
[[!%key? &topic=`topicname` &namespace=`namespace_name` &language=`en` &userinput=`amazing`]]
```

The `!` prefix marks the tag uncacheable, which matters when the string changes per request.

### In PHP

The lexicon service is registered during culture initialisation, so `$modx->lexicon` is ready to use. `$modx->getService('lexicon', 'modLexicon')` still works, but the short class name is a deprecated alias.

Load topics with `modLexicon::load()`. The argument is `<topic>`, `<namespace>:<topic>`, or `<language>:<namespace>:<topic>`, and it accepts any number of topics at once:

``` php
$modx->lexicon->load('chunk','user','school:playground');
$modx->lexicon->load('es:school:playground');
```

The first loads three topics; the second loads the Spanish version of `playground` in the `school` namespace, overriding the current language.

Read a single entry with `modX::lexicon()`. Pass an array as the second argument to fill placeholders:

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

To load additional topics on demand, request them from `connectors/lang.js.php` with a comma-separated `topic` parameter — any topics the current language has:

```
/connectors/lang.js.php?topic=myextra:default,myextra:settings
```

The response replaces `MODx.lang`, so call it before the strings you need are used. Core loads `core:default` in connectors by itself; anything else is yours to request.

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