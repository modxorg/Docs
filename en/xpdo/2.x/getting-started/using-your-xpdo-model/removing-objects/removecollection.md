---
title: "removeCollection"
_old_id: "1204"
_old_uri: "2.x/getting-started/using-your-xpdo-model/removing-objects/removecollection"
---

This method is used to delete multiple objects.

<http://api.modxcms.com/xpdo/xPDO.html#removeCollection>

Examples
--------

From modSessionHandler:

```
<pre class="brush: php">
public function gc($max) {
    $max = (integer) $this->modx->getOption('session_gc_maxlifetime',null,$max);
    $maxtime= time() - $max;
    $result = $this->modx->removeCollection('modSession', array("`access` < {$maxtime}"));
    return $result;
}

```<div class="warning">**Warning**  
Careful! If you do not specify your criteria correctly, you can wipe out an entire database table!</div>