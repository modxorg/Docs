---
title: "YAMS + Snippets"
_old_id: "1686"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-snippets"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Snippets](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-snippets)</td></tr></table></div>How can I make other snippets work with YAMS?
=============================================

For Wayfinder, Jot, eForm, Ditto, Breadcrumbs, see the other How To pages.

If the snippet uses templates then it will be necessary to convert the template to display the correct language content. This should be as simple as replacing the placeholders for the standard document variables: \[+pagetitle+\], \[+longtitle+\], \[+description+\], \[+introtext+\], \[+menutitle+\] and \[+content+\] by a YAMS snippet call:

```
<pre class="brush: php">
[[YAMS? &get=`data` &from=`document_variable_name` &docid=`[+id+]`]]

```and including language variants for free text using a \[\[YAMS? &get=`text`... snippet call.

See the [YAMS snippet documentation](/extras/evo/yams/yams-english-documentation/yams-snippet "YAMS Snippet") for more details.