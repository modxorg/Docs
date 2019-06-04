---
title: "Inline PHP"
translation: "building-sites/client-proofing/dashboards/widget-types/inline-php"
---

Виджет Inline PHP работает как и [виджет Snippet](building-sites/client-proofing/dashboards/widget-types/snippet "Тип виджета на приборной панели - фрагмент"), за исключением того, что он запускает содержимое виджета, как будто это был Snippet.

## Использование

Просто поместите ваш PHP-код в панель содержимого и верните вывод вашего виджета.

Например, это отобразит «Hello, World!»:

```php
<?php
return 'Hello, World!';
```

Несколько замечаний об использовании этого:

- Не «отображайте» контент, так как он будет игнорироваться
- Не используйте $modx->resource в вашем виджете, так как нет активного ресурса для панели инструментов
- Не помещайте закрывающий тег PHP в конец кода! По какой-то причине он анализируется неправильно (по состоянию на MODX 2.2.8)

## Смотрите также

1. [Тип виджета панели инструментов - Файл](building-sites/client-proofing/dashboards/widget-types/file)
2. [Тип виджета панели инструментов - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Тип виджета Dashboard - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Тип виджета на приборной панели - фрагмент](building-sites/client-proofing/dashboards/widget-types/snippet)
