---
title: "Часть 2"
translation: "extending-modx/getting-started/tutorial/part-2"
---

В этой статье мы поговорим о создании и удалении объектов (и соответствующих им строк в базе данных), а также о более сложных запросах.

## Создание объектов

Создание объекта обрабатывается методом **newObject**. Предполагается, что объект, который вы пытаетесь создать, был правильно определен внутри вашей XML-схемы, и эта схема сгенерировала правильные файлы классов. Для простого примера мы можем взглянуть на встроенные объекты MODX.

``` php
// давайте создадим шаблон
$template = $modx->newObject('modTemplate');

// теперь давайте сохраним некоторые данные в полях
$template->set('templatename','TestTemplate');
$template->set('description','A test template.');

// мы могли бы также сделать это так:
$data = array(
    'templatename' => 'TestTemplate',
    'description' => 'A test template.',
);
$template->fromArray($data);

// хорошо, теперь мы готовы. давайте сохраним.
if ($template->save() === false) {
    die('An error occurred while saving!');
}
```

Строка никогда не добавляется в базу данных до тех пор, пока не будет запущена команда объекта `save()`.

## Удаление объекта

Чтобы удалить объект из базы данных, мы используем команду **remove**:

``` php
$template->remove();
```

Это также удалит любые составные отношения, определенные в схеме объекта. В предыдущем примере с `modTemplates` это объекты `modTemplateVarTemplate`, которые отображают шаблоны на телевизоры. Те будут каскадом и будут удалены.

## Более сложные запросы

Итак, довольно скоро вам нужно будет выполнить несколько более сложных запросов, чем мы имели дело. Вот где появляется объект `xPDOQuery`. Это позволяет создавать абстрактные объекты запросов, которые эмулируют более сложные команды SQL. 
Итак, давайте попробуем получить третьи 10 ресурсов (то есть 21-30), упорядоченные по menuindex, которые либо 1) опубликованы и доступны для поиска, либо 2) созданы пользователем с именем пользователя 'george123'.

``` php
$c = $modx->newQuery('modResource');
$c->leftJoin('modUser','PublishedBy');
$c->where(array(
    'modResource.published' => 1,
    'modResource.searchable' => 1,
));
$c->orCondition(array(
    'PublishedBy.username' => 'george123',
),null,1);
$c->sortby('menuindex','ASC');
$c->limit(10,20);

$resources = $modx->getCollection('modResource',$c);
```

Несколько вещей, которые нужно отметить. Во-первых, обратите внимание, что innerJoin сначала передает имя класса, а затем псевдоним. И в orCondition, третий параметр - это номер группы, который эффективно группирует условия в соответствующие круглые скобки (первые 2 в первой группе в скобках, третьи в другой).

[xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") поддерживает методы: join, [rightJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin "xPDOQuery.rightJoin"), [leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin"), [innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"), [andCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.andcondition "xPDOQuery.andCondition"), [orCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.orcondition "xPDOQuery.orCondition"), [sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby"), [groupby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby "xPDOQuery.groupby"), [limit](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.limit "xPDOQuery.limit"), bindGraph, bindGraphNode, and [select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select").

Очевидно, что вы можете сойти с ума со сложными запросами. Хорошая особенность xPDO в MODX состоит в том, что на самом деле существует масса различных способов сделать большинство вещей - вы также могли бы использовать [$modx->getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph") и для этого.

В [следующей статье](extending-modx/getting-started/tutorial/part-3 "PHP-кодирование в MODX Revolution, Часть III"), мы поговорим о том, как это используется в контексте процессоров MODX с JSON.

## Смотрите также

- [xPDO: Создание объектов](extending-modx/xpdo/creating-objects "Создание ")
- [xPDOObject::remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "remove")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
