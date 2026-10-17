---
title: "xPDOTransport.put"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.put"
---

## xPDOTransport::put

Добавляет артефакт в транспорт. Артефакт — это файл на диске; его атрибуты описывают, как он должен быть установлен (путь назначения, транспортное средство, правила сохранения).

## Синтаксис

``` php
boolean put (string $artifact, [array $attributes = array()])
```

## Пример

``` php
$transport->put(MODX_CORE_PATH . 'components/my_package/model/myclass.class.php', array(
    'vehicle' => 'xPDOFileVehicle',
    'target' => 'return MODX_CORE_PATH . "components/my_package/model/";',
));
```

## Смотрите также

-   [xPDOTransport.get](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.get "xPDOTransport.get")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")