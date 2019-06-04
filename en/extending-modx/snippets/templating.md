---
title: "Templating"
_old_id: "306"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/templating-your-snippets"
---

## Templating Snippets

One of the best practices in Snippet design is to make sure that you never write HTML directly in the Snippet, but template out the HTML into Chunks. This tutorial shows you how to do that in a Snippet.

### Our Initial Snippet

Let's take a case scenario; say you want to iterate across the published, non-deleted Resources that are children of the Resource with ID 390, sorted by menuindex, and then output them as LI tags with the pagetitle and a link to click them.

Go ahead and create a snippet called 'ResourceLister', and put this inside:

``` php
/* first, build the query */
$c = $modx->newQuery('modResource');
/* we only want published and undeleted resources */
$c->where(array(
  'published' => true,
  'deleted' => false,
));
/* get all the children of ID 390 */
$children = $modx->getChildIds(390);
if (count($children) > 0) {
    $c->where(array(
        'id:IN' => $children,
    ));
}
/* sort by menuindex ascending */
$c->sortby('menuindex','ASC');
/* get the resources as xPDOObjects */
$resources = $modx->getCollection('modResource',$c);
$output = '';
foreach ($resources as $resource) {
   $output .= '<li><a href="'.$modx->makeUrl($resource->get('id')).'">'.$resource->get('pagetitle').'</a></li>';
}
return $output;
```

This does what we want, but puts the HTML inline. We don't want that. It doesn't let the user control the markup, or change it if they want to. We want more flexibility.

### Templating the Snippet

First off, let's create a chunk that we'll use for each item in the result set. Call it "ResourceItem", and make this its content:

``` php
<li><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

Basically, we make an LI tag, and put some placeholders were our content was. We have available any field in the Resource, and here we're just using the ID and pagetitle fields. The `[[~` tells MODX to make a link from the ID passed in the `[[+id]]` property. Now let's add a default property to the snippet, called 'tpl', to the top of our snippet code:

``` php
$tpl = $modx->getOption('tpl',$scriptProperties,'ResourceItem');
```

This gets us the &tpl= property from the Snippet call, since $scriptProperties just holds all the properties in the Snippet call. If 'tpl' doesn't exist, getOption defaults the value to ResourceItem (the Chunk we just made).

And then, change the foreach loop in the Snippet to this:

``` php
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $output .= $modx->getChunk($tpl,$resourceArray);
}
```

The code first turns the modResource object into an array of field=name pairs (ie, $resourceArray\['pagetitle'\] is the pagetitle) via the toArray() method. Then, we use $modx->getChunk() to pass our tpl Chunk and the resource array into it as properties. MODX parses the chunk, replaces the properties, and returns us some content.

An alternative and slightly faster (especially helpful when looping through a big xPDO result) but also a bit longer way to do the same would be

``` php
// first get the template chunk in a variable
$tpl = $this->modx->getParser()->getElement('modChunk', 'chunkName');
$tpl->setCacheable(false);

// now loop trough the result collection
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $tpl->_processed = false; // This line is important!
   $output .= $tpl->process($resourceArray);
}
```

Now the user can call the snippet this way to override the chunk for each Resource with this call:

``` php
[[!ResourceLister? &tpl=`MyOwnChunk`]]
```

Meaning they can template their results however they want - using LIs, or table rows, or whatever! You've now created a flexible, powerful snippet. The available placeholders depend on what array is passed to $modx->getChunk(); or $tpl->process() methods. In this example the available placeholders would be all default fields (no TVs!) of a resource like for example `[[+pagetitle]]`, `[[+id]]` or `[[+content]]`.

### Adding A Row Class

What if we want the user to be able to specify a CSS class for each LI row, but not have to make their own custom chunk? Simple, we just add a default property 'rowCls' to our snippet code at the top, below our first getOption call:

``` php
$rowCls = $modx->getOption('rowCls',$scriptProperties,'resource-item');
```

This tells MODX to default the &rowCls property for the snippet to 'resource-item'. Let's go edit our ResourceItem chunk:

``` php
<li class="[[+rowCls]]"><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

And finally, change our foreach loop to this:

``` php
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $resourceArray['rowCls'] = $rowCls;
   $output .= $modx->getChunk($tpl,$resourceArray);
}
```

Note how we're explicitly setting the 'rowCls' variable into our $resourceArray property array. We do this because we've already gotten the value of rowCls earlier in the snippet (with the getOption call), and we know that it's not going to vary per row.

### Passing a Custom ID

What if we want the user to be able to pass in what parent to grab resources from? Again, we just add a default property 'id' to our snippet code at the top, below our getOption calls:

``` php
$id = (int)$modx->getOption('id',$scriptProperties,390);
```

Basically, allow the user to override the parent ID for the Snippet - to say Resource 123, with an &id=`123` property - in their snippet call. But we want it to default to 390. And then we'll change the getChildIds line to this:

``` php
$children = $modx->getChildIds($id);
```

Obviously, you could add more options to this snippet, such as firstRowCls (for only the first row in the results), lastRowCls, firstRowTpl, sortBy, sortDir, limit, or anything else you could dream up. We could even make it so the 'published' filter is a property as well, or hide resources that are folders, etc. The important part is that now you have the general idea.

For reference, our final code looks like this:

``` php
$tpl = $modx->getOption('tpl',$scriptProperties,'ResourceItem');
$id = (int)$modx->getOption('id',$scriptProperties,390);
$rowCls = $modx->getOption('rowCls',$scriptProperties,'resource-item');
$c = $modx->newQuery('modResource');
$c->where(array(
  'published' => true,
  'deleted' => false,
));
$children = $modx->getChildIds($id);
if (count($children) > 0) {
    $c->where(array(
        'id:IN' => $children,
    ));
}
$c->sortby('menuindex','ASC');
$resources = $modx->getCollection('modResource',$c);
$output = '';
foreach ($resources as $resource) {
    $resourceArray = $resource->toArray();
    $resourceArray['cls'] = $rowCls;
    $output .= $modx->getChunk($tpl,$resourceArray);
}
return $output;
```

## See Also

1. [Templating Your Snippets](extending-modx/snippets/templating)
2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
3. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
4. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
