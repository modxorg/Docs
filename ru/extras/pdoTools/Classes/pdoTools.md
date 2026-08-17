---
title: "pdoTools"
description: "Класс pdoTools: загрузка и разбор чанков, prepareSnippet и кэш setStore/getStore"
translation: "extras/pdoTools/Classes/pdoTools"
---

Этот класс обрабатывает чанки и содержит различные служебные методы.

```php
$pdo = $modx->getService('pdoTools');
$chunk = $pdo->getChunk('chunkName', array('with', 'values'));
```

Чанки можно загружать разными способами:

1. По умолчанию как чанк из БД. Укажите только имя.
2. Чанк `@INLINE`, который генерируется на лету:
3. Чанк `@FILE`, который загружается из файла. Из соображений безопасности можно использовать только файлы типов `tpl` и `html`. Файлы загружаются из каталога системной настройки **pdotools_elements_path**.

```php
[[!pdoResources?
    &elementsPath=`/core/elements/`
    &tpl=`@FILE chunks/file.tpl`
]]
```

1. `@TEMPLATE`: чанк генерируется на лету из шаблона ресурса. Только для строк с заполненным полем `template`. Это своего рода замена сниппету **renderResources**.

**Каждый** сниппет на базе pdoTools может загружать чанки такими способами: pdoResources, getTickets, msProducts и т. д.

Единственное, что нужно помнить: будьте осторожны с `@INLINE`, потому что если указать плейсхолдеры прямо на странице, они могут обработаться **до** запуска сниппета. Поэтому pdoTools поддерживает другие теги для плейсхолдеров:

```php
[[!pdoResources?
    &parenets=`0`
    &tpl=`@INLINE <p>{{+id}} - {{+pagetitle}}</p>`
]]
```

Эти плейсхолдеры дойдут до сниппета необработанными, затем pdoTools заменит `{{}}` на `[[]]` без вреда для логики. Используйте этот синтаксис для всех `@INLINE`-чанков на страницах MODX.

Когда плейсхолдеры попадают в pdoTools, он пытается разобрать их сам. Он умеет простые теги вроде

* `[[+tag]]`
* `[[%lexicon]]`
* `[[~id_for_link]]`
* `[[~[[+id]]]]`

Но для вложенных сниппетов, чанков или output filters он загрузит парсер MODX. Любой чанк с output filter будет **медленнее**.

Как изменить данные перед обработкой? Просто используйте **&prepareSnippet**!

```php
[[!pdoResources?
    &parents=`0`
    &tpl=`@INLINE <p>{{+id}} - {{+pagetitle}}</p>`
    &prepareSnippet=`cookMyData`
]]
```

Сниппет `cookMyData` получит переменную `$row` со всеми выбранными полями одной строки и должен вернуть строку (сниппеты MODX не могут вернуть массив).

Добавим случайную строку к pagetitle каждого ресурса:

```php
<?php
$row['pagetitle'] .= rand();

return json_encode($row);
```

**можно использовать `json_encode()` или `serialize()` для возврата данных*

Теперь вы знаете, как убрать **все** output filters и вложенные сниппеты из чанков, чтобы ускорить их.
Конечно, быстрее сделать работу в одном сниппете, чем разбирать несколько сниппетов в чанках.

В prepareSnippet можно использовать объекты `$modx` и `$pdoTools` для кэширования нужных данных.

У pdoTools есть методы `setStore()` и `getStore()`. Например, нужно подсветить пользователей из некоторых групп в комментариях (реальная задача). Вызываю сниппет с prepareSnippet:

```php
[[!TicketComments?
    &prepareSnippet=`prepareComments`
]]
```

И вот сниппет `prepareComments`:

```php
<?php
if (empty($row['createdby'])) {return json_encode($row);}

// If we do not have cached groups
if (!$groups = $pdoTools->getStore('groups')) {
    $tstart = microtime(true);
    $q = $modx->newQuery('modUserGroupMember');
    $q->innerJoin('modUserGroup', 'modUserGroup', 'modUserGroupMember.user_group = modUserGroup.id');
    $q->select('modUserGroup.name, modUserGroupMember.member');
    $q->where(array('modUserGroup.name:!=' => 'Users'));
    if ($q->prepare() && $q->stmt->execute()) {
        $modx->queryTime += microtime(true) - $tstart;
        $modx->executedQueries++;
        $groups = array();
        while ($tmp = $q->stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = strtolower($tmp['name']);
            if (!isset($groups[$name])) {
                $groups[$name] = array($tmp['member']);
            }
            else {
                $groups[$name][] = $tmp['member'];
            }
        }
    }
    foreach ($groups as & $v) {
        $v = array_flip($v);
    }
    // Save groups to cache
    $pdoTools->setStore('groups', $groups);
}

$class = '';
if (!empty($row['blocked'])) {
    $class = 'blocked';
}
elseif (isset($groups['administrator'][$row['createdby']])) {
    $class = 'administrator';
}
$row['class'] = $class;

return json_encode($row);
```

Теперь в чанке можно использовать `[[+class]]` для подсветки админов и заблокированных пользователей. Методы Store pdoTools позволяют кэшировать данные только на время выполнения без записи на диск. Это быстро и удобно.

Итого:

1. Чанки можно загружать разными способами.
2. Они обрабатываются так быстро, насколько просты.
3. Лучше перенести всю логику шаблона в `&prepareSnippet`, а не вызывать дополнительные вложенные сниппеты или output filters в чанках.

Помните: **каждый** вложенный вызов в чанке стоит вам секунд общего времени загрузки страницы. Логика должна быть в PHP, а не в тегах MODX.
