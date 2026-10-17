---
title: "xPDOTransport.satisfies"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.satisfies"
---

## xPDOTransport::satisfies

Проверяет, удовлетворяет ли версия ограничению версии, используя операторы в стиле семантического версионирования, такие как `>=`, `<`, `~` и `*`.

## Синтаксис

```php
boolean satisfies (string $version, string $constraint)
```

## Пример

```php
if (xPDOTransport::satisfies($installed, '>=1.0.0')) {
    // constraint met
}
```

## Смотрите также

-   [xPDOTransport.nextSignificantRelease](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.nextsignificantrelease "xPDOTransport.nextSignificantRelease")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")