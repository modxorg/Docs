---
title: 'Processors'
description: "Processors can be compared to commands or actions"
---

## Processors in MODX

Processors can be compared to "commands" or "actions". Before MODX 2.2 they were "simple" PHP files, but they have since been rewritten based on the `modProcessor` class, and its various subtypes.

So, we are talking about processor files, these are PHP scripts that can perform certain functions. For clarity, have a look at [/core/model/modx/processors](https://github.com/modxcms/revolution/tree/2.x/core/model/modx/processors) and you will see how many there are.

You can work with processors from any Snippet or Plugin using [runProcessor](extending-modx/processors/using-runprocessor) method: 

``` php
$response = $modx->runProcessor('action/path/to/processor',$arrayOfProperties,$otherOptions);
```

In response we get [modProcessorResponse](https://github.com/modxcms/revolution/blob/df90fecfdfcf719cabe171ea3db59e47f45d7ee9/core/model/modx/modprocessor.class.php) object with all its methods.

## Standard processors

As an example please check `security` folder - there are` login` and `logout` processors that control user authorization. Here's how we can authorize the user:

``` php
$username = 'ivanpetrov';
$password = '*********';
$data = array(
    'username' => $username,
    'password' => $password,
    'rememberme' => 1,
    'login_context' => 'web',
);    
$response = $modx->runProcessor('/security/login', $data);
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'login error. Username: '.$username.', Message: '.$response->getMessage());
}
```

Leaving website is even easier: 

``` php
$response = $modx->runProcessor('/security/logout');
if ($response->isError()) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'Logout error. Username: '.$modx->user->get('username').', uid: '.$modx->user->get('id').'. Message: '.$response->getMessage());
}
```

This is very convenient and ensures that your's component will work in all MODX versions. Therefore, if possible, you should always use standard processors.

Of course, standard processors don't know how to work with your Components.

## Own processors

Using your own processors differs from the standard ones only in that you need to specify the folder where to get them from. Let's see an example from [miniShop2](https://minishop2.com): 

``` php
// Array we will send to processor, there to catch it in $scriptProperties
$processorProps = array(
    'id' => 55
);
// Options array for the runProcessor method
$otherProps = array(
    // Here we indicate where our processors are located
    'processors_path' => $modx->getOption('core_path') . 'components/minishop/processors/'
);
// Run
$response = $modx->runProcessor('web/orders/getlist', $processorProps, $otherProps);
// And return response from the processor
return $response->response;
```

This is a slightly modified example from miniShop Snippet, where it [processes personal account requests](https://github.com/bezumkin/miniShop/blob/master/core/components/minishop/elements/snippets/minishop.php#L26).

As you can see start processor is specified without extension, by the path from the processor folder. If we do not specify our folder, it will be `/core/model/modx/processors/` by default. In the example above we change it to a folder inside miniShop component.

## Standard processor inside native

Here's the most interesting! Let's see an example: 

``` php
$response = $modx->runProcessor('resource/create', $_POST);
if ($response->isError()) {
    return $modx->error->failure($response->getMessage());
}

$id = $response->response['object']['id'];
```

Here we create a new resource using standard processor from `$_POST` data and get resource `id` from response.
[Here is the source code] (https://github.com/bezumkin/miniShop/blob/master/core/components/minishop/processors/mgr/goods/create.php) the entire miniShop processor to create a new product.

This approach ensures that regardless of future changes to MODX, its processor will work in all versions. And, very importantly, **plugins will work** that should work when creating new resources. Also, `alias` will be generated (if you use them), and as indicated in the System Settings, through transliteration, or not.
Updating products works the same way, and for example [mSearch](https://docs.modx.pro/en/components/msearch2) gets `OnDocFormSave` event and indexes this resource.

You may not use `runProcessor` in such cases and work through` newObject` method - but then you need to additionally generate events for plugins, define unset fields of a new resource, generate `alias` and much more.
For what - if MODX has already foreseen all this?

## Conclusion

Processors are a great thing, and you need to make the most of them in all your Snippets. If you want to do something with a resource or other element - please check if there is a ready-made processor in the system for this?
If yes - use it! This saves you a lot of headache and allows other Components and plugins to interact with your code.

## See also

- [Getting started with class-based processors](https://www.markhamstra.com/xpdo/2012/getting-started-with-class-based-processors-2.2/) (at markhamstra.com)
- [Extending modObjectGetListProcessor, a powerful class based processor in MODX 2.2](https://www.markhamstra.com/xpdo/2012/modobjectgetlistprocessor-class-based-processor/) (at markhamstra.com)
- [Full list of MODX Processors](https://bobsguides.com/modx-processor-list.html) (at bobsguides.com)
