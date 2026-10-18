---
title: "xPDOCriteria.bind"
description: "Связывает значения с критериями."
translation: "extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.bind"
---

## xPDOCriteria::bind

Связывает массив значений с критериями — по значению или по ссылке. После связывания критерии можно подготовить и выполнить.

## Синтаксис

```php
xPDOCriteria bind ([array $bindings = array()], [boolean $byValue = true], [boolean $cacheFlag = false])
```

## Пример

```php
$criteria->bind(array(':id' => 42));
```

## Смотрите также

-   [xPDOCriteria.toSQL](extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.tosql "xPDOCriteria.toSQL")
-   [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")