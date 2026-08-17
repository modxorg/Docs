---
title: "Менеджер doodles с помощью MIGXdb"
description: "Создание схемы БД, CMP MIGXdb и вывод doodles на фронтенде в MODX 3"
translation: "extras/migxdb/migxdb.tutorials/create-doodles-manager-with-help-of-migxdb"
---

В этом учебнике вы создадите **менеджер doodles** с помощью **MIGXdb**.

Сначала опишете **схему БД** и **таблицы**. Затем настроите **Custom Manager Page (CMP) MIGXdb** для управления **doodles** (записями в БД).

## Требования

Учебник рассчитан на **MODX 3.0.0-pl** и новее.

Установите [MIGX](extras/migx "MIGX") через Package Manager.

## Создание пакета и файла схемы

### Пакет

- В главном меню MODX нажмите **Extras**
- Нажмите **MIGX**
- Откройте вкладку **Package Manager**
- В поле **Package Name** укажите «doodles».
- Нажмите **Create Package**

Должен появиться каталог `/doodles` в `/core/components` с папками `/schema` и `/src`, а также файл `bootstrap.php`.

### Схема

- Оставайтесь на вкладке **Package Manager**
- Убедитесь, что в **Package Name** указано «doodles»
- Откройте вкладку **Xml Schema**
- Добавьте код:

``` xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="Doodles\Model\" baseClass="xPDO\Om\xPDOObject" platform="mysql" defaultEngine="InnoDB" version="3.0">
    <object class="Doodle" table="doodles" extends="xPDO\Om\xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" default=""/>
        <field key="description" dbtype="text" phptype="string" null="false" default=""/>
        <field key="createdon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="createdby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="editedon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="editedby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="deleted" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="published" dbtype="tinyint" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
        <aggregate alias="CreatedBy" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign"/>
        <aggregate alias="EditedBy" class="modUser" local="editedby" foreign="id" cardinality="one" owner="foreign"/>
    </object>
</model>
```

- Нажмите **Save Schema**

Файл схемы `doodles.mysql.schema.xml` появится в `/core/components/doodles/schema`. Проверьте через **Load Schema** на вкладке **Xml Schema** (при работе с пакетом имя «doodles» должно быть в Package Manager).

Поля «published» и «deleted» нужны процессору getlist MIGXdb по умолчанию.

При необходимости создайте свои процессоры в своём processor-path.

[Подробнее о создании схем](extending-modx/xpdo/custom-models/defining-a-schema "Defining a Schema")

### Parse Schema

- Откройте вкладку **Schema**
- Нажмите **Parse Schema**

Из схемы создадутся xpdo-классы и maps.

### Create Table(s)

- Откройте вкладку **Create Tables**
- Нажмите **Create Tables**

Таблицы появятся в БД из новой схемы.

## Создание конфигурации

Создайте конфигурацию для CMP MIGXdb.

- Откройте главную вкладку **MIGX**
- Должна быть сетка с кнопками
- Нажмите **Add Item**
- В открывшемся окне укажите:

### Settings

- **Name**: «doodles»
    - имя конфигурации. Используйте уникальные имена
- **"Add Item" Replacement**: «Add new Doodle»
    - текст кнопки **Add Item**
- **unique MIGX ID**: «doodles»
    - уникальный MIGX ID для всех конфигураций MIGX

### CMP-Settings

- **Main Caption**: «Doodles»
- **Tab Caption**: «Manage your Doodles»
- **Tab Description**: «Here you can Add / Remove and Edit your Doodles.»

### MIGXdb-Settings

- **Classname**: «Doodles\Model\Doodle»

### Сохранение прогресса

Сохраните конфигурацию «doodles», чтобы MIGX подключился к таблице БД и получил доступ к полям.

- Нажмите **Save and Close**
- На вкладке MIGX щёлкните правой кнопкой по конфигурации «doodles» и выберите Edit

### Columns

- Нажмите **Select db-fields**
- Выберите поля:
    - id
    - name
    - description
    - published
- Нажмите **Save and Close**
- Правый клик -> **Edit** для каждого поля:
    - id
        - **Header**: «ID»
    - name
        - **Header**: «Name»
    - description
        - **Header**: «Description»
    - published
        - **Header**: «Published»
        - **Renderer**: «this.renderClickCrossTick»
        - **on Click**: «switchOption»
          
### Formtabs

- Нажмите **Add Item**, чтобы добавить formtab
- **Caption**: «Doodle»
- Нажмите **Select db-fields**
- Выберите поля:
    - name
    - description
- Нажмите **Save and Close**
- Правый клик -> **Edit** для каждого поля:
    - name
        - **Caption**: «Name»
    - description
        - **Caption**: «Description»
        - **Input TV type**: «textarea»
      
### Db-Filters

- Нажмите **Add item**
- **filter Name**: «search»
- **Filter Type**: «textbox»
- **getlist-where**:

``` json
{"name:LIKE":"%[[+search]]%","OR:description:LIKE":"%[[+search]]%"}
```

### Contextmenues

- отметьте: **update**, **duplicate**, **publish**, **unpublish** и **recall_remove_delete**

### Actionbuttons

- отметьте: **addItem**

### Сохранение конфигурации

- Нажмите **Save and Close**

## Создание пункта меню для CMP

- В меню MODX нажмите **Tools (значок шестерёнки)**
- Нажмите **Menus**
- Нажмите **Create**
- Заполните:
    - **Parent**: место, где должен появиться пункт меню
    - **Lexicon-key**: «Doodles» (или другое им пункта, если не используете Lexicon)
    - **Action**: «index»
    - **Parameters**: `&configs=doodles` (здесь «doodles» это поле «name» конфигурации MIGXdb, а не «unique MIGX ID»)
    - **Namespace**: «migx»
- Нажмите **Save**
  
## Готово

Обновите страницу менеджера

Откройте область меню, где создали пункт «doodles», и нажмите его

Перед вами менеджер «doodles»!

## Вывод Doodles на фронтенде

Для вывода **Doodles** на фронтенде используйте сниппет **migxLoopCollection**

Пример:

```
[[!migxLoopCollection?
  &classname=`Doodles\Model\Doodle`
  &tpl=`@CODE:<h3>[[+name]]</h3><p>[[+description]]</p>`
  &sortConfig=`[{"sortby":"name","sortdir":"ASC"}]`
  &where=`{"published":"1"}`
]]
```

Выведет все опубликованные Doodles в алфавитном порядке.
