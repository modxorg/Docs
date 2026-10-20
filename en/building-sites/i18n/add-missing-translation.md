---
title: "Add a missing translation"
description: "Add a language to MODX: copy the lexicon of an existing language, translate the strings of the topics, and contribute a translation of the core."
---

A language that MODX does not ship can be added by copying the lexicon of an existing language and translating its strings.

## The Core Manager Lexicon

If your language is not among the provided translations, add a translation of the manager interface. Copy the directory below and rename the copy to the IANA code of your language (`de` for German, `it` for Italian):

`core/lexicon/en/ -> core/lexicon/[mylanguage]/`

Then edit the `.inc.php` files in the copy and translate the string values.

The files of a language are its topics: `core/lexicon/[mylanguage]/[topic].inc.php`. The topic `default` holds the strings that are not tied to a topic of their own.

**Clear the cache after you change a topic file**
The topics are cached, so an edited file is not picked up until the cache is cleared. Use **Content → Clear Cache**; the lexicons are part of what it clears.

## The Setup Lexicon

The installer is translated the same way: copy `setup/lang/en/` to `setup/lang/[mylanguage]/`.

## Lexicons of Extras

The lexicons of an extra live in the `lexicon/` directory of the path that is registered for the namespace of the extra:

`<namespace path>/lexicon/[language]/[topic].inc.php`

In MODX 3 an extra is unpacked into `core/packages/[signature]/`, so its lexicons sit next to its files. The `core/components/` directory is a convention of MODX 2. In MODX 3 it is empty, and an extra creates it only if it needs to.

Copy the `en` directory and repeat the same steps to translate an extra.

## Contributing Translations

To contribute to core translations, [join the project on Crowdin](https://crowdin.com/project/modx-revolution) and suggest changes there. With each release, the latest translations are included.

More information can be found in the [MODX community forum](https://community.modx.com/).

## See Also

1. [Internationalisation](building-sites/i18n)
2. [Add a missing translation](building-sites/i18n/add-missing-translation)
3. [Quip](extras/quip)
