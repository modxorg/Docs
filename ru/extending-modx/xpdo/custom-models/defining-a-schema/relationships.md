---
title: "Определение отношений"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/relationships"
---

Вам нужно определить отношения между таблицами, чтобы xPDO корректно связывал их. xPDO работает с двумя типами отношений: **aggregate** и **composite**.

## Aggregate-отношения

Aggregate-отношение в xPDO связывает две таблицы так, что вторичная таблица является агрегатом первичной: если объект в первичной таблице удалён, связанный объект во вторичной таблице должен остаться.

Удачный пример: коллекция карандашей (Crayons) в коробке (Box). Отношение от Crayons к Box это **aggregate**. Если вы удалите объект crayon, связанный объект box не должен удаляться (в нём могут быть другие карандаши). Объект crayon в XML-схеме описывают так:

``` xml
<object class="myCrayon" table="crayons" extends="xPDOSimpleObject">
    <field key="box" dbtype="int" precision="10" phptype="integer" null="false" default="" />
    <aggregate alias="Box" class="myBox" local="box" foreign="id" cardinality="one" owner="foreign" />
</object>
```

Атрибуты:

- **alias** - отношения в xPDO допускают псевдонимы (aliases), чтобы различать два разных отношения с одним и тем же внешним ключом.
- **class** - имя класса связанного объекта.
- **local** - локальный ключ, по которому получают ID внешнего связанного объекта. В примере это ID коробки Box.
- **foreign** - внешний ключ, по которому объект связан. В примере это поле ID объекта Box.
- **cardinality** - кардинальность отношения. В aggregate обычно `one`, потому что Crayon ссылается только на одну Box. В обратном отношении Box к Crayon (Composite) Box может указывать на многие Crayons, тогда значение `many`, а не `one`. Значение cardinality также определяет, нужен ли addOne или addMany при связывании объектов.
- **owner** - владелец внешнего ключа, связывающего объекты. Это `foreign`, когда другой класс связан по своему первичному ключу (вы указали _foreign="id"_ в alias), или `local`, если класс, в котором вы определяете отношение, связан по своему первичному ключу (вы указали _local="id"_ в alias). При связывании нескольких объектов (таблиц) в одном alias всегда будет _owner="foreign"_, а в обратном отношении _owner="local"_.

Этот XML позволяет взять Box для Crayon таким кодом:

``` php
$crayon = $xpdo->getObject('myCrayon',1);
$box = $crayon->getOne('Box');
echo $box->get('name');
```

## Composite-отношения

Composite-отношение в xPDO связывает две таблицы так, что вторичная таблица (или таблицы) является композитом первичной: если объект в первичной таблице удалён, связанные объекты во вторичных таблицах тоже должны быть удалены.

Если вы удалите коробку, связанные карандаши тоже должны удалиться.

Вернёмся к примеру Crayon-Box: Crayons являются Composites объекта Box. В XML-схеме это описывают так:

``` xml
<object class="myBox" table="boxes" extends="xPDOSimpleObject">
    <composite alias="Crayons" class="myCrayon" local="id" foreign="box" cardinality="many" owner="local" />
</object>
```

Несколько атрибутов изменились. Alias теперь во множественном числе, потому что с этой Box может быть связано любое число Crayons. Атрибут local указывает на ID этой Box. foreign указывает на внешний ключ `box` в объекте Crayon. cardinality теперь `many`. Владелец ключа теперь `local`, потому что ключ принадлежит Box.

Все Crayons в Box можно получить таким кодом xPDO:

``` php
$box = $xpdo->getObject('myBox',23);
$crayons = $box->getMany('Crayons');
foreach ($crayons as $crayon) {
   echo $crayon->get('color').'<br />';
}
```

Помните: в Composite-отношении при удалении владельца отношения удаляются все Composites. Если удалить объект Box:

``` php
$box->remove();
```

...удалятся все связанные Crayons этой Box. Так удобно каскадно удалять объекты и упрощать код.

## Отношения many-to-many

Вернёмся к [модели StoreFinder](database-and-tables). Сначала посмотрим текущую схему:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="storefinder" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" phpdoc-package="storefinder" phpdoc-subpackage="model" version="1.1">
  <object class="sfStore" table="sfinder_stores" extends="xPDOSimpleObject">
    <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" />
    <field key="address" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
    <field key="city" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
    <field key="state" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
    <field key="zip" dbtype="varchar" precision="10" phptype="string" null="false" default="0" />
    <field key="country" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
    <field key="phone" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
    <field key="fax" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
    <field key="active" dbtype="int" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />

    <alias key="postalcode" field="zip" />

    <index alias="name" name="name" primary="false" unique="false" type="BTREE">
        <column key="name" length="" collation="A" null="false" />
    </index>
    <index alias="zip" name="zip" primary="false" unique="false" type="BTREE">
        <column key="zip" length="" collation="A" null="false" />
    </index>
  </object>
  
  <object class="sfOwner" table="sfinder_owners" extends="xPDOSimpleObject">
    <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
    <field key="email" dbtype="varchar" precision="255" phptype="string" null="false" default="" />

    <index alias="name" name="name" primary="false" unique="false" type="BTREE">
        <column key="name" length="" collation="A" null="false" />
    </index>
  </object>
  
  <object class="sfStoreOwner" table="sfinder_store_owners" extends="xPDOSimpleObject">
    <field key="store" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />
    <field key="owner" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />

    <index alias="store" name="store" primary="false" unique="false" type="BTREE">
        <column key="store" length="" collation="A" null="false" />
    </index>
    <index alias="owner" name="owner" primary="false" unique="false" type="BTREE">
        <column key="owner" length="" collation="A" null="false" />
    </index>
  </object>
</model>
```

Нужно связать Stores и Owners, но отношение many-to-many: у Owner может быть несколько Stores, у Store несколько Owners. Как это сделать? Лучший способ создать промежуточную таблицу `sfStoreOwner`. У неё только 3 поля: ID и два индексированных поля `store` и `owner`.

Эти два поля содержат PK значения связанных Store и Owner. Добавьте отношения. В определение sfStore добавьте строку:

``` xml
<composite alias="StoreOwners" class="sfStoreOwner" local="id" foreign="store" cardinality="many" owner="local" />
```

В определение sfOwner добавьте:

``` xml
<composite alias="StoreOwners" class="sfStoreOwner" local="id" foreign="owner" cardinality="many" owner="local" />
```

Оба первичных класса используют Composite-отношение. Если удалят любой Store или Owner, нужно удалить связующие отношения между ними.

В определение sfStoreOwner добавьте две строки:

``` xml
<aggregate alias="Store" class="sfStore" local="store" foreign="id" cardinality="one" owner="foreign" />
<aggregate alias="Owner" class="sfOwner" local="owner" foreign="id" cardinality="one" owner="foreign" />
```

Когда модель определена, в коде xPDO вы можете сделать так:

``` php
$store = $xpdo->getObject('sfStore',43);
$storeOwners = $store->getMany('StoreOwners');
$owners = array();
foreach ($storeOwners as $storeOwner) {
    $owners[] = $storeOwner->getOne('Owner');
}
foreach ($owners as $owner) {
   echo $owner->get('name').'<br />';
}
```

Так выведется список владельцев этого магазина.

Код не очень оптимален. Его можно улучшить через `$xpdo->newQuery`:

``` php
$c = $xpdo->newQuery('sfOwner');
$c->innerJoin('sfStoreOwner','StoreOwners');
$c->where(array(
   'StoreOwners.store' => 43, // the ID of our Store
));
$owners = $xpdo->getCollection('sfOwner',$c);
foreach ($owners as $owner) {
   echo $owner->get('name').'<br />';
}
```

Этот блок получает всех владельцев магазина одним запросом.

## Заключение

Построение отношений в схемах подчиняется простым правилам. Вам нужно освоить направления, в которых отношения действуют. Если нужны дополнительные примеры представления таблиц БД в схеме xPDO, смотрите [Больше примеров файлов схемы xPDO XML](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files").

Схема готова. Дальше [сгенерируйте PHP-классы и maps](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code").

## Смотрите также

- [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")
- [getMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
- [addOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone "addOne")
- [addMany](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addmany "addMany")
- [Получение объектов](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
- [Больше примеров файлов схемы xPDO XML](extending-modx/xpdo/custom-models/defining-a-schema/more-examples "More Examples of xPDO XML Schema Files")
