---
title: "friendly_alias_translit"
_old_id: "141"
_old_uri: "2.x/administering-your-site/settings/system-settings/friendly_alias_translit"
---

## friendly\_alias\_translit

**Name**: FURL Alias Transliteration
**Type**: textfield
**Default**: none
**Available In**: Revolution 2.0.8+

The method of transliteration to use on an alias specified for a Resource. Empty or `none` skips transliteration (stock default). Other values:

- `iconv` (if the PHP extension is available)
- `iconv_ascii` (force ASCII via iconv)
- a named transliteration table from a service class such as the [Translit](https://extras.modx.com/package/translit) extra (for example `russian`)

The service class is set in [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class). How-to guide: [Alias transliteration](getting-started/friendly-urls/transliteration).
