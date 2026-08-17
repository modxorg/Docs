---
title: "pdoFetch"
description: "Класс pdoFetch: выборка ресурсов одним запросом, join таблиц и работа с TV"
translation: "extras/pdoTools/Classes/pdoFetch"
---

pdoFetch наследует pdoTools, поэтому загружайте один класс в зависимости от задачи.
Загрузить каждый класс можно так:

```php
$pdo = $modx->getService('pdoFetch');
```

И далее

```php
$resources = $pdo->getCollection('modResource', array(
    'published' => true,
    'deleted' => false
), array(
    'parents' => '1,5,6,-9',
    'includeTVs' => 'tv1, tv2',
    'sortby' => 'id',
    'sortby' => 'asc',
    'limit' => 20,
));
$tpl = '@INLINE <p>[[+id]] - [[+pagetitle]]</p>';
$output = '';
foreach ($resources as $resource) {
    $output .= $pdo->getChunk($tpl, $resource);
}
return $output;
```

Вся логика pdoResources на самом деле внутри класса pdoFetch, и вы можете использовать её в своих сниппетах.

pdoFetch старается выполнять только один запрос за раз. Поэтому нужны join таблиц. Дополнительные запросы появляются только при выборке TV: нужны их имена и значения по умолчанию для корректного запроса.

TV тоже join-ятся как и другие таблицы, без дополнительных запросов за их значениями, в отличие от **getResources**.

Поэтому для фильтра по TV используйте запрос:

```php
[[!pdoResources?
    &parents=`0`
    &includeTVs=`tv1`
    &where=`{"tv1":"my_value"}`
]]
```

Значения TV по умолчанию не сохраняются в таблице, они только в настройках TV, поэтому сравнивайте их с `null`:

```php
[[!pdoResources?
    &parents=`0`
    &includeTVs=`tv2`
    &where=`{"tv2":null}`
]]
```

Если нужно выбрать ресурс, где `tv2` имеет значение по умолчанию, выбирайте ресурсы с `null` для этой TV. Но pdoFetch вернёт **значение по умолчанию** TV как значение поля в результатах.

Надеюсь, логика pdoFetch стала понятнее. Итого:

1. Один запрос, чтобы править всеми.
2. С join таблиц, если нужно больше данных. Без дополнительных запросов!
3. Чистые массивы в результатах, без объектов.
4. Если включить `&checkPermissions`, будут созданы минимальные объекты для вызова `checkPolicy()`. Это замедлит сниппет.
