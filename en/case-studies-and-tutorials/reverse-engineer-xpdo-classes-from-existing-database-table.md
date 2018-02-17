---
title: "Reverse Engineer xPDO Classes from Existing Database Table"
_old_id: "265"
_old_uri: "2.x/case-studies-and-tutorials/reverse-engineer-xpdo-classes-from-existing-database-table"
---

- [Introduction](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-Introduction)
  - [Access Points](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-AccessPoints)
- [Creating a MySQL table](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-CreatingaMySQLtable)
- [Create Reverse Engineering Script](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-CreateReverseEngineeringScript)
- [Defining Key Relationships](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-DefiningKeyRelationships)
- [Accessing your Data](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-AccessingyourData)
- [See Also](#ReverseEngineerxPDOClassesfromExistingDatabaseTable-SeeAlso)
 


## Introduction

 The xPDO Object-Relational-Bridge (ORB) relies on a series of PHP classes to provide an interface to database tables. These PHP classes can be generated automatically by parsing a specially formatted XML file, by reverse engineering existing database tables, or they can even be written by hand (masochists only). The easiest approach when dealing with a custom database table is to reverse engineer existing MySQL database tables: MySQL has been around for a long time, and there are numerous tutorials and books out there to help you learn how to use it.

 If you're wanting to extend existing MODx classes, e.g. by creating [Custom Resource Classes](developing-in-modx/advanced-development/custom-resource-classes "Custom Resource Classes"), then usually you will start this process with the XML file. 

 Our process will be this:

1. Create a database table (or tables) using MySQL (this can be done via the mysql command line or any number of MySQL GUI clients, e.g. phpMyAdmin or SQL-Yog).
2. Copy the "reverse-engineering" script (provided below) to your webserver. Put it at the root of your MODx install (this is important so the script can find xPDO). This script uses the xPDO classes to sniff out the definition of the table you just created.
3. If needed, modify the generated XML definition file to define foreign key relationships, then re-run the script to regenerate the class files.
4. Connect your newly created class and schema files to a Snippet or Custom Manager Page.

 Even if you plan to deploy your code and its associated data models onto multiple other other platforms, it's generally considered **much** easier to develop it with a single database in mind. Once you've done that, you can then focus on abstraction later. You can of course jump right into the xPDO definitions and classes that will define database-agnostic classes and schemas, but it is more difficult for the novice precisely because it deals with abstractions. The further you get from concrete examples, the more difficult the development becomes.

### Access Points

 xPDO is the engine behind this database abstraction – ultimately it needs PHP classes that describe the data model. You can supply an XML schema which will generate the PHP files which will in turn generate the necessary tables – this is how third-party components are distributed because it provides a predictable and unified way of creating new database tables. But in this example, we're going to start with a database table and use that to generate the XML schema, which will in turn generate the necessary PHP classes.

 In the image below, it's important to realize that you can start with any one component, and the other 2 can be automatically generated.

 ![](/download/attachments/33226895/xPDO_Forward_and_Reverse.jpg?version=1&modificationDate=1322284979000)

 Arguably, the easiest "access point" to the xPDO technology is to start with some existing database tables and use those to generate the XML schema file and PHP classes, and that's what this page demonstrates.

## Creating a MySQL table

 One of the easiest ways to create a MySQL table is to use one of the many GUI editors available. SQL-Yog is a great desktop application for MySQL management on Windows, Macs offer Sequel Pro. If you are using a web application, phpMyAdmin is nearly ubiquitous.

## Create Reverse Engineering Script

 We need a script to scan your database tables and generate the XML schema and PHP files. In general, this is a "disposable" script that you may only need to run once. You will probably need to make adjustments and run it more than once, but in concept and in function, this script is merely scaffolding.

 You can download a version of this script and see a tutorial that describes using this method with a simple custom DB table at [Bob's Guides](http://bobsguides.com/custom-db-tables.html). 

 The crux of this script are 2 xPDO methods (note, however, that the methods belong to children objects):

- writeSchema
- parseSchema

 Together, they behave similarly to other ORM's, e.g. Doctrine

 ```
<pre class="brush: php">
// Sample Doctrine code:
Doctrine_Core::generateModelsFromDb();

``` Here's a reverse-engineering script that allows a bit of configuration and does a little error checking:

 ```
<pre class="brush: php">
<?php /* ------------------------------------------------------------------------------
  ================================================================================
  === Reverse Engineer Existing MySQL Database Tables to xPDO Maps and Classes ===
  ================================================================================

  SYNOPSIS:
  This script generates the XML schema and PHP class files that describe custom
  database tables.

  This script is meant to be executed once only: after the class and schema files
  have been created, the purpose of this script has been served, though you will need to run it again if you modify your schema.

  USAGE:
  1. Upload this file to the root of your MODx installation
  2. Set the configuration details below
  3. Navigate to this script in a browser to execute it,
  e.g. http://yoursite.com/thisscript.php
  or, you can do this via the command line, e.g. php this-script.php

  INPUT:
  Please configure the options below.

  OUTPUT:
  Creates XML and PHP files:
  core/components/$package_name/model/$package_name/*.class.php
  core/components/$package_name/model/$package_name/mysql/*.class.php
  core/components/$package_name/model/$package_name/mysql/*.inc.php
  core/components/$package_name/schema/$package_name.mysql.schema.xml

  SEE ALSO:
  http://modxcms.com/forums/index.php?topic=40174.0
  http://rtfm.modx.com/display/revolution20/Using+Custom+Database+Tables+in+your+3rd+Party+Components
  http://rtfm.modx.com/display/xPDO20/xPDOGenerator.writeSchema
  ------------------------------------------------------------------------------ */

/* ------------------------------------------------------------------------------
  CONFIGURATION
  ------------------------------------------------------------------------------
  Be sure to create a valid database user with permissions to the appropriate
  databases and tables before you try to run this script, e.g. by running
  something like the following:

  CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'y0urP@$$w0rd';
  GRANT ALL ON your_db.* TO 'your_user'@'localhost';
  FLUSH PRIVILEGES;

  Be sure to test that the login criteria you created actually work before
  continuing. If you *can* log in, but you receive errors (e.g. SQLSTATE[42000] [1044] )
  when this script runs, then you may need to grant permissions for CREATE TEMPORARY TABLES
  ------------------------------------------------------------------------------ */
$debug = false;         // if true, will include verbose debugging info, including SQL errors.
$verbose = true;        // if true, will print status info.
// The XML schema file *must* be updated each time the database is modified, either
// manually or via this script. By default, the schema is regenerated.
// If you have spent time adding in composite/aggregate relationships to your
// XML schema file (i.e. foreign key relationships), then you may want to set this
// to 'false' in order to preserve your custom modifications.
$regenerate_schema = true;

// Class files are not overwritten by default
$regenerate_classes = true;

// Your package shortname:
$package_name = '';


// Database Login Info can be set explicitly:
$database_server = 'localhost';          // most frequently, your database resides locally
$dbase = '';           // name of your database
$database_user = '';           // name of the user
$database_password = '';   // password for that database user
// if this file is not placed side by side with the config.core.php file, add the directory path
include_once 'config.core.php';
// OR, use your MODx Revo connection details.  Just uncomment the next line:
//include(MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php');
// If your tables use a prefix, this will help identify them and it ensures that
// the class names appear "clean", without the prefix.
$table_prefix = '';
// If you specify a table prefix, you probably want this set to 'true'. E.g. if you
// have custom tables alongside the modx_xxx tables, restricting the prefix ensures
// that you only generate classes/maps for the tables identified by the $table_prefix.
$restrict_prefix = false;

//------------------------------------------------------------------------------
//  DO NOT TOUCH BELOW THIS LINE
//------------------------------------------------------------------------------
if (!defined('MODX_CORE_PATH')) {
    print_msg('<h1?>Reverse Engineering Error
        <p>MODX_CORE_PATH not defined! Did you include the correct config file?</p>');
    exit;
}

$xpdo_path = strtr(MODX_CORE_PATH . 'xpdo/xpdo.class.php', '\\', '/');
include_once ( $xpdo_path );

// A few definitions of files/folders:
$package_dir = MODX_CORE_PATH . "components/$package_name/";
$model_dir = MODX_CORE_PATH . "components/$package_name/model/";
$class_dir = MODX_CORE_PATH . "components/$package_name/model/$package_name";
$schema_dir = MODX_CORE_PATH . "components/$package_name/model/schema";
$mysql_class_dir = MODX_CORE_PATH . "components/$package_name/model/$package_name/mysql";
$xml_schema_file = MODX_CORE_PATH . "components/$package_name/model/schema/$package_name.mysql.schema.xml";

// A few variables used to track execution times.
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;

// Validations
if (empty($package_name)) {
    print_msg('<h1>Reverse Engineering Error</h1>
                <p>The $package_name cannot be empty!  Please adjust the configuration and try again.</p>');
    exit;
}

// Create directories if necessary
$dirs = array($package_dir, $schema_dir, $mysql_class_dir, $class_dir);

foreach ($dirs as $d) {
    if (!file_exists($d)) {
        if (!mkdir($d, 0777, true)) {
            print_msg(sprintf('<h1>Reverse Engineering Error</h1>
                                <p>Error creating <code>%s</code></p>
                                <p>Create the directory (and its parents) and try again.</p>'
                            , $d
            ));
            exit;
        }
    }
    if (!is_writable($d)) {
        print_msg(sprintf('<h1>Reverse Engineering Error</h1>
                        <p>The <code>%s</code> directory is not writable by PHP.</p>
                        <p>Adjust the permissions and try again.</p>'
                        , $d));
        exit;
    }
}

if ($verbose) {
    print_msg(sprintf('<br></br><strong>Ok:</strong> The necessary directories exist and have the correct permissions inside of <br></br>`%s`', $package_dir));
}

// Delete/regenerate map files?
if (file_exists($xml_schema_file) && !$regenerate_schema && $verbose) {
    print_msg(sprintf('<br></br><strong>Ok:</strong> Using existing XML schema file:<br></br>`%s`', $xml_schema_file));
}

$xpdo = new xPDO("mysql:host=$database_server;dbname=$dbase", $database_user, $database_password, $table_prefix);

// Set the package name and root path of that package
$xpdo->setPackage($package_name, $package_dir, $package_dir);
$xpdo->setDebug($debug);

$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$time = time();
//Use this to create an XML schema from an existing database
if ($regenerate_schema) {
    if (is_file($xml_schema_file)) {
        $rename = $xml_schema_file . '-' . $time;
        print_msg("<br></br>The old XML schema file: <br></br>`{$xml_schema_file}` <br></br>has been renamed to <br></br>`{$rename}`.");
        rename($xml_schema_file, $rename);
    }
    $xml = $generator->writeSchema($xml_schema_file, $package_name, 'xPDOObject', $table_prefix, $restrict_prefix);
    if ($verbose) {
        print_msg(sprintf('<br></br><strong>Ok:</strong> XML schema file generated: `%s`<hr></hr>', $xml_schema_file));
    }
}

// Use this to generate classes and maps from your schema
if ($regenerate_classes) {
    if (is_dir($class_dir)) {
        $rename = $class_dir . '-' . $time;
        print_msg("<br></br>The old class dir: <br></br>`{$class_dir}` <br></br>has been renamed to <br></br>`{$rename}`.");
        rename($class_dir, $rename);
    }
    $generator->parseSchema($xml_schema_file, $model_dir);
}

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf("%2.4f s", $totalTime);

if ($verbose) {
    print_msg("<br></br><br></br><strong>Finished!</strong> Execution time: {$totalTime}<br></br>");

    if ($regenerate_schema) {
        print_msg("<br></br>If you need to define aggregate/composite relationships in your XML schema file, be sure to regenerate your class files.");
    }
}

exit();

/* ------------------------------------------------------------------------------
  Formats/prints messages.  The behavior is different if the script is run
  via the command line (cli).
  ------------------------------------------------------------------------------ */

function print_msg($msg) {
    if (php_sapi_name() == 'cli') {
        $msg = preg_replace('#<br></br>#i', "\n", $msg);
        $msg = preg_replace('#<h1>#i', '== ', $msg);
        $msg = preg_replace('#</h1>#i', ' ==', $msg);
        $msg = preg_replace('#<h2>#i', '=== ', $msg);
        $msg = preg_replace('#</h2>#i', ' ===', $msg);
        $msg = strip_tags($msg) . "\n";
    }
    print $msg;
}
/* EOF */

``` 

 To check whether or not this script succeeded, take a look inside the folder that is mentioned in its output, e.g. 
**/user/youruser/public\_html/core/components/yourpackage/model/yourpackage**. You should see a couple files – one for each table. If you see a TON of tables corresponding to all of MODx's tables, then try to explicitly set the database password and name – leave the following line commented out:

 ```
<pre class="brush: php">
//include('core/config/config.inc.php');

``` See <http://modxcms.com/forums/index.php?topic=40174.0> for more discussion on this script.

## Defining Key Relationships

 Once you have your XML schema file generated, you may need to edit it manually to define any foreign key relationships between your tables. It's best if you create a backup of the XML schema file, then add in your aggregate and composite relationships (see [Schema Files and Relations](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files "More Examples of xPDO XML Schema Files") for more info).

 In the scaffolding script above, set the following:

 ```
<pre class="brush: php">
$regenerate_schema = false;

``` Then re-run the script in order to push your changes in the XML to the PHP class files.

## Accessing your Data

 Once you've created the required xPDO classes, you need to use xPDO's methods to access them (e.g. in a Snippet or in a Custom Manager Page). In order for xPDO to access the objects, you have to load up the corresponding PHP classes using the **addPackage** method. **addPackage** is what triggers the PHP classes to be included.

 ```
<pre class="brush: php">
if(!$modx->addPackage('mypackage','/full/path/to/core/components/mypackage/model/','mp_')) {
    return 'There was a problem adding your package!  Check the logs for more info!';
}
$my_items = $modx->getCollection('Items');
$output = '';
if ($my_items) {
    foreach ($my_items as $item) {
        $output .= $item->get('itemname') . '<br/>';
    }
}
else {
    return 'No items found.';
}
return $output;

``` **Watch the Prefix!** 
[addPackage](/xpdo/2.x/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage") requires that you specify the correct table prefix for your package! 

## See Also

- [Schema Files and Relations](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files "More Examples of xPDO XML Schema Files") Looking at XML schema file relations
- [addPackage](/xpdo/2.x/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage") for loading up your schema
- [getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject") for loading up a single object
- [getCollection](/xpdo/2.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection") for loading up a collection of objects.
- [xPDO: Creating Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/creating-objects "Creating Objects")
- [Retrieving Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects") a demonstration of how to retrieve objects using xPDO
- [Generating the Model Code](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code "Generating the Model Code") – offers a streamlined version of the script provided here, but you can also change your class templates.
- [More Examples of xPDO XML Schema Files](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files "More Examples of xPDO XML Schema Files") – juxtaposes MySQL database tables with xPDO XML schemas
- [Build script: Reverse-engineering tables / forward-engineering classes / maps](http://forums.modx.com/thread/31778/build-script-reverse-engineering-tables-forward-engineering-classes-maps) – another example by Jason.