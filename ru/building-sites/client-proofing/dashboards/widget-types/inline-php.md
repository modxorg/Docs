---
title: Встроенный PHP
_old_id: '87'
_old_uri: 2.x/administering-your-site/dashboards/dashboard-widget-types/dashboard-widget-type-inline-php
---

Виджет Inline PHP работает очень похоже на [виджет Snippet](building-sites/client-proofing/dashboards/widget-types/snippet "Тип виджета на приборной панели - фрагмент") , за исключением того, что он запускает содержимое виджета, как будто это был Snippet.

## использование

Просто поместите ваш PHP-код в панель содержимого и верните вывод вашего виджета.

Например, это отобразит «Hello, World!»:

```php
<?php
return 'Hello, World!';
```

Несколько замечаний об использовании этого:

- Не «отображайте» контент, так как он будет игнорироваться
- Do not use $modx->resource in your widget, as there is no active resource for the dashboard
- Не помещайте закрывающий тег PHP в конец кода! По какой-то причине он анализируется неправильно (по состоянию на MODX 2.2.8)

## Смотрите также

1. [Тип виджета панели инструментов - Файл](building-sites/client-proofing/dashboards/widget-types/file)
2. [Тип виджета панели инструментов - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Тип виджета Dashboard - встроенный PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Тип виджета на приборной панели - фрагмент](building-sites/client-proofing/dashboards/widget-types/snippet)
