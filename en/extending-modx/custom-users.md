---
title: "Custom Users"
_old_id: "355"
_old_uri: "2.x/developing-in-modx/advanced-development/extending-moduser"
---

- [Intended Audience](#intended-audience)
  - [See Also](#see-also)
- [Overview](#overview)
- [Purpose](#purpose)
- [The Rules](#the-rules)
- [Steps to extending modUser](#steps-to-extending-moduser)
  - [1. ) Create the schema and generate a model](#1--create-the-schema-and-generate-a-model)
    - [Simple Example](#simple-example)
- [Suggested additional considerations](#suggested-additional-considerations)
- [Extended modUser Classes currently Available](#extended-moduser-classes-currently-available)
- [Modifying class\_key](#modifying-classkey)

##  Intended Audience 

 This article is for developers who are looking to add additional data to their MODX users and functionality to the related classes. 
 
 Although this is possible via a less integrated approach by simply adding a database table that includes a foreign key relation back to the original MODX users table, the approach outlined here is for a more thorough integration via extending the core modUser class. 
 
 The steps here are highly technical and they rely on MODX's underlying xPDO framework. You should have some familiarity with xPDO's objects and methods (e.g. [getObject](xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")) before attempting this tutorial.

###  See Also 

- [Reverse Engineer xPDO Classes from Existing Database Table](case-studies-and-tutorials/reverse-engineer-xpdo-classes-from-existing-database-table "Reverse Engineer xPDO Classes from Existing Database Table")
- [More Examples of xPDO XML Schema Files](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files "More Examples of xPDO XML Schema Files")
- [Generating the Model Code](xpdo/getting-started/creating-a-model-with-xpdo/generating-the-model-code "Generating the Model Code")

##  Overview 

 By extending the MODx Revolution authentication layer we can build very complex and varied user subsystems, e.g. for social networking, user management systems, or other applications not yet conceptualized. This ability to extend the modUser class is just one example of how to extend a core class – a similar approach could be used to extend any MODX core class.

##  Purpose 

 Extending modUser is for those situations when user authentication or user interaction need to be extended or enhanced, e.g. for easier custom authentication.

##  The Rules 

 Extending modUser does _not_ mean we are adding anything to the _modx_\_users table in the database. Instead, we will be adding a separate related table, bound to the original table via a foreign key. At no time should an extended application actually attempt to completely replace the modUser Class. We use the modUser class as our foundation and we build on it. The only indication that the user has been extended will be found by the class\_key being changed from "modUser" to the extended class name.

 Your extension should be used to access **your extension**. If the user (object) has not been extended, do not allow your extension to interact with them -- hence: let your extension die.

 MODx Revolution already handles users and probably does not need much help. While we may use your extension on \*our\* data, please do not begin writing "bloat" which is simply repeating code already provided in the modUser class. In other words use the Revolution resources for your extended users, but do not create code to replace modUser.

 Lastly, get familiar with [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser"), before you begin to code. Some methods are not one-to-one as you might assume, such as attributes, which can be assigned per context, resource, etc. Typically use the modUser suggestions to access modUser methods.

##  Steps to extending modUser 

###  1. ) Create the schema and generate a model 

 The first thing we need to accomplish, is to create an extended user schema which extends modUser. Please note that there is no aggregate relation upwards from your "main" class which is extending modUser.

####  Simple Example 

 The simplest example we could imagine is that we want to add a single extra attribute to the user data – so in the database, this would mean we have a separate table with 2 columns: one for the foreign key relation back to the **modx\_users** table, and the other column containing our new "extra" attribute, e.g. a _fackbook\_url_:

 ``` xml 
<?xml version="1.0" encoding="UTF-8"?>
<model package="extendeduser" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" tablePrefix="ext_">
        <!-- extend the modUser class -->
        <object class="extUser" extends="modUser">
                <composite alias="Data" local="id" class="Userdata" foreign="userdata_id" cardinality="one" owner="local" />
        </object>
        <object class="Userdata" table="data" extends="xPDOSimpleObject">
                <field key="userdata_id" dbtype="int" precision="11" phptype="integer" null="false" attributes="unsigned"/>
                <field key="facebook_url" dbtype="varchar" precision="100" phptype="string" null="true" />
                <index alias="userdata_id" name="userdata_id" primary="false" unique="true" type="BTREE">
                    <column key="userdata_id" length="" collation="A" null="false" />
                </index>
                <aggregate alias="extUser" local="userdata_id" foreign="id" cardinality="one" owner="foreign" />
        </object>
 </model>
```

 Note that the extending of modUser class happens all within that single _object_ node. Also notice that we specify the prefix for our ancillary table in the _model_ node: **ext\_**

####  More Involved Example 

 Note that the _index="unique"_ bit has been deprecated – the index declaration should go into its own node as in the example above.

 ``` xml 
<?xml version="1.0" encoding="UTF-8"?>
<model package="extendeduser" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" tablePrefix="ext_">
    <!-- inherit the modx user and extend it -->
    <object class="extUser" extends="modUser">
        <composite alias="Phones" local="id" foreign="user" cardinality="many" owner="local" />
        <composite alias="Table2" local="id" foreign="user" cardinality="many" owner="local" />
    </object>
    <!-- track all user phone numbers -->
    <object table="phone_numbers" extends="xPDOSimpleObject">
        <field key="user" dbtype="int" phptype="integer" null="false" default="0" index="index" />
        <field key="areacode" dbtype="varchar" precision="3" phptype="string" null="false" default="" />
        <field key="number" dbtype="varchar" precision="7" phptype="string" null="false" default="" />
        <aggregate alias="extUser" local="user" foreign="id" cardinality="one" owner="foreign" />
    </object>
    <!-- user extension -->
    <object table="table2" extends="xPDOSimpleObject">
        <field key="user" dbtype="int" phptype="integer" null="false" default="0" index="index" />
        <field key="myspaceurl" dbtype="varchar" precision="255" phptype="string" null="false" />        
        <aggregate alias="extUser" local="user" foreign="id" cardinality="one" owner="foreign" />
    </object>
</model>
```

 You will need to parse and create the model map associated with this schema. As this process is out of the scope of this topic, please refer to [Using Custom Database Tables in your 3rd Party Components](case-studies-and-tutorials/using-custom-database-tables-in-your-3rd-party-components "Using Custom Database Tables in your 3rd Party Components") for further information.

###  2.) Edit the extuser.class.php 

 To access the extended class, we have to inform modUser that the user in question has been extended. The _modx_\_users table in the database contains a field specifically for this purpose: class\_key. The default value in this field is modUser. As users are added to your site using your extension we need to "force" the name of our "main" class in the schema, namely extUser in our example.

 Edit the extuser.class.php file created when you generated the model. The specific file is the one found in the top of the model tree (you should see a mysql directory) in this same folder. Edit the file to resemble the following:

 ``` php 
 <?php
/**
 * @package extendeduser
 * @subpackage user.mysql
 */
class extUser extends modUser {
    function __construct(xPDO & $xpdo) {
        parent::__construct($xpdo);
        $this->set('class_key','extUser');
    }
}
?>
```

###  3.) Create (or edit) _extension\_packages in System Settings_

 Access the System settings found in the System menu of the manager, and search for [extension\_packages](administering-your-site/settings/system-settings/extension_packages "extension_packages").

 **If the key already exists**, add inside the json array

 ``` php 
,{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}
```

 **If the key does not exists**

- Create a new system setting with name of extension\_packages
- Key of extension\_packages
- Fieldtype: Textfield
- value
 
``` php 
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}]
```

### 4.) Final Step Create a class to access and utilize your extended class

 The whole reason for extending a core class is so you could interact with your extended data more easily. So at some point in a Snippet or Plugin or CMP, you'd be working with your new data.

####  Simple Example 

 Here's how you might interact with your extended data in a Snippet:

 ``` php 
$modx->addPackage('extendeduser', MODX_CORE_PATH . 'components/extendeduser/model/', 'ext_');
$user = $modx->getObject('extUser', 123); // where 123 is the id of a user
$data = $user->getOne('Data'); // use the alias from the schema
// toArray will print all the extra data, e.g. facebook_url
return print_r($data->toArray(), true);
```

####  More complex example 

 ``` php 
 <?php
/**
 *  File        sample.class.php (requires MODx Revolution 2.x)
 * Created on    Aug 18, 2010
 * Project        shawn_wilkerson
 * @package     extendedUser
 * @version    1.0
 * @category    User Extension
 * @author        W. Shawn Wilkerson
 * @link        http://www.shawnWilkerson.com
 * @copyright  Copyright (c) 2010, W. Shawn Wilkerson.  All rights reserved.
 * @license      GPL
 *
 */
if (!class_exists('Sampleclass')) {
    class Sampleclass
    {
        function __construct(modX & $modx, array $config= array ()) {
            /* Import modx as a reference */
            $this->modx= & $modx;
            /* Establish the environment */
            $this->extPath= $modx->getOption('core_path',null, MODX_CORE_PATH).'components/extendeduser/';
            $this->modx->addPackage('extendeduser', $this->extPath .'model/', 'ut_');
            $this->_config= array_merge(array (
                'userID' => $this->modx->user->get('id'),
            ), $config);
            /* Define the user */
            $this->userObj = $this->setUser($this->_config['userID']);
            $this->userID = $this->userObj->get('id');
        }
        function __destruct() {
            unset ($this->extPath, $this->userObj, $this->userID, $this->_config);
        }
        /**
         * Returns object of type Phone.
         */
        public function getPhoneObj() {
            $this->userObj->getOne('Phones');
            return $this->userObj->Phones;
        }
        /**
         * Returns object utUser instance of modUser Defaults to current user.
         * @param $userID
         */
        public function getUserObj($userID) {
            return $this->modx->getObject('modUser', $userID);
        }
        /**
         * Establishes the user.
         * @param int $userID
         */
        public function setUser($userID){
            return $this->getUserObj($userID);
        }
    }
}
```

####  5.) Accessing the class 

 In our example we will be accessing our extended user throughout our site, therefore we load it as a service as shown in the following example:

 ``` php 
<?php
$x = $modx->getService('extendeduser','Sampleclass',$modx->getOption('core_path',null, MODX_CORE_PATH).'components/extendeduser/',$scriptProperties);
if (!($x instanceof Extendeduser)) {
    $modx->log(modX::LOG_LEVEL_ERROR,'[Extendeduser] Could not load Extendeduser class.');
    $modx->event->output(true);
}
return;
```

##  Noteworthy items 

1. Any pre existing user, will still have modUser as the class\_key and therefore will **not** be extended or produce user objects of type extUser unless you change it
2. Double check the modx.mysql.schema.xml file to make sure you are not using classes or alias it is already using, as yours will supersede the default moduser prohibiting you access to items such as the user attributes (with alias Profile)
3. The extUser will **not** have a table created in the database, but the attached relations will
4. The extended class table(s) **must** be in the same database as the regular _modx_\_users table
5. Symptoms of step 3 (extension\_packages path) not being correct: 
  1. Any user with the class\_key of extUser will return an error upon login: "User cannot be found...". If this is the admin, access your database directly, return the class\_key to modUser, login correctly and then alter the path to a correct representation of the path.
  2. The snippets attached to the class will intermittently work or fail altogether
6. To get counts from your data (i.e. how many phone numbers does this person have) use either (any criteria can be added): 

``` php 
    $this->modx->getCount('extPhones', array('user' => $this->userID));
    $this->modx->getCount('extPhones');
```

 It is completely possible to have multiple extended modUser systems active at the same time. It would even be feasible to extend Jason Coward's rpx extension into a hybrid system utilizing the benefits of both systems. It is also completely possible to have multiple extended modUser applications running autonomously. This is simply done by following this process for each of your extensions, changing only the "class\_key" field to reflect the extended class belonging to each respective user.

##  Suggested additional considerations 

 The model files can be edited with methods and descriptions. Take a look at much of the MODx / xPDO models and you will see this done extensively.

 This process can be automated and captured upon user login. For the sake of brevity, it is best to refer you to splittingred's github, where he provides a real world application:

 The plugins:

- <http://github.com/splittingred/modActiveDirectory/blob/master/core/components/activedirectory/elements/plugins/plugin.activedirectory.php>

 The events:

- <http://github.com/splittingred/modActiveDirectory/blob/master/core/components/activedirectory/elements/events/onauthentication.php>
- <http://github.com/splittingred/modActiveDirectory/blob/master/core/components/activedirectory/elements/events/onusernotfound.php>

##  Extended modUser Classes currently Available 

 [modActiveDirectory](http://github.com/splittingred/modActiveDirectory) an application which provides interaction with a Microsoft Domain Controller

 [rpx extension](http://github.com/opengeek/engaged) allows people to login via Facebook and other social networking medium

## Modifying class\_key

 Whenever you modify the class\_key for a built-in MODX object, you need to be aware of how behavior changes. The class\_key affects what aggregates and composites are available to the object. For example, if a user has a class\_key "extUser", you can still retrieve the object using the parent class:

 ``` php 
// both of these work when class_key is "extUser":
$User = $modx->getObject('modUser', 123);
$User = $modx->getObject('extUser', 123);
```

 However, the aggregates or composite relationships depend on the _stored value_ of the class\_key.

 ``` php 
$Data = $modx->newObject('Userdata');
$Data->set('facebook_url',$url); // ... etc ...
$User->addOne($Data);
$User->save(); // this will not save related data if the class_key does not have the relations defined!
$User->set('class_key', 'extUser');
$User->save(); // now we can set related data
$User->addOne($Data);
$User->save(); // and now we can save related data
```
