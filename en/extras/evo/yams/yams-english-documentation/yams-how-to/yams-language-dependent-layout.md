---
title: "YAMS Language dependent layout"
_old_id: "746"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-language-dependent-layout"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Language dependent layout](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-language-dependent-layout)</td></tr></table></div>How can I have a different layout for each language?
====================================================

The answer is to use a different document template for each language and to get YAMS to choose the correct one based on the language:

1. Place the document template for each language within a separate chunk. Give the chunks the names mytemplate\_id1, mytemplate\_id2, etc. where id1, id2, ... are the language group ids for the active languages.
2. In the document template, use the following snippet call: ```
  <pre class="brush: php">
  [[YAMS? &get=`chunk` &from=`mytemplate`]]
  
  ```