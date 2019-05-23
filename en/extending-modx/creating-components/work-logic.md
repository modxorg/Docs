---
title: "We think over the logic of work, determine the schema and model of the database"
translation: "extending-modx/creating-components/work-logic"
---

The preparatory work has been completed, and today we proceed directly to the development of the component.

We write the component mailings, so you need to think about the basic logic of the work. I draw your attention to the fact that our goal is **to learn how to write components** for MODX, and not to write the best newsletter in the world. Therefore, I ask you to restrain your ambitions right away and not to suggest adding mega-functionality.

The logic of work seems to me like this:

* We have an object **Newsletter** - everything that is needed to form letters in it: subject, template, sender, etc.
* Object **Subscriber** subscribes to the newsletter. For now, we will assume that this should be an authorized user, but we keep in mind that we can add guests.
* When some events occur, the Subscription object is called and executes certain code that generates letters and saves them as an object **Queue**. For greater versatility, you can carry this code into a separate snippet.
* The server executes the mailing script and sends emails from the Queue on a schedule, at least every 5 minutes. If the queue is empty, then everything has already been sent.

Accordingly, in the admin we will have a page for managing subscriptions, adding subscribers to them, and viewing the message queue, with the ability to delete or send something right now. Perhaps we will add a message verification page to send test messages for debugging.

We have decided on the functionality, now we need to write a database schema to store our data.

## DB table schema

The schema in MODX is an XML file in which all objects and their relationships are described. It does not participate in the work of the component, it is not used anywhere, it is only needed to generate the model.

The scheme may change as the supplement develops. You can add or remove objects, indexes, and relationships. No need to try to provide all the columns in the tables at once - you can add them at any time.

The basic principles of the xPDO scheme can be [read the official documentation](extending-modx/xpdo/custom-models/defining-a-schema), I'll just show you the finished file and explain what is there and how.

We open [the scheme in my repository on GitHub](https://github.com/bezumkin/Sendex/blob/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5/core/components/sendex/model/schema/sendex.mysql.schema.xml) and look.

Each object is described in the **object** tag. In the attributes of an object, you specify its name and the database table in which it will be stored. The table is specified **without a site prefix** - it will be added automatically by MODX itself when needed.

``` xml
<object class="sxNewsletter" table="sendex_newsletters" extends="xPDOSimpleObject">
```

Our object is obliged to extend an existing MODX object, usually `xPDOSimpleObject` is used. From it we will inherit the id column as the primary key - therefore, anywhere in the scheme id is not indicated for objects.

But if we inherited `xPDOObject`, then we would have to write it ourselves. If you do not want problems, just always use `xPDOSimpleObject`.

Further in the object its fields are described:

``` xml
<field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" />
<field key="description" dbtype="text" phptype="text" null="true" default="" />
<field key="active" dbtype="tinyint" precision="1" phptype="boolean" attributes="unsigned" null="true" default="1" />
```

* **key** - field name
* **dbtype** - type of field in the database: `int, varchar, text, etc.`.
* **precision** - accuracy, or field size. Required for fixed-length types, such as `int` and `varchar`. The `text` fields are not specified.
* **phptype** - the type of a variable in php, xPDO will change the value according to it: `integer, string, float, json, array`. Note that `json` and `array` is an invention of MODX.
* **Array** is for serialized data, with type preservation, and `json` is regular json. When saving such a field, its value will be run via `serialize ()` or `json_encode ()`, and when received, via `unserialize ()` and `json_decode`.
Thus, it is possible to conveniently store arrays in a database.
* **null** - can the field be empty? If you specify here `false`, and when working with an object you do not send a value, there will be an error in the log.
* **default** - the default value will be used if the field can be `null` and there is no data for it when saving
* **attributes** - additional properties for transfer to the database. They are exactly the same as in mySql

These are only basic properties, MODX stores many undocumented features, so I recommend carefully looking at its own scheme, and just copy what you need.

After describing the columns of the table, you need to specify the indexes so that our table works quickly. In most cases, it is enough to add to the index those fields that will be sampled:

``` xml
<index alias="name" name="name" primary="false" unique="false" type="BTREE">
    <column key="name" length="" collation="A" null="false" />
</index>
<index alias="active" name="active" primary="false" unique="false" type="BTREE">
    <column key="active" length="" collation="A" null="false" />
</index>
```

Of the important attributes here:

* **primary** - is the index primary? Usually - no, the primary index is in our `id` field from `xPDOSimpleObject`.
* **unique** - is the index unique? That is, can table 2 and more have the same values for this field? We have a unique index in the id column again.
And finally - the relationship of objects to each other:

``` xml
<composite alias="Subscribers" class="sxSubscriber" local="id" foreign="newsletter_id" cardinality="many" owner="local" />
<aggregate alias="Template" class="modTemplate" local="template" foreign="id" cardinality="one" owner="foreign" />
<aggregate alias="Snippet" class="modSnippet" local="snippet" foreign="id" cardinality="one" owner="foreign" />
```

* **Composite** - an object is the main one, in relation to another. When you delete such an object, all child objects associated with it here will be deleted.
* **Aggregate** - an object is subject to another object. When it is deleted, the main thing will be nothing.
  * **alias** is a pseudonym for communications. Used in `$object->getMany('Subscribers');` or `$object-> addOne ('Template');`
  * **class** is the real name of the class with which the current object is associated.
  * **local** - field of the current object, which is connected
  * **foreign** - fields of the object with which we are associated.
  * **cardinality** is a type of connection. One to one, or one to several. Typically, a bond aggregate is one, and a composite has many, that is, the parent has many children, and the descendants have only one parent. But there are exceptions.
  If the connection is many, it uses `addMany()` and `getMany()`, if one is, then `addOne()` and `getOne()`.

For a visual representation of the scheme, I advise you to use the service from [Jeroen Kenters](http://schemaviewer.dev.kenters.com/52845fee82d721.76762690)

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-1.png)

In the course of development, the scheme will change several times, so it should become clearer further.

## Model generation

As I said, the scheme itself gives us nothing, we need a working model. What is the **database model** in MODX? This is a set of php files, which consists of basic objects and extensions for a specific database.

Let's generate a model and see what happens there:

1 Copy-paste [current chart](https://github.com/bezumkin/Sendex/blob/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5/core/components/sendex/model/schema/sendex.mysql.schema.xml) in your project and save. Changes should be synchronized with the server.
2 Delete old unnecessary files from modExtra model

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-2.png)

3 Execute file `build.model.php` on server. I have it `c2263.paas2.ams.modxcloud.com/Sendex/_build/build.model.php` — on server. In the first generation we will have only **done**, and in subsequent ones - messages that the existing objects will not be overwritten.
4 New files were created on the server - you need to synchronize the **model** directory (click on the two green arrows at the top).

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-3.png)

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-4.png)

5 Model uploaded to us in the project. The files are still brown, as they have not yet been added to Git. Add them through the context menu and see green (new) files:

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-5.png)

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-6.png)

6 Add the creation of new objects when installing a component in `/_build/resolvers/resolve.tables.php`

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-7.png)

See the white bar to the left of the line numbers? This version control system shows us where the lines were changed. The file immediately turns blue - it contains their changes that were not saved in Git.

7 Send changes to the repository

![](/2.x/ru/extending-modx/creating-components/work-logic/work-logic-8.png)

In the lower left window we see the old file, in the lower right window - the new one. You can check all changes before submitting.

Here is my [today's commit](https://github.com/bezumkin/Sendex/commit/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5) with all the work. But [list of all commits](https://github.com/bezumkin/Sendex/commits/master), to track progress.

Well, now let's take a closer look at what kind of model it is with the example of an object **sxNewsletter**?

So, we have new files:

* `/model/sendex/metadata.mysql.php` — general information about what objects are in the component.
* `/model/sendex/sxnewsletter.class.php` — object `sxNewsletter`, here are all its main methods
* `/model/sendex/mysql/sxnewsletter.class.php` — extension of the `sxNewsletter` object for MySql database. Here are the methods that are needed to ensure that it works with this particular database.
* `/model/sendex/mysql/sxnewsletter.map.inc.php` — object map, `sxNewsletter`, which is used only for MySql. It contains all the fields, indices and relationships that we specified in the XML schema.

As you might guess, if we created another schema for the MsSQL database and generated a model for it, then `/model/sendex/metadata.mysql.php` would remain the same, and the directory would be added to`/model/sendex/` mssql, with the `sxnewsletter.class.php` and `sxnewsletter.map.inc.php` files.

This is how MODX supports any database using xPDO - creates one common object that expands when working in a particular system.

We don’t need the files that are in `/model/sendex/mysql/`, moreover, they will be overwritten each time the model is generated according to the new scheme (I’m already generating a script), but in `/model/sendex/sxnewsletter.class.php` later we will write different methods to call them like this:

``` php
if ($newsletter = $modx->getObject('sxNewsletter', 1)) {
    echo $newsletter->nameMethod ('options');
}
```

Open, for example, [object **modUser**](https://github.com/modxcms/revolution/blob/develop/core/model/modx/moduser.class.php) and look at the familiar methods `isAuthenticated()` and `joinGroup()` - this is how MODX works =)
Now you know how easy it is to find out what an object can do in the engine or its additions.

Our other two objects **sxSubscriber** and **sxQueue** work the same way.

## Conclusion

So, today we have decided on the main logic of work that we will program in the future, and sketched the first version of our xPDO model for the MySql database.

In the next lesson, we assemble the component into a transport package, install it on the site and configure it for convenient further development.
And then we deal with the controllers custom manager pages of the admin panel and prepare to draw the interface on ExtJs.
