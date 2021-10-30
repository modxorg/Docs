---
title: "xPDO.getCount"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcount"
---

## xPDO::getCount

Извлекает количество `xPDOObjects` по указанному массиву или `xPDOCriteria`.

Если вы указываете `select()`, не используйте `getCount()`, просто запустите запрос и получите результаты в обычном режиме.
`getCount()` - это ярлык, который автоматически заменяет ваш `select()` на `COUNT (DISTINCT primaryKeyField)`, основываясь на определении первичного ключа указанного вами класса. Группировка по должна работать, если это имеет смысл с условием выбора `COUNT (DISTINCT primaryKeyField)`.

### Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getCount()>

```php
integer getCount (string $className, [mixed $criteria = null])
```

## Пример

Получить счетчик всех объектов Box с шириной 20.

```php
$total = $xpdo->getCount('Box',array(
   'width' => 20,
));
```

Обратите внимание, что если вы передадите этой функции объект запроса для второго параметра, критерии **limit** могут быть проигнорированы.

```php
$query = $modx->newQuery('States');
$query->limit(10, 0);  // <-- вероятно, вы хотите поставить эту строку ПОСЛЕ getCount

$total_states = $modx->getCount('States',$query);

// Если у вас 50 штатов, это может вывести 50, а не 10! Быть осторожен!
$modx->log(modX::LOG_LEVEL_ERROR, "Total States: $total_states");
```

## Смотрите также

-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO](extending-modx/xpdo "xPDO")
