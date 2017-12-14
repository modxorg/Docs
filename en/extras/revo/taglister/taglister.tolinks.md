---
title: "tagLister.tolinks"
_old_id: "1018"
_old_uri: "revo/taglister/taglister.tolinks"
---

tolinks Snippet
---------------

Converts a delimited list into a list of linkable tags: typically, this would be used on a page that has been tagged with various taxonomical tags and you want to link to other pages that have been tagged by those same tags. For an example, see <http://modxcms.com/forums/index.php/topic,61744.0/topicseen.html>

Usage
-----

tolinks is called with the normal snippet tag, passing in an 'items' property as the list of items to convert; a 'target' property for the Resource to generate links to; and a 'key' property for the name of the GET param being generated on each link.

Properties
----------

<table><tbody><tr><th>Name</th> <th>Example usage   
</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>items</td> <td>&items=`\[\[\*myTemplateVar\]\]`   
</td> <td>The items to turn into links.</td> <td> </td> </tr><tr><td>tpl</td> <td>&tpl=`linkTpl`</td> <td>Name of a Chunk that will be used for each result.</td> <td>link</td> </tr><tr><td>target</td> <td>&target=`6`   
</td> <td>The ID of the Resource that links will point to.</td> <td>1</td> </tr><tr><td>inputDelim</td> <td>&inputDelim=`,`</td> <td>The delimiter that is used on the items property. Defaults to a comma.</td> <td>,</td> </tr><tr><td>outputDelim</td> <td>&outputDelim=`,`</td> <td>The delimiter that separates the links that are outputted. Defaults to a comma.</td> <td>,</td> </tr><tr><td>tagRequestParam</td> <td>&tagRequestParam=`tag`</td> <td>The REQUEST var key that will be used in generating the links.</td> <td>tag</td> </tr><tr><td>cls</td> <td>&cls=`tagStyle`   
</td> <td>Name of a CSS class to add to each result.</td> <td>tl-tag</td> </tr><tr><td>toPlaceholder</td> <td>&toPlaceholder=`placeholderName`</td> <td>If set, will set the output of this snippet to this placeholder rather than output it.</td> <td>false</td> </tr><tr><td>useTagsFurl</td> <td>&useTagsFurl=`1`</td> <td>Is set to 1, this will force full links to each tag.</td> <td>false   
</td> </tr><tr><td>tagKey   
</td> <td>&tagKey=`articlestags`</td> <td>tag group name, used in generating links   
</td> <td>tags   
</td> </tr><tr><td>tagKeyVar</td> <td>&tagKeyVar=`MyCustomVar`   
  
</td> <td>sets the GET var key   
  
 I.e.,   
 \[\[tolinks? &tagKey=`articlestags` &tagKeyVar=`MyCustomVar`\]\]   
  
 outputs [http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag\\\\](http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag%5C)</td> <td>key</td></tr></tbody></table>tolinks Chunks
--------------

There is 1 chunk that is processed in tolinks. Its corresponding parameters are:

- [tpl](/extras/revo/taglister/taglister.tolinks/taglister.tolinks.tpl "tagLister.tolinks.tpl") - The Chunk to use for each link generated.

Examples
--------

Change the TV value of 'tags' into links that point to the URL of Resource 123 with the GET param of 'tag':

```
<pre class="brush: php">[[!tolinks? &items=`[[*tags]]` &key=`tag` &target=`123`]]

```<div class="warning">**Be Careful**   
**toLinks** will generate _relative_ URLs to the resource indicated by the **&target** parameter, so if you are having trouble getting the links to point to the correct URL, add a Chunk containing something like the following for use by the **&tpl** parameter: [\[\[+item\]\]]([[++site_url]][[+url]])

Alternatively, set the **&useTagsFurl** property.

</div>The resource ID referenced by the **&target** parameter should contain something like the following that lists the posts tagged:

```
<pre class="brush: php">[[!getResourcesTag?
 &element=`getResources`
 &elementClass=`modSnippet`
 &tpl=`blogPost`
 &hideContainers=`1`
 &pageVarKey=`page`
 &parents=`59`
 &includeTVs=`1`
 &includeContent=`1` ]]
 [[!+page.nav:notempty=`
    [[!+page.nav]]
 `]]

```See Also
--------

1. [tagLister.getResourcesTag](/extras/revo/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/revo/taglister/taglister.taglister)
  1. [tagLister.tagLister.all](/extras/revo/taglister/taglister.taglister/taglister.taglister.all)
  2. [tagLister.tagLister.tpl](/extras/revo/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/revo/taglister/taglister.tolinks)
  1. [tagLister.tolinks.tpl](/extras/revo/taglister/taglister.tolinks/taglister.tolinks.tpl)