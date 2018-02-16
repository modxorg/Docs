---
title: "modFileHandler"
_old_id: "371"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modfilehandler"
---

What is modFileHandler?
-----------------------

modFileHandler is a service class used in MODx Revolution for handling files. It abstracts basic file management actions to provide helper methods for file management.

<div class="note">modFileHandler, modFile and modDirectory are still in their infancy stages. Many more methods will be added to them in Revolution 2.2.</div>Using modFileHandler
--------------------

The basic idea behind modFileHandler is its "make" method. When passed a path into modFileHandler->make(), it will return either a modDirectory or modFile object, depending on what was passed inside of it.

For example, a simple snippet that makes a modDirectory object out of the passed "path" property (defaulting to "/www/test/") and then removes the directory:

```
<pre class="brush: php">
if (!isset($path)) $path = '/www/test/';

$modx->getService('fileHandler','modFileHandler');
$directory = $modx->fileHandler->make($path);
if (!is_object($directory) || !($directory instanceof modDirectory)) return 'Not a directory!';

if (!$directory->remove()) {
   return 'Could not remove directory.';
}

```You can also create modDirectory or modFile objects from non-existent paths. This will allow you to run ->create() on them, allowing you to make new directories or files. For example, to create a new file with the content of 'Hello!' at the path "/www/test/test.txt":

```
<pre class="brush: php">
$modx->getService('fileHandler','modFileHandler');
$file = $modx->fileHandler->make('/www/test/test.txt');
if (!$file->create('Hello!')) {
   return 'File not written.';
}
return 'File written.';

```