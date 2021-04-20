---
title: "Using a GatewayManager Plugin"
_old_id: "333"
_old_uri: "2.x/administering-your-site/contexts/using-one-gateway-plugin-to-manage-multiple-domains"
---

You have a choice when sharing a single database and manager across multiple domains. You can choose to use the primary front-end context (known as 'web') to handle all domains or you can create a unique gateway file for each domain to directly initialize a specific context. If you use a single gateway, you would use a plugin to switch contexts registered to the `OnHandleRequest` event, something like so:

``` php
<?php
/* don't execute if in the Manager */
if ($modx->context->get('key') == 'mgr') {
        return;
}

switch ($_SERVER['HTTP_HOST']) {
        case 'domain2.tld':
                // if the http_host is of a specific domain, switch the context
                $modx->switchContext('domain2.tld');
                break;
        case 'domain3.tld':
                // if the http_host is of a specific domain, switch the context
                $modx->switchContext('domain3.tld');
                break;
        default:
                // by default, don't do anything
                break;
}
?>
```

Alternatively, you would simply copy the index.php file from the default web context (along with the core.config.php and .htaccess for rewrite rules altered appropriately) to another directory and change the line

``` php
$modx->initialize('web');
```

to

``` php
$modx->initialize('aContextNameOfYourChoice');
```

Note that you could also just copy the index.php in the same directory and rename it to do this, but your rewrite rules would have to be smart enough to route requests to the appropriate context gateway, and you would need to configure the `request_controller` option in Context Settings appropriately.

You can also still use a custom core location in either of these scenarios; this is independent of the context-driven multi-site capabilities.

Checkout the [GatewayManager component](extras/gatewaymanager)
