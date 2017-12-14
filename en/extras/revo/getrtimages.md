---
title: "getRTImages"
_old_id: "1697"
_old_uri: "revo/getrtimages"
---

The Basics
----------

1. Setup a Rich Text TV
2. Install getRTImages via Package Management
3. Call the Snippet
4. Template the output with a Chunk
5. Content Editors can upload an arbitrary number of images using whichever Rich Text Editor you have installed, and they will be displayed accordingly. It doesn't matter if they put bad markup in the TV, only img elements are extracted.

Use Case
--------

 This is best suited for simple slideshows. Images can be managed on a per-resource basis, with a UI that is already familiar to content authors and end users - the Rich Text Editor.

 There are, of course, many free and premium gallery Extras that can do a whole lot more, but often they're "too much". MIGX is the usual go-to for this use case, but that takes a bit of setup, and if you're trying to teach someone else how to setup a slideshow, the getRTImages method is incredibly easy to teach. It's also cleaner in the Resource Tree, versus using nested Resources to manage images...and frankly that's not really what Resources were intended to be used for.

 In the end, this is only one of many slideshow & gallery management options in MODX, so you have the freedom to choose the one most appropriate for your circumstances.

How To Use
----------

### **Examples**

#### Snippet Call:

 ```

[[getRTImages? &tv=`rich_text_TV` &tpl=`image_list_tpl`]]

``` This would extract all html img elements, grab the "src", "alt", "title", and "data-index" attributes and make them available as placeholders in the &tpl Chunk. Up to 10 images will be returned by default, but that can be modified using the &limit property.

#### Template Chunk:

 ```

<li><a href="[[+src]]" title="[[+title]]"><img src="[[+src]]" alt="[[+alt]]"></a></li>

```### **Available Placeholders**

 <table><tbody><tr><td> \[\[+src\]\] </td> <td> The "src" attribute of the img element. </td> </tr><tr><td> \[\[+alt\]\] </td> <td> The "alt" attribute... </td> </tr><tr><td> \[\[+title\]\] </td> <td> The "title" attribute... </td> </tr><tr><td> \[\[+index\]\] </td> <td> The value from the attribute defined in the "indexAttr" property. </td></tr></tbody></table>### **Properties**

 <table><thead><tr><th> Property </th> <th> Description </th> <th> Required? </th> <th> Default </th> </tr></thead><tbody><tr><td> **&id** </td> <td> ID of the Resource from which to get the TV value. </td> <td> Yes </td> <td> Current Resource: \[\[\*id\]\] </td> </tr><tr><td>  **&tv**  </td> <td> Name of TV from which to extract images. </td> <td> Yes </td> <td> null (snippet will return nothing if not set) </td> </tr><tr><td>  **&tpl**  </td> <td> Name of Chunk to use as output template. </td> <td> No </td> <td> null (snippet will print an array of results) </td> </tr><tr><td>  **&outputSeparator**  </td> <td> Separate each result with this character/string. </td> <td> No </td> <td> PHP\_EOL </td> </tr><tr><td>  **&sort**  </td> <td> Method by which to sort results. See below for details. </td> <td> No </td> <td> ASC (php asort function) </td> </tr><tr><td>  **&indexAttr**  </td> <td> Attribute from which to get the value for the index array key. </td> <td> No </td> <td> data-index </td> </tr><tr><td>  **&limit**  </td> <td> Limits output to this number of results. Note: if dumping to array this property is ignored. </td> <td> No </td> <td> 10 </td></tr></tbody></table>#### Sort Options

 <table><thead><tr><th> Property Value </th> <th> PHP function </th> <th> Behaviour </th> </tr></thead><tbody><tr><td> 'ASC' </td> <td> asort() </td> <td> The position of the elements in the array seems to affect priority of sorting using this method. As such, values are prioritized in this order: index, src, alt, title. Which means, when the "indexAttr" property is defined, and there are values in those attributes, those values will act as a "sort order index". This gives the end user or content author control over sorting by adding incremental values to the "data-index" attribute, for example. </td> </tr><tr><td> 'DESC' </td> <td> arsort() </td> <td> Same as above but in reverse order. </td> </tr><tr><td> 'natural' </td> <td> natsort() </td> <td> Although this is meant to sort items the way a human would do it, using it on an array (like we are) has unexpected results. This feature is experimental at best. </td> </tr><tr><td> 'RAND' or 'random' </td> <td> shuffle() </td> <td> Random sorting. </td> </tr><tr><td> '0' or null </td> <td> DOM ordering </td> <td> This will return results in the same order in which they appear in the source html. This is also an easy, intuitive way to give end users control over sort order. </td></tr></tbody></table>Additional Resources
--------------------

- [MODX Extras Repo](http://modx.com/extras/package/getrtimages)
- [getRTImages blog post](http://www.sepiariver.ca/blog/modx-web/getrtimages-list-and-sort-images-from-rich-text-field)
- [GitHub repo](https://github.com/sepiariver/getRTImages/)
- [More information on PHP array sorting](http://php.net/manual/en/array.sorting.php)