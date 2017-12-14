---
title: "YAMS Custom Multilingual Tvs-Chunks-Snippets"
_old_id: "740"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-custom-multilingual-tvs-chunks-snippets"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Custom Multilingual Tvs-Chunks-Snippets](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-custom-multilingual-tvs-chunks-snippets)</td></tr></table></div>How do I make custom multilingual template variables\\chunks\\snippets?
=======================================================================

- Create one tv\\chunk\\snippet call for each language, using the following naming convention: myresource\_langid, where langId is the language group id.
- Include the tv\\chunk\\snippet call in a multilingual document like so: ```
  <pre class="brush: php">
  [[YAMS? &get=`type` &from=`myresource`]]
  
  ```where type is either tv for a template variable, chunk for a chunk, csnippet for a cacheable snippet call, or usnippet for an uncacheable snippet call. Note that it is currently not possible to pass parameters to multilingual snippet calls.

The correct language resource will be output depending on the language being displayed.