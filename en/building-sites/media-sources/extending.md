---
title: "Extending Media Sources"
---

## What a Source Type Is

A Source Type is a PHP class that stores and retrieves the files of a Media Source. MODX ships three of them — File System, FTP and Amazon S3 — and each one is a class in the `MODX\Revolution\Sources` namespace.

A Source Type listed in the manager extends `MODX\Revolution\Sources\modMediaSource`, which implements the interface `MODX\Revolution\Sources\modMediaSourceInterface`. The list of types is built from the class map of xPDO: a package that ships a class extending `modMediaSource` and registers it in its model metadata adds a type to the list. Nothing else has to be registered.

## The Source Type Contract

Your own Source Type implements `MODX\Revolution\Sources\modMediaSourceInterface`. The interface declares every method that the manager and the file tree call.

### The files and the folders

| Method | Purpose |
| --- | --- |
| `getContainerList($path)` | Lists the folders in a directory. |
| `getObjectsInContainer($path)` | Lists the files in a directory. |
| `createContainer($name, $parentContainer)` | Creates a folder. |
| `removeContainer($path)` | Deletes a folder. |
| `renameContainer($oldPath, $newName)` | Renames a folder. |
| `uploadObjectsToContainer($container, array $objects = [])` | Uploads files into a folder. |
| `getObjectContents($objectPath)` | Reads a file. |
| `updateObject($objectPath, $content)` | Writes a file. |
| `createObject($objectPath, $name, $content)` | Creates a file. |
| `removeObject($objectPath)` | Deletes a file. |
| `renameObject($oldPath, $newName)` | Renames a file. |
| `moveObject($from, $to, $point = 'append')` | Moves a file or a folder. |
| `getOpenTo($value, array $parameters = [])` | Returns the folder the browser opens at. |

### The source itself

| Method | Purpose |
| --- | --- |
| `initialize()` | Opens the connection to the storage. Returning `false` aborts the source. |
| `getBasePath($object = '')` | Returns the path on the storage. |
| `getBaseUrl($object = '')` | Returns the public address of the storage. |
| `getObjectUrl($object = '')` | Returns the public address of one object. |
| `getTypeName()` | Returns the name of the type in the Source Type list. |
| `getTypeDescription()` | Returns the description shown under the name. |
| `getDefaultProperties()` | Returns the properties of the type. |

## Properties of a Source Type

`getDefaultProperties()` returns an array of property definitions. The manager and the source read these keys of every definition:

| Key | What it holds |
| --- | --- |
| `name` | The name of the property. The source stores the value under it. |
| `desc` | The key of the description in the lexicon. |
| `type` | The type of the field. The manager renders a matching input. |
| `options` | The choices of a field of the type `list`. |
| `value` | The value the property has until it is changed. |
| `lexicon` | The namespace of the lexicon that holds the description. |

```php
public function getDefaultProperties()
{
    return [
        'basePath' => [
            'name' => 'basePath',
            'desc' => 'prop_file.basePath_desc',
            'type' => 'textfield',
            'value' => '',
            'lexicon' => 'core:source',
        ],
    ];
}
```

The manager renders one row per property on the source edit page and stores the values with the source. A source reads them back through `getPropertyList()`, which merges the stored values with the defaults above.

## Events

Plugins react to what happens with sources and with the files they hold:

| Event | When it fires |
| --- | --- |
| `OnMediaSourceBeforeFormSave` | Before a source is saved from the manager. |
| `OnMediaSourceFormSave` | After a source is saved from the manager. |
| `OnMediaSourceBeforeFormDelete` | Before a source is deleted from the manager. |
| `OnMediaSourceFormDelete` | After a source is deleted from the manager. |
| `OnMediaSourceDuplicate` | After a source is duplicated. |
| `OnMediaSourceGetProperties` | When the properties of a source are read. A plugin that returns an array of properties replaces them. |
| `OnFileManagerBeforeUpload` | Before files are uploaded. |
| `OnFileManagerUpload` | After files are uploaded. |
| `OnFileManagerDirCreate` | After a folder is created. |
| `OnFileManagerDirRemove` | After a folder is deleted. |
| `OnFileManagerDirRename` | After a folder is renamed. |
| `OnFileManagerFileCreate` | After a file is created. |
| `OnFileManagerFileRemove` | After a file is deleted. |
| `OnFileManagerFileRename` | After a file is renamed. |
| `OnFileManagerFileUpdate` | After a file is written. |
| `OnFileManagerMoveObject` | After a file or a folder is moved. |

## See Also

1. [Media Sources](building-sites/media-sources)
2. [Adding a Media Source](building-sites/media-sources/creating)
3. [Assigning Media Sources to TVs](building-sites/media-sources/assigning-to-tvs)
4. [Securing a Media Source](building-sites/media-sources/securing)
   1. [Creating a Client Media Source](building-sites/media-sources/securing/clients-tutorial)
5. [Media Source Types](building-sites/media-sources/types)
   1. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
   2. [Media Source Type - FTP](building-sites/media-sources/types/media-source-type-ftp)
   3. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)
6. [Extending Media Sources](building-sites/media-sources/extending)
