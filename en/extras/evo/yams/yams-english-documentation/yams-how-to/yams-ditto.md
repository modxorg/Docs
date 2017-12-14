---
title: "YAMS + Ditto"
_old_id: "1682"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-ditto"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + Ditto](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-ditto)</td></tr></table></div>How can Ditto be made to work with YAMS?
========================================

A YAMS extender has been written for ditto which allows existing ditto templates containing basic placeholders to work with multilingual documents. The correct language content will be pulled in depending on how the output is being viewed. To use the ditto extender the following must be done:

- The parameter ```
  <pre class="brush: php">
  &extenders=`@FILE assets/modules/yams/yams.extender.inc.php`
  
  ```must be added to ditto calls. This will automatically replace normal placeholders like \[+pagetitle+\] with multilingual ones.
- If the snippet call is runnning as uncacheable (\[!Ditto? ...) add ```
  <pre class="brush: php">
  &id=`(yams_id)` &language=`(yams_mname)`
  
  ```to the Ditto snippet calls and prefix the names any ditto specific placeholders with (yams\_id)\_. For example, when using pagination it will be necessary to use \[+(yams\_id)\_start+\].
- If the snippet call is runnning as cacheable (\[\[Ditto? ...) then place once copy of the snippet call in each language tab of the document and add ```
  <pre class="brush: php">
  &id=`id` &language=`language file name`
  
  ```to each snippet call, where id is to be replaced by the language group id of the language and language file name is to be replaced with the name of the relevant language file. Also prefix the names any ditto specific placeholders with id\_. For example, when using pagination it will be necessary to use \[+id\_start+\].

Note that YAMS works by embedding multiple language versions of the content in a single template. Therefore it is important to remember to use the &id parameter to ensure that the multiple Ditto calls and placeholders embedded in the templates do not interfere with each other.