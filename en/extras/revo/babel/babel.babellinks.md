---
title: "Babel.BabelLinks"
_old_id: "787"
_old_uri: "revo/babel/babel.babellinks"
---

 BabelLinks is a snippet which displays links to other languages (contexts) in the frontend.

Available Parameters
--------------------

 <table><tbody><tr><th> Name </th> <th> Description </th> <th> Default </th> <th> Version </th> </tr><tr><td> resourceId </td> <td> (optional) ID of resource of which links to translations should be displayed. </td> <td> current resource's ID </td> <td> </td> </tr><tr><td> tpl </td> <td> (optional) Chunk to display a language link. </td> <td> babelLink </td> <td> </td> </tr><tr><td> activeCls </td> <td> (optional) CSS class name for the current active language. </td> <td> active </td> <td> </td> </tr><tr><td> showUnpublished </td> <td> (optional) Flag whether to show unpublished translations. </td> <td> 0 </td> <td> </td> </tr><tr><td> showCurrent </td> <td> Flag whether to show current translation. </td> <td> 0 </td> <td> 3.0.0 </td> </tr><tr><td> outputSeparator </td> <td> Character to implode the list </td> <td> "\\n" </td> <td> 3.0.0 </td> </tr><tr><td> includeUnlinked </td> <td> Flag whether to show unlinked translation. </td> <td> 0 </td> <td> 3.0.0 </td> </tr><tr><td> toArray </td> <td> Flag whether to dump the output as an array instead. </td> <td> 0 </td> <td> 3.0.0 </td> </tr><tr><td> toPlaceholder </td> <td> Flag whether to dump the output into the given placeholder's name. </td> <td> </td> <td> 3.0.0 </td></tr></tbody></table>BabelLink Chunk
---------------

 If the &tpl parameter is not set the default chunk will be used with the follwoing code:

 ```
<pre class="brush: html">
<li><a href="[[+url]]" class="[[+cultureKey]][[+active:notempty=` [[+active]]`]]">[[%babel.language_[[+cultureKey]]? &topic=`default` &namespace=`babel`]]</a></li>

``` When using your own chunk to display the language links you can use the following placeholders:

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> url </td> <td> Url to linked translation (or site\_url of specific language if there is no translated resource available). </td> </tr><tr><td> cultureKey </td> <td> Culture key of translation (e.g en, de, fr oder es). You may use the babel lexicon to display the language's name: \[\[%babel.language\_\[\[+cultureKey\]\]? &topic=`default` &namespace=`babel`\]\] </td> </tr><tr><td> active </td> <td> If link points to a resource of the current active language (context) this placeholder is set to the active CSS class name specified by the &activeCls parameter (default=active). Otherwise this placeholder is empty. </td> </tr><tr><td> id </td> <td> ID of tranlated resource. If no translation is available this placeholder is empty (''). </td></tr></tbody></table>Example
-------

 ```
<pre class="brush: html">
<ul>
  [[BabelLinks]]
</ul>

```See also
--------

1. [Babel.BabelLinks](/extras/revo/babel/babel.babellinks)
2. [Babel.BabelTranslation](/extras/revo/babel/babel.babeltranslation)

 [Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/)