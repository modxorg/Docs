---
title: "Developing an Extra in MODX Revolution, Part III - MODX 2.1 and Earlier"
_old_id: "1051"
_old_uri: "2.x/case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-iii-modx-2.1-and-earlier"
---

This tutorial is part of a Series:

- [Part I: Getting Started and Creating the Doodles Snippet](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier")
- [Part II: Creating our Custom Manager Page](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-ii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part II - MODX 2.1 and Earlier")
- Part III: Packaging Our Extra

## Overview

In this tutorial, we're going to be packaging up our Extra that we made in the [past](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier") [two](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-ii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part II - MODX 2.1 and Earlier") tutorials into a [Transport Package](extending-modx/transport-packages "Transport Packages") (TP) so that we can install it on any MODX installation, and even submit it to the Extras section on modx.com.

First off, if you're not sure what a Transport Package is, or what Package Management is, I suggest you read up on [Package Management](extending-modx/transport-packages "Package Management") and [Transport Packages](extending-modx/transport-packages "Transport Packages") first before proceeding.

Our main goals for this part of the tutorial will be getting the Extra in a package: specifically our Snippet; the files in core/components and assets/components; the Action, Menu and Namespace for our CMP; making our Snippet's default properties i18n supported; and finally, adding a Resolver that creates our custom DB table in the installing user's database.

For simple Extras that don't have a CMP, we could just use [PackMan](/extras/revo/packman "PackMan") to package up our Extra. However, we have a CMP, and we want to learn how to do the script. So, here we are.

## Setting Up Our Build Directory

This is what our \_build directory will look like when we're through. We're already familiar with the build.config.php and build.schema.php files from Part I. For now, let's just explain a few things about it:

![](/download/attachments/37683306/doodles-build-dir1.png?version=1&modificationDate=1325795606000)

- **data** - This is where we're going to put all of our data-packaging scripts. We'll get into that shortly.
- **resolvers** - A directory containing our [resolvers](http://rtfm.modx.com/display/revolution20/Transport+Packages#TransportPackages-AResolver) for our Transport Package.
- **build.transport.php** - This is our main build script. Running it will create the Transport Package. We'll be heavily looking at this file.
- **setup.options.php** - While we won't use this extensively for our TP, we'll look at it briefly to show what's possible with it.

### The Build Script

Let's go ahead and create a file at /www/doodles/\_build/build.transport.php, and fill it with this:

``` php 
$tstart = explode(' ', microtime());
$tstart = $tstart[1] + $tstart[0];
set_time_limit(0);

/* define package names */
define('PKG_NAME','Doodles');
define('PKG_NAME_LOWER','doodles');
define('PKG_VERSION','1.0');
define('PKG_RELEASE','beta4');

/* define build paths */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'root' => $root,
    'build' => $root . '_build/',
    'data' => $root . '_build/data/',
    'resolvers' => $root . '_build/resolvers/',
    'chunks' => $root.'core/components/'.PKG_NAME_LOWER.'/chunks/',
    'lexicon' => $root . 'core/components/'.PKG_NAME_LOWER.'/lexicon/',
    'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
    'elements' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/',
    'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
    'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
);
unset($root);

/* override with your own defines here (see build.config.sample.php) */
require_once $sources['build'] . 'build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx= new modX();
$modx->initialize('mgr');
echo ''; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER,PKG_VERSION,PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();

$tend= explode(" ", microtime());
$tend= $tend[1] + $tend[0];
$totalTime= sprintf("%2.4f s",($tend - $tstart));
$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />\nExecution time: {$totalTime}\n");
exit ();
```

There's a lot in there. It's helpful to note that all this is doing so far is packaging in our Namespace, and creating a "doodles-1.0-beta4.zip" transport file. Let's go deeper to understand a bit more of it.

``` php 
$tstart = explode(' ', microtime());
$tstart = $tstart[1] + $tstart[0];
set_time_limit(0);

/* define package names */
define('PKG_NAME','Doodles');
define('PKG_NAME_LOWER','doodles');
define('PKG_VERSION','1.0');
define('PKG_RELEASE','beta4');
```

First off, we're going to get the time started for this build script so we can output at the end how long it took to build it. It's definitely not necessary code to build the TP, but it's useful information anyway.

Then we'll set up some defines we'll use later to determine our package's name, version and release. Next:

``` php 
/* define build paths */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'root' => $root,
    'build' => $root . '_build/',
    'data' => $root . '_build/data/',
    'resolvers' => $root . '_build/resolvers/',
    'chunks' => $root.'core/components/'.PKG_NAME_LOWER.'/chunks/',
    'lexicon' => $root . 'core/components/'.PKG_NAME_LOWER.'/lexicon/',
    'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
    'elements' => $root.'core/components/'.PKG_NAME_LOWER.'/elements/',
    'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
    'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
);
unset($root);

/* override with your own defines here (see build.config.sample.php) */
require_once $sources['build'] . 'build.config.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
```

Okay, here we're defining a whole bunch of paths on where to find stuff in our directory structure. This will be useful later on in our build script, so we can easily reference locations of files.

Note the source\_core and source\_assets keys - it's very important to note that they **do not** have a trailing slash. When we package them in later, this is important.

Finally, we'll include our build.config.php file and our modx class. Now it's time to load up the modX object:

``` php 
$modx= new modX();
$modx->initialize('mgr');
echo ''; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER,PKG_VERSION,PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');
```

Okay, a bit in here. First off, we'll instantiate the modX object, and initialize our 'mgr' Context. This sets up all the modX environment stuff we'll need. Next, we'll tell MODX to be a little more verbose in it's error reporting during this build script with the $modx->setLogLevel method - and we'll tell it to output to the screen as well with the setLogTarget message.

Then we'll load the 'modPackageBuilder' class from the transport/ directory in core/model/modx/ (which is the default since we passed '' into the 3rd parameter of loadClass), which is an assistance class that we'll use to package up our Extra.

Then we get into 2 interesting methods: createPackage and registerNamespace.

> $modx->createPackage(key,version,release)

Here's where the name for our TP gets created. We'll want to pass the name of our Extra (in lower case with no dots or hyphens!) in the first parameter. Then we'll want to pass a version and a release number. We chose '1.0' and 'beta4' back when we did our defines (remember that?). Now, modTransportPackage has an assistance method to automatically package in our Namespace for us:

> $builder->registerNamespace(namespace\_name,autoincludes,packageNamespace,namespacePath)

The first parameter is the name of our Namespace ('doodles' for us). The 2nd parameter auto-packages in an array of classes associated with our Namespace (we don't want this, so we set it to false). The third parameter asks if we want to add the Namespace to the TP (we do, so we set it to true). And finally, the last parameter asks what the path of our Namespace should eventually be.

That last parameter is key - note how we make it resolve to: '{core\_path}components/doodles/'? The {core\_path} part is a placeholder that will get replaced by MODX when the Namespace is accessed in their installation. This makes our Package nice and flexible on its paths - we don't have to explicitly set them, and it becomes more easy to 'transport', so to speak.

And now finally, the last few lines in our script:

``` php 
/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();

$tend= explode(" ", microtime());
$tend= $tend[1] + $tend[0];
$totalTime= sprintf("%2.4f s",($tend - $tstart));
$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Package Built.<br />\nExecution time: {$totalTime}\n");
exit ();
```

The pack() method tells MODX to go ahead and make the Transport Package zip with our built package so far. The rest of the lines after that just display how long it took to do the build. That's it! If you run this via the browser (on mine, [http://localhost/doodles/\_build/build.transport.php](http://localhost/doodles/_build/build.transport.php)) you'll get some debugging info displayed, and then in your MODX's core/packages/ directory, you'll find this:

![](/download/attachments/37683306/doodles-zip1.png?version=1&modificationDate=1325795606000)

Our Transport Package! Nice and done. However, installing it wont actually do anything. Let's try and solve that.

## Adding in the Data

We're going to want to package in our Snippet in its own 'Doodles' category, to get it to be nice and separated out from other Snippets the user might be using. In our build.transport.php file, add this below our registerNamespace call:

``` php 
$category= $modx->newObject('modCategory');
$category->set('id',1);
$category->set('category',PKG_NAME);

/* add snippets */
//$modx->log(modX::LOG_LEVEL_INFO,'Packaging in snippets...');
//$snippets = include $sources['data'].'transport.snippets.php';
//if (empty($snippets)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
//$category->addMany($snippets);

/* create category vehicle */
$attr = array(
    xPDOTransport::UNIQUE_KEY => 'category',
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'Snippets' => array(
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => 'name',
        ),
    ),
);
$vehicle = $builder->createVehicle($category,$attr);
$builder->putVehicle($vehicle);
```

Quite a bit of this is detailed [in this tutorial here](extending-modx/transport-packages/build-script "Creating a 3rd Party Component Build Script"), but we'll go over it again here. First off, we create a modCategory object that has the name (category) of 'Doodles'. Great. Note how we don't ->save() on it - we just want the object. Next we have some code to package in the Snippet, but we've commented it out for now. Go ahead and ignore it - we'll come back to it.

Next, we create this really big array of attributes, it seems. A bit more on these - they are attributes for the Vehicle for the Category. What's a Vehicle? Well, a Vehicle "carries" an Object in the Transport Package. Each object (say, a Snippet, Menu, Category, etc) needs a Vehicle to be carried in the Transport Package. So we'll create one, but first we want to assign some attributes to it to tell MODX just how this Vehicle should behave when the user installs it.

- **xPDOTransport::UNIQUE\_KEY => 'category'** - Here, we're telling MODX that the unique key for this Category is the field 'category'. Since we are installing this on another machine, the ID of the Category there will most likely be different than our ID on our machine. So MODX needs some way of identifying our 'Doodles' category if the User were to decide and uninstall our Doodles Extra. MODX uses this UNIQUE\_KEY property to look for a modCategory object with 'category' => "Doodles", and then removes it there.

- **xPDOTransport::PRESERVE\_KEYS => false** - Sometimes, however, we want the primary key of our object to be 'preserved' - or rather, used when the User installs our package. This is useful for non-auto-incrementing primary keys (PKs), such as Menu items, which we'll get to later. Our Category doesn't need its ID preserved, so we'll set that to false here.

- **xPDOTransport::UPDATE\_OBJECT => true** - A crucial one. This tells MODX that if the Category already exists, update it with our version. If we had set this to false, MODX would just skip this Category if it found it. We don't want that - say we want to release an update for our Doodles Extra later; we'd want the Category to update.

- **xPDOTransport::RELATED\_OBJECTS => true** - This tells MODX that we have some related objects to our Category we want to package in. (We do. We have a Snippet.) Related objects are important, as this means that they will be "related" to one another on install. Our example is a good one - any Snippets we install, we want to assign to the Category we're installing.

- **xPDOTransport::RELATED\_OBJECT\_ATTRIBUTES** - This takes in an associative array. Each index in the first depth of it tells MODX what the alias of it is - note we only have one, "Snippets". That tells MODX to look for any Related Objects in this Category that are Snippets, and then below that defines properties for those Snippets:

``` php 
'Snippets' => array(
   xPDOTransport::PRESERVE_KEYS => false,
   xPDOTransport::UPDATE_OBJECT => true,
   xPDOTransport::UNIQUE_KEY => 'name',
),
```

We're going to tell the package to not preserve the Snippet's keys (similarly to the Category). Then we want to update it should MODX find it already during installs or upgrades. Finally, we tell MODX that it's unique key is 'name' - MODX will look for a Snippet with the name of 'Doodles' (we'll get to where that's defined here in a bit) during install, and if it finds it, upgrade it (or remove it during uninstall).

Then we hit this:

``` php 
$vehicle = $builder->createVehicle($category,$attr);
$builder->putVehicle($vehicle);
```

This packages our Category object into a nice little vehicle for us, with the attributes we just defined. And then it adds it to the Transport Package. Done! Our Category is now in the TP. But we need to add the Snippets to it!

### Adding the Snippet

Go ahead and create a directory at /www/doodles/\_build/data/. Now let's add a file at /www/doodles/\_build/data/transport.snippets.php. Place this in there:

``` php 
<?php
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = trim(str_replace(array('<?php','?>'),'',$o));
    return $o;
}
$snippets = array();

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'Doodles',
    'description' => 'Displays a list of Doodles.',
    'snippet' => getSnippetContent($sources['elements'].'snippets/snippet.doodles.php'),
),'',true,true);
$properties = include $sources['data'].'properties/properties.doodles.php';
$snippets[1]->setProperties($properties);
unset($properties);

return $snippets;
```

First off, we're going to make a little helper method that grabs our snippet we worked on earlier and strips the <?php tags from it. Then, we'll make a $snippets array - basically an array of all the Snippets we want to package up.

Next, we'll actually make a new Snippet object. Note, however, we're **not** saving it - just creating it. Also, we're going to include some properties on them (more on that in a second). Finally, we return the $snippets array. Remember that part we commented out in our build.transport.php file? This part:

``` php 
/* add snippets */
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in snippets...');
$snippets = include $sources['data'].'transport.snippets.php';
if (empty($snippets)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in snippets.');
$category->addMany($snippets);
```

Go ahead and comment it out. Now our Snippets are loaded into the Category Vehicle. We're done there. Let's add those properties that we mentioned earlier.

### Adding in Snippet Properties

Create a file at /www/doodles/\_build/data/properties/properties.doodles.php. Put this in it:

``` php 
<?php
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_doodles.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'rowTpl',
        'lexicon' => 'doodles:properties',
    ),
    array(
        'name' => 'sort',
        'desc' => 'prop_doodles.sort_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'doodles:properties',
    ),
    array(
        'name' => 'dir',
        'desc' => 'prop_doodles.dir_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'prop_doodles.ascending','value' => 'ASC'),
            array('text' => 'prop_doodles.descending','value' => 'DESC'),
        ),
        'value' => 'DESC',
        'lexicon' => 'doodles:properties',
    ),
);
return $properties;
```

These are PHP representations of the default Properties for our Snippet. Let's look at the keys they have:

- **name** - This is the name, or key, of the property. We've got tpl, sort, and dir. For example, in our tpl property, we're telling it to default to 'rowTpl'. When someone wants to use the property, it would look like this in their snippet call:

``` php 
[[Doodles? &tpl=`rowTpl`]]
```

- **desc** - The description of our property. This can either be the actual description, or, if the 'lexicon' attribute on this property is set, a Lexicon key. We've got it as a Lexicon key, because we're going to i18n our properties.
- **type** - This is the 'xtype' of the property. Currently, the 4 available values are "textfield", "textarea", "combo-boolean" (Yes/No) and "list". We've got two textfields here, and a list type.
- **options** - Only used by the 'list' type, this is an array of arrays, which each contain an option in the list. Each option has two values - 'text' and 'value', where value is the actual value stored when it's selected, and 'text' is the text displayed for the value. 'text' can be a Lexicon key, if wanted.
- **value** - The default value of the property.
- **lexicon** - If wanted, properties can be i18n-compatible. Just specify the Lexicon Topic here, and MODX will handle the rest.

Okay, so we've got our properties. But as you can see, we've referenced a 'doodles:properties' Lexicon Topic. Let's go ahead and create that, in the file /www/doodles/core/components/doodles/lexicon/en/properties.inc.php:

``` php 
<?php
$_lang['prop_doodles.ascending'] = 'Ascending';
$_lang['prop_doodles.descending'] = 'Descending';
$_lang['prop_doodles.dir_desc'] = 'The direction to sort by.';
$_lang['prop_doodles.sort_desc'] = 'The field to sort by.';
$_lang['prop_doodles.tpl_desc'] = 'The chunk for displaying each row.';
```

As you can see here, it's a similar format to our default topic. Also, the keys in each string here match with the 'desc' attribute in each of our properties. This means that our Snippet's properties will be translated when they are shown - useful for making Extras that are translatable!

If you run the build script now, your Category, Snippet and its Properties will be packaged in. Great! But we've missed something - the actual files aren't getting copied. Let's remedy that.

### Adding the File Resolvers

So we want to add /www/doodles/core/components/doodles/ and /www/doodles/assets/components/doodles/ to our Transport Package. We're going to add those files to our Category Vehicle, via what are called File Resolvers. These scripts run after the package has been installed, and can be used to copy files into the User's MODX installation.

So, in build.transport.php, right after this, where we add the Category Vehicle:

``` php 
$vehicle = $builder->createVehicle($category,$attr);
```

add this:

``` php 
$modx->log(modX::LOG_LEVEL_INFO,'Adding file resolvers to category...');
$vehicle->resolve('file',array(
    'source' => $sources['source_assets'],
    'target' => "return MODX_ASSETS_PATH . 'components/';",
));
$vehicle->resolve('file',array(
    'source' => $sources['source_core'],
    'target' => "return MODX_CORE_PATH . 'components/';",
));
```

Let's explain. First off, there are two attributes here worth noting:

- **source** - This is the source of the files, or the path in which they can be found. This points to our source\_assets and source\_core paths, which were defined above. Note the lack of a trailing slash, as we mentioned earlier.

- **target** - This an eval'ed statement that returns where the script will be installed. Here, we're telling it to install to the assets path and core path of the User's MODX install, respectively.

Also, the first parameter of the resolve() call tells MODX this is a 'file' resolver. We'll be looking into PHP resolvers later on in this tutorial.

If you run the build script now, it will package in your doodles/core/ and doodles/assets/ directories, and install them into the User's proper directories. Great!

### Adding the Menu and Action

Now that we've got most of our Extra nice and packaged, let's add in the Menu and Action that make up our Custom Manager Page (CMP). Add this code below the putVehicle line for our Category:

``` php 
$modx->log(modX::LOG_LEVEL_INFO,'Packaging in menu...');
$menu = include $sources['data'].'transport.menu.php';
if (empty($menu)) $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in menu.');
$vehicle= $builder->createVehicle($menu,array (
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::UNIQUE_KEY => 'text',
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array (
        'Action' => array (
            xPDOTransport::PRESERVE_KEYS => false,
            xPDOTransport::UPDATE_OBJECT => true,
            xPDOTransport::UNIQUE_KEY => array ('namespace','controller'),
        ),
    ),
));
$modx->log(modX::LOG_LEVEL_INFO,'Adding in PHP resolvers...');
$builder->putVehicle($vehicle);
unset($vehicle,$menu);
```

Very similar to our Category Vehicle creation code. We've also got a related object of our Action. There are a couple differences, however, worth noting:

- PRESERVE\_KEYS is set to 'true' on our menu. This is because menu keys are unique - and we want to preserve that for our installed menu.
- UNIQUE\_KEY of the related object Action is an array. This tells MODX to look for a modAction object that has both a 'namespace' => 'doodles' and a controller of 'controllers/index'. It's a bit more specific on the search.

As you probably guessed, we need to add a transport.menu.php file. Add one at /www/doodles/\_build/data/transport.menu.php:

``` php 
<?php
$action= $modx->newObject('modAction');
$action->fromArray(array(
    'id' => 1,
    'namespace' => 'doodles',
    'parent' => 0,
    'controller' => 'controllers/index',
    'haslayout' => true,
    'lang_topics' => 'doodles:default',
    'assets' => '',
),'',true,true);

$menu= $modx->newObject('modMenu');
$menu->fromArray(array(
    'text' => 'doodles',
    'parent' => 'components',
    'description' => 'doodles.desc',
    'icon' => 'images/icons/plugin.gif',
    'menuindex' => 0,
    'params' => '',
    'handler' => '',
),'',true,true);
$menu->addOne($action);
unset($menus);

return $menu;
```

Looks very similar to our transport.snippets.php file, except we're just returning one menu, and we're calling addOne on the menu object to add the Action as a related object to the menu. Note that the fields in each of the fromArray calls are the fields in the DB table for the menu and action, by the way.

So now our Menu and Action are all nicely packaged in.

## Adding a Resolver

When someone installs our system, however, they're going to have 1 big problem - the database table modx\_doodles isn't going to exist! Let's write a PHP resolver to create it on install. A PHP Resolver is a PHP script that runs after the Vehicle it's attached to has been installed. We'll attach this resolver to our Menu vehicle. Right below our $builder->createVehicle call for the Menu, and before you run putVehicle for that vehicle, add this:

``` php 
$modx->log(modX::LOG_LEVEL_INFO,'Adding in PHP resolvers...');
$vehicle->resolve('php',array(
    'source' => $sources['resolvers'] . 'resolve.tables.php',
));
```

All that's passed into this PHP resolver is the 'source' field, which points to the PHP script. Let's create a file at /www/doodles/\_build/resolvers/resolve.tables.php, and put this inside:

``` php 
<?php
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/').'model/';
            $modx->addPackage('doodles',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('Doodle');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;
```

Great. So here we're doing a few things. Note the initial check for $object->xpdo. $object is our Menu, since we attached this to the Menu's vehicle. Then we want to check for the xpdo var on it (which is also MODX). We then run into a switch statement, that checks a mysterious PACKAGE\_ACTION const in the $options array. This little switch tells us to only run this code during **new** installs, or ACTION\_INSTALL.

Further in the switch, we are assigning $modx as a reference to $object->xpdo, for easier typing. Then we'll find our Doodles' model path via our friendly getOption calls, and then run the addPackage call to add our xpdo schema to the database (remember that from Part I?). Finally, we'll run $modx->getManager(), which gets an xPDOManager instance, and call $manager->createObjectContainer('Doodle') on it.

This method tells MODX to run the SQL to create the database table for the Doodle class, which is what we want. And at the end of the resolver, we'll return true so that MODX knows everything went smoothly.

If you build the package, and install it now, it will create our database table. Great!

## Adding the Changelog, Readme, License and Setup Options

Let's get fancy. When installing packages in MODX, often you'll see a dialog with a license, readme, and changelog. We want that in our package! First off, let's add those files.

Create a file in /www/doodles/core/components/doodles/docs/changelog.txt:

``` php 
Changelog file for Doodles component.

Doodles 1.0
====================================
- Updating text, ready to build
- Added default properties to Doodles snippet in build
- Fixes to doodles class
- Fixed bugs with build, updated readme
- Initial commit
```

Then create a license file (we'll let you put the content in) at /www/doodles/core/components/doodles/docs/license.txt.

Finally, create a readme.txt in the docs/ directory:

``` php 
--------------------
Extra: Doodles
--------------------
Version: 1.0

A simple demo extra for creating robust 3rd-Party Components in MODx Revolution.
```

Now that we've got our docs files, let's go to the end of our build.transport.php script, right before the $builder->pack() part, and add these lines:

``` php 
$modx->log(modX::LOG_LEVEL_INFO,'Adding package attributes and setup options...');
$builder->setPackageAttributes(array(
    'license' => file_get_contents($sources['docs'] . 'license.txt'),
    'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
    'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
    'setup-options' => array(
        'source' => $sources['build'].'setup.options.php',
    ),
));
```

So as you can see here, we have a setPackageAttributes() method, that allows some attributes. They're pretty self-explanatory - license takes in text for the license (which we grab using file\_get\_contents), readme takes in text for the readme, and changelog takes in text for the changelog.

The new one is the 'setup-options' array. First off, it's an array with a key of 'source' (like a resolver!), that points to a path of a PHP file (also like a resolver!). Let's create this PHP file, at /www/doodles/\_build/setup.options.php:

``` php 
<?php
$output = '';
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        $output = '<h2>Doodles Installer</h2>
<p>Thanks for installing Doodles! Please review the setup options below before proceeding.</p><br />';
        break;
    case xPDOTransport::ACTION_UPGRADE:
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}
return $output;
```

So, this looks familiar to a resolver, eh? That's because this little bit of code allows us to present 'Setup Options' to the user on installation. Right now we're just going to output a pretty message to tell people thanks for installing Doodles.

Remember that $options array in our PHP resolver? If we were to put any form elements in this output, they'd be found in that array with the same key. (An input with name of 'test' would be in $options\['test'\]). That means you could make a resolver that would process the form fields you put in the Setup Options script.

That means that you could have a lot of neat little fields that do pre-installation options. That's a bit beyond the scope of this tutorial, but now that you know the basics, you can probably figure it out from there. (Also, plenty of existing Extras, such as [Quip](/extras/revo/quip "Quip") do this, and you can [view their code](https://github.com/splittingred/Quip) to see how.

## Summary

Now you can run your build.transport.php file, and you'll get a nice little doodles-1.0-beta4.zip file in your MODX install's core/packages/ directory. You can now either install that by uploading it to a MODX install's core/packages/ directory (but not the same one you just developed in!), or post it to [modx.com/extras/](http://modx.com/extras/) to be included in the official MODX Provider that hooks into [Package Management](extending-modx/transport-packages "Package Management"). Pretty neat?

Let's recap. Over the 3 parts of this tutorial, we:

- Stubbed out the directory structure for our Extra so we could develop externally and even get it on a source control system, such as Git
- Added a custom xPDO model for our custom database table for our Doodles
- Created a dynamic, templatable Snippet that lists our Doodles
- Created a robust, CRUD-based Custom Manager Page to manage our Doodles from
- Wrote a Transport Package (TP) build script to build our package with that installs our files and MODX objects
- Made our TP create the custom DB table on install
- Made our TP display the license/readme/changelog and a nice status message

All in all, I'd say that was pretty successful. Congrats, and we hope you enjoy developing on MODX!

The Doodles Extra in this tutorial can be found on GitHub, here: <https://github.com/splittingred/Doodles/tree/2.1>

This tutorial is part of a Series:

- [Part I: Getting Started and Creating the Doodles Snippet](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier "Developing an Extra in MODX Revolution - MODX 2.1 and Earlier")
- [Part II: Creating our Custom Manager Page](case-studies-and-tutorials/developing-an-extra-in-modx-revolution-modx-2.1-and-earlier/developing-an-extra-in-modx-revolution,-part-ii-modx-2.1-and-earlier "Developing an Extra in MODX Revolution, Part II - MODX 2.1 and Earlier")
- Part III: Packaging Our Extra