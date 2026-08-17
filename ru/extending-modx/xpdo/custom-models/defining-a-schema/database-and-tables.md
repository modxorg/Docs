---
title: "Определение базы данных и таблиц"
translation: "extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables"
---

Допустим, у вас есть пакет Storefinder. Вы хотите создать для него пользовательскую схему. Сначала создайте файл схемы с таким именем:

> storefinder.mysql.schema.xml

Обратите внимание: в имя файла добавлен постфикс `mysql`, потому что xPDO в перспективе рассчитан на несколько СУБД. Так вы указываете, что схема предназначена для таблицы MySQL.

## Начало с базы данных

Текущий XML-файл выглядит так:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="storefinder"
   baseClass="xPDOObject"
   platform="mysql"
   defaultEngine="InnoDB"
   tablePrefix="sf_"
   phpdoc-package="storefinder"
   phpdoc-subpackage="model"
   version="1.1">
```

Сначала стандартный XML-заголовок сообщает браузеру и парсеру, что это XML. Далее вы создаёте тег `model` и задаёте ему атрибуты. Тег `model` представляет саму базу данных. Атрибуты:

- **package** - имя пакета xPDO (это не transport package, термин Revolution). Так xPDO разделяет и управляет разными моделями. _В XML имя пакета должно быть в нижнем регистре._
- **baseClass** - базовый класс, от которого наследуются все ваши определения классов. Если вы не планируете собственное расширение xPDOObject, лучше оставить значение по умолчанию.
- **platform** : платформа драйвера PDO для БД. Сейчас xPDO поддерживает драйверы mysql, sqlite и sqlsrv. (Примечание: sqlsrv в MODX3 больше не поддерживается.)
- **defaultEngine** : движок таблиц БД по умолчанию, обычно MyISAM или InnoDB. Рекомендуется InnoDB.
- **tablePrefix** : необязательный параметр, переопределяет runtime-префикс таблиц по умолчанию. Полезен для сторонних компонентов, но обычно его не задают, чтобы tablePrefix наследовался от установки MODX.
- **phpdoc-package и phpdoc-subpackage** : пользовательские атрибуты для map- и class-файлов. Это не стандартные атрибуты xPDO. Они показывают, что атрибутами могут быть любые имена.
- **version** : версия схемы xPDO. При изменениях формата схемы версия обновляется, чтобы runtime иначе обрабатывал модель.

## Версии схемы

Версии схемы различаются. Между 1.0 и 1.1 главное отличие в том, как описывают индексы объектов. См. [Обновление моделей до версии схемы 1.1](extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1 "Upgrading Models to Schema Version 1.1") о переносе определений индексов в новый формат. Не добавляйте version="1.1" (не указывайте атрибут version или задайте 1.0), пока индексы не описаны в формате схемы 1.1. Иначе xPDO создаст таблицы без индексов.

## Определение таблиц

Модель описана. Добавьте тег таблицы следующей строкой.

``` xml
<object class="sfStore" table="stores" extends="xPDOSimpleObject">
```

`object` представляет таблицу. Из неё будет сгенерирован класс xPDOObject. Важные атрибуты:

- **class** : имя класса, который нужно сгенерировать из таблицы. Здесь `sfStore`. Вместо простого `Store` добавлен префикс `sf`, чтобы избежать конфликтов с другими пакетами, у которых тоже могут быть таблицы Store.
- **table** : реальное имя таблицы в БД без tablePrefix, заданного для пакета.
- **extends** : класс, от которого наследуется объект. Подклассы и расширения можно задавать прямо в XML. Расширенные классы наследуют поля родителя.

Здесь таблица расширяет `xPDOSimpleObject`, а не xPDOObject. Значит, у таблицы уже есть поле `id`, автоинкрементный первичный ключ.

Определение таблицы stores есть. Добавьте определения полей:

``` xml
<field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" />
<field key="address" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="city" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="state" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
<field key="zip" dbtype="varchar" precision="10" phptype="string" null="false" default="0" />
<field key="country" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="phone" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="fax" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
<field key="active" dbtype="int" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
```

У каждого столбца таблицы свой тег field. У поля есть атрибуты. Большинство необязательны и зависят от типа столбца в БД. Среди них:

- **key** : имя ключа столбца.
- **dbtype** : тип в БД: varchar, int, text, tinyint и т.д.
- **precision** : точность поля. Обычно максимальное число символов.
- **attributes** : только для части типов БД. У целых можно задать `unsigned`, чтобы значение всегда было положительным.
- **phptype** : соответствующий PHP-тип поля БД.
- **null** : может ли поле быть NULL.
- **default** : начальное значение по умолчанию, если ничего не задано.
- **index** _(устарело)_ : необязательное поле. Если задано, добавляет тип индекса к полю. Среди значений: `pk`, `index`, `fk`. Атрибут _index_ устарел для Schema Version 1.1 и игнорируется при генерации моделей версии 1.1. Он валиден только для моделей без атрибута version (или с явным version 1.0).

Далее опишите индексы (в формате schema version 1.1), которые должны быть у таблицы:

``` xml
<index alias="name" name="name" primary="false" unique="false" type="BTREE">
    <column key="name" length="" collation="A" null="false" />
</index>
<index alias="zip" name="zip" primary="false" unique="false" type="BTREE">
    <column key="zip" length="" collation="A" null="false" />
</index>
```

### Элемент alias

В xPDO 2.2 появилась возможность задавать псевдонимы полей (field aliases). Это полезно при смене структуры таблиц для обратной совместимости или для удобных псевдонимов в object API без изменения структуры таблицы. Синтаксис простой: два атрибута, key (псевдоним) и field (целевое определение поля).

Задайте для столбца zip псевдоним postalcode, чтобы значение было доступно по любому из ключей:

``` xml
<alias key="postalcode" field="zip" />
```

Закройте определение таблицы тегом object:

``` xml
</object>
```

Добавьте класс `sfOwner` для владельцев:

``` xml
<object class="sfOwner" table="owners" extends="xPDOSimpleObject">
  <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
  <field key="email" dbtype="varchar" precision="255" phptype="string" null="false" default="" />

  <index alias="name" name="name" primary="false" unique="false" type="BTREE">
      <column key="name" length="" collation="A" null="false" />
  </index>
</object>
```

Так как у магазинов может быть несколько владельцев, добавьте класс sfStoreOwner, который связывает отношение many-to-many:

``` xml
<object class="sfStoreOwner" table="store_owners" extends="xPDOSimpleObject">
  <field key="store" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />
  <field key="owner" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />

  <index alias="store" name="store" primary="false" unique="false" type="BTREE">
      <column key="store" length="" collation="A" null="false" />
  </index>
  <index alias="owner" name="owner" primary="false" unique="false" type="BTREE">
      <column key="owner" length="" collation="A" null="false" />
  </index>
</object>
```

Закройте определение модели:

``` xml
</model>
```

XML-схема модели готова. Дальше нужно [определить отношения для этой схемы](extending-modx/xpdo/custom-models/defining-a-schema/relationships "Defining Relationships").
