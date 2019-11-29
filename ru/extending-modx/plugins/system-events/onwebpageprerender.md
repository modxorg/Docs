---
title: "OnWebPagePrerender"
translation: "extending-modx/plugins/system-events/onwebpageprerender"
---

## Событие: OnWebPagePrerender

Запускается после анализа ресурса, но до его визуализации.

 Заголовки типа содержимого еще не отправлены, а выходные данные не очищены.

 Служба: 5 - Template Service Events
 Группа: Нет

## Параметры события

 Нет.

## Example

**Описаниие:** Отфильтруйте слова из документа перед его отображением в Интернете
**Системное событие:** OnWebPagePrerender

``` php
$words = array("snippet", "template"); // words to filter
$output = &$modx->resource->_output; // get a reference to the output
$output = str_replace($words,"<b>[filtered]</b>",$output);
```

 Будьте осторожны, если ваш плагин OnWebPagePrerender является статическим элементом и включает или требует файлы, использующие _relative paths_. Код плагина выполняется из его кэшированного файла, например `core/cache/includes/elements/modplugin/7.include.cache.php`, не из исходного файла статического элемента. Смотрите [Bug 11129](https://github.com/modxcms/revolution/issues/11129)

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
