---
title: "YAMS + eForm"
_old_id: "1684"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-eform"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS + eForm](/extras/evo/yams/yams-english-documentation/yams-how-to/yams-eform)</td></tr></table></div>How can eForm be made to work with YAMS?
========================================

With YAMS multiple language variants of content are embedded in documents during the parsing process. Thus there may be several language variants of the eForm form embedded in the document at the time the eForm plugin is active, even though only one version of the form will finally appear on the page. If each embedded eForm has the same form-id, then this will cause eForm to get confused. Therefore, to embed eForm in a multilingual document it is necessary to use one set of templates per language, and to give each a unique form-id.

Even though it is necessary to use one set of templates for each language, a single snippet can be used that will work with all language variants. This single snippet call can then be placed in a chunk if it is to be hidden from less technical users. To achieve this use the following naming convention for the form id and name of each template chunk: basename\_langId. Then use an eForm call similar to the following:

```
<pre class="brush: php">
[!eForm? &language=`(yams_mname)` &formid=`contactForm_(yams_id)` &tpl=`eFormContactForm_(yams_id)` &report=`eFormContactReport_(yams_id)` &automessage=`eFormContactAutoMessage_(yams_id)` &thankyou=`eFormContactThankyou_(yams_id)` ... !]

```