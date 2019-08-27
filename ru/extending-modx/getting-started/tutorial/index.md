---
title: "Начало работы с PHP в MODX"
translation: "extending-modx/getting-started/tutorial"
---

Кодовая база в Revolution переключилась на [xPDO](http://www.xpdo.org/ "Домашняя страница xPDO"), инструмент для моделирования объектно-реляционных мостов, созданный Джейсоном Ковардом. С точки зрения непрофессионала, это означает, что все таблицы базы данных теперь представлены объектами PHP (как обычно для любого ORM). Чанки представлены объектами 'modChunk', сниппеты объектами 'modSnippet' и так далее.

## Простое как

Итак, как на самом деле получить объект в новом modx? Ну, вы привыкли полагаться на несколько различных функций:

``` php
// Старый способ работы в MODx 1.x и более ранних версиях
$doc = $modx->getDocument(23);
$doc = $modx->getDocument(45,'pagetitle,introtext');
$chunk = $modx->getChunk('chunkName');

// или даже более запутанный
$res = $modx->db->select('id,username',$table_prefix.'.modx_manager_users');
$users = array();
if ($modx->db->getRecordCount($res)){
    while ($row = $modx->db->getRow($res)) {
        array_push($users,$row);
    }
}
return $users;
```

Уже нет. Все гораздо проще, и на самом деле вам нужно всего несколько функций. Давайте посмотрим на некоторые примеры:

``` php
// получение чанка с ID 43
$chunk = $modx->getObject('modChunk',43);

// получение чанка с именем 'TestChunk'
$chunk = $modx->getObject('modChunk',array(
    'name' => 'TestChunk'
));

// получить коллекцию объектов чанка, затем вывести их имена
$chunks = $modx->getCollection('modChunk');
foreach ($chunks as $chunk) {
    echo $chunk->get('name')."<br />\n";
}

// получение ресурса (то есть страницы), который публикуется с псевдонимом «test»
$document = $modx->getObject('modResource',array(
    'published' => 1,
    'alias' => 'test',
));
```

## Модель

Итак, вы, вероятно, спрашиваете, где находится список имен таблиц для сопоставления имен объектов? Его можно найти в «core/model/schema/modx.mysql.schema.xml». (Обратите внимание на «mysql» - да, это означает, что MODX в ближайшем будущем будет поддерживать другие базы данных). Оттуда вы можете просмотреть XML-представление всех таблиц MODX DB.

Например, modChunk:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
    <field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
    <field key="description" dbtype="varchar" precision="255" phptype="string" null="false" default="Chunk" />
    <field key="editor_type" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
    <field key="category" dbtype="int" precision="11" phptype="integer" null="false" default="0" />
    <field key="cache_type" dbtype="tinyint" precision="1" phptype="integer" null="false" default="0" />
    <field key="snippet" dbtype="mediumtext" phptype="string" />
    <field key="locked" dbtype="tinyint" precision="1" attributes="unsigned" phptype="boolean" null="false" default="0" />
    <aggregate alias="Category" class="modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
</object>
```

Вы также можете определить свои собственные схемы для своих компонентов и добавить их в виде пакетов - подробнее об этом в следующей статье. Давайте перейдем в схему:

``` xml
<object class="modChunk" table="site_htmlsnippets" extends="modElement">
```

Свойство _class_ сообщает вам, каким будет имя класса. Свойство _table_ показывает фактическую таблицу MySQL, а _extends_ показывает, какой объект он расширяет. modElement является базовым классом для всех элементов в MODX - фрагментов, модулей, блоков, шаблонов и т.д.

``` xml
<field key="name" dbtype="varchar" precision="50" phptype="string" null="false" default="" index="unique" />
```

Этот тег представляет столбец в базе данных. Большинство из этих атрибутов довольно просты.

``` xml
<aggregate alias="modCategory" class="modCategory" key="id" local="category" foreign="id" cardinality="one" owner="foreign" />
```

Хорошо, вот где мы вступаем в отношения с БД. Отношение **Aggregate** - это отношение, в котором, с точки зрения непрофессионалов, если бы вы удалили этот чанк, он не удалил бы категорию, к которой он относится. Если бы это были **Композитные** отношения, это было бы. В составных отношениях есть «зависимость», которая связана с другим объектом. Для примера, давайте получим все `modContextSettings` для modContext:

``` php
$context = $modx->getObject('modContext','web');
$settings = $context->getMany('ContextSetting');
foreach ($settings as $setting) {
    echo 'Setting name: '.$setting->get('key').' <br />';
    echo 'Setting value: '.$setting->get('value').' <br />';
}
```

Довольно легко, да? Мы займемся созданием и удалением объектов, а также более сложными запросами, такими как внутренние объединения, ограничения, сортировка и другие, в [следующей статье](extending-modx/getting-started/tutorial/part-2).

## Смотри также

- [xPDO: Определение схемы](extending-modx/xpdo/custom-models/defining-a-schema "Определение схемы")
- [xPDO: Связанные объекты](extending-modx/xpdo/retrieving-objects/related-objects "Работа со связанными объектами")
