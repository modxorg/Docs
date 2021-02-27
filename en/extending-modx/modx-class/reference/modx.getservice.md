---
title: "modX.getService"
_old_id: "1075"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getservice"
---

## modX::getService

Load and return a named service class instance. Returns either a reference to the service class instance or null if it could not be loaded. You can think of this is a simple dependency injector.

Note that the class is instantiated only once: subsequent calls return a reference to the stored instance.

## Syntax

API Doc: [modX::getService()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getService())

``` php
object getService (string $name, [string $class = ''], [string $path = ''], [array $params = array ()])
```

- `$name` : a key which uniquely identifies the service.
- `$class` : the full name of the class compatible with the "new" operator OR you can use "dot notation" to specify sub-folders relative to `$path`
- `$path` : full path to the directory containing the class in question.
- `$params` : passed as the 2nd argument to the constructor. The first argument is always a reference to xPDO/MODX.

## Examples

Get the modSmarty service.

``` php
$modx->getService('smarty','smarty.modSmarty');
```

Get a custom, user-defined service called 'modTwitter' from a custom path ('/path/to/modtwitter.class.php'), and pass in some custom parameters.

``` php
$modx->getService('twitter','modTwitter','/path/to/',array(
  'api_key' => 3212423,
));
$modx->twitter->tweet('Success!');
```

Another example of using getService inside a custom Extra:

``` php
// Use path to point directly to the relevant sub-dir:
if(!$Product = $this->modx->getService('mypkg.product','Product',MODX_CORE_PATH.'components/mypkg/model/mypkg/')) {
    return 'NOT FOUND';
}
// Or use dot-notation in the classname and point the $path to the model directory:
if(!$Product = $this->modx->getService('mypkg.product','mypkg.Product',MODX_CORE_PATH.'components/mypkg/model/')) {
    return 'NOT FOUND';
}
```

getService may have trouble with PHP namespaces.

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [MODX Services](extending-modx/services "MODX Services")
- [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass "xPDO.loadClass") – similar to getService, but it just loads the class and doesn't instantiate it.
