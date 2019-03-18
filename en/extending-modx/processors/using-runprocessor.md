---
title: "Using runProcessor"
_old_id: "493"
_old_uri: "2.x/developing-in-modx/advanced-development/using-runprocessor"
---

The usage of runProcessor described here only work in Revolution 2.0.8 and later. Users prior to that will have to use the deprecated [executeProcessor](extending-modx/core-model/modx/modx.executeprocessor "modX.executeProcessor") method. 
- [Using runProcessor](#using-runprocessor)

## Using runProcessor

MODX has a specific method that allows you to run processors straight from any PHP file, such as a [Plugin](extending-modx/plugins "Plugins"), [Snippet](extending-modx/snippets "Snippets") or externally. This can be done with the following syntax:

> $response = $modx->runProcessor('action/path/to/processor',$arrayOfProperties,$otherOptions);

This will then execute the specified processor and return a modProcessorResponse object, that contains the response from the processor. That can then be checked to see if the process was a success or failure. The first parameter, or action, is the path to the processor (without the file extension) from the core/model/modx/processors/ directory (This directory can also be overridden in the 3rd parameter array with the param 'processors\_path').

For example, this code creates a new Chunk:

``` php 
$response = $modx->runProcessor('element/chunk/create',array(
   'name' => 'NewChunk',
   'description' => 'A test Chunk made with runProcessor.',
   'snippet' => '<h3>Chunkify!</h3>',
));
if ($response->isError()) {
    return $response->getMessage();
}
$chunkArray = $response->getObject();
return 'The chunk "'.$chunkArray['name'].' was created with ID '.$chunkArray['id'];
```

This block of code runs the 'element/chunk/create' processor, checks to see if it was successful (with isError()), and if so, returns a message saying the ID and the name of the new Chunk. Note that getObject returns an **array** of the object that is returned by the processor. getMessage will return any message sent back from the processor.

You can also create an entire user, including Extended Fields, group assignments, a generated password and email notification.

``` php 
$groups = array();
$groups['Group1']['usergroup'] = '7'; // ID of group
$groups['Group1']['role'] = '1'; // ID of role
$groups['Group2']['usergroup'] = '8';
$groups['Group2']['role'] = '1';
$fields = array();
$fields['active'] = true;
$fields['passwordgenmethod'] = 'g';
$fields['passwordnotifymethod'] = 'e';
$fields['email'] = $email; 
$fields['username'] = $username;
$fields['fullname'] = $fullname;
$fields['extended']['container']['name'] = $value;
$fields['groups'] = $groups;
$response = $modx->runProcessor('security/user/create', $fields);
```
