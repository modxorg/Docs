---
title: "getCollectionGraph"
translation: "extending-modx/xpdo/retrieving-objects/graphs"
---

## Overview

`getCollectionGraph` позволяет автоматически загружать связанные объекты путем указания хэша стиля JSON для второго аргумента (другими словами, он автоматически присоединяется к таблице в связанных таблицах). Возможно вложить JSON-хэш, чтобы вы также получили связанные объекты связанных объектов, например:

```php
$blogpost = $modx->getCollectionGraph('BlogPost', '{ "Comments":{} }', 34 );
foreach ( $blogpost->Comments as $c ) {
/* ...делаем что-то с каждым комментарием... */
}
// ИЛИ, присоединяясь к связанным объектам связанных объектов
$TFR = $modx->getCollectionGraph('TrackingformsResources', '{ "Resources":{ "MassUnit":{}, "VolumeUnit":{} } }', 123 );
```

xPDO преобразует все это в необходимый запрос к базе данных, который объединяется с соответствующими таблицами (например, возможно, с именем `trackingforms_resources`, `resources` и `unit`) - подобно большинству методов xPDO, вы обращаетесь к таблицам/классам модели через их псевдонимы.

Вы можете _НЕ_ устанавливать ограничение для `getCollectionGraph` при использовании объекта`xPDOQuery` - вы будете ограничивать общее количество выбранных строк, которое не совпадает с общим количеством объектов верхнего уровня (например, BlogPost). Таким образом вы можете получить очень неожиданные результаты.

## Пример сниппета

Пример ниже, указывает несколько связанных объектов. В XML-схеме **Zip** могут быть какие-то агрегатные отношения, определенные для «TZ», «ST» и «CT».

```php
<?php
$out = false;
$xpdo->setPackage('sw_zipCode', MODX_BASE_PATH.'wsw/model/', 'sw_');
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}', $lookupZip);
foreach ($collection as $obj)
{
    if (is_object($obj))
    {
        $out = $obj->toArray();                      // 'Zip'
        $out[timezone] = $obj->TZ->get('tzname');
        $out[state] = $obj->ST->get('statename');
        $out[county] = $obj->CT->get('countyname');
    }
}
return $out;
?>
```

Обратите внимание, что когда вы используете `$xpdo->newQuery()` для фильтрации результатов и имеете несколько одинаковых имен полей, например, поле `id`, в одном или нескольких различных присоединяемых вами классах, xPDO не вернет результат. В этом случае просто добавьте префикс имени вашего поля к имени класса, например `myClassName.id`

### Вызов сниппета

```php
[[!zipCollectionGraph?lookupZip=`32117`]]
```

### Вывод

```php
Array
(
    [id] => 32117
    [city] => Daytona Beach
    [areacode] => 386
    [lat] => 29.233
    [lon] => -81.0479
    [sw_county_id] => 1800
    [sw_states_id] => 15
    [sw_timezones_id] => 4
    [timezone] => Eastern
    [state] => Florida
    [county] => Volusia
)
```

### Эквивалент MySQL

```php
$xpdo->setPackage('sw_zipCode', MODX_BASE_PATH.'wsw/model/', 'sw_');
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}', $lookupZip);
```

В MySQL:

```sql
SELECT *
FROM `sw_zips` AS Z
LEFT JOIN `sw_county` AS CT ON CT.`id` = Z.`sw_county_id`
LEFT JOIN `sw_states` AS ST ON ST.`id` = Z.`sw_states_id`
LEFT JOIN `sw_timezones` AS TZ ON TZ.`id` = Z.`sw_timezones_id`
WHERE Z.`id` = 32117
```

### Схема

Следующая схема значительно упрощена для удобства чтения и этого примера:

Хотя это функциональная схема, она не является окончательной схемой в любом воображении.

```xml
<model package="sw_zipCode" version="1.0" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM">
<object class="class="City" table="city" extends="xPDOSimpleObject">
    <field key="cityname" dbtype="varchar" precision="50" phptype="string" null="false"/>
</object>
<object class="Cityzip" table="cityzip" extends="xPDOSimpleObject">
    <field key="city" dbtype="int" precision="10" phptype="integer" null="false"/>
    <field key="zip" dbtype="int" precision="5" phptype="integer" null="false"/>
</object>
<object class="County" table="county" extends="xPDOSimpleObject">
    <field key="countyname" dbtype="varchar" precision="35" phptype="string" null="true" index="index"/>
</object>
<object class="States" table="states" extends="xPDOSimpleObject">
    <field key="statename" dbtype="varchar" precision="40" phptype="string" null="false" index="index"/>
    <field key="abbrv" dbtype="char" precision="2" phptype="string" null="false"/>
</object>
<object class="Timezones" table="timezones" extends="xPDOSimpleObject">
    <field key="tzname" dbtype="varchar" precision="20" phptype="string" null="true" index="index"/>
</object>
<object class="Zip" table="zips" extends="xPDOSimpleObject">
    <field key="city" dbtype="varchar" precision="50" phptype="string" null="true"/>
    <field key="areacode" dbtype="int" precision="3" phptype="integer" null="true"/>
    <field key="lat" dbtype="float" phptype="float" null="true"/>
    <field key="lon" dbtype="float" phptype="float" null="true"/>
    <field key="sw_county_id" dbtype="int" precision="4" phptype="integer" null="false" index="pk"/>
    <field key="sw_states_id" dbtype="int" precision="2" phptype="integer" null="false" index="pk"/>
    <field key="sw_timezones_id" dbtype="int" precision="2" phptype="integer" null="false" index="pk"/>

    <aggregate alias="TZ" class="Timezones" local="tz_id" foreign="id" cardinality="one" owner="foreign" />
    <aggregate alias="ST" class="County" local="sw_county_id" foreign="id" cardinality="one" owner="foreign" />
    <aggregate alias="CT" class="States" local="sw_states_id" foreign="id" cardinality="one" owner="foreign" />
</object>
</model>
```

## Другой пример

Другим распространенным примером отношения является объединение страниц MODX с их значениями TV. Иногда это не работает должным образом, так как значения хранятся не так, как вы ожидаете. Но вот пример.

```php
$pages = $modx->getCollectionGraph('modResource', '{"TemplateVarResources":{}}', array('parent'=>12));

foreach ($pages as $p) {
    foreach ($p->TemplateVarResources as $tv) {
        // Делаем действия с TV
        $tv_array = $tv->toArray();
        $tv->get('value');
    }
}
```

## Комментарии

1. Получить соединение через [xPDO Конструктор](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "xPDO Конструктор") включая [Hydrating Fields](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields")
2. Просматривайте имя пакета в схеме, которую мы устанавливаем (или применяем), пакет для нашего соединения, принимая во внимание префикс, который наши таблицы используют в базе данных.
3. Используя «Zip» в качестве нашего «представления», мы смотрим на отношения, непосредственно определенные в объекте Zip, в нашей схеме, и получаем доступ к ним через указанные здесь псевдонимы.

## Дополнительные примечания

Все связано с определением схемы. Плохо продуманная и разработанная схема вполне может привести ко многим часам разочарования.

Если у вас возникли проблемы с xPDO, у вас есть два основных способа устранения неполадок:

-   В первую очередь - схема не верна. Подумайте об этом снизу вверх, и через каждое из этих отношений мы можем «увидеть», где мы можем упустить это.
-   Непонимание того, что мы видим, - еще одна огромная проблема.
    -   Понять смысл вашей схемы. Если ваша схема со временем создаст экземпляр объекта, представляющего одну сущность (например, пользователя), ваши базовые отношения должны быть (`$this->user`) 1: 1 или много на другой стороне.
    -   Отношения, связанные с отношением «многие ко многим» (как в отношениях между пользователями и группами), вероятно, потребуются для каждого цикла, чтобы отфильтровать подчиненное отношение.
    -   Совокупные отношения обычно должны быть единичными. Удаление их никак не влияет на связанные данные
    -   Композитные отношения, как правило, должны быть во множественном числе. Удаление их также удаляет все связанные с ними дочерние отношения.
    -   Не бойтесь использовать обычный язык в вашей схеме. Вместо Cityzip, в схеме выше, Cityhaszips может быть немного яснее, продумывая вашу схему
    -   Не используйте одно и то же имя класса в нескольких местах схемы. Мало того, что это приведет к путанице при кодировании, я подозреваю, что это также смущает xPDO. Если ни по какой другой причине - это просто дурной тон.
    -   xPDO - это быстро, очень быстро. Если ваши запросы занимают много времени, вернитесь к схеме и следуйте указателям.
    -   xPDO любит первичные ключи, поэтому выстраивайте свои отношения вокруг первичных ключей, когда это возможно, если не всегда.
    -   Если вы пропустили это `{" TZ ": {}," ST ": {}," CT ": {}}` в формате JSON.
