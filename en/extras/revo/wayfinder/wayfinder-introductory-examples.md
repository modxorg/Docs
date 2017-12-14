---
title: "Wayfinder Introductory Examples"
_old_id: "735"
_old_uri: "revo/wayfinder/wayfinder-introductory-examples"
---

Wayfinder is easily one of the single most important Snippets for your MODx site because nearly **every** site will use menus.

<div>- [Before You Start](#WayfinderIntroductoryExamples-BeforeYouStart)
  - [Diagram](#WayfinderIntroductoryExamples-Diagram)
  - [To Aid your Memory](#WayfinderIntroductoryExamples-ToAidyourMemory)
      - [List Chunks](#WayfinderIntroductoryExamples-ListChunks)
      - [List Item Chunks](#WayfinderIntroductoryExamples-ListItemChunks)
- [Basic Usage](#WayfinderIntroductoryExamples-BasicUsage)
  - [Snippet call:](#WayfinderIntroductoryExamples-Snippetcall%3A)
  - [Output example:](#WayfinderIntroductoryExamples-Outputexample%3A)
- [Formatting each Link: rowTpl](#WayfinderIntroductoryExamples-FormattingeachLink%3ArowTpl)
  - [Output Example:](#WayfinderIntroductoryExamples-OutputExample%3A)
- [Outer Wrapper: formatting the `<ul>`](#WayfinderIntroductoryExamples-OuterWrapper%3Aformattingthe%7B%7B%3Cul%3E%7D%7D)
  - [Sample output:](#WayfinderIntroductoryExamples-Sampleoutput%3A)
- [ParentRow: Special formatting for the parent folder items](#WayfinderIntroductoryExamples-ParentRow%3ASpecialformattingfortheparentfolderitems)
  - [Sample Snippet Call:](#WayfinderIntroductoryExamples-SampleSnippetCall%3A)
  - [Sample Output:](#WayfinderIntroductoryExamples-SampleOutput%3A)
- [innerTpl](#WayfinderIntroductoryExamples-innerTpl)
  - [Sample Output:](#WayfinderIntroductoryExamples-SampleOutput%3A)
- [innerRowTpl](#WayfinderIntroductoryExamples-innerRowTpl)
  - [Snippet Call](#WayfinderIntroductoryExamples-SnippetCall)
  - [Sample Output](#WayfinderIntroductoryExamples-SampleOutput)
- [Setting classes](#WayfinderIntroductoryExamples-Settingclasses)
  - [Snippet Call](#WayfinderIntroductoryExamples-SnippetCall)
  - [Sample Output](#WayfinderIntroductoryExamples-SampleOutput)
- [Conclusion](#WayfinderIntroductoryExamples-Conclusion)

</div>Before You Start
----------------

For the following examples, we will be referring to the following sample resources:

![](/download/attachments/35095352/MODx+Resources.jpg?version=1&modificationDate=1307535321000)

### Diagram

Here is a graphical representation of the various formatting chunks we covered in these examples:

<span class="image-wrap" style="display: block; text-align: center">![](/download/attachments/35095352/WF+Regions.png?version=1&modificationDate=1307535321000)</span>

This may seem complex at first glance, but if you refer back to this diagram as you read through the below examples, it should help make things clear.

### To Aid your Memory

It's good to explain right up front that Wayfinder's formatting properties come in 2 flavors: those that are meant to format _LISTS_ and those that are meant to format _LIST ITEMS_.

#### List Chunks

Here are parameters that should reference chunks that contain some variant of a _LIST_, or a container of items:

- **&outerTpl**
- **&innerTpl**

#### List Item Chunks

Here are parameters that should reference chunks that contain some variant of an _ITEM_:

- **&rowTpl**
- **&innerRowTpl**
- **&parentRowTpl**

<div class="info">**Know Thy Chunks**  
This gets much easier once you understand which parameters should reference lists and which parameters should reference items.</div>Basic Usage
-----------

The simplest WayFinder call uses built-in formatting:

### Snippet call:

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` ]]

```### Output example:

```
<pre class="brush: php">
<ul>
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <li><a href="media-hub/blog/" title="HG Blog" >HG Blog</a>

                <ul>
                        <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section" >Blog Test Section</a>

                                <ul>
                                        <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                        <li><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                        <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                                </ul>

                        </li>
                        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
                </ul>

        </li>
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```You can see how the default behavior here nests unordered lists. Not too bad for a Snippet call that requires only a single parameter.

Formatting each Link: rowTpl
----------------------------

Next, we can specify verbatim how we want to format each link by setting the &rowTpl parameter as in the following Snippet call:

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl`]]

```We set our "rowTpl" Chunk to look like this:

```
<pre class="brush: php">
<!-- rowTpl -->
<li[[+wf.id]][[+wf.classes]]>
<a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>
[[+wf.wrapper]]
</li>

```### Output Example:

```
<pre class="brush: php">
<ul>
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/blog/" title="HG Blog" >HG Blog</a>

        <ul>
                <!-- rowTpl -->
                <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section" >Blog Test Section</a>

                        <ul>
                                <!-- rowTpl -->
                                <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                <!-- rowTpl -->
                                <li><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                <!-- rowTpl -->
                                <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                        </ul>

                </li>
                <!-- rowTpl -->
                <li class="last"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```See how it's basically the same thing, except this time we have explicit control over the formatting of each item?   
We also included a comment in our chunk so it was clear how the output is iterated.

Outer Wrapper: formatting the `<ul>`
------------------------------------

Next, we will explicitly format the outer unordered-lists <ul> by setting the **&outerTpl** parameter.

Here's out sample Snippet call:

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl`]]

```And here's our new Chunk "outerTpl":

```
<pre class="brush: php">
<!-- outerTpl -->
<ul id="topnav"[[+wf.classes]]>
[[+wf.wrapper]]
</ul>

```### Sample output:

```
<pre class="brush: php">
<!-- outerTpl -->
<ul class="topnav">
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/blog/" title="HG Blog" >HG Blog</a>

        <!-- outerTpl -->
        <ul class="topnav">
                <!-- rowTpl -->
                <li class="first"><a href="media-hub/blog/test-section/" title="Blog Test Section" >Blog Test Section</a>

                        <!-- outerTpl -->
                        <ul class="topnav">
                                <!-- rowTpl -->
                                <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                <!-- rowTpl -->
                                <li><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                <!-- rowTpl -->
                                <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                        </ul>

                </li>
                <!-- rowTpl -->
                <li class="last"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
        </ul>

        </li>
        <!-- rowTpl -->
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```So we now have control over each item and over the format of the <ul> for each list.

<div class="warning">Be careful: contrary to what you might think given its name, the **outerTpl** does not necessarily format only the final outer-most wrapper, it formats _EACH_ group of items that contains children _unless an_ **_innerTpl_** _Chunk is specified!_If you want the more "expected" behavior where the **outerTpl** is used to format only the outer-most group, then you must explicitly specify the "innerTpl" parameter (see below).

</div>One takeaway here is DO NOT use a CSS id inside your **outerTpl** because you might end up having multiple instances of the same ID on the page.

Did you notice how in our **outerTpl** we explicitly set the CSS class? You don't necessarily need to do that: **Wayfinder** includes parameters that allow you to set the CSS classes used by many of the component chunks (more on that in a bit).

ParentRow: Special formatting for the parent folder items
---------------------------------------------------------

This time around we are going to specify a different formatting chunk for the items that are folders with children (i.e. "containers" as the documentation calls them). In our example image, this applies to the "HG Blog (59)" and to the "Blog Test Section (100)" pages.

### Sample Snippet Call:

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow`]]

```Here's what we have in our "parentRow" Chunk:

```
<pre class="brush: php">
<!-- ParentRow -->
<li>
<a href="[[+wf.link]]">[[+wf.linktext]]</a> - [[+wf.description]]
[[+wf.wrapper]]
</li>

```### Sample Output:

And here is our sample output.

```
<pre class="brush: php">
<!-- outerTpl -->
<ul class="topnav">
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- ParentRow -->
        <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

                <!-- outerTpl -->
                <ul class="topnav">
                        <!-- ParentRow -->
                        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

                                <!-- outerTpl -->
                                <ul class="topnav">
                                        <!-- rowTpl -->
                                        <li class="first">
                                        <a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                        <!-- rowTpl -->
                                        <li><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                        <!-- rowTpl -->
                                        <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                                </ul>

                        </li>
                        <!-- rowTpl -->
                        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
                </ul>

        </li>
        <!-- rowTpl -->
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```If we had omitted the **&parentRowTpl** parameter, the **&rowTpl** Chunk would have been used instead, and the output would have been identical to one of our previous examples.

innerTpl
--------

Before we noticed how the outerTpl parameter is used to format the outer-most group   
AND any other group of items. It basically is used as the <ul> container to wrap   
the various list items. But it's pretty common that you'd want the outer-most <ul>   
to use different formatting than the various <ul>'s that contain the sub-items.

That's when we can use the &innerTpl.

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow` &innerTpl=`innerTpl`]]

```### Sample Output:

```
<pre class="brush: php">
<!-- outerTpl -->
<ul class="topnav">
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- ParentRow -->
        <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

                <!-- innerTpl: outerTpl is used if this is not specified -->
                <ul class="topnav">
                        <!-- ParentRow -->
                        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

                                <!-- innerTpl: outerTpl is used if this is not specified -->
                                <ul class="topnav">
                                        <!-- rowTpl -->
                                        <li class="first"><a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                        <!-- rowTpl -->
                                        <li><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                        <!-- rowTpl -->
                                        <li class="last"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                                </ul>

                        </li>
                        <!-- rowTpl -->
                        <li class="last"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
                </ul>

        </li>
        <!-- rowTpl -->
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```innerRowTpl
-----------

The last remaining formatting bit is to distinguish between the top-level items and the ones buried deeper in a sub-menu.

This Chunk is a variation of the basic **&rowTpl**. Here's what we have for our "innerRowTpl":

```
<pre class="brush: php">
<!-- innerRowTpl -->
<li><a href="[[+wf.link]]">[[+wf.linktext]]</a>[[+wf.wrapper]]</li>

```### Snippet Call

Here's what our Snippet call looks like:

```
<pre class="brush: php">
[[Wayfinder? &startId=`55` &rowTpl=`rowTpl` &outerTpl=`outerTpl` &parentRowTpl=`parentRow` &innerTpl=`innerTpl` &innerRowTpl=`innerRowTpl`]]

```### Sample Output

And here's the outputed HTML:

```
<pre class="brush: php">
<!-- outerTpl -->
<ul class="topnav">
        <!-- rowTpl -->
        <li class="first"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- ParentRow -->
        <li><a href="media-hub/blog/">HG Blog</a> - HG Blog

                <!-- innerTpl: outerTpl is used if this is not specified -->
                <ul class="topnav">
                        <!-- ParentRow -->
                        <li><a href="media-hub/blog/test-section/">Blog Test Section</a> -

                        <!-- innerTpl: outerTpl is used if this is not specified -->
                        <ul class="topnav">
                                <!-- innerRowTpl -->
                                <li><a href="media-hub/blog/test-section/test-post">Test Post</a></li>
                                <!-- innerRowTpl -->
                                <li><a href="media-hub/blog/test-section/other-post">Other Post</a></li>
                                <!-- innerRowTpl -->
                                <li><a href="media-hub/blog/test-section/third-post">Third Post</a></li>
                        </ul>

                        </li>
                        <!-- innerRowTpl -->
                        <li><a href="media-hub/blog/archives">Archives</a></li>

                </ul>
        </li>
        <!-- rowTpl -->
        <li><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="last"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```In other words, the top level pages (56, 57, 58, 60, 61, 62) use the standard **&rowTpl**, and all pages in sub-folders   
use the &innerRowTpl.

Setting classes
---------------

Before you go too far down the rabbit hole, let's quickly demonstrate how you can   
use some of the other available parameters to affect the final output. You may not need to come up with a zillion different Chunks to format your output. See in our   
examples how the first and last row items have custom CSS classes added? These   
are intelligently added to the `[``<span class="error">[+wf.attributes]</span>``]` placeholder inside of our "rowTpl":

```
<pre class="brush: php">
<!-- rowTpl -->
<li[[+wf.id]][[+wf.classes]]>
<a href="[[+wf.link]]" title="[[+wf.title]]" [[+wf.attributes]]>[[+wf.linktext]]</a>
[[+wf.wrapper]]
</li>

```We are going to set the following parameters so you can see how it affects the final output:

- &firstClass
- &lastClass
- &rowClass
- &outerClass

### Snippet Call

Our adjust Wayfinder Snippet call looks like this:

```
<pre class="brush: php">
[[!Wayfinder? &startId=`55`
&rowTpl=`rowTpl`
&outerTpl=`outerTpl`
&firstClass=`my_first_class`
&lastClass=`my_last_class`
&rowClass=`my_row_class`
&outerClass=`my_outer_class`
]]

```### Sample Output

And here's what our sample output looks like:

```
<pre class="brush: php">
<!-- outerTpl -->
<ul id="topnav" class="my_outer_class">
        <!-- rowTpl -->
        <li class="my_row_class my_first_class"><a href="media-hub/news" title="HG in the News" >HG in the News</a></li>
        <!-- rowTpl -->
        <li class="my_row_class"><a href="media-hub/events" title="HG Events" >HG Events</a></li>
        <!-- rowTpl -->
        <li class="my_row_class"><a href="media-hub/press" title="Press Releases" >Press Releases</a></li>
        <!-- rowTpl -->
        <li class="my_row_class"><a href="media-hub/blog/" title="HG Blog" >HG Blog</a>

                <!-- outerTpl -->
                <ul id="topnav">
                        <!-- rowTpl -->
                        <li class="my_row_class my_first_class">
                                <a href="media-hub/blog/test-section/" title="Blog Test Section" >Blog Test Section</a>

                                <!-- outerTpl -->
                                <ul id="topnav">
                                        <!-- rowTpl -->
                                        <li class="my_row_class my_first_class"><a href="media-hub/blog/test-section/test-post" title="Test Post" >Test Post</a></li>
                                        <!-- rowTpl -->
                                        <li class="my_row_class"><a href="media-hub/blog/test-section/other-post" title="Other Post" >Other Post</a></li>
                                        <!-- rowTpl -->
                                        <li class="my_row_class my_last_class"><a href="media-hub/blog/test-section/third-post" title="Third Post" >Third Post</a></li>
                                </ul>
                        </li>

                        <!-- rowTpl -->
                        <li class="my_row_class my_last_class"><a href="media-hub/blog/archives" title="Blog Archives" >Archives</a></li>
                </ul>
        </li>
        <!-- rowTpl -->
        <li class="my_row_class"><a href="media-hub/fast-facts" title="HG Fast Facts" >HG Fast Facts</a></li>
        <!-- rowTpl -->
        <li class="my_row_class"><a href="media-hub/publications" title="HG Publications" >HG Publications</a></li>
        <!-- rowTpl -->
        <li class="my_row_class my_last_class"><a href="media-hub/media-contact" title="Media Contact" >Media Contact</a></li>
</ul>

```Notice how the first and last links got two classes? The "my\_row\_class" is added to **all** rows, and the first and last items get the "my\_first\_class" or "my\_last\_class" respectively in addition to the "my\_row\_class".

Remember: if you want to take advantage of these parameters, make sure you include   
the `[[+wf.attributes]]` placeholder inside your Chunks!!!

Conclusion
----------

Hopefully these illustrations have helped you understand how the various Chunks fit together to create a fully-customizable menu.