---
title: "getRTImages"
_old_id: "1697"
_old_uri: "revo/getrtimages"
---

## The Basics

1. Setup a Rich Text TV
2. Install getRTImages via Package Management
3. Call the Snippet
4. Template the output with a Chunk
5. Content Editors can upload an arbitrary number of images using whichever Rich Text Editor you have installed, and they will be displayed accordingly. It doesn't matter if they put bad markup in the TV, only img elements are extracted.

## Use Case

This is best suited for simple slideshows. Images can be managed on a per-resource basis, with a UI that is already familiar to content authors and end users - the Rich Text Editor.

There are, of course, many free and premium gallery Extras that can do a whole lot more, but often they're "too much". MIGX is the usual go-to for this use case, but that takes a bit of setup, and if you're trying to teach someone else how to setup a slideshow, the getRTImages method is incredibly easy to teach. It's also cleaner in the Resource Tree, versus using nested Resources to manage images...and frankly that's not really what Resources were intended to be used for.

In the end, this is only one of many slideshow & gallery management options in MODX, so you have the freedom to choose the one most appropriate for your circumstances.

## How To Use

### **Examples**

#### Snippet Call

``` php
[[getRTImages? &tv=`rich_text_TV` &tpl=`image_list_tpl`]]
```

 This would extract all html img elements, grab the "src", "alt", "title", and "data-index" attributes and make them available as placeholders in the &tpl Chunk. Up to 10 images will be returned by default, but that can be modified using the &limit property.

#### Template Chunk

``` html
<li><a href="[[+src]]" title="[[+title]]"><img src="[[+src]]" alt="[[+alt]]"></a></li>
```

### **Available Placeholders**

| `[[+src]]`   | The "src" attribute of the img element.                           |
| ------------ | ----------------------------------------------------------------- |
| `[[+alt]]`   | The "alt" attribute...                                            |
| `[[+title]]` | The "title" attribute...                                          |
| `[[+index]]` | The value from the attribute defined in the "indexAttr" property. |

### **Properties**

| Property             | Description                                                                                  | Required? | Default                                       |
| -------------------- | -------------------------------------------------------------------------------------------- | --------- | --------------------------------------------- |
| **&id**              | ID of the Resource from which to get the TV value.                                           | Yes       | Current Resource: `[[*id]]`                   |
| **&tv**              | Name of TV from which to extract images.                                                     | Yes       | null (snippet will return nothing if not set) |
| **&tpl**             | Name of Chunk to use as output template.                                                     | No        | null (snippet will print an array of results) |
| **&outputSeparator** | Separate each result with this character/string.                                             | No        | PHP\_EOL                                      |
| **&sort**            | Method by which to sort results. See below for details.                                      | No        | ASC (php asort function)                      |
| **&indexAttr**       | Attribute from which to get the value for the index array key.                               | No        | data-index                                    |
| **&limit**           | Limits output to this number of results. Note: if dumping to array this property is ignored. | No        | 10                                            |

#### Sort Options

| Property Value     | PHP function | Behaviour                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| ------------------ | ------------ | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| 'ASC'              | asort()      | The position of the elements in the array seems to affect priority of sorting using this method. As such, values are prioritized in this order: index, src, alt, title. Which means, when the "indexAttr" property is defined, and there are values in those attributes, those values will act as a "sort order index". This gives the end user or content author control over sorting by adding incremental values to the "data-index" attribute, for example. |
| 'DESC'             | arsort()     | Same as above but in reverse order.                                                                                                                                                                                                                                                                                                                                                                                                                             |
| 'natural'          | natsort()    | Although this is meant to sort items the way a human would do it, using it on an array (like we are) has unexpected results. This feature is experimental at best.                                                                                                                                                                                                                                                                                              |
| 'RAND' or 'random' | shuffle()    | Random sorting.                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| '0' or null        | DOM ordering | This will return results in the same order in which they appear in the source html. This is also an easy, intuitive way to give end users control over sort order.                                                                                                                                                                                                                                                                                              |

## Additional Resources

- [MODX Extras Repo](https://modx.com/extras/package/getrtimages)
- [getRTImages blog post](http://www.sepiariver.ca/blog/modx-web/getrtimages-list-and-sort-images-from-rich-text-field)
- [GitHub repo](https://github.com/sepiariver/getRTImages/)
- [More information on PHP array sorting](http://php.net/manual/en/array.sorting.php)
