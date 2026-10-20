---
title: "Add a missing translation"
description: "Add a missing translation to MODX: change one string in the manager, or add a language of your own, and contribute a translation of the core."
---

A translation that is missing can be added in two ways: change the string in the manager, or add a language of your own.

## A Missing String

A single string is changed in the manager, under **Admin → Lexicon Management**. Double-click the value of the entry and type the new one.

The **Create** button of the same page adds a string that the core does not have at all. It asks for the name of the entry, the namespace, the topic, the language and the value.

Both write into the database, and both take precedence over the file of the topic. They survive an update of MODX, and nothing has to be changed in the files of the installation.

**Revert Lexicon Entry** removes the change of one string, and **Revert Entries** removes the changes of a whole topic and language.

## A Whole Language

If your language is not among the provided translations, a translation of the manager interface is a copy of the lexicon of an existing language with the string values translated.

Copy the directory below and rename the copy to the IANA code of your language (`de` for German, `it` for Italian):

`core/lexicon/en/ -> core/lexicon/[mylanguage]/`

Then edit the `.inc.php` files in the copy and translate the string values. The files of a language are its topics: `core/lexicon/[mylanguage]/[topic].inc.php`. The topic `default` holds the strings that are not tied to a topic of their own.

**The files live in the core of the installation**
`core/lexicon/` is a part of the core, so an update of MODX replaces it and your translation is gone. Keep the copy in a repository of your own and put it back after every update, or change the strings in the manager, which an update does not touch.

**Clear the cache after you change a topic file**
The topics are cached, so an edited file is not picked up until the cache is cleared. Use **Content → Clear Cache**; the lexicons are part of what it clears.

## The Setup Lexicon

The installer is translated the same way: copy `setup/lang/en/` to `setup/lang/[mylanguage]/`. The same warning applies — the directory belongs to the core.

## Lexicons of Extras

The lexicons of an extra live in the `lexicon/` directory of the path that is registered for the namespace of the extra:

`<namespace path>/lexicon/[language]/[topic].inc.php`

In MODX 3 an extra is unpacked into `core/packages/[signature]/`, so its lexicons sit next to its files. The `core/components/` directory is a convention of MODX 2. In MODX 3 it is empty, and an extra creates it only if it needs to.

Copy the `en` directory and repeat the same steps to translate an extra. The files of an extra are not replaced by an update of MODX.

## Contributing Translations

To contribute to core translations, [join the project on Crowdin](https://crowdin.com/project/modx-revolution) and suggest changes there. With each release, the latest translations are included.

More information can be found in the [MODX community forum](https://community.modx.com/).

## See Also

1. [Internationalisation](building-sites/i18n)
2. [Add a missing translation](building-sites/i18n/add-missing-translation)
3. [Quip](extras/quip)
