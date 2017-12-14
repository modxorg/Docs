---
title: "Babel.BabelTranslation"
_old_id: "788"
_old_uri: "revo/babel/babel.babeltranslation"
---

The BabelTranslation snippets returns the ID of a translated resource in a given context.

Available Parameters
--------------------

<table><tbody><tr><th>Name</th><th>Description   
</th><th>Default   
</th></tr><tr><td>resourceId</td><td>(optional) ID of resource of which a translated resource should be determined.</td><td>current resource's ID</td></tr><tr><td>contextKey</td><td>Key of context in which translated resource should be determined.</td><td> </td></tr><tr><td>showUnpublished</td><td>(optional) Flag whether to show unpublished translations.</td><td>0   
</td></tr></tbody></table>Example
-------

```
<pre class="brush: html">
[[BabelTranslation? &contextKey=`de`]]

```This will return the ID of the translated resource located in the "de" context of the current resource.

See Also
--------

1. [Babel.BabelLinks](/extras/revo/babel/babel.babellinks)
2. [Babel.BabelTranslation](/extras/revo/babel/babel.babeltranslation)

[Offical Babel project website: Multilingual websites with MODX](http://www.multilingual-modx.com/)  