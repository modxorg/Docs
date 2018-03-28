---
title: "Using Custom Database Tables in your 3rd Party Components"
_old_id: "330"
_old_uri: "2.x/case-studies-and-tutorials/using-custom-database-tables-in-your-3rd-party-components"
---

- [The Scenario](#UsingCustomDatabaseTablesinyour3rdPartyComponents-TheScenario)
- [Our Model](#UsingCustomDatabaseTablesinyour3rdPartyComponents-OurModel)
- [Building the Schema](#UsingCustomDatabaseTablesinyour3rdPartyComponents-BuildingtheSchema)
- [Using our New Model](#UsingCustomDatabaseTablesinyour3rdPartyComponents-UsingourNewModel)
- [See Also](#UsingCustomDatabaseTablesinyour3rdPartyComponents-SeeAlso)



 So you're developing your custom component for MODX Revolution, and you've run into a dilemma. You've got some data that uses a table in your MODX database, but you want a way to use xPDO's object model to access it. This tutorial will walk you through the process of creating your own custom schema, adding it as an xPDO model package, and querying it.

## The Scenario

 So let's say we want to create a custom component called "StoreFinder" that takes a zip code from a textfield and then looks up all the store locations with that zip code and returns them in a table. Currently we'll have one table for this: (note the prefix "modx\_" - this is specific to your DB connection, done in Revolution setup.)

- modx\_sfinder\_stores

 Our component will grab all the stores with the specified zip code. Our store table will have the following fields:

- id
- name
- address
- city
- state
- zip
- country
- phone
- fax
- active

 So now that we've got an idea of what's in our tables, let's make the schema file that defines the model. This "schema" file is an XML representation of our database table(s). It is then parsed by xPDO into PHP-format "maps", which are array representations of the schema and its relationships.

## Our Model

 Let's take a quick look at our directory structure. This isn't always how you have to do it - this one is specifically built this way for SVN; but it's definitely recommended, especially with the _core/components/storefinder/_ structures, since that makes creating the transport package (should we want to distribute this via Package Management) much easier.

 ![](/download/attachments/18678102/sfdirstructure1.png?version=1&modificationDate=1248206139000)

 Now, on to the model file. In our \_build directory, let's create a "schema" subfolder. Then, from there, we'll create a file called "storefinder.mysql.schema.xml". Note that "mysql" is in there - yes, eventually xPDO and Revolution will support other database platforms. But for now, we're going to do this in MySQL.

 In our XML file, let's start out with the first few lines:

 ``` xml 
<?xml version="1.0" encoding="UTF-8"?>
<model package="storefinder" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" phpdoc-package="storefinder" phpdoc-subpackage="model">

```

 First we'll tell the browser and parser that this is XML code with a standard XML header. Next, we're going to create a "model" tag, and put some attributes into it. They are:

- **package** - The name of the xPDO package (note this is different than a "transport package", a Revolution term). This is how xPDO separates different models and manages them.
- **baseClass** - This is the base class from which all your class definitions will extend. Unless you're planning on creating a custom xPDOObject extension, it's best to leave it at the default.
- **platform** - The database platform you're using. At this time, xPDO only supports mysql.
- **defaultEngine** - The default engine of the database tables, usually either MyISAM or InnoDB. MODX recommends using MyISAM.
- **phpdoc-package & phpdoc-subpackage** - These are custom attributes we're going to use in our map and class files. They're not standard xPDO attributes, but show that you can put whatever you want as attributes.

 Great! Now we've got our model definition. Let's add a table tag as the next line.

 ``` php 
<object class="sfStore" table="sfinder_stores" extends="xPDOSimpleObject">

```

 "Object" is our representation of a table, which will generate into an xPDOObject class when we're through. There are some attributes to note here:

- **class** - This is the name of the class we want to be generated from the table. Here, we'll use "sfStore". Note that instead of just "Store", we prefixed it with "sf" to prevent collisions with any other packages we might install that might also have Store tables.
- **table** - This should point to the actual database table name, minus the prefix.
- **extends** - This is the class that it extends. Note that you can make subclasses and extended classes straight from the XML. Extended classes will inherit their parent class's fields.

 You'll see here that this table extends "xPDOSimpleObject", rather than xPDOObject. This means that the table comes already with an "id" field, that is an auto-increment primary key.

 Now that we've got a table definition for our stores table, let's add some field definitions to it:

 ``` php 
<field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
<field key="address" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="city" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="state" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="zip" dbtype="varchar" precision="10" phptype="string" null="false" default="0" index="index" />
<field key="country" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="phone" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="fax" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="active" dbtype="int" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />

```

 As you can see here, each column in our table has a field definition tag. From there, we have 
 attribute properties for each field. Most of these are optional, depending on the database type of the column. Some of those attribute properties are:

- **key** - The key name of the column.
- **dbtype** - The DB type - such as varchar, int, text, tinyint, etc.
- **precision** - The precision of the field. Usually this is the max number of characters.
- **attributes** - Only applies to some DB types; in integers you can set to "unsigned" to make sure that the value is always positive.
- **phptype** - The corresponding PHP type of the DB field type.
- **null** - If the field can be NULL or not.
- **default** - The default starting value of the field should none be set.
- **index** - An optional field, when set, will add a type of index to the field. Some of the values are "pk", "index", and "fk".

 And we'll finish by closing the object and model tags:

 ``` php 
</object>
</model>

```

 So now we have a completed XML schema for our model! Let's move on to the schema build script.

## Building the Schema

 Go ahead and create a 'build.config.php' file in your \_build directory. It should contain this:

 ``` php 
<?php
define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/MODxRevolution/');
define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');

```

 ...where MODX\_BASE\_PATH will need to point to where you installed MODX Revolution. If you moved the manager or core outside of that base path, you'll need to adjust those defines as well. From here, create a 'build.schema.php' file in your \_build directory. At the top, put this:

 ``` php 
<?php
/**
 * Build Schema script
 *
 * @package storefinder
 * @subpackage build
 */
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);
require_once dirname(__FILE__) . '/build.config.php';
include_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx= new modX();
$modx->initialize('mgr');
$modx->loadClass('transport.modPackageBuilder','',false, true);
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'root' => $root,
    'core' => $root.'core/components/storefinder/',
    'model' => $root.'core/components/storefinder/model/',
    'assets' => $root.'assets/components/storefinder/',
    'schema' => $root.'_build/schema/',
);

```

 This will do a few things. First off, it starts up a nice execution time script for us, so we can see how long it takes to build the schema. Secondly, It includes our build.config.php file to tell the schema script where to find MODX Revolution. Thirdly, it loads the necessary classes, initializes the modX object, and loads the modPackageBuilder class. And finally, it sets some log levels and some base paths for our build script.

 Note that you'll want to make sure the $sources array has the correct paths defined; otherwise your script wont run. Let's add a couple more lines to our schema build script:

 ``` php 
$manager= $modx->getManager();
$generator= $manager->getGenerator();

```

 These lines will load xPDOManager and xPDOGenerator, two classes we'll need to build our schema map files.

 And finally, we want to actually parse this into a file:

 ``` php 
$generator->parseSchema($sources['schema'].'storefinder.mysql.schema.xml', $sources['model']);
$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);
echo "\nExecution time: {$totalTime}\n";
exit ();

```

 This block of code executes the schema parsing method, and then outputs the total time the script took to execute. Run it, and viola! Our storefinder/core/model/storefinder/ directory is now filled with all of our map and class files!

## Using our New Model

 You may be asking, "Okay, that's great. Now how do I _use_ these?" Well, xPDO makes it incredibly simple. Let's first create our snippet file in our core/components/storefinder/ directory, and call it 'snippet.storefinder.php' -- we're going to tie into a file on the file system because it's easier to edit it using a text editor, and we want a file on the file system for our build package.

 Before we proceed, let's enable testing of this snippet directly from MODX. Since we're developing this in a separate directory from our MODX install, let's create a snippet called 'StoreFinder' in our MODX Revolution instance, and put this inside of it (you'll need to change the first line to the correct path):

 ``` php 
$base_path = dirname(dirname($modx->getOption('core_path'))).'/MODx Components/tutorials/storefinder/trunk/core/components/storefinder/';
/* change above line to your path */
$o = '';
$f = $base_path.'snippet.storefinder.php';
if (file_exists($f)) {
   $o = include $f;
} else {
   $modx->setLogTarget('ECHO');
   $modx->log(modX::LOG_LEVEL_ERROR,'StoreFinder not found at: '.$f);
}
return $o;

```

 This little helper code allows us to do our development in our own code editor of choice until we're ready to package and distribute our Component. Then we'll simply delete this 'StoreFinder' snippet from our MODX Revolution instance, and install our package. You can find more about building packages by going [here](http://modxcms.com/about/blog/shaun-mccormick/creating-3rd-party-component-build-script.html). If you don't want to build a transport package (we recommend doing so, it makes upgrades FAR easier!), you can simply just copy the files to their proper directories in the manager.

 Okay, back to our snippet. Open up 'snippet.storefinder.php' in your editor, and add this code:

 ``` php 
<?php
/**
 * @package storefinder
 */
$base_path = !empty($base_path) ? $base_path : $modx->getOption('core_path').'components/storefinder/';

```

 You'll see here that we're setting a $base\_path variable if and only if it's not already set. Why? Well, this allows us to do development outside our target directory (like we're doing now). If no base\_path is set, then we simply point it to where the component will be installed: core/components/storefinder/

 Now on to the brunt of the code. You've got your snippet working, you're in an easy development environment, and now you're ready to get that model working. First off, add these lines:

 ``` php 
$modx->addPackage('storefinder',$base_path.'model/');

```

 This will add the package to xPDO, and allow you to use all of xPDO's functions with your model (See [addPackage](/xpdo/2.x/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage") for full syntax). Let's test it out:

 ``` php 
$stores = $modx->getCollection('sfStore');
echo 'Total: '.count($stores);

```

 Note the first time you run this, it might throw an error. This is because xPDO is dynamically creating your database table from your schema. After running, it should show "Total: 0".

 Let's add a few records into the database for testing. Above the getCollection call, add:

 ``` php 
$store = $modx->newObject('sfStore');
$store->fromArray(array(
    'name' => 'Store 1',
    'address' => '12 Grimmauld Place',
    'city' => 'London',
    'country' => 'England',
    'zip' => '12345',
    'phone' => '555-2134-543',
));
$store->save();
$store = $modx->newObject('sfStore');
$store->fromArray(array(
    'name' => 'Store 2',
    'address' => '4 Privet Drive',
    'city' => 'London',
    'country' => 'England',
    'zip' => '53491',
    'phone' => '555-2011-978',
));
$store->save();

```

 Run this **only once** (unless you want duplicate data). That should populate your table with some data, and then output 'Total: 2', assuming you didn't remove the getCollection lines. After you've run it, go ahead and erase those lines.

 Okay, now we've got our model running smoothly! For those of you who are already familiar with component development, the second part of this tutorial will be dealing with finishing our Component's scenario. You can stop reading if you want.

 **Part 2 Coming Soon...**

## See Also

- [Generating the xPDO Model Code](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code "Generating the Model Code")
- [More Examples of xPDO XML Schema Files](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files "More Examples of xPDO XML Schema Files")
- [Reverse Engineer xPDO Classes from Existing Database Table](case-studies-and-tutorials/reverse-engineer-xpdo-classes-from-existing-database-table "Reverse Engineer xPDO Classes from Existing Database Table")
- <http://svn.modxcms.com/docs/display/revolution/PHP+Coding+in+MODx+Revolution%2C+Pt.+I>