---
title: "Tag Syntax"
_old_id: "302"
_old_uri: "2.x/making-sites-with-modx/tag-syntax"
---

<div>- [Tag Format Changes for Content Elements and Content Tags](#TagSyntax-TagFormatChangesforContentElementsandContentTags)
  - [Comment tags](#TagSyntax-Commenttags)
- [Structure of a Tag](#TagSyntax-StructureofaTag)
- [Properties](#TagSyntax-Properties)
- [Caching](#TagSyntax-Caching)
  - [Parsing Order](#TagSyntax-ParsingOrder)
- [Timing](#TagSyntax-Timing)
  - [Additional Help](#TagSyntax-AdditionalHelp)

</div>To simplify parsing logic, improve parsing performance and avoid confusion with many new adopters, all tags are now of a single format, differentiated by a token or a set of tokens which appear before a string which identifies the Content Element or Content Tag to be processed; e.g. \[\[_tokenIdentifier_\]\].

Tag Format Changes for Content Elements and Content Tags
--------------------------------------------------------

<table><tbody><tr><th>**_Content Elements_** </th> <th>Evolution (Old)</th> <th> </th> <th>Revolution (New)</th> <th>Example for Revolution   
</th> </tr><tr><td>[Templates](making-sites-with-modx/structuring-your-site/templates "Templates") </td> <td>no tag representation</td> <td> </td> <td>no tag representation</td> <td> </td> </tr><tr><td>Resource Fields</td> <td>\[\*_field_\*\]</td> <td> </td> <td>\[\[\*field\]\]   
</td> <td>\[\[\*pagetitle\]\]</td> </tr><tr><td>[Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables") </td> <td>\[\*_templatevar_\*\]</td> <td> </td> <td>\[\[\*_templatevar_\]\]</td> <td>\[\[\*tags\]\]   
</td> </tr><tr><td>[Chunks](making-sites-with-modx/structuring-your-site/chunks "Chunks") </td> <td>{{_chunk_ }}   
</td> <td> </td> <td>\[\[$_chunk_\]\]</td> <td>\[\[$header\]\]   
</td> </tr><tr><td>[Snippets](developing-in-modx/basic-development/snippets "Snippets") </td> <td>\[\[_snippet_\]\]</td> <td> </td> <td>\[\[_snippet_\]\]</td> <td>\[\[getResources\]\]   
</td> </tr><tr><td>[Plugins](developing-in-modx/basic-development/plugins "Plugins") </td> <td>no tag representation</td> <td> </td> <td>no tag representation</td> <td> </td> </tr><tr><td>[Modules](/evolution/1.0/developers-guide/modules "Modules") </td> <td>no tag representation</td> <td> </td> <td>does not exist in Revolution, use [CMPs](developing-in-modx/advanced-development/custom-manager-pages "Custom Manager Pages")</td> <td> </td> </tr><tr><td>**_Content Tags_** </td> <td> </td> <td> </td> <td> </td> <td> </td> </tr><tr><td>Placeholders</td> <td>\[+_placeholder_+\]   
</td> <td> </td> <td>\[\[+_placeholder_\]\]</td> <td>\[\[+modx.user.id\]\]   
</td> </tr><tr><td>[Links](making-sites-with-modx/structuring-your-site/resources "Resources") </td> <td>\[~_link_~\]</td> <td> </td> <td>\[\[~_link_\]\]</td> <td>\[\[~\[\[\*id\]\]? &scheme=`full`\]\]   
</td> </tr><tr><td>[System Settings](administering-your-site/settings/system-settings "System Settings") </td> <td>\[(_system\_setting_)\]</td> <td> </td> <td>\[\[++_system\_setting_\]\]</td> <td>\[\[++site\_start\]\]   
</td> </tr><tr><td>[Language](developing-in-modx/advanced-development/internationalization "Internationalization") </td> <td>no tag representation</td> <td> </td> <td>\[\[%_language\_string\_key_\]\]</td> <td>\[\[%LanguageStringKey? &language=`en` &namespace=`NameSpaceName` &topic=`TopicName`\]\]</td> </tr><tr><td>Comment (see note below)   
</td> <td> </td> <td> </td> <td>\[\[-this is a comment\]\]   
</td> <td> </td></tr></tbody></table>Adopting this simplified format allows the new parser to be fully-recursive, following a source-order mechanism that does not depend on regular expressions.

Previously, each tag set was parsed independently in a specific order, one level at a time, with any embedded tags delayed until the next pass. Now tags are parsed as they are encountered regardless of the element types they represent, and embedded tags are parsed before the outer tag to allow much more complex tags to be composed. Combined with the ability to use the previously reserved ? & and = symbols in tag strings (when escaped by the infamous backtick, e.g. `&param=`?=&is ok now, wow!?&=``), MODx Content Tags offer a powerful new set of capabilities for mashing up your content.

### Comment tags

[This discussion on the forums](http://modxcms.com/forums/index.php/topic,49368.0.html) shows that some people feel the need for a comments tag. The default behavior when encountering a tag that represents an element that does not exist, is to silently discard the tag completely. Utilizing this behavior you can add comments throughout your templates, chunks and content and none of it would be visible on the front-end.

As of MODX Revolution 2.2 any tag found that starts with a dash (-) is ignored by the parser, and any tags it includes will be silently discarded. Before that, you can use the same however any tags within the comment would be parsed and it would be a tad more resource intensive to do so.

```
<pre class="brush: php"> [[- This is a comment, and will be removed from the output. ]]

```Structure of a Tag
------------------

A tag can contain many sub-parts within it. Below is illustrated on multiple lines a tag broken down into each part and explained:

**\[\[** _(opening tags)_   
**!** _(optional non-cacheable flag)_   
**elementToken** _(optional token identifying the element type if it's not a snippet, $=chunk, \*=resource field/tv, +=placeholder, etc.)_   
**elementName**   
**@propertyset** _(optional PropertySet identifier)_   
**:filterName=`modifier`**:... _(optional one or more output filters)_   
**?** _(required if properties follow, indicates beginning of property string; optional otherwise)_   
**&propertyName=`propertyValue`** &... _(optional; any additional properties separated by &)_   
**\]\]** _(closing tags)_

Put these all together, and a tag with all valid parts might look like this:

```
<pre class="brush: php">[[MySnippet@myPropSet:filter1:filter2=`modifier`? &prop1=`x` &prop2=`y`]]

```Note that tags can occur either on one line, or spread out across many lines. Both of these are acceptable:

```
<pre class="brush: php">[[!getResources? &parents=`123` &limit=`5`]]

[[!getResources?
  &parents=`123`
  &limit=`5`
]]

```<div class="tip">**Take it Easy**   
 Just because you _can_ use complex conditional filters in MODX does not mean that you _should_. Unlike PHP, when you have invalid MODX tag syntax, there are no helpful messages with line numbers telling you where something went wrong. Having tags that require debugging defeats the purpose of having a clean view layer: keep 'em clean and simple. A good rule-of-thumb is that your tags should fit onto one line (even if you spread them out for readability). If you are relying on if-statements and other conditionals in your template tags, then you might need rethink how you're building your pages.

</div>Properties
----------

All MODX Revo tags can accept properties (not just Snippets). For example, let's say we had a Chunk named 'Hello' with the content:

```
<pre class="brush: php">Hello [[+name]]!

```You'll note the new placeholder syntax. So, we'll definitely want to parse that Chunk's property. In Evolution, you would need to do this with a Snippet; no longer. You can simply pass a property for the Chunk:

```
<pre class="brush: php">[[$Hello?name=`George`]]

```This would output:

```
<pre class="brush: php">Hello George!

```The syntax for properties follows the same syntax as 096/Evolution snippet properties.

Caching
-------

In Evolution, Snippets that need to be processed with each request should be on an uncached page or the Snippet itself should be called uncached: \[!snippet!\]

In Revolution, any tag can be called uncached by inserting an exclamation point immediately after the double-bracket: \[\[!snippet\]\], \[\[!$chunk\]\], \[\[!+placeholder\]\], \[\[!\*template\_var\]\], etc.

?

<div class="info">If you have some kind of advanced setup in which the site\_url setting is being set per request, but your \[\[~\[\[\*id\]\]\]\] links are not being generated properly, remember that any tag can be called uncached, including the link or anchor tag: \[\[!~\[\[\*id\]\]\]\]

However, you will only need that when the site\_url is set dynamically and can differ per request. Any normal usage can be cached.

</div>### Parsing Order

If you call an uncached Snippet, it will be executed last in the parsing order.

If you have cached placeholders below that, they will be evaluated before that Snippet is executed - meaning they'll get the last value that was stored in the cache by that Snippet previously (or empty, if not set yet).

If you want to call a Snippet uncached that sets placeholders, you need to make sure the placeholders are set to uncached as well:

```
<pre class="brush: php">[[!Profile]]
Hello [[!+username]],

```Timing
------

There are several timing tags in MODX:

- **\[^qt^\]** - Query Time - Shows how long MODx took talking to the database
- **\[^q^\]** - Query Count -Shows how many database queries MODX made
- **\[^p^\]** - Parse Time - Shows how long MODX took to parse the page
- **\[^t^\]** - Total Time - Shows the total time taken to parse/ render the page
- **\[^s^\]** - Source - Shows the source of page, whether is database or cache.

For example, for this page, MySQL queries took 0.0000 seconds for 0 queries(s), document parsing took 0.3043 seconds, for a total time of 0.3043 seconds, and retrieved from cache.

### Additional Help

Because the tag syntax is problematic for many newcomers, there are tools available to help highlight problems. Check out the [SyntaxChecker](http://modx.com/extras/package/syntaxchecker) plugin.