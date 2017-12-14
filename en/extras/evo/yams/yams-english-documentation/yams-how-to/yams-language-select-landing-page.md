---
title: "YAMS Language Select Landing Page"
_old_id: "749"
_old_uri: "evo/yams/yams-english-documentation/yams-how-to/yams-language-select-landing-page"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td>No content found for label(s) yams-language-select-landing-page.</td></tr></table></div>How can I make a language selection site start/landing page?
============================================================

1. Create a new template to use for the landing page.
2. From within the YAMS Module, select that template as monolingual or multilingual as required. (If the landing page is multilingual then YAMS can be set-up to guess the language to display based on the user's browser settings. See the Other Params tab.)
3. Modify the MODx site start document to use the landing page template
4. Create a chunk containing the following template called LandingPageRepeat, say: ```
  <pre class="brush: php">
  <li><a href="(yams_docr:docId)" title="[[YAMS? &get=`data` &from=`pagetitle` &docid=`docId`]]" >(yams_name)</a></li>
  
  ```Replace docId by the identifier of the document that the user will to be redirected to from the landing page.
5. Somewhere in the template, use the following code to include a hyperlinked list of all available languages: ```
  <pre class="brush: php">
  <ul>[[YAMS? &get=`repeat` &repeattpl=`LandingPageRepeat`]]</ul>
  
  ```