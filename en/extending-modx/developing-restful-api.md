---
title: "Developing RESTful APIs"
_old_id: "1728"
_old_uri: "2.x/developing-in-modx/advanced-development/developing-rest-servers"
---

 MODX 2.3 introduced a convenient method to develop RESTful APIs, on top of MODX. This is done with the modRestService class and modRestController derivatives and supports a whole lot of fancy features for interacting with xPDOObject instances. This document aims to provide you with the information you need to get started building your own API.

## Recommended Pre-Development Reading

 Before building a RESTful API, it helps to know what a RESTful API really is and how they are supposed to work. There are a lot of resources available online, and Phil Sturgeon's " [Build APIs you won't hate](https://leanpub.com/build-apis-you-wont-hate)" is a great (e)book that can be useful to check out.

## In a Nutshell

1. Create an `index.php` file that handles the loading of MODX, setting up the REST Service with the right configuration and passing on the request to the controller (see #3).
2. Create a `.htaccess` file that directs all requests (in a subfolder or on a specific domain) to the `index.php` from #1.
3. Create controllers for each of your endpoints

## 1. Bootstrapping the API

 The `modRestService` and `modRestController` classes will make your work a lot easier, but you do need to set up some basic code to hook it up. For this document, we will assume you are placing your API in a `/rest/` folder, adjust paths as necessary.

 First, create a `rest/index.php` file which looks something like this:

 ``` php
<?php
// Boot up MODX
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
// Boot up any service classes or packages (models) you will need
$path = $modx->getOption('mypackage.core_path', null,
   $modx->getOption('core_path').'components/mypackage/') . 'model/mypackage/';
$modx->getService('mypackage', 'myPackage', $path);
// Load the modRestService class and pass it some basic configuration
$rest = $modx->getService('rest', 'rest.modRestService', '', array(
    'basePath' => dirname(__FILE__) . '/Controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'MyController',
    'xmlRootNode' => 'response',
));
// Prepare the request
$rest->prepare();
// Make sure the user has the proper permissions, send the user a 401 error if not
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}
// Run the request
$rest->process();
```

 With that in place, next you'll need to make sure the all requests to your `/rest/` folder are actually handled by the REST server. To do that, add the following to your `.htaccess` (or the equivalent on nginx or other systems) in the root of your site:

### Apache:

 ``` plain
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-s
RewriteRule ^(.*)$ rest/index.php?_rest=$1 [QSA,NC,L]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^(.*)$ rest/index.php [QSA,NC,L]
```

### NGINX:

 ``` plain
location /rest/ {
    try_files $uri @modx_rest;
}
location @modx_rest {
    rewrite ^/rest/(.*)$ /rest/index.php?_rest=$1&$args last;
}
```

 If you were to open /rest/foobar in your browser now, you should get an error that indicates your API is working, yay!

 ``` json
{
  success: false,
  message: "Method not allowed",
  object: [ ],
  code: 405
}
```

 Now we can get started with the actual API building!

## 2. Building API Endpoints

 The actual API consists of a bunch of endpoints. If you want to build a proper RESTful API each endpoint would match a "resource" (not necessarily the kind from the left tree!), and the different HTTP verbs (GET, POST, PUT and DELETE) would be used to interact with specific objects. Say you're building an API for managing your to do list, you could have an endpoint "items" with the following actions:

- `GET /items`: returns items on your to do list
- `GET /items/15`: returns the item with primary key 15
- `POST /items`: create a new item on the to do list
- `PUT /items/15`: update one or more values on your to do list item with primary key 15
- `DELETE /items/15`: delete the item with primary key 15

 There is a lot of discussion around the web about how to name your endpoints - in this case we went for the plural "items". One thing to note is that we don't have endpoints like /items/create - that is already covered by POSTing to /items and is a key aspect of building RESTful APIs.

 To create your Items endpoint , you will need to create the Items controller. Based on the configuration we passed to the modRestService earlier, and the defaults, each controller needs to start with MyController, be placed in a `/rest/Controllers/` directory and the file must match the endpoint name suffixed with `.php`. So create a new file `/rest/Controllers/Items.php`. Give it the following contents:

 ``` php
class MyControllerItems extends modRestController {
    public $classKey = 'ToDoItem';
    public $defaultSortField = 'sortorder';
    public $defaultSortDirection = 'ASC';
}
```

 Assuming ToDoItem is the name of a valid xPDOObject derivative, and you loaded it with $modx->addPackage() somewhere (for example in your Service class that we called in the index.php), you now have a fully functional RESTful API for your ToDoItem objects. Just request /rest/items and it should return your ToDoItems in pretty JSON.

 If you don't have a package ready, you can also set the classKey property to "modResource" and the defaultSortField to "id" to set up an API for all resources.

 ``` json
{
  results: [
    {
       id: 1,
       sortorder: 1,
       name: "Finish documenting RESTful APIs",
       added: "2014-09-14",
       target_completion_date: "2014-10-14",
       assigned_to: ""
    },
    // ...
  ],
  total: 1
}
```

 It's like magic! But you know what's even better? It is a full blown API now... if you go back to the actions we mentioned earlier, they will all work out of the box. `/rest/items/1` will return only the to do item with ID 1, for example. To test the POST, PUT and DELETE, you will probably need to use something like [Postman](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm)[](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm) or curl to send the proper requests but they should be functional now too.

 Now that you have your basic API running, it's time to start doing some real development and making it work the way you want it to.

## 3. Making your Endpoints smarter

 The majority of the work following now boils down to making your endpoints smarter, and adding more of them. You will probably want to change the way your data is returned, filter out unwanted data and more like that. The modRestController has all the options and hooks for you to do just that.

 Each of the requests is passed to a specific method in your Controller. This means that when you, for example, request `GET /items`, which returns a list of objects, it is handled by the `modRestController.getList()` method. This is how requests are routed to the controller:

- GET /items: `modRestController.get()` which calls `modRestController.getList()`
- GET /items/5: `modRestController.get()` which calls `modRestController.read()`
- POST /items: `modRestController.post()`
- PUT /items/5: `modRestController.put()`
- DELETE /items/5: `modRestController.delete()`

 These methods by default do what you would expect them to do with some sensible error handling and - for the most part - don't need to be customised. There are also methods such as `modRestController.beforePost()`,` modRestController.beforePut()`, `modRestController.beforeDelete()` that allow you to prevent the action (creating, updating or deleting an object respectively) by returning false. The object in question is available via `$this->object`, so you could make sure the user has permission to complete the action or otherwise prepare stuff. There is also `modRestController.afterRead()`, `modRestController.afterPost()`, `modRestController.afterPut()` and `modRestController.afterDelete()` for doing stuff after the action is completed. These methods get passed an array by reference which contains the object that is about to be returned.