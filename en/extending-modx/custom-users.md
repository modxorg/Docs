---
title: "Custom Users"
description: "Guide to extending the MODX Revolution modUser class to add custom user data and functionality, including schema, model generation, and usage."
_old_id: "355"
_old_uri: "2.x/developing-in-modx/advanced-development/extending-moduser"
---

## Intended Audience

Extra user data can sit in its own table with a foreign key to `modx_users`. This page is the deeper path: extend the core `modUser` class and add functionality on the related classes.

The steps use xPDO. You need objects and methods such as [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject").

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
5. Call `modUser` methods on the user object.

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

### 3. Register the model

Create a `MODX\Revolution\modExtensionPackage` row. The namespace `extendeduser` must already exist: the loader joins that row and passes the namespace name to `addPackage`. Leave `path` empty to use the namespace directory. MODX appends `model/` when it loads the row. `table_prefix` is `ext_`, the same prefix as the schema on this page.

``` php
$package = $modx->newObject(\MODX\Revolution\modExtensionPackage::class);
$package->fromArray([
    'namespace' => 'extendeduser',
    'name' => 'extendeduser',
    'table_prefix' => 'ext_',
]);
$package->save();
```

The system setting [extension_packages](building-sites/settings/extension_packages "extension_packages") is still read. Its docblock marks it deprecated. In that JSON the `path` already ends in `model/`, because the old loader does not append `model/` itself. Do not copy that path into the `modExtensionPackage` row.

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

``` php
$modx->addPackage('extendeduser', MODX_CORE_PATH . 'components/extendeduser/model/', 'ext_');
$user = $modx->getObject('extUser', 123); // where 123 is the id of a user
$data = $user->getOne('Data'); // use the alias from the schema
// toArray will print all the extra data, e.g. facebook_url
return print_r($data->toArray(), true);
```

#### More complex example

``` php
class Extendeduser
{
    public function __construct(\MODX\Revolution\modX $modx, array $config = [])
    {
        $this->modx = $modx;
        $extPath = $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/extendeduser/';
        $this->modx->addPackage('extendeduser', $extPath . 'model/', 'ext_');
        $this->userID = $modx->getOption('userID', $config, $modx->user->get('id'));
        $this->userObj = $this->modx->getObject('modUser', $this->userID);
    }

    public function getPhoneObj()
    {
        return $this->userObj->getMany('Phones');
    }
}
```

### 5. Access the extended user class

Load the class as a service when the extended user is needed across the site:

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

1. Any pre-existing user still has `MODX\Revolution\modUser` as the `class_key`. It is not loaded as `extUser` until you change that value.
2. `modUser::setSudo()` – the preferred way to set the privileged `sudo` flag, since mass‑assignment of `sudo` is blocked in `modUser::set()`.
3. `modUser::save()` is overridden to fire MODX‑specific events (e.g. `OnUserBeforeSave`) and to set `createdon` for new users. Be aware that saving an extended user will trigger these events.
4. Double‑check the `modx.mysql.schema.xml` file to ensure you are not colliding with existing class names or aliases; otherwise your extensions may supersede the default `modUser` definitions (including attributes like `Profile`).
5. The `extUser` will **not** have a table created in the database, but the attached relations will.
6. The extended class table(s) **must** be in the same database as `modx_users`.
7. Symptoms of a wrong model path:
   - A user whose `class_key` is `extUser` cannot log in. The core does not print a dedicated sentence for that failure. If that user is the admin, set `class_key` back to `MODX\Revolution\modUser` in the database, log in, and then fix the path.
   - The snippets attached to the class may intermittently work or fail altogether.
8. To get counts from your data (i.e. how many phone numbers does this person have) use either (any criteria can be added):

``` php
    $this->modx->getCount('extPhones', array('user' => $this->userID));
    $this->modx->getCount('extPhones');
```

Multiple extended modUser systems can run side by side: repeat the process for each extension, changing `class_key` to the respective extended class. They can even be combined, for example by extending the rpx extension into a hybrid system.

## Suggested additional considerations

- Model files can be edited with methods and descriptions (see MODX/xPDO models).
- Automate on user login: see splittingred's modActiveDirectory:
    - Plugin: `plugin.activedirectory.php`
    - Events: `onauthentication.php`, `onusernotfound.php`

## Extended modUser Classes currently Available

[modActiveDirectory](http://github.com/splittingred/modActiveDirectory) provides interaction with a Microsoft Domain Controller.

[rpx extension](http://github.com/opengeek/engaged) allows people to login via Facebook and other social networks.

## Modifying class\_key

Changing the class\_key of a built-in MODX object changes which aggregates and composites the object has. If a user has class\_key `extUser`, you can still retrieve the object with the parent class:

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
