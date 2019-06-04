---
title: "MODX Services"
_old_id: "204"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services"
---

## What is a Service?

A service is any object that is loaded via [$modx->getService](extending-modx/modx-class/reference/modx.getservice "modX.getService"). It can be a custom class provided by the user, or by MODX itself.

Once an object is loaded with getService, it is accessible via $modx->(servicename). So, for example:

``` php
$modx->getService('twitter','myTwitter','/path/to/twitter/model/',array(  
  'api_key' => 3212423,
));  
$modx->twitter->tweet('Success!');  
```

## What are the Default Included Services?

A list of the core-included MODX Services is as follows:

1. [modFileHandler](extending-modx/services/modfilehandler)
2. [modMail](extending-modx/services/modmail)
3. [modRegistry](developing-in-modx/advanced-development/modx-services/modregistry)

## See Also

- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService")