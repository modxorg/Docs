---
title: HTML
transition: building-sites/client-proofing/dashboards/widget-types/html
---

Тип виджета HTML Dashboard отображает прямой HTML - ничего больше - в виджете. Полезно для простых сообщений и других данных.

## использование

Просто поместите ваш HTML на панель контента, и он загрузит HTML в виджет.

Этот виджет также поддерживает кэшированные заполнители и вызовы элементов (не кэшированные вызовы не будут работать). Так, например, вы можете использовать:

```php
Hello, [[+modx.user.username]]!
```

Вывести имя пользователя, вошедшего в систему. Вы также можете позвонить Snippets, например, так:

```php
[[MyDashboardSnippet]]
```

Обратите внимание, что во фрагментах нет «активного ресурса», поэтому у фрагментов, ссылающихся на $ modx-> resource, будут проблемы.

## Смотрите также

1. [Тип виджета панели инструментов - Файл](building-sites/client-proofing/dashboards/widget-types/file)
2. [Тип виджета панели инструментов - HTML](building-sites/client-proofing/dashboards/widget-types/html)
3. [Тип виджета Dashboard - Inline PHP](building-sites/client-proofing/dashboards/widget-types/inline-php)
4. [Тип виджета на приборной панели - Сниппет](building-sites/client-proofing/dashboards/widget-types/snippet)
