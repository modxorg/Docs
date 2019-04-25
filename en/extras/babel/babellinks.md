---
title: "BabelLinks"
_old_id: "787"
_old_uri: "revo/babel/babel.babellinks"
---

BabelLinks is a snippet which displays links to other languages (contexts) in the frontend.

## Available Parameters

 | Name            | Description                                                                   | Default               | Version |
 | --------------- | ----------------------------------------------------------------------------- | --------------------- | ------- |
 | resourceId      | (optional) ID of resource of which links to translations should be displayed. | current resource's ID |         |
 | tpl             | (optional) Chunk to display a language link.                                  | babelLink             |         |
 | activeCls       | (optional) CSS class name for the current active language.                    | active                |         |
 | showUnpublished | (optional) Flag whether to show unpublished translations.                     | 0                     |         |
 | showCurrent     | Flag whether to show current translation.                                     | 0                     | 3.0.0   |
 | outputSeparator | Character to implode the list                                                 | "\\n"                 | 3.0.0   |
 | includeUnlinked | Flag whether to show unlinked translation.                                    | 0                     | 3.0.0   |
 | toArray         | Flag whether to dump the output as an array instead.                          | 0                     | 3.0.0   |
 | toPlaceholder   | Flag whether to dump the output into the given placeholder's name.            |                       | 3.0.0   |

## BabelLink Chunk

 If the &tpl parameter is not set the default chunk will be used with the follwoing code:

 ``` php
<li><a href="[[+url]]" class="[[+cultureKey]][[+active:notempty=` [[+active]]`]]">[[%babel.language_[[+cultureKey]]? &topic=`default` &namespace=`babel`]]</a></li>
```

When using your own chunk to display the language links you can use the following placeholders:

 | Name       | Description                                                                                                                                                                                                             |
 | ---------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
 | url        | Url to linked translation (or site\_url of specific language if there is no translated resource available).                                                                                                             |
 | cultureKey | Culture key of translation (e.g en, de, fr oder es). You may use the babel lexicon to display the language's name: `[[%babel.language_`[[+cultureKey]]`? &topic=`default` &namespace=`babel`]]`                         |
 | active     | If link points to a resource of the current active language (context) this placeholder is set to the active CSS class name specified by the &activeCls parameter (default=active). Otherwise this placeholder is empty. |
 | id         | ID of tranlated resource. If no translation is available this placeholder is empty ('').                                                                                                                                |

## Example

 ``` html
<ul>
[[BabelLinks]]
</ul>
```

## See also

1. [Babel.BabelLinks](extras/babel/babel.babellinks)
2. [Babel.BabelTranslation](extras/babel/babel.babeltranslation)

[Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/)
