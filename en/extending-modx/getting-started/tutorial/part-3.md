---
title: "Getting Started Part 3: Processors"
_old_id: "1118"
_old_uri: "2.x/case-studies-and-tutorials/php-coding-in-modx-revolution,-pt.-i/php-coding-in-modx-revolution,-pt.-iii"
note: 'Some of the details about connectors and processors relate to MODX before 2.3.'
---

In MODX, form processing is handled by 'Processors', which are isolated files located in the MODX core directory. They are accessed through 'Connectors', which handle AJAX requests from the User Interface (UI), which require a REQUEST variable named 'action' that specifies which processor to send to. Processors are sent the sanitized REQUEST data, and then when finished respond with a JSON message back to the browser. This allows for quick, easy requests that reduce the load on the server and the browser. You can also do multiple, asynchronous requests to processors in this method.

You can think of processors a bit like models in an MVC framework. MODX has a "model", but it is dominated by the classes that handle the ORM layer -- it's not a traditional model layer in other words. Processors are often tapped to fill the gap.

We'll look in-depth at the processor for creating a Chunk, and show you how MODX processors work.

First off, let's assume that we're sending the following data into the POST array to the connector, which has the REQUEST "action" variable set to 'create', loading the proper create.php variable. In the JS, the connector is `MODX.config.connectors_url+'element/chunk.php`, which resolves to (in our default setup):

> /modx/connectors/element/chunk.php

From there the connector will verify the request, and then send it to the proper processor, at:

> /modx/core/model/modx/processors/element/chunk/create.php

And now on to the processor:

``` php
<?php
/**
 * @package modx
 * @subpackage processors.element.chunk
 */
$modx->lexicon->load('chunk');
```

First off, we include the root index.php file for the processors, which does some slight variable checking and includes licensing. Then, we load the proper lexicon topic. In MODX Revolution, i18n language files are separated into smaller files by topic, (formerly called foci). Here, we want all language strings within the 'chunk' topic. This saves processing power by only loading relevant i18n strings.

**About Topics**
The lexicon _topics_ are similar to how the popular [gettext](http://www.gnu.org/software/gettext/) translation framework employs _contexts_ to distinguish meanings and provide subsets of translation files. We mention this only for newcomers who may be familiar with systems that use gettext (e.g. WordPress): remember that contexts are something very different in MODX.

``` php
if (!$modx->hasPermission('new_chunk')) $modx->error->failure($modx->lexicon('permission_denied'));
```

This checks to make sure the user has the correct permissions to run this processor. If not, then it sends a failure response back to the browser via `$modx->error->failure()`. The response is a string message translated via the lexicon.

``` php
// default values
if ($_POST['name'] == '') $_POST['name'] = $modx->lexicon('chunk_untitled');

// get rid of invalid chars
$_POST['name'] = str_replace('>','',$_POST['name']);
$_POST['name'] = str_replace('<','',$_POST['name']);

// if the name already exists for this chunk, send back an error
$name_exists = $modx->getObject('modChunk',array('name' => $_POST['name']));
if ($name_exists != null) return $modx->error->failure($modx->lexicon('chunk_err_exists_name'));
```

Note now how we're sanitizing variables, and checking to make sure there already isn't a Chunk with this name.

``` php
// category
$category = $modx->getObject('modCategory',array('id' => $_POST['category']));
if ($category == null) {
        $category = $modx->newObject('modCategory');
        if (empty($_POST['category'])) {
                $category->set('id',0);
        } else {
                $category->set('category',$_POST['category']);
                $category->save();
        }
}
```

Okay, here, we allow dynamic Category creation. If the category specified exists, it will later assign it to that category. If not, then it creates the category in the database and prepares it for later association to the Chunk.

``` php
// invoke OnBeforeChunkFormSave event
$modx->invokeEvent('OnBeforeChunkFormSave',array(
    'mode'  => modSystemEvent::MODE_NEW,
    'id'    => $_POST['id'],
));
```

Events are pretty much the same invoke-wise in Revolution as they were in 096 - however they are more optimized in their loading.

``` php
$chunk = $modx->newObject('modChunk', $_POST);
$chunk->set('locked',isset($_POST['locked']));
$chunk->set('snippet',$_POST['chunk']);
$chunk->set('category',$category->get('id'));
if ($chunk->save() === false) {
    return $modx->error->failure($modx->lexicon('chunk_err_save'));
}
```

Important: note the 2nd parameter of the `newObject()` method. This is basically the same as `$obj->fromArray()` - it allows you to specify an array of key-value pairs to assign to the new object.

``` php
// invoke OnChunkFormSave event
$modx->invokeEvent('OnChunkFormSave',array(
   'mode' => modSystemEvent::MODE_NEW,
   'id' => $chunk->get('id'),
));
```

Again, more event invoking.

``` php
// log manager action
$modx->logManagerAction('chunk_create','modChunk',$chunk->get('id'));
```

Now, how manager actions work in Revolution is a little different. This stores a lexicon string key ('chunk\_create'), the class key of the object being modified, and the actual ID of the object. This allows for more detailed manager action reporting.

``` php
$cacheManager= $modx->getCacheManager();
$cacheManager->clearCache();
```

Let's simply and easily clear the cache. Pretty easy, huh?

``` php
return $modx->error->success('',$chunk->get(array('id', 'name', 'description', 'locked', 'category')));
```

Now, send a success response back to the browser. The parameters of `$modx->error->success()` are as follows:

1: $message - A string message to send back. Used to report details about a success (or failure).
2: $object - An `xPDOObject` or array of data fields to convert into JSON and send back to the browser.

So basically, here, we're sending back the Chunk information - minus the content, which could be big and unnecessary and complicated to send. This will allow the UI to handle the creation properly.

Next, we'll talk about how to create your own schemas and add them dynamically into the MODX framework, without having to modify the core.
