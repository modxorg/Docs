---
title: "Больше примеров"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/more-examples"
description: "Эта страница содержит примеры, которые сопоставляют таблицы базы данных MySQL с их аналогами xPDO XML-схемы"
---

## Цель

Эта страница содержит примеры, которые сопоставляют таблицы базы данных MySQL с их аналогами xPDO XML-схемы, чтобы научить разработчиков определять отношения внешнего ключа между таблицами в XML-схемах xPDO, используя в качестве примеров ряд общих реляционных шаблонов баз данных.

Отношения базы данных могут быть сложными, поэтому неудивительно, что файлы схемы XML, описывающие эти отношения, отражают эту сложность. Хотя файлы схемы xPDO *уже* существуют для встроенных таблиц MODX внутри `core/model/schema/modx.mysql.schema.xml`, мы не рекомендуем разработчикам полагаться на эти XML-файлы как на их единственные примеры того, как связать таблицы, потому что они часто слишком сложны для использования в образовательных целях.

Помните, что xPDO *абстрагирует* базу данных, поэтому вполне возможно, что ваша модель не является традиционной базой данных, но для удобства и ясности в приведенных здесь примерах предполагается, что вы используете базу данных MySQL для своей модели. В общем, рекомендуется разрабатывать свои сниппеты/плагины и т.д., используя традиционную базу данных, прежде чем абстрагировать ее с помощью xPDO. 

**К СВЕДЕНИЮ**
После создания валидного XML файла схемы xPDO может создавать файлы классов PHP и таблицы базы данных, он двунаправленный. Цель этой страницы - сопоставить XML-схему xPDO с таблицами базы данных MySQL. Некоторые разработчики могут предпочесть написать файл схемы XML вручную, а затем позволить xPDO сгенерировать таблицы и файлы классов. Другие разработчики могут предпочесть сначала создать таблицы базы данных, а затем применить [реверс инжениринг](extending-modx/xpdo/custom-models/generating-the-model/reverse-engineer) для XML-схемы и файлов классов.

## Один к одному

Отношения "один к одному" существуют, когда две таблицы используют один и тот же первичный ключ. С архитектурной точки зрения это означает, что данные теоретически могут находиться в одной таблице, но по какой-либо причине данные разделены на две (или более) таблицы.

Сложность взаимно-однозначных отношений заключается в том, что обе таблицы _не_ равны. Как и в фильме "Горец", первичная таблица может быть только одна: вы должны решить, какая таблица будет первичной (или главной), а какая вторичной (или подчиненной) таблицей.

Хороший пример такого типа отношений существует в базе данных MODX между таблицами `users` и `user_attributes`: таблица `users` является основной таблицей, а `user_attributes` - вторичной. Если вы удаляете пользователя из таблицы `users`, дополнительные атрибуты в таблице `user_attributes` также должны быть удалены, но обратное не всегда верно. В документации по [Отношениям](extending-modx/xpdo/custom-models/defining-a-schema/relationships) подчеркивается эта первичная/вторичная связь.

При определении отношений вы должны сначала узнать о **агрегированных(aggregate)** и **составных(composite)** отношениях; вы можете не понимать использования этих конкретных слов, но при определении этого типа отношений просто запомните следующее:

 - В определении XML первичной таблицы указано **_composite_** отношение к вторичной таблице.
 - В XML-определении вторичной таблицы указано **_aggregate_** отношение к первичной таблице.

В этом примере мы имитируем таблицы MODX, где у нас есть одна таблица для **пользователей** и дополнительная таблица, в которой хранится дополнительная информация об этих пользователях, с именем `userdata`. 

**К СВЕДЕНИЮ**
В отличие от некоторых ORM (например, `Doctrine`) и даже в отличие от определений внешнего ключа MySQL, xPDO определяет отношения на *обеих* сторонах. Вы сообщаете дочерним элементам, кто их "родители", и вы также говорите "родителям", кто их "дети". Например, родительский объект содержит составную(composite) связь, а дочерний объект - совокупную(aggregate) связь. Это гарантирует, что все знают, с кем они связаны. 

> MySQL определение таблиц

Вот сокращенные определения таблиц MySQL:

``` sql
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `bio` text,
  `joindate` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM;
CREATE TABLE `userdata` (
  `userdata_id` int(11) NOT NULL AUTO_INCREMENT,
  `age` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`userdata_id`)
) ENGINE=MyISAM;
```

Этот запрос MySQL покажет *все* данные для пользователей (включая информацию из первичной таблицы пользователей, а также из вторичной таблицы пользовательских данных): 

``` sql
SELECT users.*, userdata.*
FROM users JOIN userdata ON users.user_id = userdata.userdata_id;
```

> XML схема

А вот соответствующие определения XML:

``` xml
<object class="Users" table="users" extends="xPDOObject">
        <field key="user_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="username" dbtype="varchar" precision="255" phptype="string" null="true" />
        <field key="bio" dbtype="text" phptype="string" null="true" />
        <field key="joindate" dbtype="date" phptype="date" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="user_id" collation="A" null="false" />
        </index>
        <composite alias="Userdata" class="Userdata" local="user_id" foreign="userdata_id" cardinality="one" owner="local" />
</object>
<object class="Userdata" table="userdata" extends="xPDOObject">
        <field key="userdata_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="age" dbtype="tinyint" precision="3" attributes="unsigned" phptype="integer" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="userdata_id" collation="A" null="false" />
        </index>
        <aggregate alias="Users" class="Users" local="userdata_id" foreign="user_id" cardinality="one" owner="foreign" />
</object>
```

> Примерный код сниппета

Если бы вы получили доступ к этим данным в сниппете, вы могли бы сделать что-то вроде следующего. Предполагается, что имя вашего пакета `one_to_one` 

``` php
<?php
        $base_path = MODX_CORE_PATH . 'components/one_to_one/';
        $modx->addPackage('one_to_one',$base_path.'model/','');
        $user = $modx->getObject('Users', array('user_id' => 1 ) );
        $userdata = $user->getOne('Userdata');
        $output = '';
        $output .= $user->get('username');
        $output .= $userdata->get('age');
        return $output;
?>
```

## Один ко многим

Это общий шаблон, который возникает, когда вторичная таблица содержит внешний ключ. Например, у вас может быть основная таблица, содержащая сообщения в блоге, и дополнительная таблица, содержащая комментарии. У каждого сообщения в блоге может быть ноль или много комментариев, но каждый комментарий может относиться к одному и _только_ одному сообщению в блоге.

Это тот же тип отношений, который существует в MODX между страницами и шаблонами: один шаблон может использоваться сотнями страниц, но страница может использовать только один шаблон. 

> MySQL определение таблиц

``` sql
CREATE TABLE `blogposts` (
  `blogpost_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`blogpost_id`)
) ENGINE=MyISAM;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `blogpost` int(11) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM;
```

> XML схема

``` xml
<object class="Blogposts" table="blogposts" extends="xPDOObject">
        <field key="blogpost_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="content" dbtype="text" phptype="string" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="blogpost_id" collation="A" null="false" />
        </index>
        <composite alias="Comments" class="Comments" local="blogpost_id" foreign="blogpost" cardinality="many" owner="local" />
</object>
<object class="Comments" table="comments" extends="xPDOObject">
        <field key="comment_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="blogpost" dbtype="int" precision="11" phptype="integer" null="true" />
        <field key="comment" dbtype="text" phptype="string" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="comment_id" collation="A" null="false" />
        </index>
        <aggregate alias="Blogposts" class="Blogposts" local="blogpost" foreign="blogpost_id" cardinality="one" owner="foreign" />
</object>
```

> Примерный код сниппета

Вот пример кода сниппета. Предполагается, что имя вашего пакета `one_to_many`: 

``` php
<?php
$base_path = MODX_CORE_PATH . 'components/one_to_many/';
$modx->addPackage('one_to_many',$base_path.'model/','');
$output = '';
$blogpost = $modx->getObject('Blogposts', array('blogpost_id' => 1 ) );
$comments = $blogpost->getMany('Comments');
$output .= $blogpost->get('content');
foreach ( $comments as $c )
{
    $output .= $c->get('comment');
}
return $output;
```

## Многие ко многим: объединение таблиц

Другой распространенный шаблон базы данных включает использование таблиц включения. Этот тип отношений часто наблюдается при использовании таксономий, таких как "категории" или "теги": например, одно сообщение может быть "помечено" несколькими терминами, и каждый тег также может быть связан с несколькими сообщениями.

Этот тип взаимосвязи подразумевает *три* таблицы базы данных: `blogposts`, `tags` и таблицу включения `blogposts\tags`. Уловка здесь в том, что _две_ из таблиц действуют как первичные таблицы: и `blogposts`, и `tags` таблицы будут содержать составные определения, которые указывают на `blogposts_tags`. 

> MySQL определение таблиц

``` sql
CREATE TABLE `blogposts` (
  `blogpost_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`blogpost_id`)
) ENGINE=MyISAM;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM;
/* The Join Table: */
CREATE TABLE `blogposts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogpost` int(11) DEFAULT NULL,
  `tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;
```

> XML схема

Обратите внимание, что следующая схема по-прежнему содержит составную связь для таблицы `Comments`. 

``` xml
<object class="Blogposts" table="blogposts" extends="xPDOObject">
        <field key="blogpost_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="content" dbtype="text" phptype="string" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="blogpost_id" collation="A" null="false" />
        </index>
        <composite alias="Comments" class="Comments" local="blogpost_id" foreign="blogpost_id" cardinality="many" owner="local" />
        <composite alias="BlogpostsTags" class="BlogpostsTags" local="blogpost_id" foreign="blogpost_id" cardinality="many" owner="local" />
</object>
<object class="Tags" table="tags" extends="xPDOObject">
        <field key="tag_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="tag_id" collation="A" null="false" />
        </index>
        <composite alias="BlogpostsTags" class="BlogpostsTags" local="tag_id" foreign="tag_id" cardinality="many" owner="local" />
</object>
<object class="BlogpostsTags" table="blogposts_tags" extends="xPDOSimpleObject">
        <field key="blogpost" dbtype="int" precision="11" phptype="integer" null="true" />
        <field key="tag" dbtype="int" precision="11" phptype="integer" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="id" collation="A" null="false" />
        </index>
        <aggregate alias="Tags" class="Tags" local="tag" foreign="tag_id" cardinality="one" owner="foreign" />
        <aggregate alias="Blogposts" class="Blogposts" local="blogpost" foreign="blogpost_id" cardinality="one" owner="foreign" />
</object>
```

> Примерный код сниппета

В следующем примере предполагается, что пакет называется `many_to_many`. Обратите внимание, что показанная здесь логика точно отслеживает отношения. В этом примере мы загружаем сообщение в блоге, а затем прослеживаем его через таблицу соединений до его тегов. Возможно, это не проще, чем написать оператор JOIN в MySQL. 

``` php
<?php
$base_path = MODX_CORE_PATH . 'components/many_to_many/';
$modx->addPackage('many_to_many',$base_path.'model/','');
$output = '';
$blogpost = $modx->getObject('Blogposts', array('blogpost_id' => 1 ) );
$blopost_tags = $blogpost->getMany('BlogpostsTags');
foreach ( $blopost_tags as $bt )
{
    $tag = $bt->getOne('Tags');
    $output .= $tag->get('name');
}
return $output;
```

## Родительский ID: самовключение 

Другой распространенный шаблон, используемый для обозначения иерархии - это самовключение. Это когда один столбец в таблице содержит ссылку на собственный первичный ключ этой таблицы. Мы знакомы с этим в базе данных MODX, когда помещаем страницы в директории: существуют отношения "родитель/потомок", где каждая страница может быть дочерней по отношению к другой странице.

В этом примере мы собираемся продемонстрировать, как таблица может определять иерархические категории, используя отношения "родитель/потомок". Если родительский `_id` определен для строки в нашей таблице **категорий**, это означает, что строка представляет подкатегорию родительского элемента. 

> MySQL определение таблиц

``` sql
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `seq` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM;
```

> XML схема

Чтобы определить это отношение в xPDO XML, мы должны добавить к объекту 2 агрегатных(aggregate) отношения: 

``` xml
<object class="Categories" table="categories" extends="xPDOObject">
        <field key="category_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
        <field key="parent_id" dbtype="int" precision="11" phptype="integer" null="true" />
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="true" />
        <field key="seq" dbtype="smallint" precision="4" phptype="integer" null="true" />
        <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
                <column key="category_id" collation="A" null="false" />
        </index>
        <aggregate alias="Parent" class="Categories" local="parent_id" foreign="category_id" cardinality="one" owner="foreign" />
        <composite alias="Children" class="Categories" local="category_id" foreign="parent_id" cardinality="many" owner="local" />
</object>
```

> Примерный код сниппета

В этом примере наш пакет называется `parent_child_example`. Обратите внимание, что метод `getMany` рассчитывает на псевдоним, определенный для этой связи. 

``` php
<?php
$base_path = MODX_CORE_PATH . 'components/parent_child_example/';
$modx->addPackage('parent_child_example',$base_path.'model/','');
$output = '';
$category = $modx->getObject('Categories', array('category_id' => 1 ) );
$subcategories = $category->getMany('Children');
$output .= $category->get('content');
foreach ( $subcategories as $sc )
{
    $output .= $sc->get('name');
}
return $output;
```

## Использование псевдонимов полей *(только xPDO 2.2+)*

В этом примере мы устанавливаем псевдоним `postalcode` для поля `zip` из модели `storefinder`. 

> XML схема

Определение псевдонима поля просто определяется с помощью элемента `alias`. 

``` xml
<object class="sfStore" table="sfinder_stores" extends="xPDOSimpleObject">
  <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
  <field key="address" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
  <field key="city" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
  <field key="state" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
  <field key="zip" dbtype="varchar" precision="10" phptype="string" null="false" default="0" index="index" />
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
```

> Примерный код сниппета

Псевдоним `postalcode` теперь доступен как поле объекта `sfStore` в xPDO. Это просто ссылка на значение поля `zip`. 

``` php
<?php
$modx->addPackage('storefinder', MODX_CORE_PATH . 'components/storefinder/model/');
$output = '';
$store = $modx->getObject('sfStore', array('name' => 'My Store'));
if ($store) {
    $output = "Postal code is {$store->get('postalcode')}";
}
return $output;
```
