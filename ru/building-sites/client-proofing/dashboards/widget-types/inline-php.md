---
title: "Inline PHP"
translation: "building-sites/client-proofing/dashboards/widget-types/inline-php"
description: "Виджет панели управления Inline PHP в MODX: PHP-код, который выполняется как сниппет, и правила, которых он должен держаться."
---

Виджет Inline PHP работает почти так же, как [виджет-сниппет](building-sites/client-proofing/dashboards/widget-types/snippet "Тип виджета панели управления - Сниппет"), только выполняет содержимое виджета как сниппет.

## Использование

Просто поместите PHP-код в панель содержимого и верните результат.

Например, так выведется «Hello, World!»:

``` php
<?php
return 'Hello, World!';
```

Несколько замечаний:

- Используйте `return`, а не `echo`. Напечатанное попадёт в вывод страницы, а не в содержимое виджета.
- Не используйте `$modx->resource` в виджете: у панели управления нет активного ресурса.
- Теги `<?php` и `?>` вырезаются перед выполнением кода, поэтому закрывающий тег не нужен.

## Смотрите также

1. [Панели управления](building-sites/client-proofing/dashboards)
2. [Редактирование панели управления](building-sites/client-proofing/dashboards/managing)
3. [Назначение панели управления группе пользователей](building-sites/client-proofing/dashboards/usergroups)
4. [Создание виджета панели управления](building-sites/client-proofing/dashboards/creating-a-widget)
5. [Типы виджетов панели управления](building-sites/client-proofing/dashboards/widget-types)
    1. [Тип виджета панели управления - Файл](building-sites/client-proofing/dashboards/widget-types/file)
    2. [Тип виджета панели управления - HTML](building-sites/client-proofing/dashboards/widget-types/html)
    3. [Тип виджета панели управления - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
    4. [Тип виджета панели управления - Сниппет](building-sites/client-proofing/dashboards/widget-types/snippet)
