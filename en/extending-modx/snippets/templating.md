---
title: "Templating"
_old_id: "306"
_old_uri: "2.x/developing-in-modx/basic-development/snippets/templating-your-snippets"
---

## Templating Snippets

Never write HTML directly in a Snippet; template the HTML into Chunks.

### Our Initial Snippet

Take this task: iterate over the published, non-deleted children of resource 390, sorted by menuindex, and output each as an LI tag with its pagetitle and a link.

Create a snippet called 'ResourceLister' with this code:

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

It works, but the HTML sits inline in the Snippet, so users cannot change the markup.

### Templating the Snippet

First off, let's create a chunk that we'll use for each item in the result set. Call it "ResourceItem", and make this its content:

``` php
<li><a href="[[~[[+id]]]]">[[+pagetitle]]</a></li>
```

Any Resource field is available as a placeholder, and here we use only the ID and pagetitle; `[[~` turns the value passed in `[[+id]]` into a link. Now add a default property to the snippet, called 'tpl', to the top of our snippet code:

``` php
$tpl = $modx->getOption('tpl',$scriptProperties,'ResourceItem');
```

`$scriptProperties` holds every property of the Snippet call; if the call has no `&tpl`, getOption falls back to the 'ResourceItem' Chunk we just made.

And then, change the foreach loop in the Snippet to this:

``` php
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $output .= $modx->getChunk($tpl,$resourceArray);
}
```

toArray() converts the modResource object into a `field => value` array, and `getChunk()` parses the Chunk with that array as properties: MODX replaces the placeholders and returns the content.

An alternative and slightly faster (especially helpful when looping through a big xPDO result) but also a bit longer way to do the same would be

``` php
// first get the template chunk in a variable
$tpl = $modx->getParser()->getElement('modChunk', 'chunkName');
$tpl->setCacheable(false);

// now loop trough the result collection
foreach ($resources as $resource) {
   $resourceArray = $resource->toArray();
   $output .= $tpl->process($resourceArray);
}
```

Note that `$tpl->setCacheable(false)` is what allows the chunk to be re-processed for each row — with caching left on, later iterations would reuse the first result.

Users can now override the Chunk for each Resource:

``` php
[[!ResourceLister? &tpl=`MyOwnChunk`]]
```

The available placeholders depend on the array passed to `getChunk()` or `$tpl->process()`. Here they are the default Resource fields — no TVs — such as `[[+pagetitle]]`, `[[+id]]` and `[[+content]]`.

### Adding A Row Class

Let the caller set a CSS class per row without writing their own Chunk. Add a default property 'rowCls' to the snippet code at the top, below the first getOption call:

``` php
$rowCls = $modx->getOption('rowCls',$scriptProperties,'resource-item');
```

Edit the ResourceItem chunk to use it:

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

The value goes into `$resourceArray` explicitly because rowCls was read once with getOption and does not vary per row.

### Passing a Custom ID

Let the caller choose the parent resource. Add a default property 'id' to the snippet code at the top, below the other getOption calls:

``` php
$id = (int)$modx->getOption('id',$scriptProperties,390);
```

The property defaults to 390 and can be overridden in the call (`&id=\`123\``). Change the getChildIds line to use it:

``` php
$children = $modx->getChildIds($id);
```

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
    $resourceArray['rowCls'] = $rowCls;
    $output .= $modx->getChunk($tpl,$resourceArray);
}
return $output;
```

## See Also

1. [How to Write a Good Snippet](extending-modx/snippets/good-snippet)
2. [Adding CSS and JS to Your Pages Through Snippets](extending-modx/snippets/register-assets)
3. [How to Write a Good Chunk](extending-modx/snippets/good-chunk)
