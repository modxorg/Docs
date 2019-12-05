---
title: "modX.runProcessor"
_old_id: "1098"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.runprocessor"
---

## modX::runProcessor

Loads and runs a specific processor. A Processor in this case is an instance of the `\MODX\Revolution\Processors\Processor` class that can be loaded through the provided logic described in detail below.

The core of MODX also uses this method for requests handled by a connector.

``` php
ProcessorResponse|mixed runProcessor(string $action = '', array $scriptProperties = array(), array $options = array())
```

The method takes 3 arguments:

- `string $action` - The action to take, in other words, what processor to run. This can be the fully qualified name of a processor class (such as `\MODX\Revolution\Processors\Resource\Create`), a relative (2.x-style) path to a processor (`resource/create`), or a relative qualified path to a processor (`Resource\Create`). Please find the _Processor Loading Logic_ section below for more detail of how an action is processoed to find a specific processor.
- `array $scriptProperties` - An array of properties passed to the processor. This does not affect the functioning of `modX::runProcessor`, but contains the properties that the processor itself will use. 
- `array $options` - Options that `modX::runProcessor` uses to handle the request. Only supports:
    - `processors_path` - Override the default path to find a processor.  If specified, will override the path where MODX tries to find processors in. Primarily useful for third party extras that use a custom connector file to interact with custom processors. 

## Processor Loading Logic

As of 3.0, `modX::runProcessor` goes through the following steps, in the listed order, to find a valid processor class to execute. Once it found a match, it runs it, and stops processing.

In all cases, the determined class name is checked to make sure it implements the `\MODX\Revolution\Processors\Processor` class.

1. Check if the provided `$action` is a valid and fully qualified class name that can be instantiated directly. This means you can provide the full processor class name, if you know it and it is loaded or autoloadable, to run it. For example, `\MODX\Revolution\Processors\Resource\Create` is autoloaded and can be passed as `$action`.
2. Turn the action into a class name in the `\MODX\Revolution\Processors\` namespace. This is done by splitting the action on a slash (`/`), capitalising the first character of each part, and joining it with the backslash (`\`) for a valid namespaced class. If a `\Tv\` namespace is in the generated path, that is replaced with `\TemplateVar\` to account for that path being renamed in 3.0. For example, if `$action` is `resource/create`, that is transformed to `Resource\Create` and prefixed with the root namespace for a final class of `\MODX\Revolution\Processors\Resource\Create`.
3. At this point, MODX starts scanning files. By default it looks in the `core/src/Revolution/Processors/` path for a file named `{$action}.class.php`, for example an `$action` of `something/cool` will look for the file `core/src/Revolution/Processors/something/cool.class.php`. This is most useful for third-party processors, but only if you provide `$options['processors_path']` to indicate a custom root path to look in. For example providing `['processors_path' => '/absolute/path/to/core/components/doodles/processors/']` makes it look for `/absolute/path/to/core/components/doodles/processors/something/cool.class.php`. 
4. When a file is found in the expected location, it is included. 
    a. If including the file **returns** a string, that string is considered the name of the class. 
    b. If the file does not include a value, the action is transformed to a standard processor filename. The action is split by the slash, and every dot, underscore, and dash (`._-`) is stripped out. The first character is capitalized for each part. The result is prefixed with `mod` and suffixed with `Processor`. For example, `my/custom/action` will be transformed to the class name `modMyCustomActionProcessor`. 

## Example

Run the ResourceGroup create processor:

``` php
// create new resource group programatically
$response = $modx->runProcessor('security/resourcegroup/create', array(
   'name' => 'Test', // the name of the new resource group
   'access_contexts' => 'mgr,web', // the context(s) the new resource group is restricting access in
   'access_admin' => 1, // adds access to this resource group for Administrators
   'access_parallel' => 1, // creates a new user group "Test" parallel to the resource group
   'access_usergroups' => 'Editors', // adds access to the new resource group for the user group "Editors"
));
```

Specific processors require different parameters. Review the documentation or source code to find out what the processor you're using needs. 

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [Using runProcessor](extending-modx/processors/using-runprocessor)
