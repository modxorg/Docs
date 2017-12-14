---
title: "modX.getParentIds"
_old_id: "1068"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getparentids"
---

modX::getParentIds
------------------

Gets all of the parent resource ids for a given resource.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getParentIds()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getParentIds())

```
<pre class="brush: php">
array getParentIds ([integer $id = null], [integer $height = 10], [array $options = array()] )

```Example
-------

Get all of the parent IDs for the Resource with ID 23.

```
<pre class="brush: php">
$parentIds = $modx->getParentIds(23);

```<div class="note">Important! This method makes use of the context cache to get the parent IDs. If you don't specify the context in the options (third) parameter it will use the current context. **In a plugin or external application that is often "mgr".** When this method returns an empty array, it is most likely looking in the wrong context so you will have to specify the third parameter. Example:

```
<pre class="brush: php">
$pids = $modx->getParentIds($id, 10, array('context' => 'web'));

```</div>See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.getChildIds](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getchildids "modX.getChildIds")