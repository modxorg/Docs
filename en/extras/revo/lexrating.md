---
title: "LexRating"
_old_id: "667"
_old_uri: "revo/lexrating"
---

<div>- [Description](#LexRating-Description)
- [LexRating](#LexRating-LexRating)
  - [Properties](#LexRating-Properties)
  - [Placeholders](#LexRating-Placeholders)
  - [Example](#LexRating-Example)
- [LexRatingList](#LexRating-LexRatingList)
  - [Properties](#LexRating-Properties)
  - [Placeholders](#LexRating-Placeholders)
  - [Example](#LexRating-Example)
- [LexRatingQuipPostHook](#LexRating-LexRatingQuipPostHook)

</div>Description 
============

LexRating (by [goldsky](http://twitter.com/_goldsky)) is a jQuery's star rating plugin, based on [rateit.codeplex.com](http://rateit.codeplex.com) (by [gidon](http://twitter.com/gjunge)).

For MODX implementation, this extra uses AJAX to store the rating.

All issues can be notified in its [github's page](https://github.com/goldsky/LexRating/issues).

You can get it by downloading it via Package Manager.

There are 2 snippets for this package:

1. **LexRating**,
2. **LexRatingList**, to list the rating results.

There is a Quip's hook: **LexRatingQuipPostHook**, to create a star rating on each comment.   
Think about a comment based star rating.

[![](/download/thumbnails/43417740/comment%20based%20rating.jpg)](/download/attachments/43417740/comment%20based%20rating.jpg)

LexRating 
==========

This snippet offers web visitor to give a rating into an object/item, based on the given name.   
This snippet checks the visitor's IP address, and if visitor logged in, the visitor's ID

Properties 
-----------

<table><tbody><tr><th>Name </th><th>Description </th><th>Example </th><th>Default Value </th><th>Options </th></tr><tr><td>name </td><td>Defines the name of the rating's item </td><td>&name=`\[\[\*pagetitle\]\]` </td><td>\[\[\*id\]\] </td><td>string </td></tr><tr><td>group </td><td>Defines the rating's group name.   
This will be useful to compare the results using LexRatingList </td><td>&group=`articles` </td><td>modResource </td><td>string </td></tr><tr><td>userGroups </td><td>Defines who is able to vote. </td><td>&userGroups=`Members` </td><td>empty </td><td>comma separated group names </td></tr><tr><td>extended </td><td>(@since 1.0.0-beta.2) To set and get an additional extended parameter of individual vote account </td><td>&extended=`{"quipReplyId":"\[<span class="error">\[+idprefix\]</span>\]\[<span class="error">\[+id\]</span>\]"}` </td><td>empty </td><td>practically any string </td></tr><tr><td>initialAjax </td><td>Load the initial values using Ajax </td><td>&initialAjax=`1` </td><td>1 </td><td>1 | 0 </td></tr><tr><td>readOnly </td><td>(@since 1.0.0-beta.2) read only mode </td><td>&readOnly=`1` </td><td>1 </td><td>1 | 0 </td></tr><tr><td>tpl </td><td>Template chunk for the output, can be chunk or file based chunk. </td><td>&tpl=`\[\[++core\_path\]\]templates/blabla.tpl` </td><td>lexrating </td><td>chunk name or file path </td></tr><tr><td>css </td><td>CSS filename </td><td>&css=`assets/templates/css/blabla.css` </td><td>assets/components/lexrating/default/css/lexrating.css </td><td>string | empty - disabling </td></tr><tr><td>js </td><td>Javascript filename </td><td>&css=`assets/templates/js/blabla.js` </td><td>assets/components/lexrating/default/js/lexrating.js </td><td>string | empty - disabling </td></tr><tr><td>loadjQuery </td><td>Auto load/disable jQuery </td><td>&loadjQuery=`0` </td><td>1 </td><td>1 | 0 </td></tr><tr><td>phsPrefix </td><td>Prefix for placeholders </td><td>&phsPrefix=`blabla.` </td><td>lexrating. </td><td>string </td></tr><tr><td>toArray </td><td>Return an array of placeholders </td><td>&toArray=`1` </td><td>null </td><td>1 | 0 | null </td></tr><tr><td>toPlaceholder </td><td>Save the output into the given name placeholder </td><td>&toPlaceholder=`my\_rating` </td><td>null </td><td>string </td></tr></tbody></table>Placeholders 
-------------

To get the complete placeholders, just use **&toArray=`1`** to spit out the keys.

<table><tbody><tr><th>Name </th><th>Description </th></tr><tr><td>\[\[+lexrating.name\]\] </td><td>The name you specify in the snippet </td></tr><tr><td>\[\[+lexrating.group\]\] </td><td>The group name you specify in the snippet </td></tr><tr><td>\[\[+lexrating.total.voters\]\] </td><td>Total number of the voters </td></tr><tr><td>\[\[+lexrating.initialAjax\]\] </td><td>The property you set in the snippet call </td></tr></tbody></table>Example 
--------

```
<pre class="brush: php">
[[LexRating?
&name=`[[*pagetitle]]`
&group=`articles`
&userGroups=`Members`
]]

```If you just want to display a rating of an item, use this

```
<pre class="brush: php">
[[LexRating?
&name=`[[*pagetitle]]`
&group=`articles`
&initialAjax=`0`
&readOnly=`1`
]]

```LexRatingList 
==============

This snippet retrieves the items of the LexRating's results based on the given group name.

Properties 
-----------

<table><tbody><tr><th>Name </th><th>Description </th><th>Example </th><th>Default Value </th><th>Options </th></tr><tr><td>group </td><td>The group name to be retrieved </td><td>&group=`articles` </td><td>modResource </td><td>string </td></tr><tr><td>limit </td><td>Limit the number of ouput </td><td>&limit=`10` </td><td>10 </td><td>int </td></tr><tr><td>offset </td><td>Query's limit offset </td><td>&offset=`10` </td><td>0 </td><td>int </td></tr><tr><td>sort </td><td>Sorting direction </td><td>&sort=`asc` </td><td>desc </td><td>asc (lo-hi) | desc (hi-lo) </td></tr><tr><td>tplListWrapper </td><td>Template chunk for wrapper, can be chunk or file based chunk </td><td>&tplListWrapper=`lexratinglist.wrapper` </td><td>lexratinglist.wrapper </td><td>chunk name or file path </td></tr><tr><td>tplListItem </td><td>Template chunk for each item, can be chunk or file based chunk </td><td>&tplListItem=`lexratinglist.item` </td><td>lexratinglist.item </td><td>chunk name or file path </td></tr><tr><td>css </td><td>CSS filename </td><td>&css=`assets/templates/css/blabla.css` </td><td>assets/components/lexrating/default/css/lexrating.css </td><td>string | empty - disabling </td></tr><tr><td>js </td><td>Javascript filename </td><td>&css=`assets/templates/js/blabla.js` </td><td>assets/components/lexrating/default/js/lexrating.js </td><td>string | empty - disabling </td></tr><tr><td>loadjQuery </td><td>Auto load/disable jQuery </td><td>&loadjQuery=`0` </td><td>1 </td><td>1 | 0 </td></tr><tr><td>phsPrefix </td><td>Prefix for placeholders </td><td>&phsPrefix=`blabla.` </td><td>lexrating. </td><td>string </td></tr><tr><td>toArray </td><td>Return an array of placeholders </td><td>&toArray=`1` </td><td>null </td><td>1 | 0 | null </td></tr><tr><td>toPlaceholder </td><td>Save the output into the given name placeholder </td><td>&toPlaceholder=`my\_rating` </td><td>null </td><td>string </td></tr></tbody></table>Placeholders 
-------------

To get the complete placeholders, just use **&toArray=`1`** to spit out the keys.

**WRAPPER**

<table><tbody><tr><th>Name </th><th>Description </th></tr><tr><td>\[\[+lexrating.list.items\]\] </td><td>The holder of the list of the items </td></tr></tbody></table>**LIST**

<table><tbody><tr><th>Name </th><th>Description </th></tr><tr><td>\[\[+lexrating.name\]\] </td><td>The name you specify in the snippet </td></tr><tr><td>\[\[+lexrating.group\]\] </td><td>The group name you specify in the snippet </td></tr><tr><td>\[\[+lexrating.total.voters\]\] </td><td>Total number of the voters </td></tr><tr><td>\[\[+lexrating.initialAjax\]\] </td><td>The property you set in the snippet call </td></tr></tbody></table>Example 
--------

<div>`[[LexRatingList? &group=`articles`]]`</div>LexRatingQuipPostHook 
======================

This hook requires quip's thread name.   
This only works once for each IP Address + userID.   
So any logged in user can not vote twice.

On the quip's call, try to use this as an example:

```
<pre class="brush: php">
[[LexRatingList? &group=`articles`]]

```LexRatingQuipPostHook 
======================

This hook requires quip's thread name.   
This only works once for each IP Address + userID.   
So any logged in user can not vote twice.

On the quip's call, try to use this as an example:

```
<pre class="brush: html">
<p>Total Rating:</p>
[[!LexRatingList?
&name=`threadNameHere`
&group=`Overall Rating`
]]
<br />
[[!Quip?
&thread=`threadNameHere`
&tplComment=`lexrating.quipComment`
]]
<br />
[[!QuipReply?
&thread=`threadNameHere`
&postHooks=`LexRatingQuipPostHook`
&tplAddComment=`lexrating.quipAddComment`
&redirectTo=`[[*id]]`
]]

```You can sync the connection between the thread's name (eg:**threadNameHere**) with the **LexRating** inside the other chunk, **lexrating.quipComment**.   
Basically, it only adds up the **LexRating** call but with the proper properties to make this works:

```
<pre class="brush: html">
[[!LexRating?
&group=`Overall Rating`
&name=`[[+thread]]`
&extended=`{"quipReplyId":"[[+idprefix]][[+id]]"}`
&readOnly=`1`
&tpl=`lexrating.quip`
&js=``
&loadjQuery=`0`
&initialAjax=`0`
&_toArray=`1`
]]

```<div class="note">&group is for the title,   
&name must be as same as the quip's thread name </div>What **&extended** does is only to identify each of the vote. You can change it anything, as long as it's the same with what the **lexrating.quip** needs for its placeholder.

```
<pre class="brush: php">
data-rateit-extended="[[+lexrating.extended]]"

```You must specify different names for the quip's thread names, remember to change/duplicate part of the chunks:

the duplicate of **lexrating.quipAddComment**

```
<pre class="brush: html">
        <!-- replace lexrating_groupName's value with what you have as the &group -->
        <input type="hidden" name="lexrating_groupName" value="Overall Rating" />

        <!-- but leave this one untouched because the &name is using the same placeholder [[+thread]] anyway -->
        <input type="hidden" name="lexrating_objectName" value="[[+thread]]" />

```the duplicate of **lexrating.quipComment**

```
<pre class="brush: php">
&group=`Overall Rating` // <== replace this

```<div class="warning">You need to empty out the database when testing, because LexRating fills up the data automatically, while the access is limited to once per IP/user ID </div>