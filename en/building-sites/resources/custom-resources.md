---
title: "Custom Resource Classes"
description: "Build custom Resource types in MODX 3: class_key, processors, extension points, and Resource events."
_old_id: "79"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-resource-classes"
---

Custom Resource Classes (CRC) extend `modResource` and work in MODX 3. The create and update processors moved with the rest of the core processors; see [Processors on MODX 3](#processors-on-modx-3).

## What is a Custom Resource Class?

A CRC is a PHP class that extends `modResource` and defines a custom Resource type for data or an application. MODX ships four built-in Resource classes: Documents, Weblinks, Symlinks, and Static Resources. For example, a CRC can add a Blog, Forum, Gallery Album, or RSS Feed type.

A CRC is loaded through an Extension Package. It stores data in `modx_site_content` under its own `class_key`, but can behave differently and provide its own management interface.

### When to Use

CRCs fit "embedded applications" such as a blog post type that places a blog inside an existing MODX site. Use them when you have solid object-oriented PHP experience and understand how the application fits into the Resource table alongside other Resources.

### When Not to Use

Do not use a CRC to add a few fields or change how a Resource looks on the front-end. Use [Templates](building-sites/elements/templates) and [Template Variables](building-sites/elements/template-variables) for that. Skip CRCs when the additions do not need to appear in the built-in Resource listings.

**Rule of thumb:** if a [Snippet](extending-modx/snippets) or a [Template Variable](building-sites/elements/template-variables) can do the job more easily, use it. CRCs are harder to develop.

## Extending a CRC

If your class extends one of the built-in Resource classes, set `class_key` after `parent::__construct()`. The built-in constructors set it to their own class, so a child class otherwise keeps the parent's `class_key`.

Add a `{class_key}CreateProcessor` and `{class_key}UpdateProcessor` when the subclass needs its own save behavior. Without them, MODX uses the core Resource processors.

In MODX 3, `class_key` stores the class name with its namespace. The default is `MODX\Revolution\modDocument`. A custom class must be loadable under exactly the name stored in `class_key`, for example `My\Blog\modBlogPost`.


## Usage

CRCs look like normal Resources in the tree. A CRC class can add items to the Resource tree context menu, such as "Create a Blog Here", by setting `$showInContextMenu` and overriding `getContextMenuText()`. It can use the default Resource editing panels.

A CRC can have subclasses that are hidden from the create menu, such as a blog post class under a blog container. This keeps a large number of Resources out of the tree.

Any method in `modResource` can be overridden, including controllers, processors, and rendering. Override `process()` or `getContent()` to change output.

### Extension points

| Member | Purpose |
| --- | --- |
| `process()` | Builds the front-end output. |
| `getContent()` | Returns the raw content source. |
| `getResourceTypeName()` | Returns the label for the Resource type in the manager. |
| `getContextMenuText()` | Returns the create items for the Resource tree context menu. |
| `getControllerPath()` | Returns the manager controller directory for the type. |
| `prepareTreeNode(array $node)` | Changes the data used for the Resource tree node. |
| `$showInContextMenu` | Shows or hides the type in the tree context menu. |
| `$allowListingInClassKeyDropdown` | Allows changing a Resource to this type through the `class_key` dropdown. |
| `$allowChildrenResources` | Allows child Resources under this type. |
| `$allowDrop` | Controls drag-and-drop for the type in the tree. |

## Processors on MODX 3

On create, `MODX\Revolution\Processors\Resource\Create::getInstance()` looks for `{class_key}CreateProcessor`. On update, the processor looks for `{class_key}UpdateProcessor`. The class must be compatible with the core processor API; in practice, extend the core processor.

The 2.x processor files are gone:

| Old class | New class |
| --- | --- |
| `modResourceCreateProcessor` | `\MODX\Revolution\Processors\Resource\Create` |
| `modResourceUpdateProcessor` | `\MODX\Revolution\Processors\Resource\Update` |

A `require_once` of `core/model/modx/processors/resource/create.class.php` or `update.class.php` fails.

As of 3.2.x, `core/include/deprecated.php` still aliases the old class names. The file says the aliases will likely be removed in 3.3 or 3.4. Extend the namespaced classes and follow the upgrade notes.

`runProcessor('resource/create')` still works.

See [Step 4: Customizing the Processors](extending-modx/custom-resources/step-4-processors) and [Processors in the 3.0 upgrade notes](getting-started/upgrading-to-3.0/processors).

## Resource events

CRCs use the same Resource events as other types:

| Event | When it fires |
| --- | --- |
| `OnBeforeDocFormSave` | Before a Resource is created or updated. A non-empty response cancels the save. |
| `OnDocFormSave` | After a Resource is saved. |
| `OnDocFormPrerender` | While the manager edit page is rendered. |
| `OnResourceAddToResourceGroup` | After a Resource is added to a Resource Group. |
| `OnResourceRemoveFromResourceGroup` | After a Resource is removed from a Resource Group. |
| `OnResourceDelete` | When a Resource is deleted. |
| `OnResourceUndelete` | When a deleted Resource is restored. |
| `OnResourceDuplicate` | After a Resource is duplicated. |
| `OnResourceBeforeSort` | Before Resources are reordered in the tree. |
| `OnResourceSort` | After Resources are reordered in the tree. |
| `OnResourceToolbarLoad` | While the Resource toolbar is built. |
| `OnResourceCacheUpdate` | After the cache for a Resource is cleared. |

## Creating a CRC

Follow the tutorial on [Creating a Resource Class](extending-modx/custom-resources).
