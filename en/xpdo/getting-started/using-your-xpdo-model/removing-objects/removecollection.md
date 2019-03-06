---
title: "removeCollection"
_old_id: "1204"
_old_uri: "2.x/getting-started/using-your-xpdo-model/removing-objects/removecollection"
---

 This method is used to delete multiple objects.

 <http://api.modxcms.com/xpdo/xPDO.html#removeCollection>

## Examples

 From modSessionHandler:

 ``` php 

public function gc($max) {
    $max = (integer) $this->modx->getOption('session_gc_maxlifetime',null,$max);
    $maxtime= time() - $max;
    $result = $this->modx->removeCollection('modSession', array("`access` < {$maxtime}"));
    return $result;
}

```

 **Warning** 
 Careful! If you do not specify your criteria correctly, you can wipe out an entire database table! 

### Both parameters required

 Note that the both parameters (object type and the array of selectors) are required. If you want to delete everything in a table, pass 'array()' as the second parameter and this will match and delete all items.

 For example, to delete all objects of type 'objectName' from the database, do the following.

 ``` php 

$modx->removeCollection('objectName', array());

```