---
title: "forward_merge_excludes"
description: "A Symlink merges non-empty field values over the values in the target Resource"
---

**Name**: Forward Exclude Fields on Merge  
**Type**: Textfield  
**Default**: type,published,class\_key  
**Available In**: Revolution 2.0.8+

A Symlink merges non-empty field values over the values in the target Resource; using this comma-delimited list of excludes prevents specified fields from being overridden by the Symlink.

It can also be overridden f.e. by calling `sendForward()` method, check appropriate link below for more detail.

``` php
$options = array(
	'merge' => 1, // field gluing mechanism enabled
	// original fields list that need to be excluded from the result
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$modx->sendForward(15, $options);
```

## See also
-   [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward)
