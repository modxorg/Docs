---
title: "modFileHandler"
_old_id: "371"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modfilehandler"
---

## What is modFileHandler?

modFileHandler is the MODX service for handling files.

## Using modFileHandler

The basic idea behind modFileHandler is its `make` method:

``` php
modFile make (string $path, array $options = array(), string $overrideClass = '')
```

When passed a path, `make()` inspects the filesystem: if the path is an existing directory it returns a `modDirectory` object, otherwise it returns a `modFile` object — including for paths that do not exist yet. The optional `$overrideClass` parameter forces the returned class regardless of the path, which is how you create a `modDirectory` object for a not-yet-existing directory.

In MODX 3 the class lives in the `MODX\Revolution\File` namespace and there is no global alias, so load it with its FQCN:

``` php
$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);
```

A snippet that removes the directory passed as `path` (default `/www/test/`):

``` php
if (!isset($path)) $path = '/www/test/';

$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);
$directory = $modx->fileHandler->make($path);
if (!is_object($directory) || !($directory instanceof \MODX\Revolution\File\modDirectory)) return 'Not a directory!';

if (!$directory->remove()) {
   return 'Could not remove directory.';
}
```

You can also prepare `modDirectory` or `modFile` objects from paths that do not exist yet and then call `create()` on them. For a new **file**, just pass the path — a non-existing path yields a `modFile` by default. For a new **directory**, pass `$overrideClass`, since a non-existing path would otherwise produce a `modFile`:

``` php
$modx->getService('fileHandler', \MODX\Revolution\File\modFileHandler::class);

// create a new file with the content of 'Hello!'
$file = $modx->fileHandler->make('/www/test/test.txt');
if (!$file->create('Hello!')) {
   return 'File not written.';
}

// create a new directory
$directory = $modx->fileHandler->make('/www/test/subdir', array(), \MODX\Revolution\File\modDirectory::class);
if (!$directory->create()) {
   return 'Directory not created.';
}
return 'File and directory written.';
```

The `$options` array is passed to the `modFile`/`modDirectory` constructor. Two of its keys control permissions for newly created resources: `new_file_permissions` (default `0644`) and `new_folder_permissions` (default `0755`, or `0775` on Windows).

## API overview

Beyond `make()`, the handler offers path helpers; `modFile` and `modDirectory` provide the filesystem operations and share the `modFileSystemResource` base with its common helpers.

- **modFileHandler**: `getBasePath()`, `getBaseUrl()`, `sanitizePath($path)`, `postfixSlash($path)`, `getDirectoryFromFile($fileName)`, `isBinary($file)`.
- **modFile**: `create($content = '', $mode = 'w+')`, `write($content, $mode)`, `save($content, $mode)`, `setContent($content)`, `getContents()`, `remove()`, `unpack($to, $options)`, `download($options)`, `getSize()`, `getExtension()`, `getBaseName()`, `getLastAccessed()`, `getLastModified()`.
- **modDirectory**: `create($mode = '')`, `remove($options = array())`, `getList($options = array())` — `getList()` returns the directory contents as arrays (files and subdirectories).
- **modFileSystemResource** (common base): `getPath()`, `exists()`, `isReadable()`, `isWritable()`, `isLink()`, `chmod($mode)`, `chown($owner)`, `chgrp($grp)`, `rename($newPath)`, `move($newPath)`, `getParentDirectory()`, `getGroup()`, `setGroup($grp)`.

