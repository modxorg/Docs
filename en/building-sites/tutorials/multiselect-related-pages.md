---
title: "Multi-select TV for related pages"
_old_id: "351"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/creating-a-multi-select-box-for-related-pages-in-your-template"
---

This brief tutorial will explain how you can make a client-proof "Related pages" template variable. This specific example will introduce you to several MODX subjects including writing custom [snippets](extending-modx/snippets "Snippets") and using [custom output modifiers](building-sites/tag-syntax/output-filters) "Input and Output Filters (Output Modifiers)"), however there are many different ways to achieve the same result. This tutorial will hopefully allow you to get a deeper understanding of several of the used concepts and help you further develop highly customizable content editing.

## Setting up the Template Variable

Of course we will need a Template Variable. In the Manager, navigate to the Elements tab in the navigation structure and click the icon with a TV on it, or right click on the Template Variables section to create a new template variable. Give it a suitable name and caption (this tutorial assumes relatedPages).

In this case we will want to be able of selecting multiple resources, so we're going to choose the input type "Listbox (multi-select)", however you could also use the Checkbox type without adjusting the rest of this tutorial if you would rather have a list of checkboxes.

Next link the Template Variable to the template that needs it on the "Template Access" tab, for example your blog item template.

To fill the template variable with some values, we will need to write simple snippet\* and run it in the Input Options field. To do this we will be using what is known as an [@BINDING](building-sites/elements/template-variables/bindings "Bindings"). Add the following code to the Input Options field:

``` php
 @SNIPPET listMyResources {"parent":"9"}
```

This makes use of the [@SNIPPET binding](building-sites/elements/template-variables/bindings/snippet-binding "SNIPPET Binding") to generate the input-options for that TV. This can be used to run MODX snippets. We pass the the snippet name as second and the properties as JSON to the third parameter. In this case we are telling it that "parent" is equal to 9.

You probably don't have a snippet called listMyResources yet, so let's create it.

\* You don't \*have\* to write a snippet, you could use getResources for it as well, but to introduce you to a number of interesting methods while we're at it you may want to write your own. .

## Creating the snippet

We will need to create a snippet that lists the appropriate resources, and in such a way that it makes sense to the TV input type. The Listbox will be expecting a string like the following:

> value1==name||value2==name2||lasteone==Last name?

The above consists of three key-value pairs, seperated by two pipes. The key and value are separated by two equal characters. So this is what we want the snippet to output as well.

Create a new snippet and name it listMyResources or whatever you put in the input options of the template variable. Let's start of by assigning the property expected (parent) to a variable.

``` php
$parent = $modx->getOption('parent',$scriptProperties,9);
```

This sets the variable $parent to the value of any "parent" property found. This can be from an assigned property set or inline properties like in our situation. The 9 in the end is the default value to be used if there is no value found.

``` php
$parentObj = $modx->getObject('modResource',$parent);
if (!($parentObj instanceof modResource)) { return ''; }
$resArray = $parentObj->getMany('Children');
```

Then we will get the Object (abstraction) of the parent resource using the getObject method and assign it to a variable named parentObj. We check if we are dealing with a proper resource (ie, the resource with the id $parent existed and loaded into $parentObj just fine). After that we will set up the $resArray variable which is filled with an array of the parents' children if any.

Now that we have all the children we need, let's get the information we need from each aswell.

``` php
$resources = array();
foreach($resArray as $res) {
  if ($res instanceof modResource) {
    $resources[] = $res->get('pagetitle') . '==' . $res->get('id');
  }
}
```

First we instantiate a new variable as an empty array. While not really required, it is good practice and can prevent injection of not-so-funny things elsewhere. Next we loop through the array with resources and when a valid resource, we store the id and pagetitle in a new entry in the $resources array. Note that we are putting it in with the two equal characters to put it in the right format for the TV.

Almost done!

``` php
$out = implode("||",$resources);
return $out;
```

We just glue together the array into a string, seperated by the two pipes (remember the tv input type syntax?) , and return it. Be sure not to echo it as that will make it show up whenever it is being called instead of when it is requested and can lead to unexpected results.

Now if you go to a resource and change it to the template linked to this template variable, you should see the a list of pages you can select.

For clarity, here's the complete snippet:

``` php
$parent = $modx->getOption('parent',$scriptProperties,9);
$parentObj = $modx->getObject('modResource',$parent);
if (!($parentObj instanceof modResource)) { return ''; }
$resArray = $parentObj->getMany('Children');
$resources = array();
foreach($resArray as $res) {
  if ($res instanceof modResource) {
    $resources[] = $res->get('pagetitle') . '==' . $res->get('id');
  }
}
$out = implode("||",$resources);
return $out;
```

## Presenting the related pages in your template

You can just put the TV tag in your template, but most likely that will just give you a bunch of numbers, representing the IDs of the selected resources. You'll want to do a few things. First of, go back to your template variable and set the Output type to "delimiter". You will be giving the option to specify what your delimiter will be, for example a comma or two pipes. Let's set it as a comma for this tutorial.

Now to show it in your template, we will want a snippet that fetches the resources based on the ID we got from the template variable, parse it in a chunk so we can display it in anyway we want to and then return it to the template.

We will assume this would be our snippet call:

``` php
 [[relatedPages? &input=`[[*relatedPages]]` &tpl=`relatedPagesTpl`]]
```

So we are setting an input property with the delimited list of resource IDs that we said were related, and a chunkname (relatedPagesTpl) to use as the chunk template.

Let's work on the snippet then. Why don't we start with fetching and checking the two properties we added?

``` php
if (empty($input)) { return 'This article is so unique, that we couldn\'t find anything related to it!'; }
$tpl = $modx->getOption('tpl',$scriptProperties,'relatedPagesTpl');
if ($modx->getChunk($tpl) == '') { return 'We found some related pages, but don\'t know how to present it.'; }
```

What you see here is first checking if the $input variable (derived from the &input property) is empty and return an error message if so. The reason we're using this directly and not in the way as shown with the $tpl variable (using modX::getOption) is because we could also use the snippet as an output filter, and when we do that we can assume the $input variable is set. [More about output filters here](building-sites/tag-syntax/output-filters) "Input and Output Filters (Output Modifiers)"). On the second line we are first assigning a value to $tpl, which is either the "tpl" property passed in the snippet call, or the default of 'relatedPagesTpl'. On the third line we fetch the chunk by its name using modX::getChunk, and if that is empty (so it does not exist, or is empty) we return a nice error message.

So now that we have the settings, we can start processing. Let's first split up the delimited list of IDs into an array using the explode function. We will also set up an empty array for our output.

``` php
$ids = explode(',', $input);
$output = array();
```

Now loop through the $ids array...

``` php
foreach ($ids as $key => $value) {
  // We will do something here in a minute
}
```

Within the loop we will want to get the resource object first, and to prevent we will create links that others can not access, we are making sure it has been published as well. You could add more conditions (for example, only when the 'hidemenu' field is set to 0, or only searchable resources will show up), but we are happy with this.

After we fetched the object, we are also going to make sure we found an object. If we don't, and a selected resource that was not published can potentially result in a nasty fatal PHP error being visible instead of your carefully handcrafted template with related pages... To be 100% sure, we are checking if the returned object is part of the "modResource" class.

``` php
foreach ($ids as $key => $value) {
  $resource = $modx->getObject('modResource',array(
    'published' => 1,
    'id' => $value));
  if ($resource instanceof modResource) {
    // We are sure we have a resource here, so let's do something!
  }
}
```

Okay, so what do we want to do now? Let's just assume we want to call the chunk we assigned earlier, and put all resource fields into placeholders so we can call pretty much anything in there. For this we use the modElement::toArray() method to create an array of field => value pairs, and the modX::getChunk method (we also used that before, remember?) with the value array as second parameter to tell it to parse those as placeholders. We assign the result of that (which is the chunk with the placeholders parsed with the values we passed) to our $output array.

``` php
foreach ($ids as $key => $value) {
  $resource = $modx->getObject('modResource',array(
    'published' => 1,
    'id' => $value));
  if ($resource instanceof modResource) {
    $output[] = $modx->getChunk($tpl,$resource->toArray());
  }
}
```

All we need to do now is return the $output array as a string and we have our related pages. The implode function glues together the different array items, using the first parameter (in this case an empty string) as delimiter. We could specify a comma-space in there to glue together with a comma in between, however in this case we wont.

``` php
return implode('',$output);
```

And that's it!

For clarity, this is the resulting snippet we named "relatedPages":

``` php
if (empty($input)) { return 'This article is so unique, that we couldn\'t find anything related to it!'; }
$tpl = $modx->getOption('tpl',$scriptProperties,'relatedPagesTpl');
if ($modx->getChunk($tpl) == '') { return 'We found some related pages, but don\'t know how to present it.'; }
$ids = explode(',', $input);
$output = array();
foreach ($ids as $key => $value) {
  $resource = $modx->getObject('modResource',array(
    'published' => 1,
    'id' => $value));
  if ($resource instanceof modResource) {
    $output[] = $modx->getChunk($tpl,$resource->toArray());
  }
}
return implode('',$output);
```

An example of the relatedPagesTpl could be:

``` php
<li>
  <a href="[[~[[+id]]]]" title="[[+pagetitle]]">
    [[+longtitle:default=`[[+pagetitle]]`]]
  </a>, by [[+createdby:userinfo=`fullname`]]
</li>
```

This creates a list item with a link to the resource and its pagetitle as the title attribute. It will try to use the longtitle for the link text, but defaults to the pagetitle if the longtitle doesn't exist. It also uses the userinfo output modifier to add the fullname of the author of the resource to the list item. You can use any default resource field there.

## Further reading

- [Template Variable Input Types](building-sites/elements/template-variables/input-types "Template Variable Input Types")
- [Input and Output Filters](building-sites/tag-syntax/output-filters "Input and Output Filters")
- [modX::getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [modX::getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [modX::getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk")

When looking to also include TVs in your relatedPagesTpl chunk, you'll have to modify the snippet a bit.

Also, when you want to search multiple parents for resources you will need to adjust the first snippet as well.

A possible solution for both of these features can be found at <http://forums.modx.com/thread/70087/related-pages-tv-display-images>

Another similar question and its answer, relevant to the same: <http://forums.modx.com/thread/70587/display-resources-selected-through-tv-urgent>
