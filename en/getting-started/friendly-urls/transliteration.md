---
title: "Alias transliteration"
description: "How MODX turns non-Latin page titles into Friendly URL aliases"
---

## What transliteration is

When MODX builds a Resource alias from a pagetitle (or when you type an alias), it can map non-ASCII characters to ASCII-friendly ones. That is transliteration: `Кафе` can become `kafe`, `Straße` can become `Strasse`, depending on the method you choose.

Without transliteration, character restrictions may strip letters and leave broken or empty aliases. With Friendly URLs on, clean aliases keep URLs readable.

MODX applies transliteration inside `modResource::filterPathSegment()` when it generates or filters alias path segments. The same pipeline powers the manager’s real-time alias field and the [`filterPathSegment`](building-sites/tag-syntax/output-filters) output filter.

## Settings involved

Open **System Settings**, area **Friendly URL** (search for `friendly_alias`):

| Setting | Role |
| ------- | ---- |
| [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit) | Which method to use: `none`, `iconv`, `iconv_ascii`, or a named table from an extra |
| [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class) | Service class for named tables (default `translit.modTransliterate`) |
| [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path) | Where to load that class (default `{core_path}components/`) |
| [automatic\_alias](building-sites/settings/automatic_alias) | Generate the alias from the pagetitle on save when the alias is empty |

Related filters (word delimiters, lowercase, max length, restrict chars) run after transliteration. See the other `friendly_alias_*` settings in the same area.

Default for `friendly_alias_translit` in a stock install is `none` (no transliteration). The PHP fallback in code uses `iconv` when the extension exists and the setting is unset. Set the value explicitly so behaviour is obvious.

## Built-in: none

Leave `friendly_alias_translit` empty or set it to `none`. MODX does not map characters. Use this when titles are already ASCII or you type aliases by hand.

## Built-in: iconv

Set `friendly_alias_translit` to `iconv`. Requires the PHP `iconv` extension.

MODX runs something equivalent to converting the string with `//TRANSLIT//IGNORE` into the site charset (`modx_charset`, usually UTF-8). Quality depends on your PHP/iconv build and locale. It is a quick option without extras, not a language-specific table.

### iconv\_ascii

Set `friendly_alias_translit` to `iconv_ascii` to force transliteration toward ASCII (`ASCII//TRANSLIT//IGNORE`). Use this when you want Latin-only URL segments and `iconv` alone still leaves non-ASCII characters.

## Named tables: the Translit extra

For predictable language tables (Russian and others), install the [Translit](https://extras.modx.com/package/translit) package from Package Management. It ships `translit.modTransliterate`, which is already the default class name in core settings.

Typical setup after install:

1. Install **translit**.
2. Set `friendly_alias_translit_class` to `translit.modTransliterate` (usually already set).
3. Set `friendly_alias_translit_class_path` to `{core_path}components/` (default).
4. Set `friendly_alias_translit` to the table name, for example `russian` (not `iconv`).
5. Turn `automatic_alias` on if you want aliases created from pagetitles.
6. Clear the site cache.

The value of `friendly_alias_translit` is the **table name** the service loads (file name without `.php` under the Translit tables). Other tables or a custom copy (for example `custom`) work the same way: put the table name in the setting.

Other extras (Translitor, yTranslit, and similar) may register their own class or settings. Follow that package’s docs, then point `friendly_alias_translit_class` / path at its service if required.

## Check that it works

1. Enable [friendly\_urls](building-sites/settings/friendly_urls) and configure the web server rewrite rules ([Friendly URLs guide](getting-started/friendly-urls)).
2. Create a Resource whose pagetitle contains non-Latin characters.
3. Save (with `automatic_alias` on, or copy the suggested alias).
4. Confirm the alias field and the front-end URL use the transliterated form.

Existing Resources keep their stored aliases until you edit and regenerate them. Changing the setting does not rewrite the tree by itself.

## File uploads

In MODX 3.x, [upload\_translit](building-sites/settings/upload_translit) can transliterate uploaded file names using the same global transliteration rules. That is separate from FURL aliases but useful on the same multilingual sites.

## See also

- [Using Friendly URLs](getting-started/friendly-urls)
- [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit)
- [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class)
- [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path)
- [upload\_translit](building-sites/settings/upload_translit)
- [Translit on extras.modx.com](https://extras.modx.com/package/translit)
