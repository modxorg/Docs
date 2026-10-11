---
title: "We think over the logic of work, determine the schema and model of the database"
translation: "extending-modx/creating-components"
---

Preparation is over — we start building the component: a mailing-list extra. The goal of the course is learning to write components for MODX, not building the best newsletter in the world; keep the scope small.

The design:

- **Newsletter** — everything that forms a letter: subject, template, sender.
- **Subscriber** — a subscription to a newsletter. For now the subscriber must be an authorized user; guests can be added later.
- On certain events a snippet generates the letters and stores them as **Queue** objects.
- A scheduled script (every 5 minutes at least) sends emails from the queue. An empty queue means everything is out.

The manager gets pages for managing subscriptions, adding subscribers and viewing the message queue — with delete and send-now actions. A page for composing and test-sending letters may come later.

With the design fixed, write the database schema.

## DB table schema

The schema is an XML file that describes objects and their relations. It is not used at runtime — it only generates the model.

The schema will change as the component grows: objects, indexes and relations get added and removed. Do not try to design every column upfront; columns can be added at any time.

The basics of the xPDO schema are in [the official documentation](extending-modx/xpdo/custom-models/defining-a-schema). Below is the finished file from [the course repository](https://github.com/bezumkin/Sendex/blob/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5/core/components/sendex/model/schema/sendex.mysql.schema.xml).

Each object is an **object** tag. Its attributes carry the class name and the database table. The table is specified **without the site prefix** — MODX adds it when needed:

``` xml
<object class="sxNewsletter" table="sendex_newsletters" extends="xPDOSimpleObject">
```

The object extends `xPDOSimpleObject`, which supplies the common CRUD surface — but in MODX 3 the `id` column is **not** inherited automatically: `xPDOSimpleObject` is an empty class and the generator does not inject an id field. Declare the primary key explicitly in the schema, the same way core does:

``` xml
<field key="id" dbtype="int" precision="10" attributes="unsigned,auto_increment" phptype="integer" null="false" index="pk" generated="native" />
```

Without this field the generated table is created without `id` and without a primary key. If you extend plain `xPDOObject` instead, you also have to declare every other shared column yourself — for most components `xPDOSimpleObject` plus an explicit `id` is the right choice.

Fields follow:

``` xml
<field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" />
<field key="description" dbtype="text" phptype="text" null="true" default="" />
<field key="active" dbtype="tinyint" precision="1" phptype="boolean" attributes="unsigned" null="true" default="1" />
```

| Attribute | Meaning |
| --- | --- |
| `key` | field name |
| `dbtype` | database type: `int`, `varchar`, `text`, … |
| `precision` | field size; required for fixed-length types (`int`, `varchar`), omitted for `text` |
| `phptype` | PHP type the value is cast to: `integer`, `string`, `float`, `json`, `array` |
| `null` | whether the field may be empty; with `false`, a missing value on save writes an error to the log |
| `default` | value used when the field can be `null` and nothing was passed on save |
| `attributes` | extra column properties passed through to MySQL |

`json` and `array` are MODX-specific: `array` serializes data with type preservation via `serialize()` / `unserialize()`, `json` uses `json_encode()` / `json_decode()`. Arrays store in the database and come back as arrays.

These are the basic attributes only — MODX supports more; look at core schemas and copy what you need.

Indexes come next, so the table works fast. Usually it is enough to index the fields that get selected:

``` xml
<index alias="name" name="name" primary="false" unique="false" type="BTREE">
    <column key="name" length="" collation="A" null="false" />
</index>
<index alias="active" name="active" primary="false" unique="false" type="BTREE">
    <column key="active" length="" collation="A" null="false" />
</index>
```

| Attribute | Meaning |
| --- | --- |
| `primary` | primary index? Usually not — the primary index is on the `id` field from `xPDOSimpleObject` |
| `unique` | unique index? If `true`, no two rows share a value; `id` is unique again |

Finally, object relations:

``` xml
<composite alias="Subscribers" class="sxSubscriber" local="id" foreign="newsletter_id" cardinality="many" owner="local" />
<aggregate alias="Template" class="modTemplate" local="template" foreign="id" cardinality="one" owner="foreign" />
<aggregate alias="Snippet" class="modSnippet" local="snippet" foreign="id" cardinality="one" owner="foreign" />
```

- **composite** — this object is the parent; deleting it deletes all child objects linked here.
- **aggregate** — this object points to another object; when that object is deleted, the link breaks.
- **alias** — the relation name used in `$object->getMany('Subscribers')` or `$object->addOne('Template')`.
- **class** — the real class name of the related object.
- **local** / **foreign** — the fields the relation joins on: on this object and on the related one.
- **cardinality** — one-to-one or one-to-many. Aggregates are usually `one`, composites usually `many` — a parent has many children, a child has one parent — but there are exceptions. For `many` use `addMany()` / `getMany()`, for `one` use `addOne()` / `getOne()`.

For a visual view of the schema, use the service from [Jeroen Kenters](http://schemaviewer.dev.kenters.com/52845fee82d721.76762690):

![](/ru/extending-modx/creating-components/work-logic/work-logic-1.png)

The schema will change several times during development — it gets clearer as we go.

## Model generation

The schema alone does nothing; the working part is the model. The **database model** in MODX is a set of PHP files: the base object classes plus database-specific extensions.

Generate the model:

1. Copy [the finished schema](https://github.com/bezumkin/Sendex/blob/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5/core/components/sendex/model/schema/sendex.mysql.schema.xml) into the project and save; synchronize with the server.
2. Delete the old modExtra model files:

![](/ru/extending-modx/creating-components/work-logic/work-logic-2.png)

3. Run `_build/build.php` on the server (for example `php ~/www/Extras/Sendex/_build/build.php` — model generation is the private `buildModel()` method inside it, called from `process()`). The first run prints only **done**; later runs warn that existing objects will not be overwritten.


4. Synchronize the **model** directory back (the two green arrows at the top):

![](/ru/extending-modx/creating-components/work-logic/work-logic-3.png)

![](/ru/extending-modx/creating-components/work-logic/work-logic-4.png)

5. The files arrive in the project brown — not yet in Git. Add them via the context menu; they turn green:

![](/ru/extending-modx/creating-components/work-logic/work-logic-5.png)

![](/ru/extending-modx/creating-components/work-logic/work-logic-6.png)

6. Register the new objects for install in `/_build/resolvers/resolve.tables.php`:

![](/ru/extending-modx/creating-components/work-logic/work-logic-7.png)

The white bar left of the line numbers marks changed lines; the file turns blue until the changes are committed.

7. Commit:

![](/ru/extending-modx/creating-components/work-logic/work-logic-8.png)

The diff shows the old and the new version of each file — review it before sending.

Here is [today's commit](https://github.com/bezumkin/Sendex/commit/b3a2eb0fb56ae8151b4686840e21bad18afd4fb5) with all the work, and [the full commit list](https://github.com/bezumkin/Sendex/commits/master) to track progress.

The generated model, on the example of `sxNewsletter`:

- `/model/sendex/metadata.mysql.php` — the list of objects in the component.
- `/model/sendex/sxnewsletter.class.php` — the `sxNewsletter` object with its main methods.
- `/model/sendex/mysql/sxnewsletter.class.php` — the MySQL platform class: database-specific methods and the object map. Since MODX 3 the map is no longer a separate `*.map.inc.php` file — the generator writes it into the class as `public static $metaMap = [...]` (fields, indices and relations from the XML schema).

A second schema, say for MsSQL, would keep `metadata.mysql.php` unchanged and add a `/model/sendex/mssql/` directory with its own `sxnewsletter.class.php` containing the MsSQL map. This is how xPDO supports any database: one common object, extended per database.

The files under `/model/sendex/mysql/` are regenerated from the schema on every build — do not edit them. Custom methods go into `/model/sendex/sxnewsletter.class.php` and are called like this:

``` php
if ($newsletter = $modx->getObject('sxNewsletter', 1)) {
    echo $newsletter->nameMethod ('options');
}
```

Look at [modUser](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modUser.php): `isAuthenticated()` and `joinGroup()` are exactly such methods — this is how MODX works. You now know how to inspect any engine or extra object.

`sxSubscriber` and `sxQueue` work the same way.

## Conclusion

Today: the component design and the first version of the xPDO model for MySQL.

Next lesson: assemble the transport package, install it on the site and set up convenient development. Then custom manager pages and the ExtJS interface.
