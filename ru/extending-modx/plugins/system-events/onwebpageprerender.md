---
title: "OnWebPagePrerender"
translation: "extending-modx/plugins/system-events/onwebpageprerender"
description: "Срабатывает после разбора ресурса, но до его отрисовки."
---

## Событие: OnWebPagePrerender

Срабатывает после того, как ресурс разобран, но до того, как он отрисован.

Заголовки типа содержимого еще не отправлены, а выходные данные не очищены.

- Служба: 5 - Template Service Events
- Group: System

## Параметры события

Нет.

## Пример

Отфильтруйте слова из вывода перед его отображением:

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

**Статические плагины и относительные пути.** Если плагин — статический элемент и включает или подключает файлы по _относительным путям_, он выполняется не из исходного файла, а из кэшированной копии — например `core/cache/includes/elements/modplugin/7.include.cache.php`. См. [Bug 11129](https://github.com/modxcms/revolution/issues/11129).

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
