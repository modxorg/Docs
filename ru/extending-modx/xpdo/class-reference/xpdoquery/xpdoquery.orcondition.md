---
title: "xPDOQuery.orCondition"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.orcondition"
---

## xPDOQuery::orCondition

Добавьте условие `OR` в оператор`WHERE` в запросе.

## Синтаксис

API Docs: [xPDOQuery::orCondition()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::orCondition()>)

```php
void orCondition ( $conditions, [ $binding = null], [ $group = 0])
```

## Пример

Возьмите все коробки шириной 12 или 14.

```php
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 14,
));
$query->orCondition(array(
   'width' => 12,
));
$boxes = $xpdo->getCollection('Box',$query);
```

### Предупреждение

Порядок вызова функций важен! **orCondition** должно следовать после **where**, где метод был использован.

## Другой пример

Вот более знакомый пример, используемый для получения страниц, когда у них установлены даты `publish`/`unpublish`. Это демонстрирует альтернативный синтаксис для условия или. Обычно каждое место в массиве, предоставленном методу **where**, где объединяется с помощью SQL `AND`, но вы можете использовать префикс `OR` в именах столбцов, чтобы указать, как группы терминов объединяются.

В следующем примере страница _must_ должна быть опубликована (1), а `pub_date` должен быть либо нулевым, либо меньшим или равным текущей отметке времени. Значение `unpub_date` должно быть либо нулевым, либо большим, чем текущая временная метка.

```php
$criteria = $modx->newQuery('modResource');
$criteria->where(array(
    'published' => 1,
        array(
            'pub_date' => 0,
            'OR:pub_date:<=' => time(),
        ),
        array(
            'unpub_date' => 0,
            'OR:unpub_date:>' => time(),
        ),
    )
);
```

## Пример c объединенными столами

Параметры вашего фильтра могут ссылаться на поля в других таблицах.

```php
$query = $modx->newQuery('modUser');
$query->innerJoin('modUserProfile','Profile');
$query->where(array(
   'modUser.username' => $email,
));
$query->orCondition(array(
   'Profile.email' => $email,
));
$user = $modx->getObject('modUser', $query);
```

Параметры фильтра могут использовать имя класса (как в `modUser` выше) или псевдоним (как профиль выше).

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
