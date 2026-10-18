---
title: "xPDOCriteria.equals"
description: "Сравнивает эти критерии с другим объектом."
translation: "extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.equals"
---

## xPDOCriteria::equals

Сравнивает эти критерии с другим объектом. Возвращает `true`, если другой объект является критериями с тем же SQL и теми же привязками, и `false` в противном случае.

## Синтаксис

```php
boolean equals (mixed $obj)
```

## Пример

```php
if ($criteriaA->equals($criteriaB)) {
    // identical SQL and bindings
}
```

## Смотрите также

-   [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")