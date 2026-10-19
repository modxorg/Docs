---
title: "Custom Users"
description: "Guide to extending the MODX Revolution modUser class to add custom user data and functionality, including schema, model generation, and usage."
_old_id: "355"
_old_uri: "2.x/developing-in-modx/advanced-development/extending-moduser"
---

## Intended Audience

For developers who need extra data on their MODX users and extra functionality on the related classes. The steps below are technical and rely on xPDO: familiarity with xPDO objects and methods (e.g. [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")) is required.

The quick way out is a separate table with a foreign key back to `modx_users`. This article covers the deeper integration instead: extending the core `modUser` class.

### See Also

- [Reverse Engineer xPDO Classes from Existing Database Table](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer "Reverse Engineer xPDO Classes from Existing Database Table")
- [More Examples of xPDO XML Schema Files](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files")
- [Generating the Model Code](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")



## The Rules

Extending `modUser` does **not** mean writing to the `modx_users` table. You add a separate related table and bind it to the original table by a foreign key. Never replace the `modUser` class outright: build on it.

The only trace of an extended user is its `class_key` — changed from `MODX\Revolution\modUser` (the default in 3.x; `modUser` in 2.x) to the extended class name.


Key rules for extending `modUser`:

1. Use your extension only to access your extra data. Do not interact with user objects that have not been extended.
2. Do not replicate existing `modUser` functionality. Use the built-in user handling instead.
3. Learn `modUser` and `modPrincipal` before coding. Some of their methods (attributes, for one) work per context or resource.
4. Work with attributes through `modPrincipal::loadAttributes()` / `getAttributes()`. They are driven by the `principal_targets` system setting.
5. Access `modUser` methods through `modUser` suggestions.

## Steps to extend modUser

### 1. Create the extended user schema and generate a model

Create an extended user schema that extends modUser. There is no aggregate relation upwards from your "main" class which is extending modUser.

The table prefix for the ancillary table is set in the `<model>` node.

#### Simple Example

We add a single extra attribute (e.g. a _facebook\_url_) to the user data. In the database this means a separate table with 2 columns: a foreign key back to the **modx\_users** table and the new attribute:

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

The extension of modUser happens within a single _object_ node.

#### More Involved Example

Deprecated: `index="unique"` — declare indexes in their own node instead:

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

Parse and create the model map for this schema. The process is out of scope here: see [Using Custom Database Tables in your 3rd Party Components](extending-modx/tutorials/using-custom-database-tables "Using Custom Database Tables in your 3rd Party Components").

### 2. Edit the extended user class

Set `class_key` in `_modx_users` to your extended class (e.g., `extUser`). Default is `MODX\Revolution\modUser`.

Edit the generated `extuser.class.php` (found in `model/mysql/`):

``` php
<?php
/**
 * @package extendeduser
 * @subpackage user.mysql
 */
use MODX\Revolution\modUser;
class extUser extends modUser {
    function __construct(xPDO $xpdo) {
        parent::__construct($xpdo);
        $this->set('class_key','extUser');
    }
}
?>
```

### 3. Create (or edit) extension_packages in System Settings

In System settings (System menu), search for [extension_packages](building-sites/settings/extension_packages "extension_packages").

**If the key already exists**, add inside the JSON array:

``` php
,{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}
```

**If the key does not exist**, create a new system setting:

- Name: `extension_packages`
- Key: `extension_packages`
- Fieldtype: Textfield
- Value:

``` php
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}}]
```

### 4. Create a class to access and utilize your extended user class

To interact with your extended data, create a class to access it. You'll typically do this in a Snippet, Plugin, or CMP.

#### Snippet Example

Here's how you might interact with your extended data in a Snippet:

``` php
$modx->addPackage('extendeduser', MODX_CORE_PATH . 'components/extendeduser/model/', 'ext_');
$user = $modx->getObject('extUser', 123); // where 123 is the id of a user
$data = $user->getOne('Data'); // use the alias from the schema
// toArray will print all the extra data, e.g. facebook_url
return print_r($data->toArray(), true);
```

#### More complex example

``` php
<?php
/**
 *  File        sample.class.php (requires MODX Revolution 2.x)
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
if (!class_exists('Extendeduser')) {
    class Extendeduser
    {
        function __construct(modX $modx, array $config= array ()) {
            /* Import modx */
            $this->modx= $modx;
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

#### 5.) Accessing the extended user class

In our example we will be accessing our extended user throughout our site, therefore we load it as a service as shown in the following example:

``` php
<?php
$x = $modx->getService('extendeduser','Extendeduser',$modx->getOption('core_path',null, MODX_CORE_PATH).'components/extendeduser/',$scriptProperties);
if (!($x instanceof Extendeduser)) {
    $modx->log(modX::LOG_LEVEL_ERROR,'[Extendeduser] Could not load Extendeduser class.');
    $modx->event->output(true);
}
return;
```

## Noteworthy items

1. Any pre-existing user will still have `modUser` as the `class_key` and therefore will not be extended or produce user objects of type `extUser` unless you change it.
2. `modUser::setSudo()` – the preferred way to set the privileged `sudo` flag, since mass‑assignment of `sudo` is blocked in `modUser::set()`.
3. `modUser::save()` is overridden to fire MODX‑specific events (e.g. `OnUserBeforeSave`) and to set `createdon` for new users. Be aware that saving an extended user will trigger these events.
4. Double‑check the `modx.mysql.schema.xml` file to ensure you are not colliding with existing class names or aliases; otherwise your extensions may supersede the default `modUser` definitions (including attributes like `Profile`).
5. The `extUser` will **not** have a table created in the database, but the attached relations will.
6. The extended class table(s) **must** be in the same database as the regular `_modx_\_users` table.
7. Symptoms of step 3 (extension _packages path) not being correct:
   - Any user with the `class_key` of `extUser` will return an error upon login: "User cannot be found…". If this is the admin, access your database directly, revert the `class_key` to `MODX\Revolution\modUser`, log in correctly, and then correct the path.
   - The snippets attached to the class may intermittently work or fail altogether.
8. To get counts from your data (i.e. how many phone numbers does this person have) use either (any criteria can be added):

``` php
    $this->modx->getCount('extPhones', array('user' => $this->userID));
    $this->modx->getCount('extPhones');
```

Multiple extended modUser systems can run side by side: repeat the process for each extension, changing `class_key` to the respective extended class. They can even be combined — for example, by extending the rpx extension into a hybrid system.

## Suggested additional considerations

- Model files can be edited with methods and descriptions (see MODX/xPDO models).
- Automate on user login: see splittingred's modActiveDirectory:
    - Plugin: `plugin.activedirectory.php`
    - Events: `onauthentication.php`, `onusernotfound.php`

## Extended modUser Classes currently Available

[modActiveDirectory](http://github.com/splittingred/modActiveDirectory) provides interaction with a Microsoft Domain Controller.

[rpx extension](http://github.com/opengeek/engaged) allows people to login via Facebook and other social networking mediums.

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
