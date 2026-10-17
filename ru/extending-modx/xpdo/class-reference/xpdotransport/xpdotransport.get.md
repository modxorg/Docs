---
title: "xPDOTransport.get"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.get"
---

## xPDOTransport::get

Извлекает артефакт из архива транспорта. Артефакт определяется путём к файлу внутри архива; возвращаемое значение — массив с его описанием и содержимым.

## Синтаксис

``` php
array|boolean get (string $objFile, [array $options = array()])
```

## Пример

``` php
$artifact = $transport->get('my_package/model/my_package/myclass.class.php');
```

## Смотрите также

-   [xPDOTransport.put](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.put "xPDOTransport.put")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")