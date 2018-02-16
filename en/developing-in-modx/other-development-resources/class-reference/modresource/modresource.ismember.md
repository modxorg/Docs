---
title: "modResource.isMember"
_old_id: "1718"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modresource/modresource.ismember"
---

modResource::isMember
---------------------

 States whether a resource is a member of a resource group or groups. You may specify either a string name of the resource group, or an array of resource group names.

<div class="info"> This method is available with MODX v2.3 (most likely not in a patch release) </div>Syntax
------

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modresource.class.html#\\\\modResource::isMember()](http://api.modx.com/revolution/2.2/db_core_model_modx_modresource.class.html#\\modResource::isMember())

 ```
<pre class="brush: php">boolean isMember (mixed $groups)

```Example
-------

 Get a resource object:

 ```
<pre class="brush: php">$resource = $modx->getObject('modResource', array('id' => 2));

``` See if the resource is a member of the 'Marketing' resource group:

 ```
<pre class="brush: php">$resource->isMember('Marketing');

``` See if the resource is a member of EITHER the 'Marketing' or 'Finances' resource group.

 ```
<pre class="brush: php">$resource->isMember(array('Marketing', 'Finances'));

``` See if the resource is a member of BOTH the 'Marketing' and 'Finances' resource group (by default it's enough to be in one resource group to get back true).

 ```
<pre class="brush: php">$resource->isMember(array('Marketing', 'Finances'), true);

```See Also
--------

- [modResource](developing-in-modx/other-development-resources/class-reference/modresource "modResource")