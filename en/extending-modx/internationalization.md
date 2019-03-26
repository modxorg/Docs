---
title: "Internationalization"
_old_id: "168"
_old_uri: "2.x/developing-in-modx/advanced-development/internationalization"
---

- [An Overview](#an-overview)
  - [Locales](#locales)
- [Lexicon Entries](#lexicon-entries)
- [Loading and Using Lexicons](#loading-and-using-lexicons)
  - [Lexicons via Tag (in content, chunks, templates etc)](#lexicons-via-tag-in-content-chunks-templates-etc)
  - [Lexicons in PHP](#lexicons-in-php)
    - [Loading lexicon topics with modLexicon::load()](#loading-lexicon-topics-with-modlexiconload)
    - [Displaying translated content with modX::lexicon()](#displaying-translated-content-with-modxlexicon)
  - [Lexicons in JavaScript (within MODX)](#lexicons-in-javascript-within-modx)
- [Lexicons for Settings](#lexicons-for-settings)
- [Conclusion](#conclusion)
- [See Also](#see-also)



## An Overview

Internationalization, or i18n, is the process of extrapolating text strings in a document to separate languages, so that the document may be viewed by a multitude of different languages without having to duplicate the page for every different language. Technically speaking, _internationalization_ refers to the process of _preparing_ code so that it can be translated; in MODX this process often boils down to isolating translatable strings into separate placeholders.

**i18n** 
 The abbreviation **i18n** derives from the word "internationalization". It means "**i** plus 18 letters then **n**".

MODX Revolution supports i18n at the core level, through what it calls "Lexicons". A lexicon is simply a collection of the following:

- Languages (IANA format)
- Topics
- Entries

A Lexicon Topic is a collection of Lexicon Entries. A Lexicon Entry is one single language string, with a key and a value. Revolution separates Entries into Topics to make for quicker language file loading, lower JS language cache load times, and ease of maintenance.

Furthermore, the modNamespace class is used to further separate Lexicon Topics into separate namespaces, preventing you from accidentally overwriting a core lexicon.

### Locales

Some translation frameworks (such as [gettext](http://www.gnu.org/software/gettext/)) rely on a specific _locale_ and a context to help distinguish between meanings. For example "football" has a different meaning depending on locale (Britain or the United States). MODX willl likely not support locales in the core, but you can handle setting locales however you need to based on your site organization and i18n approach. The most logical place would probably be using a plugin tied to the [OnInitCulture](extending-modx/plugins/system-events/oninitculture "OnInitCulture") event.

You could set a locale in the MODX system settings (or in the context settings, if you use i.e. Babel). But be sure that the MODX system locale uses an utf8 charset (i.e. de\_DE.utf8), otherwise the MODX backend will show some glitches.

## Lexicon Entries

A Lexicon Entry (or modLexiconEntry in the MODX model) is simply a single translation of a string into another language. It has a few important fields we'll note:

- name - This is the name, or "key" of the Entry. When using Lexicons, this is how you will reference this key.
- value - The translation of the key.
- topic - The topic that this entry belongs to.
- language - The IANA key of the language this Entry is translated into.

## Loading and Using Lexicons

Lexicons must first be loaded if they are to be used in the front-end; however, this is a trivial process.

### Lexicons via Tag (in content, chunks, templates etc)

To use a Lexicon Entry in a tag, use the following syntax:

``` php 
[[%key? &topic=`topicname` &namespace=`namespace_name` &language=`en`]]
```

The 'language', 'topic', and 'namespace' properties are optional; if the tag has been run earlier on the page with the same 'topic' property value, that topic will have already been loaded. If 'topic' is not specified, it will assume 'default'. If 'namespace' is not specified, it will assume 'core', or the MODX Revolution Core Namespace.

It is preferable not to use the 'language' property for every tag should you be changing languages; this is best done through a System or Context Setting for the entire site or context. The best option is different contexts for each language. But again, MODX leaves you with the preference.

If you have placeholders in your lexicon string, for example "This is \[\[+userinput\]\]!", you simply specify the key ("userinput") as tag property and pass what you want it replaced with in the value. Example:

\[\[!%key? &topic=`topicname` &namespace=`namespace\_name` &language=`en` &userinput=`amazing`\]\]

Note our ! prefix for the Tag; this makes sure the Tag isn't cached, since our string might be changing before the page cache does.

### Lexicons in PHP

Using lexicons in code is fairly simple; first off you'll want to make sure the modLexicon class is loaded by instantiating it as a service:

``` php 
$modx->getService('lexicon','modLexicon');
```

Then we'll want to load the Topic using the load() method.

#### Loading lexicon topics with modLexicon::load()

The syntax for the modLexicon::load method is pretty simple:

``` php 
$modx->lexicon->load('topicname');
```

The load() function supports Namespace-specific loading. So, say you had a Lexicon Topic named 'default' in a Namespace called 'school'. You'd simply load it like so:

``` php 
$modx->lexicon->load('school:default');
```

This would load the 'default' Topic in the 'school' Namespace. If the Namespace is not specified, it defaults to 'core', which is the default Namespace for the MODX Revolution backend.

The load() function also takes an infinite number of parameters; each parameter loads a separate Topic. Example:

``` php 
$modx->lexicon->load('chunk','user','school:playground');
```

This would load 3 Topics: 'chunk', 'user', and the 'playground' Topic from the 'school' Namespace.

Furthermore, the load parameter supports language-specific loading, should you want to override the default language that is being loaded (which defaults to the current value of $this->modx->cultureKey, which is set differently depending on the Context loaded, and can be set via Settings), you could load it like so:

``` php 
$modx->lexicon->load('es:school:playground');
```

This would load the Spanish version of the 'playground' Topic for the 'school' Namespace. Fun, huh?

#### Displaying translated content with modX::lexicon()

Now we can use the lexicon() method on the MODX object to get our Entry with key 'school.basketball':

``` php 
$modx->lexicon('school.basketball');
```

If you have placeholders in your lexicon string, for example "This is \[\[+userinput\]\]!", you can pass an array as the second arguement which has key=>value pairs of your placeholder content, like so:

``` php 
$modx->lexicon('school.basketball',array('sport' => 'basketball'));
```

### Lexicons in JavaScript (within MODX)

In CMPs you can use the following to use lexicons.

``` php 
 _('lexicon.key')
```

Please note that this assumes you have loaded the lexicon in your connector - there is (at least to my knowledge at this time ~Mark H.) no way to dynamically load other lexicon topics through JavaScript.

If you have placeholders in your lexicon string, for example "This is \[\[+userinput\]\]!", you can pass the values for the placeholders as a javascript object, like so:

``` php 
 _('lexicon.key',{ userinput: 'amazing' })
```

## Lexicons for Settings

So say you're creating System Settings for your 3rd Party Component (3PC). The syntax for auto-loading them into the Revolution Settings grid is simple. Let's say we have a Namespace for our Component called 'gallery', and a setting called 'gallery.display\_thumbs'

**Recommended Format** 
 The recommended format for 3PC developers is to use a prefix which identifies the parent component: $_lang\['\_name-of-component_.key-name'\] = 'Your translation here.';

This helps to prevent name collisions; keep in mind that the **$\_lang** array may have thousands of entries, so you want to make sure each entry is unique.

To add a lexicon name and description, we'd simply add the following 2 strings into our 'default' Lexicon Topic for our 'gallery' Namespace:

``` php 
$_lang['setting_gallery.display_thumbs'] = 'Display Thumbnails';
$_lang['setting_gallery.display_thumbs_desc'] = 'When set to true, this will display thumbnails for the gallery.';
```

And we're done!

## Conclusion

Lexicons provide MODX Revolution users with a plethora of avenues and options to do their i18n work. Lexicons are composed of multiple Entries for each Language, and are grouped into Topics. They can be called by PHP method calls, or by MODX Tags.

## See Also

- [modX.lexicon](extending-modx/core-model/modx/modx.lexicon "modX.lexicon")