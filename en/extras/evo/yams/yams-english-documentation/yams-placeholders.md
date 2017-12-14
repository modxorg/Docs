---
title: "YAMS Placeholders"
_old_id: "753"
_old_uri: "evo/yams/yams-english-documentation/yams-placeholders"
---

<div class="error"><span class="error">Unknown macro: {div}</span>![](/images/icons/emoticons/information.gif)**Language Variants**

<table class="tableview" width="100%"><tr><td><span class="icon icon-page">Page:</span> [YAMS Placeholders](/extras/evo/yams/yams-english-documentation/yams-placeholders)</td></tr></table></div>YAMS Placeholders
=================

Two forms of each placeholder are available. In the first form, `(yams_???)`, the placeholders provide information about the current document. In the second form, `(yams_???:<em>docId</em>)`, they provide information about the document with the given document identifier, `<em>docId</em>`. It should be possible to use snippet calls and chunks to specify the document identifier. `(yams_doc:[+id+])` can be used within templates.

It should be possible to use YAMS placeholders almost anywhere, including in chunks, in the names and output of template variables, and in the names, output and parameters of snippet calls.

When the output of a YAMS placeholder is language dependent it needs to know what the current language is. The current language is dependent upon the context. The `(yams-in)` or `(yams-repeat)` blocks allow the inclusion of alternate language content on a page. (See the Constructs tab). If a placeholder falls within either of these blocks, then the current language is that specified by those blocks. Otherwise the current language is taken to be the language in which the current page is being displayed. There may be occasions when it is necessary to override this behaviour and force the placeholder to treat the current document language as the current language. This can be achieved by appending a + symbol to the end of the name of the placeholder. For example, the following will generate a `(yams-repeat)` block that will display a list of the names of the available languages, all written in the current document language:

```
<pre class="brush: php">
<ul>[[YAMS? &get=`repeat` &repeattpl=`@CODE:<li>(yams_name_in_(yams_id+))</li>`]]</ul>

```YAMS placeholders
-----------------

<table><tbody><tr><th>Placeholder</th><th>Monolingual Document</th><th>Multilingual Document</th></tr><tr><th>`(yams_id)`  
`(yams_id:<em>docId</em>)`</th><td>The default language id</td><td>The current language id</td></tr><tr><th>`(yams_defaultid)`  
`(yams_defaultid:<em>docId</em>)`</th><td>The default language id   
_This is planned for inclusion in YAMS 1.2_</td><td>The default language id   
_This is planned for inclusion in YAMS 1.2_</td></tr><tr><th>`(yams_tag)`  
`(yams_tag:<em>docId</em>)`</th><td>The primary language tag for the default language</td><td>The primary language tag for the current language</td></tr><tr><th>`(yams_root)`  
`(yams_root:<em>docId</em>)`</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language, else nothing</td></tr><tr><th>`(yams_/root)`  
`(yams_/root:<em>docId</em>)`</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language preceded by a /, else nothing</td></tr><tr><th>`(yams_root/)`  
`(yams_root/:<em>docId</em>)`</th><td>Nothing</td><td>If specified and non-empty, the server root name for the current language followed by a /, else nothing</td></tr><tr><th>`(yams_site)`  
`(yams_site:<em>docId</em>)`</th><td>If server name mode is ON, an URL created using the specified monolingual server name. If server name mode is OFF, the same output as \[(site\_url)\].</td><td>The full multilingual site url including server name and server root as required for the current page.</td></tr><tr><th>`(yams_server)`  
`(yams_server:<em>docId</em>)`</th><td>Same as for yams\_site.</td><td>Same as for yams\_site, but with no root name.</td></tr><tr><th>`(yams_doc)`  
`(yams_doc:<em>docId</em>)`</th><td>A complete URL for the document or weblink. There is an option on the 'Other Params' tab that will suppress the filename for the site start document.</td><td>A complete URL for the current language version of the document or weblink. There is an option on the 'Other Params' tab that will suppress the filename for the site start document.</td></tr><tr><th>`(yams_docr)`  
`(yams_docr:<em>docId</em>)`</th><td>Same as for yams\_doc, but weblinks are resolved.</td><td>Same as for yams\_doc, but weblinks are resolved.</td></tr><tr><th>`(yams_dir)`  
`(yams_dir:<em>docId</em>)`</th><td>The language direction ('ltr' or 'rtl') for the default language</td><td>The language direction ('ltr' or 'rtl') for the current language</td></tr><tr><th>`(yams_align)`  
`(yams_align:<em>docId</em>)`</th><td>The text alignment ('left' or 'right') for the default language</td><td>The text alignment ('left' or 'right') for the current language</td></tr><tr><th>`(yams_mname)`  
`(yams_mname:<em>docId</em>)`</th><td>The MODx language name for the default language</td><td>The MODx language name for the current language</td></tr><tr><th>`(yams_confirm)`  
`(yams_confirm:<em>docId</em>)`</th><td>The name of the Confirm Language param. (See the Other Params tab.)</td><td>The name of the Confirm Language param. (See the Other Params tab.)</td></tr><tr><th>`(yams_change)`  
`(yams_change:<em>docId</em>)`</th><td>The name of the Change Language param. (See the Other Params tab.)</td><td>The name of the Change Language param. (See the Other Params tab.)</td></tr><tr><th>`(yams_name)`  
`(yams_name:<em>docId</em>)`</th><td>The name of the default language in the default language</td><td>The name of the current language in the current language</td></tr><tr><th>`(yams_name_in_<em>langId</em>)`  
`(yams_name_in_<em>langId</em>:<em>docId</em>)`</th><td>The name of the default language, written in the language specified by the `<em>langId</em>` language group id.</td><td>The name of the current language, written in the language specified by the `<em>langId</em>` language group id.</td></tr><tr><th>`(yams_choose)`  
`(yams_choose:<em>docId</em>)`</th><td>The Select Language Text, written in the default language. (See the Language Settings tab.)</td><td>The Select Language Text, written in the current language. (See the Language Settings tab.)</td></tr><tr><th>`((yams_data:<em>docId</em>:<em>fieldname</em>))`  
`((yams_data:<em>docId</em>:<em>fieldname</em>:<em>phx</em>))`</th><td>This special inline placeholder is different from all the others. It is used by YAMS for efficiently grabbing template variables from documents. Here, `<em>docId</em>` is the id of the document to grab the template variable from and `<em>fieldname</em>` is the name of the template variable from which to get the data. _In future, this syntax will allow phx to be used, but this is not currently supported._  
YAMS will search out all these placeholders in the document, work out what information needs to be grabbed from the database and grab in large chunks so as to minimise the number of database queries required.   
The `[[YAMS? &get=`data`` snippet call (same as the legacy `[[YAMS? &get=`content`` snippet call) which is used in the Wayfinder templates and internally by the YAMS Ditto extension will now output such placeholders meaning improved performance for large Ditto and Wayfinder calls.   
_As of YAMS 1.2 this will work with document variables as well as template variables._</td><td>Same as for monolingual documents</td></tr><tr><th>`(yams_multi)`  
`(yams_multi:<em>docId</em>)`</th><td>Outputs `0`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td><td>Outputs `1`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td></tr><tr><th>`(yams_mono)`  
`(yams_mono:<em>docId</em>)`</th><td>Outputs `1`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td><td>Outputs `0`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td></tr><tr><th>`(yams_type)`  
`(yams_type:<em>docId</em>)`</th><td>Outputs `mono`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td><td>Outputs `multi`. _This parameter is due to appear in YAMS 1.2_, and can be used in combination with PHx, for example, to exclude or include content based on type.</td></tr></tbody></table>