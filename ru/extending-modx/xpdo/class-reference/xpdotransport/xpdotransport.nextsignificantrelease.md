---
title: "xPDOTransport.nextSignificantRelease"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.nextsignificantrelease"
---

## xPDOTransport::nextSignificantRelease

Возвращает следующий значимый релиз для указанной версии — например, следующую минорную или мажорную версию в зависимости от оператора. Используется при вычислении путей обновления между версиями транспортных пакетов.

## Синтаксис

```php
string nextSignificantRelease (string $version)
```

## Пример

```php
$next = xPDOTransport::nextSignificantRelease('1.2.3');
```

## Смотрите также

-   [xPDOTransport.satisfies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.satisfies "xPDOTransport.satisfies")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")