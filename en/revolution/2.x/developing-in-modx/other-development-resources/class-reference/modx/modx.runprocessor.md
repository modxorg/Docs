---
title: "modX.runProcessor"
_old_id: "1098"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.runprocessor"
---

modX::runProcessor
------------------

 Loads and runs a specific processor. The method takes 3 arguments:

- **action** - The action to take (the processor to run), this is the path to the processor (without the file extension) realtive to the core/model/modx/processors/ directory (by default).
- **scriptProperties** - An array of properties passed to the processor.
- **options** - An array of options passed to the processor. 
  - _processors\_path_ - If specified, will override the default MODX processors path (core/model/modx/processors/) where MODX is looking for the processor. This is helpful if you write your own custom processors and place them for example in your core/components/yourextra/processors/ directory.

<div class="info"> This method replaces $modX->executeProcessor() prior to version 2.1 </div>Syntax
------

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::runProcessor()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::runProcessor())

 ```
<pre class="brush: php">mixed runProcessor(string $action = '', array $scriptProperties = array(), array $options = array())

```Example
-------

 Run the ResourceGroup create processor:

 ```
<pre class="brush: php">// create new resource group programatically
$response = $modx->runProcessor('security/resourcegroup/create', array(
	'name' => 'Test', // the name of the new resource group
	'access_contexts' => 'mgr,web', // the context(s) the new resource group is restricting access in
	'access_admin' => 1, // adds access to this resource group for Administrators
	'access_parallel' => 1, // creates a new user group "Test" parallel to the resource group
	'access_usergroups' => 'Editors', // adds access to the new resource group for the user group "Editors"
));


```See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
- [Using runProcessor](/revolution/2.x/developing-in-modx/advanced-development/using-runprocessor)