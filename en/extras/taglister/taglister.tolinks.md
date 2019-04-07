---
title: "tolinks"
_old_id: "1018"
_old_uri: "revo/taglister/taglister.tolinks"
---

## tolinks Snippet

Converts a delimited list into a list of linkable tags: typically, this would be used on a page that has been tagged with various taxonomical tags and you want to link to other pages that have been tagged by those same tags. For an example, see <http://modxcms.com/forums/index.php/topic,61744.0/topicseen.html>

## Usage

tolinks is called with the normal snippet tag, passing in an 'items' property as the list of items to convert; a 'target' property for the Resource to generate links to; and a 'key' property for the name of the GET param being generated on each link.

## Properties

| Name            | Example usage                    | Description                                                                            | Default Value |
| --------------- | -------------------------------- | -------------------------------------------------------------------------------------- | ------------- |
| items           | &items=`\[\[\*myTemplateVar\]\]` | The items to turn into links.                                                          |               |
| tpl             | &tpl=`linkTpl`                   | Name of a Chunk that will be used for each result.                                     | link          |
| target          | &target=`6`                      | The ID of the Resource that links will point to.                                       | 1             |
| inputDelim      | &inputDelim=`,`                  | The delimiter that is used on the items property. Defaults to a comma.                 | ,             |
| outputDelim     | &outputDelim=`,`                 | The delimiter that separates the links that are outputted. Defaults to a comma.        | ,             |
| tagRequestParam | &tagRequestParam=`tag`           | The REQUEST var key that will be used in generating the links.                         | tag           |
| cls             | &cls=`tagStyle`                  | Name of a CSS class to add to each result.                                             | tl-tag        |
| toPlaceholder   | &toPlaceholder=`placeholderName` | If set, will set the output of this snippet to this placeholder rather than output it. | false         |
| useTagsFurl     | &useTagsFurl=`1`                 | Is set to 1, this will force full links to each tag.                                   | false         |
| tagKey          | &tagKey=`articlestags`           | tag group name, used in generating links                                               | tags          |
| tagKeyVar       | &tagKeyVar=`MyCustomVar`         | sets the GET var key                                                                   |

 I.e., 
 \[\[tolinks? &tagKey=`articlestags` &tagKeyVar=`MyCustomVar`\]\] 

 outputs [http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag\\\\](http://f.qdn.com/somepage?MyCustomVar=articlestags&tag=theTag%5C) | key |

## tolinks Chunks

There is 1 chunk that is processed in tolinks. Its corresponding parameters are:

- [tpl](extras/taglister/taglister.tolinks/taglister.tolinks.tpl "tagLister.tolinks.tpl") - The Chunk to use for each link generated.

## Examples

Change the TV value of 'tags' into links that point to the URL of Resource 123 with the GET param of 'tag':

``` php
[[!tolinks? &items=`[[*tags]]` &key=`tag` &target=`123`]]

```

**Be Careful**
**toLinks** will generate _relative_ URLs to the resource indicated by the **&target** parameter, so if you are having trouble getting the links to point to the correct URL, add a Chunk containing something like the following for use by the **&tpl** parameter: [\[\[+item\]\]]([[++site_url]][[+url]])

Alternatively, set the **&useTagsFurl** property.

The resource ID referenced by the **&target** parameter should contain something like the following that lists the posts tagged:

``` php
[[!getResourcesTag?
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
```

## See Also

1. [tagLister.getResourcesTag](extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](extras/taglister/taglister.taglister)
     1. [tagLister.tagLister.all](extras/taglister/taglister.taglister/taglister.taglister.all)
     2. [tagLister.tagLister.tpl](extras/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](extras/taglister/taglister.tolinks)
     1. [tagLister.tolinks.tpl](extras/taglister/taglister.tolinks/taglister.tolinks.tpl)